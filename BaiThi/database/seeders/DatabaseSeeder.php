<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('posts')->insert([
            [
                'product_code'=>'125',
                'name'=>'San pham 1',
                'price'=>'$200',
                'avatar'=>null,
            ] ,
            [
                'product_code'=>'126',
                'name'=>'San pham 2',
                'price'=>'$300',
                'avatar'=>null,
            ] ,
            [
                'product_code'=>'127',
                'name'=>'San pham 3',
                'price'=>'$150',
                'avatar'=>null,
            ] ,
            [
                'product_code'=>'128',
                'name'=>'San pham 4',
                'price'=>'$50',
                'avatar'=>null,
            ] ,
            [
                'product_code'=>'129',
                'name'=>'San pham 5',
                'price'=>'$1200',
                'avatar'=>null,
            ] ,
        ]);
    }
}
