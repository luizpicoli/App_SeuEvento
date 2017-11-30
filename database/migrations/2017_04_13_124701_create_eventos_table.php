<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('eventos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 60);
            $table->string('local', 60);
            $table->string('atracao', 60);
            $table->string('data', 60);
            $table->string('detalhes', 60);
            $table->decimal('preco', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('eventos');
    }

}
