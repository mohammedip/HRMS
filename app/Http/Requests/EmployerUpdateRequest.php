<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployerUpdateRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => "required|email|max:255|unique:employers,email," . $this->employer->id,
            'telephone' => 'required|string|max:20',
            'date_naissance' => 'required|date',
            'adresse' => 'required|string|max:255',
            'date_recrutement' => 'required|date',
            'type_contrat' => 'required|string|in:CDI,CDD,Freelance',
            'salaire' => 'required|numeric|min:0',
            'statut' => 'required|string|in:actif,inactif',
            'grad' => 'required|string|in:Junior,Senior,Lead',
            'department_id' => 'nullable|exists:departments,id',
            'role_id' => 'required|exists:roles,id',
            'emploi_id' => 'nullable|exists:emplois,id',
            'extra_time' => 'required|numeric|min:0',
        ];
    }
}
