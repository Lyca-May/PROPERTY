<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyModel extends Model
{
    use HasFactory;

    protected $table = 'sc_andslc';
    protected $primaryKey = 'id';
    protected $fillable = [
        'entity_name',
        'fund_cluster',
        'item_name',
        'description',
        'unit_of_measurement',
        'item_code',
        'reorder_point',
        'stock_no',
        'date',
        'reference',
        'receipt_qty',
        'receipt_unitcost',
        'receipt_totalcost',
        'issue_qty',
        'issue_unitcost',
        'issue_totalcost',
        'bal_qty',
        'bal_unitcost',
        'bal_totalcost',
        'no_of_days',
    ];
}
