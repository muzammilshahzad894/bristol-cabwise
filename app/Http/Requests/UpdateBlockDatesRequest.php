<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlockDatesRequest extends FormRequest
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
            'name' => 'required',
            'date_range' => 'required',
            'from_time' => [
                'sometimes',
                'nullable',
                'date_format:H:i',
                function ($attribute, $value, $fail) {
                    if ($value && !$this->to_time) {
                        $fail('The to_time field is required when from_time is present.');
                    }
                }
            ],
            'to_time' => [
                'sometimes',
                'nullable',
                'date_format:H:i',
                'after:from_time',
                function ($attribute, $value, $fail) {
                    if ($value && !$this->from_time) {
                        $fail('The from_time field is required when to_time is present.');
                    }
                }
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'date_range.required' => 'Date range is required',
            'from_time.date_format' => 'From time should be in H:i format',
            'to_time.date_format' => 'To time should be in H:i format',
            'to_time.after' => 'To time should be greater than from time',
            'from_time.required_with' => 'From time is required when to time is present',
            'to_time.required_with' => 'To time is required when from time is present'
        ];
    }
}
