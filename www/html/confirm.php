<?php
namespace InquiryForm;
include('validation.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $category = $_POST['category'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $inquiry = $_POST['inquiry'];
  $err_msgs = array();
  $err_msgs['name'] = validate_name($name);
  $err_msgs['email'] = validate_email($email);
  $err_msgs['phone'] = validate_phone($phone);
  $err_msgs['inquiry'] = validate_inquiry($inquiry);
  $is_passed = true;
  foreach ($err_msgs as $err_msg) {
    if (!empty($err_msg)) {
      $is_passed = false;
    }
  }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
</head>
<body>
<div><h2>お問い合わせの内容確認</h2></div>
<p>
お問い合わせ内容はこちらで宜しいでしょうか？<br>
よろしければ「送信する」ボタンを押して下さい．
</p>
<div>
  <form action="/confirm.php" method="post">
    <input type="hidden" name="name" value="<?php echo $name; ?>">
    <div>
      <div>
        <label>件名</label>
        <?php echo htmlspecialchars($category); ?>
      </div>
      <div>
        <label>お名前</label>
        <?php echo htmlspecialchars($name); ?>
        <?php if(!empty($err_msgs['name'])) {?>
          <label><?php echo htmlspecialchars($err_msgs['name']); ?></label>
        <?php } ?>
      </div>
      <div>
        <label>メールアドレス</label>
        <?php echo htmlspecialchars($email); ?>
        <?php if(!empty($err_msgs['email'])) {?>
          <label><?php echo htmlspecialchars($err_msgs['email']); ?></label>
        <?php } ?>
      </div>
      <div>
        <label>電話番号</label>
        <?php echo htmlspecialchars($phone); ?>
        <?php if(!empty($err_msgs['phone'])) {?>
          <label><?php echo htmlspecialchars($err_msgs['phone']); ?></label>
        <?php } ?>
      </div>
      <div>
        <label>お問い合わせ内容</label>
        <?php echo nl2br(htmlspecialchars($inquiry)); ?>
        <?php if(!empty($err_msgs['inquiry'])) {?>
          <label><?php echo htmlspecialchars($err_msgs['inquiry']); ?></label>
        <?php } ?>
      </div>
    </div>
      <input type="button" value="内容を修正" onclick="history.back(-1)">
        <button type="submit" name="submit" <?php if ($is_passed == false) { ?>disabled<?php } ?>>送信</button>
    </form>
</div>
</body>
</html>