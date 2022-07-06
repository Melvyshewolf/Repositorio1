<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

   

    //Relacion uno a muchos inversa
    public function user(){
        return $this->belongsTo(User::class);
    }
     //Relacion de muchos a uno inversa
     public function event(){
        return $this->belongsToMany(Event::class);
    }
    //Relacion muchos a muchos
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
    //Relacion uno a uno polimofica
    public function photo(){
        return $this->morphOne(Photo::class, 'photoable');
    }
}
