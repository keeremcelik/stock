@extends('sablon')
@section('icerik')
 <section class="content-header">
      <div class="container-fluid">
       <div class="row mb-2">
          <div class="col-sm-6">   
			<ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#">Ana Sayfa</a></li>
              <li class="breadcrumb-item active">Departman İşlemleri</li>
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
						<form method="post" action="department.php">
						
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
					
						<a  id="" onclick="idCek( '{{ $dep->id }}','{{ $dep->name }}' );"  class="editBtn" href="#"   data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i></a>	 
						<a class=""  onclick="return confirmDel();" href="process.php?type=dep&op=del&id='.$dep["id"].'"><i class="fas fa-trash-alt"></i></a>
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
        <h5 class="modal-title" id="exampleModalLabel">Departman Ekle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <form id="formHizmetler" action="{{URL::to('panel/departman/ekle')}}" method="POST">
     	@csrf
		  <div class="modal-body">
			 <div class="form-group">
				
			</div>
			<input type="text" name="name" id="name" class="form-control" placeholder="Departman adı giriniz" required >
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
        <h5 class="modal-title" id="exampleModalLabel">Departman Düzenleme</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <form id="formHizmetler" action="{{URL::to('panel/departman/guncelle')}}" method="POST">
     	@csrf
		  <div class="modal-body">
			<input type="text" name="editid" id="editid" class="form-control" hidden readonly >
			<input type="text" name="editname" id="editname" class="form-control" placeholder="Departman adı giriniz" required >
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