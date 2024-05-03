<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function indexUser(){
        return view('user');
    }

    public function createOrUpdateUser(Request $request, $id){

        return route('home');
    }

}
