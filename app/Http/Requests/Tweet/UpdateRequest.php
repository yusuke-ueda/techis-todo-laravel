<?php

namespace App\Http\Requests\Tweet;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            // fomrタグのname属性がtweet
            'tweet'=>'required|max:140',
        ];
    }

    public function tweet(){
        return $this->input('tweet');
    }

    public function id(){
        return $this->route('tweetId');
    }
}
