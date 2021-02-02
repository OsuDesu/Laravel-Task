@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-md-offset-1">
            <div class="card card-default">
                <div class="card-header">Records
			@if(session('success'))<div class="alert alert-success mt-2 mb-2" role="alert">{{ session('success') }}</div>@endif
			@error('record_is_null')<div class="alert alert-danger mt-2 mb-2" role="alert">{{ $message }}</div>@enderror
		</div>

                <div class="card-body">
			<table class="table table-bordered">
			
				<thead>
					<th>&nbsp;</th>
					<th>Name</th>
					<th>Author</th>
					<th>Actions</th>
				</thead>
			

				<tbody>
				@foreach($records as $record)
					<tr>

			                <td><img src="{{ asset('img/record.png') }}" style="height: 32px; width: 32px;"></img>
					</td>
			                <td class="table-text">
			                  <div>{{ $record->name }}</div>
			                </td>
			                <td class="table-text">
			                  <div>{{ $record->author }}</div>
			                </td>

					  <td class="form-inline">
					    <form action="{{ url('/edit/'.$record->id) }}" method="POST" class="mr-2">
					      @csrf
					      {{ method_field('GET') }}
					
					      <button type="submit" class="btn btn-info">
					        <i class="fa fa-edit"></i> Edit
					      </button>
					    </form>

					    <form action="{{ url('/delete/'.$record->id) }}" method="POST">
					      @csrf
					      {{ method_field('DELETE') }}
					
					      <button type="submit" class="btn btn-danger">
					        <i class="fa fa-trash"></i> Delete
					      </button>
					    </form>
					  </td>
			              </tr>
				@endforeach
				</tbody>
			</table>
			<div class="pagination justify-content-center">
				{{ $records->links() }}
			</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
