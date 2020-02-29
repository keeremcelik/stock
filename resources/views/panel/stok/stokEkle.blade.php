@extends('sablon')
@section('icerik')
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">   
				<ol class="breadcrumb float-sm-left">
					<li class="breadcrumb-item"><a href="index.php">Ana Sayfa</a></li>
					<li class="breadcrumb-item active"><a href="stocks.php">Stok İşlemleri</a></li>
					<li class="breadcrumb-item active">Stok Ekle</li>
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

						<form id="" action="process.php?type=stock&op=add" method="POST" enctype="multipart/form-data">
							<div class="row" style="padding: 2vw;">						
								<div class="col-lg-12">

									<div class="form-group">	
										<label>Stok Kodu</label>
										<input type="text" name="code" id="code" class="form-control" value="" >	
									</div>	
									<div class="form-group">	
										<label>Ürün Kodu</label>
										<select class="form-control" name="products" id="products">
											<?php
											$sorgu=$baglanti->query("SELECT id,code FROM products");	
											while($mclass = $sorgu->fetch(PDO::FETCH_ASSOC)){
												echo '<option value="'.$mclass["id"].'" name="pid" id="pid">'.$mclass["code"].'</option>';
											}												
											?>											
										</select>
									</div>		
									<div class="form-group">	
										<label>Barkod</label>
										<input type="text" name="barcode" id="barcode" class="form-control" value="" >	
									</div>	
									<div class="form-group">	
										<label>Depo Seçiniz</label>
										<select class="form-control" name="stores" id="stores">
											<?php
											$sorgu=$baglanti->query("SELECT id,name FROM stores");	
											while($stores = $sorgu->fetch(PDO::FETCH_ASSOC)){
												echo '<option value="'.$stores["id"].'" name="pid" id="pid">'.$stores["name"].'</option>';
											}

											?>

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