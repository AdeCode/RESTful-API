<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dummyAPIController extends Controller
{
    //
    public function index()
    {

    }

    public function getData()
    {
        return [
            "name"=>"Adeola"
        ];
    }
}
