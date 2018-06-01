@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Edit Plowing #{{ $plotTractor->id }}</h3>
        </div>
        <div class="panel-body">
            <form action="{{ route('plot-tractor.update', $plotTractor) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('patch') }}

                @include('plot-tractor._form', ['buttonText' => 'Update'])
            </form>
        </div>
    </div>
@endsection