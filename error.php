<?php
$error = filter_input(INPUT_GET, 'err', $filter = FILTER_SANITIZE_STRING);
 
if (! $error) {
    $error = 'Oho. Tuntematon virhe.';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Kirjautumisvirhe</title>
        <link rel="stylesheet" href="styles/main.css" />
    </head>
    <body>
        <h1>Meillä oli ongelma.</h1>
        <p class="error"><?php echo $error; ?></p>  
    </body>
</html>