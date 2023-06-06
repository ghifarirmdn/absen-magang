<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

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
            file_put_contents($path, $data);

            return Session::flash('message', 'Foto berhasil disimpan!');
        }else{
            Session::flash('message', 'Foto gagal disimpan!');
            Session::flash('alert-class', 'alert-danger');
            
            return redirect()->back();
        }
    }
}
