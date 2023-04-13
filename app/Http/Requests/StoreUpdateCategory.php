<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateCategory extends FormRequest
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
    $url = $this->segment(2);

    return [
      'title'       => "required|min:3|max:150|unique:categories,title,{$url},url",
      'description' => 'required|min:3|max:255',
    ];
  }

  public function messages()
  {
    return [
      'required'  => 'O campo :attribute é obrigatório.',
      'max'    => 'O campo :attribute ultrapassou a quantidade de caracteres permitida',
      'min'    => 'O campo :attribute nao atende a quantidade de caracteres permitida',
      'unique'    => 'O campo :attribute precisa ser um valor unico',
    ];
  }
}
