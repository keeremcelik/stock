@extends('sablon')
@section('icerik')
 <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
       <div class="row mb-2">
          <div class="col-sm-6">   
			<ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#">Ana Sayfa</a></li>
              <li class="breadcrumb-item active">Şirket İşlemleri</li>
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
						<form method="post" action="companies.php">
						
						  <input class="form-control" id="search_text" name="search_text" type="text" value="" placeholder="Search" aria-label="Search">						 
						 <input type="submit" style="position: absolute; left: -9999px; width: 1px; height: 1px;" tabindex="-1" />
					
						  </form>
						</div>
					</div>
					<div class="col-md-1">
					<button type="button" class="btn btn-success"  data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Ekle </button>
		
			</div>
				</div>
			  
            </div>
			<div class="veriler"></div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
               <table id="" class="table table-bordered">
                <thead class="thead-dark">
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
					
						<a id="" onclick="compCek('.$comp["id"].')" data-id="'.$comp["id"].'" class="editBtn" href="#"   data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i></a>	 
						<a class=""  onclick="return confirmDel();" href="process.php?type=comp&op=del&id='.$comp["id"].'"><i class="fas fa-trash-alt"></i></a>
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Yeni Firma Ekle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <form id="formHizmetler" action="process.php?type=comp&op=add" method="POST">
		  <div class="modal-body">
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
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" id="kaydet" name="kaydet" class="btn btn-primary">Ekle</button>
		  </div>
	  </form>
      
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ölçü Birimi Düzenleme</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <form id="formHizmetler" action="process.php?type=comp&op=upd" method="POST">
		  <div class="modal-body">
			<input type="text" name="edt-comp-id" id="edt-comp-id" class="form-control" hidden readonly >
			<div class="form-group">
				<input type="text" name="edt-comp-code" id="edt-comp-code" class="form-control" placeholder="Firma kodu giriniz" required >
			</div>
			 <div class="form-group">
				<input type="text" name="edt-comp-name" id="edt-comp-name" class="form-control" placeholder="Firma adı giriniz" required >
			</div>
			 <div class="form-group">
				<input type="text" name="edt-comp-address" id="edt-comp-address" class="form-control" placeholder="Firma adresi giriniz" required >
			</div>
			 <div class="form-group">
				<input type="text" name="edt-comp-tax-adm" id="edt-comp-tax-adm" class="form-control" placeholder="Vergi dairesi giriniz" required >
			</div>
			 <div class="form-group">
				<input type="text" name="edt-comp-tax-num" id="edt-comp-tax-num" class="form-control" placeholder="Vergi numarası giriniz" required >
			</div>
			 <div class="form-group">
				<input type="text" name="edt-comp-autorized" id="edt-comp-autorized" class="form-control" placeholder="Yetkili adı giriniz" required >
			</div>
			 <div class="form-group">
				<input type="text" name="edt-comp-phone" id="edt-comp-phone" class="form-control" placeholder="Telefon giriniz" required >
			</div>
			 <div class="form-group">
				<input type="text" name="edt-comp-fax" id="edt-comp-fax" class="form-control" placeholder="Fax giriniz" required >
			</div>
			 <div class="form-group">
				<input type="text" name="edt-comp-gsm" id="edt-comp-gsm" class="form-control" placeholder="GSM giriniz" required >
			</div>
			 <div class="form-group">
				<input type="text" name="edt-comp-web" id="edt-comp-web" class="form-control" placeholder="Web adresi giriniz" required >
			</div>
			 <div class="form-group">
				<input type="text" name="edt-comp-email" id="edt-comp-email" class="form-control" placeholder="Email adresi giriniz" required >
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
<nav aria-label="Page navigation example">
  <ul class="pagination">    
	
   
  </ul>
</nav>
    </section>
	
@endsection