<?php require_once('../config.php') ?>
<!DOCTYPE html>
<html style="height: auto;">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Halaman Registrasi</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="../_assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../_assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../_assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../_assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../_assets/plugins/iCheck/square/blue.css">


  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script nonce="1f35f4a0-53ab-4a71-a9f2-a2bc016a7746">try { (function(w,d){!function(o,p,q,r){o[q]=o[q]||{};o[q].executed=[];o.zaraz={deferred:[],listeners:[]};o.zaraz.q=[];o.zaraz._f=function(s){return async function(){var t=Array.prototype.slice.call(arguments);o.zaraz.q.push({m:s,a:t})}};for(const u of["track","set","debug"])o.zaraz[u]=o.zaraz._f(u);o.zaraz.init=()=>{var v=p.getElementsByTagName(r)[0],w=p.createElement(r),x=p.getElementsByTagName("title")[0];x&&(o[q].t=p.getElementsByTagName("title")[0].text);o[q].x=Math.random();o[q].w=o.screen.width;o[q].h=o.screen.height;o[q].j=o.innerHeight;o[q].e=o.innerWidth;o[q].l=o.location.href;o[q].r=p.referrer;o[q].k=o.screen.colorDepth;o[q].n=p.characterSet;o[q].o=(new Date).getTimezoneOffset();if(o.dataLayer)for(const B of Object.entries(Object.entries(dataLayer).reduce(((C,D)=>({...C[1],...D[1]})),{})))zaraz.set(B[0],B[1],{scope:"page"});o[q].q=[];for(;o.zaraz.q.length;){const E=o.zaraz.q.shift();o[q].q.push(E)}w.defer=!0;for(const F of[localStorage,sessionStorage])Object.keys(F||{}).filter((H=>H.startsWith("_zaraz_"))).forEach((G=>{try{o[q]["z_"+G.slice(7)]=JSON.parse(F.getItem(G))}catch{o[q]["z_"+G.slice(7)]=F.getItem(G)}}));w.referrerPolicy="origin";w.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(o[q])));v.parentNode.insertBefore(w,v)};["complete","interactive"].includes(p.readyState)?zaraz.init():o.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document) } catch (err) {
    console.error('Failed to run Cloudflare Zaraz: ', err)
    fetch('/cdn-cgi/zaraz/t', {
      credentials: 'include',
      keepalive: true,
      method: 'GET',
    })
  };</script>
</head>
<body class="hold-transition register-page">

  <style>
    body{
      background-image: url("../uploads/cover.png")!important;
      background-size:cover !important;
      background-repeat:no-repeat !important;
      backdrop-filter: contrast(1) !important;
    }
    #page-title{
      text-shadow: 6px 4px 7px black;
      font-size: 3.5em;
      color: #fff4f4 !important;
      background: #8080801c;
      padding: 50px auto !important;
    }
  </style>

  <br><br>
  <h1 class="text-center text-white mt-4 px-4 py-4" id="page-title"><b>Coffe Shop Cashiering System</b></h1>
  <div class="register-box">
    <div class="register-logo">
      
    </div>
    <div class="register-box-body">
      <p class="login-box-msg">Register a new membership</p>
      <form action="" method="post">
        <div class="form-group has-feedback">
          <input type="text" name="firstname" class="form-control" placeholder="First Name" required>
        </div>
        <div class="form-group has-feedback">
          <input type="text" name="lastname" class="form-control" placeholder="Last Name" required>
        </div>
        <div class="form-group has-feedback">
          <input type="text" name="username" class="form-control" placeholder="Username" required>
        </div>

        <div class="form-group has-feedback">
          <input type="password" name="password1" class="form-control" placeholder="Password" required>
        </div>

        <div class="form-group has-feedback">
          <input type="password" name="password2" class="form-control" placeholder="Ulangi password" required>
        </div>

        <div class="row">
          <div class="col-xs-8">
          </div>

          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat" name="register">Register</button>
          </div>

        </div>
      </form>
      <div class="social-auth-links">
        <a href="login.php" class="text-center">Sudah punya akun, Silahkan login</a>
      </div>

    </div>
  </div>


  <?php 
  if(isset($_POST['register'])){
    // print_r($_POST);
    // die;
    $firstname = trim(mysqli_real_escape_string($conn, $_POST['firstname']));
    $lastname = trim(mysqli_real_escape_string($conn, $_POST['lastname']));
    $username = trim(mysqli_real_escape_string($conn, $_POST['username']));
    $password1 = md5($_POST['password1']);
    $password2 = md5($_POST['password2']);
    
    $type = 3;

    // Jika username sudah digunakan
    $sql_cek_identitas = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'") or die(mysqli_error($con));
    if(mysqli_num_rows($sql_cek_identitas) > 0){
      echo "<script>alert('Username sudah digunakan!');window.location='registrasi.php';</script>";
    }
    else if($password1 != $password2){
      echo "<script>alert('Password tidak cocok!');window.location='registrasi.php';</script>";
    }
    else{
      mysqli_query($conn, "INSERT INTO users(firstname, lastname, username, password, type) VALUES('$firstname', '$lastname', '$username', '$password1', '$type')") or die(mysqli_error($con));
		  echo "<script>alert('Registrasi berhasil, Silahkan login!');window.location='login.php';</script>";
    }
  }
  
  
  ?>


  <!-- jQuery 3 -->
  <script src="../_assets/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="../_assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="../_assets/plugins/iCheck/icheck.min.js"></script>
  <script>
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
      });
    });
  </script>
</body>
</html>
