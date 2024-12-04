<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSvcVendorServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('svc_vendor_services', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('vend_id');
            $table->unsignedBigInteger('service_id');  
            $table->unsignedBigInteger('sub_service_id')->default(0);                          
            $table->double('price');
            $table->text('attributes')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
			
            $table->foreign('vend_id')->references('id')->on('svc_vendors')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('svc_vendor_services');
    }
}