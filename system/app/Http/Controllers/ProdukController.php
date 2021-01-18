<?php 


namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Desa;

/**
 * 
 */
class ProdukController extends Controller
{
	
	function index()
	{	
		$user = request()->user();
		$data['list_produk'] = Produk::all();
		return view('admin/produk/index', $data);
	}
	
	function create()
	{	
		
		$data['list_kategori'] = Kategori::all();
		return view('admin/produk/create', $data);
	}
	
	function store()
	{
		$produk = new Produk;
		$produk->id_user = request()->user()->id;
		$produk->nama = request('nama');
		$produk->harga = request('harga');
		$produk->id_kategori = request('id_kategori');
		$produk->stok = request('stok');
		$produk->berat = request('berat');
		$produk->deskripsi = request('deskripsi');
		$produk->save();

		$produk->handleUploadFoto();

		return redirect('admin/produk')->with('success', 'Data Berhasil di Tambahkan');
	}
	
	function show(Produk $produk)
	{
		
		$data['produk'] = $produk;
		return view('admin/produk/show', $data);
	}
	
	function edit(Produk $produk)
	{
		$data['produk'] = $produk;
		$data['list_kategori'] = Kategori::all();
		return view('admin/produk/edit', $data);
		
	}
	
	function update(Produk $produk)
	{
		$produk->nama = request('nama');
		$produk->harga = request('harga');
		$produk->id_kategori = request('id_kategori');
		$produk->stok = request('stok');
		$produk->berat = request('berat');
		$produk->deskripsi = request('deskripsi');
		$produk->save();

		$produk->handleUploadFoto();

		return redirect('admin/produk')->with('success', 'Data Berhasil di Update');
	}
	
	function destroy(Produk $produk)
	{
		$produk->handleDelete();
		$produk->delete();

		return redirect('admin/produk')->with('danger', 'Data Berhasil di Hapus');
	}

	function filter(){
		$nama = request('nama');
		// $stok = explode(",", request('stok'));
		// $data['harga_min']= $harga_min = request('harga_min');
		// $data['harga_max']= $harga_max = request('harga_max');
		$data['list_produk'] = Produk::where('nama', 'like' , "%$nama%")->get();
		//$data['list_produk'] = Produk::whereIn('stok', $stok)->get();
		//$data['list_produk'] = Produk::whereBetween('harga', [$harga_min, $harga_max])->get();
		$data['nama'] = $nama;
		// $data['stok'] = request('stok');
		return view('admin/produk/index', $data);
	}

	public function testCollection()
	{
		$list_bike = ['Honda', 'Yamaha', 'Kawasaki', 'Suzuki', 'Vespa', 'BMW', 'KTM'];
		$list_bike = collect($list_bike);
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

		$data['list'] = Produk::paginate(3);
		return view('test-collection', $data);


		dd($list_bike, $list_produk);
	}


	function testAjax(){
		$data['list_provinsi'] = Provinsi::all();
		$data['list_kabupaten'] = Kabupaten::all();
		$data['list_kecamatan'] = Kecamatan::all();
		$data['list_desa'] = Desa::all();
		return view('test-ajax', $data);
	}

}