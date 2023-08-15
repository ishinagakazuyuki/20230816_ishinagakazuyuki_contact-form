<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contact;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'fullname',
        'gender',      
        'email',
        'postcode',
        'address',
        'building_name',
        'opinion'
    ];

    public function scopeNameSearch($query, $name)
    {
        if (!empty($name)) {
            $query->where('fullname', 'like', '%' . $name . '%');
        }
    }
        
    public function scopeGenderSearch($query, $gender)
    {
        if (!empty($gender)) {
            $query->where('gender', 'like', '%' . $gender . '%');
        } elseif ($gender === 0) {
            $query->where(function ($q) {
                $q->where('gender', 'like', '%' . 1 . '%');
                $q->orwhere('gender', 'like', '%' . 2 . '%');
            });
        }
    }
    
    public function scopeBeforeSearch($query, $date)
    {
        if (!empty($before) && !empty($after)) {
            $query = Contact::getDate($before, $after);
        } else {
            $query = Contact::get();
        }
    }

    public function scopeAfterSearch($query, $after)
    {
        if (!empty($after)) {
            $query->where('created_at', '=<', '%' . $after . '%');
        } 
    }
    
    public function scopeEmailSearch($query, $email)
    {
        if (!empty($email)) {
            $query->where('email', 'like', '%' . $email . '%');
        }
    }
}
