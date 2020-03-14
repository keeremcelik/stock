@extends('sablon')
@section('icerik')
<section class="content">
   
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h4 class="box-title">STOK Listesi</h4>       
                     <div class="optionbar">
            <div class="float-right">
                <a class="" href="{{url('panel/stok/ekle')}}">Yeni Stok Kartı Oluştur</a>
                <a class="" href="{{url('panel/stok/giris')}}">Stok Giriş Fişi Oluştur</a>
                <a class=""  href="{{url('panel/stok/cikis')}}">Stok Çıkış Fişi Oluştur</a>
                <a class=""  href="{{url('panel/stok/transfer')}}">Stok Transfer </a>
            </div>
         
        </div>       
                    <div class="optionbar">
                        <input class="form-control" id="search_text" name="search_text" type="text" value="" placeholder="Search" aria-label="Search">                         
                    </div>
                </div>

                <!-- /.box-header -->

                <div class="box-body table-responsive no-padding">
                    <table id="" class="table">
                        <thead class="">
                            <tr>

                                <th width="10%">Stok Kodu</th>
                                <th width="50%">Ürün Adı</th>
                                <th width="30%">İstatislik</th>
                                <th width="10%">İşlemler</th>
                            </tr>
                        </thead>
                        <tbody  id="prodTable" >
                            @foreach($stoklar as $stok)
                               
                                    @if($stok->piece==0)
                                        @php  
                                            $oran = 0 ;
                                        @endphp
                                    @else
                                        @php
                                            $oran =  ceil($stok->piece*100/$stok->max); 
                                        @endphp  
                                    @endif

                            <tr>
                                <td  class="c-blue">{{$stok->code}}</td>	  
                                <td  class="">{{$stok->pname}}</td>	  
                                <td> 
                                    <div class="clearfix">
                                        <small class="pull-left"> Adet : {{$stok->piece}}</small>
                                        <small class="pull-right">%{{$oran}}</small>
                                    </div>
                                    <div class="progress xs">
                                        <div class="progress-bar progress-bar-green" style="width:{{$oran}}%"> </div>
                                    </div>

                                </td>  
                                <td  class="c-blue">
                                    <div class="islemler">              
                                        <a id="" class="editBtn" href="editStock.php?id='.$st["id"].'" ><i class="fas fa-edit"></i></a>  
                                        <a class="" onclick="return confirmDel();" href="process.php?type=stock&op=del&id='.$st["id"].'"><i class="fas fa-trash-alt"></i></a>
                                    </div>
                                </td>   
                            </tr>
                        </tr>


                        @endforeach
                    </tbody></table>
                </div>

            </div>
            <!-- /.col -->

        </div>

        <!-- Modal -->
        <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Stok yükselt</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="process.php?type=stock&op=up">
                        <div class="modal-body">
                            <div class="form-group">	
                                <input type="text" hidden name="sid" id="sid" class="form-control" value="" >	
                            </div>
                            <div class="form-group">	
                                <input type="text" name="piece" id="piece" class="form-control" placeholder="Adet" value="" >	
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Çıkış</button>
                            <button type="submit" class="btn btn-primary">Kaydet</button>
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