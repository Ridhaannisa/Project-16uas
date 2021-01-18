<?php 


namespace App\Http\Controllers;
use App\Models\Registrasi;

/**
 * 
 */
class RegistrasiController extends Controller {

} function index()
  {
    $data['list_Registrasi'] = Registrasi::all();
    return view('admin/registrasi/index', $data);
  }
  
  function create()
  {
    return view('admin/registrasi/create');
  }
  
  function store()
  {
    $Registrasi = new Registrasi;
    $Registrasi->nama = request('nama');
    $Registrasi->save();

    return redirect('admin/registrasi')->with('success', 'Data Berhasil di Tambahkan');
  }
  
  function show(Registrasi $registrasi)
  {
    $data['registrasi'] = $registrasi;
    return view('admin/registrasi/show', $data);
  }
  
  function edit(Registrasi $registrasi)
  {
    $data['registrasi'] = $registrasi;
    return view('admin/registrasi/edit', $data);
    
  }
  
  function update(Registrasi $registrasi)
  {
    $registrasi->nama = request('nama');
    $registrasi->save();

    return redirect('admin/registrasi')->with('success', 'Data Berhasil di Update');
  }
  
  function destory(Registrasi $registrasi)
  {
    $registrasi->delete();

    return redirect('admin/registrasi')->with('danger', 'Data Berhasil di Hapus');
  }
}