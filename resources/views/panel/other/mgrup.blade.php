@extends('sablon')
@section('icerik')
<section class="content">

  <div class="row">
    <div class="col-md-12">
        <div class="optionbar">
        <div class="left">
          <div class="title">
            Malzeme Grubu İşlemleri Modülü
          </div>
          <div class="description">
            Malzeme Grubu yönetimi; ekleme, silme, güncelleme
          </div>
        </div>
        <div class="right">
          <button type="submit" onclick="modalOpen('#mgrupEkle')" id="mgrupEkle-btn"class="btn addbutton"><i class="fas fa-plus"></i> Yeni Ekle</button>            
        </div>
      </div>
      <div class="box">
        <div class="box-header">
          <h4 class="box-title">Malzeme Grubu Listesi</h4>        
       

        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table id="" class="table ">
            <thead class="">

              <tr>
                <th width="10%">Kod</th>
                <th width="60%">Adı</th>
                <th width="20%">Çeşit Sayısı</th>
                <th width="10%">İşlemler</th>
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

      <a onclick="mgrupCek('{{ $mgrup->id }}','{{ $mgrup->code }}','{{ $mgrup->name }}','{{$mgrup->description}}' );modalOpen('#mgrupDuzenle');" class="editBtn" href="#"><i class="fas fa-edit"></i></a>	 
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

<div class="mgrupEkle popup" id="mgrupEkle" tabindex="-1" role="dialog" >
  <div class="popbox" role="document">
    <div class="popbox-content">
      <div class="popbox-header">
        <h5 class="popbox-title" id="">Malzeme Grubu Ekle</h5>
        <button type="button" class="close" onclick="modalClose('#mgrupEkle')" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <form id="formHizmetler" action="{{URL::to('panel/mgrup/ekle')}}" method="POST">
        @csrf
        <div class="popbox-body">           
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
        <div class="popbox-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" id="kaydet" name="kaydet" class="btn btn-primary">Ekle</button>
        </div>
      </form>

    </div>
  </div>
</div>
<div class="mgrupDuzenle popup" id="mgrupDuzenle" tabindex="-1" role="dialog" >
  <div class="popbox" role="document">
    <div class="popbox-content">
      <div class="popbox-header">
        <h5 class="popbox-title" id="">Malzeme Sınıfı Düzenle</h5>
        <button type="button" class="close" onclick="modalClose('#mgrupDuzenle')" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <form id="formHizmetler" action="{{URL::to('panel/mgrup/guncelle')}}" method="POST">
        @csrf
        <div class="popbox-body">   
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