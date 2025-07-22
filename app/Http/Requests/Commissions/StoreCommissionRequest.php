<?php

namespace App\Http\Requests\Commissions;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommissionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'employee_id'           => 'required|exists:employees,id',
            'value'                 => 'required|numeric',
            'on_month'              => 'required',
            'commission_date'       => 'date',
            'note'                  => 'string',
        ];
    }
}
