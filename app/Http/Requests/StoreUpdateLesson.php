<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateLesson extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $uuid = $this->lesson ?? '';

        return [
            'name' => ['required','min:3','max:255',"unique:lessons,name,$uuid,uuid"],
            'module' => ['required', 'exists:modules,uuid'],
            'video' => ['required','min:3','max:255',"unique:lessons,video,$uuid,uuid"],
            'description' => ['nullable', 'min:3', 'max:9999']
        ];
    }
}
