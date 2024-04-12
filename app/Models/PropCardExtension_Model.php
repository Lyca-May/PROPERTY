<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropCardExtension_Model extends Model
{
    use HasFactory;
    protected $table = 'property_card_extenstions';
    protected $primaryKey = 'id';
    protected $fillable = [
        'prop_id',
        'date',
        'reference',
        'receipt_qty',
        'receipt_unitcost',
        'receipt_totalcost',
        'issue_qty',
        'office_officer',
        'issue_transfer_disposal',
        'bal_qty',
        'bal_amount',
        'remarks',
    ];
}
