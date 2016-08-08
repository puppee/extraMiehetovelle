<!DOCTYPE html>
<!--
	Copyright ByTS 2016. All rights reserved.
	Any usage of the code is forbidden without permission from ByTS.
-->
<?php
   include('session.php');
?>
<html lang="fi" xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Miehetovelle.com - Extranet</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta property="og:title" content="MOC Extranet (ByTS EX)" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.8/angular.min.js"></script> <! Sisällytä mukaan, ei CDN:ää.>
    <script>
var app = angular.module('miehetovelle', []);
app.controller("main", function($scope, $http) {
	$http.get('https://graph.facebook.com/fql?q=select%20%20like_count%20from%20link_stat%20where%20url=%22http://facebook.com/Miehetovelle%22').success(function(data, status, headers, config) {
		$scope.likes = data;
	});
	$http.get('getorders.php').success(function(data, status, headers, config) {
		$scope.orders = data.rows;
	});
	$http.get('getclients.php').success(function(data, status, headers, config) {
		$scope.clients = data.rows;
	});
});
    </script>
  </head>
  <body class="hold-transition skin-blue sidebar-mini" ng-app="miehetovelle">
    <div class="wrapper" ng-controller="main">

      <header class="main-header">
        <a href="index.php" class="logo">
          <span class="logo-mini">Extra</span>
          <span class="logo-lg"><b>Miehetovelle</b>Extranet</span>
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navigointi</span>
          </a>
          <!-- Navbar, oikea -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Viestidropdown -->
              <li class="dropdown messages-menu hide">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">0</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">Viestit ei käytössä tässä versiossa.</li>
                  <li>
                    <ul class="menu">
                      <li><!-- Viesti -->
                        <a href="#">
                          <div class="pull-left">
                            <img src="dist/img/avatar2.png" class="img-circle" alt="Käyttäjän kuva">
                          </div>
                          <h4>
                            Lähettäjä
                            <small><i class="fa fa-clock-o"></i>Aika</small>
                          </h4>
                          <p>Teksti</p>
                        </a>
                      </li><!-- loppuu -->
                    </ul>
                  </li>
                  <li class="footer"><a href="#">Katso kaikki viestit</a></li>
                </ul>
              </li>
              <!-- Ilmoitukset -->
              <li class="dropdown notifications-menu hide">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">0</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">Ilmoitukset ei käytössä tässä versiossa.</li>
                  <li>
                    <!-- Yksittäinen ilmoitus -->
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <i class="fa fa-warning text-aqua"></i> Teksti
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">Näytä kaikki</a></li>
                </ul>
              </li>
              <!-- Käyttäjä -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="dist/img/avatar.png" class="user-image" alt="User Image">
                  <span class="hidden-xs">Nimi</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="user-header">
                    <img src="dist/img/avatar.png" class="img-circle" alt="User Image">
                    <p>
                      Nimi
                      <small>Tehtävä</small>
                    </p>
                  </li>
                  <!-- Menu -->
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Tehtävät</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Asetukset</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Tiedot</a>
                    </div>
                  </li>
                  <!-- Menupohja-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profiili</a>
                    </div>
                    <div class="pull-right">
                      <a href="logout.php" class="btn btn-default btn-flat" ua-logout>Kirjaudu ulos</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Sivubaari -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>

        </nav>
      </header>
      <!-- Vasemmistokolumni -->
      <aside class="main-sidebar">
        <section class="sidebar">
          <!-- Käyttäjä -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/avatar.png" class="img-circle" alt="User Image"> <!-- ng! -->
            </div>
            <div class="pull-left info">
              <p>Käyttäjän nimi</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Kirjautuneena</a>
            </div>
          </div>
          <!-- Haku
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Haku...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>  -->
          <!-- Sivunavigointi -->
          <ul class="sidebar-menu">
            <li class="header">NAVIGOINTI</li>
            <li class="active">
              <a href="#">
                <i class="fa fa-th"></i> <span>Päänäkymä</span> <small class="label pull-right bg-green">{{orders.length}}</small>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Lomakkeet</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Huoltopyyntö</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Talonkirjaote</a></li>
              </ul>
            </li>
          </ul>
        </section>
      </aside>

      <!-- Sisältöwrapperi -->
      <div class="content-wrapper">
        <section class="content-header">
          <h1>
            Päänäkymä
            <small>Huolto</small> <!-- DIVARI ng! -->
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Etusivu</a></li>
            <li class="active">Päänäkymä</li>
          </ol>
        </section>

        <!-- Sisältö -->
        <section class="content">
          <!-- Infoboksit -->
          <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-purple"><i class="ion ion-ios-gear-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Avoimia tehtäviä</span>
                  <span class="info-box-number">{{(orders | filter:{'status':'1'}: true).length + (orders | filter:{'status':'2'}: true).length + (orders | filter:{'status':'3'}: true).length}}<small> kpl</small></span>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-blue"><i class="fa fa-facebook"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Tykkäyksiä</span>
                  <span class="info-box-number">{{likes.data[0].like_count}}</span>
                </div>
              </div>
            </div>

            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-cart-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Tarjouspyyntöjä</span>
                  <span class="info-box-number">{{(orders | filter:{'pyyntotyyppi':'1'}: true).length}}</span>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-blue"><i class="ion ion-ios-people-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Asiakasmäärä</span>
                  <span class="info-box-number">{{clients.length}}</span>
                </div>
              </div>
            </div>
          </div>
          <!-- Päärivi -->
          <div class="row">
            <!-- Vasen -->
            <div class="col-md-8">
              <!-- Uudet tehtävät -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Uusimmat tehtävät</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Tehtävä</th>
                          <th>Tilaaja</th>
                          <th>Osoite</th>
                          <th>Tila</th>
                          <th>Allokoitu</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-repeat="x in orders">
                          <td><a href="tilaus.php?id={{x.id}}">{{x.id}}</a></td>
                          <td>
	                          <span class="label label-success" ng-show="x.pyyntotyyppi==1">Tarjouspyyntö</span>
	                          <span class="label label-success" ng-show="x.pyyntotyyppi==2">Huoltopyyntö</span>
	                          {{x.tehtava}}
	                      </td>
                          <td>{{x.etunimi}} {{x.sukunimi}}</td>
                          <td>{{x.osoite}}, {{x.kaupunki}}</td>
                          <td>
	                          <span class="label label-info" ng-show="x.status==1">Vastaanotettu</span>
	                          <span class="label label-primary" ng-show="x.status==2">Hyväksytty</span>
	                          <span class="label label-warning" ng-show="x.status==3">Työn alla</span>
	                          <span class="label label-danger" ng-show="x.status==4">Hylätty</span>
	                          <span class="label label-success" ng-show="x.status==5">Suoritettu</span>
	                          <span class="label label-success" ng-show="x.status==6">Tarjous lähetetty</span>
	                      </td>
                          <td>{{x.allokoi}}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="box-footer clearfix">
                  <a href="javascript::;" class="btn btn-sm btn-info btn-flat pull-left">Uusi tehtävä</a>
                  <a href="javascript::;" class="btn btn-sm btn-default btn-flat pull-right">Kaikki tehtävät</a>
                </div>
              </div>
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Luo uusi asiakas</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
	                <form class="form-horizontal" action="createclient.php" method="POST">
		                <fieldset>
			                <div class="form-group">
				                <label class="col-md-4 control-label" for="yritys">Yritys</label>
				                <div class="col-md-5">
					                <input id="yritys" name="yritys" type="text" placeholder="Yrityksen nimi" class="form-control input-md">
					            </div>
					        </div>
					        <div class="form-group">
						        <label class="col-md-4 control-label" for="ytunnus">Y-tunnus</label>  
						        <div class="col-md-4">
							        <input id="ytunnus" name="ytunnus" type="text" placeholder="xxxxxx-x" class="form-control input-md">
							    </div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label" for="sukunimi">Yhteyshenkilö</label>
								<div class="col-md-4">
									<div class="input-group">
										<input id="etunimi" name="etunimi" class="form-control input-md" placeholder="Etunimi" type="text">
										<input id="sukunimi" name="sukunimi" class="form-control input-md" placeholder="Sukunimi" type="text">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label" for="puhelin">Puhelinnumero</label>
								<div class="col-md-4">
									<input id="puhelin" name="puhelin" type="text" placeholder="040-1234567" class="form-control input-md">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label" for="email">Sähköposti</label>
								<div class="col-md-5">
									<input id="email" name="email" type="text" placeholder="malli@email.fi" class="form-control input-md">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label" for="kayntiosoite">Käyntiosoite</label> 
								<div class="col-md-4">
									<input id="kayntiosoite" name="kayntiosoite" type="text" placeholder="Mallikatu 1 B" class="form-control input-md">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label" for="kayntipostinro">Postinumero</label>
								<div class="col-md-2">
									<input id="kayntipostinro" name="kayntipostinro" type="text" placeholder="00100" class="form-control input-md">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label" for="kayntikaupunki">Kaupunki</label>
								<div class="col-md-4">
									<input id="kayntikaupunki" name="kayntikaupunki" type="text" placeholder="Helsinki" class="form-control input-md">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label" for="laskuosoite">Laskuosoite</label>
								<div class="col-md-4">
									<input id="laskuosoite" name="laskuosoite" type="text" placeholder="PL 1" class="form-control input-md">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label" for="laskupostinro">Postinumero</label>  
								<div class="col-md-4">
									<input id="laskupostinro" name="laskupostinro" type="text" placeholder="00101" class="form-control input-md">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label" for="laskukaupunki">Kaupunki</label>
								<div class="col-md-4">
									<input id="laskukaupunki" name="laskukaupunki" type="text" placeholder="Helsinki" class="form-control input-md">
								</div>
							</div>
							<label class="col-md-4 control-label" for="button1id">Valinnat</label>
							<div class="col-md-8">
								<button class="btn btn-success" type="submit">Lisää</button>
								<button class="btn btn-danger" type="reset">Tyhjennä</button>
							</div>
						</fieldset>
					</form>
                </div>
              </div>
            </div>
            <div class="col-md-4">
	            <div class="box box-info">
		            <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Ilmoitustaulu</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
	                Ei käytettävissä tällä versiolla.
                </div>
		            </div>
	            </div>
            </div>
            <div class="col-md-4">
	            <div class="box box-info">
		            <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Twitter</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
	                <a class="twitter-timeline" href="https://twitter.com/hashtag/miehetovelle" data-widget-id="732918218587770880">Twiitit, #miehetovelle</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                </div>
		            </div>
	            </div>
            </div>
          </div>
        </section>
      </div>
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Versio</b> 0.4
        </div>
        <strong>&copy; 2016 ByTS</strong>
      </footer>

      <aside class="control-sidebar control-sidebar-dark">
        <div class="tab-content">
          <div class="tab-pane" id="control-sidebar-home-tab">
          </div>
        </div>
      </aside>
      <div class="control-sidebar-bg"></div>
    </div>
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <script src="dist/js/app.min.js"></script>
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="plugins/chartjs/Chart.min.js"></script>
    <script src="dist/js/bytsextra.js"></script>
  </body>
</html>