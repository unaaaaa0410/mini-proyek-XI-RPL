<?php 
	session_start();

	$random=rand(1, 3);
	$player="👸🏼";   
	$robot="🤴🏼";
	$hasil="";
	$lopePlayer="❤️❤️❤️";
	$lopeRobot="❤️❤️❤️";

	//meriset nyawa semua
	if (isset($_POST['reset'])) {
		session_unset();

	}

	
	// ketika tombol yang di pilih di klik
	if (isset($_POST['🤚']) || isset($_POST['✌']) || isset($_POST['✊'])) {
		
	
	// ketika player memilih
		if (isset($_POST['🤚'])) {
			$player="🤚";
		}elseif(isset($_POST['✌'])) {
			$player="✌";
		}elseif(isset($_POST['✊'])) {
			$player="✊";
		}


	// ketika robot memilih
		if ($random == 1) {
			$robot="🤚";
		}elseif($random == 2){
			$robot="✌";
		}elseif($random == 3){
			$robot="✊";
		}
	}

	 if ($player == $robot) {
	 	$hasil="hasil seri 😞";
	 }elseif(
	 	($player=="🤚" && $robot=="✊") ||
	 	($player=="✌" && $robot=="🤚") ||
	 	($player=="✊" && $robot=="✌") 
	 	)
	 {

	 	$hasil="kamu menang 🤩";

	 }elseif(
	 	($robot=="🤚" && $player=="✊") ||
	 	($robot=="✌" && $player=="🤚") ||
	 	($robot=="✊" && $player=="✌") 
	 	)
	 {

	 	$hasil="kamu kalah 😱";

		}

		//logika pengurangan nyawa robot dan player
		//1.kita simpan dulu jumalah nyawa rovbot dan player (session)
		//2.kita tampilkan kembali nyawa robot dAN player sesuai dengan jumlah saat selesai suit


		//proses menyimpan nyawa kedalam session
		if ($hasil=="kamu menang 🤩") {
			//cek apakah session myawa robot ad?
			if (!isset($_SESSION['nyawaRobot'])) {
				//membuat session nyawa robot dengan isi 2
				$_SESSION['nyawaRobot']=2;

			}elseif ($_SESSION['nyawaRobot']==2) {
				//ubah session nyawa menjadi satu
				$_SESSION['nyawaRobot']=1;

			}elseif ($_SESSION['nyawaRobot']==1) {
				$_SESSION['nyawaRobot']=0;
			}


			}elseif ($hasil=="kamu kalah 😱") {
				//cek apakah session myawa robot ad?
			if (!isset($_SESSION['nyawaPlayer'])) {
				//membuat session nyawa robot dengan isi 2
				$_SESSION['nyawaPlayer']=2;

			}elseif ($_SESSION['nyawaPlayer']==2) {
				//ubah session nyawa menjadi satu
				$_SESSION['nyawaPlayer']=1;

			}elseif ($_SESSION['nyawaPlayer']==1) {
				$_SESSION['nyawaPlayer']=0;

			}
			
		}
		//menyimpan nyawa selesai

		 if (isset($_SESSION['nyawaPlayer']) || isset($_SESSION['nyawaRobot'])) {
		 	//untuk mengurusi nyawa
		 	if (isset($_SESSION['nyawaRobot'])) {
		 		$nyawaRobot=$_SESSION['nyawaRobot'];

		 	if ($nyawaRobot==2) {
		 		$lopeRobot="❤️❤️";
		 	}elseif ($nyawaRobot==1) {
		 		$lopeRobot="❤️";
		 	}elseif ($nyawaRobot==0) {
		 		$lopeRobot="";
		 	}
		 }
		 if (isset($_SESSION['nyawaPlayer'])) {
			$nyawaPlayer=$_SESSION['nyawaPlayer'];
		 if ($nyawaPlayer==2) {
		 		$lopePlayer="❤️❤️";
		 	}elseif ($nyawaPlayer==1) {
		 		$lopePlayer="❤️";
		 	}elseif ($nyawaPlayer==0) {
		 		$lopePlayer="";
		 }
		
		} 		
	}	 

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>✮suit</title>

	<!-- konwksi dengan boostrap css -->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

 	<!-- koneksi dengan css sendiri -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

	<!-- koneksi dengan js boostrap -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<div class=" bg-img">
		<div class="bg-atas d-flex text-light">
			<div class="kiri  col-6 ps-4 d-flex align-items-center">
				<h1>👸🏼</h1>
				<h4><?= $lopePlayer ?></h4>
			</div>
			<div class="kanan col-6 text-end pe-4 d-flex align-items-center justify-content-end">
				<h4><?= $lopeRobot ?></h4>
				<h1>🤴🏼</h1>
			</div>
		</div>
		
		<div class="body d-flex align-items-center justify-content-center flex-column" style="min-height:80vh">
			<form method="post" action="">
				<button type="submit" name="reset" class=" btn btn-outline-light">reset</button>
			</form>

			<div class="hasil text-light mb-4">
			</div>

			<!-- ini stat -->
			<button type="submit" class="btn btn-outline-light mb-4" data-bs-toggle="modal" data-bs-target="#PilihEmoji">start</button>


			<div class="arena bg-glases p-3 col-lg-8 row text-light">

				<!-- ini arena -->
				<div class="col-4 kanan col-3">
					<h3 class="">player</h3>
					<h1 style="font-size:65px" class="text-center"><?= $player ?></h1>
				</div>

				<div class="col-4 tengah col-3 text-center d-flex align-items-center justify-content-center">
					<p class="fw-bold" style="font-size:60px">VS</p>
				</div>


				<div class="col-4 kiri col-3 text-end">
					<h3 class="">robot</h3>
					<h1 style="font-size:65px" class="text-center"><?= $robot ?></h1>
				</div>
			</div>
			<!-- MODAL AWALLLLLLLL -->
			<div class="modal fade" id="PilihEmoji" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content bg-glases text-light">
					  <div class="modal-header">
					  	<h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
					  	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					  </div>

					  <div class="modal-body text-center">
					      	<form method="post" action="">
						      	<!-- pilih kertas -->
						        <button class="btn btn-outline-light" name="🤚">
						        	<h1>🤚</h1>
						        </button>

						        <!-- pilih gunting -->
						        <button class="btn btn-outline-light mx-5" name="✌">
						        	<h1>✌</h1>
						        </button>

						        <!-- pilih batu -->
						        <button class="btn btn-outline-light" name="✊">
						        	<h1>✊</h1>
						        </button>
					        </form>
					    </div>
					</div>
				</div>
			</div>
			<!-- modal end -->

			<!-- MODAL PESAN START -->

			<div class="modal fade" id="ModalPesan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content bg-glases text-light">
					  <div class="modal-body text-center">
					  	<h1><?= $hasil ?></h1>
					    </div>
					</div>
				</div>
			</div>
			<!-- MODAL PESAN END -->
	</div>
</body>
</html>

<?php if (!empty($hasil)): ?>
	<script>
		var hasilModal = new bootstrap.Modal(document.getElementById('ModalPesan'));
		hasilModal.show();
	</script>
<?php endif ?>