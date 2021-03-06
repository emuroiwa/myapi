<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Purchase;

class PurchaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filePath = storage_path("fixtures/purchased.csv");
        foreach (array_slice(glob($filePath), 0, 2) as $file) {
            $data = array_map('str_getcsv', file($file));

            foreach (array_slice($data, 1) as $row) {
                Purchase::create([
                    'user_id' => $row[0],
                    'product_sku' => $row[1],
                ]);
            }
        }
    }
}
