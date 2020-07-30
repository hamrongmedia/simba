<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailOrderToUser extends Mailable
{
  use Queueable, SerializesModels;
  protected $data;
  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct($data)
  {
    $this->data = $data;
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
    return $this->from(getenv('MAIL_USERNAME'), getenv('MAIL_NAME'))
                ->subject('Xác nhận thông tin mua hàng')
                ->view('Mail.order_success_to_customer')
                ->with([
                  'user' => $this->data['user'],
                  'order' => $this->data['order'],
                  'data_order_detail' => $this->data['data_order_detail'],
                ]);
  }
}
