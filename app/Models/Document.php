<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{   
   
    protected $table = 'documents';
    protected $fillable = [
        'category_id', 'title','contents', 'ano_exercicio'
    ];
}
