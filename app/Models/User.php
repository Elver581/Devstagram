<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username'
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

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function pots()
    {
        return $this->hasMany(Post::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    //Almacena Seguidores de un usuario

    public function follewers(){
        return $this->belongsToMany(User::class,'follewers','user_id','follower_id');
    }
    public function follewings(){
        return $this->belongsToMany(User::class,'follewers','follower_id','user_id');
    }


        // Almacena los que seguimos


    //Comprobar sin usuario ya sigue a otro

    public function siguiendo(User  $user){
        return $this->follewers()->get()->contains('id', $user->id);
    }
    // Almacena los que seguimos
}
