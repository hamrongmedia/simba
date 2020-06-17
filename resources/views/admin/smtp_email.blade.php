@extends('admin.layout')
@section('title')
  Email SMTP
@endsection

@section('css')
<!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('admin/AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('main')
  <form action="" role="form" >
    <div class="theme-options-setting box box-primary clearfix">
      <h3 class="box-title">Mail</h3>
      <div class="form-group">
        <label for="">Email đi</label>
        <input type="text" name="hrm_email_smtp" class="form-control" id="" placeholder="">
      </div>
      <div class="form-group">
        <label for="">Tên người gửi</label>
        <input type="text" name="hrm_name_smtp" class="form-control" id="" placeholder="">
      </div>
      <div class="form-group">
        <label for="">Phương thức gửi gmail</label>
        <select class="form-control" style="width: 100%;" name="hrm_formality_smtp">
          <option value="Default (none)" >Default (none)</option>
          <option value="SMTP.com">SMTP.com</option>
          <option value="Pepipost">Pepipost</option>
          <option value="Sendinblue">Sendinblue</option>
          <option value="Mailgun">Mailgun</option>
          <option value="sendGrid">SendGrid</option>
          <option value="Gmail">Gmail</option>
          <option value="Amazon SES">Other SMTP</option>
        </select>
      </div>
      <h3 class="box-title">Other SMTP</h3>
      <div class="form-group">
        <label for="">SMTP Host</label>
        <input type="text" name="hrm_host_smtp" class="form-control" id="" placeholder="">
      </div>
      <div class="form-group">
        <label for="">Mã hóa</label>
        <div class="row">
            <div class="col-md-2">
              <div class="radio">
                <label>
                  <div class="iradio_minimal-blue checked">
                    <input type="radio" name="hrm_encode_smtp" class="minimal" checked="">
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
                    <input type="radio" name="hrm_encode_smtp" class="minimal" >
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
                      <input type="radio" name="hrm_encode_smtp" class="minimal">
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
          <input type="number" name="hrm_port_smtp" class="form-control" id="" placeholder="" >
      </div>
      <div class="form-group">
        <label for="">SMTP Username</label>
          <input type="text" name="hrm_username_smtp" class="form-control" id="" placeholder="" >
      </div>
      <div class="form-group">
        <label for="">SMTP Password</label>
          <input type="password" name="hrm_password_smtp" class="form-control" id="" placeholder="" >
          <span><em class="help-block">The password is stored in plain text. We highly recommend you set up your password in your WordPress configuration file for improved security.</em></span>
          <span><em class="help-block">define( 'WPMS_SMTP_PASS', 'your_password' );</em></span>
      </div>
       <div class="clearfix box-header box-footer text-right">
        <button type="button" class="btn btn-primary btn-sm" name="">Save</button>
        <input type="hidden" class="" name="" >
      </div>

    </div>
  </form>
@endsection

