<?php

namespace App\Http\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

trait FileTrait {

    /**
     * Save file function.
     */
    public function fileUpload(array | object $images, string $path): string {
        $imageName = '';

        if (gettype($images) === 'array') {
            foreach ($images as $image) {
                $newName = Carbon::now()->timestamp . random_int(0, 20) . '.' . $image->extension();
                $imageName .= $newName . ' ';
                $image->storeAs('public/' . $path . '/', $newName);
            }
            $imageName = rtrim($imageName);
        } else {
            $imageName .= Carbon::now()->timestamp . '1.' . $images->extension();
            $images->storeAs('public/' . $path . '/', $imageName);
        }
        return $imageName;
    }

    /**
     * Delete file function.
     */
    public function fileDestroy(array | string $images, string $path): bool {
        if (gettype($images) === 'array') {
            foreach ($images as $image) {
                if (Storage::exists('public/' . $path . '/' . $image)) {
                    Storage::delete('public/' . $path . '/' . $image);
                }
            }
            return true;
        } else {
            if (Storage::exists('public/' . $path . '/' . $images)) {
                return Storage::delete('public/' . $path . '/' . $images);
            }
        }
        return false;
    }
}
