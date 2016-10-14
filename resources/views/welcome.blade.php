@extends('layout')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="page-header">
                    <h1>{{ $pageTitle }}</h1>
                </div>
                @foreach ($Quotes as $quote)
                <div class="panel panel-default">
                    <div class="panel-heading"><a href="{{ $quote->id }}">#{{ $quote->id }}</a></div>
                    <div class="panel-body">{{ $quote->content }}</div>
                    <div class="panel-footer">{{ $quote->created_at }}</div>
                </div>
                @endforeach
                {{ $Quotes->links() }}
            </div>
        </div>
    </div>

@endsection