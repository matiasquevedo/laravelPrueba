<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EventosPostView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::statement("CREATE VIEW eventospostview AS SELECT eventos.id, eventos.title, eventos.fecha, eventos.hora, eventos.lugar, eventos.tipo, eventos.descripcion, eventos.created_at, eventos.updated_at FROM eventos WHERE state = '1' ORDER BY id DESC;");
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
