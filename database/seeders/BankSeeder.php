<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use KingFlamez\Rave\Facades\Rave as Flutterwave;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banks = Flutterwave::banks()->nigeria();

        foreach ($banks['data'] as $bank) {
            \App\Models\Bank::create([
                'bank_id' => $bank['id'],
                'name' => $bank['name'],
                'code' => $bank['code'],
            ]);
        }

    }
}
