<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    protected $table='posts';
    protected $primaryKey='id';
    protected $fillable=['title','body'];
    use SoftDeletes;
    protected $date=['deleted_at'];
    protected $directory='/images/';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function photos()
    {
        return $this->morphMany(Photo::class,'imageable');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class,'tagable');
    }

    //Accessor
    public function getTitleAttribute($value)
    {
        return strtolower($value);
    }

    //Mutator
    public function setTitleAttribute($value)
    {
        $this->attributes['title']=strtolower($value);
    }

    public function getPathAttribute($value)
    {
        return $this->directory.$value;
    }
}
