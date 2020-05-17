<?php

use Illuminate\Database\Seeder;
use App\Role;

class CreateRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role = [
          [
             'role'=>'admin'
          ],
          [
             'role'=>'user'
          ]
      ];

      foreach ($role as $key => $value) {
          Role::create($value);
      }
    }
}
