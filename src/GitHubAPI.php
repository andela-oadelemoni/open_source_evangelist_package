<?php
namespace EvangelistStatus;

class GitHubAPI {

	const GITURL = 'https://api.github.com/users/';
	const ACCESS_TOKEN = ''; // enter github access token here
	
	public static function getQueryURL($username) {
		return self::GITURL.$username.self::ACCESS_TOKEN;
	}
}