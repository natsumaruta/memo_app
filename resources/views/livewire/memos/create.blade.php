<?php

use function Livewire\Volt\{state, rules};
use App\Models\Memo;

state(['title', 'body', 'priority' => 1]);

//バリデーションルールを定義
rules([
    //required:
    //チェック内容を増やしたいときは|で追加
    'title' => 'required|string|max:50',
    'body' => 'required|string|max:2000',
    'priority' => 'required|integer|min:1|max:3',
]);

//メモを保存する関数
$store = function () {
    //バリデーションチェック
    $this->validate();

    //フォームから入力値をデータベースへ保存
    Memo::create($this->all());
    return redirect()->route('memos.index');
};
//カラム => 入力値
// ['title' => $this->title,
// 'body' => $this->body,]
?>

<div>
    <a href="{{ route('memos.index') }}">戻る</a>
    <h1>新規登録</h1>
    <form wire:submit="store">
        <p>
            {{-- for属性とid属性で紐付け 、実際の入力値はwire:model="title" --}}
            <label for="title">タイトル</label>
            {{-- タイトルにエラーがあったときエラーメッセージを表示 --}}
            @error('title')
                <span class="error">({{ $message }})</span>
            @enderror
            <br>
            <input type="text" wire:model="title" id="title">
        </p>
        <p>
            <label for="body">本文</label>
            {{-- 本文にエラーがあったときエラーメッセージを表示 --}}
            @error('body')
                <span class="error">({{ $message }})</span>
            @enderror
            <br>
            <textarea wire:model="body" id="body"></textarea>
        </p>
        <p>
        <label for="priority">優先度</label>
            {{-- 優先度にエラーがあったときエラーメッセージを表示 --}}
            @error('priority')
                <span class="error">({{ $message }})</span>
            @enderror
            <br>
            <select wire:model="priority" id="priority">
            <option value="1">低</option>
            <option value="2">中</option>
            <option value="3">高</option>
            </select>
        </p>
        <button type="submit">登録</button>
    </form>
</div>
