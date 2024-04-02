<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    public $timestamps = false;
    public static function all($columns = ['*'])
    {
        return static::query()->get(

            is_array($columns) ? $columns : func_get_args()
        );
    }
    protected $fillable = [
        'title',
        'id_author',
        'new_edition',
        'annotation',
        'image'
    ];

}