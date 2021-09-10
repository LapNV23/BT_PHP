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
        DB::table('users')->insert([
            [
                'id_card'=>'125920214',
                'name'=>'Nguyen Van Lap',
                'date_year'=>'23/10/2002',
                'address'=>'Thai Binh',
                'phone'=>'0398408820',
                'allergy_history'=>'Chua co tien su nao',
            ] ,
            [
                'id_card'=>'12548113',
                'name'=>'Nguyen Quang Anh',
                'date_year'=>'12/11/2002',
                'address'=>'Ninh Binh',
                'phone'=>'0386684837',
                'allergy_history'=>'Chua co tien su nao',
            ] ,
            [
                'id_card'=>'216487412',
                'name'=>'Nguyen Van A',
                'date_year'=>'2/1/2002',
                'address'=>'Ha Noi',
                'phone'=>'094874554',
                'allergy_history'=>'Tung tiep xuc f1',
            ] ,
            [
                'id_card'=>'124579413',
                'name'=>'Ngo Van B',
                'date_year'=>'2/11/1998',
                'address'=>'Bac Giang',
                'phone'=>'034871297',
                'allergy_history'=>'Tung la F0',
            ] ,
            [
                'id_card'=>'13649749',
                'name'=>'Nguyen Van B',
                'date_year'=>'2/2/1996',
                'address'=>'Ho Chi Minh',
                'phone'=>'039698754',
                'allergy_history'=>'Tiep xuc voi F2',
            ] ,
        ]);
    }
}
