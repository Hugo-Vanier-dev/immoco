<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ClientType extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'value'
    ];

    public function clients()
    {
        return $this->hasMany(Client::class, 'client_type_id');
    }
}