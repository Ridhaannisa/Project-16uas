<?php 

namespace App\Models\Traits\Relations;

use App\Models\User;
use App\Models\Kategori;

trait ProdukRelations {

	function seller(){
		return $this->belongsTo(User::class, 'id_user');
	}

	function kategori(){
		return $this->belongsTo(Kategori::class, 'id_kategori');
	} 

	
}

