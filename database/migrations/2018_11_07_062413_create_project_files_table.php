<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->integer('catagory');
            $table->string('contributor_name1');
            $table->string('contributor_id1');
            $table->string('contributor_name2');
            $table->string('contributor_id2');
            $table->string('supervisor_name');
            $table->string('name');
            $table->longText('description');
            $table->string('required_technology'); 
            $table->integer('user_id');
            $table->string('doc');
            $table->string('image');
            $table->string('path');
            $table->integer('view_count')->default(0);
            $table->tinyInteger('status')->default('1');
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
        Schema::dropIfExists('project_files');
    }
}
