<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
 
if (login_check($mysqli) == true) {
    $logged = 'sisään';
} else {
    $logged = 'ulos';
}
?>
<!DOCTYPE html>
<html>
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
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script> 
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="content">
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Error Logging In!</p>';
        }
        ?> 
        <form action="includes/process_login.php" method="post" name="login_form">                      
            Sähköposti: <input type="text" name="email" />
            Salasana: <input type="password" 
                             name="password" 
                             id="password"/>
            <input type="button" 
                   value="Kirjaudu" 
                   onclick="formhash(this.form, this.form.password);" /> 
        </form>
        
 
<?php
        if (login_check($mysqli) == true) {
                        echo '<p>Kirjautuneena ' . $logged . ' käyttäjänä ' . htmlentities($_SESSION['username']) . '.</p>';
 
            echo '<p>Vaihdetaanko käyttäjää? <a href="includes/logout.php">Kirjaudu ulos</a>.</p>';
        } else {
                        echo '<p>Kirjautuneena ' . $logged . '.</p>';
                }
?>      </div>
    </body>
</html>