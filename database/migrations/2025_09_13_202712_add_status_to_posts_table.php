<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * @var array
     */
    protected static array $postStatus = [
        'draft',
        'pending',
        'published',
        'archived',
        'deleted'
    ];

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->enum(
                'status',
                static::$postStatus
            )->default(
                static::$postStatus[0]
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn(['status']);
        });
    }
};
