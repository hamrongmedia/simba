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
        <span><em class="help-block">The email address which emails are sent from.</em></span>
      </div>
      <div class="form-group">
        <label for="">Tên người gửi</label>
        <input type="text" name="hrm_name_smtp" class="form-control" id="" placeholder="">
        <span><em class="help-block">The name which emails are sent from.</em></span>
      </div>
      <div class="form-group">
        <label for="">Phương thức gửi gmail</label>
        <div class="row">
            <div class="col-md-2">
              <div class="radio text-center ">
                <div class="box-body text-center border-y justify-center items-center flex">
                   <img src="{{asset('images/php.svg')}}" alt="">
                </div>
                <label>
                  <div class="iradio_minimal-blue checked">
                    <input type="radio" name="hrm_sd_smtp" class="minimal" checked="">
                    <ins class="iCheck-helper"></ins>
                    Default (none)
                  </div>
                </label>
              </div>
            </div> {{-- end --}}
            <div class="col-md-2">
              <div class="radio text-center ">
                <div class="box-body text-center border-y justify-center items-center flex">
                   <img src="{{asset('images/smtp-com.svg')}}" alt="">
                </div>
                <label>
                  <div class="iradio_minimal-blue checked">
                    <input type="radio" name="hrm_sd_smtp" class="minimal">
                    <ins class="iCheck-helper"></ins>
                    SMTP.com
                  </div>
                </label>
              </div>
            </div> {{-- end --}}

             <div class="col-md-2">
              <div class="radio text-center ">
                <div class="box-body text-center border-y justify-center items-center flex">
                   <img src="{{asset('images/pepipost.png')}}" alt="">
                </div>
                <label>
                  <div class="iradio_minimal-blue checked">
                    <input type="radio" name="hrm_sd_smtp" class="minimal">
                    <ins class="iCheck-helper"></ins>
                    Pepipost
                  </div>
                </label>
              </div>
            </div> {{-- end --}}
            <div class="col-md-2">
              <div class="radio text-center ">
                <div class="box-body text-center border-y justify-center items-center flex">
                   <img src="{{asset('images/sendinblue.svg')}}" alt="">
                </div>
                <label>
                  <div class="iradio_minimal-blue checked">
                    <input type="radio" name="hrm_sd_smtp" class="minimal">
                    <ins class="iCheck-helper"></ins>
                     Sendinblue
                  </div>
                </label>
              </div>
            </div> {{-- end --}}
            <div class="col-md-2">
              <div class="radio text-center ">
                <div class="box-body text-center border-y justify-center items-center flex">
                   <img src="{{asset('images/mailgun.svg')}}" alt="">
                </div>
                <label>
                  <div class="iradio_minimal-blue checked">
                    <input type="radio" name="hrm_sd_smtp" class="minimal">
                    <ins class="iCheck-helper"></ins>
                    Mailgun
                  </div>
                </label>
              </div>
            </div> {{-- end --}}
            <div class="col-md-2">
              <div class="radio text-center ">
                <div class="box-body text-center border-y justify-center items-center flex">
                   <img src="{{asset('images/sendgrid.svg')}}" alt="">
                </div>
                <label>
                  <div class="iradio_minimal-blue checked">
                    <input type="radio" name="hrm_sd_smtp" class="minimal">
                    <ins class="iCheck-helper"></ins>
                    SendGrid
                  </div>
                </label>
              </div>
            </div> {{-- end --}}
            <div class="col-md-2">
              <div class="radio text-center ">
                <div class="box-body text-center border-y justify-center items-center flex">
                   <img src="{{asset('images/google.svg')}}" alt="">
                </div>
                <label>
                  <div class="iradio_minimal-blue checked">
                    <input type="radio" name="hrm_sd_smtp" class="minimal">
                    <ins class="iCheck-helper"></ins>
                    Gmail
                  </div>
                </label>
              </div>
            </div> {{-- end --}}
             <div class="col-md-2">
              <div class="radio text-center ">
                <div class="box-body text-center border-y justify-center items-center flex">
                   <img src="{{asset('images/smtp.svg')}}" alt="">
                </div>
                <label>
                  <div class="iradio_minimal-blue checked">
                    <input type="radio" name="hrm_sd_smtp" class="minimal">
                    <ins class="iCheck-helper"></ins>
                    Other SMTP
                  </div>
                </label>
              </div>
            </div> {{-- end --}}
        </div>
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

