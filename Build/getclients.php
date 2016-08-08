<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "miehetovelle", "passwordformiehetovelle", "miehetovelle");

$result = $conn->query("SELECT * FROM asiakkaat");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"id":"'  . $rs["id"] . '",';
    $outp .= '"etunimi":"'   . $rs["etunimi"]        . '",';
    $outp .= '"sukunimi":"'   . $rs["sukunimi"]        . '",';
    $outp .= '"puhelin":"'   . $rs["puhelin"]        . '",';
    $outp .= '"laskuosoite":"'   . $rs["laskuosoite"]        . '",';
    $outp .= '"laskupostinro":"'   . $rs["laskupostinro"]        . '",';
    $outp .= '"laskukaupunki":"'   . $rs["laskukaupunki"]        . '",';
    $outp .= '"kayntiosoite":"'   . $rs["kayntiosoite"]        . '",';
    $outp .= '"kayntipostinro":"'   . $rs["kayntipostinro"]        . '",';
    $outp .= '"kayntikaupunki":"'   . $rs["kayntikaupunki"]        . '",';
    $outp .= '"ytunnus":"'   . $rs["ytunnus"]        . '",';
    $outp .= '"yritys":"'   . $rs["yritys"]        . '",';
    $outp .= '"email":"'   . $rs["email"]        . '",';
    $outp .= '"luotu":"'. $rs["luotu"]     . '"}'; 
}
$outp ='{"rows":['.$outp.']}';
$conn->close();

echo($outp);
?>