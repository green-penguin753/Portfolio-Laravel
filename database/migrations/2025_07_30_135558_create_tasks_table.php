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
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id(); //主キー
            $table->string('task', 100); //タスク内容、100文字以内
            $table->boolean('flag')->default(false); //状態切り替え
            $table->timestamp('deadline')->nullable(); //締切日
            $table->timestamp('updated_at')->useCurrent()->nullable(); //更新日
            $table->timestamp('created_at')->useCurrent()->nullable(); //登録日
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
