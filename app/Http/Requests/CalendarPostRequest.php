<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalendarPostRequest extends FormRequest
{
    public function rules()
    {
        return [
            'reminder' => 'required',
            'place' => 'required',
            'grades' => 'required',
            'priorities' => 'required',
            'date' => 'required',
            'time' => 'required',
            'repeat' => 'required',
            'user_id' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'user_id' => 'User'
        ];
    }
}
