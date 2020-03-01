@extends('sablon')
@section('icerik')

<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">   
				<ol class="breadcrumb float-sm-left">
					<li class="breadcrumb-item"><a href="index.php">Ana Sayfa</a></li>
					<li class="breadcrumb-item active"><a href="{{url('panel/stok')}}">Stok İşlemleri</a></li>
					<li class="breadcrumb-item active">Transfer İşlemi</li>
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
				<div class="row">
					<div class="col-lg-12">

						<form id="" action="{{URL::to('panel/stok/transfer')}}" method="POST">
							@csrf
							<div class="row" style="padding: 2vw;">						
								<div class="col-lg-12">

									<div class="form-group">	
										<label>Stok Kodu</label>
										<select class="form-control" name="stoklar" id="stoklar">
											@foreach($stoklar as $stok)
											<option value="{{$stok->id}}" name="sid" id="sid">
											{{$stok->code}}
											</option>
											@endforeach										
										</select>
									</div>	
									<div class="form-group">	
										<label>Çıkış Deposu Seçiniz</label>
										<select class="form-control" name="inpstores" id="inpstores">
										@foreach($depolar as $depo)
											<option value="{{$depo->id}}" name="insid" id="insid">
											{{$depo->code}}
											</option>
											@endforeach	
											
										</select>
									</div>		
									<div class="form-group">	
										<label>Giriş Deposu Seçiniz</label>
										<select class="form-control" name="outstores" id="outstores">
										@foreach($depolar as $depo)
											<option value="{{$depo->id}}" name="outsid" id="outsid">
											{{$depo->code}}
											</option>
											@endforeach	
											
										</select>
									</div>								
									<div class="form-group justnum">	
										<label>Miktar</label>
										<input type="number" name="piece" id="piece" class="form-control" value="" >	
									</div>
									<div class="form-group justnum">	
										<label>Alış Fiyat</label>
										<input type="number" step="0.01" name="unitprice" id="unitprice" class="form-control" value="" >	
									</div>
									<div class="form-group">	
										<label>Açıklama</label>
										<textarea class="form-control" rows="5"  name="description" id="description"></textarea>
									</textarea> 
								</div>	



								<button type="submit" id="kaydet" name="kaydet" class="btn btn-primary">Kaydet</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- /.col -->

</div>


<!-- /.card -->
</section>
@endsection