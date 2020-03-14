@extends('sablon')
@section('icerik')
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header">
					<h4 class="box-title">Firma Listesi</h4>				
					<div class="optionbar">
						<input class="form-control" id="search_text" name="search_text" type="text" value="" placeholder="Search" aria-label="Search">
						<button type="submit" onclick="modalOpen('#firmaEkle')" id="firmaEkle-btn" name="firmaEkle-btn" class="btn">Yeni </button>
					</div>

				</div>
				<div class="veriler"></div>
				<!-- /.box-header -->
				<div class="box-body table-responsive no-padding">
					<table id="" class="table">
						<thead class="">
							<tr>
								<th width="10%">Firma Kodu</th>
								<th width="40%">Firma Adı</th>
								<th width="20%">Firma Yetkili Kişi</th>
								<th width="20%">Telefon</th>
								<th width="10%">İşlemler</th>
							</tr>
						</thead>
						<tbody  id="prodTable" >
							@foreach($firmalar as $firma)
							<tr>
								<td>{{$firma->code}}</td>		 
								<td>{{$firma->name}}</td>		 
								<td>{{$firma->autorized_name}}</td>		 
								<td>{{$firma->phone}}</td>		 
								<td>
									<div class="islemler">    

										<a onclick="compCek('{{ $firma->id }}','{{ $firma->code }}','{{ $firma->name }}','{{ $firma->address }}','{{ $firma->tax_administration }}','{{ $firma->tax_number  }}','{{ $firma->autorized_name }}','{{ $firma->phone }}','{{ $firma->fax }}','{{ $firma->gsm }}','{{ $firma->web }}','{{ $firma->email }}');modalOpen('#firmaDuzenle');" class="editBtn" href="#"><i class="fas fa-edit"></i></a>	 
										<a class=""  onclick="return confirmDel();" href="{{URL::to('panel/firmalar/sil/'.$firma->id)}}"><i class="fas fa-trash-alt"></i></a>
									</div>


								</td>				 

							</tr>
							@endforeach
						</tbody>
					</table>
				</div>


			</div>
		</div>

	</div>


	<div class="firmaEkle popup" id="firmaEkle" tabindex="-1" role="dialog" >
		<div class="popbox" role="document">
			<div class="popbox-content">
				<div class="popbox-header">
					<h5 class="popbox-title" id="">Yeni Firma Ekle</h5>
					<button type="button" class="close" onclick="modalClose('#firmaEkle')" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form id="formHizmetler" action="{{URL::to('panel/firmalar/ekle')}}" method="POST">
					@csrf
					<div class="popbox-body">						
						<div class="form-group">
							<input type="text" name="code" id="code" class="form-control" placeholder="Firma kodu giriniz" required >
						</div>
						<div class="form-group">
							<input type="text" name="name" id="name" class="form-control" placeholder="Firma adı giriniz" required >
						</div>
						<div class="form-group">
							<input type="text" name="address" id="address" class="form-control" placeholder="Firma adresi giriniz" required >
						</div>
						<div class="form-group">
							<input type="text" name="tax-adm" id="tax-adm" class="form-control" placeholder="Vergi dairesi giriniz" required >
						</div>
						<div class="form-group">
							<input type="text" name="tax-num" id="tax-num" class="form-control" placeholder="Vergi numarası giriniz" required >
						</div>
						<div class="form-group">
							<input type="text" name="autorized" id="autorized" class="form-control" placeholder="Yetkili adı giriniz" required >
						</div>
						<div class="form-group">
							<input type="text" name="phone" id="phone" class="form-control" placeholder="Telefon giriniz" required >
						</div>
						<div class="form-group">
							<input type="text" name="fax" id="fax" class="form-control" placeholder="Fax giriniz" required >
						</div>
						<div class="form-group">
							<input type="text" name="gsm" id="gsm" class="form-control" placeholder="GSM giriniz" required >
						</div>
						<div class="form-group">
							<input type="text" name="web" id="web" class="form-control" placeholder="Web adresi giriniz" required >
						</div>
						<div class="form-group">
							<input type="text" name="email" id="email" class="form-control" placeholder="Email adresi giriniz" required >
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
	<div class="firmaDuzenle popup" id="firmaDuzenle" tabindex="-1" role="dialog" >
		<div class="popbox" role="document">
			<div class="popbox-content">
				<div class="popbox-header">
					<h5 class="popbox-title" id="">Ölçü Birimi Düzenle</h5>
					<button type="button" class="close" onclick="modalClose('#firmaDuzenle')" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form id="formHizmetler" action="{{URL::to('panel/firmalar/guncelle')}}" method="POST">
					@csrf
					<div class="popbox-body">		
						
						<input type="text" name="editid" id="editid" class="form-control" hidden readonly >
						<div class="form-group">
							<input type="text" name="editcode" id="editcode" class="form-control" placeholder="Firma kodu giriniz" required >
						</div>
						<div class="form-group">
							<input type="text" name="editname" id="editname" class="form-control" placeholder="Firma adı giriniz" required >
						</div>
						<div class="form-group">
							<input type="text" name="editaddress" id="editaddress" class="form-control" placeholder="Firma adresi giriniz" required >
						</div>
						<div class="form-group">
							<input type="text" name="edittax-adm" id="edittax-adm" class="form-control" placeholder="Vergi dairesi giriniz" required >
						</div>
						<div class="form-group">
							<input type="text" name="edittax-num" id="edittax-num" class="form-control" placeholder="Vergi numarası giriniz" required >
						</div>
						<div class="form-group">
							<input type="text" name="editautorized" id="editautorized" class="form-control" placeholder="Yetkili adı giriniz" required >
						</div>
						<div class="form-group">
							<input type="text" name="editphone" id="editphone" class="form-control" placeholder="Telefon giriniz" required >
						</div>
						<div class="form-group">
							<input type="text" name="editfax" id="editfax" class="form-control" placeholder="Fax giriniz" required >
						</div>
						<div class="form-group">
							<input type="text" name="editgsm" id="editgsm" class="form-control" placeholder="GSM giriniz" required >
						</div>
						<div class="form-group">
							<input type="text" name="editweb" id="editweb" class="form-control" placeholder="Web adresi giriniz" required >
						</div>
						<div class="form-group">
							<input type="text" name="editemail" id="editemail" class="form-control" placeholder="Email adresi giriniz" required >
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