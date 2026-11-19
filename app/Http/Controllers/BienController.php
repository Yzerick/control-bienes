<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class BienController extends Controller
{
    public function index()
    {
        return view('bienes.index');
    }
    
}
