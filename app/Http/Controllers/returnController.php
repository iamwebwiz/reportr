<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\Http\Controllers\Controller;
use PDF;

class returnController extends Controller
{
    // display pdf page here
    public function index($id) {
        $report_id = $id;
        $report = Report::where('id', $report_id)->first();

        $path = 'storage/pdfs/' . $report_id . '.pdf';
        $pdf = PDF::loadView('pdfView', compact('report'));
        return $pdf->stream();
    }

    // download pdf
    public function download($id) {
        $report_id = $id;
        $report = Report::where('id', $report_id)->first();

        $path = 'storage/pdfs/' . $report_id . '.pdf';
        $fileName = $report->employee_name .'_'. $report->report_date .'.pdf';
        $pdf = PDF::loadView('pdfView', compact('report'));
        return $pdf->download($fileName);
    }
}
