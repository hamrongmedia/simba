<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MailConfig extends Model
{
    protected $table = 'mail_config';
    protected $fillable = ['mail_from_adress', 'mail_from_name', 'mail_username', 'mail_password', 'mail_mailer', 'mail_smpt_host', 'mail_encryption', 'mail_port'];
}