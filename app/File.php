<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{


    protected $guarded = ['id'];

    protected $hidden = ['password'];

    protected $convertibleExtensions = ['jpg', 'png'];

    protected $casts = [
        'valid_until' => 'datetime'
    ];

    protected $appends = ['is_convertible'];

    public function getUrl()
    {
        return url('/download-png/' . $this->hash);
    }

    public function getIsConvertibleAttribute()
    {
        return in_array(strtolower($this->original_extension), $this->convertibleExtensions);
    }
}
