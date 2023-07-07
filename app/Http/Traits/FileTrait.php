<?php

namespace App\Http\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

trait FileTrait {
    public function fileUpload(array | object $images): string{
        $imageName = '';
        if (gettype($images) === 'array') {
            foreach ($images as $image) {
                $newName = Carbon::now()->timestamp . random_int(0, 20) . '.' . $image->extension();
                $imageName .= $newName . ' ';
                $image->storeAs('public/products', $newName);
            }
            $imageName = rtrim($imageName);
        } else {
            $imageName .= Carbon::now()->timestamp . '1.' . $images->extension();
            $images->storeAs('public/products', $imageName);
        }
        return $imageName;
    }

    public function fileDestroy(array | string $images): bool {
        if (gettype($images) === 'array') {
            foreach ($images as $image) {
                if (Storage::exists('public/products/' . $image)) {
                    Storage::delete('public/products/' . $image);
                }
            }
            return true;
        } else {
            if (Storage::exists('public/products/' . $images)) {
                return Storage::delete('public/products/' . $images);
            }
        }
        return false;
    }

}
