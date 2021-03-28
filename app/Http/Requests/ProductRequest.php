<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    private $table            = 'product';
    /**
     * Determine if the product is authorized to make this request.
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
        $task = "add";

        $condName = $condThumb=$condCategory=$condPrice=$condStatus='';

        if(isset($this->changeAttribute))  $task = 'change-attribute';
        if(isset($this->changeDropzone))  $task = 'change-dropzone';
        if(isset($this->changeSpecial))  $task = 'change-special';
        if(isset($this->changeInfo))  $task = 'change-info';
        if(isset($this->changePrice))  $task = 'change-price';
        if(isset($this->changeCategory))  $task = 'change-category';

        switch ($task) {
            case 'add':
                $condName   = "bail|required|between:3,100|unique:$this->table,name";
                $condPrice ="bail|required";
                $condCategory ="bail|required";
//                $condThumb="bail|required";
                break;
            case 'change-info':
                $condName   = "bail|required|between:5,100|unique:$this->table,name,$id";
                break;
            case 'change-special':
                $condStatus="bail|in:active,inactive";
                break;
            case 'change-dropzone':

                break;
            case 'change-price':
                $condPrice="bail|required|integer";
                break;
            case 'change-category':

                break;

            default:
                break;
        }


        return [
            'name' => $condName,
            'status'=>$condStatus,
            'thumb'=>$condThumb,
            'price'=>$condPrice,
            'category_id'=>$condCategory

        ];
    }

    public function messages()
    {
        return [
            // 'name.required' => 'Name không được rỗng',
            // 'name.min'      => 'Name :input chiều dài phải có ít nhất :min ký tứ',
        ];
    }
    public function attributes()
    {
        return [
            // 'description' => 'Field Description: ',
        ];
    }
}
