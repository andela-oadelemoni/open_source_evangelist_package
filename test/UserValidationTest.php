<?php
use Kamiye\OpenSource\GitHub;

class UserValidationTest extends PHPUnit_Framework_TestCase {
	
	// Test invalid username
	/**
	 * @expectedException InvalidUsernameException
	 */
	public function testInvalidUsernameResponse() {
		$invalidUsername = 'not-a-real-user';
		$this->setExpectedException('\Kamiye\OpenSource\InvalidUsernameException');
		$actual = GitHub::verifyUsername($invalidUsername);
	}
	// Test valid username
	public function testValidUsernameResponse() {
		$validUsername = 'andela-oadelemoni';
		$actual = GitHub::verifyUsername($validUsername);
		$this->assertTrue($actual);
	}

}