<!DOCTYPE HTML>
<html>

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="user/asset/assets/css/main.css"/>
    <link rel="stylesheet" href="user/asset/css/bootstrap.min.css" />
	<link rel="icon" href="admin/asset/img/Logo PR-MB-04.png">
	<title>PR-MB</title>
</head>

<body class="landing is-preload">

	<!-- Page Wrapper -->
	<div id="page-wrapper">
		<!-- Header -->
		<header id="header" class="alt">
			<nav id="nav">
				<ul>
					<li class="special">
						<a href="#menu" class="menuToggle"><span>Menu</span></a>
						<div id="menu">
							<ul>
								<li><a id="mybutton" href="any.php">Dashboard</a>
								</li>
								<li><a href="peraturan.php">Peraturan</a></li>
								<li><a href="admin/login.php">Log In</a></li>
							</ul>
						</div>
					</li>
				</ul>
			</nav>
		</header>
		<div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5"
                    style="background: linear-gradient(90deg, #164A41 6.67%, #4D774E 56.77%, #9DC88D 106.67%);">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12 d-none d-lg-block">
                                <h1 class="h2 text-light mb-4 mt-4 ml-4">Politeknik Negeri Batam</h1>
                                <h1 class="h5 text-light mb-4 mt-4 ml-4">Peraturan Peminjaman Ruangan Jurusan Manajemen Bisnis</h1>
                                <?php 
                                include 'admin/koneksi.php';
                                $sql = mysqli_query($koneksi,"SELECT*FROM peraturan");
                                ?>
                                <div class="row">
                                    <div class="col-lg-12 ml-4">
                                        <ol>
                                            <?php while($data = mysqli_fetch_array($sql)){?>
                                            <li><?= $data['isi_peraturan']?></li>
                                            <?php } ?>
                                        </ol>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

		<!-- Footer -->
		<footer id="footer">
			<ul>
				<li>Alamat <br> Jl. Ahmad Yani Batam Kota, Kota Batam, Kepulauan Riau, Indonesia
					<br> Phone : +62-778-469858 Ext.1017 <br>Fax : +62-778-463620 <br> Email : info@polibatam.ac.id</li>
			</ul>
			<ul class="icons">
				<li><a href="https://www.facebook.com/polibatamofficial/" class="icon brands fa-facebook-f"><span
							class="label">Facebook</span></a></li>
				<li><a href="https://www.instagram.com/polibatamofficial/" class="icon brands fa-instagram"><span
							class="label">Instagram</span></a></li>
				<li><a href="https://www.youtube.com/channel/UCxKsDnDYt30bMdXyakD_ZCw"
						class="icon brands fa-youtube"><span class="label">Youtube</span></a></li>
			</ul>
			<ul class="copyright">
				<li>&copy; PR-MB</li>
				</li>
			</ul>
		</footer>
    <style>
		body {
			color: white;
		}
	</style>
	<!-- Scripts -->
	<script src="user/asset/assets/js/jquery.min.js"></script>
	<script src="user/asset/assets/js/jquery.scrollex.min.js"></script>
	<script src="user/asset/assets/js/jquery.scrolly.min.js"></script>
	<script src="user/asset/assets/js/browser.min.js"></script>
	<script src="user/asset/assets/js/breakpoints.min.js"></script>
	<script src="user/asset/assets/js/util.js"></script>
	<script src="user/asset/assets/js/main.js"></script>
    
</body>

</html>