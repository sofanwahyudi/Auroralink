<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnKelengkapanOnTableItemServis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('item_servis', function (Blueprint $table) {
            $table->enum('kelengkapan', ['Batery', 'Tas', 'Memory/Ram', 'HDD/SSD', 'Adaptor', 'Mouse','Flashdisk', 'CDROM/CDRW'])->after('biaya');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('item_servis', function (Blueprint $table) {
            $table->dropColumn('kelengkapan');
        });
    }
}
