<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->string('id', 13)->primary(); // RUC/Cédula
            $table->string('name', 255);
            $table->text('city_id'); // Permitir nulos
            $table->boolean('supplier_type'); // true: company, false: individual
            $table->text('address')->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('email', 255)->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();

            // Foránea
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('suppliers');
    }
}
