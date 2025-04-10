<?php

use App\Models\Kategoriak;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kategoriaks', function (Blueprint $table) {
            $table->id();
            $table->string('katnev');
            $table->timestamps();
        });
        Kategoriak::create([
            'katnev'=> 'Házimunka'
        ]);
        Kategoriak::create([
            'katnev'=> 'Iskolai'
        ]);
        Kategoriak::create([
            'katnev'=> 'Egyéb'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategoriaks');
    }

};
