<?php

use function Livewire\Volt\{state};
use App\Models\Memo;

//ルートモデルバインディング
//$memoはMemoクラスの形で返されるようにしている。なぜかというと本当はmount関数の中でID何番目のメモを持ってくるか書き入れないといけないが、流れは、state([③'memo'=>①fn(Memo $memo)=>②$memo])
// 詳しく書くと、state(['memo' => function (Memo $memo) {return $memo;}]);
state(['memo' => fn(Memo $memo) => $memo]);

//編集ページにリダイレクト
$edit = function () {
    return redirect()->route('memos.edit', $this->memo);
};

//削除の関数
$destroy = function () {
    $this->memo->delete();
    return redirect()->route('memos.index');
};

?>

<div>
    <a href="{{ route('memos.index') }}">戻る</a>
    <h1>{{ $memo->title }}</h1>
    <p>{!! nl2br(e($memo->body)) !!}</p>
    <p><strong>優先度：</strong>{{ $memo->priority_text }}</p>

    <button wire:click="edit">編集する</button>
    <button wire:click="destroy" wire:confirm="本当に削除しますか？">削除する</button>
</div>
