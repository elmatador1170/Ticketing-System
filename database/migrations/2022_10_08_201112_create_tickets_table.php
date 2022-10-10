<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string("subject");
            $table->text("description");
            $table->integer("owner_id")->nullable();
            $table->foreign("owner_id")
                ->references("id")
                ->on("users")
                ->onDelete("set null");
            $table->integer("area_id")->nullable();
            $table->foreign("area_id")
                ->references("id")
                ->on("areas")
                ->onDelete("set null");
            $table->string("status")->default("Open");
            $table->string("priority")->default("High");
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
        Schema::dropIfExists('tickets');
    }
};
