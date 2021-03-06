<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->id();
            $table->string('razonSocial');
            $table->enum('persona', ['Fisica', 'Moral']);
            $table->string('rfc');
            $table->string('domicilio');
            $table->string('email');
            $table->string('telefono');
            $table->enum('tipo', ['Cliente', 'Proveedor']);
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
        Schema::dropIfExists('providers');
    }
};
