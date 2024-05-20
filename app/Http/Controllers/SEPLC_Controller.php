<?php

namespace App\Http\Controllers;

use App\Models\SemiModel;
use App\Models\SemiExtension_Model;
use App\Models\SEPLC_Model;
use Illuminate\Http\Request;

class SEPLC_Controller extends Controller
{
    public function createSEPLC(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'seplc_id' => 'required',
            'date' => 'required|date',
            'reference' => 'required',
            'uacs_obj_code' => 'nullable',
            'particulars' => 'nullable',
            'receipt_qty' => 'nullable|numeric',
            'receipt_unitcost' => 'nullable|numeric',
            'receipt_totalcost' => 'nullable|numeric',
            'it_adjustment' => 'nullable|numeric',
            'accu_impairment_losses' => 'nullable|numeric',
            'adj_cost' => 'nullable|numeric',
            'nature_of_repair' => 'nullable|string',
            'repair_amount' => 'nullable|numeric',
        ]);

        // Create a new instance of your model
        $data = new SemiModel();

        // Assign values from the validated data to the model attributes
        $data->seplc_id = $validatedData['seplc_id'];
        $data->date = $validatedData['date'];
        $data->reference = $validatedData['reference'];
        $data->uacs_obj_code = $validatedData['uacs_obj_code'];
        $data->particulars = $validatedData['particulars'];
        $data->receipt_qty = $validatedData['receipt_qty'];
        $data->receipt_unitcost = $validatedData['receipt_unitcost'];
        $data->receipt_totalcost = $validatedData['receipt_totalcost'];
        $data->it_adjustment = $validatedData['it_adjustment'];
        $data->accu_impairment_losses = $validatedData['accu_impairment_losses'];
        $data->adj_cost = $validatedData['adj_cost'];
        $data->nature_of_repair = $validatedData['nature_of_repair'];
        $data->repair_amount = $validatedData['repair_amount'];
        $data->uacs_obj_code = $validatedData['uacs_obj_code'];


        // Save the data to the database
        $data->save();
        // Optionally, return a response indicating success
        return response()->json(['message' => 'Data stored successfully']);
    }

    public function getLatestAdjCost(){
        $latest = SEPLC_Model::latest()->first();
        return response()->json(['latest_adj_cost' => $latest->adj_cost]);
    }
    public function getSEPLCData($id)
    {
        // Retrieve the prop_ext data with the given ID
        $propExt = SemiModel::findOrFail($id); // Assuming your model is named YourModelName

        // Return the prop_ext data as a JSON response
        return response()->json($propExt);
    }
    public function updateSEPLC(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'uacs_obj_code' => 'required',
            'acctg_reference' => 'required|string',
            'particulars' => 'required|string',
            'it_adjustment' => 'nullable',
            'accu_impairment_losses' => 'nullable',
            'adj_cost' => 'required',
            'nature_of_repair' => 'nullable|string',
            'repair_amount' => 'nullable',
        ]);

        // Find the semi object by ID
        $semi = SemiModel::find($id);

        // Check if the semi object exists
        if (!$semi) {
            return response()->json(['error' => 'Semi not found'], 404);
        }

        // Update the semi object with the request data
        $semi->update($request->all());

        // Return a JSON response indicating success
        return response()->json(['success' => 'Semi updated successfully']);
    }

    public function getSEPLC_EXTData($id)
    {
        // Retrieve the prop_ext data with the given ID
        $propExt = SemiExtension_Model::findOrFail($id); // Assuming your model is named YourModelName

        // Return the prop_ext data as a JSON response
        return response()->json($propExt);
    }
    public function updateSEPLCext(Request $request, $id)
    {
        $request->validate([
            'receipt_qyt' => 'string',
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
        $semi = SemiExtension_Model::find($id);

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

        $previousRow = SemiExtension_Model::where('id', '<', $id)
        ->orderBy('id', 'desc') // Ordering by id in descending order to get the previous row
        ->first();

        if ($previousRow) {
            // If data is   found, return it as a JSON response
            return response()->json($previousRow);
        } else {
            // If data is not found, return an error response
            return response()->json(['error' => 'Data not found'], 404);
        }
    }
    public function getLatestData($id)
    {

        $previousRow = SemiExtension_Model::where('id', '<', $id)
        ->orderBy('id', 'desc') // Ordering by id in descending order to get the previous row
        ->first();

        if ($previousRow) {
            // If data is   found, return it as a JSON response
            return response()->json($previousRow);
        } else {
            // If data is not found, return an error response
            return response()->json(['error' => 'Data not found'], 404);
        }
    }


}
