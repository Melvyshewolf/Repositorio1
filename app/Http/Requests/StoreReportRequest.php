<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->user_id == auth()->user()->id) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
       $rules = [
        'title' => 'required',
        
        'latitude' => 'required',
        'longitude' => 'required',
        'status' => 'required|in:1,2',
        'user_id' => 'required',
        'event_id' => 'required',
        'file' => 'image'
       ];

       if($this->status == 2){
           $rules = array_merge($rules, [
               'user_id' => 'required',
               'event_id' => 'required',
               'tags' => 'required',
               'description' => 'required'
           ]);
       }
       return $rules;
    }
}
