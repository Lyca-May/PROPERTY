<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockCardExtension_Model;
use App\Models\PropCardModel;
use App\Models\PropertyModel;


class StockCardExtension_Controller extends Controller
{
    //
    public function addStockExt(Request $request){
        $validatedData = $request->validate([
            'stock_id' => 'required',
            'date' => 'required|date',
            'reference' => 'required',
            'issue_qty' => 'required',
            'office_officer' => 'required',
            'new_bal_qty' => 'nullable',
            'bal_totalcost' => 'nullable',
            'no_of_days' => 'required',
        ], [
            'date.required' => 'The date field is required.',
            'date.date' => 'The date must be a valid date format.',
            'reference.required' => 'The reference field is required.',
            'office_officer.required' => 'The office or officer field is required.',
            'new_bal_qty.required' => 'The Balance Qty field is required.',
            'bal_totalcost.required' => 'The Balance total cost field is required.',
            'no_of_days.required' => 'The Number of days field is required.',
        ]);

        // Create a new PropCardExtension instance and fill it with validated data
        $stockCardExtension = new StockCardExtension_Model();
        $stockCardExtension->stock_id = $validatedData['stock_id'];
        $stockCardExtension->date = $validatedData['date'];
        $stockCardExtension->reference = $validatedData['reference'];
        $stockCardExtension->issue_qty = $validatedData['issue_qty'];
        $stockCardExtension->office_officer = $validatedData['office_officer'];
        $stockCardExtension->new_bal_qty = $validatedData['new_bal_qty'];
        $stockCardExtension->bal_totalcost = $validatedData['bal_totalcost'];
        $stockCardExtension->no_of_days = $validatedData['no_of_days'];

        // Save the new stockCardExtension instance
        $stockCardExtension->save();

        return redirect('/all-forms')->with('success', 'Stock Card has been created!');
    }

    public function getStockData($id)
    {
        // Retrieve the prop_ext data with the given ID
        $stock = PropertyModel::findOrFail($id); // Assuming your model is named YourModelName

        // Return the prop_ext data as a JSON response
        return response()->json($stock);
    }
    public function saveEditedData($id) {

        
        // Retrieve the prop_ext record with the given ID
        $stockExt = PropertyModel::findOrFail($id);

        // Assuming the request data contains the updated values
        $requestData = request()->all();

        // Update the prop_ext record with the new values
        $stockExt->update($requestData);

        // Optionally, you can return a response indicating success
        return response()->json(['message' => 'Data updated successfully']);
    }
    public function deletestockExt($id)
    {
        StockCardExtension_Model::destroy($id);

        return response()->json(['success' => true]); // Return success response
    }

    public function getSLCData($id)
    {
        // Retrieve the prop_ext data with the given ID
        $scExt = PropCardModel::findOrFail($id); // Assuming your model is named YourModelName

        // Return the prop_ext data as a JSON response
        return response()->json($scExt);
    }
    public function updateSLC(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'item_code' => 'string',
            'acctg_reference' => 'required|string',
            'particulars' => 'required|string',
            'issue_qty' => 'nullable',
            'issue_unitcost' => 'nullable',
            'issue_totalcost' => 'nullable',
            'new_bal_qty' => 'nullable',
            'bal_unitcost' => 'nullable',
            'bal_totalcost' => 'nullable',
            'no_of_days' => 'nullable',
        ]);

        // Find the semi object by ID
        $semi = StockCardExtension_Model::find($id);

        // Check if the semi object exists
        if (!$semi) {
            return response()->json(['error' => 'SLC not found'], 404);
        }

        // Update the semi object with the request data
        $semi->update($request->all());

        // Return a JSON response indicating success
        return response()->json(['success' => 'SLC updated successfully']);
    }

}
