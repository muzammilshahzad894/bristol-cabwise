<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddFleetRequest extends FormRequest
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
            'about_car' => 'required',
            'price' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'max_passengers' => 'required',
            'max_suitecases' => 'required',
            'max_hand_luggage' => 'required',
            'min_booking_price' => 'required',
            'price_after_10_miles' => 'required',
            'price_after_20_miles' => 'required',
            'price_after_30_miles' => 'required',
            'price_after_40_miles' => 'required',
            'price_after_50_miles' => 'required',
            'price_after_100_miles' => 'required',
            'price_after_120_miles' => 'required',
            'price_after_150_miles' => 'required',
            'detail_page_description' => 'required',
            'features' => 'sometimes|nullable',
        ];
    }
}
