<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('codigo')->nullable();
            $table->string('titulo')->nullable()->unique();
            $table->string('modalidad');
            $table->date('acta')->nullable();
            $table->string('estado')->nullable();
            $table->date('inicio')->nullable();
            $table->date('fin')->nullable();
            $table->text('observaciones')->nullable();
            $table->unsignedInteger('id_director')->nullable();
            $table->unsignedInteger('id_evaluador')->nullable();
            $table->string('id_estudiante1')->nullable()->unique();
            $table->string('id_estudiante2')->nullable()->unique();
            $table->string('id_estudiante3')->nullable()->unique();

            $table->foreign('id_director')
                ->references('id')
                ->on('docentes')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->foreign('id_evaluador')
                ->references('id')
                ->on('docentes')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->foreign('id_estudiante1')
                ->references('cedula')
                ->on('estudiantes')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->foreign('id_estudiante2')
                ->references('cedula')
                ->on('estudiantes')
                ->onUpdate('cascade')
                ->onDelete('set null');


            $table->foreign('id_estudiante3')
                ->references('cedula')
                ->on('estudiantes')
                ->onUpdate('cascade')
                ->onDelete('set null');
                
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
        Schema::dropIfExists('proyectos');
    }
}
