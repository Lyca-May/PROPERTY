<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropCardExtension_Model;

class PropCardExtension_Controller extends Controller
{
    //
    public function addPropExt(Request $request){
        $validatedData = $request->validate([
            'prop_id' => 'required',
            'date' => 'required|date',
            'reference' => 'required',
            'receipt_qty' => 'required',
            'receipt_unitcost' => 'required',
            'receipt_totalcost' => 'required',
            'issue_qty' => 'required',
            'office_officer' => 'required',
            'issue_transfer_disposal' => 'required',
            'bal_qty' => 'required',
            'bal_amount' => 'required',
            'remarks' => 'required',
        ], [
            'date.required' => 'The date field is required.',
            'date.date' => 'The date must be a valid date format.',
            'reference.required' => 'The reference field is required.',
            'receipt_qty.required' => 'The receipt qty field is required.',
            'receipt_unitcost.required' => 'The receipt unitcost field is required.',
            'receipt_totalcost.required' => 'The receipt totalcost field is required.',
            'bal_qty.required' => 'The bal qty field is required.',
            'office_officer.required' => 'The office or officer field is required.',
            'issue_transfer_disposal.required' => 'is this an issue, transfer, or disposal?',
            'bal_amount.required' => 'The balance amount field is required.',
            'remarks.required' => 'The remarks field is required.',
        ]);

        // Create a new PropCardExtension instance and fill it with validated data
        $propCardExtension = new PropCardExtension_Model();
        $propCardExtension->prop_id = $validatedData['prop_id'];
        $propCardExtension->date = $validatedData['date'];
        $propCardExtension->reference = $validatedData['reference'];
        $propCardExtension->receipt_qty = $validatedData['receipt_qty'];
        $propCardExtension->receipt_unitcost = $validatedData['receipt_unitcost'];
        $propCardExtension->receipt_totalcost = $validatedData['receipt_totalcost'];
        $propCardExtension->issue_qty = $validatedData['issue_qty'];
        $propCardExtension->office_officer = $validatedData['office_officer'];
        $propCardExtension->issue_transfer_disposal = $validatedData['issue_transfer_disposal'];
        $propCardExtension->bal_qty = $validatedData['bal_qty'];
        $propCardExtension->bal_amount = $validatedData['bal_amount'];
        $propCardExtension->remarks = $validatedData['remarks'];

        // Save the new PropCardExtension instance
        $propCardExtension->save();

        return redirect('/all-property')->with('success', 'Property Card has been created!');
    }

    public function getPropExtData($id)
    {
        // Retrieve the prop_ext data with the given ID
        $propExt = PropCardExtension_Model::findOrFail($id); // Assuming your model is named YourModelName

        // Return the prop_ext data as a JSON response
        return response()->json($propExt);
    }
    public function saveEditedData($id) {
        // Retrieve the prop_ext record with the given ID
        $propExt = PropCardExtension_Model::findOrFail($id);
    
        // Assuming the request data contains the updated values
        $requestData = request()->all();
    
        // Update the prop_ext record with the new values
        $propExt->update($requestData);
    
        // Optionally, you can return a response indicating success
        return response()->json(['message' => 'Data updated successfully']);
    }
    
}
