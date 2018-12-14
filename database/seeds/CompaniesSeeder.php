<?php

use Illuminate\Database\Seeder;
use App\Company;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 20; $i++) {
            Company::create([
                'name' => 'Company ' . $i,
                'email' => 'company' . $i . '@mail.com',
                'logo' => 'default-logo.png',
                'website' => 'company' . $i . '.website.com'
            ]);
        }
    }
}
