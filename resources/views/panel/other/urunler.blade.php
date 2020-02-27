@extends('sablon')
@section('icerik')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
       <div class="row mb-2">
          <div class="col-sm-6">   
			<ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#">Ana Sayfa</a></li>
              <li class="breadcrumb-item active">Ürün İşlemleri</li>
            </ol>		  
			 
          </div>
        
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
				<div class="row">			
					<div class="col-md-11">				
						<div class="md-form mt-0">
						<form method="post" action="products.php">
						
						  <input class="form-control" id="search_text" name="search_text" type="text" value="" placeholder="Search" aria-label="Search">						 
						 <input type="submit" 
       style="position: absolute; left: -9999px; width: 1px; height: 1px;"
       tabindex="-1" />
					
						  </form>
						</div>
					</div>
					<div class="col-md-1">
					<button type="button" class="btn btn-success"  data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Ekle </button>
		
			</div>
				</div>
				
            </div>
			
            <!-- /.box-header -->
         
            <div class="box-body table-responsive no-padding">
              <table id="" class="table table-bordered">
                <thead class="thead-dark">
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
				  <td><img id="prodMiniImg" class="prodMiniImg animated zoomIn" src="files/img/product/'.$mclass["img"].'" /></td>		 
				  <td>{{$urun->code}}</td>
				  <td>{{$urun->name}}</td>		 
				  <td>{{$urun->typename}}</td>		 
				<td>
					<div class="islemler">    
					
						<a onclick="urunVeriCek('{{$urun->id}}','{{$urun->type}}','{{$urun->typename}}','{{$urun->code}}','{{$urun->name}}')" id="" class="editBtn" href="#"  data-toggle="modal" data-target="#editModal" ><i class="fas fa-edit"></i></a>	 
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

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Malzeme Sınıfı Ekle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <form id="formHizmetler" action="{{URL::to('panel/urun/ekle')}}" method="POST" enctype="multipart/form-data">
     	@csrf
		  <div class="modal-body">
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
				<input type="file" class="custom-file-input" name="prodImg" id="prodImg" aria-describedby="inputGroupFileAddon01">
				<label class="custom-file-label" for="prodImg">Resim Seç</label>
			  </div>
			</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" id="kaydet" name="kaydet" class="btn btn-primary">Ekle</button>
		  </div>
	  </form>
      
    </div>
  </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ürün Düzenleme</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <form id="formHizmetler" action="{{URL::to('panel/urun/guncelle')}}" method="POST" enctype="multipart/form-data">
     	@csrf
		  <div class="modal-body">
			 <div class="row" style="padding: 2vw;">
					 <div class="col-lg-12">
					 <div style="text-align:center;">
				<img class="editImg " id="edt-img" name="edt-img" src=""/>
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
				</div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" id="kaydet" name="kaydet" class="btn btn-primary">Kaydet</button>
		  </div>
	  </form>
      
    </div>
  </div>
</div>

</div>
<nav aria-label="Page navigation example">
  <ul class="pagination">    
	
   
  </ul>
</nav>

    </section>
@endsection