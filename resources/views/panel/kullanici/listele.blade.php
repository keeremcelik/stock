@extends('sablon')
@section('icerik')

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header">
					<h4 class="box-title">Kullanıcı Listesi</h4>				
					<div class="optionbar">
						<input class="form-control" id="search_text" name="search_text" type="text" value="" placeholder="Search" aria-label="Search">
						<button type="submit" onclick="modalOpen('#userEkle')" id="userEkle-btn" name="userEkle-btn" class="btn ">Ekle</button>
					</div>
				</div>
				<div class="veriler"></div>
				<!-- /.box-header -->
				<div class="box-body table-responsive no-padding">
					<table id="" class="table">
		<thead class="">
			<tr>
				<th width="90%">Kullanıcı Adı</th>
				<th width="10%">İşlemler</th>
			</tr>
		</thead>
		<tbody  id="prodTable" >
			@foreach($kullanicilar as $kullanici)
			<tr>		 
				<td>{{$kullanici->name.' '.$kullanici->surname}}</td>
				<td>
					<div class="islemler"> 
						<a onclick="kullaniciVeriCek('{{$kullanici->id}}','{{$kullanici->name.''.$kullanici->surname}}')" id="" class="editBtn" href="#"  data-toggle="modal" data-target="#yetkiModal" >Yetkilendir</a>	 
						<a onclick="kullaniciVeriCek('{{$kullanici->id}}','{{$kullanici->name.''.$kullanici->surname}}')" id="" class="editBtn" href="#"  data-toggle="modal" data-target="#editModal" ><i class="fas fa-edit"></i></a>	 
						<a class=""  onclick="return confirmDel();" href="{{URL::to('panel/kullanici/sil/'.$kullanici->id)}}"><i class="fas fa-trash-alt"></i></a>
					</div>
				</td>				 

			</tr>
			@endforeach
		</tbody>
	</table>
				</div>
				@if (session('status') == 'danger')
    <div id="message" class="alert alert-danger">
        {{ session('message') }}
    	@elseif(session('status') == 'success')
    	<div id="message" class="alert alert-success">
        {{ session('message') }}
    </div>
	@endif
			</div>
		</div>
	</div>
	<!-- Modal -->
	<div class="userEkle popup" id="userEkle" tabindex="-1" role="dialog" >
		<div class="popbox" role="document">
			<div class="popbox-content">
				<div class="popbox-header">
					<h5 class="popbox-title" id="">Kullanıcı Ekle</h5>
					<button type="button" class="close" onclick="modalClose('#userEkle')" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form id="formHizmetler" action="{{URL::to('panel/kullanici/ekle')}}" method="POST">
					@csrf
					<div class="popbox-body">
						<div class="form-group">
							<input type="text" name="name" id="name" class="form-control" placeholder="Ad" required >
						</div>
						<div class="form-group">
							<input type="text" name="lastname" id="lastname" class="form-control" placeholder="Soyad" required >
						</div>
						<div class="form-group">
							<input type="text" name="email" id="email" class="form-control" placeholder="E-posta adresi" required >
						</div>
						<div class="form-group">
							<input type="text" name="phone" id="phone" class="form-control" placeholder="Telefon Numarası" required >
						</div>
						<div class="form-group">
							<input type="password" name="password" id="password" class="form-control" required placeholder="Parola">
						</div>
						<div class="form-group">
							<input type="password" name="repassword" id="repassword" class="form-control" required placeholder="Parola Tekrar">
						</div>
					</div>
					<div class="popbox-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">İptal</button>
						<button type="submit" id="kaydet" name="kaydet" class="btn btn-primary">Ekle</button>
					</div>
				</form>

			</div>
		</div>
	</div>

	<div class="userDuzenle popup" id="userDuzenle" tabindex="-1" role="dialog" >
		<div class="popbox" role="document">
			<div class="popbox-content">
				<div class="popbox-header">
					<h5 class="popbox-title" id="">Kullanıcı Düzenle</h5>
					<button type="button" class="close" onclick="modalClose('#userDuzenle')" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form id="formHizmetler" action="{{URL::to('panel/kullanici/guncelle')}}" method="POST">
					@csrf
					<div class="popbox-body">
						<input type="text" name="editid" id="editid" class="form-control" hidden readonly >
						<div class="form-group">
							<input type="text" name="editname" id="editname" class="form-control" placeholder="Ad" required >
						</div>
						<div class="form-group">
							<input type="text" name="editlastname" id="editlastname" class="form-control" placeholder="Soyad" required >
						</div>
						<div class="form-group">
							<input type="text" name="editemail" id="editemail" class="form-control" placeholder="E-posta adresi" required >
						</div>
						<div class="form-group">
							<input type="text" name="editphone" id="editphone" class="form-control" placeholder="Telefon Numarası" required >
						</div>
						
					</div>
					<div class="popbox-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">İptal</button>
						<button type="submit" id="kaydet" name="kaydet" class="btn btn-primary">Kaydet</button>
					</div>
				</form>
				

			</div>
		</div>
	</div>

	<div class="userYetkilendir popup" id="userYetkilendir" tabindex="-1" role="dialog" >
		<div class="popbox" role="document">
			<div class="popbox-content">
				<div class="popbox-header">
					<h5 class="popbox-title" id="">Kullanıcı Düzenle</h5>
					<button type="button" class="close" onclick="modalClose('#userYetkilendir')" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form id="formHizmetler" action="{{URL::to('panel/kullanici/guncelle')}}" method="POST">
					@csrf
					<div class="popbox-body">
						<input type="text" name="yetkiId" id="yetkiId" class="form-control" hidden readonly >
						<div class="form-group">
							<p name="yetkiNameLastName" id="yetkiNameLastName"></p>
						</div>
						<div class="form-group">
							<select name="modul" class="form-control">
							@foreach($menu as $m)
								<optgroup label="{{$m['name']}}">
									@foreach($m['elements'] as $v)
										<option value="{{$v['id']}}">{{$v['name']}}</option>
									@endforeach
								</optgroup>
								
							@endforeach
							</select>
						</div>
					<div class="form-group">
						<label class="chklbl">Ekle
							<input type="checkbox" name="">
							<span class="checkmark"></span>
						</label>
						<label class="chklbl">Sil
							<input type="checkbox" name="">
							<span class="checkmark"></span>
						</label>
						<label class="chklbl">Guncelle
							<input type="checkbox" name="">
							<span class="checkmark"></span>
						</label>
						<label class="chklbl">Listele
							<input type="checkbox" name="">
							<span class="checkmark"></span>
						</label>
						
					</div>
					</div>
					<div class="popbox-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">İptal</button>
						<button type="submit" id="kaydet" name="kaydet" class="btn btn-primary">Kaydet</button>
					</div>
				</form>
				

			</div>
		</div>
	</div>
<<<<<<< HEAD
	<div class="modal fade" id="yetkiModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Kullanici Yetkilendir</h5>
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
							<select name="modul" class="form-control">
							@foreach($menu as $m)
								<optgroup label="{{$m['name']}}">
									@foreach($m['elements'] as $v)
										<option value="{{$v['id']}}">{{$v['name']}}</option>
									@endforeach
								</optgroup>
								
							@endforeach
							</select>
						</div>
						<div class="form-group">
							<label>Ekle</label>
							<input type="checkbox" name="">
						</div>
						<div class="form-group">
							<label>Listele</label>
							<input type="checkbox" name="">
						</div>
						<div class="form-group">
							<label>Guncelle</label>
							<input type="checkbox" name="">
						</div>
						<div class="form-group">
							<label>Sil</label>
							<input type="checkbox" name="">
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
=======

</section>
@endsection
>>>>>>> 61a2e6f3958d6908b1bc201911e321440ae80fe9
