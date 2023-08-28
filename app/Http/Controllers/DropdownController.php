<?php

namespace App\Http\Controllers;

use App\Models\kota;
use App\Models\provinsi;
use Illuminate\Http\Request;

class DropdownController extends Controller
{
    public function getKota($provinsiId)
    {
        $kotaList = kota::where('id_provinsi', $provinsiId)->get();
        return response()->json($kotaList);
    }
}
