<?php 


namespace App\Http\Controllers;
use App\Models\Login;

/**
 * 
 */
class LoginController extends Controller {

} function index()
	{
		$data['list_Login'] = Login::all();
		return view('admin/login/index', $data);
	}
	
	function create()
	{	
		
		return view('admin/login/create');
	}
	
	function store()
	{
		$login = new Login;
		$login->nama = request('nama');
		$login->save();

		return redirect('admin/login')->with('success', 'Data Berhasil di Tambahkan');
	}
	
	function show(Login $login)
	{
		$data['login'] = $login;
		return view('admin/login/show', $data);
	}
	
	function edit(Login $login)
	{
		$data['login'] = $login;
		return view('admin/login/edit', $data);
		
	}
	
	function update(Login $login)
	{
		$login->nama = request('nama');
		$login->save();

		return redirect('admin/login')->with('success', 'Data Berhasil di Update');
	}
	
	function destory(Login $login)
	{
		$login->delete();

		return redirect('admin/login')->with('danger', 'Data Berhasil di Hapus');
	}
}