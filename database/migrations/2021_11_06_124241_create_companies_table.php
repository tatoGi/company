<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Companies', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->nullable();
            $table->text('company_about')->nullable();
            $table->string('company_image')->nullable();
            $table->string('company_region')->nullable();
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
        Schema::dropIfExists('companies');
    }
}
