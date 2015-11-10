<?php namespace App\Http\Controllers;

use Request;
use Validator;
use App\Models\Item;

class ItemController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Item Controller
	|--------------------------------------------------------------------------
	| This controller handles all requests related to Item objects
	| Patterns Demonstrated:
	| - returning views and redirects
	| - passing data to a view
	| - model CRUD operations
	| - inline validator usage
	*/

	public function showAll() {
		$items = Item::all();
		return view('item_all', ['items' => $items->getArray()]);
	}

	public function create() {
		return view('item_new');
	}

	public function postCreate() {
		$validator = Validator::make(Request::all(), [
			'name' => 'required',
			'price' => 'required|numeric'
		]);
		if($validator->fails()) {
			return redirect()->back()->withErrors($validator->errors());
		}

		$item = new Item();
		$item->name = Request::input('name');
		$item->description = Request::input('description');
		$item->price = Request::input('price');
		$item->save();
		return redirect('item');
	}

	public function show($id) {
		$item = new Item($id);
		return view('item', ['item' => $item]);
	}

	public function edit($id) {
		$item = new Item($id);
		return view('item_edit', ['item' => $item]);
	}

	public function postEdit($id) {
		$validator = Validator::make(Request::all(), [
			'name' => 'required',
			'price' => 'required|numeric'
		]);
		if($validator->fails()) {
			return redirect()->back()->withErrors($validator->errors());
		}

		$item = new Item($id);
		$item->name = Request::get('name');
		$item->description = Request::get('description');
		$item->price = Request::get('price');
		$item->save();
		return redirect('item/' . $id);
	}

	public function delete($id) {
		$item = new Item($id);
		$item->delete();
		return redirect('item');
	}
}
