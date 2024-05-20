<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SEPLC_Model extends Model
{
    use HasFactory;
    protected $table = 'seplc';
    protected $primaryKey = 'id';
    protected $fillable = [
    'seplc_id',
    'date',
    'reference',
    'uacs_obj_code',
    'particulars',
    'receipt_qty',
    'receipt_unitcost',
    'receipt_totalcost',
    'it_adjustment',
    'accu_impairment_losses',
    'nature_of_repair',
    'repair_amount',
    'status',
    ];

    public function seplc()
    {
        return $this->belongsTo(SemiModel::class, 'seplc_id', 'id');
    }
}
