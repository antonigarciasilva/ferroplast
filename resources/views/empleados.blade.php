@extends('layouts.app')
@section('title','Empleados')

@section('content')
    <empleados-component>
        @csrf
    </empleados-component>
@endsection