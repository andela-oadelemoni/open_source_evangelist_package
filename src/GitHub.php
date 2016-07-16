<?php
namespace Kamiye\OpenSource;
use GuzzleHttp\Client;

class GitHub {

	const GITURL = 'https://api.github.com/users/';
	const ACCESS_TOKEN = '?access_token=c77ec6ac9242a4e61554faff544d3c6a8afa1562'; // enter github access token here

	private static function getQueryURL($username) {
		return self::GITURL.$username.self::ACCESS_TOKEN;
	}

	// Method to verify entered username from GitHub
	public static function verifyUsername($username) {
		// define guzzle client
		$client = new Client();
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
		$client = new Client();
		$url = self::getQueryURL($username);
		$res = $client->request('GET', $url, ['exceptions' => false]);
		$result = json_decode($res->getBody(), true);
		return $result['public_repos'];
	}
}