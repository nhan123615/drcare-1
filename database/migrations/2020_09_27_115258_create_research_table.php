<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResearchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('research', function (Blueprint $table) {
            $table->id();
            $table->foreignId('disease_type_id')->constrained();
            $table->string('thumbnail', 255)->nullable();
            $table->string('video', 255)->nullable();
            $table->string('title', 255);
            $table->string('author', 255);
            $table->text('subtitle');
            $table->text('content');
            $table->boolean('status');
            $table->dateTime('published_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('research');
    }
}
