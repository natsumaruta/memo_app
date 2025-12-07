<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {   //memos テーブルの body カラムのあとに priority（整数）を追加して、初期値は1で、3段階の優先度という意味のコメントをつけて
        Schema::table('memos', function (Blueprint $table) {
            $table->integer('priority')->default(1)->comment('優先度: 1=低, 2=中, 3=高')->after('body');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('memos', function (Blueprint $table) {
            //テーブルから priority という列（カラム）を消す命令
            $table->dropColumn('priority');
        });
    }
};
