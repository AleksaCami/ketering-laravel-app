<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function prikaz_korisnika()
    {
        $users = User::all();
        return view('users.prikaz_korisnika')->with('users', $users);
    }

    public function adminHome()
    {
        $this->middleware('role:admin');
        return view('users.admin');
    }

    public function kuhinjaHome()
    {
        $this->middleware('role:kuhinja');
        return view('users.kuhinja');
    }

    public function magacinHome()
    {
        $this->middleware('role:magacin');
        return view('users.magacin');
    }

    public function prodajaHome()
    {
        $this->middleware('role:prodaja');
        return view('users.prodaja');
    }

    public function vozacHome()
    {
        $this->middleware('role:vozac');
        return view('users.vozac');
    }
}
