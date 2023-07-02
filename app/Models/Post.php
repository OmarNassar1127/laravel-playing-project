<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $directory = "/images/";

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title',
        'body',
        'path',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function photos(){
        return $this->morphMany(Photo::class, 'imageable');
    }

    public function tags(){
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public static function scopeLatest($query){
        return $query->orderBy('id', 'asc')->get();
    }

    public function getPathAttribute($value){

        return $this->directory . $value;

    }
    
}
