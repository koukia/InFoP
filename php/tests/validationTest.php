<?php
use PHPUnit\Framework\TestCase;
require_once 'html/validation.php';

class ValidationTest extends TestCase {
    public function testName() {
        // 未入力
        $actual = InquiryForm\validate_name("");
        $this->assertEquals(InquiryForm\PLEASE_INPUT, $actual);
        // ５０文字より長い
        $actual = InquiryForm\validate_name("123456789012345678901234567890123456789012345678901");
        $this->assertEquals(InquiryForm\PLEASE_INPUT_WITHIN_50CHAR, $actual);
        // ５０文字以内
        $actual = InquiryForm\validate_name("12345678901234567890123456789012345678901234567890");
        $this->assertEquals("", $actual);
    }
    public function testEmail() {
        // 未入力
        $actual = InquiryForm\validate_email("");
        $this->assertEquals(InquiryForm\PLEASE_INPUT, $actual);
        // 不正な値
        $actual = InquiryForm\validate_email("1");
        $this->assertEquals(InquiryForm\PLEASE_INPUT_CORRECT_EMAIL, $actual);
        // 不正な値
        $actual = InquiryForm\validate_email("1@a");
        $this->assertEquals(InquiryForm\PLEASE_INPUT_CORRECT_EMAIL, $actual);
        // 不正な値
        $actual = InquiryForm\validate_email("1@.v");
        $this->assertEquals(InquiryForm\PLEASE_INPUT_CORRECT_EMAIL, $actual);
        // 正しい値, ５０文字以内
        $actual = InquiryForm\validate_email("a@b.c");
        $this->assertEquals("", $actual);
        // 正しい値, 100文字
        $actual = InquiryForm\validate_name("1234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567@aa");
        $this->assertEquals("", $actual);
        // 不正な値, 101文字以内
        $actual = InquiryForm\validate_name("1234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567@aaa");
        $this->assertEquals(InquiryForm\PLEASE_INPUT_WITHIN_100CHAR, $actual);
    }
    public function testPhone() {
        // 未入力
        $actual = InquiryForm\validate_phone("");
        $this->assertEquals(InquiryForm\PLEASE_INPUT, $actual);
        // 不正な値10文字
        $actual = InquiryForm\validate_phone("ABCDEFGHIJ");
        $this->assertEquals(InquiryForm\PLEASE_INPUT_NUMBER, $actual);
        // 不正な値9文字
        $actual = InquiryForm\validate_phone("123456789");
        $this->assertEquals(InquiryForm\PLEASE_INPUT_NUMBER, $actual);
        // 不正な値12文字
        $actual = InquiryForm\validate_phone("123456789012");
        $this->assertEquals(InquiryForm\PLEASE_INPUT_NUMBER, $actual);
        // 正しい値10文字
        $actual = InquiryForm\validate_phone("1234567890");
        $this->assertEquals("", $actual);
        // 正しい値11文字
        $actual = InquiryForm\validate_phone("12345678901");
        $this->assertEquals("", $actual);
    }
    public function testInquiry() {
        // 未入力
        $actual = InquiryForm\validate_inquiry("");
        $this->assertEquals(InquiryForm\PLEASE_INPUT, $actual);
        // 不正な値1001文字
        $incorrect_val = "";
        for ($i=1; $i<=1001; $i++) {
            $incorrect_val .= "a";
        }
        $actual = InquiryForm\validate_inquiry($incorrect_val);
        $this->assertEquals(InquiryForm\PLEASE_INPUT_WITHIN_1000CHAR, $actual);
        // 正しい値10000文字
        $correct_val = "";
        for ($i=1; $i<=1000; $i++) {
            $correct_val .= "a";
        }
        $actual = InquiryForm\validate_inquiry($correct_val);
        $this->assertEquals("", $actual);
        // 正しい値1文字
        $correct_val = "A";
        $actual = InquiryForm\validate_inquiry($correct_val);
        $this->assertEquals("", $actual);
    }
}
