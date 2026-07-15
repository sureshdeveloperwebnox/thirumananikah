<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class PartnerExpectationRequest extends FormRequest
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
     * Prepare the data for validation.
     * Extract the numeric value from height and weight strings.
     */
    protected function prepareForValidation()
    {
        if ($this->has('partner_height') && $this->partner_height !== null) {
            $height = $this->partner_height;
            if (preg_match('/^\s*([0-9]+(?:\.[0-9]+)?)/', $height, $matches)) {
                $this->merge([
                    'partner_height' => $matches[1]
                ]);
            }
        }

        if ($this->has('partner_weight') && $this->partner_weight !== null) {
            $weight = $this->partner_weight;
            if (preg_match('/^\s*([0-9]+(?:\.[0-9]+)?)/', $weight, $matches)) {
                $this->merge([
                    'partner_weight' => $matches[1]
                ]);
            }
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'general'                      => ['nullable'],
            'partner_height'               => ['nullable', 'numeric', 'between:0,300'],
            'partner_weight'               => ['nullable', 'numeric', 'between:0,500'],
            'partner_marital_status'       => ['nullable'],
            'partner_children_acceptable'  => ['nullable', 'max:20'],
            'residence_country_id'         => ['nullable'],
            'partner_religion_id'          => ['nullable'],
            'smoking_acceptable'           => ['nullable', 'max:20'],
            'drinking_acceptable'          => ['nullable', 'max:20'],
            'partner_diet'                 => ['nullable', 'max:50'],
            'partner_manglik'              => ['nullable', 'max:50'],
            'language_id'                  => ['nullable'],
            'partner_country_id'           => ['nullable'],
            'partner_state_id'             => ['nullable'],
            'partner_city_id'              => ['nullable'],
            'pertner_complexion'           => ['nullable', 'max:50'],
            'partner_caste_id'             => ['nullable'],
            'partner_sub_caste_id'         => ['nullable'],
            'pertner_education'            => ['nullable'],
            'partner_profession'           => ['nullable'],
            'partner_body_type'            => ['nullable'],
            'partner_personal_value'       => ['nullable'],
            'family_value_id'              => ['nullable'],
        ];
    }

    public function failedValidation(Validator $validator)
    {
        // dd($this->expectsJson());
        if ($this->expectsJson()) {
            throw new HttpResponseException(response()->json([
                'message' => $validator->errors()->all(),
                'result' => false
            ], 422));
        } else {
            throw (new ValidationException($validator))
                ->errorBag($this->errorBag)
                ->redirectTo($this->getRedirectUrl());
        }
    }
}
