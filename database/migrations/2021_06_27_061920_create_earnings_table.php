<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEarningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('earnings', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('parent_id');
            $table->integer('category_id');
            $table->integer('sub_category');
            $table->integer('transaction_id');
            $table->integer('account_id');
            $table->string('details')->nullable();
            $table->double('amount');
            $table->double('charge');
            $table->string('fiscal_year')->default(2122);
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
        Schema::dropIfExists('earnings');
    }
}
