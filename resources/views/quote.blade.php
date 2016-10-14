@extends('layout')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="page-header">
                    <h1>{{ trans('app.quote') }}</h1>
                </div>
                    <div class="panel panel-default">
                        <div class="panel-heading"><a href="{{ $Quote->id }}">#{{ $Quote->id }}</a></div>
                        <div class="panel-body">{{ $Quote->content }}</div>
                        <div class="panel-footer">{{ $Quote->created_at }}</div>
                    </div>
            </div>
        </div>
    </div>

@endsection