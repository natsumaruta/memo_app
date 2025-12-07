<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    //'title','body'だけ更新できるように許可する
    protected $fillable = ['title','body'];
}
