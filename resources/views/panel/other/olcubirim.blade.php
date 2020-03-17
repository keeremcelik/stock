@extends('sablon')
@section('icerik')
<section class="content">
	<div class="row">
		<div class="col-md-12">
				<div class="optionbar">
					<div class="left">
						<div class="title">
							Ölçü Birimi Modülü
						</div>
						<div class="description">
							Ölçü Birimi  yönetimi; ekleme, silme, güncelleme
						</div>
					</div>
					<div class="right">
						<button type="submit" onclick="modalOpen('#olcuEkle')" id="olcuEkle-btn"class="btn addbutton"><i class="fas fa-plus"></i> Yeni Ekle</button>						
					</div>
				</div>
			 <div class="box">
            <div class="box-header">
             <h4 class="box-title">Ölçü Birimleri Listesi</h4>				
				
			  
            </div>
			<div class="veriler"></div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
               <table id="" class="table">
                <thead class="">
				<tr>
                  <th>Ölçü Birimi</th>
                  <th style="width: 40px">İşlemler</th>
                </tr>
				 </thead>
				  <tbody  id="prodTable" >
				  	@foreach($olcubirimleri as $olcubirim)
				  <tr>
				  <td>{{$olcubirim->name}}</td>		 
				  <td>
				  <div class="islemler">    
					
						<a  id="" onclick="olcubirimVeriCek('{{ $olcubirim->id }}','{{ $olcubirim->name }}');modalOpen('#olcuDuzenle');" class="editBtn" href="#"><i class="fas fa-edit"></i></a>	 
						<a class=""  onclick="return confirmDel();" href="{{URL::to('panel/olcubirim/sil/'.$olcubirim->id)}}"><i class="fas fa-trash-alt"></i></a>
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
	<div class="olcuEkle popup" id="olcuEkle" tabindex="-1" role="dialog" >
		<div class="popbox" role="document">
			<div class="popbox-content">
				<div class="popbox-header">
					<h5 class="popbox-title" id="">Ölçü Birimi Ekle</h5>
					<button type="button" class="close" onclick="modalClose('#olcuEkle')" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form id="formHizmetler" action="{{URL::to('panel/olcubirim/ekle')}}" method="POST">
					@csrf
					<div class="popbox-body">						
						<div class="form-group">
							<input type="text" name="name" id="name" class="form-control" placeholder="Ölçü birimi giriniz" required >
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
	<div class="olcuDuzenle popup" id="olcuDuzenle" tabindex="-1" role="dialog" >
		<div class="popbox" role="document">
			<div class="popbox-content">
				<div class="popbox-header">
					<h5 class="popbox-title" id="">Ölçü Birimi Düzenle</h5>
					<button type="button" class="close" onclick="modalClose('#olcuDuzenle')" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form id="formHizmetler" action="{{URL::to('panel/olcubirim/guncelle')}}" method="POST">
					@csrf
					<div class="popbox-body">		
						<input type="text" name="editid" id="editid" class="form-control" hidden readonly >	
						
			
						<div class="form-group">
							<input type="text" name="editname" id="editname" class="form-control" placeholder="Ölçü birimi giriniz" required >
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