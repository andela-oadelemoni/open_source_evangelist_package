<?php

namespace EvangelistStatus;
use GuzzleHttp\Client;

class UserValidation {

	// Method to verify entered username from GitHub
	public static function verifyUsername($username) {
		// define guzzle client
		$client = new Client();
		// build URL string
		$url = GitHubAPI::getQueryURL($username);
		$res = $client->head($url, ['exceptions' => false]);
		return $res->getStatusCode() == 200;
	}
}