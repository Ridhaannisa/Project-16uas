@extends('template.base')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12 my-5">
			<div class="card">
				<div class="card-header">
					Detail Pada Kategori {{$kategori->nama}}
				</div>

				<div class="card-body">
					<table class="table table-responsive">
						<thead class="thead-dark">
					    <tr>
					      <th scope="col">No</th>
					       <th scope="col">Aksi</th>
					      <th scope="col">Nama Kategori</th>
					      <th scope="col">Stok</th>
					    </tr>
					  </thead>
						<tbody>
							@foreach($kategori->produk as $produk)
								<tr>
									<td>{{$loop->iteration}}</td>
									<td>
					      				<a href="{{url('admin/produk')}}" class="btn btn-dark btn-sm"><i class="fa fa-eye"></i></a>
					     			 </td>
									<td>{{$produk->nama}}</td>
									<td>{{$produk->stok}}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection