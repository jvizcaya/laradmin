@extends('layouts.adminfront')

@section('title', 'Login')

@section('content')

    <div class="login-box">
      <div class="login-logo">
        <a href="{{ url('/') }}"><b>Lar</b>admin</a>
      </div>
      <div class="login-box-body">
        <p class="login-box-msg">Ingreso al sistema</p>
        <form id="main-form">
          <input type="hidden" id="_url" value="{{ url('login') }}">
          <input type="hidden" id="_redirect" value="{{ url('') }}">
          <input type="hidden" id="_token" value="{{ csrf_token() }}">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" id="email" name="email" placeholder="Correo electrónico">
            <span class="fa fa-envelope form-control-feedback"></span>
            <span class="missing_alert text-danger" id="email_alert"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
            <span class="fa fa-lock form-control-feedback"></span>
            <span class="missing_alert text-danger" id="password_alert"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox" id="remember" name="remember"> Recordar sesión
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block ajax" >
                <i id="ajax-icon" class="fa fa-sign-in"></i> Ingresar
              </button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <a href="{{ route('password.request') }}">Recuperar contraseña</a><br>
      </div>
    </div>

@endsection

@push('scripts')
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
    <script src="{{ asset('js/admin/auth/login.js') }}"></script>
@endpush
