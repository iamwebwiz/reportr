<?php

namespace App\Http\Controllers\API;

use App\Report;
use App\Mail\ReportMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

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
        DB::beginTransaction();

        $report = Report::create([
            'company_name' => request('companyName'),
            'report_title' => request('reportTitle'),
            'employee_name' => request('employeeName'),
            'report_date' => request('reportDate'),
            'duration' => request('duration'),
            'tasks' => request('tasks'),
            'comments' => request('comments')
        ]);

        if ($report)
            DB::commit();
        else
            DB::rollback();
    }
}
