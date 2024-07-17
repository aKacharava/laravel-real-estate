<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('listings', function (Blueprint $table) {
            $table->unsignedTinyInteger('beds');
            $table->unsignedTinyInteger('baths');
            $table->unsignedSmallInteger('area');
            $table->tinyText('city')->nullable();
            $table->tinyText('zip_code')->nullable();
            $table->tinyText('street_name')->nullable();
            $table->tinyText('street_number')->nullable();
            $table->unsignedInteger('price')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropColumns('listings', [
            'beds',
            'baths',
            'area',
            'city',
            'zip_code',
            'street_name',
            'street_number',
            'price'
        ]);
    }
};
