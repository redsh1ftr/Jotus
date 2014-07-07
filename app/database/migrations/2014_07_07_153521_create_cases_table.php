<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCasesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cases', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('case_number');
			$table->datetime('date_received');
			$table->datetime('discovery_date');
			$table->string('court_id');
			$table->string('judge');
			$table->string('file_number');
			$table->string('claim_number');
			$table->string('caption');
			$table->string('status');
			$table->longtext('info');
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
		Schema::drop('cases');
	}

}
