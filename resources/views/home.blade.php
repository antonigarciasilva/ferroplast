@extends('layouts.app')
@section('title','Panel de control')
@section('content')
<div class="row">
    <div class="col-md-6 col-lg-6">
      <a href="empleados" class="card card-hover">
        <div class="box bg-cyan text-center">
          <h1 class="font-light text-white">
            <i class="mdi mdi-account"></i>
          </h1>
          <h6 class="text-white">Empleados</h6>
        </div>
      </a>
    </div>
    <div class="col-md-6 col-lg-6">
      <a href="cargos" class="card card-hover">
        <div class="box bg-success text-center">
          <h1 class="font-light text-white">
            <i class="mdi mdi-briefcase"></i>
          </h1>
          <h6 class="text-white">Cargos</h6>
        </div>
      </a>
    </div>
    <div class="col-md-6 col-lg-6">
        <a href="pagos" class="card card-hover">
          <div class="box bg-danger text-center">
            <h1 class="font-light text-white">
              <i class="mdi mdi-cash"></i>
            </h1>
            <h6 class="text-white">Pagos</h6>
          </div>
        </a>
      </div>
  </div>
@endsection
