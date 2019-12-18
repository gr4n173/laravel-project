<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VectorController extends Controller
{
  public function index()
  {
    return view('xss.vector');
  }
}
