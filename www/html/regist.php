<?php
// namespace InquiryForm;
include('../php/sanitizing.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $_POST['category'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $inquiry_content = $_POST['inquiry'];
    try {
        # hostには「docker-compose.yml」で指定したコンテナ名を記載
        $dsn = "mysql:host=mysql_host;dbname=inquiry_form;";
        $db = new PDO($dsn, 'docker', 'docker');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // :name, :phone, :email, :inquiry_content
        $sql = "INSERT INTO inquiry (
            category, name, phone, email, inquiry_content
        ) VALUES (
            \"$category\", \"$name\", \"$phone\", \"$email\", \"$inquiry_content\"
        )";
        var_dump($sql);
        $statement = $db->prepare($sql);
        $result = $statement->execute();

        // $params = [
        //     ':category' => $category,
        //     ':name' => $name,
        //     ':phone' => $phone,
        //     ':email' => $email,
        //     ':inquiry_content' => $inquiry_content
        // ];
        // $result = $statement->execute($paramas);
        //TODO:エラー時の処理

    } catch (PDOException $e) {
        echo "Error" . $e->getMessage();
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