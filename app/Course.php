<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Orderable;

class Course extends Model
{
    use Orderable;
    protected $fillable = ['name', 'description'];
    protected $hidden = ['pivot'];

    public function students() {
        return $this->belongsToMany('App\Student','students_courses');//,
    }
}
