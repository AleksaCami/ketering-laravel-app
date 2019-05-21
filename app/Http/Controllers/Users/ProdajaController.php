<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProdajaController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:prodaja');
    }

    public function index()
    {
        return view('users.prodaja');
    }
}
