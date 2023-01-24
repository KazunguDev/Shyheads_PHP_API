<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../../library/function.php";
if (
    isset($_POST["deliveryBoyId"])
    && isset($_POST["orderStatus"])
    //&& is_auth()
) {
    $deliveryBoyId = $_POST["deliveryBoyId"];
    $orderStatus = $_POST["orderStatus"];
    $insertArray = array();
    array_push($insertArray, htmlspecialchars(strip_tags($deliveryBoyId)), htmlspecialchars(strip_tags($orderStatus)));


    $sql = "SELECT * from order_model where deliveryBoyId=? AND orderStatus=?";




    $result = dbExec($sql,  $insertArray);

    $arrJson = array();
    if ($result->rowCount() > 0) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            // extract($row);
            $arrJson[] = $row;
        }
        $resJson = array("result" => "success", "code" => "200", "message" => $arrJson);
        echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
    } else {
        $resJson = array("result" => "fail1", "code" => "200", "message" => []);
        echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
    }
} else {
    //bad request
    $resJson = array("result" => "fail2", "code" => "400", "message" => "error");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
}
