<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $guarded = ['id'];



    public function contactInfo()
    {
        return $this->hasOne(ContactInfo::class, 'employee_id');
    }


    public function medicalIncurance()
    {
        return $this->hasOne(MedicalIncurance::class);
    }


    public function education()
    {
        return $this->hasOne(Education::class);
    }


    public function jobDetail()
    {
        return $this->hasOne(JobDetail::class);
    }


    public function insuranceInfo()
    {
        return $this->hasOne(InsuranceInfo::class);
    }


    public function employeeInfo()
    {
        return $this->hasOne(EmployeeInfo::class);
    }


    public function bankAccount()
    {
        return $this->hasOne(BankAccount::class);
    }


    // ===  Commissions 
    public function commissions()
    {
        return $this->hasMany(Commission::class, 'employee_id');
    }


    // ===  Salary
    public function salary()
    {
        return $this->hasMany(Salary::class, 'employee_id');
    }


    // ===  Penalities
    public function penalities()
    {
        return $this->hasMany(Penalty::class, 'employee_id');
    }



    // ===============  End Relations   ============================    //


}
