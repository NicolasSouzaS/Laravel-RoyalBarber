<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CortesController extends Controller
{
    public function index(){
        return view('site.cortes');
    }
}
