@extends('layouts.admin')

@section('title', 'Inicio')
@section('page_title', 'Inicio')
@section('page_subtitle', 'Principal')

@section('breadcrumb')
    @parent
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">Principal</li>
@endsection

@section('content')


@endsection
