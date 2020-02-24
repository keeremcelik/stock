<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" integrity="sha256-46qynGAkLSFpVbEBog43gvNhfrOj+BmwXdxFgVK/Kvc=" crossorigin="anonymous" />
    	
	<link href="{{URL::asset('css/jquery-ui-git.css')}}" rel="stylesheet">
	<link href="{{URL::asset('css/animate.css')}}" rel="stylesheet">
	<link href="{{URL::asset('css/style.css')}}" rel="stylesheet">
	<link href="{{URL::asset('css/simple-sidebar.css')}}" rel="stylesheet">
	
	

	<title>@yield('baslik')</title>
</head>
<body>
	<div class="d-flex" id="wrapper">
		<div class="bg-light border-right" id="sidebar-wrapper">
		<div class="sidebar-heading">STOK</div>
			<div class="list-group list-group-flush">
				<a href="{{url('/panel')}}" class="list-group-item list-group-item-action bg-light"><i class="fas fa-tachometer-alt"></i> Ana Sayfa</a>
				<a href="#menu1" class="list-group-item collapsed list-group-item-action bg-light" data-toggle="collapse" ><i class="fab fa-product-hunt"></i> Diğer İşlemler</a>
				<div class="collapse" id="menu1">
					<a href="{{url('/panel/department')}}" class="list-group-item" data-parent="#menu1"> Departman İşlemleri</a>
					<a href="{{url('/panel/store')}}" class="list-group-item" data-parent="#menu1"> Depo İşlemleri</a>
					<a href="{{url('/panel/olcubirim')}}" class="list-group-item" data-parent="#menu1"> Ölçü Birimleri İşlemleri</a>
					<a href="{{url('/panel/companies')}}" class="list-group-item" data-parent="#menu1"> Firma İşlemleri</a>
					<a href="{{url('/panel/mclass')}}" class="list-group-item" data-parent="#menu1"> Malzeme Grubu İşlemleri </a>
					<a href="{{url('/panel/mtype')}}" class="list-group-item" data-parent="#menu1"> Malzeme Cinsi </a>
					<a href="{{url('/panel/products')}}" class="list-group-item" data-parent="#menu1"> Ürün İşlemleri</a>
				</div>
				<a href="#menu2" class="list-group-item collapsed list-group-item-action bg-light" data-toggle="collapse" ><i class="fas fa-cubes"></i> STOK İşlemleri</a>
				<div class="collapse" id="menu2">
					<a href="{{url('/panel/stocks')}}" class="list-group-item" data-parent="#menu2"><i class="fas fa-plus"></i> STOK İşlemleri</a>
					<a href="{{url('/panel/addStock')}}" class="list-group-item" data-parent="#menu2"><i class="fas fa-plus"></i> Stok Ürün Ekleme</a>
					<a href="{{url('/panel/inStock')}}" class="list-group-item" data-parent="#menu2"><i class="fas fa-minus"></i> STOK Giriş Yap</a>
					<a href="{{url('/panel/outStock')}}" class="list-group-item" data-parent="#menu2"><i class="fas fa-minus"></i> STOK Çıkış Yap</a>
				</div>
				<a href="#menu3" class="list-group-item collapsed list-group-item-action bg-light" data-toggle="collapse" ><i class="fas fa-users"></i> Kullanıcı İşlemleri</a>
				<div class="collapse" id="menu3">
					<a href="#" class="list-group-item" data-parent="#menu3"><i class="fas fa-user-plus"></i> Kullanıcı Ekle</a>
					<a href="#" class="list-group-item" data-parent="#menu3"><i class="fas fa-user-edit"></i> Kullanıcı Güncelleme</a>
					<a href="#" class="list-group-item" data-parent="#menu3"><i class="fas fa-user-minus"></i> Kullanıcı Silme</a>
				</div>
			</div>
    	</div>
    	<div class="page-content-wrapper" style="width: 100%">
				<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
					<button class="btn btn-primary" id="menu-toggle">☰</button>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto mt-2 mt-lg-0">
						<li class="nav-item active">
							<a class="dropdown-item" href="logout.php">Çıkış Yap</a>
						</li>
					</ul>
				</div>
			</nav>
			<div class="container-fluid">
				@yield('icerik')
			</div>
    	</div>
	</div>
    <script src="{{URL::asset('js/my.js')}}"></script>
	<script src="{{URL::asset('js/jquery-3.4.1.min.js')}}"></script>
	<script src="{{URL::asset('js/popper.min.js')}}" ></script>
<!--0	<script src="files/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>-->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	<script src="{{URL::asset('js/my.js')}}"></script>

	<script>
		$("#menu-toggle").click(function(e) {
			e.preventDefault();
			$("#wrapper").toggleClass("toggled");
		});
	</script>
</body>
</html>