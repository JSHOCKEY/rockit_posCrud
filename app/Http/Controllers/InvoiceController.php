<?php namespace App\Http\Controllers;

use Request;
use App\Models\Invoice;
use App\Models\Item;
use App\Models\Customer;

class InvoiceController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Invoice Controller
	|--------------------------------------------------------------------------
	| This controller handles all requests related to Invoice objects
	| Patterns Demonstrated:
	| - returning views and redirects
	| - passing data to a view
	| - model CRUD operations
	| - inline validator usage
	*/

	public function showAll() {
		$invoices = Invoice::allInvoicesDetails();
		return view('invoice_all', ['invoices'=>$invoices]);
	}

	public function show($id) {
		$invoice = Invoice::getInvoiceDetails($id);
		$items = Item::all();
		return view('invoice', ['invoice'=>$invoice, 'id'=>$id, 'items'=>$items->getArray()]);
	}

	public function addItemToInvoice($invoice_id) {
		
		$item_id = Request::input('items');
		$quantity = Request::input('quantity');

		$invoice = Invoice::addItem($invoice_id,$item_id,$quantity);
		return redirect("invoice/{$invoice_id}");
	}

	public function deleteItemFromInvoice($invoice_id,$item_id) {
		
		$invoice = Invoice::deleteItem($invoice_id,$item_id);
		return redirect("invoice/{$invoice_id}");

	}

}