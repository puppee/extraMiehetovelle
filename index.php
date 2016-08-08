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
        <title>Secure Login: Log In</title>
        <link rel="stylesheet" href="styles/main.css" />
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script> 
    </head>
    <body>
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
?>      
    </body>
</html>