<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Eventcategory;
use App\User;
use App\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();

        factory('App\User',20)->create();
        factory('App\Company',20)->create();
        factory('App\Job',20)->create();
        factory('App\Venue',20)->create();
        factory('App\Event',20)->create();

        $categories = [
            'Techonology',
            'Engineering',
            'Government',
            'Medical',
            'Construction',
            'Software'
        ];

        $eventcategories = [
            'Rock',
            'Jazz',
            'Pop',
            'Soul',
            'Indie'
        ];

        foreach ($categories as $category){
            Category::create(['name'=>$category]);
        }

        foreach ($eventcategories as $eventcategory){
            Eventcategory::create(['name'=>$eventcategory]);
        }

        Role::truncate();
        $adminRole = Role::create(['name' => 'admin']);
        $admin = User::create([
                'name'=>'admin',
                'email'=>'admin@gmail.com',
                'password'=>bcrypt('password123'),
                'email_varified_at'=>NOW()
            ]);

        $admin->roles()->attach($adminRole);
    }
}
