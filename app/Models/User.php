<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Post;
use App\Models\Role;
use App\Models\Photo;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function post(){
        return $this->hasOne(Post::class);
    }
    public function posts(){
        return $this->hasMany(Post::class);
    }

    
    public function photos(){
        return $this->morphMany(Photo::class, 'imageable');
    }
    
    public function roles(){
        return $this->belongsToMany(Role::class)->withTimestamps();
        
        //customize table names and columns
        // return $this->belongsToMany(Role::class, ['user_roles', 'user_id', 'role_id'] );
    }
    public function getNameAttribute($value){
        return ucfirst($value);
    }
    
    public function setNameAttribute($value){
        return $this->attributes['name'] = strtoupper($value);
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
