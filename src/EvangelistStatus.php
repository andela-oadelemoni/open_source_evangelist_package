<?php

namespace Kamiye\OpenSource;
use GuzzleHttp\Client;

class EvangelistStatus {

	private $username;

	public function __construct($username) {
		$this->username = $username;
	}

	public function getStatus() {
		GitHub::verifyUsername($this->username);
		$repos = GitHub::getUserRepos($this->username);
		if ($repos >= 21) {
			$status = "Yeah, I crown you Senior Evangelist. Thanks for making the world a better place";
		}
		else if ($repos > 10 && $repos < 21) {
			$status = "Keep Up The Good Work, I crown you Associate Evangelist";
		}
		else if ($repos > 4 && $repos < 10) {
			$status = "Damn It!!! Please make the world better, Oh Ye Prodigal Junior Evangelist";
		}
		else {
			$status = "New convert!!. You need to grow soon!";
		}
		return $status;
	}

	
}