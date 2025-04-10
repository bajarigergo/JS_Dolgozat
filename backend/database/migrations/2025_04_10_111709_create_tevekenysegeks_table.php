<?php

use App\Models\Tevekenysegek;
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
        Schema::create('tevekenysegeks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kat_id')->references('id')->on('kategoriaks');
            $table->string('tev_nev');
            $table->boolean('allapot');
            $table->timestamps();
        });

        Tevekenysegek::create([
            'kat_id' => 1,
            'tev_nev' => 'porszívózás',
            'allapot' => 0,
        ]);
        Tevekenysegek::create([
            'kat_id' => 1,
            'tev_nev' => 'mosogatás',
            'allapot' => 0,
        ]);

        Tevekenysegek::create([
            'kat_id' => 2,
            'tev_nev' => 'Házi feladat (matek)',
            'allapot' => 0,
        ]);
        Tevekenysegek::create([
            'kat_id' => 2,
            'tev_nev' => 'Házi feladat (angol)',
            'allapot' => 1,
        ]);

        Tevekenysegek::create([
            'kat_id' => 3,
            'tev_nev' => 'Alma vásárlás',
            'allapot' => 0,
        ]);
        Tevekenysegek::create([
            'kat_id' => 3,
            'tev_nev' => 'Találkozás xy-al',
            'allapot' => 0,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tevekenysegeks');
    }
};
