<?php

namespace App\Http\Controllers;

use App\Models\PropCardExtension_Model;
use App\Models\PropCardModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PPELC_Controller extends Controller
{
    public function getPPELCData($id)
    {
        // Retrieve the prop_ext data with the given ID
        $propExt = PropCardModel::findOrFail($id); // Assuming your model is named YourModelName

        // Return the prop_ext data as a JSON response
        return response()->json($propExt);
    }
    public function updatePPELC(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'obj_acc_code' => 'nullable',
            'acctg_reference' => 'required|string',
            'particulars' => 'required|string',
            'it_adjustment' => 'nullable',
            'accu_dep' => 'nullable',
            'accu_impairment_losses' => 'nullable',
            'adj_cost' => 'required',
            'nature_of_repair' => 'nullable|string',
            'repair_amount' => 'nullable',
        ]);

        // Find the semi object by ID
        $semi = PropCardModel::find($id);

        // Check if the semi object exists
        if (!$semi) {
            return response()->json(['error' => 'PPELC not found'], 404);
        }

        // Update the semi object with the request data
        $semi->update($request->all());

        // Return a JSON response indicating success
        return response()->json(['success' => 'PPELC updated successfully']);
    }

    public function getPPELC_EXTData($id)
    {
        // Retrieve the prop_ext data with the given ID
        $propExt = PropCardExtension_Model::findOrFail($id); // Assuming your model is named YourModelName

        // Return the prop_ext data as a JSON response
        return response()->json($propExt);
    }

    public function updatePPELCext(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'receipt_qtY' => 'string',
            'receipt_unitcost' => 'string',
            'receipt_totalcost' => 'string',
            'acctg_reference' => 'required|string',
            'particulars' => 'required|string',
            'it_adjustment' => 'nullable',
            'accu_impairment_losses' => 'nullable',
            'adj_cost' => 'required',
            'nature_of_repair' => 'nullable|string',
            'repair_amount' => 'nullable',
        ]);

        // Find the semi object by ID
        $semi = PropCardExtension_Model::find($id);

        // Check if the semi object exists
        if (!$semi) {
            return response()->json(['error' => 'Semi not found'], 404);
        }

        // Update the semi object with the request data
        $semi->update($request->all());

        // Return a JSON response indicating success
        return response()->json(['success' => 'Semi updated successfully']);
    }

    public function getLatestData($id)
    {

        $previousRow = PropCardModel::find($id)->latest()
        ->first();

        if ($previousRow) {
            // If data is   found, return it as a JSON response
            return response()->json($previousRow);
        } else {
            // If data is not found, return an error response
            return response()->json(['error' => 'Data not found'], 404);
        }
    }
    public function getPreviousAdjCost(Request $request, $editId)
    {
        $previousRow = PropCardExtension_Model::where('prop_id', $editId)
            ->whereNotNull('adj_cost') // Ensure that adj_cost is not null
            ->where('id', '<', $editId)
            ->orderBy('id', 'desc') // Order by id in descending order to get the previous row
            ->skip(1) // Skip the current row
            ->first();

        $previousRow = PropCardExtension_Model::where('prop_id', '<', $editId);
        if ($previousRow) {
            return response()->json(['adj_cost' => $previousRow->adj_cost]);
        } else {
            return response()->json(['error' => 'Previous adj_cost not found'], 404);
        }
    }

}
