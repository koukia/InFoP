<?php
use PHPUnit\Framework\TestCase;
require_once 'html/validation.php';

class ValidationTest extends TestCase {
    public function testInputNameValidation() {
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
}
