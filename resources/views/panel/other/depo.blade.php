@extends('sablon')
@section('icerik')
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="optionbar">
					<div class="left">
						<div class="title">
							Depo Modülü
						</div>
						<div class="description">
							Depo yönetimi; ekleme, silme, güncelleme
						</div>


					</div>
					<div class="right">
						<button type="submit" onclick="modalOpen('#depoEkle')" id="depoEkle-btn"class="btn addbutton"><i class="fas fa-plus"></i> Yeni Ekle</button>						
					</div>
				</div>
			<div class="box">
				<div class="box-header">
					<h4 class="box-title">Depo Listesi</h4>				
					
				</div>
				<div class="veriler"></div>
				<!-- /.box-header -->
				<div class="box-body table-responsive no-padding">
					<table id="" class="table">
						<thead class="">
							<tr>
								<th>Depo Kodu</th>
								<th>Depo Adı</th>
								<th style="width: 40px">İşlemler</th>
							</tr>
						</thead>
						<tbody  id="prodTable" >
							@foreach($depolar as $depo)
							<tr>
								<td>{{$depo->code}}</td>		 
								<td>{{$depo->name}}</td>		 
								<td>
									<div class="islemler">					
										<a  id="" onclick="depoVeriCek('{{$depo->id}}','{{$depo->code}}','{{$depo->name}}');modalOpen('#depoDuzenle');" class="editBtn" href="#"><i class="fas fa-edit"></i></a>	 
										<a class=""  onclick="return confirmDel();" href="{{URL::to('panel/depo/sil/'.$depo->id)}}"><i class="fas fa-trash-alt"></i></a>
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
	<div class="depoEkle popup" id="depoEkle" tabindex="-1" role="dialog" >
		<div class="popbox" role="document">
			<div class="popbox-content">
				<div class="popbox-header">
					<h5 class="popbox-title" id="">Depo Ekle</h5>
					<button type="button" class="close" onclick="modalClose('#depoEkle')" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form id="formHizmetler" action="{{URL::to('panel/depo/ekle')}}" method="POST">
					@csrf
					<div class="popbox-body">						
						<div class="form-group">
							<input type="text" name="code" id="code" class="form-control" placeholder="Depo kodu giriniz" required >
						</div>
						<div class="form-group">
							<input type="text" name="name" id="name" class="form-control" placeholder="Depo adı giriniz" required >	
						</div>
					</div>
					<div class="popbox-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" id="kaydet" name="kaydet" class="btn btn-primary">Ekle</button>
					</div>
				</form>

			</div>
		</div>
	</div>
	<div class="depoDuzenle popup" id="depoDuzenle" tabindex="-1" role="dialog" >
		<div class="popbox" role="document">
			<div class="popbox-content">
				<div class="popbox-header">
					<h5 class="popbox-title" id="">Depo Düzenle</h5>
					<button type="button" class="close" onclick="modalClose('#depoDuzenle')" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form id="formHizmetler" action="{{URL::to('panel/depo/guncelle')}}" method="POST">
					@csrf
					<div class="popbox-body">		
						<input type="text" name="editid" id="editid" class="form-control" hidden readonly >	<div class="form-group">
							<input type="text" name="editcode" id="editcode" class="form-control" placeholder="Depo kodu giriniz" required >
						</div>
						<div class="form-group">
							<input type="text" name="editname" id="editname" class="form-control" placeholder="Depo adı giriniz" required >
						</div>
					</div>
					<div class="popbox-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" id="kaydet" name="kaydet" class="btn btn-primary">Kaydet</button>
					</div>
				</form>

			</div>
		</div>
	</div>
</section>
@endsection