<?php

namespace App\Traits;

use Illuminate\Support\Str;
use App\Models\Presence;

trait TakePhoto
{
    public function takePicture(Presence $presence, $photo)
    {        
        if ($photo) {
            list($type, $data) = explode(';', $photo);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);

            $type = explode(';', $photo)[0];
            $type = explode('/', $type)[1];

            $filename = Str::random(10) . '_' . time() . '.' . $type;
            $path = public_path() . '/img/' . $filename;
            $presence->photo = 'img/' . $filename;
        }
    }
}
