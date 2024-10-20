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
        Schema::create('memberships', function (Blueprint $table) {
            $table->id();
            $table->string('march')->nullable();
            $table->string('april')->nullable();
            $table->string('may')->nullable();
            $table->string('june')->nullable();
            $table->string('september')->nullable();
            $table->string('front')->nullable();
            $table->string('newspaper')->nullable();
            $table->decimal('monthly_income', 8, 2)->nullable();
            $table->decimal('levy_rate', 5, 2)->nullable();
            $table->string('january')->nullable();
            $table->string('february')->nullable();
            $table->string('july')->nullable();
            $table->string('august')->nullable();
            $table->string('october')->nullable();
            $table->string('november')->nullable();
            $table->string('december')->nullable();
            $table->decimal('state_relief_fund', 8, 2)->nullable();
            $table->decimal('one_day_income', 8, 2)->nullable();
            $table->decimal('aid_fago', 8, 2)->nullable();
            $table->text('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membership');
    }
};
