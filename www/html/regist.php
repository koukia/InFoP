<?php
// namespace InquiryForm;
include('sanitizing.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $_POST['category'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $inquiry = $_POST['inquiry'];
    try {
        # hostには「docker-compose.yml」で指定したコンテナ名を記載
        $dsn = "mysql:host=mysql_host;dbname=inquiry_form;";
        $db = new PDO($dsn, 'docker', 'docker');

        $mysqli = new mysqli('mysql_host', 'docker', 'docker', 'inquiry_form');
        if( $mysqli->connect_errno ) {
            echo $mysqli->connect_errno . ' : ' . $mysqli->connect_error;
        }
        $mysqli->set_charset('utf8');

        // set_insquiry($category, $name, $email, $phone, $inquiry);
        $sql = "INSERT INTO inquiry (
            name, phone, email, inquiry_content
        ) VALUES (
            $name, $email, $phone, $inquiry
        )";
        $res = $mysqli->query($sql);
        // $stmt = $db->prepare($sql);
        // $stmt->execute();
        // $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($result);

        $sql = "SELECT * FROM inquiry";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        var_dump($result);
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
</head>
<body>
<div><h2>登録しました</h2></div>
<div>

</div>
</body>
</html>