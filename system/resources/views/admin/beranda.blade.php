@extends('template.base')

@section('content')

<div class="jumbotron">
  <h1 class="display-4">Hallo Selamat Datang Di Store Kami</h1>
  <p class="lead">Disini Menjual Kebutuhan Fashion Kalian 100% Original..</p>
  <hr class="my-4">
  <p>Store Kami Menjual Produk 100% Original Dan Sudah Banyak Testimoni Dari Customer Berbagai Negara.</p>
  <a class="btn btn-primary btn-lg" href="{{url('admin/produk')}}" role="button">Cari Fashionmu Disini</a>
</div>

@endsection