<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title', 100);
            $table->text('body')->nullable();
            $table->string('status', 20)->default('published')->index();
            $table->timestamps();
        });

        Schema::create('announcement_attachments', function (Blueprint $table) {
            $table->id();
            $table->uuid('announcement_id');
            $table->string('path');
            $table->string('original_name');
            $table->string('mime_type', 100);
            $table->timestamps();
            $table->foreign('announcement_id')->references('id')->on('announcements')->cascadeOnDelete();
        });

        if (Schema::hasTable('posts') && Schema::hasTable('post_images')) {
            $legacyPosts = DB::table('posts')->where('category', 'announcement')->get();
            foreach ($legacyPosts as $post) {
                DB::table('announcements')->insert([
                    'id' => $post->id,
                    'title' => $post->title,
                    'body' => $post->body,
                    'status' => $post->status ?? 'published',
                    'created_at' => $post->created_at,
                    'updated_at' => $post->updated_at,
                ]);
                foreach (DB::table('post_images')->where('post_id', $post->id)->get() as $image) {
                    DB::table('announcement_attachments')->insert([
                        'announcement_id' => $post->id,
                        'path' => $image->path,
                        'original_name' => basename($image->path),
                        'mime_type' => 'image/' . pathinfo($image->path, PATHINFO_EXTENSION),
                        'created_at' => $image->created_at,
                        'updated_at' => $image->updated_at,
                    ]);
                }
            }

            DB::table('posts')->where('category', 'announcement')->delete();
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('announcement_attachments');
        Schema::dropIfExists('announcements');
    }
};
