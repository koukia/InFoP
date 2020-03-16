<?php
use PHPUnit\Framework\TestCase;
require_once 'html/validation.php';

class ValidationTest extends TestCase {
    public function testReturnHello() {
        $actual = InquiryForm\validate_name("");
        $this->assertEquals(InquiryForm\PLEASE_INPUT, $actual);
    }
}
