<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');

            $table->bigInteger('proveedor_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('producto_id')->unsigned();
            $table->bigInteger('cantidad');
            $table->bigInteger('preciototal');
            $table->timestamps();
            
            $table->foreign('proveedor_id')->references('id')->on('proveedors')->onDelete("cascade");
            $table->foreign('user_id')->references('id')->on('users')->onDelete("cascade");
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compras');
    }
}
