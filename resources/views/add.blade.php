@extends('layout')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="page-header">
                    <h1>{{ trans('app.add') }}</h1>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/add') }}">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label">{{ trans('app.content') }}</label>
                                <div class="col-md-8">
                                    <textarea class="form-control" rows="20" name="content">{{ old('content') }}</textarea>
                                    @if ($errors->has('content'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-floppy-o"></i>{{ trans('app.add') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection