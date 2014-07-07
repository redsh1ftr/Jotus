<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAttorneysTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('attorneys', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('firm_id');
			$table->string('p_number');
			$table->string('title');
			$table->string('first_name');
			$table->string('middle_name');
			$table->string('last_name');
			$table->string('atty_email');
			$table->string('atty_phone');
			$table->string('atty_fax');
			$table->string('sec_first');
			$table->string('sec_middle');
			$table->string('sec_last');
			$table->string('sec_email');
			$table->string('sec_phone');
			$table->string('sec_fax');
			$table->longtext('info');
			$table->string('preference');
			$table->string('shipping');
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
		Schema::drop('attorneys');
	}

}
