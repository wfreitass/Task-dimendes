<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
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
            'title' => ['required'],
            'description' => ['required'],
            'id_user_response' => ['required'],
        ];
    }

    public function messages()
    {
        return [

            'title.required' => 'Campo Obrigatório',
            'description.required' => 'Campo Obrigatório',
            'id_user_response.required' => 'Campo Obrigatório',
        ];
    }
}
