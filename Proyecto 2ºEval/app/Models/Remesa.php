<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Tarea;

class Remesa extends Model
{
    protected $table = "remesas";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $guarded = [];
}
