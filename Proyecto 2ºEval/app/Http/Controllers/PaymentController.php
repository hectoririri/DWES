<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    private $apiContext;

    public function __construct()
    {
        $payPalConfig = Config::get('paypal');

        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                $payPalConfig['client_id'],
                $payPalConfig['secret']
            )
        );

        $this->apiContext->setConfig($payPalConfig['settings']);
    }

    public function payWithPayPal(Request $request)
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
    
        $amount = new Amount();
        // Get the amount from the request
        $itemPrice = $request->input('cantidad', 100.00);
        $itemQuantity = 1;
        $total = number_format($itemPrice * $itemQuantity, 2);
        $amount->setTotal($total);
        $amount->setCurrency('EUR');
    
        // Create item list and add an item
        $item = new Item();
        $item->setName('Servicio')
            ->setCurrency('EUR')
            ->setQuantity($itemQuantity)
            ->setPrice($itemPrice);
        $itemList = new ItemList();  // Remove the full namespace
        $itemList->setItems(array($item));  // Use array() instead of []
    
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription('Descripción Paypal')
            ->setInvoiceNumber(uniqid());
    
        $callbackUrl = url('/payment/status');
    
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl($callbackUrl)
            ->setCancelUrl($callbackUrl);
    
        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));  // Use array() instead of []
    
        try {
            $payment->create($this->apiContext);
            return redirect()->away($payment->getApprovalLink());
        } catch (PayPalConnectionException $ex) {
            Log::error('PayPal Error: ' . $ex->getData());
            return redirect()->back()->with('error', 'Error al conectar con PayPal: ' . $ex->getMessage());
        }
    }

    public function payPalStatus(Request $request)
    {
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');
        $token = $request->input('token');

        if (!$paymentId || !$payerId || !$token) {
            return redirect()
                ->route('home')
                ->with('error', 'Payment failed');
        }

        $payment = Payment::get($paymentId, $this->apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        try {
            $result = $payment->execute($execution, $this->apiContext);
            
            if ($result->getState() === 'approved') {
                return redirect()
                    ->route('home')
                    ->with('success', 'Payment successful');
            }
        } catch (PayPalConnectionException $ex) {
            return redirect()
                ->route('home')
                ->with('error', $ex->getData());
        }
    }
    public function index()
        {
            // Set the amount to be paid
            $amount = 100.00;
            
            // Return the payment view with the amount
            return view('payment.index', compact('amount'));
        }
}