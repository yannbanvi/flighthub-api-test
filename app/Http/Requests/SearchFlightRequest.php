<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchFlightRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {

        $rules = [
            "departure_airport" => "required",
            "departure_date" => "required",
            "total_price" => "nullable",
            "airline" => "nullable",
            "per_page" => "nullable",
            "trip_type" => "required"
        ];

        if($this->attributes->has("trip_type") &&
            strtolower($this->attributes->get("trip_type")) == "rt"){
            $rules["arrival_airport"] = "required";
            $rules["return_date"] = "required";
        }
        return $rules;
    }
}
