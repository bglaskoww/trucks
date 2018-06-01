@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Add new Truck</h3>
        </div>
        <div class="panel-body">
            <form action="{{ route('tractors.store') }}" method="post">
                {{ csrf_field() }}

                @include('tractors._form', ['buttonText' => 'Store'])
            </form>
        </div>
    </div>
@endsection
