<?php declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('theater_id');
            $table->unsignedInteger('movie_id');
            $table->unsignedInteger('sold_at');
            $table->unsignedInteger('amount');
            $table->unsignedInteger('created_at')->default(0);
            $table->unsignedInteger('updated_at')->default(0);

            $table->foreign('theater_id')->references('id')->on('theaters')->onDelete('cascade');
            $table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade');

            $table->unique(['theater_id', 'movie_id', 'sold_at'], 'ix_sales_unique_sale');
            $table->index('sold_at', 'ix_sales_sold_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
