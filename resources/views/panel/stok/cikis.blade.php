@extends('sablon')
@section('icerik')
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header">
					<h4 class="box-title">STOK Çıkış Fişi Oluştur</h4>
				</div>
				<!--BOX BODY - HEAD -->
				<div class="box-body">
					<form id="" action="{{URL::to('panel/stok/cikis')}}" method="POST" enctype="multipart/form-data">
						@csrf						
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
							<label>Departman Seçiniz</label>
							<select class="form-control" name="departmanlar" id="departmanlar">
								@foreach($departmanlar as $dep)
								<option value="{{$dep->id}}" name="did" id="did">
									{{$dep->name}}
								</option>
								@endforeach	

							</select>
						</div>
						<div class="form-group">	
							<label>Depo Seçiniz</label>
							<select class="form-control" name="stores" id="stores">
								@foreach($depolar as $depo)
								<option value="{{$depo->id}}" name="sid" id="sid">
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
							<label>Satış Fiyat</label>
							<input type="number" step="0.01" name="unitprice" id="unitprice" class="form-control" value="" >	
						</div>
						<div class="form-group">	
							<label>Açıklama</label>
							<textarea class="form-control" rows="5"  name="description" id="description"></textarea>

						</div>	
						<button type="submit" id="kaydet" name="kaydet" class="btn btn-primary">Kaydet</button>

					</form>
				</div>
				<!--BOX BODY - END -->
			</div>
		</div>
	</div>
</section>
@endsection








