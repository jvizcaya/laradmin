@extends('layouts.adminfront')

@section('title', 'Recuperar contraseña')

@section('content')

    <div class="login-box">
      <div class="login-logo">
        <a href="{{ url('/') }}"><b>Lar</b>admin</a>
      </div>
      <div class="login-box-body">
        <p class="login-box-msg">Recuperar contraseña</p>
        <form id="main-form">
          <input type="hidden" id="_url" value="{{ route('password.request') }}">
          <input type="hidden" id="_redirect" value="{{ url('') }}">
          <input type="hidden" id="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="token" value="{{ $token }}">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" id="email" name="email" placeholder="Correo electrónico">
            <span class="fa fa-envelope form-control-feedback"></span>
            <span class="missing_alert text-danger" id="email_alert"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" id="password" name="password" placeholder="Nueva Contraseña">
            <span class="fa fa-lock form-control-feedback"></span>
            <span class="missing_alert text-danger" id="password_alert"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirmar Nueva Contraseña">
            <span class="fa fa-lock form-control-feedback"></span>
            <span class="missing_alert text-danger" id="password_confirmation_alert"></span>
          </div>
          <div class="row">
            <div class="col-xs-5">
              <button type="submit" class="btn btn-primary btn-block ajax" >
                <i id="ajax-icon" class="fa fa-edit"></i> Resetear
              </button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('js/admin/auth/reset.js') }}"></script>
@endpush
