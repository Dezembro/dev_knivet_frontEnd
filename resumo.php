<?php
 error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
 session_start();
?>
<?php  if(isset($_SESSION['logado'])):    ?>

<?php endif;

if (!($_SESSION['logado'])) {

   header("location:index.html");
}
//header("location:index.html");
//Warning: Cannot modify header information - headers already sent by (output started at C:\xampp\htdocs\Knivet\resumo.php:86) in C:\xampp\htdocs\Knivet\resumo.php on line 587
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon.pzng" />
    <link rel="icon" type="image/png" href="img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
     <title>Knivet - Seja mais produtivo</title>
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="blue" data-image="img/sidebar-1.jpg" style="background-color: rgb(25,25,25);">

            <div class="logo" style="background-color: rgb(25,25,25);">
            <a href="index.html"><img src="img/logo.png"></a>
            </div>
            <div class="sidebar-wrapper" style="background-color: rgb(25,25,25);">
                <ul class="nav">
                    <li class="active">
                        <a href="resumo.php">
                            <i class="material-icons">dashboard</i>
                            <p>Resumo</p>
                        </a>
                    </li>
                    <li>
                        <a href="disponiveis.php">
                            <i class="material-icons">library_books</i>
                            <p style="color: white;">Automatizações</p>
                        </a>
                    </li>
                    <!-- <li>
                        <a href="#">
                            <i class="material-icons">content_copy</i>
                            <p style="color: white;">Integraçõs Selecionadas</p>
                        </a>
                    </li> -->
                    <li>
                        <a href="#">
                            <i class="material-icons">account_circle</i>
                            <p style="color: white;">Configurações da conta</p>
                        </a>
                    </li>
                    <li class="active-pro">
                        <a href="sair.php">

                            <i class="material-icons">remove_circle</i>
                            <p style="color: white;">Sair</p>

                        </a>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand"> Bem vindo <?php echo( $_SESSION['nome']);  ?>, <br>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;acompanhe nesta tela o resumo de sua produtividade com a Knivet: </a>
                    </div>
                    <div class="collapse navbar-collapse">

                    </div>
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="blue">
                                    <i class="material-icons">content_copy</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Automatizações ativas</p>
                                    <h3 class="title"><!--3/6-->

                                        <?php

                                            // $_SESSION['dia'] = jddayofweek ( cal_to_jd(CAL_GREGORIAN, date("m"),date("d"), date("Y")) , 1 );

                                            date_default_timezone_set('America/Sao_Paulo');
                                            $dia = date("l");
                                            $diaN = date("d");
                                            $mes = date("m");

                                            $conn = new  mysqli("mysql762.umbler.com:41890","knivet","knivet2017","knivet");
                                            if ($conn->connect_erro){
                                                die($conn->connect_erro);
                                                echo "Erro ao conectar";
                                            }
                                            $aux = $_SESSION['email'];
                                            $result =  $conn->query("SELECT * FROM usuario WHERE email = '$aux' ");



                                            $cont = mysqli_num_rows($result);
                                            if ($cont <=0) {
                                                 echo ("erro");
                                            }else{
                                                // echo "conectado";
                                                if ($cont == 1) {
                                                    while ($row=$result->fetch_assoc()) {
                                                        $aut_feitas = $row['num_automatizacoes_total'];
                                                        $horas_salvas = $row['minutos_salvos_total'];
                                                        $id_usuario = $row['id'];
                                                      echo ( $row['automacoes_ativas']/*."/".$row['automacoes_max']*/);
                                                    }
                                                }
                                            }

                                            $result2 =  $conn->query("SELECT * FROM chamadas_feitas_temp WHERE id_usuario = '$id_usuario' ");



                                            $cont = mysqli_num_rows($result2);
                                            if ($cont <=0) {
                                                 // echo ("Sem automações ativas");
                                            }else{
                                                // echo "conectado";
                                                if ($cont == 1) {
                                                    while ($row=$result2->fetch_assoc()) {
                                                        $vl1 = $row['vl1'];
                                                        $vl2 = $row['vl2'];
                                                        $vl3 = $row['vl3'];
                                                        $vl4 = $row['vl4'];
                                                        $vl5 = $row['vl5'];
                                                        $vl6 = $row['vl6'];
                                                        $vl7 = $row['vl7'];
                                                    }
                                                }
                                            }

                                            $result3 =  $conn->query("SELECT * FROM horas_salvas_temp WHERE id_usuario = '$id_usuario' ");



                                            $cont = mysqli_num_rows($result3);
                                            if ($cont <=0) {
                                                 // echo ("Sem automações ativas");
                                            }else{
                                                // echo "conectado";
                                                if ($cont == 1) {
                                                    while ($row=$result3->fetch_assoc()) {
                                                        $vl1T = $row['vl1'];
                                                        $vl2T = $row['vl2'];
                                                        $vl3T = $row['vl3'];
                                                        $vl4T = $row['vl4'];
                                                        $vl5T = $row['vl5'];
                                                        $vl6T = $row['vl6'];
                                                        $vl7T = $row['vl7'];
                                                    }
                                                }
                                            }

                                            $result4 =  $conn->query("SELECT * FROM automacoes_ativas WHERE id_usuario = '18' ");



                                            $cont = mysqli_num_rows($result4);
                                            $id_automacoes = array();
                                            if ($cont <=0)
                                            {
                                            }
                                            else
                                            {

                                                while ($row=$result4->fetch_assoc())
                                                {
                                                        $id_automacoes[] = $row['id_automacao'];
                                                }
                                            }
                                            $_SESSION['id_automacao'] = $id_automacoes;


                                            $result5 =  $conn->query("SELECT * FROM escavador_usuario WHERE id_usuario = '$id_usuario' ");
                                            $cont = mysqli_num_rows($result5);
                                            if ($cont <=0) {
                                                 // echo ("Sem automações ativas");
                                            }else{
                                                // echo "conectado";
                                                if ($cont == 1) {
                                                    while ($row=$result5->fetch_assoc()) {
                                                        $totalEscavador = $row['chamadas_total'];
                                                        $minutosEscavador = $row['minutos_salvos'];

                                                    }
                                                }
                                            }

                                            $result6 =  $conn->query("SELECT * FROM digesto_usuario WHERE id_usuario = '$id_usuario' ");
                                            $cont = mysqli_num_rows($result6);
                                            if ($cont <=0) {
                                                 // echo ("Sem automações ativas");
                                            }else{
                                                // echo "conectado";
                                                if ($cont == 1) {
                                                    while ($row=$result6->fetch_assoc()) {
                                                        $totalDigesto = $row['chamadas_total'];
                                                        $minutosDigesto = $row['minutos_salvos'];
                                                    }
                                                }
                                            }

                                        ?>
                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">info</i> Número de automações habilitadas
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="blue">
                                    <i class="material-icons">autorenew</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Eventos realizados</p>
                                    <h3 class="title">

                                        <?php
                                            echo($aut_feitas);
                                         ?>

                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">date_range</i> Desde a seua primeira automação
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="blue">
                                    <i class="material-icons">hourglass_empty</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Tempo Economizado</p>
                                    <h3 class="title">

                                        <?php
                                            echo($horas_salvas);
                                         ?>

                                        <small>minutos</small>
                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">help</i> Minutos totais economizados com as automatizações
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="card">
                                <div class="card-header card-chart" data-background-color="black">
                                    <div class="ct-chart" id="dailySalesChart"></div>
                                </div>
                                <div class="card-content">
                                    <h4 class="title">Total de eventos feitos</h4>
                                    <p class="category">
                                        <!-- <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.</p> -->
                                        <p class="category">Evolução diária</p>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <!-- <i class="material-icons">access_time</i> atualizado há 5 min -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 ">
                            <div class="card">
                                <div class="card-header card-chart" data-background-color="black">
                                    <div class="ct-chart" id="completedTasksChart"></div>
                                </div>
                                <div class="card-content">
                                    <h4 class="title">Tempo economizado</h4>
                                    <p class="category">Evolução diária</p>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <!-- <i class="material-icons">access_time</i> atualizado há 10 min -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-lg-4 col-md-12 ">
                            <div class="card">
                                <div class="card-header card-chart" data-background-color="black">
                                    <div class="ct-chart" id="emailsSubscriptionChart"></div>
                                </div>
                                <div class="card-content">
                                    <h4 class="title">Erros nas Automatizações</h4>
                                    <p class="category">Erro ao receber as informações ou ao automatizar</p>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">access_time</i> atualizado há 5 horas
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="blue">
                                    <h4 class="title">Automatizações Ativas</h4>
                                    <p class="category">Todas as automatizações ativas e seus status</p>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table table-hover">
                                        <thead style="color: black">
                                            <th>Entrada de dados</th>
                                            <th>Saída de dados</th>
                                            <th>Eventos Feitos</th>
                                            <th>Minutos salvos</th>
                                        </thead>
                                        <tbody style="color: grey" id="tabelaAut">



                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/material.min.js" type="text/javascript"></script>
