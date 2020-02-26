<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $table    = "tasks";
    protected $fillable = [
        'titulo',
        'descricao',
        'data_vencimento',
        'data_realizado',
        'realizado'
    ];
    protected $guarded = [];
}
