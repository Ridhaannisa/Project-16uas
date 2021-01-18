<?php 


namespace App\Http\Controllers;
use Auth;
use App\Models\Pembeli;
use App\Models\Penjual;
use App\Models\User;
/**
 * 
 */
class AuthController extends Controller
{
	
	function showLogin()
	{
		return view('login');	
	}
	
	function prosesLogin()
	{
		if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
			return redirect('admin/beranda')->with('success', 'Login berhasil');
		} else {

		$email = request('email');
		$user = Pembeli::where('email', $email)->first();
		if($user){
			$guard = 'pembeli';
		} else{
			$user = Penjual::where('email', $email)->first();
			if($user){
			$guard = 'penjual';
		} else{
			$guard = false;
		}
	}

		
		if(!$guard) {
			return back()->with('danger', 'Login Gagal, Email Tidak Ditemukan Di Database');
		}else{
			if(Auth::guard($guard)->attempt(['email' => request('email'), 'password' => request('password')])){
				return redirect("beranda/$guard")->with('success', 'Login Berhasil');
			}else{
				return back()->with('danger', 'Login anda gagal, mohon periksa email atau password anda!');
			}
		}

			return back()->with('danger', 'Login anda gagal, mohon periksa email atau password anda!');
	}

		
	// 	$email = request('email');
	// 	$user = Pembeli::where('email', $email)->first();
	// 	if($user){
	// 		$guard = 'pembeli';
	// 	} else{
	// 		$user = Penjual::where('email', $email)->first();
	// 		if($user){
	// 		$guard = 'penjual';
	// 	} else{
	// 		$guard = false;
	// 	}
	// }

	// 	if(!$guard) {
	// 		return back()->with('danger', 'Login Gagal, Email Tidak Ditemukan Di Database');
	// 	}else{
	// 		if(Auth::guard($guard)->attempt(['email' => request('email'), 'password' => request('password')])){
	// 			return redirect("beranda/$guard")->with('success', 'Login Berhasil');
	// 		}else{
	// 			return back()->with('danger', 'Login anda gagal, mohon periksa email atau password anda!');
	// 		}
	// 	}

		// if($user->level == 1) return redirect('admin/beranda')->with('success', 'Login berhasil');
			// if($user->level == 0) return redirect('beranda/pengguna')->with('success', 'Login berhasil');

		//if(request('login_as') == 1){
		//	if(Auth::guard('pembeli')->attempt(['email' => request('email'), 'password' => request('password')])){
		//		return redirect('beranda/pembeli')->with('success', 'Login Berhasil');
		//	}else{
		//		return back()->with('danger', 'Login anda gagal, mohon periksa email atau password anda!');
		//	}
		//	} else{
		//	if(Auth::guard('penjual')->attempt(['email' => request('email'), 'password' => request('password')])){
		//		return redirect('beranda/penjual')->with('success', 'Login Berhasil');
		//	}else{
		//		return back()->with('danger', 'Login anda gagal, mohon periksa email atau password anda!');
		//	}
		//	}
	}
	
	function logout()
	{
		Auth::logout();
		Auth::guard('pembeli')->logout();
		Auth::guard('penjual')->logout();
		return redirect('/');
		
	}
	
	function showRegistrasi()
	{
		return view('registrasi');
	}

	function store()
	{
		$user = new User;
		$user->nama = request('nama');
		$user->username = request('username');
		$user->email = request('email');
		$user->password = bcrypt(request('password'));
		$user->save();

		return redirect('login')->with('success', 'Selamat! Anda Berhasil Mendaftar. Silahkan Login');
	}
	
	function forgotPassword()
	{
		
	}

}