<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

use App\Models\User;

class UserController extends BaseController
{
    public function getById($id){
        $user = User::findOrFail($id);
        return $user;
    }

}
