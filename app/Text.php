<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
    use Sluggable;

    protected $table = 'texts';
    protected $guarded = [];


    public function isAuthor() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    public function isCategory() {
        return $this->belongsTo('App\Category', 'cat_id', 'id');
    }
    public function isComments() {
        return $this->hasMany('App\Comment', 'text_id', 'id');
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
