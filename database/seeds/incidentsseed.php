<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class incidentsseed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('incidents')->insert([
            'id' => 1,
            'severity' => 'info',
            'category' => 'Site',
            'devices' => 'Site',
            'title' => 'Internet Down',
            'stoptime' => Carbon::now()->format('Y-m-d H:i:s'),
            'status' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'userid' => 1,
        ]);
        DB::table('incidents')->insert([
            'id' => 2,
            'severity' => 'warning',
            'category' => 'Solar',
            'devices' => 'PV Inverter 2',
            'title' => 'Device Disconnected',
            'stoptime' => Carbon::now()->format('Y-m-d H:i:s'),
            'status' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'userid' => 1,
        ]);
        DB::table('incidents')->insert([
            'id' => 3,
            'severity' => 'warning',
            'category' => 'Solar',
            'devices' => 'PV Inverter 3',
            'title' => 'Device Disconnected',
            'stoptime' => Carbon::now()->format('Y-m-d H:i:s'),
            'status' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'userid' => 1,
        ]);
        DB::table('incidents')->insert([
            'id' => 4,
            'severity' => 'warning',
            'category' => 'Genset',
            'devices' => 'Gensys A',
            'title' => 'Reverse Current',
            'stoptime' => Carbon::now()->format('Y-m-d H:i:s'),
            'status' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'userid' => 1,
        ]);
    }
}
