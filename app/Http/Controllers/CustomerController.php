<?php namespace App\Http\Controllers;

use Request;
use App\Models\Customer;
use App\Models\Invoice;
use Carbon\Carbon;

class CustomerController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Item Controller
	|--------------------------------------------------------------------------
	| This controller handles all requests related to Item objects
	| Patterns Demonstrated:
	| - returning views and redirects
	| - passing data to a view
	| - model CRUD operations
	| - using "Controller Validation"
	| - abstracting or refactoring common validation into helper method
	*/

	public function showAll() {
		$customers = Customer::all();
		return view('customer_all', ['customers' => $customers->getArray()]);
	}

	public function create() {
		return view('customer_new');
	}

	public function postCreate() {
		$this->validateForm();

		$customer = new Customer();
		$customer->first_name = Request::input('first_name');
		$customer->last_name = Request::input('last_name');
		$customer->email = Request::input('email');
		$customer->phone = Request::input('phone');
		$customer->customer_since = Carbon::now();
		$customer->save();
		return redirect('customer');
	}

	public function show($id) {
		$customer = new Customer($id);
		return view('customer', ['customer' => $customer]);
	}

	public function edit($id) {
		$customer = new Customer($id);
		return view('customer_edit', ['customer' => $customer]);
	}

	public function postEdit($id) {
		$this->validateForm();

		$customer = new Customer($id);
		$customer->first_name = Request::get('first_name');
		$customer->last_name = Request::get('last_name');
		$customer->email = Request::get('email');
		$customer->phone = Request::get('phone');
		$customer->gender = Request::get('gender');
		$customer->save();
		return redirect('customer/' . $id);
	}

	public function delete($id) {
		$item = new Customer($id);
		$item->delete();
		return redirect('item');
	}

	/*
	 * Validation methods
	 */
	protected function validateForm() {
		$this->validate(Request::instance(), [
			'first_name' => 'required|alpha|min:2|max:50',
			'last_name' => 'alpha|between:2,50',
			'email' => 'email',
			'phone' => 'required|regex:/^\d{3}[-.]\d{3}[-.]\d{4}$/',
			'gender' => 'required|in:m,f,M,F'
		]);
	}

	public function viewInvoices($id) {
		$customer = new Customer($id);
		return view('customer_invoices', ['customer'=>$customer]);
	}

	public function showCustomerInvoices($id) {
		$customer = new Customer($id);
		$invoices = Invoice::allCustomerInvoices($id);
		return view('customer_invoices', ['customer'=>$customer,'invoices'=>$invoices]);
	}

	public function createNewInvoiceForCustomer($id) {
		$invoice = new Invoice;
		$invoice->customer_id = $id;
		$invoice->save();

		return redirect("/invoice/" . $invoice->getId());
	}


}
