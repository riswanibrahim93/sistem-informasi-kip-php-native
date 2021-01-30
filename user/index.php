<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kartu Indonesia Pintar</title>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/styles.css">
  <style>
    .redtext {
  color: red;
}
  </style>
</head>

<body>
  <!-- navbar -->
  <nav class="navbar navbar-default navbar-static-top">
    <div class="container" id="navbar">
      <div class="navbar-header">
        <a href="#" class="navbar-brand navbar-link"><img src="assets/img/logo.png"></a>
        <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
      </div>
      <div class="collapse navbar-collapse" id="navcol-1">
        <ul class="nav navbar-nav navbar-right">
          <li role="presentation"><a href="#home">PENILAIAN</a></li>
          <li role="presentation"><a href="#persyaratan">PERSYARATAN</a></li>
          <li role="presentation"><a href="#news">PRIORITAS PENERIMA</a></li>
          <li role="presentation"><a href="#"><i class="glyphicon glyphicon-search"></i></a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- navbar -->

  <!-- jumbotron -->
  <div id="background">
    <div class="jumbotron">
      <ul class="nav navbar-nav"></ul>
      <h1>Kartu Indonesia Pintar</h1>
      <p>Kartu Indonesia Pintar merupakan bentuk pelaksanaan Program Indonesia Pintar yang menjadi program unggulan Presiden Joko Widodo. Kartu ini diresmikan bersamaan dengan Kartu Indonesia Sehat dan Kartu Keluarga Sejahtera pada 3 November 2014</p>
      <!-- <p><a href="#" class="btn btn-default" role="button">EXPLORE</a></p> -->
    </div>
  </div>
  <!-- jumbotron -->

  <!-- container atas -->
  <div id="home">
    <div class="isi">
      <div class="container atas">
        <h1>Penilaian</h1>
        <div class="row">
          <div class="col-sm-2"> </div>
          <div class="col-sm-8">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th style="text-align: center;">Nama Siswa</th>
                <th style="text-align: center;">Kode Pola</th>
                <th style="text-align: center;">Nilai</th>
                <th style="text-align: center;">Keterangan</th>
                <!-- <th>Engine version</th>
                <th>CSS grade</th> -->
              </tr>
              </thead>
               <tbody>
                <?php 
                // include "../function.php";
                include "../aksi/koneksi.php";

                global $con;
                $sql = "SELECT `data_siswa`.`nama_siswa`,`nilai_total`.`id_nilaiTotal`, `nilai_total`.`kode_pola`, `Nilai_Total` FROM `data_siswa`,`nilai_total` WHERE `data_siswa`.`kode_pola` = `nilai_total`.`kode_pola`";
                $a = mysqli_query($con, $sql);
                while($b = mysqli_fetch_array($a))
                {
              ?>
              <tr>
                <td><?php echo $b['nama_siswa'] ?></td>
                <td><?php echo $b['kode_pola'] ?></td>
                <td><?php echo $b['Nilai_Total'] ?></td>
                <td>
                  <?php 
                    if($b['Nilai_Total'] >= 1.25)
                    {
                      echo "Diterima";
                    }
                    else
                    {
                      echo "Gagal";
                    }
                  ?>
                </td>
                <!-- <td>X</td> -->
              </tr>
              </tbody>
              <?php } ?>
          </table>
        </div>
        <div class="col-sm-2"> </div>
      </div>
    </div>
  </div>
  <!-- container atas -->

  <!-- container bawah -->
  <div id="persyaratan">
  <div class="container bawah">
    <h1>Persyaratan Penerima</h1>
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"><img class="img-circle" src="assets/img/ke11.jpg" width="200px">
        <h3>Persyaratan 1</h3>
        <p class="text-center"><strong></strong>Penerima KIP-Kuliah adalah siswa SMA, SMK atau sederajat yang akan lulus pada tahun berjalan atau lulus 2 (dua) tahun sebelumnya.</p>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"><img class="img-circle" src="assets/img/ke12.jpg" width="200px">
        <h3>Persyaratan 2</h3>
        <p class="text-center"><strong></strong>Lulus seleksi penerimaan mahasiswa baru, dan diterima di PTN atau PTS pada Prodi dengan Akreditasi A atau B, serta dimungkinkan dengan pertimbangan tertentu Prodi dengan Akreditasi C.</p>
      </div><div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"><img class="img-circle" src="assets/img/ke13.jpg" width="200px">
        <h3>Persyaratan 3</h3>
        <p class="text-center"><strong></strong>Memiliki potensi akademik baik tetapi memiliki keterbatasan ekonomi yang didukung bukti dokumen yang sah.</p>
      </div>
    </div>
  </div>
  </div>
  <!-- container bawah -->

  <!-- container news -->
  <div id="news">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
          <div class="thumbnail"><img src="assets/img/1.jpg">
          <div class="caption">
            <h3>Penerima Kartu Indonesia Pintar</h3>
            <p class="text-justify">Pemegang Kartu Indonesia Pintar (KIP) akan mendapatkan prioritas mendapatkan KIP-Kuliah dengan persyaratan memiliki potensi akademik baik dengan lolos seleksi penerimaan mahasiswa baru di PT atau Politeknik.</p>
            <!-- <button class="btn btn-default"tyoe="button">READ MORE</button> -->
          </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
          <div class="thumbnail"><img src="assets/img/keluarga.jpg">
          <div class="caption">
            <h3>Keluarga Kurang Mampu</h3>
            <p class="text-justify">Prioritas bagi lulusan Sekolah Menengah Atas (SMA) atau bentuk lain yang sederajat yang memiliki keterbatasan ekonomi namun memiliki potensi akademik baik dengan lolos seleksi penerimaan mahasiswa baru di PT atau Politeknik.</p>
            <!-- <button class="btn btn-default"tyoe="button">READ MORE</button> -->
          </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
          <div class="thumbnail"><img src="assets/img/mahasiswa.jpg">
          <div class="caption">
            <h3>Mahasiswa dengan keterbatasan akses (Afirmasi) termasuk mahasiswa disabilitas </h3>
            <p class="text-justify">Mahasiswa disabilitas (persons with disabilities) mereka yang mengalami kesulitan, hambatan atau ketidakmampuan dalam melakukan aktivitas/fungsi tertentu sehingga mereka membutuhkan alat bantu khusus.</p>
           <!--  <button class="btn btn-default"tyoe="button">READ MORE</button> -->
          </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
          <div class="thumbnail"><img src="assets/img/bencana.jpg">
          <div class="caption">
            <h3>Mahasiswa dengan kondisi khusus karena bencana atau lainnya</h3>
            <p class="text-justify">Mahasiswa yang mengalami kesulitas karena dampat dari bencana alam yang menghambat proses belajar mengajar.</p>
            <!-- <button class="btn btn-default"tyoe="button">READ MORE</button> -->
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- container news -->

  <!-- gallery -->
 <!--  <div id="gallery">
    <div class="container">
      <h1>Gallery</h1>
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" id="satu"><img class="img-responsive" src="assets/img/gambar-3-A.jpg" width="3000px"></div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" id="satu"><img class="img-responsive" src="assets/img/gambar-3-B.jpg" width="300px"></div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" id="satu"><img class="img-responsive" src="assets/img/gambar-3-C.jpg" width="300px"></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" id="dua"><img class="img-responsive" src="assets/img/gambar-3-D.jpg" width="600px"></div>
      </div>
    </div>
  </div> -->
  <!-- gallery -->

  <!-- about -->
 <!--  <div id="about">
    <div class="container footer">
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <h1> <img src="assets/img/logoo.png" width="180px"></h1>
        <h2>About Us</h2>
        <p>Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus...</p>
      </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <h2>Newsletter Subscription</h2>
          <div class="input-group input-group-lg">
            <input type="text" class="form-control" value="Your Email">
            <div class="input-group-btn">
              <button class="btn btn-primary" type="submit">Subscribe </button>
            </div>
          </div>
          <div id="icon"><i class="fa fa-instagram"></i><i class="fa fa-facebook-official"></i><i class="fa fa-twitter-square"></i><i class="fa fa-youtube-play"></i></div>
        </div>
    </div>
  </div> -->
  <!-- about -->

  <!-- kaki -->
  <div id="kaki">
    <div class="container">
      <h5 class="text-center">iCONIC. © 2018</h5>
    </div>
  </div>
  <!-- kaki -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
