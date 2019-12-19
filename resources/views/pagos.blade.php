@extends('layouts.app')
@section('title','Pagos')

@section('content')
    <pagos-component>
        @csrf
    </pagos-component>
@endsection