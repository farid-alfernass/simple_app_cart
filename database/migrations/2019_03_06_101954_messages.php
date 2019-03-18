<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Messages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('from_user_id')->unsigned();;
            $table->index('from_user_id');
            $table->foreign('from_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('to_user_id')->unsigned();;
            $table->index('to_user_id');
            $table->foreign('to_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('type', 30)->nullable();
            $table->string('file_format', 50)->nullable();
            $table->string('file_path')->nullable();
            $table->longText('message');
            $table->date('date');
            $table->string('time', 25);
            $table->ipAddress('ip')->nullable();
            $table->SoftDeletes();
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
        Schema::table('lists', function(Blueprint $table)
        {
            $table->dropForeign('lists_from_user_id_foreign');
            $table->dropIndex('lists_to_user_id_index');
            $table->dropColumn('from_user_id');
            $table->dropForeign('lists_to_user_id_foreign');
            $table->dropIndex('lists_from_user_id_index');
            $table->dropColumn('to_user_id');
        });
        
        Schema::dropIfExists('messages');
    }
}
