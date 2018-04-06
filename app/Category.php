<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
    ];

    public function blogs()
    {
        return $this->belongsToMany(Blog::class);
    }

    public function published_blogs()
    {
        return $this->belongsToMany(Blog::class)
            ->where('status', '=', 'Published')
            ->whereDate('publish_date', '<=', date('Y-m-d'));
    }

}
