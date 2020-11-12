<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateInstallmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('installments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users');
            $table->enum('installment_type', ['معروض للبيع', 'مطلوب للشراء']);
            $table->enum('client_type', ['offline_client', 'user']);
            $table->unsignedBigInteger('client_id')->nullable();
            $table->string('product_name');
            $table->decimal('product_price', 8, 2);	
            $table->decimal('advance_payment', 8, 2);	
            $table->decimal('installment_value', 8, 2);	
            $table->enum('installment_partition', ['شهري','ربع سنوي','نصف سنوي','سنوي']);
            $table->date('starting_date');	
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
        Schema::dropIfExists('installments');
    }
}
