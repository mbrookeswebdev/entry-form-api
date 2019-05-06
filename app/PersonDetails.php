<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonDetails extends Model
{
    protected $table = 'person_details';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'firstName', 'lastName', 'email', 'mobile', 'gender', 'dob', 'comments', 'finalComments'];
}
