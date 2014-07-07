<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDeponentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('deponents', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('street1');
			$table->string('street2');
			$table->string('city');
			$table->string('state');
			$table->string('zip');
			$table->string('type');
			$table->string('contact');
			$table->string('phone');
			$table->string('fax');
			$table->string('email');
			$table->string('fee');
			$table->string('films')->nullable();
			$table->string('copy_service');
			$table->longtext('info');
			$table->string('active');
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
		Schema::drop('deponents');
	}

}
