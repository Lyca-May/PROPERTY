<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockCardExtension_Model extends Model
{
    use HasFactory;

    protected $table = 'stock_card_extension';
    protected $primaryKey = 'id';
    protected $fillable = [
    'stock_id',
    'date',
    'reference',
    'issue_qty',
    'office_officer',
    'bal_qty',
    'bal_totalcost',
    'no_of_days',
    'acctg_reference',
    'particulars',
    'issue_unitcost',
    'issue_totalcost',
    'receipt_qty',
    'receipt_unitcost',
    'receipt_totalcost',
    'issue_unitcost',
    'issue_totalcost',
    'bal_unitcost',
    ];
}
