<!DOCTYPE html>
<html lang="ja">
<head>
</head>
<body>

<?php
  include('sanitizing.php');
?>
<?php
  $category = $_POST['category'];
  $name = validate_name($_POST['name']);
  $phone = $_POST['phone'];
  $content = $_POST['cotent'];
?>

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
      </div>
      <div>
        <label>電話番号</label>
        <?php echo htmlspecialchars($phone); ?>
      </div>
      <div>
        <label>お問い合わせ内容</label>
        <?php echo nl2br(htmlspecialchars($content)); ?>
      </div>
    </div>
      <input type="button" value="内容を修正" onclick="history.back(-1)">
      <button type="submit" name="submit">送信</button>
    </form>
</div>
</body>
</html>