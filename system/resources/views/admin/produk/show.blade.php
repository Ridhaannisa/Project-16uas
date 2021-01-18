@extends('template.base')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12 my-5">
			<div class="card">
				<div class="card-header">
					Detail Data Produk
				</div>
				<div class="card-body">
					<div class="jumbotron">
					  <h1 class="display-5">{{$produk->nama}}</h1><hr>
					  
					   	@include('admin.produk.show.detail')

					   <hr class="my-4">
					  <p>Deskripsi Produk : <br>
					  	{!! nl2br($produk->deskripsi) !!}</p>
					  	<p>
					  		<img src="{{url("public/$produk->foto")}}" alt="">
					  	</p>
					  <a class="btn btn-success btn-sm" href="#" role="button">Masukkan Keranjang</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection