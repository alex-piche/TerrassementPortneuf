<?php
/*
	This is the PHP code for the How to Create Thumbnail Images using PHP Tutorial

	This script creates all of the thumbnail images and the gallery.html page.

	Note: Make sure that PHP has permission to read and write 
	to the directory in which .jpg files are stored and the directory 
	in which you're trying to create thumbnails.	
	
	You may use this code in your own projects as long as this 
	copyright is left in place.  All code is provided AS-IS.
	This code is distributed in the hope that it will be useful,
 	but WITHOUT ANY WARRANTY; without even the implied warranty of
 	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
	
	Copyright 2007 WebCheatSheet.com	
*/

function createThumbs( $pathToImages, $pathToThumbs, $thumbWidth, $thumbHeight ) 
{
  // open the directory
  $dir = opendir( $pathToImages );

  // loop through it, looking for any/all JPG files:
  while (false !== ($fname = readdir( $dir ))) {
    // parse path for the extension
    $info = pathinfo($pathToImages . $fname);
    // continue only if this is a JPEG image
    if ( strtolower($info['extension']) == 'jpg' ) 
    {
      echo "Creating thumbnail for {$fname} <br />";

      // load image and get image size
      $img = imagecreatefromjpeg( "{$pathToImages}{$fname}" );
      $width = imagesx( $img );
      $height = imagesy( $img );

      // calculate thumbnail size
      $new_width = $thumbWidth;
      $new_height = $thumbHeight; //floor( $height * ( $thumbWidth / $width ) );

      // create a new tempopary image
      $tmp_img = imagecreatetruecolor( $new_width, $new_height );

      // copy and resize old image into new image 
      imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );

      // save thumbnail into a file
      imagejpeg( $tmp_img, "{$pathToThumbs}{$fname}" );
    }
  }
  
  // close the directory
  closedir( $dir );
}

$dirs = array_filter(glob('photo/*'), 'is_dir');

foreach ($dirs as $dir)
{
	$path = explode("/",$dir)[1] . "/";
	
	if (!is_dir("thumbs/" . $path)) 
	{
		mkdir("thumbs/" . $path);    
	}
	
	createThumbs("photo/" . $path, "thumbs/" . $path, 300, 200);
}

?>