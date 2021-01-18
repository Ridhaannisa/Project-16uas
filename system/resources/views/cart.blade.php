@extends('customer.template.baseUser')
@section('content')
    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
						        <th>Product name</th>
						        <th>Price</th>
						        <th>Quantity</th>
						        <th>Total</th>
						      </tr>
						    </thead>
						    <tbody>
						    @foreach ($list_cart as $list_cart)
						      <tr class="text-center">
						        <td class="product-remove"><a href="#"><span class="ion-ios-close"></span></a></td>
						        
						        <td class="image-prod"><div class="img" style="background-image:url({{ url("system/public/$list_cart->foto")}})"></div></td>
						        
						        <td class="product-name">
						        	<h3>{{$list_cart->nama_produk}}</h3>
						        </td>
						        
						        <td class="price">Rp. {{number_format($list_cart->harga)}}</td>
						        
						        <td class="quantity">
						        	<div class="input-group mb-3">
					             	<input type="text" name="quantity" class="quantity form-control input-number" value="1" min="1" max="100">
					          	</div>
					          </td>
						        <td class="total">Rp. {{number_format($list_cart->harga)}}</td>
						      </tr><!-- END TR-->
						       @endforeach

						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
    		<div class="row justify-content-end">
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Coupon Code</h3>
    					<p>SILAHKAN MASUKKAN KUPON ANDA</p>
  						<form action="#" class="info">
	              <div class="form-group">
	              	<label for="">Coupon code</label>
	                <input type="text" class="form-control text-left px-3" placeholder="">
	              </div>
	            </form>
    				</div>
    				<p><a href="checkout.html" class="btn btn-primary py-3 px-4">BONUS</a></p>
    			</div>
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>silahkan isi data berikut</h3>
    					<p>wajin diisi</p>
  						<form action="#" class="info">
	              <div class="form-group">
	              	<label for="">Provinsi</label>
	                <select name="" class="form-control select2" onchange="gantiProvinsi(this.value)">
							<option value="">Pilih Provinsi</option>
		                @foreach($list_provinsi as $provinsi)
		                	<option value="{{$provinsi->id}}">{{$provinsi->name}}</option>
		                @endforeach
	                </select>
	              </div>
	              <div class="form-group">
	              	<label for="country">Kabupaten</label>
					<select name="" class="form-control select2" id="kabupaten" onchange="gantiKabupaten(this.value)">
						<option value="">Pilih Kabupaten</option>
						<option value=""></option>
					</select>
	              </div>
	              <div class="form-group">
	              	<label for="country">Kecamatan</label>
	                <select name="" class="form-control select2" id="kecamatan" onchange="gantiKecamatan(this.value)">
						<option value="">pilih Kecamatan</option>
						<option value=""></option>
					</select>
	              </div>
	              <div class="form-group">
	              	<label for="country">Desa</label>
	              	<select name="" class="form-control select2" id="desa">
						<option value="">Pilih dulu kecamtan</option>
						<option value=""></option>
					</select>
	              </div>
	            </form>
    				</div>
    				<p><a href="checkout.html" class="btn btn-primary py-3 px-4">Pesan</a></p>
    			</div>
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>DESKRIPSI PRODUK</h3>
    					<p class="d-flex">
    						<span>Subtotal</span>
    						<span>Rp.15.0000</span>
    					</p>
    					<p class="d-flex">
    						<span>Nasi Ayam</span>
    						<span>1</span>
    					</p>
    					<p class="d-flex">
    						<span>Discount</span>
    						<span>Rp.3000</span>
    					</p>
    					<hr>
    					<p class="d-flex total-price">
    						<span>Total</span>
    						<span>Rp.12.000</span>
    					</p>
    				</div>
    				<p><a href="checkout.html" class="btn btn-primary py-3 px-4"> Checkout</a></p>
    			</div>
    		</div>
			</div>
		</section>

@endsection

@push('script')
<script>
	function gantiProvinsi(id){
		// alert(id); /untuk melihat id Provinsi/
		$.get("api/provinsi/"+id, function(result){
			result = JSON.parse(result)
			option = ""
			for(item of result){
				option += `<option value="${item.id}">${item.name}</option>`;
			}
			$("#kabupaten").html(option)
		});
	}
	function gantiKabupaten(id){
		// alert(id); untuk melihat id Provinsi
		$.get("api/kabupaten/"+id, function(result){
			result = JSON.parse(result)
			option = ""
			for(item of result){
				option += `<option value="${item.id}">${item.name}</option>`;
			}
			$("#kecamatan").html(option)
		});
	}
	function gantiKecamatan(id){
		// alert(id); untuk melihat id Provinsi
		$.get("api/kecamatan/"+id, function(result){
			result = JSON.parse(result)
			option = ""
			for(item of result){
				option += `<option value="${item.id}">${item.name}</option>`;
			}
			$("#desa").html(option)
		});
	}
</script>
@endpush