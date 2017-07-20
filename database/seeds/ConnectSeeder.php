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
            ['network' => "3G, 4G LTE Cat 9", 'sim' => "2 SIM Nano (SIM 2 chung khe thẻ nhớ)", 'wifi' => "Wi-Fi 802.11 a/b/g/n/ac, Dual-band, DLNA, Wi-Fi Direct, Wi-Fi hotspot", 'gps' => "A-GPS, GLONASS", 'bluetooth' => "v5.0, apt-X, A2DP, LE, EDR", 'port' => "USB Type-C", 'jack' => "3.5 mm", 'other' => "Kết nối nhanh™, OTG"],
            ['network' => "3G, 4G LTE Cat 9", 'sim' => "1 Nano SIM", 'wifi' => "Wi-Fi 802.11 a/b/g/n/ac, Dual-band, Wi-Fi hotspot", 'gps' => "  A-GPS, GLONASS", 'bluetooth' => "v4.2, A2DP, LE", 'port' => "Lightning", 'jack' => "    Không", 'other' => "NFC, Air Play, OTG, HDMI"],
            ['network' => "2G, 3G", 'sim' => "2 sim", 'wifi' => null, 'gps' => null, 'bluetooth' => "v4.0", 'port' => "usb", 'jack' => "3.5", 'other' => null],
        ]);
    }
}
