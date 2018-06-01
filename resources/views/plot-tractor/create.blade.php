@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Add new Plowing </h3>
        </div>
        <div class="panel-body">
            <form action="{{ route('plot-tractor.store') }}" method="post">
                {{ csrf_field() }}

                @include('plot-tractor._form', ['buttonText' => 'Store'])
            </form>
        </div>
    </div>
@endsection
