<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\kota;
use App\Models\MFormulir;
use App\Models\provinsi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


class FormController extends Controller
{

    public function getKota($provinsiId)
    {
        $data = kota::where('id_provinsi', $provinsiId)->get();
        return response()->json($data);
    }

    public function main()
    {
        $dataAgama = agama::all();
        $dataProvinsi = provinsi::all();
        return view('form.index', ['dataProvinsi' => $dataProvinsi, 'dataAgama' => $dataAgama]);
    }

    public function pendaftaran(Request $request)
    {

        $validateData = $request->validate([
            'id_users' => 'required',
            'nama' => 'required',
            'alamat_ktp' => 'required',
            'alamat_sekarang' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email',
            'kewarganegaraan' => 'required',
            'tanggal_lahir' => 'required',
            'provinsi_lahir' => 'required',
            'kota_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'status_menikah' => 'required',
            'agama' => 'required',
            'foto' => 'required|image',
        ]);

        $namaFoto = '';
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $namaFoto = $image->hashName();
            $image->move(public_path('foto'), $namaFoto);

            // Simpan nama file dalam $validateData untuk disimpan di database
            $validateData['foto'] = $namaFoto;
        }


        MFormulir::create($validateData);
        Session::flash('alert-success', 'Pendaftaran Berhasil'); // kasih pesan success
        return redirect()->intended(route('dashboard.user'));
    }
}
