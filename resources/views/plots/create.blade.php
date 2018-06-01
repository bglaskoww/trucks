@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Add new Field</h3>
        </div>
        <div class="panel-body">
            <form action="{{ route('plots.store') }}" method="post">
                {{ csrf_field() }}

                @include('plots._form', ['buttonText' => 'Store'])
            </form>
        </div>
    </div>
@endsection
