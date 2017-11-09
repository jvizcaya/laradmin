@extends('layouts.admin')

@section('title', 'Usuarios')
@section('page_title', 'Usuarios')
@section('page_subtitle', 'Datos')

@section('breadcrumb')
    @parent
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="{{ url('user') }}">usuarios</a></li>
    <li class="active">datos</li>
@endsection

@section('content')

<section class="invoice">
  <div class="row">
    <div class="col-xs-12">
      <h2 class="page-header">
        <i class="fa fa-user"></i> Datos de usuario
        <small class="pull-right">{{ $user->display_name }}</small>
      </h2>
    </div>
  </div>
  <div class="row invoice-info">
    <div class="col-sm-3 invoice-col">
      <strong>Nombre</strong><br>
        {{ $user->full_name }}
    </div>
    <div class="col-sm-3 invoice-col">
      <strong>Correo electrónico</strong>
      <br>
      {{ $user->email }}
    </div>
    <div class="col-sm-3 invoice-col">
      <strong>Estatus</strong><br>
      <span class="badge {{ $user->status ? 'bg-green' : 'bg-red' }}">{{ $user->display_status }}</span>
    </div>
    <div class="col-sm-3 invoice-col">
      <strong>Tipo de usuario</strong><br>
      {{ Auth::user()->hasrole('admin') ? 'Administrador' : 'Usuario' }}
    </div>
  </div>
  <br>
  <div class="row invoice-info">
    <div class="col-sm-3 invoice-col">
      <strong>Contraseña</strong><br>
      ********
    </div>
    <div class="col-sm-3 invoice-col">
      <strong>Creado</strong>
      <br>
      {{ $user->created_at }}
    </div>
    <div class="col-sm-3 invoice-col">
      <strong>Actualizado</strong><br>
      {{ $user->updated_at }}
    </div>
    <div class="col-sm-3 invoice-col">
      <strong>Logins</strong><br>
      <i class="fa fa-eye"></i> <a href="{{ url('logins', [$user->encode_id]) }}">logins</a>
    </div>
  </div>
  <br>
  <div class="row invoice-info">
    <div class="col-sm-9 invoice-col">
      <strong>Permisos de usuario</strong><br>
      @foreach($user->getAllPermissions() as $permission)
      <span class="badge">{{  trans('permission.'.$permission->name) }}</span>&nbsp;&nbsp;
      @endforeach
    </div>
  </div>
  <br>
  <br>
  <div class="row">
    <div class="col-md-6">
      <div class="btn-group">
        @can('edit_users')
        <a href="{{ url('user', [$user->encode_id, 'edit']) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Editar</a>
        @endcan
      </div>
    </div>
  </div>
</section>

@endsection
