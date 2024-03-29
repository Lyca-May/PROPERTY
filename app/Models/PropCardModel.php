<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropCardModel extends Model
{
    use HasFactory;
    protected $table = 'property_card';
    protected $primaryKey = 'id';
    protected $fillable = [
        'entity_name',
        'fund_cluster',
        'prop_plant_eq',
        'description',
        'prop_no',
        'date',
        'reference',
        'receipt_qty',
        'issue_qty',
        'issue_office_officer',
        'bal_qty',
        'repair_amount',
        'remarks',
        'obj_acc_code',
        'est_useful_life',
        'rate_of_dep',
        'receipt_unitcost',
        'receipt_totalcost',
        'accumulated_dep',
        'accumulated_impairment_losses',
        'issue_transfers_adjustments',
        'adjusted_code',
        'repair_nature',
    ];

    protected $casts = [
        'date' => 'date',
    ];
}
