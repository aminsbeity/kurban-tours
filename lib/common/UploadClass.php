<?php
/**
 * @author Mohammad Skafi webmaster@hackspirit.com
 * @link www.hackspirit.com
 * @copyright 2009 dowgroup
 *
 */
class UploadClass {
	
	function __construct() {
	
	}
	
	/**
	 * Enter description here...
	 *
	 * @param unknown_type $control => this is the input file name
	 * @param unknown_type $file_type_arr => an array contains the file types
	 * @param unknown_type $file_dir => the directory where the file should be uploaded
	 * @return unknown
	 */
	function uploadFile($control, $file_type_arr, $file_dir) {
		if (! empty ( $_FILES [$control] ['name'] )) {
			if ($_FILES [$control] ['error'] == 0) {
				$ext = strtolower ( strrchr ( $_FILES [$control] ['name'], '.' ) );
				
				if (in_array ( $ext, $file_type_arr )) {
					if ($_FILES [$control] ['size'] > 0) {
						$new_document = $rand_name = rand ( 1000, 9999 ) . "_" . rand ( 1000, 9999 ) . "_" . rand ( 1000, 9999 ) . $ext;
						
						while ( is_file ( $file_dir . $new_document ) ) {
							$new_document = $rand_name = rand ( 1000, 9999 ) . "_" . rand ( 1000, 9999 ) . "_" . rand ( 1000, 9999 ) . $ext;
						}
						
						if ((move_uploaded_file ( $_FILES [$control] ['tmp_name'], $file_dir . $new_document ))) {
							return $new_document;
						}
					}
				}
			}
		}
	
	}
	
	function uploadImage($control_name, $filedir, $img_array) {
		
		if (empty ( $_FILES [$control_name] ['name'] )) {
			return 1;
		}
		
		if ($_FILES [$control_name] ['error'] != 0) {
			return 2;
		}
		
		$limited_ext = array (".jpg", ".jpeg", ".png", ".gif" );
		
		$ext = strtolower ( strrchr ( $_FILES [$control_name] ['name'], '.' ) );
		
		if (! in_array ( $ext, $limited_ext )) {
			return 3;
		}
		
		if ($_FILES [$control_name] ['size'] < 0) {
			return 4;
		}
		
		$new_file_name = rand ( 100000, 999999 ) . $ext;
		
		while ( is_file ( $filedir . $new_file_name ) ) {
			$new_file_name = rand ( 100000, 999999 ) . $ext;
		}
		
		if (! (move_uploaded_file ( $_FILES [$control_name] ['tmp_name'], $filedir . $new_file_name ))) {
			return 5;
		}
		
		for($row = 0; $row < sizeof ( $img_array ); $row ++) {
			$this->resizeImage ( $img_array [$row] [0], $img_array [$row] [1], $img_array [$row] [2], $ext, $filedir, $new_file_name );
		}
		
		return ($new_file_name);
	}
	
	function resizeImage($widthreq, $heightreq, $prefix, $ext, $filedir, $new_file_name) {
		
		$source_img = $filedir . $new_file_name;
		$thumb_img = $filedir . $prefix . $new_file_name;
		
		$sizes = getimagesize ( $filedir . $new_file_name );
		
		$ow = $sizes [0];
		$oh = $sizes [1];
		
		if ($ow >= $widthreq) {
			$new_width = $widthreq;
			$new_height = ($oh * $new_width) / $ow;
		}
		
		if ($oh >= $heightreq) {
			$new_height = $heightreq;
			$new_width = ($ow * $new_height) / $oh;
		}
		
		if ($ow <= $widthreq) {
			$new_width = $ow;
			$new_height = $oh;
		}
		
		if ($oh <= $heightreq) {
			$new_height = $oh;
			$new_width = $ow;
		}
		
		if ($new_width > $widthreq) {
			$new_width = $widthreq;
			$new_height = ($oh * $new_width) / $ow;
		}
		
		if ($new_height > $heightreq) {
			$new_height = $heightreq;
			$new_width = ($ow * $new_height) / $oh;
		}
		
		$dest_img = imagecreatetruecolor ( $new_width, $new_height ) or die ( 'Problem In Creating image' );
		switch ($ext) {
			case '.gif' :
				$src_img = imagecreatefromgif ( $source_img );
				break;
			case '.jpg' :
				$src_img = imagecreatefromjpeg ( $source_img );
				break;
			case '.jpeg' :
				$src_img = imagecreatefromjpeg ( $source_img );
				break;
			case '.png' :
				$src_img = imagecreatefrompng ( $source_img );
				break;
		}
		
		if (function_exists ( 'imagecopyresampled' )) {
			imagecopyresampled ( $dest_img, $src_img, 0, 0, 0, 0, $new_width, $new_height, ImageSX ( $src_img ), ImageSY ( $src_img ) ) or die ( 'Problem In resizing' );
		} else {
			imagecopyresized ( $dest_img, $src_img, 0, 0, 0, 0, $new_width, $new_height, ImageSX ( $src_img ), ImageSY ( $src_img ) ) or die ( 'Problem In resizing' );
		}
		imagejpeg ( $dest_img, $thumb_img, 90 ) or die ( 'Problem In saving' );
		imagedestroy ( $dest_img );
	
	}
	
