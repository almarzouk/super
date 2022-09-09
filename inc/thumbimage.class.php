<?php
// thumbimage.class.php
class ThumbImage
{
    private $source;
 
    public function __construct($sourceImagePath)
    {
        $this->source = $sourceImagePath;
    }
 
    public function createThumbjpg($destImagePath, $thumbWidth=100)
    {
        $sourceImage = imagecreatefromjpeg($this->source);
        $orgWidth = imagesx($sourceImage);
        $orgHeight = imagesy($sourceImage);
        $thumbHeight = floor($orgHeight * ($thumbWidth / $orgWidth));
        $destImage = imagecreatetruecolor($thumbWidth, $thumbHeight);
        imagecopyresampled($destImage, $sourceImage, 0, 0, 0, 0, $thumbWidth, $thumbHeight, $orgWidth, $orgHeight);
        imagejpeg($destImage, $destImagePath);
        imagedestroy($sourceImage);
        imagedestroy($destImage);
    }
	
	public function createThumbpng($destImagePath, $thumbWidth=100)
    {
        $sourceImage = imagecreatefrompng($this->source);
        $orgWidth = imagesx($sourceImage);
        $orgHeight = imagesy($sourceImage);
        $thumbHeight = floor($orgHeight * ($thumbWidth / $orgWidth));
        $destImage = imagecreatetruecolor($thumbWidth, $thumbHeight);
        imagecopyresampled($destImage, $sourceImage, 0, 0, 0, 0, $thumbWidth, $thumbHeight, $orgWidth, $orgHeight);
        imagepng($destImage, $destImagePath);
        imagedestroy($sourceImage);
        imagedestroy($destImage);
    }
}