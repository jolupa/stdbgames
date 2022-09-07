<?php
	namespace App\Libraries;

	class imageProcess {
		// Function to convert the images that go in the games overview head
		// @param file = string The image from the form
		// @param name = string The game slug we use to rename the images
		public function gameimagehead (string $file, string $name) {
			// We look if the file exists to delete it and upload the new one
			if (file_exists (ROOTPATH.'public/assets/images/games/'.$name.'.jpeg')) {
				unlink (ROOTPATH.'public/assets/images/games/'.$name.'.jpeg');
			}
			$image = \Config\Services::image ('gd')->withFile ($file)
													->resize (1920, 1080, true, 'width')
													->convert (IMAGETYPE_JPEG)
													->save (ROOTPATH.'public/assets/images/games/'.$name.'.jpeg');
			return $name;
		}
	}

 ?>
