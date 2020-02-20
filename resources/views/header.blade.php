
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>STOK</title>

  <!-- Bootstrap core CSS -->

  <link href="files/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="files/css/simple-sidebar.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" integrity="sha256-46qynGAkLSFpVbEBog43gvNhfrOj+BmwXdxFgVK/Kvc=" crossorigin="anonymous" />
	<link rel="stylesheet" href="files/css/jquery-ui-git.css">
	<link rel="stylesheet" type="text/css" href="files/css/animate.css">
	<link rel="stylesheet" type="text/css" href="files/css/style.css">
</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">STOK</div>
      <div class="list-group list-group-flush">
        <a href="index.php" class="list-group-item list-group-item-action bg-light"><i class="fas fa-tachometer-alt"></i> Ana Sayfa</a>
        <a href="#menu1" class="list-group-item collapsed list-group-item-action bg-light" data-toggle="collapse" ><i class="fab fa-product-hunt"></i> Diğer İşlemler</a>
		<div class="collapse" id="menu1">
		<a href="department.php" class="list-group-item" data-parent="#menu1"> Departman İşlemleri</a>
		<a href="store.php" class="list-group-item" data-parent="#menu1"> Depo İşlemleri</a>
		<a href="olcubirim.php" class="list-group-item" data-parent="#menu1"> Ölçü Birimleri İşlemleri</a>
		<a href="companies.php" class="list-group-item" data-parent="#menu1"> Firma İşlemleri</a>
			<a href="mclass.php" class="list-group-item" data-parent="#menu1"> Malzeme Grubu İşlemleri </a>
			<a href="mtype.php" class="list-group-item" data-parent="#menu1"> Malzeme Cinsi </a>
			<a href="products.php" class="list-group-item" data-parent="#menu1"> Ürün İşlemleri</a>
		</div>
		<a href="#menu2" class="list-group-item collapsed list-group-item-action bg-light" data-toggle="collapse" ><i class="fas fa-cubes"></i> STOK İşlemleri</a>
		<div class="collapse" id="menu2">
			<a href="stocks.php" class="list-group-item" data-parent="#menu2"><i class="fas fa-plus"></i> STOK İşlemleri</a>
			<a href="addStock.php" class="list-group-item" data-parent="#menu2"><i class="fas fa-plus"></i> Stok Ürün Ekleme</a>
			<a href="inStock.php" class="list-group-item" data-parent="#menu2"><i class="fas fa-minus"></i> STOK Giriş Yap</a>
			<a href="outStock.php" class="list-group-item" data-parent="#menu2"><i class="fas fa-minus"></i> STOK Çıkış Yap</a>
		</div>
		<a href="#menu3" class="list-group-item collapsed list-group-item-action bg-light" data-toggle="collapse" ><i class="fas fa-users"></i> Kullanıcı İşlemleri</a>
		<div class="collapse" id="menu3">
			<a href="#" class="list-group-item" data-parent="#menu3"><i class="fas fa-user-plus"></i> Kullanıcı Ekle</a>
			<a href="#" class="list-group-item" data-parent="#menu3"><i class="fas fa-user-edit"></i> Kullanıcı Güncelleme</a>
			<a href="#" class="list-group-item" data-parent="#menu3"><i class="fas fa-user-minus"></i> Kullanıcı Silme</a>
		</div>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->
	
	   <!-- Page Content -->
    <div id="page-content-wrapper">

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
