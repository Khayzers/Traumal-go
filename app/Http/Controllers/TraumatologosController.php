<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TraumatologosController extends Controller
{
    public function index()
    {
        return view('traumatologos');
    }
}