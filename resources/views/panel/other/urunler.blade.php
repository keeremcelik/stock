@extends('sablon')
@section('icerik')
<section class="content">
	<div class="row">
		<div class="col-md-12">
			  <div class="optionbar">
        <div class="left">
          <div class="title">
            Ürün İşlemleri Modülü
          </div>
          <div class="description">
            Ürün yönetimi; ekleme, silme, güncelleme
          </div>
        </div>
        <div class="right">
          <button type="submit" onclick="modalOpen('#urunEkle')" id="urunEkle-btn"class="btn addbutton"><i class="fas fa-plus"></i> Yeni Ekle</button>            
        </div>
      </div>
			<div class="box">
				<div class="box-header">
					<h4 class="box-title">Ürünler Listesi</h4>        
					
				</div>

				<!-- /.box-header -->

				<div class="box-body table-responsive no-padding">
					<table id="" class="table">
						<thead class="">
							<tr>
								<th style="width:50px;">Resim</th>
								<th>Ürün Kodu</th>
								<th>Ürün Adı</th>
								<th>Tipi</th>
								<th style="width: 40px">İşlemler</th>
							</tr>
						</thead>
						<tbody  id="prodTable" >
							@foreach($urunler as $urun)
							<tr>
								<td><img id="prodMiniImg" class="prodMiniImg animated zoomIn" src="{{asset('storage/img/'.$urun->img)}}" /></td>		 
								<td>{{$urun->code}}</td>
								<td>{{$urun->name}}</td>		 
								<td>{{$urun->typename}}</td>		 
								<td>
									<div class="islemler">    

										<a onclick="urunVeriCek('{{$urun->id}}','{{$urun->type}}','{{$urun->typename}}','{{$urun->code}}','{{$urun->name}}','{{asset('storage/img/'.$urun->img)}}');modalOpen('#urunDuzenle');" id="" class="editBtn" href="#"><i class="fas fa-edit"></i></a>	 
										<a class=""  onclick="return confirmDel();" href="{{URL::to('panel/urun/sil/'.$urun->id)}}"><i class="fas fa-trash-alt"></i></a>
									</div>
								</td>				 

							</tr>
							@endforeach
						</tbody></table>
					</div>



				</div>
				<!-- /.col -->

			</div>
			<!-- Modal -->
			<div id="modal01" class="modal" onclick="this.style.display='none'">

				<!-- Modal Content (The Image) -->
				<img class="modal-content" id="img01">

			</div>


			<div class="urunEkle popup" id="urunEkle" tabindex="-1" role="dialog" >
				<div class="popbox" role="document">
					<div class="popbox-content">
						<div class="popbox-header">
							<h5 class="popbox-title" id="">Ürün Ekle</h5>
							<button type="button" class="close" onclick="modalClose('#urunEkle')" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form id="formHizmetler" action="{{URL::to('panel/urun/ekle')}}" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="popbox-body">           
								<div class="form-group">
									<select class="form-control" name="type" id="type">
										@foreach($mgrup as $grup)
										<option value="{{$grup->id}}">{{$grup->name}}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<input type="text" name="code" id="code" class="form-control" placeholder="Ürün kodu giriniz" required >
								</div>
								<div class="form-group">
									<input type="text" name="name" id="name" class="form-control" placeholder="Ürün adı giriniz" required >
								</div>
								<div class="input-group mb-3">			 
									<div class="custom-file">
										<input type="file" class="custom-file-input" name="urunImg" id="urunImg" aria-describedby="inputGroupFileAddon01">
										<label class="custom-file-label" for="urunImg">Resim Seç</label>
									</div>
								</div>
							</div>
							<div class="popbox-footer">
								<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
								<button type="submit" id="kaydet" name="kaydet" class="btn btn-primary">Ekle</button>
							</div>
						</form>

					</div>
				</div>
			</div>

			<div class="urunDuzenle popup" id="urunDuzenle" tabindex="-1" role="dialog" >
				<div class="popbox" role="document">
					<div class="popbox-content">
						<div class="popbox-header">
							<h5 class="popbox-title" id="">Ürün Düzenle</h5>
							<button type="button" class="close" onclick="modalClose('#urunDuzenle')" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form id="formHizmetler" action="{{URL::to('panel/urun/guncelle')}}" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="popbox-body">   

								<div style="text-align:center;">
									<img class="editImg " id="editimg" name="editimg" src=""/>
								</div>
								<input type="hidden" name="editid" id="editid"  value=" class="form-control">		
								<div class="form-group">	
									<label>Tip</label>
									<input type="text" name="edittypename" id="edittypename" class="form-control"  readonly>
									<input type="hidden" name="edittype" id="edittype" value="0">
								</div>			
								<div class="form-group">
									<label>Ürün Kodu</label>
									<input type="text" name="editcode" id="editcode" class="form-control"  placeholder="Ürün kodu giriniz" required >
								</div>
								<div class="form-group">
									<label>Ürün Adı</label>
									<input type="text" name="editname" id="editname" class="form-control" placeholder="Ürün adı giriniz" required >
								</div>	
								<div class="form-group">
									<label>Ürün Resmi</label>
									<div class="input-group mb-3">			 
										<div class="custom-file">
											<input type="file" onchange="changeImgModal(this.files[0])" class="custom-file-input" name="edt-prd-img" id="edt-prd-img" aria-describedby="inputGroupFileAddon01">
											<label class="custom-file-label"  id="edt-img-label" for="edt-prd-img">Dosya seçiniz..</label>
										</div>
									</div>
								</div>	
							</div>
							<div class="popbox-footer">
								<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
								<button type="submit" id="kaydet" name="kaydet" class="btn btn-primary">Kaydet</button>
							</div>
						</form>

					</div>
				</div>
			</div>



		</section>
		@endsection