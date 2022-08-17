<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnNazivToNazivKategorije extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kategorijas', function (Blueprint $table) {
             $table->renameColumn('naziv','nazivKategorije');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kategorijas', function (Blueprint $table) {
            $table->renameColumn('nazivKategorije','naziv');
        });
    }
}
