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
          <input type="hidden" id="_url" value="{{ url('password/email') }}">
          <input type="hidden" id="_token" value="{{ csrf_token() }}">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" id="email" name="email" placeholder="Correo electrónico">
            <span class="fa fa-envelope form-control-feedback"></span>
            <span class="missing_alert text-danger" id="email_alert"></span>
          </div>
          <div class="row">
            <div class="col-xs-5">
              <button type="submit" class="btn btn-primary btn-block ajax" >
                <i id="ajax-icon" class="fa fa-envelope"></i> Recuperar
              </button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('js/admin/auth/email.js') }}"></script>
@endpush
