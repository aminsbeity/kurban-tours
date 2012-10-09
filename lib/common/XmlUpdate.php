<?php

class XmlUpdate {
	
	private $xmlFilename = "public/pi_player_assets/pi_player_playlist.xml";
	
	
	function __construct() {
	
	}
	
	public function updateXML($musicArray) {
		
		// create the list
		return $this->createXMLGallery ( $musicArray );
	}
	
	/**
	<?xml version="1.0" encoding="utf-8"?>
	<tn2>
		<gallery>
			<title>Gallery 1</title>
			<description>Gallery of 12 photographs</description>
			<file_root>photos/</file_root>
			<thumb_src>photos/small_default.jpg</thumb_src>
			<images>
				<image>
					<title>Photo title3</title>
					<image_src>184704.jpg</image_src>
					<thumb_src>photos/small_184704.jpg</thumb_src>
				</image>
			</images>
		</gallery>
	</tn2>
	 *
	 */
	private function createXMLGallery($musicArray) {
		
		$doc = new DOMDocument ( '1.0', 'utf-8' );
		$doc->formatOutput = true;
		
		
		$mp3player = $doc->createElement ( "mp3player" );
		$doc->appendChild ( $mp3player );
		
		foreach ( $musicArray as $mA ) {
			
			$song = $doc->createElement ( "song" );
			
			$title = $doc->createElement ( "title" );
			$title->appendChild ( $doc->createTextNode ( $mA->musicTitle ) );
			$song->appendChild ( $title );
			
			$artist = $doc->createElement ( "artist" );
			$artist->appendChild ( $doc->createTextNode ( "artist" ) );
			$song->appendChild ( $artist );
			
			$filename = $doc->createElement ( "filename" );
			$filename->appendChild ( $doc->createTextNode ( $mA->musicTrack ) );
			$song->appendChild ( $filename );
			
			$songimage = $doc->createElement ( "songimage" );
			$songimage->appendChild ( $doc->createTextNode ( "songImage" ) );
			$song->appendChild ( $songimage );
			
			$buyLink = $doc->createElement ( "buyLink" );
			$buyLink->appendChild ( $doc->createTextNode ( "buyLink" ) );
			$song->appendChild ( $buyLink );
			
			$mp3player->appendChild ( $song );
		}
		
		if ($doc->save ( $this->xmlFilename ) > 0) {
			return true;
		}
		return false;
	}
	
	public function updateFile($musicArray) {
		$File = $this->xmlFilename;
		 $Handle = fopen($File, 'w');
		 $Data = '<?xml version="1.0" encoding="utf-8" standalone="yes"?>
					<mp3player>
						<!-- ============================= -->
						<!-- Set the player settings below -->
						<!-- ============================= -->
						<options>
					
							<defaultVolume>80</defaultVolume><!-- Between 0 - 100 -->
							<playerWidth>340</playerWidth><!-- In pixels -->
							<thumbnailsDisplay>On</thumbnailsDisplay><!-- On/Off - if off it will hide the thumbnails -->
							<startSong>1</startSong><!-- Song Number -->
							<autoPlayOnStart>Off</autoPlayOnStart><!-- On/Off - if Off the player will not play automatically but will wait youto press the play button-->
							<autoLoopMode>Off</autoLoopMode><!-- On/Off - if On then when the current song finish, the next song will start play automatically -->
							<repeatMode>All</repeatMode><!-- Single/All - if Single and autoLoopMode is On then will loop the song defined in startSong -->
							<shuffleMode>On</shuffleMode>
							<!-- On/Off - if On then the player will play the songs randomly -->
							<randomPlayOnStart>On</randomPlayOnStart>
							<!-- On/Off - if On then evry time when the player is loaded it will pick the first song randomly
								/startSong option will be overwrite -->
							<buyLinkDisplay>Off</buyLinkDisplay><!-- On/Off - show/hide the BUY link -->
							<playlistButtonDisplay>On</playlistButtonDisplay><!-- On/Off - show/hide the playlist button -->
							<playerMode>Playlist</playerMode><!-- Pill/Compact/Full/Playlist - defines which mode will be the default initial mode for the player -->
							<playerColor>0x111111</playerColor><!-- Color of player -->
							<playerOpacity>100</playerOpacity><!-- Opacity of player 0-100-->
							<playerGlossy>10</playerGlossy><!-- Glossy of player -->
							<controlsColor>0xffffff</controlsColor><!-- Color of player controls -->
							<controlsOpacity>50</controlsOpacity><!-- Opacity of player controls 0-100 -->
							<controlsColorOver>0xf4e564</controlsColorOver><!-- Color of player controls when mouse is over -->
							<controlsOpacityOver>100</controlsOpacityOver><!-- Opacity of player controls when mouse is over 0-100 -->
							<glossyOpacity>10</glossyOpacity><!-- Opacity of player glossy  0-100 -->
							<playListPosition>Below</playListPosition><!-- Playlist position: Below/Above -->
							<playListHeight>182</playListHeight><!-- Playlist height -->
							<boxesOpacity>5</boxesOpacity><!-- Opacity of controls background 0-100 -->
							<boxesOpacityOver>20</boxesOpacityOver><!-- Opacity of controls background when mouse is over 0-100 -->
							<boxesColor>0xffffff</boxesColor><!-- Color of controls background and others backgrounds -->
							<boxesColorOver>0xffffff</boxesColorOver><!-- Color of controls background when mouse is over -->
							<buyAlpha>10</buyAlpha><!-- Opacity of BUY button 0-100 -->
							<buyAlphaOver>50</buyAlphaOver><!-- Opacity of BUY button when mouse is over 0-100 -->
							<buyColor>0xffffff</buyColor><!-- Color of BUY button -->
							<buyColorOver>0xff0000</buyColorOver><!-- Color of BUY button when mouse is over-->
							<ease_speed>10</ease_speed><!-- Playlist menu speed 0-100 -->
						</options>
						<!-- ============================= -->
						<!-- End of the player settings    -->
						<!-- ============================= -->
					
						<!-- ============================= -->
						<!-- Define the PLAYLIST           -->
						<!-- ============================= -->
						';
 						fwrite($Handle, $Data);
 						foreach ($musicArray as $mA){
 							$tracSource=$mA->musicTrack;
 						$Data ="
							<song>
								<title>".$mA->musicTitle."</title>
								<artist>Roger Achkar</artist>
								<filename>".$tracSource."</filename>
								
								<buyLink>http://activeden.net/user/ica</buyLink>
							</song>";
 						fwrite($Handle, $Data);
 						}
 						$Data='</mp3player>'; 
						fwrite($Handle, $Data);
		 				fclose($Handle);
	}
	
}
//
?>