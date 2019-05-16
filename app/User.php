<?php

namespace App;

use App\Model\Article;
use Hash;
use Illuminate\Notifications\Notifiable;



use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const ROLE_ADMIN = 'admin';
    const ROLE_USER = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }


    public static function getRoles ()
    {
        return [
            'Пользователь'=> self::ROLE_USER,
            'Админестратор' => self::ROLE_ADMIN
        ];
    }

    public static function register($data)
    {

        return self::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => self::ROLE_USER
        ]);

    }

    public static function add($data)
    {
        return self::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role']
        ]);
    }

    public function isAdmin()
    {
        return $this->role == self::ROLE_ADMIN;
    }

    public function isUser()
    {
        return $this->role == self::ROLE_USER;
    }
}
