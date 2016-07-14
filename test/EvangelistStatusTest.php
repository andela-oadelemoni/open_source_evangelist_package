<?php
use EvangelistStatus\EvangelistStatus;

class EvangelistStatusTest extends 	PHPUnit_Framework_TestCase {

	// test get status with valid username
	public function testGetStatus_validUsername() {
		$username = 'andela-oadelemoni'; 
		$evangelist = new EvangelistStatus($username);
		$status = $evangelist->getStatus();
		$this->assertRegExp('/Associate Evangelist/i',$status);
	}

	// test get status with invalid username
	public function testGetStatus_invalidUsername() {
		$username = 'not-a-valid-username';
		$evangelist = new EvangelistStatus($username);
		$status = $evangelist->getStatus();
		$this->assertRegExp('/I know you not/i', $status);
	}

}