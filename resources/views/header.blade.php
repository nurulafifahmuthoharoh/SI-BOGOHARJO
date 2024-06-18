<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Site Title -->
	<title>SISTEM INFORMASI PENGELOLAAN UNIT USAHA BUMDES BOGOHARJO</title>
	<link rel="icon" href="img/logo.png">
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
	 <!-- CSS -->
	<link href="img/css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="travelista-master/css/linearicons.css">
	<link rel="stylesheet" href="travelista-master/css/font-awesome.min.css">
	<link rel="stylesheet" href="travelista-master/css/bootstrap.css">
	<link rel="stylesheet" href="travelista-master/css/magnific-popup.css">
	<link rel="stylesheet" href="travelista-master/css/jquery-ui.css">
	<link rel="stylesheet" href="travelista-master/css/nice-select.css">
	<link rel="stylesheet" href="travelista-master/css/animate.min.css">
	<link rel="stylesheet" href="travelista-master/css/owl.carousel.css">
	<link rel="stylesheet" href="travelista-master/css/main.css">
	<style>
        .banner-area {
            background-image: url('/img/gambar/bg.jpg'); 
            background-size: cover; 
            background-position: center;
        }
		.unit-banner {
            background-image: url('/img/gambar/bg-unit.jpg'); 
            background-size: cover; 
            background-position: center;
        }
        .modal {
        overflow: auto;
        }
        .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        }

		

        .close:hover,
        .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;

	@media only screen and (max-width: 768px) {
    .nav-menu ul ul {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        background-color: #fff;
        padding: 10px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    .nav-menu ul li:hover > ul {
        display: block;
    }
}

        }
    </style>
</head>
<body style=" font-family: 'Nunito', sans-serif;">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css" rel="stylesheet">
	  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<header id="header">
		<div class="header-top">
			<div class="container">
				<div class="row align-items-center">
				</div>
			</div>
		</div>
		<div class="container main-menu" style="width: 1500px; ">
			<div class="row align-items-center justify-content-between d-flex" >
				<div id="logo" class="mr-auto">
					<a href="index.php"><img src="img/logo.png" width="50px" height="65px"/></a>
				</div>
				<nav id="nav-menu-container">
					<ul class="nav-menu">
						<li><a href="/">Beranda</a></li>
						<li><a href="#">Unit Usaha</a>
							<ul >
								<li><a href="{{ route('lumbungpadi') }}">Lumbung Padi</a></li>
								<li><a href="{{ route('sewatratak') }}">Sewa Tratak</a></li>
								<li><a href="{{ route('airbersih') }}">Air Bersih</a></li>
							</ul>
						</li>						
						<li><a href="{{ route('informasi') }}">Berita</a></li>
						<li><a href="{{ route('kontak') }}">Kontak</a></li>
						<li><a href="login" class="btn btn-white btn-block">Login</a></li>
					</ul>
				</nav><!-- #nav-menu-container -->
			</div>
		</div>
	</header><!-- #header -->
</body>
</html>