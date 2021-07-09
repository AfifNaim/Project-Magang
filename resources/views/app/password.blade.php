@extends('app.master')

@section('konten')

<div class="main-content">

<section class="section">
    <div class="section-header">
      <h1>Edit Password</h1>
    </div>

    <div class="col p-md-0">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item active">Ganti Password</a></li>
      </ol>
    </div>
  </section>

  <div class="container-fluid">
    <div class="card">
      <div class="card-header pt-4">
        <p>Pada menu ini kita melakukan penggantian paswword User<p>
      </div>
      </div>
  </div>

  <div class="container-fluid">


    <div class="card">

      <div class="card-header pt-4">
        <h3 class="card-title">Ganti Password</h3>
      </div>
      <div class="card-body">

        @if (session('error'))
        <div class="alert alert-danger">
          {{ session('error') }}
        </div>
        @endif
        @if (session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
        @endif


        <form class="form-horizontal" method="POST" action="{{ route('password.update') }}">
          {{ csrf_field() }}

          <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
            <label for="new-password" class="col-md-4 control-label">Password Sekarang</label>

            <div class="col-md-4">
              <input id="current-password" type="password" placeholder="********" class="form-control" name="current-password">

              @if ($errors->has('current-password'))
              <span class="help-block">
                <strong>{{ $errors->first('current-password') }}</strong>
              </span>
              @endif
            </div>
          </div>

          <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
            <label for="new-password" class="col-md-4 control-label">Password Baru</label>

            <div class="col-md-4">
              <input id="new-password" type="password" placeholder="********" class="form-control" name="new-password">

              @if ($errors->has('new-password'))
              <span class="help-block">
                <strong>{{ $errors->first('new-password') }}</strong>
              </span>
              @endif
            </div>
          </div>

          <div class="form-group">
            <label for="new-password-confirm" class="col-md-4 control-label">Konfirmasi Password Baru</label>

            <div class="col-md-4">
              <input id="new-password-confirm" type="password" placeholder="********" class="form-control" name="new-password_confirmation">
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-8 col-md-offset-4">
              <button type="submit" class="btn btn-primary">
                Ganti Password
              </button>
            </div>
          </div>

        </form>


      </div>

    </div>
    


  </div>
  <!-- #/ container -->
</div>

@endsection