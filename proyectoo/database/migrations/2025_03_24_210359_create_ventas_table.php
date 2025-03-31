<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade');
            $table->foreignId('metodo_pago_id')->constrained('metodos_pago')->onDelete('cascade');
            $table->decimal('total', 10, 2);
            $table->timestamps();
        });
        
    }

    public function down()
    {
        Schema::table('ventas', function (Blueprint $table) {
            // Eliminar la columna producto_id
            $table->dropColumn('producto_id');
        });
    }
};
