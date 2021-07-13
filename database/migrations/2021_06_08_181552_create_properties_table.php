<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('price', 10, 2);
            $table->string('contact_number');
            $table->float('total_area');
            $table->float('useful_area');
            $table->integer('bedrooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->integer('suites')->nullable();
            $table->integer('parking')->nullable();
            $table->integer('pools')->nullable();
            $table->text('description');
            $table->text('localization')->nullable();
            $table->string('property_type');
            $table->string('rent_type')->nullable();
            $table->foreignId('modality_id')->constrained();
            $table->string('unity_number')->nullable();
            $table->foreignId('address_id')->nullable()->constrained();
            $table->foreignId('project_id')->nullable()->constrained();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
