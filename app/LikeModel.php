<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikeModel extends Model
{
    protected $table = 'likes';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = false;
    protected $primaryKey = 'id';
}
