<?php

use Illuminate\Database\Seeder;
use App\Car;

class CarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cars = [
            ['name' => 'รถยนต์โดยสาร (ตู้)', 'plate_number' => 'ม-3126', 'province' => 'เพชรบูรณ์', 'brand' => 'MITSUBISHI', 'car_year' => '2531', 'default_driver' => 0, 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), ],
            ['name' => 'รถยนต์โดยสาร (แวน)', 'plate_number' => 'ม-2435', 'province' => 'เพชรบูรณ์', 'brand' => 'MITSUBISHI', 'car_year' => '2535', 'default_driver' => 0, 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), ],
            ['name' => 'รถยนต์โดยสาร (ตู้)', 'plate_number' => 'ม-3202', 'province' => 'เพชรบูรณ์', 'brand' => 'TOYOTA', 'car_year' => '2539', 'default_driver' => 0, 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), ],
            ['name' => 'รถยนต์โดยสาร (ตู้)', 'plate_number' => 'นข 42', 'province' => 'เพชรบูรณ์', 'brand' => 'TOYOTA', 'car_year' => '2540', 'default_driver' => 0, 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), ],
            ['name' => 'รถยนต์โดยสาร (ตู้)', 'plate_number' => 'นข 269', 'province' => 'เพชรบูรณ์', 'brand' => 'TOYOTA', 'car_year' => '2542', 'default_driver' => 0, 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), ],
            ['name' => 'รถบรรทุก (6 ล้อเล็ก)', 'plate_number' => '40-0133', 'province' => 'เพชรบูรณ์', 'brand' => 'ISUZU', 'car_year' => '2543', 'default_driver' => 0, 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), ],
            ['name' => 'รถบัส (แอร์) 45 ที่นั่ง', 'plate_number' => '40-0149', 'province' => 'เพชรบูรณ์', 'brand' => 'VOLVO', 'car_year' => '2545', 'default_driver' => 0, 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), ],
            ['name' => 'รถยนต์โดยสาร (ตู้)', 'plate_number' => 'นข 1104', 'province' => 'เพชรบูรณ์', 'brand' => 'TOYOTA', 'car_year' => '2546', 'default_driver' => 0, 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), ],
            ['name' => 'รถยนต์โดยสาร (ตู้)', 'plate_number' => 'นข 1125', 'province' => 'เพชรบูรณ์', 'brand' => 'NISSAN', 'car_year' => '2546', 'default_driver' => 0, 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), ],
            ['name' => 'รถยนต์นั่ง 4 ประตู (เก๋ง)', 'plate_number' => 'กข 2929', 'province' => 'เพชรบูรณ์', 'brand' => 'TOYOTA', 'car_year' => '2546', 'default_driver' => 0, 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), ],
            ['name' => 'รถมินิบัส (แอร์) 32 ที่นั่ง', 'plate_number' => '40-0190', 'province' => 'เพชรบูรณ์', 'brand' => 'HINO', 'car_year' => '2549', 'default_driver' => 0, 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), ],
            ['name' => 'รถยนต์โดยสาร (ตู้)', 'plate_number' => 'นข 1888', 'province' => 'เพชรบูรณ์', 'brand' => 'TOYOTA', 'car_year' => '2551', 'default_driver' => 0, 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), ],
            ['name' => 'รถยนต์โดยสาร (ตู้)', 'plate_number' => 'นข 1889', 'province' => 'เพชรบูรณ์', 'brand' => 'TOYOTA', 'car_year' => '2551', 'default_driver' => 0, 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), ],
            ['name' => 'รถยนต์นั่ง 4 ประตู (เก๋ง)', 'plate_number' => 'กค 6777', 'province' => 'เพชรบูรณ์', 'brand' => 'HONDA', 'car_year' => '2551', 'default_driver' => 0, 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), ],
            ['name' => 'รถยนต์โดยสาร (ตู้)', 'plate_number' => 'นข 2556', 'province' => 'เพชรบูรณ์', 'brand' => 'HYUNDAI', 'car_year' => '2554', 'default_driver' => 0, 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), ],
            ['name' => 'รถยนต์โดยสาร (ตู้)', 'plate_number' => 'นข 2557', 'province' => 'เพชรบูรณ์', 'brand' => 'HYUNDAI', 'car_year' => '2554', 'default_driver' => 0, 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), ],
            ['name' => 'รถยนต์โดยสาร (ตู้)', 'plate_number' => 'นข 2558', 'province' => 'เพชรบูรณ์', 'brand' => 'HYUNDAI', 'car_year' => '2554', 'default_driver' => 0, 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), ],
            ['name' => 'รถยนต์โดยสาร (แวนขาวมุก)', 'plate_number' => 'กจ 9145', 'province' => 'เพชรบูรณ์', 'brand' => 'ISUZU', 'car_year' => '2556', 'default_driver' => 0, 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), ],
            ['name' => 'รถยนต์โดยสาร (ตู้)', 'plate_number' => 'นข 998', 'province' => 'เพชรบูรณ์', 'brand' => 'TOYOTA', 'car_year' => '2556', 'default_driver' => 0, 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), ],
            ['name' => 'รถยนต์โดยสาร (ตู้)', 'plate_number' => 'นข 889', 'province' => 'เพชรบูรณ์', 'brand' => 'TOYOTA', 'car_year' => '2556', 'default_driver' => 0, 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), ],
            ['name' => 'รถยนต์บรรทุก (กระบะ)', 'plate_number' => 'บว 899', 'province' => 'เพชรบูรณ์', 'brand' => 'TOYOTA', 'car_year' => '2556', 'default_driver' => 0, 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), ],
            ['name' => 'รถตรวจการณ์', 'plate_number' => 'กข 1999', 'province' => 'เพชรบูรณ์', 'brand' => 'HONDA', 'car_year' => '2556', 'default_driver' => 0, 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), ],
            ['name' => 'รถยนต์โดยสาร (ตู้)', 'plate_number' => 'นข 988', 'province' => 'เพชรบูรณ์', 'brand' => 'TOYOTA', 'car_year' => '2557', 'default_driver' => 0, 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), ],
            ['name' => 'รถบัส (แอร์) 44 ที่นั่ง', 'plate_number' => '40-0265', 'province' => 'เพชรบูรณ์', 'brand' => 'VOLVO', 'car_year' => '2559', 'default_driver' => 0, 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), ]
        ];

        //Car::create($cars);
        foreach($cars as $car){
            Car::create($car);
        }
    }
}
