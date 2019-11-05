<?php

use App\Model\Tickets\Cats;
use App\Model\Tickets\Priority;
use App\Model\Tickets\Status;
use Illuminate\Database\Seeder;

class TicketTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = Status::create([
            'Pending' => '#e69900',
            'Solved'  => '#15a000',
            'Bug'     => '#f40700',
        ]);
        $cats = Cats::create([
            'Technical' => '#0014f4',
            'Billing' => '#2b9900',
            'Customer Services' => '#7e0099',
        ]);
        $priority = Priority::create([
            'Low'      => '#069900',
            'Normal'   => '#e1d200',
            'Critical' => '#e10000',
        ]);
    }
}
