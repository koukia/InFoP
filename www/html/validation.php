<?php
function validate_name($name) {
  if (empty($name)) {
    return "入力してください．";
  } elseif (mb_strlen($name) > 50) {
    return "50文字以下で記入ください．";
  }
  return "";
}
function validate_phone($phone) {
  if (empty($phone)) {
    return "入力してください．";
  } elseif (true) {  //TODO:正規表現とかで確認
    return "半角数字のみで記入ください．";
  }
  return "";
}
function validate_inquiry($inquiry) {
  if (empty($inquiry)) {
    return "入力してください．";
  } elseif (mb_strlen($inquiry) > 1000) {
    return "1000文字以下で記入ください．";
  }
  return "";
}
?>
