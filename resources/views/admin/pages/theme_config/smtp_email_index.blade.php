@extends('admin.layout')
@section('title')
  Email SMTP
@endsection

@section('css')
<!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('template/AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('main')
<div class="row">
    <div class="col-md-6">
        <form action="{{route('admin.mailsetting.store')}}" method="post" role="form">
            @csrf
            <div class="theme-options-setting box box-primary clearfix">
                <h3 class="box-title">Mail</h3>
                <div class="form-group">
                    <label for="">Email đi</label>
                    <input type="text" name="mail_from_adress" class="form-control" id="" placeholder="">
                    @error('mail_from_adress')
                        <strong class="text-red">{{$message}}</strong>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="">Tên người gửi</label>
                    <input type="text" name="mail_from_name" class="form-control" id="" placeholder="">
                    @error('mail_from_name')
                        <strong class="text-red">{{$message}}</strong>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="">Phương thức gửi gmail</label>
                    <select class="form-control" style="width: 100%;" name="mail_mailer">
                        <option value="Default (none)">Default (none)</option>
                        <option value="SMTP.com">SMTP.com</option>
                        <option value="Pepipost">Pepipost</option>
                        <option value="Sendinblue">Sendinblue</option>
                        <option value="Mailgun">Mailgun</option>
                        <option value="sendGrid">SendGrid</option>
                        <option value="Gmail">Gmail</option>
                        <option value="Amazon SES">Other SMTP</option>
                    </select>
                    @error('mail_mailer')
                        <strong class="text-red">{{$message}}</strong>
                    @enderror
                </div>
                <h3 class="box-title">Other SMTP</h3>
                <div class="form-group">
                    <label for="">SMTP Host</label>
                    <input type="text" name="mail_smpt_host" class="form-control" id="" placeholder="">
                    @error('mail_smpt_host')
                        <strong class="text-red">{{$message}}</strong>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Mã hóa</label>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="radio">
                                <label>
                                    <div class="iradio_minimal-blue checked">
                                        <input value="none" type="radio" name="mail_encryption" class="minimal" checked >
                                        <ins class="iCheck-helper"></ins>
                                        Không
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="radio">
                                <label>
                                    <div value="ssl"  class="iradio_minimal-blue checked">
                                        <input type="radio" value="ssl" name="mail_encryption" class="minimal">
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
                                        <input value="tls"  type="radio" name="mail_encryption" class="minimal">
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
                    <input type="number" name="mail_port" class="form-control" id="" placeholder="">
                    @error('mail_post')
                        <strong class="text-red">{{$message}}</strong>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="">SMTP Username</label>
                    <input type="text" name="mail_username" class="form-control" id="" placeholder="">
                    @error('mail_username')
                        <strong class="text-red">{{$message}}</strong>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="">SMTP Password</label>
                    <input type="password" name="mail_password" class="form-control" id="" placeholder="">
                    @error('mail_password')
                        <strong class="text-red">{{$message}}</strong>
                    @enderror
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

