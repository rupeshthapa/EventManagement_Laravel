<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventDetailsRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'starting_time' => 'required',
            'ending_time' => 'required'
        ];
    }
    public function messages(){
        return[
            'title.required' => 'Title is required.',
            'description.required' => 'Description is required.',
            'starting_time.required' => 'Starting time is required.',
            'ending_time.required' => 'Ending time is required'
        ];
    }
}
