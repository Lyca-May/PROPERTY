<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\PropertyModel;

class PropertyController extends Controller
{
    public function addStockCard(Request $request)
    {
        $validatedData = $request->validate([
            'entity_name' => 'required',
            'fund_cluster' => 'required',
            'item_name' => 'required',
            'stock_no' => 'required',
            'description' => 'required',
            'reorder_point' => 'required',
            'unit_of_measurement' => 'required',
            'date' => 'required|date',
            'reference' => 'required',
            'receipt_qty' => 'required',
            'receipt_unitcost' => 'required',
            'receipt_totalcost' => 'required',
            'issue_qty' => 'required',
            'issue_unitcost' => 'required',
            'issue_totalcost' => 'required',
            'no_of_days' => 'required',
        ], [
            // Custom validation messages
            'entity_name.required' => 'The entity name field is required.',
            'fund_cluster.required' => 'The fund cluster field is required.',
            'item.required' => 'The item field is required.',
            'stock_no.required' => 'The stock_no field is required.',
            'description.required' => 'The description field is required.',
            'reorder_point.required' => 'The reorder_point field is required.',
            'unit_of_measurement.required' => 'The unit_of_measurement field is required.',
            'date.required' => 'The date field is required.',
            'reference.required' => 'The reference field is required.',
            'receipt_qty.required' => 'The receipt_qty field is required.',
            'receipt_unitcost.required' => 'The receipt unitcost field is required.',
            'receipt_totalcost.required' => 'The receipt totalcost field is required.',
            'issue_qty.required' => 'The issue quantity field is required.',
            'issue_unitcost.required' => 'The issue unitcost field is required.',
            'issue_totalcost.required' => 'The issue totalcost field is required.',
            'no_of_days.required' => 'The number of days field is required.'
        ]);

        // Create a new instance of the model and fill it with the validated data
        $scAndSlc = new PropertyModel();
        $scAndSlc->fill($validatedData);

        // Save the instance to the database
        $scAndSlc->save();

        // Redirect the user to a success page or somewhere else
        return redirect()->back()->with('success', 'Stock Card has been created!');
    }
    public function getStockCards()
    {
        // Fetch data using the query builder
        $stock_card = DB::table('sc_andslc')->get();

        // You can now use $data in your view to display the fetched data
        return view('property_division.all', ['stock_card' => $stock_card]);
    }

    public function edit_stock_card(Request $request, $id)
    {
        // Retrieve all input data
        $data = $request->all();

        // Find the stock card by ID
        $stockCard = PropertyModel::find($id);

        // Check if the stock card exists
        if (!$stockCard) {
            return redirect()->back()->with('error', 'Stock Card not found.');
        }

        // Update the stock card attributes
        $stockCard->update($data);

        // Check if the update was successful
        if ($stockCard) {
            return redirect('/all-forms')->with('success', 'Stock Card item ' . $stockCard->stock_no . ' updated successfully.');
        } else {
            return redirect()->back()->with('error', 'No changes detected or failed to update item.');
        }
    }
    public function viewSLC($id)
    {
        $stock_card = PropertyModel::where('id', $id)->get();

        return view('property_division.sc-slc', ['stock_card' => $stock_card]);
    }

    // ACCOUNTING DIVISION

    public function getDataForSLC()
    {
        $stock_card = PropertyModel::get();

        return view('accounting_division.all', ['stock_card' => $stock_card]);
    }

    public function edit_SLC(Request $request, $id)
    {
        // Retrieve all input data
        $data = $request->all();

        // Find the stock card by ID
        $stockCard = PropertyModel::find($id);

        // Check if the stock card exists
        if (!$stockCard) {
            return redirect()->back()->with('error', 'Stock Card not found.');
        }

        // Update the stock card attributes
        $stockCard->update($data);

        // Check if the update was successful
        if ($stockCard) {
            return redirect('/all-slc')->with('success', 'Stock Card item ' . $stockCard->stock_no . ' updated successfully.');
        } else {
            return redirect()->back()->with('error', 'No changes detected or failed to update item.');
        }
    }

}
