<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticlesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *f
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
            // 유효성 체크 필드 설정 룰 저장
            'title' => ['required'],    // '필드' => ['검사 조건']
            'content' => ['required', 'min:10'],
        ];
    }

    public function messages()
    {
        return [
            // :attribute -> placeholder
            'required' => ':attribute 은/는 필수 입력 항목입니다.',
            // :min -> placeholder
            'content.min' => '본문은 최소 :min 글자 이상이 필요합니다.',
        ];
    }

    public function attributes()
    {
        return [
            'title' => '제목',
            'content' => '내용',
        ];
    }

}
