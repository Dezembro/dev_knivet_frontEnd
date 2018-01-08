<?php
 error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
 session_start();
?>
<?php  if(isset($_SESSION['logado'])):    ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon.png" />
    <link rel="icon" type="image/png" href="img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Knivet - Seja mais produtivo</title>
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
                    <li>
                        <a href="resumo.php">
                            <i class="material-icons">dashboard</i>
                            <p style="color: white;">Resumo</p>
                        </a>
                    </li>
                    <li class="active">
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
                        <a class="navbar-brand"> Bem vindo <?php echo( $_SESSION['nome']);  ?>, <br>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;aqui estão todas as integrações da Knivet </a>
                    </div>
                    <div class="collapse navbar-collapse">

                    </div>
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">

                      <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="card card-stats" >
                              <!-- <div class="card-header" style="background-color: rgba(0,0,0,0.3);">
                                  <img src="img/logo_grande.png">
                              </div> --><br>
                              <h3 class="title">&nbsp;&nbsp;&nbsp;&nbsp;<i class="material-icons">autorenew</i>&nbsp;&nbsp;&nbsp;Automações</h3>
                              <br>
                              <p class="category">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Abaixo está a lista de automações disponíveis</p>
                              <div class="card-content">
                              </div>
                              <div class="card-footer">
                                  <div class="stats">
                                      <!-- <i class="material-icons">info</i> Aplicações ativas mas não configuradas também contam -->
                                  </div>
                              </div>
                          </div>
                      </div>

                      <div class="col-lg-4 col-md-4 col-sm-12">
                          <div class="card card-stats">
                              <div class="card-header" style="background-color: rgba(25,25,25,0.17);">
                                  <img src="img/automacoes/escavador_trello.jpg">
                              </div>
                              <div class="card-content">
                                <p class="category">Automação </p>
                                <h3 class="title">Escavador <br>-><br> Trello
                                      <!-- <small>GB</small> -->
                                  </h3>
                              </div>
                              <div class="card-footer">
                                <td>
                                    <div class="checkbox">
                                        <label>
                                            <input onclick="checkEscavador_trello()" id="escavador_trello_cb" type="checkbox" name="optionsCheckboxes">
                                        </label>
                                    </div>
                                </td>
                                <td>Ativar automação</td>
                                <br>
                                  <div class="stats">
                                    <br><br>
                                      <a id="config_escavador_trello" href="#" onclick="escavador_trello()" style="font-size: 150%; color: grey; display: none;">Configurar acesso as contas</a>

                                  </div>
                              </div>
                              <div class="card-footer" id="escavador_trello" style="display: none">
                                    <br>
                                    <a href="#" style="font-size: 150%; color: grey;" onclick="escavador1()" style="font-size: 150%; color: grey;">Escavador</a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="#" style="font-size: 150%; color: grey;" onclick="trello2()" style="font-size: 150%; color: grey;">Trello</a>
                                    <br>
                                  <div class="stats" style="display: none" id="escavador">
                                    <i class="material-icons"></i><a style="font-size: 150%; color: grey;">Email:</a>&nbsp;&nbsp;
                                    <input style="width: 300px" type="text" class="form-control" name="email_escavador" placeholder="Digite o email da sua conta Escavador"/>
                                    <br>
                                    <i class="material-icons"></i><a style="font-size: 150%; color: grey;">Senha:</a>&nbsp;&nbsp;
                                    <input style="width: 300px" type="password" class="form-control" name="senha_escavador" placeholder="Digite a senha da sua conta Escavador"/>
                                  </div>
                                  <div class="stats" style="display: none" id="trello1">
                                    <i class="material-icons"></i><a style="font-size: 150%; color: grey;">Email:</a>&nbsp;&nbsp;
                                    <input style="width: 300px" type="text" class="form-control" name="email_trello" placeholder="Digite o email da sua conta Trello"/>
                                    <br>
                                    <i class="material-icons"></i><a style="font-size: 150%; color: grey;">Senha:</a>&nbsp;&nbsp;
                                    <input style="width: 300px" type="password" class="form-control" name="senha_trello" placeholder="Digite a senha da sua conta Trello"/>
                                  </div>
                              </div>


                          </div>
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-12">
                          <div class="card card-stats">
                              <div class="card-header" style="background-color: rgba(25,25,25,0.17);">
                                  <img src="img/automacoes/digesto_trello.jpg">
                              </div>
                              <div class="card-content">
                                <p class="category">Automação </p>
                                <h3 class="title">Digesto <br>-><br> Trello
                                      <!-- <small>GB</small> -->
                                  </h3>
                              </div>
                              <div class="card-footer">
                                <td>
                                    <div class="checkbox">
                                        <label>
                                            <input onclick="checkDigesto_trello()" id="digesto_trello_cb" type="checkbox" name="optionsCheckboxes">
                                        </label>
                                    </div>
                                </td>
                                <td>Ativar automação</td>
                                <br>
                                  <div class="stats">
                                    <br><br>
                                      <a id="config_digesto_trello" href="#" onclick="digesto_trello()" style="font-size: 150%; color: grey; display: none;">Configurar acesso as contas</a>

                                  </div>
                              </div>
                              <div class="card-footer" id="digesto_trello" style="display: none">
                                    <br>
                                    <a href="#" style="font-size: 150%; color: grey;" onclick="digesto1()" style="font-size: 150%; color: grey;">Digesto</a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="#" style="font-size: 150%; color: grey;" onclick="trello1()" style="font-size: 150%; color: grey;">Trello</a>
                                    <br>
                                  <div class="stats" style="display: none" id="digesto">
                                    <i class="material-icons"></i><a style="font-size: 150%; color: grey;">Email:</a>&nbsp;&nbsp;
                                    <input style="width: 300px" type="text" class="form-control" name="email_digesto" placeholder="Digite o email da sua conta Digesto"/>
                                    <br>
                                    <i class="material-icons"></i><a style="font-size: 150%; color: grey;">Senha:</a>&nbsp;&nbsp;
                                    <input style="width: 300px" type="password" class="form-control" name="senha_digesto" placeholder="Digite a senha da sua conta Digesto"/>
                                  </div>
                                  <div class="stats" style="display: none" id="trello2">
                                    <i class="material-icons"></i><a style="font-size: 150%; color: grey;">Email:</a>&nbsp;&nbsp;
                                    <input style="width: 300px" type="text" class="form-control" name="email_digesto" placeholder="Digite o email da sua conta Trello"/>
                                    <br>
                                    <i class="material-icons"></i><a style="font-size: 150%; color: grey;">Senha:</a>&nbsp;&nbsp;
                                    <input style="width: 300px" type="password" class="form-control" name="senha_digesto" placeholder="Digite a senha da sua conta Trello"/>
                                  </div>
                              </div>


                          </div>
                      </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</body>

