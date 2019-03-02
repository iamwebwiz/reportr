<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReportMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Array of data being sent to view
     */
    public $report;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($report)
    {
        $this->report = $report;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $reportDate = $this->report['report_date'];
        $reportDate = date('d/m/Y', strtotime($reportDate));

        return $this->view('mail')
                    ->from($this->report['sender_email'], $this->report['sender_name'])
                    ->subject("Report for {$reportDate}")
                    ->attach(storage_path('app/public/reports/'.$this->report['id'].'.pdf'));
    }
}
