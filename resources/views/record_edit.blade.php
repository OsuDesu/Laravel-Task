@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-md-offset-2">
            <div class="card card-default">
                <div class="card-header">Record edit</div>
                <div class="card-body justify-content-center">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/update/'.$record->id) }}">
                        @csrf

                        <div class="form-group">
                            <label class="col-md-4 control-label">Name</label>
                                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" value="{{ $record->name }}">

                                @if ($errors->has('name'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Author</label>
                                <input type="text" class="form-control {{ $errors->has('author') ? 'is-invalid' : '' }}" name="author" value="{{ $record->author }}">
                                @if ($errors->has('author'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('author') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                                <button type="submit" class="btn btn-success float-right">
                                    <i class="fa fa-btn fa-user"></i>Done
                                </button>
                        </div>
			<input type="hidden" name="url" value="{{ url()->previous() }}">

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
