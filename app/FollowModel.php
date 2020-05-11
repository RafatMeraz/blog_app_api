<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FollowModel extends Model
{
    protected $table = 'follow';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = false;
    protected $primaryKey = 'id';
}
