@extends('layouts.admin')

@section('title', 'Usuarios')
@section('page_title', 'Usuarios')
@section('page_subtitle', 'Editar')

@section('breadcrumb')
    @parent
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="{{ url('user') }}">usuarios</a></li>
    <li class="active">Editar</li>
@endsection

@section('content')

  <section class="content">
    <div class="row">
      <div class="col-md-6">
        <div class="btn-group">
          @can('view_users')
          <a href="{{ url('user') }}" class="btn btn-primary"><i class="fa fa-sort-alpha-desc"></i> Listado</a>
          @endcan
          @can('add_users')
          <a href="{{ url('user/create') }}" class="btn btn-primary"><i class="fa fa-plus-square"></i> Ingresar</a>
          @endcan
          <a href="{{ url('user', [$user->encode_id]) }}" class="btn btn-primary"><i class="fa fa-eye"></i> Datos</a>
        </div>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <form role="form" id="main-form">
            <input type="hidden" id="_url" value="{{ url('user', [$user->encode_id]) }}">
            <input type="hidden" id="_token" value="{{ csrf_token() }}">
            <div class="box-body">
              <div class="form-group pading">
                <label for="name">Nombres</label>
                <input class="form-control" id="name" name="name" value="{{ $user->name }}" placeholder="Nombres">
                <span class="missing_alert text-danger" id="name_alert"></span>
              </div>
              <div class="form-group">
                <label for="last_name">Apellidos</label>
                <input class="form-control" id="last_name" name="last_name" value="{{ $user->last_name }}" placeholder="Apellidos">
                <span class="missing_alert text-danger" id="last_name_alert"></span>
              </div>
              <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input class="form-control" id="email" name="email" value="{{ $user->email }}" placeholder="Correo electrónico">
                <span class="missing_alert text-danger" id="email_alert"></span>
              </div>
              @if(Auth::user()->hasrole('admin') && Auth::user()->id != $user->id)
              <div class="form-group">
                <label for="role">Tipo de usuario</label>
                <div class="checkbox icheck">
                  <label>
                    <input type="radio" name="role" value="user" {{ $user->hasRole('user') ? 'checked' : '' }}> Usuario&nbsp;&nbsp;
                    <input type="radio" name="role" value="admin" {{ $user->hasRole('admin') ? 'checked' : '' }}> Administrador
                  </label>
                </div>
              </div>
              @endif
              <div class="form-group">
                <label for="password">Nueva Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                <span class="missing_alert text-danger" id="password_alert"></span>
              </div>
              <div class="form-group">
                <label for="password_confirmation">Confirmar Nueva Contraseña</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Contraseña">
                <span class="missing_alert text-danger" id="password_confirmation_alert"></span>
              </div>
              @if(Auth::user()->hasrole('admin') && Auth::user()->id != $user->id)
              <div class="form-group">
                <label for="status">Acceso al sistema</label>
                <div class="checkbox icheck">
                  <label>
                    <input type="radio" name="status" value="1" {{ $user->status == 1 ? 'checked' : '' }}> Activo&nbsp;&nbsp;
                    <input type="radio" name="status" value="0" {{ $user->status == 0 ? 'checked' : '' }}> Deshabilitado&nbsp;&nbsp;
                  </label>
                </div>
              </div>
              @endif
              <br>
              <div class="form-group">
                <label for="password">Contraseña actual ({{ Auth::user()->display_name }})</label>
                <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Contraseña actual">
                <span class="missing_alert text-danger" id="current_password_alert"></span>
              </div>
              <div class="box-footer">
              <button type="submit" class="btn btn-primary ajax" id="submit">
                <i id="ajax-icon" class="fa fa-edit"></i> Editar
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

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
    <script src="{{ asset('js/admin/user/edit.js') }}"></script>
@endpush
