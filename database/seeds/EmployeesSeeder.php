<?php

use Illuminate\Database\Seeder;
use App\Employee;
use App\Company;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Get companies id from set in Employee
        $companies = Company::select('id')->get();
        $countc = count($companies)-1;

        for ($i=1; $i < 20; $i++) {
            Employee::create([
                'first_name' => 'Name' . $i,
                'last_name' => 'LastName' . $i,
                'company' => $companies[rand(0, $countc)]->id,
                'email' => 'employee' . $i . '@mail.com',
                'phone' => '+8 093' . random_int(100, 999) . random_int(10, 99) . random_int(10, 99)
            ]);
        }
    }
}
