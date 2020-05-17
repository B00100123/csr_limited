<?php

use Illuminate\Database\Seeder;
use App\User;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $id = uniqid();
      $user = [
          [
             // 'name'=>'Admin',
             // 'lname'=>'Mukesh',
             // 'email'=>'admin@cospace.pk',
             // 'role_id'=>'1',
             // 'password'=> bcrypt('123456'),
             'id'=>$id,
             'name'=>'Admin',
             'lname'=>'',
             'email'=>'admin@gmail.com',
             'role_id'=>'1',
             'password'=> bcrypt('abc123abc'),
          ]
      ];

      foreach ($user as $key => $value) {
          User::create($value);
      }
    }
}
