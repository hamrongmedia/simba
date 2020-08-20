<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\SendEmailOrderToSystem as SendEmailOrderToSystem;
use Mail;
class JobSendEmailOrderToSystem implements ShouldQueue
{
  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
  protected $data;
  /**
   * Create a new job instance.
   *
   * @return void
   */
  public function __construct($data)
  {
    $this->data = $data;
  }

  /**
   * Execute the job.
   *
   * @return void
   */
  public function handle()
  {
    $email_send = getenv('MAIL_TO');
    $email = new SendEmailOrderToSystem($this->data);
    Mail::to($email_send)->send($email);
  }
}
