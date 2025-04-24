<?php
namespace App\Mail;

use App\Models\Report;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReportStatusChanged extends Mailable
{
    use Queueable, SerializesModels;

    public $report;

    public function __construct(Report $report)
    {
        $this->report = $report;
    }

    public function build()
    {
        return $this->subject('Status of Your Report Has Changed')
                    ->view('emails.report_status_changed');
    }
}
