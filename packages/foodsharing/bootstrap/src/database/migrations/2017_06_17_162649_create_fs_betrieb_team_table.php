<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFsBetriebTeamTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fs_betrieb_team', function(Blueprint $table)
		{
			$table->integer('foodsaver_id')->unsigned()->index('foodsaver_has_betrieb_FKIndex1');
			$table->integer('betrieb_id')->unsigned()->index('foodsaver_has_betrieb_FKIndex2');
			$table->boolean('verantwortlich')->nullable()->default(0);
			$table->integer('active')->default(0);
			$table->dateTime('stat_last_update');
			$table->integer('stat_fetchcount')->unsigned();
			$table->date('stat_first_fetch');
			$table->dateTime('stat_last_fetch');
			$table->date('stat_add_date');
			$table->primary(['foodsaver_id','betrieb_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fs_betrieb_team');
	}

}
