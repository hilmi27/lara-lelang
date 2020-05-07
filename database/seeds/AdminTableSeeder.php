<?php

use App\Admin;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'admin',
            'email' => 'admin@lelang.test',
            'password' => bcrypt(12345678),
            'unit_kerja' => 'administrasi',
            'jabatan' => 'staff',
            'no_pegawai' => 123456789,
            'role' => 'Administrator'
        ]);
    }
}