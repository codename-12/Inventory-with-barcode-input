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
        Schema::create('df_flowtc', function (Blueprint $table) {
            $table->id();
            $table->uuid('kode_kain')->unique(); 
            $table->foreign('kode_kain')->references('kode_kain')->on('df_regkain_polos')->onDelete('cascade');
            $table->boolean('scouring_bleaching')->nullable()->default(false);
            $table->boolean('celup_poly')->nullable()->default(false);
            $table->boolean('RO')->nullable()->default(false);
            $table->boolean('celuup_reaktif')->nullable()->default(false);
            $table->boolean('netral')->nullable()->default(false);
            $table->boolean('shaving')->nullable()->default(false);
            $table->boolean('rf')->nullable()->default(false);
            $table->enum('status', ['finish', 'proggres'])->nullable()->default('proggres');
            $table->timestamps();
        });
        Schema::create('df_flowcotton', function (Blueprint $table) {
            $table->id();
            $table->uuid('kode_kain')->unique(); 
            $table->foreign('kode_kain')->references('kode_kain')->on('df_regkain_polos')->onDelete('cascade');
            $table->boolean('sc')->nullable()->default(false);
            $table->boolean('peroxine_killer')->nullable()->default(false);
            $table->boolean('celup')->nullable()->default(false);
            $table->boolean('netral')->nullable()->default(false);
            $table->boolean('shaving')->nullable()->default(false);
            $table->boolean('fixing')->nullable()->default(false);
            $table->boolean('rf')->nullable()->default(false);
            $table->enum('status', ['finish', 'proggres'])->nullable()->default('proggres');
            $table->timestamps();
        });
        Schema::create('df_flowpolywoven', function (Blueprint $table) {
            $table->id();
            $table->uuid('kode_kain')->unique(); 
            $table->foreign('kode_kain')->references('kode_kain')->on('df_regkain_polos')->onDelete('cascade');
            $table->boolean('celup')->nullable()->default(false);
            $table->boolean('ro')->nullable()->default(false);
            $table->boolean('rf')->nullable()->default(false);
            $table->enum('status', ['finish', 'proggres'])->nullable()->default('proggres');
            $table->timestamps();
        });
        Schema::create('df_flowpeknitting', function (Blueprint $table) {
            $table->id();
            $table->uuid('kode_kain')->unique(); 
            $table->foreign('kode_kain')->references('kode_kain')->on('df_regkain_polos')->onDelete('cascade');
            $table->boolean('grey')->nullable()->default(false);
            $table->boolean('celup')->nullable()->default(false);
            $table->boolean('rc')->nullable()->default(false);
            $table->boolean('non_rc')->nullable()->default(false);
            $table->boolean('rf')->nullable()->default(false);
            $table->enum('status', ['finish', 'proggres'])->nullable()->default('proggres');
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
        Schema::dropIfExists('df_flowtc');
        Schema::dropIfExists('df_flowcotton');
        Schema::dropIfExists('df_flowpolywoven');
        Schema::dropIfExists('df_flowpeknitting');
    }
};
