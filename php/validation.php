<?php
namespace InquiryForm;

const PLEASE_INPUT = "入力してください．";
const PLEASE_INPUT_WITHIN_50CHAR = "50文字以下で記入ください．";
const PLEASE_INPUT_WITHIN_100CHAR = "100文字以下で記入ください．";
const PLEASE_INPUT_WITHIN_1000CHAR = "1000文字以下で記入ください．";
const PLEASE_INPUT_CORRECT_EMAIL = "メールアドレスが正しくありません．";
const PLEASE_INPUT_NUMBER = "電話番号が正しくありません．";

function validate_name($name) {
    if (empty($name)) {
        return PLEASE_INPUT;
    } elseif (mb_strlen($name) > 50) {
        return PLEASE_INPUT_WITHIN_50CHAR;
    }
    return "";
}
function validate_email($email) {
    if (empty($email)) {
        return PLEASE_INPUT;
    } elseif (mb_strlen($name) > 50) {
        return PLEASE_INPUT_WITHIN_100CHAR;
    } elseif (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $email)) {
        return PLEASE_INPUT_CORRECT_EMAIL;
    }
    return "";
}
function validate_phone($phone) {
    if (empty($phone)) {
        return PLEASE_INPUT;
    } elseif (!preg_match("/^[0-9]{10,11}$/", $phone)) {
        return PLEASE_INPUT_NUMBER;
    }
    return "";
}
function validate_inquiry($inquiry) {
    if (empty($inquiry)) {
        return PLEASE_INPUT;
    } elseif (mb_strlen($inquiry) > 1000) {
        return PLEASE_INPUT_WITHIN_1000CHAR;
    }
    return "";
}
?>
