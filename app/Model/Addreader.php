<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addreader extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'readers';
    protected $fillable = [
        'surname',
        'patronymic',
        'gender',
        'phone'
    ];
}