<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class XssController extends Controller
{
    public function index()
    {
      $cookiename = 'password';
      $cookieval = 'testing321';
      Cookie($cookiename,$cookieval,true,10);
      return view('xss.xss');

}
}
