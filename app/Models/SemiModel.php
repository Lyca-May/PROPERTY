<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemiModel extends Model
{
    use HasFactory;
    protected $table = 'semitbl';
    protected $primaryKey = 'id';
    protected $fillable = [
        'entity_name',
        'desc',
        'fund_cluster',
        'sep_no',
        'sep_name',
        'date',
        'ref',
        'receipt_qty',
        'receipt_unitcost',
        'receipt_totalcost',
        'item_no',
        'issue_qty',
        'office_officer',
        'bal_qty',
        'amount',
        'remarks',
        'uacs_obj_code',
       'bal_amount',
       'remarks',
       'uacs_obj_code',
       'acctg_reference',
       'particulars',
       'it_adjustment',
       'accu_impairment_losses',
       'adj_cost',
       'nature_of_repair',
       'repair_amount',


        'is_clicked',
    ];

    protected $dates = [
        'date',
    ];
}
