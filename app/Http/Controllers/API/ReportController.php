<?php

namespace App\Http\Controllers\API;

use App\Mail\ReportMail;
use Illuminate\Http\Request;
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
        $data = array();
        $data['companyName'] = request('companyName');
        $data['reportTitle'] = request('reportTitle');
        $data['employeeName'] = request('employeeName');
        $data['reportDate'] = request('reportDate');
        $data['duration'] = request('duration');
        $data['tasks'] = request('tasks');
        $data['comments'] = request('comments');

        try {
            Mail::to('iamwebwiz@gmail.com')->send(new ReportMail($data));
            return response()->json([
                'message' => 'Report sent successfully!'
            ], 200);
        } catch (\Exception $e) {
            return response()->json('Unable to send report. Please try again!');
        }
    }
}
