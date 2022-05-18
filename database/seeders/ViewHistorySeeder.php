<?php

namespace Database\Seeders;

use App\Models\order;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ViewHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = order::query()
            ->select('*')
            ->get();
        foreach ($orders as $order){
            DB::table('view_histories')->insert([
                'users_id' => $order->users_id,
                'courses_id' => $order->courses_id,
                'number_view' => 1,
            ]);
        }
    }
}
