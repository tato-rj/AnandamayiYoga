<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait InteractsWithCloud
{
    public function deleteImage()
    {
        if (strpos($this->image_path, 'app/demo') === false)
            Storage::disk('s3')->delete($this->image_path);        
    }

    public function deleteCover()
    {
        if (strpos($this->cover_path, 'app/demo') === false)
            Storage::disk('s3')->delete($this->cover_path);
    }

    public function deleteVideo()
    {
        if (strpos($this->video_path, 'app/demo') === false)
            Storage::disk('s3')->delete($this->video_path);
    }

    public function fileIsAvailable($file)
    {
    	return Storage::disk('s3')->exists($this->$file);
    }

    public function createThumbnail($image)
    {
        $thumbnail = \Image::make($image)->fit(200, null, function ($constraint) {
            $constraint->aspectRatio();
        })->stream();

        Storage::disk('s3')->put($this->thumbnail, $thumbnail->__toString());
    }

    public function deleteThumbnail()
    {
        if (strpos($this->thumbnail, 'app/demo') === false)
            Storage::disk('s3')->delete($this->thumbnail);
    }

    public function getThumbnailAttribute()
    {
        return preg_replace('/(\.[^.]+)$/', sprintf('%s$1', '-thumb'), $this->image_path);
    }
}
