@extends('sablon')
@section('icerik')
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header">
					<h4 class="box-title">STOK Kartı Oluştur</h4>
				</div>
				<!--BOX BODY - HEAD -->
				<div class="box-body">
					<form id="" action="{{URL::to('panel/stok/ekle')}}" method="POST" enctype="multipart/form-data">
						@csrf	
						<div class="form-group">	
							<label>Stok Kodu</label>
							<input type="text" name="code" id="code" class="form-control" value="" >	
						</div>	
						<div class="form-group">	
							<label>Ürün Kodu</label>
							<select class="form-control" name="products" id="products">
								@foreach($urunler as $urun)
								<option value="{{$urun->id}}" name="pid" id="pid">
									{{$urun->code}}
								</option>
								@endforeach										
							</select>
						</div>		
						<div class="form-group">	
							<label>Barkod</label>
							<input type="text" name="barcode" id="barcode" class="form-control" value="" >	
						</div>
						<div class="form-group">	
							<label>Ölçü Birimi Seçiniz</label>
							<select class="form-control" name="obirim" id="obirim">
								@foreach($olcubirimleri as $obirim)
								<option value="{{$obirim->id}}" name="obid" id="obid">
									{{$obirim->name}}
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
						<div class="form-group ">	
							<label>Raf Numarası</label>
							<input type="text" name="shelfnum" id="shelfnum" class="form-control" value="" >	
						</div>								
						<div class="form-group ">	
							<label>Göz Numarası</label>
							<input type="text" name="subshelfnum" id="subshelfnum" class="form-control" value="" >	
						</div>	

						<div class="form-group">	
							<label>Kritik Stok Sayısı</label>
							<input type="number" name="critical" id="critical" class="form-control" value="" >	
						</div>	

						<div class="form-group justnum">	
							<label>Alış Fiyat</label>
							<input type="number" step="0.01" name="buying" id="buying" class="form-control" value="" >	
						</div>	
						<div class="form-group justnum">	
							<label>Satış Fiyat</label>
							<input type="number" step="0.01" name="sales" id="sales" class="form-control" value="" >	
						</div>
						<div class="form-group justnum">	
							<label>KDV</label>
							<input type="number" name="kdv" id="kdv" class="form-control" value="" placeholder="8,18" >	
							<span>Not : Yüzdelik işareti olmadan yazınız. </span>
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