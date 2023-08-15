<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ZipcodeRule;

class ContactRequest extends FormRequest
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
            'family' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'postcode' => ['required', 'postcode'],
            'address' => ['required', 'string', 'max:255'],
            'building_name' => ['string', 'max:255'],
            'opinion' => ['required', 'string', 'max:120'],
        ];
    }

    public function messages()
    {
        return [
            'family.required' => '苗字を入れてください。',
            'family.string' => '苗字を文字列で入れてください。',
            'family.max' => '苗字を255文字以下で入れてください。',
            'name.required' => '名前を入れてください。',
            'name.string' => '名前を文字列で入れてください。',
            'name.max' => '名前を255文字以下で入れてください。',
            'email.required' => 'メールアドレスを入れてください。',
            'email.string' => 'メールアドレスを文字列で入れてください。',
            'email.email' => '有効なメールアドレスを入れてください。',
            'email.max' => 'メールアドレスを255文字以下で入れてください。',
            'postcode.required' => '郵便番号を入れてください。',
            'address.required' => '住所を入れてください。',
            'address.string' => '住所を文字列で入れてください。',
            'address.max' => '苗字を255文字以下で入れてください。',
            'building_name.string' => '建物名を文字列で入れてください。',
            'building_name.max' => '建物名を255文字以下で入れてください。',
            'opinion.required' => 'ご意見を入れてください。',
            'opinion.string' => 'ご意見を文字列で入れてください。',
            'opinion.max' => 'ご意見を255文字以下で入れてください。',
        ];
    }

}
