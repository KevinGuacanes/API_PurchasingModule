<?php

// use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;

// class CreatePurchaseInvoicesTable extends Migration
// {
//     public function up()
// {
//     Schema::create('purchase_invoices', function (Blueprint $table) {
//         $table->text('id')->primary();  // ID de la factura
//         $table->date('date');
//         $table->string('supplier_id');
//         $table->boolean('payment_type'); // 0: Cash, 1: Credit
//         $table->date('due_date')->nullable();
//         $table->decimal('total', 10, 2)->nullable()->default(0);
//         $table->boolean('status')->default(true);
//         $table->timestamps();

//         // Definir clave foránea
//         $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
//     });
// }


//     public function down()
//     {
//         Schema::dropIfExists('purchase_invoices');
//     }
// }

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseInvoicesTable extends Migration
{
    public function up()
    {
        Schema::create('purchase_invoices', function (Blueprint $table) {
            $table->string('id')->primary(); // ID manual (puede ser un código)
            $table->date('date');
            $table->string('supplier_id', 13); // Coincide con el tipo de suppliers.id
            $table->boolean('payment_type'); // 0: Cash, 1: Credit
            $table->date('due_date')->nullable();
            $table->decimal('total', 10, 2)->nullable()->default(0);
            $table->boolean('status')->default(true);
            $table->timestamps();

            // Definir clave foránea
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('purchase_invoices');
    }
}
