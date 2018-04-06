<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    static public $rules = [
        'publish_date' => 'date_format:"d-m-Y',
        'title' => 'required|max:200',
        'image' => 'required|max:200',
        'alt_text' => 'required|max:200',
        'blog_text' => 'required',
        'status' => 'required',
        ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
