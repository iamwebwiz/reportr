<?php

namespace App\Http\Controllers\API;

use App\Report;
use App\Mail\ReportMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use PDF;

class ReportController extends Controller
{
    /**
     * Send a report
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function sendReport(Request $request)
    {

        $report = new Report();

        $report->company_name = $request->companyName;
        $report->report_title = $request->reportTitle;
        $report->employee_name = $request->employeeName;
        $report->report_date = $request->reportDate;
        $report->duration = $request->duration;
        $report->tasks = json_encode($request->tasks);
        $report->comments = $request->comments;
        $report->save();

        $report_id = $report->id;

        $path = 'storage/reports/' . $report_id . '.pdf';
        $pdf = PDF::loadView('pdfView', compact('report'));
        $pdf->save($path);

        $data = array (
            'reportId' => $report_id,
            'companyName' => $report->company_name,
            'name' => $report->employee_name,
            'reportDate' => $report->report_date
        );

        Mail::to('iamwebwiz@gmail.com')->send(new ReportMail($data));

        return response()->json('Report has been sent', 201);

    }
}
