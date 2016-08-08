<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "miehetovelle", "passwordformiehetovelle", "miehetovelle");

$result = $conn->query("SELECT * FROM tilaukset");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"id":"'  . $rs["id"] . '",';
    $outp .= '"asiakasid":"'   . $rs["asiakasid"]        . '",';
    $outp .= '"etunimi":"'   . $rs["etunimi"]        . '",';
    $outp .= '"sukunimi":"'   . $rs["sukunimi"]        . '",';
    $outp .= '"puhelin":"'   . $rs["puhelin"]        . '",';
    $outp .= '"osoite":"'   . $rs["osoite"]        . '",';
    $outp .= '"postinro":"'   . $rs["postinro"]        . '",';
    $outp .= '"kaupunki":"'   . $rs["kaupunki"]        . '",';
    $outp .= '"pyyntotyyppi":"'   . $rs["pyyntotyyppi"]        . '",';
    $outp .= '"sisalto":"'   . $rs["teksti"]        . '",';
    $outp .= '"status":"'   . $rs["status"]        . '",';
    $outp .= '"tehtava":"'   . $rs["tehtava"]        . '",';
    $outp .= '"email":"'   . $rs["email"]        . '",';
    $outp .= '"allokoi":"'   . $rs["allokoi"]        . '",';
    $outp .= '"luotu":"'. $rs["luotu"]     . '"}'; 
}
$outp ='{"rows":['.$outp.']}';
$conn->close();

echo($outp);
?>