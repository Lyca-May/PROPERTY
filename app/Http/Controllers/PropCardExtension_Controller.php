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
            'issue_qty' => 'nullable',
            'office_officer' => 'required',
            'issue_transfer_disposal' => 'required|in:ISSUE,TRANSFER,DISPOSAL',
            'new_bal_qty' => 'nullable',
            'bal_amount' => 'nullable',
            'remarks' => 'required',
        ], [
            'date.required' => 'The date field is required.',
            'date.date' => 'The date must be a valid date format.',
            'reference.required' => 'The reference field is required.',
            'office_officer.required' => 'The office or officer field is required.',
            'issue_transfer_disposal.required' => 'is this an issue, transfer, or disposal?',
            'remarks.required' => 'The remarks field is required.',
        ]);

        // Create a new PropCardExtension instance and fill it with validated data
        $propCardExtension = new PropCardExtension_Model();
        $propCardExtension->prop_id = $validatedData['prop_id'];
        $propCardExtension->date = $validatedData['date'];
        $propCardExtension->reference = $validatedData['reference'];
        $propCardExtension->issue_qty = $validatedData['issue_qty'];
        $propCardExtension->office_officer = $validatedData['office_officer'];
        $propCardExtension->issue_transfer_disposal = $validatedData['issue_transfer_disposal'];
        $propCardExtension->new_bal_qty = $validatedData['new_bal_qty'];
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
    public function deletePropExt($id)
    {
        PropCardExtension_Model::destroy($id);

        return response()->json(['success' => true]); // Return success response
    }

}
