<?php
use EvangelistStatus\UserValidation;

class UserValidationTest extends PHPUnit_Framework_TestCase {
	
	// Test invalid username
	public function testInvalidUsernameResponse() {
		$invalidUsername = 'not-a-real-user';
		$actual = UserValidation::verifyUsername($invalidUsername);
		$this->assertFalse($actual);
	}
	// Test valid username
	public function testValidUsernameResponse() {
		$validUsername = 'andela-oadelemoni';
		$actual = UserValidation::verifyUsername($validUsername);
		$this->assertTrue($actual);
	}

}