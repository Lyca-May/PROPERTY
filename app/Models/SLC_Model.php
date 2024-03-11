<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SLC_Model extends Model
{
    use HasFactory;
    protected $table = 'supplies_card';
    protected $primaryKey = 'id';
    protected $fillable = ['sc_id', 'bal_qty', 'bal_unitcost', 'bal_totalcost'];
}
