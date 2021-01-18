<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cart;

use Illuminate\Http\Request;

class CartResource extends Controller
{
	/**
	 * Displat a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$list_produk = Cart::all();
		return $list_produk->toJson();

		// 	menampilkan list_produk
		// return Cart:: all();

	}

	public function store()
	{
		if(request('id_user') && request('nama_produk') && request('foto') && request('harga') && request('berat') && request('deskripsi') && request('stok')){

			$cart = new Cart;
			$cart->id_user = request('id_user');
			$cart->nama = request('nama');
			$cart->id_kategori = request('id_kategori');
			
			$cart->harga = request('harga');
			$cart->berat = request('berat');
			$cart->deskripsi = request('deskripsi');
			$cart->stok = request('stok');
			$cart->save();

			$cart->handleUploadFoto();

			return collect([
				'respond' => 200,
				'data' => $cart
			]);
		} else {
			return collect([
				'respond' => 500,
				'message' => "Ada Field yang kosong"

			]);
		}
	}

	public function show($id)
	{
		$produk = Cart::find($id);
		if($produk) {
			return collect ([
				'status' =>200,
				'data' => $produk
			]);
		}
		return collect([
			'respond' =>500,
			'message' => "Produk tidak ditemukan"
		]);
	}

	public function update($id)
	{
		$produk = Cart::find($id);
		if($produk){
			$produk->nama = request('nama') ?? $produk->nama;
			$produk->harga = request('harga') ?? $produk->nama;
			$produk->id_kategori = request('id_kategori') ?? $produk->nama;
			$produk->stok = request('stok') ?? $produk->nama;
			$produk->berat = request('berat') ?? $produk->nama;
			$produk->deskripsi = request('deskripsi') ?? $produk->nama;
			$produk->save();

			$produk->handleUploadFoto();
			
			return collect([
				'status' =>200,
				'data' => $produk
			]);
		}
		return collect([
			'respond' => 500,
			'message' => "Produk tidak ditemukan"
		]);
	}

	public function destroy($id)
	{
		$produk = Cart::find($id);
		if($produk) {
			$produk->delete($id);
			return collect ([
				'status' =>200,
				'data' => "Produk berhasil dihapus"
			]);
		}
		return collect([
			'respond' => 500,
			'message' => "Produk tidak ditemukan"
		]);
	}
}