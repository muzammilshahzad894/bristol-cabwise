<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SendingEmailList;

class SendingEmailListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [
            [
                'name' => 'Booking Confirmation',
                'label' => 'booking-confirmation'
            ],
            [
                'name' => 'Driver Assign',
                'label' => 'driver-assign'
            ],
            [
                'name' => 'Booking Status Change',
                'label' => 'booking-status-change'
            ],
            [
                'name' => 'Refund Request',
                'label' => 'refund-request'
            ],
            [
                'name' => 'Refund Status Change',
                'label' => 'refund-status-change'
            ]
        ];

        foreach ($list as $item) {
            SendingEmailList::create($item);
        }
    }
}
