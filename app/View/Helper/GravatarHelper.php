<?php
class GravatarHelper extends AppHelper {
/**
 * Generates a hashed gravatar url given an email.
 * 
 * Remember to append a size, like `&s=200`.
 * 
 * @return string
 */
	public function getUrl($email) {
		$hash = md5( strtolower( trim( $email ) ) );
		$url = 'http://www.gravatar.com/avatar/' . $hash . '?d=wavatar';
		return $url;
	}
}
