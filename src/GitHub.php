<?php
namespace Kamiye\OpenSource;
use GuzzleHttp\Client;

class GitHub {

	const GITURL = 'https://api.github.com/users/';
	const ACCESS_TOKEN = ''; // enter github access token here

	private static function getQueryURL($username) {
		return self::GITURL.$username.self::ACCESS_TOKEN;
	}

	private static function getConnectionClient() {
		return new Client();
	}

	// Method to verify entered username from GitHub
	public static function verifyUsername($username) {
		// define guzzle client
		$client = self::getConnectionClient();
		$url = self::getQueryURL($username);
		$res = $client->head($url, ['exceptions' => false]);

		// throw invalid username exception if user is invalid
		if ($res->getStatusCode() != 200) {
			throw new InvalidUsernameException("You have entered an invalid GitHub username");
		}
		return true;
	}

	// method to get repositories from GitHub
	public static function getUserRepos($username) {
		// define guzzle client
		$client = self::getConnectionClient();
		$url = self::getQueryURL($username);
		$res = $client->request('GET', $url, ['exceptions' => false]);
		$result = json_decode($res->getBody(), true);
		return $result['public_repos'];
	}
}