	/**
	 * This function is able to upload multiple images at the same time
	 * It will create three copy of images (small, medium, original)
	 *
	 * @param array $control_name 
	 * @param string $filedir
	 * @param array $img_array
	 * @return array
	 */
	function uploadMultipleImage($control_name, $filedir) {
		$arrayKey = 0;
		$img_array = array (array (800, 600, "" ), array (300, 225, "med_" ), array (120, 90, "small_" ) );
		// this array will contain the uploaded images name;
		$uploadedImages = array ();
		extract ( $_POST );
		foreach ( $_FILES [$control_name] ["name"] as $key => $error ) {
			if (empty ( $_FILES [$control_name] ['name'] [$key] )) {
				//$uploadedImages[$arrayKey] = "EMPTY";
				//$arrayKey++;				
				continue;
			}
			
			if ($_FILES [$control_name] ['error'] [$key] != 0) {
				continue;
			}
			
			$limited_ext = array (".jpg", ".jpeg", ".png", ".gif" );
			
			$ext = strtolower ( strrchr ( $_FILES [$control_name] ['name'] [$key], '.' ) );
			
			if (! in_array ( $ext, $limited_ext )) {
				continue;
			}
			
			if ($_FILES [$control_name] ['size'] [$key] < 0) {
				continue;
			}
			
			$new_file_name = rand ( 100000, 999999 ) . $ext;
			
			while ( is_file ( $filedir . $new_file_name ) ) {
				$new_file_name = rand ( 100000, 999999 ) . $ext;
			}
			
			if (! (move_uploaded_file ( $_FILES [$control_name] ['tmp_name'] [$key], $filedir . $new_file_name ))) {
				$msg .= "<br>Cannot upload " . $_FILES [$control_name] ['tmp_name'] [$key];
			}
			
			for($row = 0; $row < sizeof ( $img_array ); $row ++) {
				$this->resizeImage ( $img_array [$row] [0], $img_array [$row] [1], $img_array [$row] [2], $ext, $filedir, $new_file_name );
			}
			$photo_source = $new_file_name;
			$uploadedImages [$arrayKey] = $photo_source;
			$arrayKey ++;
		}
		return $uploadedImages;
	}
	
	/**
	 * This function is able to upload multiple images at the same time
	 * It will create three copy of images (small, medium, original)
	 *
	 * @param array $control_name 
	 * @param string $filedir
	 * @param array $img_array
	 * @return array
	 */
	function specialUpload($control_name, $filedir) {
		$arrayKey = 0;
		$img_array = array (array (800, 600, "big/" ), array (300, 225, "previews/" ), array (120, 90, "thumbnails/" ) );
		// this array will contain the uploaded images name;
		$uploadedImages = array ();
		extract ( $_POST );
		foreach ( $_FILES [$control_name] ["name"] as $key => $error ) {
			if (empty ( $_FILES [$control_name] ['name'] [$key] )) {
				//$uploadedImages[$arrayKey] = "EMPTY";
				//$arrayKey++;				
				continue;
			}
			
			if ($_FILES [$control_name] ['error'] [$key] != 0) {
				continue;
			}
			
			$limited_ext = array (".jpg", ".jpeg", ".png", ".gif" );
			
			$ext = strtolower ( strrchr ( $_FILES [$control_name] ['name'] [$key], '.' ) );
			
			if (! in_array ( $ext, $limited_ext )) {
				continue;
			}
			
			if ($_FILES [$control_name] ['size'] [$key] < 0) {
				continue;
			}
			
			$new_file_name = rand ( 100000000, 999999999 ) . $ext;
			
			while ( is_file ( $filedir . $new_file_name ) ) {
				$new_file_name = rand ( 100000000, 999999999 ) . $ext;
			}
			
			if (! (move_uploaded_file ( $_FILES [$control_name] ['tmp_name'] [$key], $filedir . $new_file_name ))) {
				$msg .= "<br>Cannot upload " . $_FILES [$control_name] ['tmp_name'] [$key];
			}
			
			for($row = 0; $row < sizeof ( $img_array ); $row ++) {
				$this->resizeImage ( $img_array [$row] [0], $img_array [$row] [1], $img_array [$row] [2], $ext, $filedir, $new_file_name );
			}
			$photo_source = $new_file_name;
			$uploadedImages [$arrayKey] = $photo_source;
			$arrayKey ++;
			//remove the uploaded image from the temperory folder since it's copied to 3 images.
			if (is_file ( $filedir . $new_file_name )) {
				unlink ( $filedir . $new_file_name );
			}
		}
		return $uploadedImages;
	}
}

?>