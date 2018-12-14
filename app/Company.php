<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name', 'email', 'logo', 'website'];

    public function saveCompany($data)
    {
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->website = $data['website'];
        $this->logo = $data['logo']->getClientOriginalName();
        $this->save();
        return 1;
    }

    public function updateCompany($data)
    {
        $company = $this->find($data['id']);
        $company->name = $data['name'];
        $company->email = $data['email'];
        $company->website = $data['website'];
        $company->logo = $data['logo']->getClientOriginalName();
        $company->save();
        return 1;
    }
}
