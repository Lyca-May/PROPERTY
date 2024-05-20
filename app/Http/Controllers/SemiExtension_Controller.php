<?php

namespace App\Http\Controllers;

use App\Models\SemiExtension_Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


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

        $officer = $request->input('officer');
        $newIssueQty = $request->input('newIssueQty');

        Log::info('Selected officer:', ['officer' => $officer]);
        Log::info('Issue Qty:', ['newIssueQty' => $newIssueQty]);

        $SemiPropCard = SemiExtension_Model::where('office_officer', $officer)->get();

        if ($SemiPropCard->isNotEmpty()) {
            foreach ($SemiPropCard as $item) {
                // Modify the issue_qty property of each item if needed
                $item->issue_qty = $newIssueQty;
                // Save the changes to the database
                $item->save();
            }

            Log::info('Issue quantity updated successfully for SemiPropCard collection.');
        } else {
            Log::info('No SemiPropCard items found for the given office officer.');
        }
        return response()->json(['success' => 'Property Card has been created!']);

    }
    public function getSemiExtData($id)
    {
        // Retrieve the prop_ext data with the given ID
        $propExt = SemiExtension_Model::findOrFail($id); // Assuming your model is named YourModelName

        // Return the prop_ext data as a JSON response
        return response()->json($propExt);
    }
    public function saveEditedData($id) {
        // Retrieve the prop_ext record with the given ID
        $propExt = SemiExtension_Model::findOrFail($id);

        // Assuming the request data contains the updated values
        $requestData = request()->all();

        // Update the prop_ext record with the new values
        $propExt->update($requestData);

        // Optionally, you can return a response indicating success
        return response()->json(['message' => 'Data updated successfully']);
    }
    public function deleteSemiExt($id)
    {
        SemiExtension_Model::destroy($id);

        return response()->json(['success' => true]); // Return success response
    }

    public function getOfficerIssueQty(Request $request)
    {
        $selectedOfficer = $request->input('officer');

        // Fetch the issue_qty of the selected officer from the database
        $officer = SemiExtension_Model::where('office_officer', $selectedOfficer)->first();

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
        $officer = SemiExtension_Model::where('office_officer', $selectedOfficer)->first();

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
    $latestIssueRow = SemiExtension_Model::where('issue_transfer_disposal', 'ISSUE')
        ->latest()
        ->first();

    if ($latestIssueRow) {
        return response()->json([
            'issue_row_id' => $latestIssueRow->id,
            'bal_qty' => $latestIssueRow->bal_qty
        ]);
    } else {
        return response()->json(['error' => 'No row with ISSUE value found.']);
    }
}
public function getSemiID(Request $request)
    {
        // Retrieve the propId from the request
        $semiId = $request->input('semiId');

        // Fetch data based on the semiId
        $data = SemiExtension_Model::where('semi_id', $semiId)
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
