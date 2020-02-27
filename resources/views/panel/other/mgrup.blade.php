@extends('sablon')
@section('icerik')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">   
        <ol class="breadcrumb float-sm-left">
          <li class="breadcrumb-item"><a href="#">Ana Sayfa</a></li>
          <li class="breadcrumb-item active">Malzeme Sınıfı</li>
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
                <form method="post" action="mclass.php">

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
                <th width="10%">Kod</th>
                <th width="60%">Adı</th>
                <th width="20%">Çeşit Sayısı</th>
                <th width="10%"">İşlemler</th>
              </tr>
            </thead>
            <tbody  id="prodTable" >

<!--$sorgu=$baglanti->query("SELECT * FROM m_class where status=1 AND name LIKE '%".$keyword."%' LIMIT ".$limit.",".$sayfada." ");
$sorgu3=$baglanti->query("SELECT count(*) as sonuc FROM m_type ");	
$mtype2 = $sorgu3->fetch(PDO::FETCH_ASSOC);
while ($mclass = $sorgu->fetch(PDO::FETCH_ASSOC)) {		
$sorgu2=$baglanti->query("SELECT count(c_id) as sonuc FROM m_type where c_id=".$mclass["id"]."");
$mtype = $sorgu2->fetch(PDO::FETCH_ASSOC);

$oran= $mtype["sonuc"]*100/$mtype2["sonuc"];-->
@foreach($mgrupları as $mgrup)

<tr>
  <td>{{$mgrup->code}}</td>
  <td>{{$mgrup->name}}</td>
  <td>
    <div class="progress progress-xs">				  
      <div class="progress-bar progress-bar-danger" style="width:10%">0%</div>
    </div>
  </td>				 
  <td>

    <div class="islemler">    

      <a onclick="mgrupCek('{{ $mgrup->id }}','{{ $mgrup->code }}','{{ $mgrup->name }}','{{$mgrup->description}}' );" class="editBtn" href="#"  data-toggle="modal" data-target="#editModal" ><i class="fas fa-edit"></i></a>	 
      <a class=""  onclick="return confirmDel();" href="{{URL::to('panel/mgrup/sil/'.$mgrup->id)}}"><i class="fas fa-trash-alt"></i></a>
    </div>	
  </td>				 

</tr>
@endforeach  
</tbody></table>
</div>

</div>
<!-- /.box -->


</div>
<!-- /.col -->

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
      <form id="formHizmetler" action="{{URL::to('panel/mgrup/ekle')}}" method="POST">
        @csrf
        <div class="modal-body">
         <div class="form-group">
          <input type="text" name="code" id="code" class="form-control" placeholder="Malzeme kodu giriniz" required >
        </div>
        <div class="form-group">
          <input type="text" name="name" id="name" class="form-control" placeholder="Malzeme sınıfı giriniz" required >
        </div>
        <div class="form-group">
          <input type="text" name="description" id="description" class="form-control" placeholder="Malzeme açıklaması giriniz" required >
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
        <h5 class="modal-title" id="exampleModalLabel">Malzeme Sınıfı Düzenle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formHizmetler" action="{{URL::to('panel/mgrup/guncelle')}}" method="POST">
        @csrf
        <div class="modal-body">
          <input type="hidden" name="editid" id="editid"  class="form-control">	
          <div class="form-group">
            <input type="text" name="editcode" id="editcode" class="form-control" placeholder="Malzeme kodu giriniz" required >       
          </div>
          <div class="form-group">
            <input type="text" name="editname" id="editname" class="form-control" placeholder="Malzeme adı giriniz" required >      
          </div>
          <div class="form-group">
            <input type="text" name="editdescription" id="editdescription" class="form-control" placeholder="Malzeme açıklaması giriniz" required >      
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