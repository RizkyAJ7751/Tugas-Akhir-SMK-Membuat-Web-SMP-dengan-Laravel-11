<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('fake_logins', function (Blueprint $table) {
            $table->id();
            $table->string('ip', 45); // support IPv6
            $table->string('email')->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamps();
        });

        Schema::create('blocked_ips', function (Blueprint $table) {
            $table->id();
            $table->string('ip', 45)->unique();
            $table->timestamp('blocked_until')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fake_logins');
        Schema::dropIfExists('blocked_ips');
    }
};
