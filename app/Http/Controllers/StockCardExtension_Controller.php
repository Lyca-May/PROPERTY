<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockCardExtension_Model;


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
            'bal_qty' => 'nullable',
            'bal_totalcost' => 'nullable',
            'no_of_days' => 'required',
        ], [
            'date.required' => 'The date field is required.',
            'date.date' => 'The date must be a valid date format.',
            'reference.required' => 'The reference field is required.',
            'office_officer.required' => 'The office or officer field is required.',
            'bal_qty.required' => 'The Balance Qty field is required.',
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
        $stockCardExtension->bal_qty = $validatedData['bal_qty'];
        $stockCardExtension->bal_totalcost = $validatedData['bal_totalcost'];
        $stockCardExtension->no_of_days = $validatedData['no_of_days'];

        // Save the new stockCardExtension instance
        $stockCardExtension->save();

        return redirect('/all-forms')->with('success', 'Stock Card has been created!');
    }

    public function getStockExtData($id)
    {
        // Retrieve the prop_ext data with the given ID
        $stockExt = StockCardExtension_Model::findOrFail($id); // Assuming your model is named YourModelName

        // Return the prop_ext data as a JSON response
        return response()->json($stockExt);
    }
    public function saveEditedData($id) {
        // Retrieve the prop_ext record with the given ID
        $stockExt = StockCardExtension_Model::findOrFail($id);

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
    
}
