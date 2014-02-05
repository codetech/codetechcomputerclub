<?php
App::uses('Component', 'Controller');
class PicturesqueComponent extends Component {

/**
 * Creates an image at a specified path.
 * 
 * If there is already a file at the path, it will not be overridden,
 * unless the `overwrite` option is set to true.
 * 
 * @params string $text Text to display.
 * @params string $filename Filename to use when saving the image to img/tmp
 * @params array $options Options for the image.
 * @return string Path to file.
 */
	public function createText($text, $filename, $folder, $options = array()) {
		
		// Create a directory for the image, if it doesn't exist already.
		$folderToMake = WWW_ROOT . 'img' . DS . $folder;
		if (!file_exists($folderToMake)) {
			mkdir(WWW_ROOT . 'img' . DS . $folder);
		}
		
		// Prepare the paths for image.
		$returnPath = $folder . DS . $filename;
		$path = WWW_ROOT . 'img' . DS . $returnPath;
		
		// Check to see if an existing image would be overridden. If so, bail.
		$overwrite = empty($options['overwrite']) ? false : $options['overwrite'];
		if (!$overwrite && file_exists($path)) {
			return $returnPath;
		}
		
		// Handle options.
		$fontFace = WWW_ROOT . 'fonts' . DS;
		if (empty($options['fontFace'])) {
			$fontFace .= 'dejavusans' . DS . 'dejavusans.ttf';
		} else {
			$fontFace .= $options['fontFace'];
		}
		$fontSize = empty($options['fontSize']) ? 12 : $options['fontSize'];
		$rgb = empty($options['rgb']) ? array(0, 0, 0) : $options['rgb'];
		$width = empty($options['width']) ? 100 : $options['width'];
		$height = empty($options['height']) ? 62 : $options['height'];
		$x = empty($options['x']) ? 10 : $options['x'];
		$y = empty($options['y']) ? 20 : $options['y'];
		
		header('Content-Type: image/png');
		
		// Create the image.
		$img = imagecreatetruecolor($width, $height);
		
		// Use transparency.
		imagealphablending($img, false);
		imagesavealpha($img, true);
		
		// Use a transparent background.
		$transparentIndex = imagecolorallocatealpha($img, 255, 255, 255, 127);
		imagefill($img, 0, 0, $transparentIndex);
		
		// Create the font's color.
		$color = imagecolorallocate($img, $rgb[0], $rgb[1], $rgb[2]);

		// Add the text.
		imagettftext($img, $fontSize, 0, $x, $y, $color, $fontFace, $text);
		
		// Save the image
		imagepng($img, $path);
		imagedestroy($img);
		
		return $returnPath;
	}
	public function userPreset($text, $filename, $id){
		return $this->createText(
			$text,
			$filename .'.png',
			'users' . DS . $id,
			array(
				//'overwrite' => true, // Uncomment for testing.
				'fontFace' => 'DejaVuSansMono/dvsm.ttf',
				'fontSize' => 11,
				'rgb' => array(71, 79, 81),
				'width' => 11 * strlen($text),
				'height' => 20,
				'x' => 3,
				'y' => 15
			)
		);
	}
}
