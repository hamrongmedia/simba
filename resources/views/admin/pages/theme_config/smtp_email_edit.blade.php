@extends('admin.layout')
@section('title')
  Email SMTP
@endsection

@section('css')
<!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('admin/AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('main')
<div class="row">
    <div class="col-md-6">
        <form action="{{route('admin.mailsetting.update' , $mail_edit->id)}}" method="post" role="form">
            @csrf
            <div class="theme-options-setting box box-primary clearfix">
                <h3 class="box-title">Edit Mail</h3>
                <div class="form-group">
                    <label for="">Email đi</label>
                    <input value="{{$mail_edit->mail_from_adress}}" type="text" name="mail_from_adress" class="form-control" id="" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Tên người gửi</label>
                    <input value="{{$mail_edit->mail_from_name}}" type="text" name="mail_from_name" class="form-control" id="" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Phương thức gửi gmail</label>
                    <select class="form-control" style="width: 100%;" name="mail_mailer">
                        <option value="Default (none)" {{$mail_edit->mail_mailer == "Default (none)" ? 'selected' : ''}}>Default (none)</option>
                        <option value="SMTP.com" {{$mail_edit->mail_mailer == "SMTP.com" ? 'selected' : ''}}>SMTP.com</option>
                        <option value="Pepipost" {{$mail_edit->mail_mailer == "Pepipost" ? 'selected' : ''}}>Pepipost</option>
                        <option value="Sendinblue" {{$mail_edit->mail_mailer == "Sendinblue" ? 'selected' : ''}}>Sendinblue</option>
                        <option value="Mailgun" {{$mail_edit->mail_mailer == "Mailgun" ? 'selected' : ''}}>Mailgun</option>
                        <option value="sendGrid" {{$mail_edit->mail_mailer == "sendGrid" ? 'selected' : ''}}>SendGrid</option>
                        <option value="Gmail" {{$mail_edit->mail_mailer == "Gmail" ? 'selected' : ''}}>Gmail</option>
                        <option value="Amazon SES" {{$mail_edit->mail_mailer == "Amazon SES" ? 'selected' : ''}}>Other SMTP</option>
                    </select>
                </div>
                <h3 class="box-title">Other SMTP</h3>
                <div class="form-group">
                    <label for="">SMTP Host</label>
                    <input value="{{$mail_edit->mail_smpt_host}}" type="text" name="mail_smpt_host" class="form-control" id="" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Mã hóa</label>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="radio">
                                <label>
                                    <div class="iradio_minimal-blue checked">
                                        <input type="radio" value="" name="mail_encryption" class="minimal" {{$mail_edit->mail_encryption == null ? 'checked' : ''}} >
                                        <ins class="iCheck-helper"></ins>
                                        Không
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="radio">
                                <label>
                                    <div class="iradio_minimal-blue checked">
                                        <input type="radio" value="ssl" name="mail_encryption" class="minimal" {{$mail_edit->mail_encryption == 'ssl' ? 'checked' : ''}}>
                                        <ins class="iCheck-helper"></ins>
                                        SSl
                                    </div>
                                </label>
                            </div>

                        </div>
                        <div class="col-md-2">
                            <div class="radio">
                                <label>
                                    <div class="iradio_minimal-blue checked">
                                        <input type="radio" value="tls" name="mail_encryption" class="minimal" {{$mail_edit->mail_encryption == 'tls' ? 'checked' : ''}}>
                                        <ins class="iCheck-helper"></ins>
                                        TLS
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">SMTP Port</label>
                    <input value="{{$mail_edit->mail_port}}" type="number" name="mail_port" class="form-control" id="" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">SMTP Username</label>
                    <input value="{{$mail_edit->mail_username}}" type="text" name="mail_username" class="form-control" id="" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">SMTP Password</label>
                    <input value="{{$mail_edit->mail_password}}" type="password" name="mail_password" class="form-control" id="" placeholder="">
                    <span><em class="help-block">The password is stored in plain text. We highly recommend you set up
                            your password in your WordPress configuration file for improved security.</em></span>
                    <span><em class="help-block">define( 'WPMS_SMTP_PASS', 'your_password' );</em></span>
                </div>
                <div class="clearfix box-header box-footer text-right">
                    <button type="submit" class="btn btn-primary btn-sm" name="">Save</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <div class="theme-options-setting box box-primary clearfix">
            <h3 class="box-title">Mail List</h3>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Task</th>
                        <th>Phương thức gửi</th>
                        <th style="width: 80px">Thao tác</th>
                    </tr>
                    @foreach ($mails as $mail)
                        <tr>
                            <td>1.</td>
                            <td>{{$mail->mail_from_adress}}</td>
                            <td>
                                {{$mail->mail_mailer}}
                            </td>
                            <td style="text-align: center">
                                <a href="{{route('admin.mailsetting.edit', $mail->id)}}">
                                    <i class="fa fa-pencil p-1" style="margin-right: 10px" aria-hidden="true"></i>
                                </a>
                                <a href="{{route('admin.mailsetting.delete', $mail->id)}}">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="clearfix box-header box-footer text-right">
                <button type="button" class="btn btn-primary btn-sm" name="">Save</button>
                <input type="hidden" class="" name="">
            </div>
        </div>
    </div>
</div>

@endsection

