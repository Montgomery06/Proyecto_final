<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loans extends Model
{

    use HasFactory;

    protected $fillable = [
	'user_id',
	'movie_id',
	'loan_date',
	'return_date', 
    'status'
    ];

    public function user(){

        return $this->belongsTo(User::class);
    }

    public function movie(){

        return $this->belongsTo(Movie::class);
    }
}
