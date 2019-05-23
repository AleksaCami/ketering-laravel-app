<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function prikaz_korisnika()
    {
        $users = User::all();
        return view('users.prikaz_korisnika')->with('users', $users);
    }

    public function edit($id)
    {
        $korisnik = User::find($id);

        return view('users.edit')->with('korisnik', $korisnik);
    }

    public function update(Request $request, $id)
    {
//        dd($request->all());

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'tip_korisnika' => 'required',
        ]);


        $korisnik = User::find($id);
        $korisnik->name = $request->input('name');
        $korisnik->email = $request->input('email');
        $korisnik->tip_korisnika = $request->input('tip_korisnika');
        if($request->input('password') != "") {
            $this->validate($request, [
                'password' => ['confirmed', 'required', 'min:8'],
            ]);
            $korisnik->password = Hash::make($request->input('password'));
        }

        $korisnik->save();

        return redirect('/prikaz-korisnika')->with('success', 'Vase promene su uspesno sacuvane');



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
