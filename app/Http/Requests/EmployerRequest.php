<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployerRequest extends FormRequest
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
            'email' => 'required|email|unique:employers,email,' . $this->route('employer') . ',id|max:255', 
            'telephone' => 'required|string|max:20',
            'date_naissance' => 'required|date',
            'adresse' => 'required|string|max:255',
            'date_recrutement' => 'required|date',
            'type_contrat' => 'required|string|in:CDI,CDD,Freelance',
            'salaire' => 'required|numeric|min:0',
            'statut' => 'required|string|in:actif,inactif',
            'departement_id' => 'required|exists:departements,id',
            'role_id' => 'required|exists:roles,id',
        ];
    }
}
