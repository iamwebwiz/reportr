<?php

namespace App\Http\Controllers;
use App\Report;
use PDF;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $report = Report::where('id', 7)->first();


        $pdf = PDF::loadView('pdfView', compact('report'));
        return $pdf->stream();
  

        // return response()->download('storage/pdfs/Dv92rwLagYF7MLPzv7v78Hnuf.pdf');
    }
}
