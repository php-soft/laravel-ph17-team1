<?php

use Illuminate\Database\Seeder;

class ConnectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('connects')->insert([
            ['network_mobile' => "3G, 4G LTE Cat 9", 'sim' => "2 SIM Nano (SIM 2 chung khe thẻ nhớ)", 'wifi' => "Wi-Fi 802.11 a/b/g/n/ac, Dual-band, DLNA, Wi-Fi Direct, Wi-Fi hotspot", 'gps' => "A-GPS, GLONASS", 'bluetooth' => "v5.0, apt-X, A2DP, LE, EDR", 'connect_port' => "USB Type-C", 'jack_phone' => "3.5 mm", 'other_connect' => "Kết nối nhanh™, OTG"],
            ['network_mobile' => "3G, 4G LTE Cat 9", 'sim' => "1 Nano SIM", 'wifi' => "Wi-Fi 802.11 a/b/g/n/ac, Dual-band, Wi-Fi hotspot", 'gps' => "	A-GPS, GLONASS", 'bluetooth' => "v4.2, A2DP, LE", 'connect_port' => "Lightning", 'jack_phone' => "	Không", 'other_connect' => "NFC, Air Play, OTG, HDMI"],
        ]);
    }
}
