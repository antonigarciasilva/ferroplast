@extends('layouts.app')
@section('title','Cargos')

@section('content')
<div>
<cargos-component>
    @csrf
</cargos-component>

</div>
@endsection
