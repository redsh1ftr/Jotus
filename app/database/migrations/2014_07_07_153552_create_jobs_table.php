<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJobsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('jobs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('case_id');
			$table->string('deponent_id');
			$table->string('requester_id');
			$table->string('nor_id');
			$table->string('job_number');
			$table->datetime('request_received');
			$table->string('rush')->nullable();
			$table->string('hold');
			$table->string('films')->nullable();
			$table->string('status');
			$table->string('type');
			$table->string('need_auth')->nullable();
			$table->string('need_info')->nullable();
			$table->datetime('served');
			$table->datetime('records_due');
			$table->longtext('info');
			$table->integer('updated')->nullable();
			$table->string('created_user');
			$table->string('updated_user');
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
		Schema::drop('jobs');
	}

}
