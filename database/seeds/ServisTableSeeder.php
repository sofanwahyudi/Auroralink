<?php

use App\Model\Garansi;
use App\Model\Kelengkapan;
use App\Model\Merk;
use App\Model\Models;
use App\Model\Servis;
use App\Model\ServisItem;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ServisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $service =[
            'kode_servis' => 'SE'.strtoupper(uniqid()),
            'users_id' => 1,
            'team_id' => 1,
            'recieve_at' => Carbon::now(),
            'completed_at' => Carbon::now(),
            'keterangan' => 'gagal booting',
            'status_id' => 1,

        ];

        $serv =[
            'merk_id' => 1,
            'model_id' => 1,
            'serial_number' => 'SN'.strtoupper(uniqid()),
            'warna' => 'merah',
            'garansi_id' => 1,
            'keluhan' => 'blank',
            'biaya' => 10000,
        ];

        for($s=0; $s < count($serv); $s++){
            foreach ($serv as  $value) {
                $servis = Servis::create($service);
                $servis->device()->create($serv[$s]);
            }
        }
        //    $servis = Servis::create($service);
         //   $servis->device()->create($serv);


        // $garansi = ['Bergaransi', 'Tidak Bergaransi'];

        // for($gar=0; $gar < count($garansi); $gar++){
        //     foreach($garansi as $garans) {
        //         $garans = new Garansi;
        //         $garans->nama = $garansi[$gar];
        //         $garans->save();
        //         $gar+=1;
        //     }
        // }

        // $kelengkapan = ['Batery','Tas','Adaptor','CDRW/CDROM','Memory/Ram','VGA','Mouse','Flashdisk','Hardisk/SSD'];

        // for($kel=0; $kel < count($kelengkapan); $kel++) {
        //     foreach ($kelengkapan as $perlengkapan) {
        //         $perlengkapan = new Kelengkapan;
        //         $perlengkapan->nama =$kelengkapan[$kel];
        //         $perlengkapan->save();
        //         $kel+=1;
        //     }
        // }

        // $merk = ['Hp','Asus','Toshiba','Accer','Macbook','Dell','Axio','Sony','Samsung'];

        // for ($me=0; $me < count($merk); $me++){
        //     foreach ($merk as $merks) {
        //         $merks = new Merk;
        //         $merks->name = $merk[$me];
        //         $merks->save();
        //         $me+=1;
        //     }
        // }



        //  $models = ['D12','S12','A44','C32','M32','V22','M67','F665','H44'];

        //  for ($md=0; $md < count($models); $md++){
        //      foreach ($models as $model) {
        //          $model = new Models;
        //          $model->name = $models[$md];
        //          $model->merk_id = 1;
        //          $model->save();
        //          $md+=1;
        //      }
        //  }
    }
}
