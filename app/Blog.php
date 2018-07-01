<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Blog
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Category[] $categories
 * @property-read \App\User $user
 * @mixin \Eloquent
 * @property int $id
 * @property string $publish_date
 * @property string $status
 * @property string $title
 * @property string $blog_text
 * @property string $image
 * @property string $alt_text
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property int|null $user_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog whereAltText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog whereBlogText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog wherePublishDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog whereUserId($value)
 */
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


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
