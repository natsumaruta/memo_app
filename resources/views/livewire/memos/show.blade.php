<?php

use function Livewire\Volt\{state};
use App\Models\Memo;

//ルートモデルバインディング
//$memoはMemoクラスの形で返されるようにしている。なぜかというと本当はmount関数の中でID何番目のメモを持ってくるか書き入れないといけないが、流れは、state([③'memo'=>①fn(Memo $memo)=>②$memo])
// 詳しく書くと、state(['memo' => function (Memo $memo) {return $memo;}]);
state(['memo' => fn(Memo $memo) => $memo]);

?>

<div>
    <a href="{{ route('memos.index') }}">戻る</a>
    <h1>{{ $memo->title }}</h1>
    <p>{!! nl2br(e($memo->body)) !!}</p>
</div>