<script>

function checkDigesto_trello()
{
    var x = document.getElementById("digesto_trello_cb").checked
    var y = document.getElementById("config_digesto_trello");
    if(x == true)
    {
      y.style.display = "block";
    }
    else
    {
      y.style.display = "none";
    }
}

function digesto_trello() {
    var x = document.getElementById("digesto_trello");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
function digesto1() {
    var x = document.getElementById("digesto");
    var y = document.getElementById("trello2");
    if (x.style.display === "none") {
        x.style.display = "block";
        y.style.display = "none";
    } else {
        x.style.display = "none";
        y.style.display = "none";
    }
}
function trello1() {
    var x = document.getElementById("trello2");
    var y = document.getElementById("digesto");
    if (x.style.display === "none") {
      x.style.display = "block";
      y.style.display = "none";
    } else {
      x.style.display = "none";
      y.style.display = "none";
    }
}
//ACONTECE
function checkEscavador_trello()
{
    var x = document.getElementById("escavador_trello_cb").checked
    var y = document.getElementById("config_escavador_trello");
    if(x == true)
    {
      y.style.display = "block";
    }
    else
    {
      y.style.display = "none";
    }
}

function escavador_trello() {
    var x = document.getElementById("escavador_trello");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
function escavador1() {
    var x = document.getElementById("escavador");
    var y = document.getElementById("trello1");
    if (x.style.display === "none") {
        x.style.display = "block";
        y.style.display = "none";
    } else {
        x.style.display = "none";
        y.style.display = "none";
    }
}
function trello2() {
    var x = document.getElementById("trello1");
    var y = document.getElementById("escavador");
    if (x.style.display === "none") {
      x.style.display = "block";
      y.style.display = "none";
    } else {
      x.style.display = "none";
      y.style.display = "none";
    }
}

</script>

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

        /* ----------==========     TOTAL CHAMADAS    ==========---------- */

        dataDailySalesChart = {
            labels: ['Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab', 'Dom'],
            series: [
                [22, 17, 7, 17, 23, 18, 38]
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



        /* ----------==========     HORAS SALVAS    ==========---------- */

        dataCompletedTasksChart = {
            labels: ['Seg', 'Ter', 'Quar', 'Qui', 'Sex', 'Sáb', 'Dom'],
            series: [
                [8, 7, 5, 12, 8, 4, 2]
            ]
        };

        optionsCompletedTasksChart = {
            lineSmooth: Chartist.Interpolation.cardinal({
                tension: 0
            }),
            low: 0,
            high: 24, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
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

    initGoogleMaps: function() {
        var myLatlng = new google.maps.LatLng(40.748817, -73.985428);
        var mapOptions = {
            zoom: 13,
            center: myLatlng,
            scrollwheel: false, //we disable de scroll over the map, it is a really annoing when you scroll through page
            styles: [{
                "featureType": "water",
                "stylers": [{
                    "saturation": 43
                }, {
                    "lightness": -11
                }, {
                    "hue": "#0088ff"
                }]
            }, {
                "featureType": "road",
                "elementType": "geometry.fill",
                "stylers": [{
                    "hue": "#ff0000"
                }, {
                    "saturation": -100
                }, {
                    "lightness": 99
                }]
            }, {
                "featureType": "road",
                "elementType": "geometry.stroke",
                "stylers": [{
                    "color": "#808080"
                }, {
                    "lightness": 54
                }]
            }, {
                "featureType": "landscape.man_made",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#ece2d9"
                }]
            }, {
                "featureType": "poi.park",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#ccdca1"
                }]
            }, {
                "featureType": "road",
                "elementType": "labels.text.fill",
                "stylers": [{
                    "color": "#767676"
                }]
            }, {
                "featureType": "road",
                "elementType": "labels.text.stroke",
                "stylers": [{
                    "color": "#ffffff"
                }]
            }, {
                "featureType": "poi",
                "stylers": [{
                    "visibility": "off"
                }]
            }, {
                "featureType": "landscape.natural",
                "elementType": "geometry.fill",
                "stylers": [{
                    "visibility": "on"
                }, {
                    "color": "#b8cb93"
                }]
            }, {
                "featureType": "poi.park",
                "stylers": [{
                    "visibility": "on"
                }]
            }, {
                "featureType": "poi.sports_complex",
                "stylers": [{
                    "visibility": "on"
                }]
            }, {
                "featureType": "poi.medical",
                "stylers": [{
                    "visibility": "on"
                }]
            }, {
                "featureType": "poi.business",
                "stylers": [{
                    "visibility": "simplified"
                }]
            }]

        }
        var map = new google.maps.Map(document.getElementById("map"), mapOptions);

        var marker = new google.maps.Marker({
            position: myLatlng,
            title: "Hello World!"
        });

        // To add the marker to the map, call setMap();
        marker.setMap(map);
    },

    showNotification: function(from, align) {
        color = Math.floor((Math.random() * 4) + 1);

        $.notify({
            icon: "notifications",
            message: "Welcome to <b>Material Dashboard</b> - a beautiful freebie for every web developer."

        }, {
            type: type[color],
            timer: 4000,
            placement: {
                from: from,
                align: align
            }
        });
    }



}

</script>

</html>
<?php endif;
header("location:index.html");

?>
