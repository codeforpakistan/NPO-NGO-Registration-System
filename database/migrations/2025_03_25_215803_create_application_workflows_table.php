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
        Schema::create('application_workflows', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('basic_info_id')->unsigned();
            $table->bigInteger('from_user_id')->unsigned();
            $table->bigInteger('to_user_id')->unsigned();
            $table->enum('action', ['Forwarded', 'Reversed', 'Accepted', 'Rejected','Submitted']);
            $table->text('comments')->nullable();
            $table->string('attachment', 150)->nullable();
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
        Schema::dropIfExists('application_workflows');
    }
};
