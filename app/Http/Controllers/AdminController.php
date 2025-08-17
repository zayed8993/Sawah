<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Request as TripRequest; 
use App\Models\Suggestion;


class AdminController extends Controller
{
    public function dashboard()
    {
        // get all requests from database
        $requests = TripRequest::with('trip')->get(); // include related trip info if you want
        $suggestions = Suggestion::all(); // كل الاقتراحات
        return view('admin-dashboard', compact('requests' , 'suggestions'));
    }

    public function deleteRequest($id)
    {
        $request = TripRequest::findOrFail($id);
        $request->delete();

        return redirect('/admin')->with('success', 'تم حذف الطلب بنجاح');
    }

    public function suggestionsDashboard()
{
    $suggestions = Suggestion::all();
    return view('admin-suggestions', compact('suggestions'));
}

public function deleteSuggestion($id)
{
    $sug = Suggestion::findOrFail($id);
    $sug->delete();
    return redirect('/admin')->with('success', 'تم حذف الاقتراح بنجاح');
}
}
