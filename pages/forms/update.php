<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Validation Form</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> -->

      <!-- SidebarSearch Form -->
      

      <!-- Sidebar Menu -->
       <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="validation.php">Home</a></li>
              <li class="breadcrumb-item active">Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <div>
      
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Data</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <form action="../../aksi/update_nilai_kriteria.php" method="POST">
                <div class="card-body">
                  <?php 
                    // include "../function.php";
                    include "../../aksi/koneksi.php";

                    $kode = $_GET['kode'];

                    global $con;
                    $sql = "SELECT * FROM `data_siswa` WHERE kode_pola = '$kode'";
                    $a = mysqli_query($con, $sql);
                    $row = mysqli_fetch_array($a);
                    $nama = $row['nama_siswa'];
                  ?>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kode Siswa</label>
                    <input type="kode" name="kode" class="form-control" id="kode" placeholder="A1" value="<?php echo $kode; ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Siswa</label>
                    <input type="nama" name="nama" class="form-control" id="nama" placeholder="Masukkan nama siswa" value="<?php echo $nama; ?>">
                  </div>
                  
                  <div class="form-group">
                  <label>Jumlah Tanggungan Orang tua</label>
                  <select class="form-control select2" name="tanggungan" style="width: 100%;">
                  <?php 
                    // include "../function.php";
                    include "../../aksi/koneksi.php";

                    global $con;
                    $sql = "SELECT * FROM `sub_kriteria` WHERE `id_kriteria` = 1";
                    $a = mysqli_query($con, $sql);
                    $c = array();
                    while($b = mysqli_fetch_array($a))
                    {
                  ?>
                      <option value="<?php echo $b['nm_kriteria'] ?>"><?php echo $b['nm_kriteria'] ?></option>;
                  <?php 
                    }
                  ?>
                  </select>
                  </div>
                 <div class="form-group">
                  <label>Jumlah Penghasilan Orang Tua</label>
                  <select class="form-control select2" name="penghasilan" style="width: 100%;">
                    <?php 
                    // include "../function.php";
                    include "../../aksi/koneksi.php";

                    global $con;
                    $sql = "SELECT * FROM `sub_kriteria` WHERE `id_kriteria` = 2";
                    $a = mysqli_query($con, $sql);
                    $c = array();
                    while($b = mysqli_fetch_array($a))
                    {
                  ?>
                      <option value="<?php echo $b['nm_kriteria'] ?>"><?php echo $b['nm_kriteria'] ?></option>;
                  <?php 
                    }
                  ?>
                  </select>
                </div>
                 <div class="form-group">
                  <label>Pekerjaan Orang Tua</label>
                  <select class="form-control select2" name="pekerjaan" style="width: 100%;">
                    <?php 
                    // include "../function.php";
                    include "../../aksi/koneksi.php";

                    global $con;
                    $sql = "SELECT * FROM `sub_kriteria` WHERE `id_kriteria` = 3";
                    $a = mysqli_query($con, $sql);
                    $c = array();
                    while($b = mysqli_fetch_array($a))
                    {
                  ?>
                      <option value="<?php echo $b['nm_kriteria'] ?>"><?php echo $b['nm_kriteria'] ?></option>;
                  <?php 
                    }
                  ?>
                  </select>
                </div>
                 <div class="form-group">
                  <label>Keadaan Orang Tua</label>
                  <select class="form-control select2" name="keadaan" style="width: 100%;">
                    <?php 
                    // include "../function.php";
                    include "../../aksi/koneksi.php";

                    global $con;
                    $sql = "SELECT * FROM `sub_kriteria` WHERE `id_kriteria` = 4";
                    $a = mysqli_query($con, $sql);
                    $c = array();
                    while($b = mysqli_fetch_array($a))
                    {
                  ?>
                      <option value="<?php echo $b['nm_kriteria'] ?>"><?php echo $b['nm_kriteria'] ?></option>;
                  <?php 
                    }
                  ?>
                  </select>
                </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0-rc
    </div>
    <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="../../plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="../../plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
  $('#quickForm').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      terms: {
        required: true
      },
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
</body>
</html>
