@extends('sablon')
@section('icerik')

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
		
				<div class="optionbar">
					<div class="left">
						<div class="title">
							Sayfa Başlığı
						</div>
						<div class="description">
							Sayfa Açıklaması
						</div>

					</div>
					<div class="right">
						<button type="submit" onclick="modalOpen('#depEkle')" id="depekle-btn"class="btn addbutton"><i class="fas fa-plus"></i> Yeni Ekle</button>						
					</div>
				</div>
			
			<div class="box">
				<div class="box-header">
					<h4 class="box-title">Departman Listesi</h4>				
					
				</div>
				<div class="veriler"></div>
				<!-- /.box-header -->
				<div class="box-body table-responsive no-padding">
					<table id="" class="table">
						<thead class="">
							<tr>
								<th>Departman Adı</th>
								<th style="width: 40px">İşlemler</th>
							</tr>
						</thead>
						<tbody  id="prodTable" >
							@foreach($departmanlar as $dep)
							<tr>
								<td>{{$dep->name}}</td>		 
								<td>
									<div class="islemler">    

										<a  id="" onclick="idCek( '{{ $dep->id }}','{{ $dep->name }}' );modalOpen('#depDuzenle');"  class="editBtn" href="#" ><i class="fas fa-edit"></i></a>	 
										<a class="" onclick="return confirmDel();" href="{{URL::to('panel/departman/sil/'.$dep->id)}}"><i class="fas fa-trash-alt"></i></a>
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
	<!-- Modal -->
	<div class="depEkle popup" id="depEkle" tabindex="-1" role="dialog" >
		<div class="popbox" role="document">
			<div class="popbox-content">
				<div class="popbox-header">
					<h5 class="popbox-title" id="">Departman Ekle</h5>
					<button type="button" class="close" onclick="modalClose('#depEkle')" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form id="formHizmetler" action="{{URL::to('panel/departman/ekle')}}" method="POST">
					@csrf
					<div class="popbox-body">
						
							<input type="text" name="name" id="name" class="form-control" placeholder="Departman adı giriniz" required >
						
					</div>
					<div class="popbox-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">İptal</button>
						<button type="submit" id="kaydet" name="kaydet" class="btn btn-primary">Ekle</button>
					</div>
				</form>

			</div>
		</div>
	</div>

	<div class="depDuzenle popup" id="depDuzenle" tabindex="-1" role="dialog" >
		<div class="popbox" role="document">
			<div class="popbox-content">
				<div class="popbox-header">
					<h5 class="popbox-title" id="">Departman Düzenle</h5>
					<button type="button" class="close" onclick="modalClose('#depDuzenle')" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form id="formHizmetler" action="{{URL::to('panel/departman/guncelle')}}" method="POST">
					@csrf
					<div class="popbox-body">
						<input type="text" name="editid" id="editid" class="form-control" hidden readonly >
						<input type="text" name="editname" id="editname" class="form-control" placeholder="Departman adı giriniz" required >
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