@extends('template.base')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12 mt-5">
			<div class="card">
				<div class="card-header">
					Edit Data User
				</div>
				<div class="card-body">
					<form action="{{url('admin/user', $user->id)}}" method="post">	
						@csrf
						@method("PUT")
						<div class="form-group">
							<label for="brand" class="control-label">Nama Lengkap</label>
							<input type="text" name="nama" id="brand" class="form-control" value="{{$user->nama}}">
						</div>
						<div class="form-group">
							<label for="nama" class="control-label">Username</label>
							<input type="text" name="username" id="nama" class="form-control" value="{{$user->username}}">
						</div>
						<div class="row">
						    <div class="col">
						    	<label for="harga" class="control-label">Email</label>
						      <input type="email" class="form-control" name="email" id="harga" value="{{$user->email}}">
						    </div>
						    <div class="col">
						    	<label for="stok" class="control-label">Password</label>
						      <input type="password" class="form-control" name="password" id="stok">
						    </div>
						</div>
						<div class="mt-3">
						<div class="form-group">
							<label for="nama" class="control-label">No HP</label>
							<input type="text" class="form-control" name="no_handphone" id="no_handphone">
						</div>
						</div>
						<button class="btn btn-dark btn-sm float-right mt-2"><i class="fa fa-save"></i> Simpan</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection