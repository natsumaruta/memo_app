<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    //'title','body'だけ更新できるように許可する
    protected $fillable = ['title','body','priority'];

    //public：どこからでも参照できるという意味
    //呼び出すのはgetPriorityTextAttributeの間のPriorityTextをスネイクケースにして変数として扱う
    public function getPriorityTextAttribute()
    {
        //match:条件分岐をスッキリ書くための文法
        return match ($this->priority) {
            1 => '低',
            2 => '中',
            3 => '高',
            default => '不明',
        };
    }
}
