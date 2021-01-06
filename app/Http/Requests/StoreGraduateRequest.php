<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class StoreGraduateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'surname' => 'required',
            'name' => 'required',
            'father_name' => 'required',
            'graduation_year' => 'required|date_format:"Y"|after:1989|before:2050',
            'diploma' => 'required',
            'phone' => 'required_without:email',
            'email' => 'required|email|unique:graduates',
            'website' => 'nullable|url',
            'job' => 'required',
            'employer' => 'required',
            'work_address' => 'required',
            'postal_code' => 'required',
            'city' => 'required',
            'question1' => 'nullable|digits_between:1,2',
            'question4' => 'nullable|digits_between:1,2',
            'other7' => 'required_if:question7,Άλλο',
            'question8' => 'required_with:question8a,question8b,question8c',
            'question8a' => 'exclude_unless:question8,Ναι|required_without:question8b',
            'other8a' => 'required_if:question8a,Άλλο',
            'question8b' => 'exclude_unless:question8,Ναι|required_without:question8a',
            'other8b' => 'required_if:question8b,Άλλο',
            'question25' => 'array|between:1,5'
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            foreach ($this->all() as $key => $value) {
                if (Str::contains($key, 'question')) {
                    $questionnaire[$key] = $value;
                }
            }
            $size = count(array_filter($questionnaire));
            if ($size > 0 && $size < 26) {
                $validator->errors()->add(
                    'questionnaire', 'Παρακαλώ συμπληρώστε όλα τα πεδία του ερωτηματολόγιου ή κανένα!'
                );
            }
        });
    }
}
