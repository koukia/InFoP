<?php
namespace InquiryForm;
use \PDO;
include('../php/sanitizing.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $_POST['category'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $inquiry_content = $_POST['inquiry'];
    try {
        $dsn = "mysql:host=mysql_host;dbname=inquiry_form;";
        $db = new PDO($dsn, 'docker', 'docker');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // :name, :phone, :email, :inquiry_content
        $sql = "INSERT INTO inquiry (
            category, name, phone, email, inquiry_content
        ) VALUES (
            \"$category\", \"$name\", \"$phone\", \"$email\", \"$inquiry_content\"
        )";
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
    } catch (PDOException $e) {
        // echo "Error" . $e->getMessage();
        $result = false;
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
</head>
<body>
    <?php if ($result) {?>
        <div>
            <h2>お問い合わせを受け付けました．<br>
                ご意見ありがとうございます
            </h2>
        </div>
    <?php } else { ?>
        <div>
            <h2>お問い合わせ情報の保存に失敗しました．<br>
                もう一度入力をお願いいたします．
            </h2>
        </div>
    <?php } ?>
<div>

</div>
</body>
</html>