@extends('sablon')
@section('icerik')

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="optionbar">
					<div class="left">
						<div class="title">
							Kullanıcı İşlemleri Modülü
						</div>
						<div class="description">
							Kullanıcı yönetimi; ekleme, silme, güncelleme
						</div>
					</div>
					<div class="right">
						<button type="submit" onclick="modalOpen('#userEkle')" id="userEkle-btn"class="btn addbutton"><i class="fas fa-plus"></i> Yeni Ekle</button>						
					</div>
				</div>
			<div class="box">
				<div class="box-header">
					<h4 class="box-title">Kullanıcı Listesi</h4>				
				
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
						<a onclick="kullaniciYetkilendirme('{{$kullanici->id}}','{{$kullanici->name}}','{{$kullanici->surname}}');modalOpen('#userYetkilendir');" id="" class="editBtn" href="#"><i class="fas fa-fingerprint"></i></a>	 
						<a onclick="kullaniciVeriCek('{{$kullanici->id}}','{{$kullanici->name}}','{{$kullanici->surname}}','{{$kullanici->email}}','{{$kullanici->phone}}');modalOpen('#userDuzenle');" id="" class="editBtn" href="#" ><i class="fas fa-edit"></i></a>	 
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

</section>
@endsection
