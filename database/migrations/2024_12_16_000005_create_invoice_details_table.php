<?php

// use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;

// class CreateInvoiceDetailsTable extends Migration
// {
//     public function up()
//     {
//         Schema::create('invoice_details', function (Blueprint $table) {
//             $table->text('id')->primary();
//             $table->text('invoice_id');  // Asegúrate de que invoice_id es text
//             $table->unsignedBigInteger('product_id');
//             $table->integer('quantity');
//             $table->decimal('unit_price', 10, 2);
//             $table->integer('vat_included')->default(0); // Cambiado a entero
//             $table->decimal('subtotal', 10, 2);
//             $table->timestamps();

//             $table->foreign('invoice_id')->references('id')->on('purchase_invoices')->onDelete('cascade');
//         });
//     }

//     public function down()
//     {
//         Schema::dropIfExists('invoice_details');
//     }
// }

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('invoice_details', function (Blueprint $table) {
            $table->string('id')->primary(); // ID del detalle, asignado manualmente
            $table->string('invoice_id'); // Relación con PurchaseInvoices
            $table->unsignedBigInteger('product_id'); // Relación con Products
            $table->integer('quantity');
            $table->decimal('unit_price', 10, 2);
            $table->integer('vat_included')->default(0);
            $table->decimal('subtotal', 10, 2);
            $table->timestamps();

            // Clave foránea con purchase_invoices
            $table->foreign('invoice_id')->references('id')->on('purchase_invoices')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('invoice_details');
    }
}
