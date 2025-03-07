<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LeaveRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'start_date' => ['required', 'date', 'after:' . now()->addDays(6)->format('Y-m-d')],
        'end_date' => ['required', 'date', 'after_or_equal:start_date'],
        'total_days' => 'required|numeric|min:1',
        'reason' => 'nullable|string|max:255',

        ];

    }
}
