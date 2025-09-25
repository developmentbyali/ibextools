<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{

    protected $guarded = ['id'];

    protected $casts = [
        'metadata' => 'array'
    ];

    public function link()
    {
        return $this->belongsTo(Link::class);
    }
}
