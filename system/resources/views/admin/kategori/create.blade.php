@extends('template.base')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12 mt-5">
			<div class="card">
				<div class="card-header">
					Tambah Data Kategori
				</div>
				<div class="card-body">
					<form action="{{url('admin/kategori')}}" method="post">	
						@csrf
						
						<div class="form-group">
							<label for="nama" class="control-label">Nama Kategori</label>
							<input type="text" name="nama" id="nama" class="form-control">
						</div>
						<button class="btn btn-dark btn-sm float-right"><i class="fa fa-save"></i> Simpan</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection