<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
  
class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
               'name'=>'Admin',
               'email'=>'admin@dmgo.com',
               'type'=>1,
               'password'=> bcrypt('12345678'),
            ],
            [
               'name'=>'Manager',
               'email'=>'manager@dmgo.com',
               'type'=> 2,
               'password'=> bcrypt('12345678'),
            ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}