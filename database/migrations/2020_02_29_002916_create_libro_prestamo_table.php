<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibroPrestamoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libro_prestamo', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('usuario_id');
            $table->foreign('usuario_id' , 'fk_usser_id') -> references ('id') -> on ('usuario') -> onDelete('restrict') -> onUpdate('restrict');
            $table->unsignedInteger('libro_id');
            $table->foreign('libro_id' , 'fk_book_id') ->references ('id') -> on ('libro') -> onDelete('restrict') -> onUpdate('restrict');
            $table->date('fecha_prestamo');
            $table->string('prestado_a');
            $table->unsignedTinyInteger('estado');
            $table->date('fecha_devolucion');
            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('libro_prestamo');
    }
}
