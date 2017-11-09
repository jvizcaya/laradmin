@extends('layouts.admin')

@section('title', 'Logins')
@section('page_title', 'Logins')
@section('page_subtitle', 'Registros')

@section('breadcrumb')
    @parent
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="{{ url('user') }}">usuarios</a></li>
    <li><a href="{{ url('login') }}">logins</a></li>
    <li class="active">Registros</li>
@endsection

@section('content')

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Registros de logins</h3>
              <div class="box-tools">
                @role('admin')
                <form>
                  <input type="hidden" id="_url" value="{{ url('') }}">
                  <div class="input-group input-group-sm" id="search-content">
                    <input type="text" name="q"  value="{{ request()->q }}" class="form-control pull-right"  id="search-input" placeholder="Buscar" autocomplete="off">
                    <div class="input-group-btn">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                 </form>
                 @endrole
              </div>
            </div>
            <div class="box-body table-responsive table-striped">
              <table class="table table-hover">
                <tr>
                    <th>Usuario</th>
                    <th>Inicio</th>
                    <th>Cierre</th>
                    <th>IP</th>
                    <th>Cliente</th>
                </tr>
                @foreach ($logins as $login)
                <tr>
                  <td>{{ $login->user->full_name }}</td>
                  <td>{{ $login->login_at  }}</td>
                  <td>{{ $login->logout_at }}</td>
                  <td>{{ $login->ip_address }}</td>
                  <td>{{ $login->user_agent }}</td>
                </tr>
                @endforeach
              </table>
              <div class="box-footer clearfix">
                  {{ $logins ->links() }}
                  <p class="text-muted">Mostrando <strong>{{ $logins->count() }}</strong> registros de <strong>{{$logins->total() }}</strong> totales</p>
              </div>
         </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

@endsection

@push('scripts')
  <script src="{{ asset('js/admin/login/index.js') }}"></script>
@endpush
