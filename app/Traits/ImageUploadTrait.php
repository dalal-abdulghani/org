<?php

namespace App\Traits;

use Intervention\Image\Facades\Image;

trait ImageUploadTrait
{
    protected $image_path  = "images/covers";
    protected $img_height = 600;
    protected $img_width = 600;

    public function uploadImage($img)
    {
        $img_name = $this->imageName($img);

        Image::make($img)
            ->resize($this->img_width, $this->img_height)
            ->save(public_path($this->image_path . '/' . $img_name));

        return $this->image_path . '/' . $img_name;
    }

    public function imageName($image)
    {
        return time() . '-' . $image->getClientOriginalName();
    }
}
