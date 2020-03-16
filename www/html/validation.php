<?php
function validate_name($name) {
  if (empty($name)) {
    return "入力してください．";
  } elseif (mb_strlen($name) > 50) {
    return "50文字以下で記入ください．";
  }
  return "";
}
function validate_email($email) {
    if (empty($email)) {
        return "入力してください．";
    } elseif (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $email)) {
        return "メールアドレスが正しくありません．";
    }
    return "";
}
function validate_phone($phone) {
    if (empty($phone)) {
        return "入力してください．";
    } elseif (!preg_match("/^[0-9]{10,11}$/", $email)) {
        return "半角数字のみで記入ください．";
    }
    return "";
}
function validate_inquiry($inquiry) {
    if (empty($inquiry)) {
        return "入力してください．";
    } elseif (mb_strlen($inquiry) > 1000) {
        return "1,000文字以下で記入ください．";
    }
    return "";
}
?>
