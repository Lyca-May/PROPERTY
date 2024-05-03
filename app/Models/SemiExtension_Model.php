<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemiExtension_Model extends Model
{
    use HasFactory;

    protected $table = 'semi_extension';
    protected $primaryKey = 'id';
    protected $fillable = [
    'date',
    'reference',
    'semi_id',
    'issue_qty',
    'transfer_from',
    'office_officer',
    'issue_transfer_disposal',
    'bal_qty',
    'bal_amount',
    'remarks',
    ];
}
