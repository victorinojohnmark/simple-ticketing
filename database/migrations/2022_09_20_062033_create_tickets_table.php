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
            $table->unsignedMediumInteger('created_by_id');
            $table->string('classification_header', 50);
            $table->string('classification_desc', 50);
            $table->string('subject', 255);
            $table->unsignedMediumInteger('department_id');
            $table->string('bl_no');
            $table->string('priority');
            $table->date('expected_date_accomplished');
            $table->text('description');
            $table->string('status', 20)->default('Open');
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
