<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Log;
use App\Models\ListItem;

class TodoListController extends Controller
{
    public function index()
    {
        // return view('welcome', ['listItems' => ListItem::where('is_completed', 0)->get()]);
        return view('welcome', ['listItems' => ListItem::all()]);
    }

    public function markComplete($id)
    {
        $item = ListItem::find($id);
        $item->is_completed = 1;
        $item->save();

        return redirect('/');
    }

    public function saveItem(Request $request)
    {
        // Log::info(json_encode($request->all()));

        $newItem = new ListItem();
        $newItem->name = $request->listItem;
        $newItem->is_completed = 0;
        $newItem->save();

        // return view('welcome', ['listItems' => ListItem::all()]);
        return redirect('/');
    }
}
