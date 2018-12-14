<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['first_name', 'last_name', 'company', 'email', 'phone'];

    public function saveEmployee($data)
    {
        $this->first_name = $data['first_name'];
        $this->last_name = $data['last_name'];
        $this->company = $data['company'];
        $this->email = $data['email'];
        $this->phone = $data['phone'];
        $this->save();
    }

    public function updateEmployee($data)
    {
        $employee = $this->find($data['id']);
        $employee->first_name = $data['first_name'];
        $employee->last_name = $data['last_name'];
        $employee->company = $data['company'];
        $employee->email = $data['email'];
        $employee->phone = $data['phone'];
        $employee->save();
        return 1;
    }
}
