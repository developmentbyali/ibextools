<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class)->create([
            'name' => 'Adeel',
            'email' => 'admin@techlo9.com',
            'type' => 'admin',
            'created_at'=>'2020-12-26 12:26:25']);
        factory(App\User::class)->create([
            'name' => 'Moeed Ahmad',
            'email' => 'moeed@techlo9.com',
            'type' => 'editor',
            'created_at'=>'2020-12-26 12:26:25']);
        factory(App\User::class)->create([
            'name' => 'Zaheer',
            'email' => 'zaheer@techlo9.com',
            'type' => 'editor',
            'created_at'=>'2020-12-26 12:26:25']);
        factory(App\User::class)->create([
            'name' => 'Muhammad Umair Shoukat',
            'type' => 'admin',
            'email' => 'm.umair.shoukat@techlo9.com',
            'created_at'=>'2020-12-26 12:26:25']);
        factory(App\User::class)->create([
            'name' => 'Haris Arif',
            'type' => 'editor',
            'email' => 'haris.arif@techlo9.com',
            'created_at'=>'2020-12-26 12:26:25']);
    }
}
