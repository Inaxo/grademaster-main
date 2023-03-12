<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit();
}else{
    require_once "../mysqldataprovider.php";
    try{
        $id = $_POST['id'];
        $sql = "DELETE FROM test WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();


    } catch(PDOException $e) {

    }

    $conn = null;
}


?>