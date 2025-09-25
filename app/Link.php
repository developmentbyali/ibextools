<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{

    protected $guarded = ['id'];

    protected $appends = ['full_url'];

    public function getFullUrlAttribute()
    {
        return url($this->uuid);
    }

    public function visits()
    {
        return $this->hasMany(Visit::class, 'link_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
