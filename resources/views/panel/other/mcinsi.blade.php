@extends('sablon')
@section('icerik')
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
       <div class="row mb-2">
          <div class="col-sm-6">   
			<ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#">Ana Sayfa</a></li>
              <li class="breadcrumb-item active">Malzeme Tipi</li>
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
						<form method="post" action="mtype.php">
						
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
                  <th>Malzeme Adı</th>
                  <th>Sınıfı Adı</th>
                  <th style="width: 40px">İşlemler</th>
                </tr>
				 </thead>
				  <tbody  id="prodTable" >
				@foreach($mcinsleri as $mcinsi)
				
				
				 <tr>
				  <td>{{$mcinsi->name}}</td>		 
				  <td>{{$mcinsi->c_id}}</td>
				  <td>
				  <div class="islemler">    
					
						<a onclick="mtypeCek('.$mclass["id"].')" class="editBtn" href="#"  data-toggle="modal" data-target="#editModal"  ><i class="fas fa-edit"></i></a>	 
						<a class=""  onclick="return confirmDel();" href="process.php?type=mattyp&op=del&id='.$mclass["id"].'"><i class="fas fa-trash-alt"></i></a>
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Malzeme Sınıfı Ekle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <form id="formHizmetler" action="process.php?type=mattyp&op=add" method="POST">
		  <div class="modal-body">
			 <div class="form-group">
				<select class="form-control" name="classid" id="classid">
				
				
				</select>
			</div>
			<input type="text" name="name" id="name" class="form-control" placeholder="Malzeme adı giriniz" required >
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
        <h5 class="modal-title" id="exampleModalLabel">Malzeme Tipi Düzenle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <form id="formHizmetler" action="process.php?type=mattyp&op=upd" method="POST">
		  <div class="modal-body">
		  <input type="hidden" name="edt-mtype-id" id="edt-mtype-id"  value="" class="form-control">	
			 <div class="form-group">
			 <input type="text" name="edt-mtype-class" id="edt-mtype-class" class="form-control" placeholder="Malzeme sınıfı giriniz" required >
			</div>
			 <div class="form-group">
						<input type="text" name="edt-mtype-name" id="edt-mtype-name" class="form-control" placeholder="Malzeme tipi giriniz" required >
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