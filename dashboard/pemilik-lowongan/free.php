<?php  
  session_start();
  require_once '../../controller/koneksi.php';
  require_once '../../controller/session.php';
  require_once '../../controller/class.script.php';
  require_once '../../controller/class.postingan.php';

  $pengiklan = new postingan();
  $script = new function_script();

  session_cek();

?>

<!DOCTYPE html>
<html lang="en">
<head>

	<title> JobUs | Dashboard </title>
	<?php include '../../view/source.php'; ?>

</head>
	
<body>
<!-- banner -->
	<div class="banner1">
		<div class="container">
			
			<?php include '../../view/header.php'; ?>

		</div>
	</div>
<!-- banner -->

<!-- Menu -->
<br>
<div class="container">
<!-- MAKAN BANG -->
	<nav class="navbar navbar-default transbg">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand"><img class="img-responsive" src="../../assets/images/coin-small.png"></a><a class="coin">0</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
         
      <ul class="nav navbar-nav navbar-right" id="menu">
        <li role="presentation" class="active"><a href="lowonganbaru.php">New Upload</a></li>
        <li role="presentation"  class="noac"><a href="employee.php">Employee</a></li>
        <li role="presentation" class="noac"><a href="profile.php">Profile</a></li>
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>
<!-- end Menu -->
<!-- Dashboard -->
<br>
<div class="container">
	<div class="panel panel-default">
	  <div class="panel-body">
	  	<h4>Ketentuan :</h4><br>
	    <ul class="list-group">
		  <li class="list-group-item">1. Isilah lowongan yang sesuai dengan perusahaan, toko , ataupun perorangan yang membutuhkan pekerja</li>
		  <li class="list-group-item">2. Pastikan anda sudah melengkapi profile anda, agar pekerja tidak sulit menemukan anda nantinya</li>
		  <li class="list-group-item">3. Sampaikan deskripsi pekerjaan dengan jelas dan ringkas</li>
		  <li class="list-group-item">4. Iklan anda akan bertahan selama 1 minggu</li>
		</ul>
	  </div>
	</div>
</div>
<br>
<div class="container">

<form method="post">
	<div class="form-group">
		  <label for="posisi">Judul Lowongan</label>
		  <input type="text" class="form-control" name="judul" placeholder="Lowongan Kerja PT Freeport / Dicari tukang kebun buah naga" required="">
	</div>
	<div class="form-group">
		  <label for="posisi">Deskripsi Pekerjaan (syarat dan ketentuan pekerja)</label>
		  <textarea class="form-control" rows="5" id="req" name="deskripsi" placeholder="ex: Saya membutuhkan 2 orang tukang kebun yang setidaknya berpengalaman dalam berkebun" required=""></textarea>
	</div>
	<div class="form-group">
		<label for="posisi">Kategori Pekerja (Bisa dipilih lebih dari 1)</label><br><br>
		<div class="container">
			<div class="col-sm-4">
				<input type="checkbox" name="kategori"> Administrasi </input><br>
				<input type="checkbox" name="kategori"> Karyawan Toko </input><br>
				<input type="checkbox" name="kategori"> Marketing & Sales </input><br>
				<input type="checkbox" name="kategori"> SPG & SPB </input><br>
				<input type="checkbox" name="kategori"> Manajemen </input><br>
				<input type="checkbox" name="kategori"> Fotografer </input><br>
				<input type="checkbox" name="kategori"> Desain Grafis dan Multimedia </input><br>
				<input type="checkbox" name="kategori"> Penerjemah </input><br>
			</div>
			<div class="col-sm-4">
				<input type="checkbox" name="kategori"> Teknologi </input><br>
				<input type="checkbox" name="kategori"> Teknik </input><br>
				<input type="checkbox" name="kategori"> Hukum </input><br>
				<input type="checkbox" name="kategori"> Akuntansi </input><br>
				<input type="checkbox" name="kategori"> Kesehatan </input><br>
				<input type="checkbox" name="kategori"> Akuntan </input><br>
				<input type="checkbox" name="kategori"> Entry Data </input><br>
				<input type="checkbox" name="kategori"> Pengajar / kursus </input><br>
			</div>
			<div class="col-sm-4">
				<input type="checkbox" name="kategori"> Peternakan dan Pertanian </input><br>
				<input type="checkbox" name="kategori"> Pegawai Negeri </input><br>
				<input type="checkbox" name="kategori"> Website Design and Developper </input><br>
				<input type="checkbox" name="kategori"> Mobile Developer </input><br>
				<input type="checkbox" name="kategori"> Penulis Lepas (content writer) </input><br>
				<input type="checkbox" name="kategori"> Pembantu dan Baby Sitter </input><br>
				<input type="checkbox" name="kategori"> Driver </input><br>
				<input type="checkbox" name="kategori"> Lain - lain </input><br>
			</div>
		</div>
	</div>
	<div class="form-group">
		  <label for="posisi">Gaji</label>
		  <input type="text" class="form-control" name="gaji" placeholder="ex: Rp. 4.500.000  -  Rp. 9.000.000" required="">
	</div>
	<div class="form-group">
		  <label for="posisi">Keterangan Tambahan (jika dibutuhkan)</label>
		  <textarea class="form-control" rows="5" id="req" name="keterangan" placeholder="ex: Tukang kebun akan tinggal digubuk pada ladang saya, untuk biaya beli beras dan uang harian akan saya berikan" required=""></textarea>
	</div>
	<div class="form-group">
		  <label for="posisi">Tipe</label>
		  <select class="form-control" id="sel2" required="" name="tipe">
		    <option>Pilih Tipe</option>
		    <option value="kontrak">Freelance / Kontrak</option>
		    <option value="karyawan">Karyawan / Kerja Tetap</option>
		  </select>
	</div>
	<div class="form-group">
		    <label for="exampleInputFile">Upload Pamflet / Brosur (optional)</label><br><br>
		    <input type="file" id="pamflet">
		    <p class="help-block">nb : ekstensi yang diterima hanya berupa jpg/jpeg/png</p>
	</div>
	<center><button type="submit" class="btn btn-default" name="submit">Submit</button></center><br>
</form>
</div>

<!-- javascript -->
	<?php include '../../view/script.php'; ?>
<!-- javascript -->

</body>
</html>

	<?php
		if(isset($_POST['submit'])){

			$postingan->set_all_property();
			$postingan->insert_data();

			$script->redirect('lowonganbaru.php');
		}
	?>