<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ControlStructsController extends Controller
{
    //
    public function viewLoad(){
        $mock_data = [
            'users' => ['Masroor','Asfand', 'Tayyab']
        ];
        return view('control-structs', $mock_data);
    }
}
