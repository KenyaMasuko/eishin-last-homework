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
        Schema::table('companies', function (Blueprint $table) {
            $table->string('ceo_name')->nullable()->after('name');
            $table->string('logo')->nullable()->after('ceo_name');
            $table->foreignId('industry_id')->nullable()->after('logo')->constrained('industries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn('ceo_name');
            $table->dropColumn('logo');
            $table->dropForeign('companies_industry_id_foreign');
        });
    }
};
