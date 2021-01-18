<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukResource extends Controller
{
	/**
	 * Display a Listing of the resource.
	 * 
	 * @return \Illuminate\Http\Response
	 */
	 public function index()
	 {
	 	return Produk::all();
	 	
	 } 

	 public function store()
	 {
	 	if(request('nama') && request('harga') && request('stok')  && request('berat')  && request('deskripsi') ){

	 		$produk = new Produk;
	 		$produk->nama = request('nama');
	 		$produk->harga = request('harga');
	 		$produk->stok = request('stok');
	 		$produk->berat = request('berat');
	 		$produk->deskripsi = request('deskripsi');
	 		$produk->save();

	 		return collect([
	 			'respond' => 200,
	 			'data' => $produk
	 		]);


	 	} else {
	 		return collect([
	 			'respond' => 500,
	 			'message' => "Field ada yang kosong"
	 		]);
	 	}
	 }

	 /**
	  * Display the specified resource.
	  *
	  * @param int $id
	  * @return \Illuminate\Http\Response
	  */
	 public function show($id)
	 {
	 	$produk = Produk::find($id);
	 	if($produk) {
	 		return collect([
	 			'status' => 200,
	 			'data' => $produk
	 		]);
	 	} 
	 	return collect([
	 		'respond' => 500,
	 		'message' => "Produk Tidak Ditemukan"
	 	]);
	 }

	 public function update($id)
	 {
	 	$produk = Produk::find($id);
	 	if($produk) {

	 		$produk->nama = request('nama') ?? $produk->nama;
	 		$produk->harga = request('harga') ?? $produk->harga;
	 		$produk->stok = request('stok') ?? $produk->stok;
	 		$produk->berat = request('berat') ?? $produk->berat;
	 		$produk->deskripsi = request('deskripsi') ?? $produk->deskripsi;
	 		$produk->save();

	 		return collect([
	 			'respond' => 200,
	 			'data' => $produk
	 		]);
	 	} 
	 	return collect([
	 		'respond' => 500,
	 		'message' => "Produk Tidak Ditemukan"
	 	]);
	 }
	 /**
	  * Remove the specified resource from storage.
	  * 
	  * @param int $id
	  * @return \Illuminate\Http\Response
	  */
	 public function destroy($id)
	 {
	 	$produk = Produk::find($id);
	 	if($produk) {
	 		$produk->delete();
	 		return collect([
	 			'status' => 200,
	 			'data' => "Produk Berhasil Dihapus"
	 		]);
	 	} 
	 	return collect([
	 		'respond' => 500,
	 		'message' => "Produk Tidak Ditemukan"
	 	]);
	 }

} 