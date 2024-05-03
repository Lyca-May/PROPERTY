<?php

namespace App\Http\Controllers;

use App\Models\SemiExtension_Model;
use Illuminate\Http\Request;

class SemiExtension_Controller extends Controller
{
    public function addSemiExt(Request $request){
        $validatedData = $request->validate([
            'semi_id' => 'required',
            'date' => 'required|date',
            'reference' => 'required',
            'issue_qty' => 'required',
            'transfer_from' => 'nullable',
            'office_officer' => 'required',
            'issue_transfer_disposal' => 'required',
            'bal_qty' => 'nullable',
            'bal_amount' => 'nullable',
            'remarks' => 'nullable',
        ], [
            'date.required' => 'The date field is required.',
            'date.date' => 'The date must be a valid date format.',
            'reference.required' => 'The reference field is required.',
            'issue_qty.required' => 'The issue qty field is required.',
            'transfer_from.required' => 'Transfer From?',
            'office_officer.required' => 'The office or officer field is required.',
            'bal_qty.required' => 'The Balance Qty field is required.',
            'bal_amount.required' => 'The Balance Amount field is required.',
            'remarks.required' => 'Remarks field is required.',
            'issue_transfer_disposal.required' => 'Is this issue, transfer, or disposal?',
        ]);

        $semiExtension = new SemiExtension_Model();
        $semiExtension->semi_id = $validatedData['semi_id'];
        $semiExtension->date = $validatedData['date'];
        $semiExtension->reference = $validatedData['reference'];
        $semiExtension->issue_qty = $validatedData['issue_qty'];
        $semiExtension->transfer_from = $validatedData['transfer_from'];
        $semiExtension->office_officer = $validatedData['office_officer'];
        $semiExtension->bal_qty = $validatedData['bal_qty'];
        $semiExtension->bal_amount = $validatedData['bal_amount'];
        $semiExtension->issue_transfer_disposal = $validatedData['issue_transfer_disposal'];
        $semiExtension->remarks = $validatedData['remarks'];

        // Save the new semiExtension instance
        $semiExtension->save();

        return redirect('/all-semi-expendable')->with('success', 'Semi Card has been created!');
    }
}
