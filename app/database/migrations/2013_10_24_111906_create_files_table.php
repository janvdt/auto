<?php

use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Create folders table.
		Schema::create('folders', function($table)
		{
			// Identifiers.
			$table->increments('id');

			// Relationships.
			$table->integer('parent');
			$table->integer('instance_id');

			// Record values.
			$table->string('title');

			// Meta info.
			$table->integer('created_by');
			$table->integer('updated_by');
			$table->timestamps();
		});

		// Create files table.
		Schema::create('files', function($table)
		{
			// Identifiers.
			$table->increments('id');

			// Relationships.
			$table->integer('folder_id');
			$table->integer('imageable_id');
			$table->string('imageable_type');
			$table->integer('instance_id');
		});

		// Create documents table.
		Schema::create('documents', function($table)
		{
			// Identifiers.
			$table->increments('id');

			// Relationships.
			$table->integer('instance_id');

			// Record values.
			$table->string('type');
			$table->string('title');
			$table->string('name');
			$table->string('path');
			$table->string('mime');
			$table->string('size');
			$table->string('document_type');

			// Meta info.
			$table->integer('created_by');
			$table->integer('updated_by');
			$table->timestamps();
		});

		// Create images table.
		Schema::create('images', function($table)
		{
			// Identifiers.
			$table->increments('id');

			// Relationships.
			$table->integer('instance_id');

			// Record values.
			$table->string('type');
			$table->string('title');
			$table->string('alt');

			// Meta info.
			$table->integer('created_by');
			$table->integer('updated_by');
			$table->timestamps();
		});

		// Create image sizes table.
		Schema::create('sizes', function($table)
		{
			// Identifiers.
			$table->increments('id');

			// Relationships.
			$table->integer('image_id');

			// Record values.
			$table->string('type');
			$table->string('name');
			$table->string('path');
			$table->string('mime');
			$table->string('size');
			$table->string('width');
			$table->string('height');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('folders');
		Schema::drop('files');
		Schema::drop('documents');
		Schema::drop('images');
		Schema::drop('sizes');
	}

}