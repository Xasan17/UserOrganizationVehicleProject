<?php

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
        Schema::table('users', function (Blueprint $table) {
$table -> date('birthday')->nullable()->after('age');
//   $table->string('congratulation')->nullable()->default('happy birthday');
//        \Illuminate\Support\Facades\DB:: table ('users')->update(['birthday' => now()
//        ->subYears(rand(18,65))
//        ->subDays(rand(0,365))]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('birthday');
        });
    }};
