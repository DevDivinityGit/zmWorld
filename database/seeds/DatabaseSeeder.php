<?php

use Illuminate\Database\Seeder;
use App\User;

use App\Plan;
use App\Task;
use App\Role;
use App\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $raw = DB::raw("ALTER TABLE users DROP COLUMN stripe_id");
        DB::statement($raw);

        $raw = DB::raw("ALTER TABLE users DROP COLUMN card_brand");
        DB::statement($raw);


        $raw = DB::raw("ALTER TABLE users DROP COLUMN trial_ends_at");
        DB::statement($raw);

        $raw = DB::raw("ALTER TABLE users DROP COLUMN card_last_four");
        DB::statement($raw);








        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);


        Plan::create([
           'name' => 'vip1',
           'description' => 'the vip 1',
           'price' => 100,
           'limit' => 2,
            'task_price' => 10,
        ]);


        Plan::create([
            'name' => 'vip2',
            'description' => 'the vip 2',
            'price' => 200,
            'limit' => 5,
            'task_price' => 10,
        ]);


        Plan::create([
            'name' => 'vip3',
            'description' => 'the vip 3',
            'price' => 900,
            'limit' => 10,
            'task_price' => 10,
        ]);




        Category::create(['name' => 'Youtube']);
        Category::create(['name' => 'Facebook']);
        Category::create(['name' => 'Tiktok']);


        $link = "http://127.0.0.1:8000";

        Task::create(['description' => 'the description', 'name' => 'task one',  'category_id' => 1, 'task_link' => $link, 'demand' => 10, 'remaining' => 10]);
        Task::create(['description' => 'the description', 'name' => 'task two',  'category_id' => 1, 'task_link' => $link, 'demand' => 10, 'remaining' => 10]);




                Task::create(['description' => 'the description', 'name' => 'task three',  'category_id' => 1, 'task_link' => $link, 'demand' => 10, 'remaining' => 10]);
        Task::create(['description' => 'the description', 'name' => 'task four',  'category_id' => 1, 'task_link' => $link, 'demand' => 10, 'remaining' => 10]);
        Task::create(['description' => 'the description', 'name' => 'task five',  'category_id' => 1, 'task_link' => $link, 'demand' => 10, 'remaining' => 10]);
        Task::create(['description' => 'the description', 'name' => 'task six',  'category_id' => 1, 'task_link' => $link, 'demand' => 10, 'remaining' => 10]);
        Task::create(['description' => 'the description', 'name' => 'task seven',  'category_id' => 1, 'task_link' => $link, 'demand' => 10, 'remaining' => 10]);
        Task::create([ 'description' => 'the description', 'name' => 'task eight',  'category_id' => 1, 'task_link' => $link, 'demand' => 10, 'remaining' => 10]);
        Task::create(['description' => 'the description', 'name' => 'task nine',  'category_id' => 1, 'task_link' => $link, 'demand' => 10, 'remaining' => 10]);
        Task::create(['description' => 'the description', 'name' => 'task ten',  'category_id' => 1, 'task_link' => $link, 'demand' => 10, 'remaining' => 10]);
        Task::create(['description' => 'the description', 'name' => 'task eleven',  'category_id' => 1, 'task_link' => $link, 'demand' => 10, 'remaining' => 10]);
        Task::create(['description' => 'the description', 'name' => 'task twelve',  'category_id' => 1, 'task_link' => $link, 'demand' => 10, 'remaining' => 10]);
        Task::create(['description' => 'the description', 'name' => 'task 13',  'category_id' => 1, 'task_link' => $link, 'demand' => 10, 'remaining' => 10]);
        Task::create(['description' => 'the description', 'name' => 'task 14',  'category_id' => 1, 'task_link' => $link, 'demand' => 10, 'remaining' => 10]);
        Task::create(['description' => 'the description', 'name' => 'task 15',  'category_id' => 1, 'task_link' => $link, 'demand' => 10, 'remaining' => 10]);
        Task::create(['description' => 'the description', 'name' => 'task 16',  'category_id' => 1, 'task_link' => $link, 'demand' => 10, 'remaining' => 10]);
        Task::create(['description' => 'the description', 'name' => 'task 17',  'category_id' => 1, 'task_link' => $link, 'demand' => 10, 'remaining' => 10]);
        Task::create(['description' => 'the description', 'name' => 'task 18',  'category_id' => 1, 'task_link' => $link, 'demand' => 10, 'remaining' => 10]);
        Task::create(['description' => 'the description', 'name' => 'task 19',  'category_id' => 1, 'task_link' => $link, 'demand' => 10, 'remaining' => 10]);
        Task::create(['description' => 'the description', 'name' => 'task 20',  'category_id' => 1, 'task_link' => $link, 'demand' => 10, 'remaining' => 10]);















        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin'),
            'role_id' => 1,
            'invitation_code' => $this->generateRandomString(),

        ]);



        User::create([
            'name' => 'Hassnain',
            'email' => 'hass@gmail.com',
            'password' => bcrypt('ffffff'),
            'invitation_code' => $this->generateRandomString(),
        ]);



        User::create([
            'name' => 'Osman',
            'email' => 'osmangmail.com',
            'password' => bcrypt('ffffff'),
            'invitation_code' => $this->generateRandomString(),
        ]);














//         $this->call(UserTableSeeder::class);
//         $this->call(RoleTableSeeder::class);
//         $this->call(userTableSeeder::class);
//         $this->call(CategoryTableSeeder::class);
//         $this->call(ProductTableSeeder::class);
    }

    public  function generateRandomString($length = 20) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }


}
