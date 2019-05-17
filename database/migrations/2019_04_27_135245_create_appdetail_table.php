<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppdetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appdetails', function (Blueprint $table) {
            $table->bigIncrements('appdetails_id');
            $table->integer('app_id')->unsigned();
            $table->integer('item_id')->unsigned(); 
            $table->string('app_specification');
            $table->string('app_unit');
            $table->decimal('app_unit_price', 13,2); //trillion
            $table->integer('quantity'); 
            $table->decimal('amount', 13,2); //trillion
            $table->integer('mop_id')->unsigned();
            $table->integer('acc_id')->unsigned();
            $table->string('remarks');
            $table->integer('lot_no');
            $table->integer('costcenter_id')->unsigned(); 
            
            $table->foreign('acc_id')
            ->references('acc_id')
            ->on('account')
            ->onDelete('cascade');

            $table->foreign('costcenter_id')
            ->references('costcenter_id')
            ->on('costcenters')
            ->onDelete('cascade');


            $table->foreign('app_id')
            ->references('app_id')
            ->on('apps')
            ->onDelete('cascade');

            $table->foreign('item_id')
            ->references('id')
            ->on('items')
            ->onDelete('cascade');

            $table->foreign('mop_id')
            ->references('mop_id')
            ->on('mops')
            ->onDelete('cascade');


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
        Schema::dropIfExists('appdetails');
    }
}
