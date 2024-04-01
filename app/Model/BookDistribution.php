<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookDistribution extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'book_distribution';
    protected $fillable = [
        'id_book',
        'id_read_ticket',
        'date_issue',
        'return_date',
        'status'
    ];
}