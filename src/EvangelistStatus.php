<?php

namespace EvangelistStatus;
use GuzzleHttp\Client;

class EvangelistStatus {

	private $username;
	private $queryUrl;

	public function __construct($username) {
		$this->username = $username;
		$this->queryUrl = GitHubAPI::getQueryURL($username);
	}

	public function getStatus() {
		$userIsValid = UserValidation::verifyUsername($this->username);
		if ($userIsValid) {
			$repos = $this->getRepos();
			if ($repos >= 21) {
				$status = "Yeah, I crown you Senior Evangelist. Thanks for making the world a better place";
			}
			else if ($repos > 10 && $repos < 21) {
				$status = "Keep Up The Good Work, I crown you Associate Evangelist";
			}
			else if ($repos > 4 && $repos < 10) {
				$status = "Damn It!!! Please make the world better, Oh Ye Prodigal Junior Evangelist";
			}
		}
		else {
			$status = "I know you not!";
		}
		return $status;
	}

	private function getRepos() {
		$client = new Client();
		$res = $client->request('GET', $this->queryUrl, ['exceptions' => false]);
		$result = json_decode($res->getBody(), true);
		return $result['public_repos'];
	}
}