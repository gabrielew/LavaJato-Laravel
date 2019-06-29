<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientCad extends Model
{
    protected $fillable = ['name', 'cpf'];
    protected $guarded = ['id', 'created_at'];
    protected $table = 'clients';
}
