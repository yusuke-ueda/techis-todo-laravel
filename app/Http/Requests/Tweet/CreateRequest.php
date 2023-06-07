<?php

namespace App\Http\Requests\Tweet;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
        return [
            // formタグのname属性がtweet
            'tweet' => 'required|max:140'
        ];
    }

    // Requestクラスのuser関数でログイン中のユーザーが取得できる
    public function userId(){
        return $this->user()->id;
    }

    public function tweet(){
        return $this->input('tweet');
    }
}
