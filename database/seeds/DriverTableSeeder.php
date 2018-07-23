<?php

use Illuminate\Database\Seeder;
use App\Driver;

class DriverTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $drivers = [
            ['name' => 'นายนพฤทธิ์ ทิพย์เคลือบ', 'nickname' => 'พี่นพ', 'tel' => '0885756515', 'unit' => 1, 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['name' => 'นายนเรศ คำชา', 'nickname' => 'พี่เรศ', 'tel' => '0931803455', 'unit' => 1, 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['name' => 'นายกิตติพงษ์ แซ่ตั้ง', 'nickname' => 'พี่ป๊อป', 'tel' => '0898399991', 'unit' => 1, 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['name' => 'นายทนงศักดิ์ สุขแสง', 'nickname' => 'พี่โอ๋ง', 'tel' => '0957645399', 'unit' => 1, 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['name' => 'นายวิทยากร ปู่แก้ว', 'nickname' => 'พี่ต้อม', 'tel' => '0855436910', 'unit' => 1, 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['name' => 'นายวรเชษฐ์ คำศรี', 'nickname' => 'เข้', 'tel' => '0910269967', 'unit' => 1, 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['name' => 'นายบรรลือ เจริญสุข', 'unit' => 1, 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['name' => 'นายอุทัย จักวิน', 'unit' => 1, 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['name' => 'นายบุญเพ็ง คำตื้อ', 'unit' => 1, 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['name' => 'นายธัญพิสิทธิ์ รังษีสกรณ์', 'unit' => 1, 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['name' => 'นายประมวล นามบารี', 'tel' => '0819992800', 'unit' => 1, 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]
        ];

        //Driver::create($drivers);
        foreach($drivers as $driver){
            Driver::create($driver);
        }
    }
}
