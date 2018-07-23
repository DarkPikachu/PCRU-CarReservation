<?php

use Illuminate\Database\Seeder;
use App\Position;

class PositionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $positions = [
            ['position_code' => '001', 'name' => 'ผู้อำนวยการกอง', 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['position_code' => '002', 'name' => 'นักวิเคราะห์นโยบายและแผน', 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['position_code' => '003', 'name' => 'บุคลากร', 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['position_code' => '004', 'name' => 'เจ้าหน้าที่บริหารงานทั่วไป', 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['position_code' => '005', 'name' => 'นักวิชาการพัสดุ', 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['position_code' => '006', 'name' => 'นักประชาสัมพันธ์', 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['position_code' => '007', 'name' => 'นักกิจกรรมนักศึกษา', 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['position_code' => '008', 'name' => 'นิติกร', 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['position_code' => '009', 'name' => 'นักวิชาการเงินและบัญชี', 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['position_code' => '010', 'name' => 'นักวิชาการช่างศิลป์', 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['position_code' => '011', 'name' => 'นักวิชาการเครื่องกล', 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['position_code' => '012', 'name' => 'นักวิชาการโสตทัศนศึกษา', 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['position_code' => '013', 'name' => 'นักวิชาการไฟฟ้า', 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['position_code' => '014', 'name' => 'นักวิชาการศึกษา', 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['position_code' => '015', 'name' => 'นักวิชาการคอมพิวเตอร์', 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['position_code' => '016', 'name' => 'บุคลากร ชำนาญการ', 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['position_code' => '017', 'name' => 'สถาปนิก', 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['position_code' => '018', 'name' => 'วิศวกร', 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['position_code' => '019', 'name' => 'วิศวกรโยธา', 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['position_code' => '020', 'name' => 'นักแนะแนวการศึกษาและอาชีพ', 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['position_code' => '021', 'name' => 'พนักงานรักษาความปลอดภัย', 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['position_code' => '022', 'name' => 'แม่บ้าน', 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['position_code' => '023', 'name' => 'ช่างไฟฟ้า', 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['position_code' => '024', 'name' => 'ช่างไม้', 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['position_code' => '025', 'name' => 'ช่างตกแต่งสถานที่', 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['position_code' => '026', 'name' => 'พนักงานช่วยการพยาบาล', 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['position_code' => '027', 'name' => 'พนักงานธุรการ', 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['position_code' => '028', 'name' => 'พนักงานทำความสะอาด', 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['position_code' => '029', 'name' => 'ช่างซ่อมบำรุง', 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['position_code' => '030', 'name' => 'เจ้าหน้าที่ปฏิบัติการ', 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['position_code' => '031', 'name' => 'พนักงานทั่วไป', 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['position_code' => '032', 'name' => 'พนักงานอาคาร', 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['position_code' => '033', 'name' => 'พนักงานสถานที่', 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['position_code' => '034', 'name' => 'พนักงานขับรถยนต์', 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['position_code' => '035', 'name' => 'พนักงานปฏิบัติการโสตทัศนศึกษา', 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['position_code' => '036', 'name' => 'พนักงานปฏิบัติการศิลป์', 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['position_code' => '037', 'name' => 'พนักงานปฏิบัติการระบบปรับอากาศ', 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
        ];

        foreach($positions as $position){
            Position::create($position);
        }
    }
}
