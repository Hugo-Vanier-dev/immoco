<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;


class UserType extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'value'
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'user_type_id');
    }
}