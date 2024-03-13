<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\PropertyModel;
use App\Models\PropCardModel;

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
            return redirect('/all-forms')->with('success', 'Stock number ' . $stockCard->stock_no . ' updated successfully.');
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
            return redirect('/all-slc')->with('success', 'Item code ' . $stockCard->item_code . ' updated successfully.');
        } else {
            return redirect()->back()->with('error', 'No changes detected or failed to update item.');
        }
    }



    // PROPERTY CARD
    public function addPropertyCard(Request $request)
    {
        $validatedData = $request->validate([
            'entity_name' => 'required',
            'fund_cluster' => 'required',
            'prop_plant_eq' => 'required',
            'prop_no' => 'required',
            'description' => 'required',
            'date' => 'required|date',
            'reference' => 'required',
            'receipt_qty' => 'required',
            'receipt_unitcost' => 'required',
            'receipt_totalcost' => 'required',
            'repair_amount' => 'required',
            'remarks' => 'required',
        ], [
            // Custom validation messages
            'entity_name.required' => 'The entity name field is required.',
            'fund_cluster.required' => 'The fund cluster field is required.',
            'prop_plant_eq.required' => 'The property plant and equipment field is required.',
            'prop_no.required' => 'The property number field is required.',
            'description.required' => 'The description field is required.',
            'date.required' => 'The date field is required.',
            'date.date' => 'The date must be a valid date format.',
            'reference.required' => 'The reference field is required.',
            'receipt_qty.required' => 'The receipt quantity field is required.',
            'receipt_unitcost.required' => 'The receipt unit cost field is required.',
            'receipt_totalcost.required' => 'The receipt total cost field is required.',
            'repair_amount.required' => 'The repair amount field is required.',
            'remarks.required' => 'The remarks field is required.',
        ]);
        // Create a new instance of the model and fill it with the validated data
        $propCard = new PropCardModel();
        $propCard->fill($validatedData);

        // Save the instance to the database
        $propCard->save();

        return redirect('/all-property')->with('success', 'Property Card ' . $propCard->prop_no . ' has been created!');
    }

    public function getPropertyCards()
    {
        // Fetch data using the query builder
        $prop_card = DB::table('property_card')->get();

        // You can now use $data in your view to display the fetched data
        return view('property_division.all-prop-card', ['prop_card' => $prop_card]);
    }

    public function edit_property_card(Request $request, $id)
    {
        // Retrieve all input data
        $data = $request->all();

        // Find the stock card by ID
        $propCard = PropCardModel::find($id);

        // Check if the stock card exists
        if (!$propCard) {
            return redirect()->back()->with('error', 'Property Card not found.');
        }

        // Update the stock card attributes
        $propCard->update($data);

        // Check if the update was successful
        if ($propCard) {
            return redirect('/all-property')->with('success', 'Property number ' . $propCard->prop_no . ' updated successfully.');
        } else {
            return redirect()->back()->with('error', 'No changes detected or failed to update item.');
        }
    }

    public function viewPPELC($id)
    {
        $prop_card = PropertyModel::where('id', $id)->get();

        return view('property_division.pc-ppelc', ['prop_card' => $prop_card]);
    }
    public function printPropPage($id) {
        // Fetch the necessary data from the database using the $id
        $prop_cards = PropCardModel::find($id);

        // Return the printable page view with the fetched data
        return view('property_division.printable-page', compact('prop_cards'));
    }

    public function getDataForPPELC()
    {
        $prop_card = PropCardModel::get();

        return view('accounting_division.all-ppel-card', ['prop_card' => $prop_card]);
    }


    public function edit_PPELC(Request $request, $id)
    {
        // Retrieve all input data
        $data = $request->all();

        // Find the stock card by ID
        $prop_card = PropertyModel::find($id);

        // Check if the stock card exists
        if (!$prop_card) {
            return redirect()->back()->with('error', 'PPELC not found.');
        }

        // Update the stock card attributes
        $prop_card->update($data);

        // Check if the update was successful
        if ($prop_card) {
            return redirect('/all-ppelc')->with('success', 'PPELCs Object Account Code ' . $prop_card->obj_acc_code . ' updated successfully.');
        } else {
            return redirect()->back()->with('error', 'No changes detected or failed to update item.');
        }
    }

}
