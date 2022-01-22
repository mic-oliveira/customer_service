<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('document');
            $table->integer('type');
            $table->date('emisison_date');
            $table->boolean('verified')->default(false);
            $table->foreignId('person_id')->constrained('people');
            $table->json('metadata')->nullable();
            $table->timestamps();
            $table->unique(['document', 'type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
