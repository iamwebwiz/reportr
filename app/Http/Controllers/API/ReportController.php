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
        $report->recipient = $request->recipient;
        $report->sender_email = $request->senderEmail;
        $report->sender_name = $request->senderName;
        $report->save();

        $path = 'storage/reports/' . $report['id'] . '.pdf';
        $tasks = json_decode($report['tasks'], true);

        $pdf = PDF::loadView('pdfView', compact('report', 'tasks'));
        $pdf->save($path);

        Mail::to($report['recipient'])->send(new ReportMail($report));

        return response()->json('Report has been sent', 201);

    }
}
