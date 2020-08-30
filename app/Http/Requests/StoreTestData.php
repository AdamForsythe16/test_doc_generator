<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTestData extends FormRequest
{

    public function rules()
    {
        return [
            'test' => 'required',
            'expected_result' => 'required',
            'result' => 'required'
        ];
    }
}
