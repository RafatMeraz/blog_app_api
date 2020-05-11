<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    protected $table = 'posts';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = true;
    protected $primaryKey = 'id';
}
