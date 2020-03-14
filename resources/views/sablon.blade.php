<!DOCTYPE html>
<html>
<head>

	<link href="{{URL::asset('css/all.css')}}" rel="stylesheet">
	<link href="{{URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{URL::asset('css/jquery-ui-git.css')}}" rel="stylesheet">
	<link href="{{URL::asset('css/animate.css')}}" rel="stylesheet">
	<link href="{{URL::asset('css/style.css')}}" rel="stylesheet">
	<link href="{{URL::asset('css/sidebar.css')}}" rel="stylesheet">

	<title>@yield('baslik')</title>
</head>
<body>
	<div class="d-flex" id="wrapper">
		<div id="sidebar">
			<div class="sidebar-content">	
				<div class="sidebar-head">

					<button class="btnToggle" onclick="sidebarToggle()" id="menu-toggle">☰</button>	
				</div>
				<div class="sidebar-menu">
					<a href="{{url('/panel')}}" class=""><i class="m-icon fas fa-tachometer-alt"></i><span class="modul-title">Ana Sayfa</span></a>

					<span class="anamodul">Yönetim Modülleri</span>

					<a href="#departman" class="collapsed altmodul" data-toggle="collapse"><i class="m-icon fas fa-sitemap"></i><span class="modul-title">Departman İşlemleri </span></a>
					<div class="collapse" id="departman">
						<a href="{{url('/panel/departman')}}" class="modulislem" data-parent="#departman"> <span class="modul-title">Departman Listele </span></a>
						<a href="{{url('/panel/departman/ekle')}}" class="modulislem" data-parent="#departman"> <span class="modul-title">Departman Ekle</span></a>
					</div>
					<a href="#depo" class="collapsed altmodul" data-toggle="collapse"><i class="m-icon fas fa-warehouse"></i><span class="modul-title">Depo İşlemleri </span></a>
					<div class="collapse" id="depo">
						<a href="{{url('/panel/depo')}}" class="modulislem" data-parent="#yonetim"> <span class="modul-title">Depo Listele</span></a>
					</div>
					<a href="#olcubirim" class="collapsed altmodul" data-toggle="collapse"> <i class="m-icon fas fa-ruler"></i><span class="modul-title">Ölçü Birimleri İşlemleri </span></a>
					<div class="collapse" id="olcubirim">
						<a href="{{url('/panel/olcubirim')}}" class="modulislem" data-parent="#yonetim"> <span class="modul-title">Ölçü Birimleri Listele</span></a>
					</div>
					<a href="{{URL::to('panel/kullanici/liste')}}" class="collapsed altmodul" data-parent="#yonetim"><i class="m-icon fas fa-users-cog"></i><span class="modul-title">Kullanıcı İşlemleri </span></a>

					<span class="anamodul">Stok Modülü</span>

					<a href="#stok" class="collapsed altmodul" data-toggle="collapse"><i class="m-icon fas fa-box"></i><span class="modul-title"> STOK Modülü </span></a>
					<div class="collapse" id="stok">
						<a href="{{url('/panel/stok')}}" class="modulislem" data-parent="#stok"> <span class="modul-title">Stok İşlemleri</span></a>
						<a href="{{url('/panel/firmalar')}}" class="modulislem" data-parent="#stok"> <span class="modul-title">Firma İşlemleri</span></a>
						<a href="{{url('/panel/mgrup')}}" class="modulislem" data-parent="#stok"> <span class="modul-title">Malzeme Grubu İşlemleri</span> </a>
						<a href="{{url('/panel/mcinsi')}}" class="modulislem" data-parent="#stok"><span class="modul-title"> Malzeme Cinsi</span></a>
						<a href="{{url('/panel/urunler')}}" class="modulislem" data-parent="#stok"> <span class="modul-title">Ürün İşlemleri</span></a>
					</div>
				</div>
			</div>


		</div>	

		<div id="page-content" style="width: 100%">
			<nav class="navbar">

				<div class="container-fluid">
					<div class="navbar-header">
					
					</div>
					<ul class="nav navbar-nav">
						

					</ul>
					<ul class="nav navbar-nav navbar-right navbar-btns">
						<li class="dropdown">
							<span class="navbar-btn" data-toggle="dropdown" aria-expanded="false">
								<img class="avatar" src="{{URL::asset('storage/img/brc.png')}}" alt="...">
							</span>
							<div class="dropdown-menu dropdown-menu-right userbox"style="position: absolute;">
								<a class="dropdown-item" href="../page/profile.html"><i class="fas fa-user"></i> Kullanıcı Sayfası</a>
								<a class="dropdown-item" href="../page-app/mailbox.html">
									<div class="flexbox">
										<i class="fas fa-envelope"></i>
										<span class="flex-grow">Mesajlar</span>
										<span class="badge badge-pill badge-info">0</span>
									</div>
								</a>
								<a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Ayarlar</a>
								<div class="dropdown-divider"></div>

								<a class="dropdown-item" href="../page-extra/user-login-3.html"><i class="fas fa-sign-out-alt" style="color: #dd4b39;"></i> Çıkış</a>
							</div>
						</li>
						<li class="dropdown d-none d-md-block">
							<span class="navbar-btn has-new" data-toggle="dropdown" aria-expanded="false"><i class="far fa-bell"></i></span>
							<div class="dropdown-menu dropdown-menu-right userbox" x-placement="bottom-end" style="position: absolute; width: 350px;left: -314px;">

								<div class="notification-list">
									<a class="notification" href="#">
										<span class="avatar bg-success"><i class="far fa-bell"></i></span>
										<div class="notification-body">
											<p>New user registered</p>
											<time datetime="2018-07-14 20:00">Just now</time>
										</div>
									</a>
									<a class="notification" href="#">
										<span class="avatar bg-info"><i class="far fa-bell"></i></span>
										<div class="notification-body">
											<p>New user registered</p>
											<time datetime="2018-07-14 20:00">Just now</time>
										</div>
									</a>
									<a class="notification" href="#">
										<span class="avatar bg-warning"><i class="far fa-bell"></i></span>
										<div class="notification-body">
											<p>New user registered</p>
											<time datetime="2018-07-14 20:00">Just now</time>
										</div>
									</a>
									<a class="notification" href="#">
										<span class="avatar bg-primary"><i class="far fa-bell"></i></span>
										<div class="notification-body">
											<p>New user registered</p>
											<time datetime="2018-07-14 20:00">Just now</time>
										</div>
									</a>

									
								</div>

								<div class="dropdown-footer">
									<div class="left">
										<a href="#">Read all notifications</a>
									</div>

									<div class="right">
										<a href="#" data-provide="tooltip" title="" data-original-title="Mark all as read"><i class="fa fa-circle-o"></i></a>
										<a href="#" data-provide="tooltip" title="" data-original-title="Update"><i class="fa fa-repeat"></i></a>
										<a href="#" data-provide="tooltip" title="" data-original-title="Settings"><i class="fa fa-gear"></i></a>
									</div>
								</div>

							</div>
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
	
	<script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
	<script src="{{URL::asset('js/my.js')}}"></script>

	<script src="{{URL::asset('js/sidebar.js')}}"></script>
</body>
</html>