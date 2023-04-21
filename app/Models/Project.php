<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //ATTENZIONE: importare questo per attivare softDelete

class Project extends Model
{
    use HasFactory;
    use SoftDeletes; //ATTENZIONE: importare questo per attivare softDelete

    protected $fillable = [
        'title',
        'description',
        'website_link',
        'source_code_link',
        'proj_category',
        'client',
        'client_category'
    ];
}