<!--  Charts Plugin -->
<script src="js/chartist.min.js"></script>
<!--  Dynamic Elements plugin -->
<script src="js/arrive.min.js"></script>
<!--  PerfectScrollbar Library -->
<script src="js/perfect-scrollbar.jquery.min.js"></script>
<!--  Notifications Plugin    -->
<script src="js/bootstrap-notify.js"></script>
<!--  Google Maps Plugin    -->
<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->
<!-- Material Dashboard javascript methods -->
<script src="js/material-dashboard.js?v=1.2.0"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<!-- <script src="js/demo.js"></script> -->
<script type="text/javascript">
    $(document).ready(function() {

        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();
        tabela();

    });
</script>

<script>
type = ['', 'info', 'success', 'warning', 'danger'];


demo = {
    initPickColor: function() {
        $('.pick-class-label').click(function() {
            var new_class = $(this).attr('new-class');
            var old_class = $('#display-buttons').attr('data-class');
            var display_div = $('#display-buttons');
            if (display_div.length) {
                var display_buttons = display_div.find('.btn');
                display_buttons.removeClass(old_class);
                display_buttons.addClass(new_class);
                display_div.attr('data-class', new_class);
            }
        });
    },

    initDocumentationCharts: function() {
        /* ----------==========     Daily Sales Chart initialization For Documentation    ==========---------- */

        dataDailySalesChart = {
            labels: ['Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab', 'Dom'],
            series: [
                [13, 17, 7, 17, 23, 18, 38]
            ]
        };

        optionsDailySalesChart = {
            lineSmooth: Chartist.Interpolation.cardinal({
                tension: 0
            }),
            low: 0,
            high: 50, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
            chartPadding: {
                top: 0,
                right: 0,
                bottom: 0,
                left: 0
            },
        }

        var dailySalesChart = new Chartist.Line('#dailySalesChart', dataDailySalesChart, optionsDailySalesChart);

        md.startAnimationForLineChart(dailySalesChart);
    },

    initDashboardPageCharts: function() {

        /* ----------==========     TOTAL EVENTOS    ==========---------- */

        var dia = '<?php echo $dia?>';
        var diaN = '<?php echo $diaN?>';
        var mes = '<?php echo $mes?>';

        var seg = "";
        var ter = "";
        var qua = "";
        var qui = "";
        var sex = "";
        var sab = "";
        var dom = "";

        var mes1 = mes;
        var mes2 = mes;
        var mes3 = mes;
        var mes4 = mes;
        var mes5 = mes;
        var mes6 = mes;
        var mes7 = mes;

        var dia1 = diaN;
        var dia2 =  diaN -1;
        if(dia2<=0)
        {
          mes2 = mes2-1;
          if(mes2==0)
          {
            mes2=12;
          }
          if(mes2 == 2)
          {
            dia2 = 27+dia2;
          }
          else
          {
            if(mes%2 == 1)
            {
              dia2 = 31+dia2;
            }
            else
            {
              dia2 = 30+dia2;
            }
          }
        }
        var dia3 = diaN-2;
        if(dia3<=0)
        {
          mes3 = mes3-1;
          if(mes3==0)
          {
            mes3=12;
          }
          if(mes3 == 2)
          {
            dia3 = 27+dia3;
          }
          else
          {
            if(mes%2 == 1)
            {
              dia3 = 31+dia3;
            }
            else
            {
              dia3 = 30+dia3;
            }
          }
        }
        var dia4 = diaN-3;
        if(dia4<=0)
        {
          mes4 = mes4-1;
          if(mes4==0)
          {
            mes4=12;
          }
          if(mes4 == 2)
          {
            dia4 = 27+dia4;
          }
          else
          {
            if(mes%2 == 1)
            {
              dia4 = 31+dia4;
            }
            else
            {
              dia4 = 30+dia4;
            }
          }
        }
        var dia5 = diaN-4;
        if(mes5==0)
        {
          mes5=12;
        }
        if(dia5<=0)
        {
          mes5 = mes5-1;
          if(mes5 == 2)
          {
            dia5 = 27+dia5;
          }
          else
          {
            if(mes%2 == 1)
            {
              dia5 = 31+dia5;
            }
            else
            {
              dia5 = +-dia5;
            }
          }
        }
        var dia6 = diaN-5;
        if(dia6<=0)
        {
          mes6 = mes6-1;
          if(mes6==0)
          {
            mes6=12;
          }
          if(mes6 == 2)
          {
            dia6 = 27+dia6;
          }
          else
          {
            if(mes%2 == 1)
            {
              dia6 = 31+dia6;
            }
            else
            {
              dia6 = 30+dia6;
            }
          }
        }
        var dia7 = diaN-6;
        if(dia7<=0)
        {
          mes7 = mes7-1;
          if(mes7==0)
          {
            mes7=12;
          }
          if(mes7 == 2)
          {
            dia7 = 27+dia7;
          }
          else
          {
            if(mes%2 == 1)
            {

              dia7 = 31+dia7;
            }
            else
            {
              dia7 = 30+dia7;
            }
          }
        }



        console.log(dia);

        if(dia == "Monday")
        {
          seg = "Ter ("+dia7+"/"+mes7+")";
          ter = "Qua ("+dia6+"/"+mes6+")";
          qua = "Qui ("+dia5+"/"+mes5+")";
          qui = "Sex ("+dia4+"/"+mes4+")";
          sex = "Sab ("+dia3+"/"+mes3+")";
          sab = "Dom ("+dia2+"/"+mes2+")";
          dom = "Seg ("+dia1+"/"+mes1+")";
        }
        if(dia == "Tuesday")
        {
          seg = "Qua ("+dia1+"/"+mes1+")";
          ter = "Qui ("+dia7+"/"+mes7+")";
          qua = "Sex ("+dia6+"/"+mes6+")";
          qui = "Sab ("+dia5+"/"+mes5+")";
          sex = "Dom ("+dia4+"/"+mes4+")";
          sab = "Seg ("+dia3+"/"+mes3+")";
          dom = "Ter ("+dia2+"/"+mes2+")";
        }
        if(dia == "Wednesday")
        {
          seg = "Qui ("+dia2+"/"+mes2+")";
          ter = "Sex ("+dia1+"/"+mes1+")";
          qua = "Sab ("+dia7+"/"+mes7+")";
          qui = "Dom ("+dia6+"/"+mes6+")";
          sex = "Seg ("+dia5+"/"+mes5+")";
          sab = "Ter ("+dia4+"/"+mes4+")";
          dom = "Qua ("+dia3+"/"+mes3+")";
        }
        if(dia == "Thursday")
        {
          seg = "Sex ("+dia3+"/"+mes3+")";
          ter = "Sab ("+dia2+"/"+mes2+")";
          qua = "Dom ("+dia1+"/"+mes1+")";
          qui = "Seg ("+dia7+"/"+mes7+")";
          sex = "Ter ("+dia6+"/"+mes6+")";
          sab = "Qua ("+dia5+"/"+mes5+")";
          dom = "Qui ("+dia4+"/"+mes4+")";
        }
        if(dia == "Friday")
        {
          seg = "Sab ("+dia4+"/"+mes4+")";
          ter = "Dom ("+dia3+"/"+mes3+")";
          qua = "Seg ("+dia2+"/"+mes2+")";
          qui = "Ter ("+dia1+"/"+mes1+")";
          sex = "Qua ("+dia7+"/"+mes7+")";
          sab = "Qui ("+dia6+"/"+mes6+")";
          dom = "Sex ("+dia5+"/"+mes5+")";
        }
        if(dia == "Saturday")
        {
          seg = "Dom ("+dia5+"/"+mes5+")";
          ter = "Seg ("+dia4+"/"+mes4+")";
          qua = "Ter ("+dia3+"/"+mes3+")";
          qui = "Qua ("+dia2+"/"+mes2+")";
          sex = "Qui ("+dia1+"/"+mes1+")";
          sab = "Sex ("+dia7+"/"+mes7+")";
          dom = "Sab ("+dia6+"/"+mes6+")";
        }
        if(dia == "Sunday")
        {
          seg = "Seg ("+dia1+"/"+mes6+")";
          ter = "Ter ("+dia2+"/"+mes5+")";
          qua = "Qua ("+dia3+"/"+mes4+")";
          qui = "Qui ("+dia4+"/"+mes3+")";
          sex = "Sex ("+dia5+"/"+mes2+")";
          sab = "Sab ("+dia6+"/"+mes1+")";
          dom = "Dom ("+dia7+"/"+mes7+")";
        }

        var vl1 = '<?php echo $vl1?>';
        var vl2 = '<?php echo $vl2?>';
        var vl3 = '<?php echo $vl3?>';
        var vl4 = '<?php echo $vl4?>';
        var vl5 = '<?php echo $vl5?>';
        var vl6 = '<?php echo $vl6?>';
        var vl7 = '<?php echo $vl7?>';

        console.log("VL1 = "+vl1);

        var result = Math.max(vl1,vl2,vl3,vl4,vl5,vl6,vl7);
        if(result == 0)
        {
          result = 1;
        }
        else {
          result = result * 1.25;
        }

        dataDailySalesChart = {
            labels: [seg, ter, qua, qui, sex, sab, dom],
            series: [
                [vl1, vl2, vl3, vl4, vl5, vl6, vl7]
            ]
        };

        optionsDailySalesChart = {
            lineSmooth: Chartist.Interpolation.cardinal({
                tension: 0
            }),
            low: 0,
            high: result, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
            chartPadding: {
                top: 0,
                right: 0,
                bottom: 0,
                left: 0
            },
        }

        var dailySalesChart = new Chartist.Line('#dailySalesChart', dataDailySalesChart, optionsDailySalesChart);

        md.startAnimationForLineChart(dailySalesChart);



        /* ----------==========     HORAS SALVAS    ==========---------- */

        var dia = '<?php echo $dia?>';
        var diaN = '<?php echo $diaN?>';
        var mes = '<?php echo $mes?>';

        var seg = "";
        var ter = "";
        var qua = "";
        var qui = "";
        var sex = "";
        var sab = "";
        var dom = "";

        var mes1 = mes;
        var mes2 = mes;
        var mes3 = mes;
        var mes4 = mes;
        var mes5 = mes;
        var mes6 = mes;
        var mes7 = mes;

        var dia1 = diaN;
        var dia2 =  diaN -1;
        if(dia2<=0)
        {
          mes2 = mes2-1;
          if(mes2==0)
          {
            mes2=12;
          }
          if(mes2 == 2)
          {
            dia2 = 27+dia2;
          }
          else
          {
            if(mes%2 == 1)
            {
              dia2 = 31+dia2;
            }
            else
            {
              dia2 = 30+dia2;
            }
          }
        }
        var dia3 = diaN-2;
        if(dia3<=0)
        {
          mes3 = mes3-1;
          if(mes3==0)
          {
            mes3=12;
          }
          if(mes3 == 2)
          {
            dia3 = 27+dia3;
          }
          else
          {
            if(mes%2 == 1)
            {
              dia3 = 31+dia3;
            }
            else
            {
              dia3 = 30+dia3;
            }
          }
        }
        var dia4 = diaN-3;
        if(dia4<=0)
        {
          mes4 = mes4-1;
          if(mes4==0)
          {
            mes4=12;
          }
          if(mes4 == 2)
          {
            dia4 = 27+dia4;
          }
          else
          {
            if(mes%2 == 1)
            {
              dia4 = 31+dia4;
            }
            else
            {
              dia4 = 30+dia4;
            }
          }
        }
        var dia5 = diaN-4;
        if(mes5==0)
        {
          mes5=12;
        }
        if(dia5<=0)
        {
          mes5 = mes5-1;
          if(mes5 == 2)
          {
            dia5 = 27+dia5;
          }
          else
          {
            if(mes%2 == 1)
            {
              dia5 = 31+dia5;
            }
            else
            {
              dia5 = +-dia5;
            }
          }
        }
        var dia6 = diaN-5;
        if(dia6<=0)
        {
          mes6 = mes6-1;
          if(mes6==0)
          {
            mes6=12;
          }
          if(mes6 == 2)
          {
            dia6 = 27+dia6;
          }
          else
          {
            if(mes%2 == 1)
            {
              dia6 = 31+dia6;
            }
            else
            {
              dia6 = 30+dia6;
            }
          }
        }
        var dia7 = diaN-6;
        if(dia7<=0)
        {
          mes7 = mes7-1;
          if(mes7==0)
          {
            mes7=12;
          }
          if(mes7 == 2)
          {
            dia7 = 27+dia7;
          }
          else
          {
            if(mes%2 == 1)
            {

              dia7 = 31+dia7;
            }
            else
            {
              dia7 = 30+dia7;
            }
          }
        }



        console.log(dia);

        if(dia == "Monday")
        {
          seg = "Ter ("+dia7+"/"+mes7+")";
          ter = "Qua ("+dia6+"/"+mes6+")";
          qua = "Qui ("+dia5+"/"+mes5+")";
          qui = "Sex ("+dia4+"/"+mes4+")";
          sex = "Sab ("+dia3+"/"+mes3+")";
          sab = "Dom ("+dia2+"/"+mes2+")";
          dom = "Seg ("+dia1+"/"+mes1+")";
        }
        if(dia == "Tuesday")
        {
          seg = "Qua ("+dia1+"/"+mes1+")";
          ter = "Qui ("+dia7+"/"+mes7+")";
          qua = "Sex ("+dia6+"/"+mes6+")";
          qui = "Sab ("+dia5+"/"+mes5+")";
          sex = "Dom ("+dia4+"/"+mes4+")";
          sab = "Seg ("+dia3+"/"+mes3+")";
          dom = "Ter ("+dia2+"/"+mes2+")";
        }
        if(dia == "Wednesday")
        {
          seg = "Qui ("+dia2+"/"+mes2+")";
          ter = "Sex ("+dia1+"/"+mes1+")";
          qua = "Sab ("+dia7+"/"+mes7+")";
          qui = "Dom ("+dia6+"/"+mes6+")";
          sex = "Seg ("+dia5+"/"+mes5+")";
          sab = "Ter ("+dia4+"/"+mes4+")";
          dom = "Qua ("+dia3+"/"+mes3+")";
        }
        if(dia == "Thursday")
        {
          seg = "Sex ("+dia3+"/"+mes3+")";
          ter = "Sab ("+dia2+"/"+mes2+")";
          qua = "Dom ("+dia1+"/"+mes1+")";
          qui = "Seg ("+dia7+"/"+mes7+")";
          sex = "Ter ("+dia6+"/"+mes6+")";
          sab = "Qua ("+dia5+"/"+mes5+")";
          dom = "Qui ("+dia4+"/"+mes4+")";
        }
        if(dia == "Friday")
        {
          seg = "Sab ("+dia4+"/"+mes4+")";
          ter = "Dom ("+dia3+"/"+mes3+")";
          qua = "Seg ("+dia2+"/"+mes2+")";
          qui = "Ter ("+dia1+"/"+mes1+")";
          sex = "Qua ("+dia7+"/"+mes7+")";
          sab = "Qui ("+dia6+"/"+mes6+")";
          dom = "Sex ("+dia5+"/"+mes5+")";
        }
        if(dia == "Saturday")
        {
          seg = "Dom ("+dia5+"/"+mes5+")";
          ter = "Seg ("+dia4+"/"+mes4+")";
          qua = "Ter ("+dia3+"/"+mes3+")";
          qui = "Qua ("+dia2+"/"+mes2+")";
          sex = "Qui ("+dia1+"/"+mes1+")";
          sab = "Sex ("+dia7+"/"+mes7+")";
          dom = "Sab ("+dia6+"/"+mes6+")";
        }
        if(dia == "Sunday")
        {
          seg = "Seg ("+dia1+"/"+mes6+")";
          ter = "Ter ("+dia2+"/"+mes5+")";
          qua = "Qua ("+dia3+"/"+mes4+")";
          qui = "Qui ("+dia4+"/"+mes3+")";
          sex = "Sex ("+dia5+"/"+mes2+")";
          sab = "Sab ("+dia6+"/"+mes1+")";
          dom = "Dom ("+dia7+"/"+mes7+")";
        }

        var vl1 = '<?php echo $vl1T?>';
        var vl2 = '<?php echo $vl2T?>';
        var vl3 = '<?php echo $vl3T?>';
        var vl4 = '<?php echo $vl4T?>';
        var vl5 = '<?php echo $vl5T?>';
        var vl6 = '<?php echo $vl6T?>';
        var vl7 = '<?php echo $vl7T?>';

        var result = Math.max(vl1,vl2,vl3,vl4,vl5,vl6,vl7);
        if(result == 0)
        {
          result = 1;
        }
        else {
          result = result * 1.25;
        }

        dataCompletedTasksChart = {
          labels: [seg, ter, qua, qui, sex, sab, dom],
          series: [
              [vl1, vl2, vl3, vl4, vl5, vl6, vl7]
          ]
        };

        optionsCompletedTasksChart = {
            lineSmooth: Chartist.Interpolation.cardinal({
                tension: 0
            }),
            low: 0,
            high: result, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
            chartPadding: {
                top: 0,
                right: 0,
                bottom: 0,
                left: 0
            }
        }

        var completedTasksChart = new Chartist.Line('#completedTasksChart', dataCompletedTasksChart, optionsCompletedTasksChart);

        // start animation for the Completed Tasks Chart - Line Chart
        md.startAnimationForLineChart(completedTasksChart);


        /* ----------==========     ERROS    ==========---------- */

        var dataEmailsSubscriptionChart = {
            labels: ['Escavador/Trello', 'Digesto/Trello'],
            series: [
                [0, 1]

            ]
        };
        var optionsEmailsSubscriptionChart = {
            axisX: {
                showGrid: false
            },
            low: 0,
            high: 2,
            chartPadding: {
                top: 0,
                right: 5,
                bottom: 0,
                left: 0
            }
        };
        var responsiveOptions = [
            ['screen and (max-width: 640px)', {
                seriesBarDistance: 5,
                axisX: {
                    labelInterpolationFnc: function(value) {
                        return value[0];
                    }
                }
            }]
        ];
        var emailsSubscriptionChart = Chartist.Bar('#emailsSubscriptionChart', dataEmailsSubscriptionChart, optionsEmailsSubscriptionChart, responsiveOptions);

        //start animation for the Emails Subscription Chart
        md.startAnimationForBarChart(emailsSubscriptionChart);

    },

    // initGoogleMaps: function() {
    //     var myLatlng = new google.maps.LatLng(40.748817, -73.985428);
    //     var mapOptions = {
    //         zoom: 13,
    //         center: myLatlng,
    //         scrollwheel: false, //we disable de scroll over the map, it is a really annoing when you scroll through page
    //         styles: [{
    //             "featureType": "water",
    //             "stylers": [{
    //                 "saturation": 43
    //             }, {
    //                 "lightness": -11
    //             }, {
    //                 "hue": "#0088ff"
    //             }]
    //         }, {
    //             "featureType": "road",
    //             "elementType": "geometry.fill",
    //             "stylers": [{
    //                 "hue": "#ff0000"
    //             }, {
    //                 "saturation": -100
    //             }, {
    //                 "lightness": 99
    //             }]
    //         }, {
    //             "featureType": "road",
    //             "elementType": "geometry.stroke",
    //             "stylers": [{
    //                 "color": "#808080"
    //             }, {
    //                 "lightness": 54
    //             }]
    //         }, {
    //             "featureType": "landscape.man_made",
    //             "elementType": "geometry.fill",
    //             "stylers": [{
    //                 "color": "#ece2d9"
    //             }]
    //         }, {
    //             "featureType": "poi.park",
    //             "elementType": "geometry.fill",
    //             "stylers": [{
    //                 "color": "#ccdca1"
    //             }]
    //         }, {
    //             "featureType": "road",
    //             "elementType": "labels.text.fill",
    //             "stylers": [{
    //                 "color": "#767676"
    //             }]
    //         }, {
    //             "featureType": "road",
    //             "elementType": "labels.text.stroke",
    //             "stylers": [{
    //                 "color": "#ffffff"
    //             }]
    //         }, {
    //             "featureType": "poi",
    //             "stylers": [{
    //                 "visibility": "off"
    //             }]
    //         }, {
    //             "featureType": "landscape.natural",
    //             "elementType": "geometry.fill",
    //             "stylers": [{
    //                 "visibility": "on"
    //             }, {
    //                 "color": "#b8cb93"
    //             }]
    //         }, {
    //             "featureType": "poi.park",
    //             "stylers": [{
    //                 "visibility": "on"
    //             }]
    //         }, {
    //             "featureType": "poi.sports_complex",
    //             "stylers": [{
    //                 "visibility": "on"
    //             }]
    //         }, {
    //             "featureType": "poi.medical",
    //             "stylers": [{
    //                 "visibility": "on"
    //             }]
    //         }, {
    //             "featureType": "poi.business",
    //             "stylers": [{
    //                 "visibility": "simplified"
    //             }]
    //         }]
    //
    //     }
    //     var map = new google.maps.Map(document.getElementById("map"), mapOptions);
    //
    //     var marker = new google.maps.Marker({
    //         position: myLatlng,
    //         title: "Hello World!"
    //     });
    //
    //     // To add the marker to the map, call setMap();
    //     marker.setMap(map);
    // },
    //
    // showNotification: function(from, align) {
    //     color = Math.floor((Math.random() * 4) + 1);
    //
    //     $.notify({
    //         icon: "notifications",
    //         message: "Welcome to <b>Material Dashboard</b> - a beautiful freebie for every web developer."
    //
    //     }, {
    //         type: type[color],
    //         timer: 4000,
    //         placement: {
    //             from: from,
    //             align: align
    //         }
    //     });
    // }



}

</script>

<script>
function tabela()
{
  var divToPrint=document.getElementById("tabelaAut");
  var js_array =<?php echo json_encode($id_automacao)?>;
  var html;
  var i=0;
  var lengthA = js_array.length;
  for(i;i<lengthA;i++)
  {
    var input;
    var output;
    var total;
    var minutos;
    if(js_array[i] == 0)
    {
      input = "Escavador";
      output = "Trello";
      total = <?php echo json_encode($totalEscavador)?>;
      minutos = <?php echo json_encode($minutosEscavador)?>;
      html = html + "<tr><td>"+input+"</td><td>"+output+"</td><td>"+total+"</td><td>"+minutos+"</td></tr>";
    }
    if(js_array[i] == 1)
    {
      input = "Digesto";
      output = "Trello";
      total = <?php echo json_encode($totalDigesto)?>;
      minutos = <?php echo json_encode($minutosDigesto)?>;
      html = html + "<tr><td>"+input+"</td><td>"+output+"</td><td>"+total+"</td><td>"+minutos+"</td></tr>";
    }

  }
  html = html.replace("undefined<tr>","<tr>");
  console.log(html);
  divToPrint.innerHTML = html;
}


</script>




</html>
