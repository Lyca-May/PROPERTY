<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropCardExtension_Model;
use App\Models\PropCardModel;
use Illuminate\Support\Facades\Log;

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
            'issue_transfer_disposal' => 'required|in:ISSUE,TRANSFER,RETURN',
            'transfer_dropdown' => 'nullable',
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
        $propCardExtension->transfer_dropdown = $validatedData['transfer_dropdown'];
        $propCardExtension->new_bal_qty = $validatedData['new_bal_qty'];
        $propCardExtension->bal_amount = $validatedData['bal_amount'];
        $propCardExtension->remarks = $validatedData['remarks'];

        // Save the new PropCardExtension instance
        $propCardExtension->save();

        $officer = $request->input('officer');
        $newIssueQty = $request->input('newIssueQty');

        Log::info('Selected officer:', ['officer' => $officer]);
        Log::info('Issue Qty:', ['newIssueQty' => $newIssueQty]);

        $propCard = PropCardExtension_Model::where('office_officer', $officer)->get();

        if ($propCard->isNotEmpty()) {
            foreach ($propCard as $item) {
                // Modify the issue_qty property of each item if needed
                $item->issue_qty = $newIssueQty;
                // Save the changes to the database
                $item->save();
            }

            Log::info('Issue quantity updated successfully for PropCard collection.');
        } else {
            Log::info('No PropCard items found for the given office officer.');
        }
         return response()->json(['success' => 'Property Card has been created!']);

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

    public function getOfficerIssueQty(Request $request)
    {
        $selectedOfficer = $request->input('officer');

        // Fetch the issue_qty of the selected officer from the database
        $officer = PropCardExtension_Model::where('office_officer', $selectedOfficer)->first();

        if ($officer) {
            $issueQty = $officer->issue_qty;
            return response()->json(['success' => true, 'issue_qty' => $issueQty]);
        } else {
            return response()->json(['success' => false, 'message' => 'Officer not found'], 404);
        }
    }
    public function getDisposalIssueQty(Request $request)
    {
        $selectedOfficer = $request->input('officer');

        // Fetch the issue_qty of the selected officer from the database
        $officer = PropCardExtension_Model::where('office_officer', $selectedOfficer)->first();

        if ($officer) {
            $issueQty = $officer->issue_qty;
            return response()->json(['success' => true, 'issue_qty' => $issueQty]);
        } else {
            return response()->json(['success' => false, 'message' => 'Officer not found'], 404);
        }
    }
    public function getLatestIssueRow()
{
    // Fetch the latest row with "ISSUE" value in the issue_transfer_disposal field
    $latestIssueRow = PropCardExtension_Model::where('issue_transfer_disposal', 'ISSUE')
        ->latest()
        ->first();

    if ($latestIssueRow) {
        return response()->json([
            'issue_row_id' => $latestIssueRow->id,
            'new_bal_qty' => $latestIssueRow->new_bal_qty
        ]);
    } else {
        return response()->json(['error' => 'No row with ISSUE value found.']);
    }
}
public function getPropID(Request $request)
    {
        // Retrieve the propId from the request
        $propId = $request->input('propId');

        // Fetch data based on the propId
        $data = PropCardExtension_Model::where('prop_id', $propId)
            ->where(function($query) {
                $query->where('issue_transfer_disposal', 'ISSUE')
                    ->orWhere('issue_transfer_disposal', 'TRANSFER');
            })
            ->where('issue_qty', '!=', 0)
            ->pluck('office_officer')
            ->toArray();

            // Return the data as JSON response
            return response()->json($data);
        }
}
