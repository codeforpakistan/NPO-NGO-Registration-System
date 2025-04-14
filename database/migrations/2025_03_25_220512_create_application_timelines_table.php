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
        Schema::create('application_timelines', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('basic_info_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->enum('stage', [
                'NGO Submission', 
                'DO Review', 
                'AD Review', 
                'DD Review', 
                'DG Review', 
                'Final Decision'
            ]);
            $table->enum('status', [
                'Submitted', 
                'Reversed', 
                'Forwarded', 
                'Accepted', 
                'Rejected'
            ]);
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
        Schema::dropIfExists('application_timelines');
    }
};
