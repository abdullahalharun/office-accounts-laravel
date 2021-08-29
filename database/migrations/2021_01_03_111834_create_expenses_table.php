<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('parent_id');
            $table->integer('category_id');
            $table->integer('transaction_id');
            $table->string('account_id');
            $table->string('details')->nullable();
            $table->double('amount');            
            $table->double('charge');            
            $table->text('invoice')->nullable();
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
        Schema::dropIfExists('expenses');
    }
}
