<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Src\Auth\IdentityInterface;
use Src\Request;
use Src\View;

class User extends Model implements IdentityInterface
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'surname',
        'name',
        'patronymic',
        'read_address',
        'phone',
        'login',
        'password'
    ];

    protected static function booted()
    {
        static::created(function ($user) {
            $user->password = md5($user->password);
            $user->save();
        });
    }

    public function findIdentity(int $id)
    {
        return self::where('id_read_ticket', $id)->first();
    }

    //Возврат первичного ключа
    public function getId(): int
    {
        return $this->id_read_ticket;
    }

    //Возврат аутентифицированного пользователя
    public function attemptIdentity(array $credentials)
    {
        return self::where(['login' => $credentials['login'],
            'password' => md5($credentials['password'])])->first();
    }

    public function signup(Request $request): string
    {
        if ($request->method === 'POST' && User::create($request->all())) {
            app()->route->redirect('/go');
        }
        return new View('site.signup');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'roles', 'id_role', 'id_role');
    }
}
