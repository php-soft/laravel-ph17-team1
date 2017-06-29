<?php

use Illuminate\Database\Seeder;

class UtilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('utilities')->insert([
            ['advanced_security' => "Mở khóa bằng vân tay, Quét mống mắt", 'special_function' => "Sạc pin nhanh Chống nước, chống bụi", 'recording' => "Có, microphone chuyên dụng chống ồn", 'radio' => "Không", 'movie' => "	H.265, 3GP, MP4, AVI, WMV", 'music' => "Midi, Lossless, MP3, WAV, WMA"],
            ['advanced_security' => "Mở khóa bằng vân tay", 'special_function' => "Chống nước, chống bụi
				3D Touch", 'recording' => "Có, microphone chuyên dụng chống ồn", 'radio' => "không", 'movie' => "	H.265, 3GP, MP4, AVI, WMV, H.264(MPEG4-AVC), DivX, WMV9, Xvid", 'music' => "	Midi, Lossless, MP3, WAV, WMA, eAAC+, OGG, AC3, FLAC"],
        ]);
    }
}
