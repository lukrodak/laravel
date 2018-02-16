<?php

namespace App\Traits;

trait Orderable
{
    public function scopeFirstName($query)
    {
        return $query->orderBy('first_name','asc');
    }

    public function scopeLastName($query)
    {
        return $query->orderBy('last_name','asc');
    }
}