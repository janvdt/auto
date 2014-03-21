<?php

use Symfony\Component\HttpFoundation\File\File as SymfonyFile;

class ImageController extends BaseController {

	/**
	 * The current image model.
	 *
	 * @var Image
	 */
	protected $image;

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$images = new Image;

		// If a search was performed.
		if (Input::get('search')) {
			$images = $images->where('title', 'like', '%' . Input::get('search') . '%');
		}

		// Filter images.
		$images = $images->orderBy('created_at', 'desc')->take(10)->get();

		// Return the response as a table view.
		return View::make('file.image.table')->with('images', $images);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Symfony\Component\HttpFoundation\File\File $file
	 * @return Image
	 */
	public function store($file)
	{
		$this->image = new Image;

		$this->image->type = $file->getExtension();
		$this->image->title = $file->getBasename('.' . $file->getExtension());
		$this->image->created_by = Auth::user()->id;
		$this->image->updated_by = Auth::user()->id;

		$this->image->save();

		// Save the original image size.
		$this->createSize($file);

		// Save the thumb size.
		$this->createSize($file, 'thumb', array('square' => 250));

		// Save the medium size.
		$this->createSize($file, 'medium', array('width' => '500', 'height' => '500'));

		return $this->image;
	}

	/**
	 * Creates a new image size object in the database.
	 *
	 * @return void
	 */
	protected function createSize($file, $type = 'original', array $modifications = array())
	{
		// Set pathname.
		$pathname = $file->getPath() . '/' . $file->getFilename();

		// If it's not the original image, copy the image to a separate
		// folder and set a new file object.
		if ($type !== 'original') {
			// New path for size type.
			$new_path = $file->getPath() . '/' . $type;

			// If the folder doesn't exists yet, create it.
			if (!File::exists($new_path)) {
				File::makeDirectory($new_path);
			}

			// New pathname.
			$new_pathname = $new_path . '/' . $file->getFilename();

			// Copy file to size type folder.
			File::copy($pathname, $new_pathname);

			// Set the new pathname.
			$pathname = $new_pathname;

			// Refresh file object.
			$file = new SymfonyFile($pathname);
		}

		// Set an image handler object.		
		$imageHandler = ImageHandler::make($pathname);

		// If the image needs to be modified.
		if ($modifications) {
			// If the image needs to be square.
			if (array_key_exists('square', $modifications)) {
				$imageHandler->grab($modifications['square']);
			}

			// If the image must be resized. 
			elseif (array_key_exists('width', $modifications) || array_key_exists('height', $modifications)) {
				$width = array_key_exists('width', $modifications) ? $modifications['width'] : null;
				$height = array_key_exists('height', $modifications) ? $modifications['height'] : null;
				$imageHandler->resize($width, $height, true, false);
			}

			// Save modified image.
			$imageHandler->save($pathname);

			// Refresh file object.
			$file = new SymfonyFile($pathname);
		}

		// Clear stat cache for previous file.
		clearstatcache();

		// Create an new image size object.
		$size = new Size;

		$size->image_id = $this->image->id;
		$size->type = $type;
		$size->name = $file->getFilename();
		$size->path = $file->getPath();
		$size->mime = $file->getMimeType();
		$size->size = filesize($pathname);
		$size->width = $imageHandler->width;
		$size->height = $imageHandler->height;

		// Save the image size to the database.
		$size->save();
	}

	
}