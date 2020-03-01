@extends('sablon')
@section('icerik')
	
<div class="box-body table-responsive no-padding">
	<div class="form-group">
		<a class="btn btn-success form-control" href="#"  data-toggle="modal" data-target="#insertModal" >
			Kullanıcı Ekle
		</a>
	</div>
	<table id="" class="table table-bordered">
		<thead class="thead-dark">
			<tr>
				<th>Kullanıcı Adı</th>
				<th style="width: 40px">İşlemler</th>
			</tr>
		</thead>
		<tbody  id="prodTable" >
			@foreach($kullanicilar as $kullanici)
			<tr>		 
				<td>{{$kullanici->username}}</td>
				<td>
					<div class="islemler">    

						<a onclick="kullaniciVeriCek('{{$kullanici->id}}','{{$kullanici->username}}')" id="" class="editBtn" href="#"  data-toggle="modal" data-target="#editModal" ><i class="fas fa-edit"></i></a>	 
						<a class=""  onclick="return confirmDel();" href="{{URL::to('panel/kullanici/sil/'.$kullanici->id)}}"><i class="fas fa-trash-alt"></i></a>
					</div>
				</td>				 

			</tr>
			@endforeach
		</tbody></table>
	</div>
	@if (session('status') == 'danger')
    <div id="message" class="alert alert-danger">
        {{ session('message') }}
    	@elseif(session('status') == 'success')
    	<div id="message" class="alert alert-success">
        {{ session('message') }}
    </div>
	@endif
	<div class="modal fade" id="editModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Kullanici Güncelleme</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form id="formHizmetler" action="{{URL::to('panel/kullanici/guncelle')}}" method="POST">
					@csrf
					<div class="modal-body">
						<input type="text" name="editid" id="editid" class="form-control" hidden readonly >
						<div class="form-group">
							<input type="text" name="editname" id="editname" class="form-control" placeholder="Kullanıcı Adı" required >
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" id="kaydet" name="kaydet" class="btn btn-primary">Kaydet</button>
					</div>
				</form>

			</div>
		</div>
	</div>
	<div class="modal fade" id="insertModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Kullanici Ekle</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form id="formHizmetler" action="{{URL::to('panel/kullanici/ekle')}}" method="POST">
					@csrf
					<div class="modal-body">
						<div class="form-group">
							<input type="text" name="name" id="name" class="form-control" placeholder="Kullanıcı Adı" required >
						</div>
						<div class="form-group">
							<input type="password" name="password" id="password" class="form-control" required placeholder="Parola">
						</div>
						<div class="form-group">
							<input type="password" name="repassword" id="repassword" class="form-control" required placeholder="Parola Tekrar">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" id="kaydet" name="kaydet" class="btn btn-primary">Kaydet</button>
					</div>
				</form>

			</div>
		</div>
	</div>
@endsection