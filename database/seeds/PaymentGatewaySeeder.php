<?php

use Illuminate\Database\Seeder;

class PaymentGatewaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $payment_gateways = [
            [
                'id' => 3,
                'name' => 'Altyn_Asyr_Kart',
                'provider_name' => 'Altyn Asyr',
                'provider_url' => 'https://mpi.gov.tm/payment/',
                'is_on_site' => 1,
                'can_refund' => 0,
            ],
//            [
//                'id' => 2,
//                'name' => 'PayPal_Express',
//                'provider_name' => 'PayPal Express',
//                'provider_url' => 'https://www.paypal.com',
//                'is_on_site' => 0,
//                'can_refund' => 0
//
//            ]
        ];
        Schema::disableForeignKeyConstraints();
        DB::table('payment_gateways')->delete();
        Schema::enableForeignKeyConstraints();
        DB::table('payment_gateways')->insert($payment_gateways);

    }
}
