<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'reports';
    
    protected $fillable = [
        'company_name', 'report_title', 'employee_name', 'report_date',
        'duration', 'tasks', 'comments'
    ];
}
