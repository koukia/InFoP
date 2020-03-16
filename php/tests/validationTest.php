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
        // ５０文字以内
        $actual = InquiryForm\validate_email("a@b.c");
        $this->assertEquals("", $actual);
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
}
