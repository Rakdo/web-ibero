<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProjectIdToTaskTable extends Migration
{

    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->integer('project_id')->unsigned()->after('id')->nullable();
        });
    }

   
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
           $table->dropColumn('project_id');
        });
    }
}