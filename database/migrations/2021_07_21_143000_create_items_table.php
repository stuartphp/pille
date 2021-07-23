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
            $table->string('nappi_code')->unique();
            $table->string('regno')->nullable();
            $table->char('shedule', 5);
            $table->string('name');
            $table->enum('dosage_form', ['drops','injection', 'tablet']);
            $table->string('pack_size');
            $table->string('num_packs');
            $table->unsignedInteger('cost_price'); // sep
            $table->unsignedInteger('cost_per_unit');
            $table->unsignedInteger('dispensing_fee');
            $table->unsignedInteger('add_on_fee')->default(5000);
            $table->boolean('is_generic');
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
