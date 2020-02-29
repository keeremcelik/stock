@extends('sablon')
@section('icerik')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">   
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="#">Ana Sayfa</a></li>
                    <li class="breadcrumb-item active">Stok İşlemleri</li>
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
                        <div class="col-md-10">				
                            <div class="md-form mt-0">
                                <form method="post" action="stocks.php">

                                    <input class="form-control" id="search_text" name="search_text" type="text" value="" placeholder="Search" aria-label="Search">						 
                                    <input type="submit" 
                                    style="position: absolute; left: -9999px; width: 1px; height: 1px;"
                                    tabindex="-1" />

                                </form>
                            </div>
                        </div>
                        <div class="col-md-2">

                            <div class="dropdown">
                                <a class="btn btn-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Seçenekler
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="addStock.php">Stok Ürün Ekle</a>
                                    <a class="dropdown-item" href="#">Giriş Fişi Oluştur</a>
                                    <a class="dropdown-item" href="#">Çıkış Fişi Oluştur</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- /.box-header -->

                <div class="box-body table-responsive no-padding">
                    <table id="" class="table table-bordered">
                        <thead class="thead-dark">
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