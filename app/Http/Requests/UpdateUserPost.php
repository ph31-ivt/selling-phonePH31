<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserPost extends FormRequest
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
        $id = $this->id;
        return [
            'name' => 'required|max:255',
            'email' => 'required|unique:users,email,'.$id.'|max:255',
            'password' => 'required|min:8|max:255',
            'tel' => 'max:11',
            'address' => 'max:255',
            'active' => 'between:0,1',
            //
        ];
    }
}
