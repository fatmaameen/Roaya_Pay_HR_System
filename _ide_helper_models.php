<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\BankAccount
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $bank_account_number
 * @property string|null $issuing_bank_name
 * @property string|null $account_opening_branch
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount query()
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereAccountOpeningBranch($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereBankAccountNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereIssuingBankName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereUserId($value)
 */
	class BankAccount extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Branch
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\JobDetail> $jobDetails
 * @property-read int|null $job_details_count
 * @method static \Illuminate\Database\Eloquent\Builder|Branch newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Branch newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Branch query()
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereUpdatedAt($value)
 */
	class Branch extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Commission
 *
 * @property int $id
 * @property int $user_id
 * @property string $month
 * @property string $value
 * @property string $commission_date
 * @property string $note
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Commission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Commission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Commission query()
 * @method static \Illuminate\Database\Eloquent\Builder|Commission whereCommissionDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commission whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commission whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commission whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commission whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commission whereValue($value)
 */
	class Commission extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ContactInfo
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $address
 * @property string|null $neighborhood
 * @property string|null $governorate
 * @property string|null $personal_phone_number
 * @property string|null $company_phone_number
 * @property string|null $first_relative_phone_number
 * @property string|null $first_relative_relation
 * @property string|null $second_relative_phone_number
 * @property string|null $second_relative_relation
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Employee|null $employee
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInfo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInfo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInfo query()
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInfo whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInfo whereCompanyPhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInfo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInfo whereFirstRelativePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInfo whereFirstRelativeRelation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInfo whereGovernorate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInfo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInfo whereNeighborhood($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInfo wherePersonalPhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInfo whereSecondRelativePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInfo whereSecondRelativeRelation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInfo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInfo whereUserId($value)
 */
	class ContactInfo extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Department
 *
 * @property int $id
 * @property string $department_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Department newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Department newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Department query()
 * @method static \Illuminate\Database\Eloquent\Builder|Department whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Department whereDepartmentName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Department whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Department whereUpdatedAt($value)
 */
	class Department extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DepartmentHead
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property int $head_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\JobDetail> $jobDetails
 * @property-read int|null $job_details_count
 * @method static \Illuminate\Database\Eloquent\Builder|DepartmentHead newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DepartmentHead newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DepartmentHead query()
 * @method static \Illuminate\Database\Eloquent\Builder|DepartmentHead whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DepartmentHead whereHeadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DepartmentHead whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DepartmentHead whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DepartmentHead whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DepartmentHead whereUserId($value)
 */
	class DepartmentHead extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Education
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $educational_qualification
 * @property string|null $specialization
 * @property string|null $graduation_year
 * @property string|null $qualification_authority
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Employee|null $employee
 * @method static \Illuminate\Database\Eloquent\Builder|Education newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Education newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Education query()
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereEducationalQualification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereGraduationYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereQualificationAuthority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereSpecialization($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereUserId($value)
 */
	class Education extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Employee
 *
 * @property int $id
 * @property int $code
 * @property string $first_name
 * @property string $last_name
 * @property string $marital_status
 * @property string $religious
 * @property string $national_number
 * @property string $national_number_release_date
 * @property string $national_number_expire_date
 * @property string $national_number_governorate
 * @property string $nationality
 * @property string $date_of_birth
 * @property string $birth_place
 * @property int $military_service
 * @property int|null $military_number
 * @property int|null $photo
 * @property \App\Models\Salary|null $salary
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ContactInfo|null $contactInfo
 * @property-read \App\Models\Education|null $education
 * @property-read \App\Models\EmployeeInfo|null $employeeInfo
 * @property-read \App\Models\InsuranceInfo|null $insuranceInfo
 * @property-read \App\Models\JobDetail|null $jobDetail
 * @property-read \App\Models\MedicalIncurance|null $medicalIncurance
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee query()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereBirthPlace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereDateOfBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereMaritalStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereMilitaryNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereMilitaryService($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereNationalNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereNationalNumberExpireDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereNationalNumberGovernorate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereNationalNumberReleaseDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereNationality($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereReligious($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereUpdatedAt($value)
 */
	class Employee extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\EmployeeInfo
 *
 * @property int $id
 * @property int $user_id
 * @property string $qualification
 * @property string $birth_certificate
 * @property string $national_id
 * @property string $military_certificate
 * @property string $experience_certificate
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Employee|null $employee
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeInfo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeInfo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeInfo query()
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeInfo whereBirthCertificate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeInfo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeInfo whereExperienceCertificate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeInfo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeInfo whereMilitaryCertificate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeInfo whereNationalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeInfo whereQualification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeInfo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeInfo whereUserId($value)
 */
	class EmployeeInfo extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\InsuranceInfo
 *
 * @property int $id
 * @property int $user_code
 * @property string|null $insurance_number
 * @property string|null $start_date
 * @property int $job_id
 * @property int $insurance_id
 * @property string|null $insurance_premium_value
 * @property string|null $end_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Employee|null $employee
 * @property-read \App\Models\Job $job
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceInfo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceInfo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceInfo query()
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceInfo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceInfo whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceInfo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceInfo whereInsuranceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceInfo whereInsuranceNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceInfo whereInsurancePremiumValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceInfo whereJobId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceInfo whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceInfo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InsuranceInfo whereUserCode($value)
 */
	class InsuranceInfo extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Job
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\InsuranceInfo> $insuranceInfos
 * @property-read int|null $insurance_infos_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\JobDetail> $jobDetails
 * @property-read int|null $job_details_count
 * @method static \Illuminate\Database\Eloquent\Builder|Job newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Job newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Job query()
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereUpdatedAt($value)
 */
	class Job extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\JobDetail
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $appointment_date
 * @property int $job_id
 * @property int $department_id
 * @property int $branch_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Branch|null $branch
 * @property-read \App\Models\Department $department
 * @property-read \App\Models\Employee|null $employee
 * @property-read \App\Models\Job $job
 * @method static \Illuminate\Database\Eloquent\Builder|JobDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JobDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JobDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|JobDetail whereAppointmentDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobDetail whereBranchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobDetail whereDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobDetail whereJobId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobDetail whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobDetail whereUserId($value)
 */
	class JobDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\LeaveBalance
 *
 * @property int $id
 * @property int $user_id
 * @property int $leave_balance
 * @property int $e3tyade
 * @property int $3arda
 * @property string $balance_due_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveBalance newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveBalance newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveBalance query()
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveBalance where3arda($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveBalance whereBalanceDueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveBalance whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveBalance whereE3tyade($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveBalance whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveBalance whereLeaveBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveBalance whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveBalance whereUserId($value)
 */
	class LeaveBalance extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\LeaveLog
 *
 * @property int $id
 * @property int $user_id
 * @property string $type
 * @property int $days_number
 * @property string $date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveLog whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveLog whereDaysNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveLog whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveLog whereUserId($value)
 */
	class LeaveLog extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MedicalIncurance
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $documnet_number
 * @property string|null $start_date
 * @property string|null $insurance_company_name
 * @property string|null $insured_sim
 * @property string|null $insurance_premium_value
 * @property string|null $end_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Employee|null $employee
 * @method static \Illuminate\Database\Eloquent\Builder|MedicalIncurance newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MedicalIncurance newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MedicalIncurance query()
 * @method static \Illuminate\Database\Eloquent\Builder|MedicalIncurance whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MedicalIncurance whereDocumnetNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MedicalIncurance whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MedicalIncurance whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MedicalIncurance whereInsuranceCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MedicalIncurance whereInsurancePremiumValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MedicalIncurance whereInsuredSim($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MedicalIncurance whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MedicalIncurance whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MedicalIncurance whereUserId($value)
 */
	class MedicalIncurance extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Penalty
 *
 * @property int $id
 * @property int $user_id
 * @property string $value
 * @property string $reason
 * @property string $date_of_action
 * @property string $on_month
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Penalty newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Penalty newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Penalty query()
 * @method static \Illuminate\Database\Eloquent\Builder|Penalty whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Penalty whereDateOfAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Penalty whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Penalty whereOnMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Penalty whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Penalty whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Penalty whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Penalty whereValue($value)
 */
	class Penalty extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Salary
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $total_salary
 * @property string|null $main_salary
 * @property string|null $transfer_allowance
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Employee|null $employee
 * @method static \Illuminate\Database\Eloquent\Builder|Salary newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Salary newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Salary query()
 * @method static \Illuminate\Database\Eloquent\Builder|Salary whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Salary whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Salary whereMainSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Salary whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Salary whereTotalSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Salary whereTransferAllowance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Salary whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Salary whereUserId($value)
 */
	class Salary extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

