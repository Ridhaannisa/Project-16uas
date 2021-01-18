<?php 


namespace App\Http\Controllers;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\Kategori;
use App\Models\Produk;
use App\Http\Requests\UserStoreRequest;
use App\Models\ClientProduk;
/**
 * 
 */
class UserController extends Controller
{
	
	function index()
	{
		$data['list_user'] = User::withCount('produk')->get();
		return view('admin/user/index', $data);
	}
	
	function create()
	{
		
		return view('admin/user/create');
	}
	
	function store(UserStoreRequest $request)
	{
		$user = new User;
		$user->nama = request('nama');
		$user->username = request('username');
		$user->email = request('email');
		$user->password = request('password');
		$user->save();

		$userDetail = new UserDetail;
		$userDetail->id_user = $user->id;
		$userDetail->no_handphone = request('no_handphone');
		$userDetail->save();

		return redirect('admin/user')->with('success', 'Data Berhasil di Tambahkan');
	}
	
	function show(User $user)
	{
		
		$data['user'] = $user;
		$data['list_kategori'] = Kategori::all();
		return view('admin/user/show', $data);
	}
	
	function edit(User $user)
	{
		$data['user'] = $user;
		return view('admin/user/edit', $data);
		
	}
	
	function update(User $user)
	{
		$user->nama = request('nama');
		$user->username = request('username');
		$user->email = request('email');
		if(request('password')) $user->password = request('password');
		$user->save();

		return redirect('admin/user')->with('success', 'Data Berhasil di Update');
	}
	
	function destroy(User $user)
	{
		$user->delete();

		return redirect('admin/user')->with('danger', 'Data Berhasil di Hapus');
	}
}