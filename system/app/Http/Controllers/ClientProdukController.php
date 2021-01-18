<?php 


namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\User;
use App\Models\ClientProduk;
use App\Models\Kategori;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Desa;



/**
 * 
 */
class ClientProdukController extends Controller
{
	
	function index()
	{

		$data['list_produk'] = Produk::all();
		$list_produk = Produk::all();


		// Sorting
		// Sort BY Harga Terendah
		//dd($list_produk->sortBy('harga'));
		// Sort BY Harga Tertinggi
		//dd($list_produk->sortByDesc('harga'));
		
		
		// Filter

		//$filtered = $list_produk->filter(function($item){
			//return $item->harga > 30000;
		//});
		//dd($filtered);

		//$sum = $list_produk->min('stok');

		//dd($sum);

		$data['list_produk'] = Produk::paginate(5);
		return view('client/index', $data);


		dd($list_produk);
		
	}
	
	function create(Produk $produk)
	{
		$data['list_provinsi'] = Provinsi::all();
		
		$data['produk'] = $produk;
		
		return view('client.beli', $data);
	}
	
	function store(Produk $produk)
	{
		$data['produk'] = $produk;
		

		$beli = new ClientProduk;
		$beli->nama = request('nama');
		$beli->nama_pelanggan = request('nama_pelanggan');
		$beli->alamat = request('alamat');
		$beli->no_handphone = request('no_handphone');
		$beli->harga = request('harga');
		$beli->total = request('total');
		
		$beli->save();

		return redirect('/')->with('success', 'Data Berhasil di Tambahkan ke Keranjang');
	}
	
	function lihat(){
		$data['list_pesanan'] = ClientProduk::all();
		$data['list_provinsi'] = Provinsi::all();
		

		return view('client.pesanan', $data);
	}

	function show(Produk $produk)
	{
		
		$data['produk'] = $produk;
		return view('client/show', $data);
	}
	
	function edit(ClientProduk $produk)
	{
		$data['pesanan'] = $produk;
		$data['list_produk'] = Produk::all();

		
		return view('client/edit', $data);
		
	}
	
	function update(ClientProduk $produk)
	{
		
		$produk->total = request('total');

		$produk->save();

		return redirect('pesanan')->with('success', 'Data Berhasil di Update');
	}
	
	function destroy(ClientProduk $produk)
	{
		$produk->delete();

		return redirect('pesanan')->with('danger', 'Data Berhasil di Hapus');
	}

	function Clientfilter(){
		$nama = request('nama');
		
		$data['list_produk'] = Produk::where('nama', 'like' , "%$nama%")->get();
		
		$data['nama'] = $nama;
	
		return view('/', $data);
	}

	

	

}