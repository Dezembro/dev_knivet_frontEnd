<?php
 error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
 session_start();
?>
<?php  if(!( isset($_SESSION['logado']) )):    ?>

<?php endif;

if (($_SESSION['logado'])) {

   header("location:resumo.php");
}
//header("location:index.html");
//Warning: Cannot modify header information - headers already sent by (output started at C:\xampp\htdocs\Knivet\resumo.php:86) in C:\xampp\htdocs\Knivet\resumo.php on line 587
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="description" content="">
<meta name="author" content="">

<!-- Bootstrap -->
<link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">

<!-- Stylesheet
    ================================================== -->
<link rel="stylesheet" type="text/css"  href="css/style.css">
 <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
<title>Knivet - Seja mais produtivo</title>
<!-- <link rel="stylesheet" type="text/css" href="css/prettyPhoto.css"> -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800,600,300' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/modernizr.custom.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<div id="preloader">
  <div id="status"> <img src="img/preloader.gif" height="64" width="64" alt=""> </div>
</div>
<!-- Navigation -->
<nav class="navbar-custom navbar-fixed-top" role="navigation" style="background-color: #26292D">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse"> <i class="fa fa-bars"></i> </button>
      <a class="navbar-brand page-scroll" href="#page-top"><img src="img/logo.png" class="img-fluid" alt="Responsive image" style="width: 50%"></a> </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
      <ul class="nav navbar-nav">
        <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
        <li class="hidden"> <a href="#page-top"></a> </li>
        <!-- <li> <a class="page-scroll" href="#about">About</a> </li>
        <li> <a class="page-scroll" href="#services">Services</a> </li>
        <li> <a class="page-scroll" href="#works">Portfolio</a> </li>
        <li> <a class="page-scroll" href="#team">Team</a> </li>
        <li> <a class="page-scroll" href="#testimonials">Testimonials</a> </li>
        <li> <a class="page-scroll" href="#contact">Contact</a> </li> -->

      </ul>
      <ul class="nav pull-right">
        <li class="dropdown">
        <a href="" class="dropdown-toggle" data-toggle="dropdown" style="font-family: Poppins; font-size: 130%; color: white;"><b>Login</b></a>
          <ul id="login-dp" class="dropdown-menu" style="background-color: rgba(0,0,0,0.7)" >  <!-- cor do fundo da area externa do quadro de login -->
            <li style="align:right;padding:15px;width:300px">
               <div class="row">
                  <div class="col-md-12">
                     <form class="form" role="form" method="post" action="login.php" accept-charset="UTF-8" >
                        <div class="form-group">
                           <label class="sr-only" style="color: white;" >Email</label>
                           <input style="color: color: background-color: rgba(50,50,50,0.2);" type="email" class="form-control" name="email" id="email" placeholder="Email" required> <!-- cor inserida == fundo da caixa de texto> -->
                        </div>
                        <div class="form-group">
                           <label class="sr-only" >Senha</label>
                           <input type="password" style="color: background-color: rgba(50,50,50,0.2);" class="form-control" name="senha" id="senha" placeholder="Senha" required><!-- cor inserida == fundo da caixa de texto> -->
                        </div>
                        <br>

                        <div class="form-group">
                      <!--     <button type="submit" style="background-color: rgba(88,155,152,0.9)" class="btn btn-primary btn-block">Entrar</button>-->
                        <input class="btn btn-primary btn-block" type="submit" style="background-color: rgba(88,155,152,0.9)" class="btn btn-primary btn-block" value="Entrar"> <!-- fundo button -->

                        </div>
                        <div class="help-block text-lefet"><a href="" style="color: white;">Esqueci a senha</a></div>
                        <div class="help-block text-left"><a href="cadastro.html" style="color: white;">Ainda não é cadastrado?</a></div>

                     </form>
                  </div>

               </div>
            </li>
          </ul>
        </li>
        </ul>
    </div>


    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container -->
</nav>



<!-- Header -->
<div id="intro">
  <div class="intro-body">
    <div class="container">
      <div class="row">
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <div class="col-md-10 col-md-offset-1">

          <img src="img/logo_grande.png" class="img-fluid" alt="Responsive image" style="width: 50%">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <br><br>
          <p style="font-size: 35px" class="intro-text">Integre suas ferramentas e seja mais produtivo!
          <br>
          <a href="#about" style="background-color: #D93A49;" class="btn btn-default page-scroll">Cadastre-se e experimente grátis</a>
          </p>

        </div>
      </div>
    </div>
  </div>
</div>


<!-- Contact Section -->
<!-- <div id="contact" class="text-center">
  <div class="container">
    <div class="section-title center">
      <h1>Alguma dúvida? Entre em contato com a Knivet!</h1>
      <hr>
      <p>Nos envie um email, <br> Queremos seu feedback para melhorar sempre!</p>
    </div>
      <div class="col-md-12">
        <div class="contact-item"> <i class="fa fa-envelope-o fa-2x"></i>
          <p>dev@knivet.com.br</p>
        </div>
      </div>
    </div>
    <!-- <div class="col-md-12">
      <div class="social">
        <h3>Follow us</h3>
        <ul>
          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
          <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
          <li><a href="#"><i class="fa fa-github"></i></a></li>
          <li><a href="#"><i class="fa fa-instagram"></i></a></li>
          <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
        </ul>
      </div>
    </div> -->
  </div>
</div>
<div id="footer" style="background-color: #26292D">
  <div class="container">
    <div class="social-wrapper">
        <div class="col-md-6">
            <div class="social-icon">
                <a href="https://www.facebook.com/knivet"><i class="fa fa-facebook"></i></a>
               <!-- <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-google-plus"></i></a> -->
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="https://www.linkedin.com/company/11387076/?lipi=urn%3Ali%3Apage%3Ad_flagship3_search_srp_companies%3BZdsOoJxsSASIjRqvFXYF3A%3D%3D&licu=urn%3Ali%3Acontrol%3Ad_flagship3_search_srp_companies-search_srp_result&lici=25l7KfooSrWms92wHFg7xQ%3D%3D"><i class="fa fa-linkedin"></i></a>
              <!-- <a href="instagram.com/knivet"><i class="fa fa-instagram"></i></a> -->
            </div>
        </div>
          <div class="social-contact">
                <a href="#"><i class="fa fa-phone"></i>+55 21 99410-7858</a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="#"><i class="fa fa-envelope"></i>contato@knivet.com.br</a>
            </div>
        </div>
  </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script type="text/javascript" src="js/jquery.1.11.1.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/SmoothScroll.js"></script>
<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="js/jquery.isotope.js"></script>
<script type="text/javascript" src="js/jquery.parallax.js"></script>
<!-- <script type="text/javascript" src="js/jqBootstrapValidation.js"></script> -->
<!-- <script type="text/javascript" src="js/contact_me.js"></script> -->

<!-- Javascripts
    ================================================== -->
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>
