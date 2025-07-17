<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
     protected $table = 'personal_employee_data';

    protected $primaryKey = 'employee_code';
    public $incrementing = false; // لأن المفتاح الأساسي ليس auto-increment
    protected $keyType = 'int';

    protected $fillable = [
        'employee_code',
        'first_name',
        'last_name',
        'marital_status',
        'religion',
        'national_id_number',
        'data_of_issue',
        'issue_record',
        'governorate_of_issue',
        'nationality',
        'date_of_birth',
        'place_of_birth',
        'military_service',
        'three_party_military_id_num',
        'personal_photo',
    ];

    // العلاقة مع المؤهلات العلمية
    // public function scientificData(): HasOne
    // {
    //     return $this->hasOne(ScientificData::class, 'employee_code', 'employee_code');
    // }

    // // العلاقة مع التفاصيل الوظيفية
    // public function jobDetails(): HasOne
    // {
    //     return $this->hasOne(JobDetails::class, 'employee_code', 'employee_code');
    // }

    // // العلاقة مع الحسابات البنكية
    // public function bankAccounts(): HasMany
    // {
    //     return $this->hasMany(BankAccount::class, 'employee_code', 'employee_code');
    // }

    // // العلاقة مع المرتبات
    // public function salaries(): HasMany
    // {
    //     return $this->hasMany(Salary::class, 'employee_code', 'employee_code');
    // }

    // // العلاقة مع بيانات الاتصال
    // public function contactInformation(): HasOne
    // {
    //     return $this->hasOne(ContactInformation::class, 'employee_code', 'employee_code');
    // }

    // // العلاقة مع مرفقات الموظف
    // public function attachments(): HasOne
    // {
    //     return $this->hasOne(EmployeeDataAttatchment::class, 'employee_code', 'employee_code');
    // }

    // // العلاقة مع العقوبات
    // public function sanctions(): HasMany
    // {
    //     return $this->hasMany(SanctionData::class, 'employee_code', 'employee_code');
    // }

    // // العلاقة مع بيانات التأمين الطبي
    // public function medicalInsurance(): HasMany
    // {
    //     return $this->hasMany(MedicalInsuranceData::class, 'employee_code', 'employee_code');
    // }

    // // العلاقة مع بيانات التأمين الاجتماعي
    // public function socialSecurity(): HasMany
    // {
    //     return $this->hasMany(SocialSecurityData::class, 'employee_code', 'employee_code');
    // }

    // // العلاقة مع بيانات العمولات
    // public function commissions(): HasMany
    // {
    //     return $this->hasMany(CommissionData::class, 'employee_code', 'employee_code');
    // }

    // // العلاقة مع الإجازات
    // public function vacations(): HasMany
    // {
    //     return $this->hasMany(VacationData::class, 'employee_code', 'employee_code');
    // }
}
