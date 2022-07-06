<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    static $rules=[
        'title' => 'required',
        'start' => 'required',
        'end' => 'required',
        'direction' => 'required',
        'hour' => 'required',
        'color' => 'required'
    ];

    protected $fillable = ['title','start','end','direction','hour','color'];
}