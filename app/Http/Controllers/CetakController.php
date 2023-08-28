<?php

namespace App\Http\Controllers;

use App\Models\kota;
use App\Models\MFormulir;
use App\Models\provinsi;
use Illuminate\Http\Request;
use Dompdf\Dompdf;


class CetakController extends Controller
{
    public function main(Request $request)
    {
        $id = $request->query('id');
        $dataUser = MFormulir::where('id_users', $id)->get();

        return view('cetak.index', ['dataUser' => $dataUser]);
    }

    public function cetak(Request $request)
    {
        $id = $request->query('id');
        $dataUser = MFormulir::where('id', $id)->get();

        $view = view('cetak.index', ['dataUser' => $dataUser]);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($view->render());
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $pdfContent = $dompdf->output();

        // Set the appropriate headers for PDF download
        $headers = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="pendaftaran.pdf"',
        ];

        return response($pdfContent, 200, $headers);
    }
}
