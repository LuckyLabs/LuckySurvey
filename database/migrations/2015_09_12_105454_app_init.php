<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AppInit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function(Blueprint $table){
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('password');
        });

        Schema::create('admin_permissions', function(Blueprint $table){
            $table->increments('id');
            $table->integer('admin_id');
            $table->integer('group_id');

            $table->index('admin_id');
        });

        Schema::create('groups', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
        });

        Schema::create('users', function(Blueprint $table){
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('head');
            $table->string('department');
            $table->string('position');
        });

        Schema::create('user_groups', function(Blueprint $table){
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('group_id');

            $table->index('user_id');
            $table->index('group_id');
        });

        Schema::create('surveys', function(Blueprint $table){
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->text('mail_description');
            $table->integer('author_id');
            $table->timestamp('created_at');
            $table->date('expired_at');
            $table->smallInteger('is_anon')->default(0);
        });

        Schema::create('questions', function(Blueprint $table){
            $table->increments('id');
            $table->integer('survey_id');
            $table->string('title');
            $table->string('description', 512);
            $table->smallInteger('type');
            $table->smallInteger('sort_order')->default(0);

            $table->index('survey_id');
        });

        Schema::create('answer_variants', function(Blueprint $table){
            $table->increments('id');
            $table->integer('question_id');
            $table->string('text');
            $table->smallInteger('sort_order');
        });

        Schema::create('user_surveys', function(Blueprint $table){
            $table->increments('id');
            $table->integer('survey_id');
            $table->integer('user_id');
            $table->string('token');
            $table->smallInteger('is_completed')->default(0);
            $table->smallInteger('is_mailed')->default(0);

            $table->index('user_id');
            $table->index('survey_id');
        });

        Schema::create('voters', function(Blueprint $table){
            $table->increments('id');
            $table->integer('survey_id');
            $table->string('full_name')->nullable();
            $table->string('email')->nullable();
            $table->string('head');
            $table->string('department');
            $table->string('position');

            $table->index('survey_id');
        });

        Schema::create('voter_groups', function(Blueprint $table){
            $table->increments('id');
            $table->integer('voter_id');
            $table->integer('group_id');

            $table->index('voter_id');
            $table->index('group_id');
        });

        Schema::create('results', function(Blueprint $table){
            $table->increments('id');
            $table->integer('voter_id');
            $table->integer('question_id');
            $table->string('answer', 512);
            $table->smallInteger('priority');
            $table->string('comment', 512);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
        Schema::dropIfExists('admin_permissions');
        Schema::dropIfExists('groups');
        Schema::dropIfExists('users');
        Schema::dropIfExists('user_groups');
        Schema::dropIfExists('surveys');
        Schema::dropIfExists('questions');
        Schema::dropIfExists('answer_variants');
        Schema::dropIfExists('user_survey');
        Schema::dropIfExists('voter');
        Schema::dropIfExists('voter_group');
        Schema::dropIfExists('results');
    }
}
