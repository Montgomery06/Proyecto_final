<?php

namespace Database\Seeders;

use App\Models\Loans;
use Illuminate\Database\Seeder;

class LoansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$loans = new Loans();
    	$loans->user_id = 2;
    	$loans->movie_id = 1;
    	$loans->loan_date = date('Y-m-d H:i:s');
    	$loans->return_date = date('Y-m-d H:i:s');
    	$loans->save();
        //
    }
}
