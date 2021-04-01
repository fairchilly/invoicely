<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('shippingStreet')->nullable();
            $table->string('shippingCity')->nullable();
            $table->string('shippingStateProvince')->nullable();
            $table->string('shippingCountry')->nullable();
            $table->string('shippingZipPostal')->nullable();
            $table->string('shippingPhone')->nullable();
            $table->string('shippingEmail')->nullable();
            $table->string('billingStreet')->nullable();
            $table->string('billingCity')->nullable();
            $table->string('billingStateProvince')->nullable();
            $table->string('billingCountry')->nullable();
            $table->string('billingZipPostal')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
