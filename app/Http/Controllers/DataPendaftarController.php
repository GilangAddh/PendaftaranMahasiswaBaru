<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\kota;
use App\Models\MFormulir;
use App\Models\provinsi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DataPendaftarController extends Controller
{
    public function main()
    {
        $dataPendaftar = MFormulir::all();
        // $dataProvinsi = provinsi::where('id', $dataPendaftar->provinsi);
        return view('dataPendaftar.index', ['dataPendaftar' => $dataPendaftar]);
    }

    public function ProsesDelete(Request $request)
    {
        $oldid = $request->query('oldid');
        $delItem = MFormulir::findOrFail($oldid);
        $delItem->delete();
        Session::flash('alert-success', 'Success Delete Data'); // kasih pesan success
        return redirect()->route('dataPendaftar.index');
    }

    public function tambah()
    {
        $dataUser = User::where('id_role', 1)->get();
        $dataAgama = agama::all();
        $dataProvinsi = provinsi::all();
        return view('dataPendaftar.tambah', ['dataProvinsi' => $dataProvinsi, 'dataAgama' => $dataAgama, 'dataUser' => $dataUser]);
    }

    public function store(Request $request)
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
        return redirect()->intended(route('dataPendaftar.index'));
    }

    public function edit(Request $request)
    {
        $oldid = $request->query('id');

        $dataUser = User::where('id_role', 1)->get();
        $dataAgama = agama::all();
        $dataProvinsi = provinsi::all();
        $data = MFormulir::findOrFail($oldid);
        $dataKota = kota::where('id_provinsi', $data->provinsi)->get();
        $dataKotaLahir = kota::where('id_provinsi', $data->provinsi_lahir)->get();
        return view('dataPendaftar.edit', ['data' => $data, 'dataProvinsi' => $dataProvinsi, 'dataAgama' => $dataAgama, 'dataUser' => $dataUser, 'dataKota' => $dataKota, 'dataKotaLahir' => $dataKotaLahir]);
    }

    public function editStore(Request $request)
    {
        $oldid = $request->post('oldid');

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
            'foto' => '',
        ]);

        $imageOld = $request->post('old_foto');


        $namaFoto = '';
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $namaFoto = $image->hashName();
            $image->move(public_path('foto'), $namaFoto);

            // Simpan nama file dalam $validateData untuk disimpan di database
            $validateData['foto'] = $namaFoto;
        } else {
            $validateData['foto'] = $imageOld;
        }

        MFormulir::where('id', $oldid)->update($validateData);

        Session::flash('alert-success', 'Success Edit Data'); // kasih pesan success
        return redirect()->route('dataPendaftar.index');
    }
}
