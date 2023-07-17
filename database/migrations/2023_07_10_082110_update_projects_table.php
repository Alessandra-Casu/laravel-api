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
        Schema::table('projects', function (Blueprint $table) {
            // creare la colonna della chiave esterna
            $table->unsignedBigInteger('category_id')->after('id'); //->nullable()

            // definire la colonna come chiave esterna
            $table->foreign('category_id')->references('id')->on('categories');//->onDelete('cascade') //->nullOnDelete()
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            // eliminare la chiave esterna
            $table->dropForeign('projects_category_id_foreign');

            // eliminare la colonna
            $table->dropColumn('category_id');
        });
    }
};