<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempatsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tempats', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
            $table->string('nama',50);
            $table->string('deskripsi',600);
            $table->string('akunfb',40);
            $table->string('akuntw',40);
            $table->string('akunig',40);
            $table->string('contact',40);
            $table->string('alamat',100);
            $table->string('visit',100);
            $table->string('kategori_id',100);
            $table->double('lat');
            $table->double('long');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tempats');
	}

}
