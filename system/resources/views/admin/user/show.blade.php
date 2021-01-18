@extends('template.base')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12 my-5">
			<div class="card">
				<div class="card-header">
					Detail User
				</div>
				<div class="card-body">
					<div class="card" style="width: 20rem;">
					  <ul class="list-group list-group-flush">
					    <li class="list-group-item">Nama Lengkap <br>
					     <div class="alert alert-info">
					     {{$user->nama}}
					     </div>	
					    </li>
					    <li class="list-group-item">Username <br>
					     <div class="alert alert-info">
					     {{$user->username}}
					     </div>	
					    </li>
					    <li class="list-group-item">Email <br>
					      <div class="alert alert-info">
					     {{$user->email}}
					      </div>
					     </li>	
					     <li class="list-group-item">No HP <br>
					      <div class="alert alert-info">
					     {{$user->detail->no_handphone}}
					      </div>	
					    </li>
					  </ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection