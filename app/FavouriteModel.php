<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FavouriteModel extends Model
{
    protected $table = 'favourites';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = false;
    protected $primaryKey = 'id';
}
