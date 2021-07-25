<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('nappi_code')->unique()->nullable();
            $table->string('regno')->nullable();
            $table->char('shedule', 5)->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->enum('category', ['General','Herbal','Pharmaceutical', 'Steroids']);
            $table->string('dosage_form');
            $table->string('pack_size');
            $table->string('num_packs')->nullable();
            $table->unsignedInteger('cost_price'); // sep
            $table->unsignedInteger('cost_per_unit')->nullable();
            $table->unsignedInteger('dispensing_fee');
            $table->unsignedInteger('add_on_fee')->default(5000);
            $table->string('image')->nullable();
            $table->boolean('is_generic')->default(1);
            $table->boolean('is_active')->default(1);
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
        Schema::dropIfExists('items');
    }
}
