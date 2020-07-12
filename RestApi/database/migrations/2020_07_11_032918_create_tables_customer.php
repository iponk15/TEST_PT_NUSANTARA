<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablesCustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->increments('customer_id');
            $table->string('customer_name', '100');
            $table->string('customer_email', '100');
            $table->string('customer_password', '50');
            $table->enum('customer_gender', ['L','P'])->default(NULL);
            $table->enum('customer_menikah', ['0','1'])->default(NULL);
            $table->text('customer_address');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer');
    }
}
