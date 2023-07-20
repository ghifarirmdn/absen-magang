@extends('layouts.admin')

@section('container')
    <div class="row">
        <h3 class="text-gray-700 text-3xl font-medium capitalize">Halo, <span
                class="text-orange-400">{{ Auth::user()->name }}</span></h3>
    </div>

@endsection
