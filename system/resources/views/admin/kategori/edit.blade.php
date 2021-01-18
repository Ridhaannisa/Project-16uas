@extends('template.base')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12 mt-5">
			<div class="card">
				<div class="card-header">
					Edit Data Kategori
				</div>
				<div class="card-body">
					<form action="{{url('admin/kategori', $kategori->id)}}" method="post">	
						@csrf
						@method("PUT")
						
						<div class="form-group">
							<label for="nama" class="control-label">Nama Kategori</label>
							<input type="text" name="nama" id="nama" class="form-control" value="{{$kategori->nama}}">
						</div>
						<button class="btn btn-success btn-sm float-right"><i class="fa fa-save"></i> Update Data</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection