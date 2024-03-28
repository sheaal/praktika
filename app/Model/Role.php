<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_role'; // Указываем первичный ключ таблицы roles

    protected $fillable = [
        'role_title',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'users', 'id_role', 'id_role');
    }
}
