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
        Schema::create('denuncias_si_anonimas', function (Blueprint $table) {
            $table->id();
            $table->text('texto_denuncia_anonima_si');
            $table->bigInteger('num_tel_denuncia_anonima_si');
            $table->timestamps();
    
        });


        
        Schema::create('denuncias_no_anonimas', function (Blueprint $table) {
            $table->id();
            $table->text('texto_denuncia_anonima_no');
            $table->string('nombre_usuario_denuncia_anonima_no');
            $table->string('apellido_usuario_denuncia_anonima_no');
            $table->text('dirección_usuario_denuncia_anonima_no');
            $table->text('lugar_usuario_denuncia_anonima_no');
            $table->bigInteger('num_tel_denuncia_anonima_no');
            $table->string('correo_usuario_denuncia_anonima_no');
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
        Schema::dropIfExists('denuncias_si_anonimas');
        Schema::dropIfExists('denuncias_no_anonimas');
    }
};
