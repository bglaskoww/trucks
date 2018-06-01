<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class PlotsRequest
 *
 * @package App\Http\Requests
 * @author Borislav Glaskov <glaskow.b@gmail.com>
 */
class PlotsRequest extends FormRequest
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
            'name' => 'required|max:255',
            'crop' => 'required|max:255',
            'area' => 'required|integer|min:1',
        ];
    }
}
