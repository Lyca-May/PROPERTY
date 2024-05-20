<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\PropertyModel;
use App\Models\PropCardModel;
use App\Models\SemiModel;
use App\Models\PropCardExtension_Model;
use App\Models\StockCardExtension_Model;
use App\Models\SemiExtension_Model;
use App\Models\SEPLC_Model;


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
            'item_code' => 'nullable',
            'reference' => 'required',
            'receipt_qty' => 'required',
            'receipt_unitcost' => 'required',
            'receipt_totalcost' => 'required',
            'issue_qty' => 'nullable',
            'issue_unitcost' => 'nullable',
            'issue_totalcost' => 'nullable',
            'no_of_days' => 'nullable',
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
            'receipt_totalcost.required' => 'The receipt totalcost field is required.'
        ]);

        $scAndSlc = new PropertyModel();
        $scAndSlc->fill($validatedData);
        $scAndSlc->save();
        return redirect('/all-forms')->with('success', 'Stock Card has been created!');
    }

    public function getStockCards()
    {
        $stock_card = PropertyModel::all();

        $stock_ext = StockCardExtension_Model::get();

        return view('property_division.stockcards', compact('stock_card', 'stock_ext'));
    }

    public function getStockEditData($id)
    {
        $stock = PropertyModel::findOrFail($id);
        return response()->json($stock);
    }

    public function saveEditedData($id) {
        $stockData = PropertyModel::findOrFail($id);
        $requestData = request()->all();
        $stockData->update($requestData);
        return response()->json(['message' => 'Data updated successfully']);
    }
    public function deleteStock($id)
    {
        PropertyModel::destroy($id);

        return response()->json(['success' => true]); // Return success response
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

    public function printStockPage($id) {
        $stock_cards = PropertyModel::find($id);
        $stock_ext = StockCardExtension_Model::get();

        return view('property_division.printable-stock-page', compact('stock_cards', 'stock_ext'));
    }

    public function printStockPageAcc($id) {
        $stock_cards = PropertyModel::find($id);
        return view('accounting_division.printable-stock-page', compact('stock_cards'));
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
        $stock_ext = StockCardExtension_Model::get();
        return view('accounting_division.all', compact('stock_card', 'stock_ext'));
    }

    public function edit_SLC(Request $request, $id)
    {
        $data = $request->all();
        $stockCard = PropertyModel::find($id);
        if (!$stockCard) {
            return redirect()->back()->with('failed', 'Stock Card not found.');
        }
        $stockCard->update($data);
        if ($stockCard) {
            return redirect('/all-slc')->with('success', 'Item code ' . $stockCard->item_code . ' updated successfully.');
        } else {
            return redirect()->back()->with('failed', 'No changes detected or failed to update item.');
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
        ], [
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
        ]);

        $propCard = new PropCardModel();
        $propCard->fill($validatedData);
        $propCard->save();

        return redirect('/all-property')->with('success', 'Property Card ' . $propCard->prop_no . ' has been created!');
    }

    public function getPropertyCards()
    {
       // Retrieve all data from PropCardModel
        $propCard = PropCardModel::first();
        $prop_ext = PropCardExtension_Model::get();
        $prop_card = PropCardModel::all(); // use this to populate data in the script
        $filteredOfficers = PropCardExtension_Model::where(function($query) {
            $query->where('issue_transfer_disposal', 'ISSUE')
                  ->orWhere('issue_transfer_disposal', 'TRANSFER');
        })
        ->where('issue_qty', '!=', 0)
        ->pluck('office_officer')
        ->toArray();

        return view('property_division.propertycards', compact('prop_card', 'prop_ext', 'filteredOfficers'));

    }


    public function edit_property_card(Request $request, $id)
    {
        $data = $request->all();
        $propCard = PropCardModel::find($id);
        $propCard->update($data);
        if ($propCard) {
            return redirect('/all-property')->with('success', 'Property number ' . $propCard->prop_no . ' updated successfully.');
        } else {
            return redirect()->back()->with('failed', 'No changes detected or failed to update item.');
        }
    }

    public function viewPPELC($id)
    {
        $prop_card = PropCardModel::where('id', $id)->get();
        return view('property_division.pc-ppelc', ['prop_card' => $prop_card]);
    }
    public function printPropPageAcc($id) {
        $prop_cards = PropCardModel::find($id);
        return view('accounting_division.printable-page', compact('prop_cards'));
    }

    public function printPropPage($id) {
        $prop_cards = PropCardModel::find($id);
        $prop_ext = PropCardExtension_Model::get();
        return view('property_division.printable-page', compact('prop_cards', 'prop_ext'));
    }
    public function printSEPPage($id) {
        $sep_card = SemiModel::find($id);
        $semi_ext = SemiExtension_Model::get();

        return view('property_division.printable-sepc-page', compact('sep_card', 'semi_ext'));
    }

    public function getDataForPPELC()
    {
        $prop_card = PropCardModel::get();
        $prop_ext = PropCardExtension_Model::get();

        return view('accounting_division.all-ppel-card', compact('prop_card','prop_ext'));
    }

    public function getDataForSELC()
    {
        $sep_card = SemiModel::get();
        $semi_ext = SemiExtension_Model::get();
        // $seplc = SEPLC_Model::get();
        return view('accounting_division.SEPLC', compact('sep_card', 'semi_ext',));
    }

    public function edit_PPELC(Request $request, $id)
    {
        // Retrieve all input data
        $data = $request->all();

        // Find the stock card by ID
        $prop_card = PropCardModel::find($id);

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
            return redirect()->back()->with('failed', 'No changes detected or failed to update item.');
        }
    }

    public function countCard(){

        $stockCards = PropertyModel::count();
        $issuedSC = StockCardExtension_Model::join('sc_andslc', 'stock_card_extension.stock_id', '=', 'sc_andslc.id')
                    ->select('sc_andslc.item_name', DB::raw('SUM(stock_card_extension.issue_qty) as total_issue_qty'))
                    ->groupBy('sc_andslc.item_name')
                    ->get();
        $purchasedSC = PropertyModel::select('item_name', DB::raw('SUM(receipt_qty) as total_receipt_qty'))
                    ->groupBy('item_name')
                    ->get();

        $PPEC= PropCardModel::count();

        $purchasePPE = PropCardModel::select('description', DB::raw('SUM(receipt_qty) as total_receipt_qty'))
        ->groupBy('description')
        ->get();
        // Fetch issued data
        $issuedData = PropCardExtension_Model::where('issue_transfer_disposal', '=', 'ISSUE')
        ->join('property_card', 'property_card_extenstions.prop_id', '=', 'property_card.id')
        ->select('property_card.description', DB::raw('SUM(property_card_extenstions.issue_qty) as total_qty'))
        ->groupBy('property_card.description')
        ->get();

        // Fetch transferred data
        $transferredData = PropCardExtension_Model::where('issue_transfer_disposal', '=', 'TRANSFER')
        ->join('property_card', 'property_card_extenstions.prop_id', '=', 'property_card.id')
        ->select('property_card.description', DB::raw('SUM(property_card_extenstions.issue_qty) as total_qty'))
        ->groupBy('property_card.description')
        ->get();

        // Fetch returned data
        $returnedData = PropCardExtension_Model::where('issue_transfer_disposal', '=', 'RETURN')
        ->join('property_card', 'property_card_extenstions.prop_id', '=', 'property_card.id')
        ->select('property_card.description', DB::raw('SUM(property_card_extenstions.issue_qty) as total_qty'))
        ->groupBy('property_card.description')
        ->get();

        // Fetch disposed data
        $disposedData = PropCardExtension_Model::whereIn('property_card_extenstions.remarks', ['DISPOSED', 'DISPOSE', 'NON SERVICEABLE', 'NS', 'NON-SERVICEABLE'])
        ->join('property_card', 'property_card_extenstions.prop_id', '=', 'property_card.id')
        ->select('property_card.description', DB::raw('SUM(property_card_extenstions.issue_qty) as total_qty'))
        ->groupBy('property_card.description')
        ->get();


        $sepCards = SemiModel::count();


        $purchasedSep = SemiModel::select('desc', DB::raw('SUM(receipt_qty) as total_receipt_qty'))
        ->groupBy('desc')
        ->get();

        // Fetch issued data
        $issuedSep = SemiExtension_Model::where('issue_transfer_disposal', '=', 'ISSUE')
        ->join('semitbl', 'semi_extension.semi_id', '=', 'semitbl.id')
        ->select('semitbl.desc', DB::raw('SUM(semi_extension.issue_qty) as total_qty'))
        ->groupBy('semitbl.desc')
        ->get();

        // Fetch transferred Sep
        $transferredSep = SemiExtension_Model::where('issue_transfer_disposal', '=', 'TRANSFER')
        ->join('semitbl', 'semi_extension.semi_id', '=', 'semitbl.id')
        ->select('semitbl.desc', DB::raw('SUM(semi_extension.issue_qty) as total_qty'))
        ->groupBy('semitbl.desc')
        ->get();

        // Fetch returned Sep
        $returnedSep = SemiExtension_Model::where('issue_transfer_disposal', '=', 'RETURN')
        ->join('semitbl', 'semi_extension.semi_id', '=', 'semitbl.id')
        ->select('semitbl.desc', DB::raw('SUM(semi_extension.issue_qty) as total_qty'))
        ->groupBy('semitbl.desc')
        ->get();

        // Fetch disposed Sep
        $disposedSep = SemiExtension_Model::whereIn('semi_extension.remarks', ['DISPOSED', 'DISPOSE', 'NON SERVICEABLE', 'NS', 'NON-SERVICEABLE'])
        ->join('semitbl', 'semi_extension.semi_id', '=', 'semitbl.id')
        ->select('semitbl.desc', DB::raw('SUM(semi_extension.issue_qty) as total_qty'))
        ->groupBy('semitbl.desc')
        ->get();



        $stockCardRecent = PropertyModel::where('is_clicked', 0)->latest()->first();
        $semiCardRecent = SemiModel::where('is_clicked', 0)->latest()->first();
        $propCardRecent = PropCardModel::where('is_clicked', 0)->latest()->first();

        return view('property_division.dash-prop' , compact('purchasedSep','issuedSep', 'transferredSep', 'returnedSep', 'disposedSep','purchasePPE','issuedData', 'transferredData', 'returnedData', 'disposedData', 'stockCards', 'issuedSC', 'purchasedSC',  'PPEC', 'sepCards','stockCardRecent','semiCardRecent','propCardRecent'));
    }

    public function clickSC($id){
        $stockCardRecent = PropertyModel::find($id);

        if($stockCardRecent){
            $stockCardRecent->update(['is_clicked' => 1]);
            return redirect('/all-forms');
        }else{
            return redirect()->back()->with('failed', 'ERROR');
        }
    }

    public function clickPc($id){
        $propCardRecent = PropCardModel::find($id);

        if($propCardRecent){
            $propCardRecent->update(['is_clicked' => 1]);
            return redirect('/all-property');
        }else{
            return redirect()->back()->with('failed', 'ERROR');
        }
    }

    public function clickSep($id){
        $sepCardRecent = SemiModel::find($id);

        if($sepCardRecent){
            $sepCardRecent->update(['is_clicked' => 1]);
            return redirect('/all-semi-expandable');
        }else{
            return redirect()->back()->with('failed', 'ERROR');
        }
    }

    public function addSemiPropertyCard(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'entity_name' => 'required',
                'fund_cluster' => 'required',
                'desc' => 'required',
                'sep_no' => 'required',
                'sep_name' => 'required',
                'date' => 'required|date',
                'ref' => 'required',
                'receipt_qty' => 'required',
                'receipt_unitcost' => 'required',
                'receipt_totalcost' => 'required',
                'item_no' => 'required',
                'issue_qty' => 'nullable',
                'office_officer' => 'nullable',
                'amount' => 'nullable',
                'remarks' => 'nullable',
            ], [
                'entity_name.required' => 'The entity name field is required.',
                'fund_cluster.required' => 'The fund cluster field is required.',
                'desc.required' => 'The description field is required.',
                'sep_no.required' => 'The Semi-expendable property number field is required.',
                'sep_name.required' => 'The Semi-expendable property name field is required.',
                'date.required' => 'The date field is required.',
                'date.date' => 'The date must be a valid date format.',
                'ref.required' => 'The reference field is required.',
                'receipt_qty.required' => 'The receipt quantity field is required.',
                'receipt_unitcost.required' => 'The receipt unit cost field is required.',
                'receipt_totalcost.required' => 'The receipt total cost field is required.',

            ]);

            $SemipropCard = new SemiModel();
            $SemipropCard->fill($validatedData);
            $SemipropCard->save();

        return redirect('/all-semi-expandable')->with('success', 'Semi-Expendable Property Card ' . $SemipropCard->prop_no . ' has been created!');
        } catch (\Exception $e) {
            return back()->withErrors([$e->getMessage()])->withInput();
        }
    }
    public function getDataForSEPC()
    {
        $sep_card = SemiModel::get();
        $semi_ext = SemiExtension_Model::get();

        return view('property_division.SEC', compact('sep_card','semi_ext'));
    }

    public function edit_sep_card(Request $request, $id)
    {
        $data = $request->all();
        $sep = SemiModel::find($id);

        if (!$sep) {
            return redirect()->back()->with('error', 'Semi-Expendable Property Card not found.');
        }

        $sep->update($data);

        if ($sep) {
            return redirect('/all-semi-expandable')->with('success', 'Semi-Expendable Property Number ' . $sep->sep_no . ' updated successfully.');
        } else {
            return redirect()->back()->with('failed', 'No changes detected or failed to update item.');
        }
    }

    public function countCardAccounting(){
        $stockLedgerCards = PropertyModel::whereNotNull('bal_qty')->whereNotNull('bal_unitcost')->whereNotNull('bal_totalcost')->count();
        $PPELC = PropCardModel::whereNotNull('obj_acc_code')
        ->whereNotNull('est_useful_life')
        ->whereNotNull('rate_of_dep')
        ->whereNotNull('accumulated_dep')
        ->whereNotNull('accumulated_impairment_losses')
        ->whereNotNull('issue_transfers_adjustments')
        ->whereNotNull('adj_cost')
        ->whereNotNull('repair_nature')
        ->count();
        $stockCardRecent = PropertyModel::where('is_clicked', 0)->latest()->first();
        $semiCardRecent = SemiModel::where('is_clicked', 0)->latest()->first();
        $propCardRecent = PropCardModel::where('is_clicked', 0)->latest()->first();

        return view('accounting_division.dash-accounting' , compact('stockLedgerCards', 'PPELC'));
    }
}
