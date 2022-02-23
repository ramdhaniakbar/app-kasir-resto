<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Menu;
use App\Models\Transaction;
use Illuminate\Http\Request;

class ManagerDashboardController extends Controller
{
    public function managerIndex()
    {
        $menus = Menu::orderBy('menu_name', 'ASC')->paginate(10);
        return view('manager.menu.index', compact('menus'));
    }

    public function managerCreate()
    {
        return view('manager.menu.create');
    }

    public function managerStore(Request $request)
    {
        $validated = $request->validate([
            'menu_name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'stock' => 'required|numeric',
        ]);

        $data = new Menu;
        $data->menu_name = $request->menu_name;
        $data->price = $request->price;
        $data->description = $request->description;
        $data->stock = $request->stock;
        $data->save();

        return redirect()->route('manager.index')->with('success', 'Menu created successfully');
    }

    public function managerEdit($id)
    {
        $menus = Menu::find($id);
        return view('manager.menu.edit', compact('menus'));
    }

    public function managerUpdate(Request $request, $id)
    {
        $validated = $request->validate([
            'menu_name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'stock' => 'required|numeric',
        ]);

        $update = Menu::find($id);
        $update->menu_name = $request->menu_name;
        $update->price = $request->price;
        $update->description = $request->description;
        $update->stock = $request->stock;
        $update->update();

        return redirect()->route('manager.index')->with('success', 'Menu updated successfully');
    }

    public function managerDelete($id)
    {
        $delete = Menu::find($id)->delete();
        return redirect()->route('manager.index')->with('danger', 'Menu deleted successfully');
    }

    public function managerReport(Request $request)
    {
        $reports = Transaction::latest()->paginate(10);
        
        if ($request['date_1'] && $request['date_2']) {
            $reports = Transaction::whereBetween('created_at', [$request['date_1'], $request['date_2']])
            ->paginate(10)->withQueryString();
        }
        return view('manager.report.index', compact('reports'));
    }
}
