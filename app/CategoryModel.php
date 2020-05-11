<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    protected $table = 'category';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = false;
    protected $primaryKey = 'id';
}
