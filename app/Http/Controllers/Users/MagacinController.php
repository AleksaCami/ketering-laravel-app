<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MagacinController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:magacin');
    }

    public function index()
    {
        return view('users.magacin');
    }
}
