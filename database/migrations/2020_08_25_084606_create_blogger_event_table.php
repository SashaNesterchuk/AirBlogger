<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloggerEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogger_event', function (Blueprint $table) {
            $table->primary(['blogger_id', 'event_id']);
            $table->unsignedBigInteger('blogger_id');
            $table->unsignedBigInteger('event_id');
            $table->foreign('blogger_id')
                ->references('id')
                ->on('bloggers')
                ->onDelete('cascade');

            $table->foreign('event_id')
                ->references('id')
                ->on('events')
                ->onDelete('cascade');
            $table->unsignedBigInteger('blogger_order')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogger_event');
    }
}
