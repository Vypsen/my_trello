<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\TypeProject;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         \App\Models\Project::factory(10)->create();

        $user = new User();

        $user->name = 'Sergei';
        $user->email = 's.semenets123@mail.com';
        $user->password = Hash::make(123);

        $user->save();

        $role = new TypeProject();
        $role->name = 'Публичный';
        $role->save();

        $role = new TypeProject();
        $role->name = 'Приватный';
        $role->save();

        $role = new Role();
        $role->name = 'Редактор';
        $role->save();

        $role = new Role();
        $role->name = 'Исполнитель';
        $role->save();
    }
}
