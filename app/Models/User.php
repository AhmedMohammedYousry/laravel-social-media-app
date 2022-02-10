<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

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
        'firstname',
        'lasttname',
        'date_of_birth',
        'gender',
        'isAdmin' ,
        'school',
        'address',
        'profilePic',
        'mobile',
        'location',
        'userid'
    ];


    public function friends()
    {
        return $this->hasMany(Friend::class,'user_id','id');
    }

    public function posts(){
        return $this->hasMany( Post::class ,'user_id','id');
    }

    public function savedposts(){
        return $this->hasMany(Savepost ::class ,'user_id','id');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'userid'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
