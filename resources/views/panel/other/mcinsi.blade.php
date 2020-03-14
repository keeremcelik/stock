@extends('sablon')
@section('icerik')
<section class="content">

	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header">
					<h4 class="box-title">Malzeme Cinsi Listesi</h4>        
					<div class="optionbar">
						<input class="form-control" id="search_text" name="search_text" type="text" value="" placeholder="Search" aria-label="Search">
						<button type="submit" onclick="modalOpen('#mcinsiEkle')" id="mcinsiEkle-btn" name="mcinsiEkle-btn" class="btn">Yeni </button>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body table-responsive no-padding">
					<table id="" class="table">
						<thead class="">
							<tr>
								<th>Malzeme Adı</th>
								<th>Sınıfı Adı</th>
								<th style="width: 40px">İşlemler</th>
							</tr>
						</thead>
						<tbody  id="prodTable" >
							@foreach($mcinsleri as $mcinsi)


							<tr>
								<td>{{$mcinsi->name}}</td>		 
								<td>{{$mcinsi->cname}}</td>
								<td>
									<div class="islemler">    

										<a onclick="malzemeTipiVeriCek('{{$mcinsi->id}}','{{$mcinsi->name}}');modalOpen('#mcinsiDuzenle');" class="editBtn" href="#"  ><i class="fas fa-edit"></i></a>	 
										<a class=""  onclick="return confirmDel();" href="{{URL::to('panel/mcinsi/sil/'.$mcinsi->id)}}"><i class="fas fa-trash-alt"></i></a>
									</div>


								</td>				 

							</tr>
							@endforeach
						</tbody>
					</table>
				</div>


			</div>
			<!-- /.col -->

		</div>
	</div>
	
<div class="mcinsiEkle popup" id="mcinsiEkle" tabindex="-1" role="dialog" >
  <div class="popbox" role="document">
    <div class="popbox-content">
      <div class="popbox-header">
        <h5 class="popbox-title" id="">Malzeme Cinsi Ekle</h5>
        <button type="button" class="close" onclick="modalClose('#mcinsiEkle')" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <form id="formHizmetler" action="{{URL::to('panel/mcinsi/ekle')}}" method="POST">
        @csrf
        <div class="popbox-body">           
          <div class="form-group">
							<select class="form-control" name="classid" id="classid">
								@foreach($mgruplari as $mgrup)
								<option value="{{$mgrup->id}}">{{$mgrup->code}}</option>
								@endforeach
							</select>
						</div>
						<input type="text" name="name" id="name" class="form-control" placeholder="Malzeme adı giriniz" required >
        </div>
        <div class="popbox-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" id="kaydet" name="kaydet" class="btn btn-primary">Ekle</button>
        </div>
      </form>

    </div>
  </div>
</div>

<div class="mcinsiDuzenle popup" id="mcinsiDuzenle" tabindex="-1" role="dialog" >
  <div class="popbox" role="document">
    <div class="popbox-content">
      <div class="popbox-header">
        <h5 class="popbox-title" id="">Malzeme Sınıfı Düzenle</h5>
        <button type="button" class="close" onclick="modalClose('#mcinsiDuzenle')" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     	<form id="formHizmetler" action="{{URL::to('panel/mcinsi/guncelle')}}" method="POST">
		@csrf
        <div class="popbox-body">   
          	<div class="form-group">
				<input type="hidden" name="editid" id="editid"  value="" class="form-control">	
				<input type="text" name="editname" id="editname" class="form-control" placeholder="Malzeme tipi giriniz" required >
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