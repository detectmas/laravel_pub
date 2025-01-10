<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormsController extends Controller
{
    //
    function getData(Request $req){
        //a way of validating form data
        $req->validate([
            'username'=>'required | max:10',
            'userPassword' => 'required | min:5'
        ]);
        return $req->input();
    }
}
