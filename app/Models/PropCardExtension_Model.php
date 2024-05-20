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
        'transfer_dropdown',
        'office_officer',
        'issue_transfer_disposal',
        'new_bal_qty',
        'bal_amount',
        'remarks',
        'obj_acc_code',
        'est_useful_life',
        'acctg_reference',
        'particulars',
        'rate_of_dep',
        'accu_dep',
        'accu_impairment_losses',
        'it_adjustments',
        'adj_cost',
        'repair_nature',
        'repair_amount'
    ];

    // Define the relationship
    public function propertyCard()
    {
        return $this->belongsTo(PropCardModel::class, 'prop_id', 'id');
    }
}
