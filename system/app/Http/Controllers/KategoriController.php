<?php 


namespace App\Http\Controllers;
use App\Models\Kategori;
use App\Models\Produk;

/**
 * 
 */
class KategoriController extends Controller
{
	
	function index()
	{
		$data['list_kategori'] = Kategori::withCount('produk')->get();
		return view('admin/kategori/index', $data);
	}
	
	function create()
	{
		return view('admin/kategori/create');
	}
	
	function store()
	{
		$kategori = new Kategori;
		$kategori->nama = request('nama');
		$kategori->save();

		return redirect('admin/kategori')->with('success', 'Data Berhasil di Tambahkan');
	}
	
	function show(Kategori $kategori)
	{
		$data['kategori'] = $kategori;
		return view('admin/kategori/show', $data);
	}
	
	function edit(Kategori $kategori)
	{
		$data['kategori'] = $kategori;
		return view('admin/kategori/edit', $data);
		
	}
	
	function update(Kategori $kategori)
	{
		$kategori->nama = request('nama');
		$kategori->save();

		return redirect('admin/kategori')->with('success', 'Data Berhasil di Update');
	}
	
	function destroy(Kategori $kategori)
	{
		$kategori->delete();

		return redirect('admin/kategori')->with('danger', 'Data Berhasil di Hapus');
	}
}