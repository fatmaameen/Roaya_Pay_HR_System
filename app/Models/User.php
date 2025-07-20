<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }



    /**
     * Relations
     * Users Relations
     */

    // User <-> Contact Info
    public function contactInfos()
    {
        return $this->hasMany(ContactInfo::class, 'user_id');
    }



    // User <-> Salary
    public function salaries()
    {
        return $this->hasMany(Salary::class, 'user_id');
    }



    // User <-> Medicial Insurance
    public function medicalInsurances()
    {
        return $this->hasMany(MedicalIncurance::class, 'user_id');
    }



    // User <-> Bank Account
    public function bankAccounts()
    {
        return $this->hasMany(BankAccount::class, 'user_id');
    }



    // User <-> Employee Info
    public function contactInfo()
    {
        return $this->hasMany(ContactInfo::class, 'user_id');
    }
    
    

    // User <-> Job Detail
    public function jobDetails()
    {
        return $this->hasMany(JobDetail::class, 'user_id');
    }
    

    
    // User <-> Education
    public function education()
    {
        return $this->hasMany(Education::class, 'user_id');
    }



    // User <-> Insurance Info
    public function insuranceInfos()
    {
        return $this->hasMany(InsuranceInfo::class, 'user_id');
    }



    // User <-> Leave Balance
    public function leaveBalances()
    {
        return $this->hasMany(LeaveBalance::class, 'user_id');
    }
    


    // User <-> Leave Logs
    public function leaveLogs()
    {
        return $this->hasMany(LeaveLog::class, 'user_id');
    }



    // User <-> Penalty
    public function penalties()
    {
        return $this->hasMany(Penalty::class, 'user_id');
    }


    
    // User <-> Commission
    public function commissions()
    {
        return $this->hasMany(Commission::class, 'user_id');
    }
    
    
    
    // User <-> Department Head
    public function deapratmentHeads()
    {
        return $this->hasMany(DepartmentHead::class, 'user_id');
    }
    // ===============  End Relations   ============================    //











}
