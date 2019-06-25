<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventPostRequest extends FormRequest
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
            'title'=>'required|min:10',
//            'slug'=>'required',
//            'description'=>'required',
//            'event_startdate'=>'required',
//            'event_enddate'=>'required',
//            'event_starttime'=>'required',
//            'event_price'=>'required',
//            'eventcategory_id'=>'required',
//            'status'=>'required',
//            'last_date'=>'required'
        ];
    }
}
