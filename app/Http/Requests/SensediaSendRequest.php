<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SensediaSendRequest extends FormRequest
{

    /**
     * Indicates if the validator should stop on the first rule failure.
     *
     * @var bool
     */
    protected $stopOnFirstFailure = true;

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
            'id_unidade' => 'required|integer',
            'id_empresa' => 'required|integer',
            'id_template' => 'required|integer',
            'email' => 'required|email',
            'urladitamento' => 'sometimes|url',
            'urlapoliceseguro' => 'sometimes|url',
            'urlcadastropositivo' => 'sometimes|url',
            'urlpagamento' => 'sometimes|url',
            'urlregulamento' => 'sometimes|url',
            'urlpi' => 'sometimes|url',
            'urlproposta' => 'sometimes|url'
        ];
    }
}
