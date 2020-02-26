<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBracketItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bracket_items', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->bigInteger('team_id')->unsigned()->index()->nullable();
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
            $table->bigInteger('bracket_id')->unsigned()->index()->nullable();
            $table->foreign('bracket_id')->references('id')->on('brackets')->onDelete('cascade');
            $table->integer('round');
            $table->integer('row');
            $table->integer('score')->default(-1);
            $table->boolean('is_winner')->default(false);
            $table->timestamp('gametime');
            $table->enum('type', ['bye', 'tbd', 'dnf', 'team'])->default('tbd');
            $table->unique(['round', 'bracket_id', 'team_id']);
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
        Schema::dropIfExists('bracket_items');
    }
}
