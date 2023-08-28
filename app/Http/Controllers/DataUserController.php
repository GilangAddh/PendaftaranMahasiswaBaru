<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class DataUserController extends Controller
{
    public function main()
    {
        $dataUser = User::where('id_role', 1)->get();
        return view('dataUser.index', ['dataUser' => $dataUser]);
    }
    public function ProsesDelete(Request $request)
    {
        $oldid = $request->query('oldid');
        $delItem = User::findOrFail($oldid);
        $delItem->delete();
        Session::flash('alert-success', 'Success Delete Data'); // kasih pesan success
        return redirect()->route('dataUser.index');
    }
    public function tambah()
    {
        return view('dataUser.tambah');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:255',
            'id_role' => 'required'
        ]);

        $validateData['password'] = Hash::make($validateData['password']);

        User::create($validateData);
        Session::flash('alert-success', 'Berhasil Register'); // kasih pesan success
        return redirect()->intended('/dataUser');
    }

    public function edit(Request $request)
    {
        $oldid = $request->query('oldid');

        $data = User::findOrFail($oldid);
        return view('dataUser.edit', ['data' => $data]);
    }

    public function editStore(Request $request)
    {

        $oldid = $request->post('oldid');

        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|min:5', // Gunakan nullable agar password tidak wajib diisi
            'id_role' => 'required'
        ]);

        unset($validateData['password']);


        // Update data pengguna
        User::where('id', $oldid)->update($validateData);

        Session::flash('alert-success', 'Success Edit Data'); // kasih pesan success
        return redirect()->route('dataUser.index');
    }
}
