<?php

class YoutubeController {
	
	function __construct() {
	
	}
	
	/**
	 * http://www.youtube.com/watch?v=OlMwWocDxXI
	 *
	 * @param unknown_type $url
	 */
	private function getVideoID($url) {
		$equalSplit = split ( "=", $url );
		$videoId = $equalSplit [1];
		if (strpos ( $videoId, "&" )) {
			$lastSplit = split ( "&", $videoId );
			$videoId = $lastSplit [0];
		}
		return $videoId;
	}
	
	public function getYoutubeEmbed($url) {
		if ($url == "") {
			return "";
		}
		
		$v = $this->getVideoID ( $url );
		if ($v == "") {
			return;
		}
		$embed = '<object width="660" height="450">
					<param name="movie" value="http://www.youtube.com/v/'.$v.'&hl=en_US&fs=1&"></param>
					<param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param>
					<embed src="http://www.youtube.com/v/'.$v.'&hl=en_US&fs=1&" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="false" width="660" height="450"></embed>
				</object>';
		
		return $embed;
	}
}

?>