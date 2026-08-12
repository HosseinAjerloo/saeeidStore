<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        for ($i=1;$i<=30;$i++){
            User::create([
                'name'=>'hossein'.$i,
                'family'=>'ajerloo'.$i,
                'mobile'=>'09186414452'.$i,
                'phone'=>'08632786560',
                'national_id_number'=>'0521378680'.$i,
                'is_active'=>1,
                'email'=>'ahosseinajerloo'.$i.'.@gmail.com',
                'gender'=>'male',
                'password'=>'hr_hon4774',
                'type'=>'admin'
            ]);
        }
    }
}
