<?php
session_start();
// $directoryURI = $_SERVER['REQUEST_URI'];
// $path = parse_url($directoryURI, PHP_URL_PATH);
// $components = explode('/', $path);
// $active = basename($_SERVER['PHP_SELF'], ".php");
?>
<section class="ftco-section">
	<div class="wrap">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col">
					<p class="mb-0 phone"><span class="fa fa-phone"></span> <a href="#">+00 1234 567</a></p>
				</div>
				<div class="col d-flex justify-content-end">
					<div class="social-media">
						<p class="mt-1">
						<div class="weather">
							<!-- include weather -->

						</div>
						<?php if (!isset($_SESSION['username'])) { ?>
							<div>
								<span><a href="/worldnews/client/login.php">Login</a></span>/
								<span><a href="/worldnews/client/signup.php">Register</a></span>
							</div>
						<?php } ?>
						<!-- <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
							<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
							<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
							<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-dribbble"><i class="sr-only">Dribbble</i></span></a> -->
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="index.php">World <span>News</span></a>
			<form action="/worldnews/client/news_search.php" method="GET" class="searchform order-sm-start">
				<div class="form-group d-flex">
					<input type="text" name="title" class="form-control pl-3" placeholder="Search" value=<?php if (isset($_GET['title'])) {
																												echo $_GET['title'];
																											} ?>>
					<button type="submit" placeholder="" class="form-control search"><span class="fa fa-search"></span></button>
				</div>
			</form>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="fa fa-bars"></span> Menu
			</button>
			<div class="collapse navbar-collapse" id="ftco-nav" style="background-color: white;">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item <?php if ($_SERVER['SCRIPT_NAME'] == '/worldnews/client/index.php') echo 'active'; ?>"><a href="index.php" class="nav-link">Home</a></li>
					<li class="nav-item <?php if ($_SERVER['SCRIPT_NAME'] == '/worldnews/client/about.php') echo 'active'; ?>"><a href="about.php" class="nav-link">Team</a></li>
					<li class="nav-item <?php if ($_SERVER['SCRIPT_NAME'] == '/worldnews/client/contact.php') echo 'active'; ?>"><a href="contact.php" class="nav-link">Contact</a></li>
					<li class="nav-item dropdown">
						<?php if (isset($_SESSION['username'])) { ?>
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-transform: initial;">
								<i class="fas fa-user"></i> <?php echo $_SESSION['username'] ?></a>

							<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<?php if($_SESSION['username'] == 'admin'){?>
								<li><a class="dropdown-item" href="/worldnews/client/admin/dashboard.php"><i class="fas fa-table"></i> Dashboard</a></li>
								<?php } ?>
								<li><a class="dropdown-item" href="/worldnews/client/sign-out.php"><i class="fas fa-sign-out-alt"></i> Sign out</a></li>
							</ul>
						<?php } ?>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</section>
<script src="js/header/jquery.min.js"></script>
<script src="js/header/popper.js"></script>
<script src="js/header/bootstrap.min.js"></script>
<script src="js/header/main.js"></script>