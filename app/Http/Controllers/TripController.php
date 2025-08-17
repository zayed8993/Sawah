<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;
use Illuminate\Support\Facades\Storage;
use App\Models\Request as TripRequest;
use App\Models\Suggestion;

class TripController extends Controller
{
    // -------- Public Routes --------
    public function home()
    {
        // جلب آخر رحلتين
        $trips = Trip::latest()->take(2)->get();
        return view('home', compact('trips'));
    }
    public function trips()
{
    $trips = Trip::all(); // get all trips from database
    return view('trips', compact('trips'));
}


    public function tripDetails($id)
    {
         // جلب رحلة واحدة من قاعدة البيانات
        $trip = Trip::findOrFail($id);
        return view('trip-details', compact('trip'));
    }

    public function requestTrip($id)
    {
        return view('request-trip', ['trip_id' => $id]);
    }

    public function sendRequest(Request $request)
    {
       // Validate input
    $request->validate([
        'trip_id' => 'required|exists:trips,id',
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'notes' => 'nullable|string',
    ]);

    // Save request in database
    TripRequest::create([
        'user_id' => auth()->id(), // ربط الطلب بالمستخدم
        'trip_id' => $request->trip_id,
        'name' => $request->name,
        'email' => $request->email,
        'notes' => $request->notes,
    ]);

    return redirect('/')->with('success', 'تم إرسال طلبك بنجاح');
    }

    public function suggestions()
    {
        return view('suggestions');
    }

    public function sendSuggestion(Request $request)
    {
        // Validate input
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'content' => 'required|string',
    ]);

    // Save suggestion in database
    Suggestion::create([
        'name' => $request->name,
        'email' => $request->email,
        'content' => $request->content,
    ]);

    return redirect('/')->with('success', 'تم إرسال اقتراحك بنجاح');
    }

    // -------- Admin CRUD Routes --------
    public function index()
    {
        $trips = Trip::all();
        return view('admin.trips.index', compact('trips'));
    }

    public function create()
    {
        return view('admin.trips.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'location' => 'required|string',
            'price' => 'nullable|numeric',
            'date' => 'nullable|date',
            'image' => 'nullable|image|max:2048',
        ]);

        $trip = new Trip();
        $trip->title = $request->title;
        $trip->description = $request->description;
        $trip->location = $request->location;
        $trip->price = $request->price;
        $trip->date = $request->date;

        if ($request->hasFile('image')) {
            $trip->image = $request->file('image')->store('trips', 'public');
        }

        $trip->save();

        return redirect()->route('trips.index')->with('success', 'Trip created successfully!');
    }

    public function edit(Trip $trip)
    {
        return view('admin.trips.edit', compact('trip'));
    }

    public function update(Request $request, Trip $trip)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'location' => 'required|string',
            'price' => 'nullable|numeric',
            'date' => 'nullable|date',
            'image' => 'nullable|image|max:2048',
        ]);

        $trip->title = $request->title;
        $trip->description = $request->description;
        $trip->location = $request->location;
        $trip->price = $request->price;
        $trip->date = $request->date;

        if ($request->hasFile('image')) {
            if ($trip->image) {
                Storage::disk('public')->delete($trip->image);
            }
            $trip->image = $request->file('image')->store('trips', 'public');
        }

        $trip->save();

        return redirect()->route('trips.index')->with('success', 'Trip updated successfully!');
    }

    public function destroy(Trip $trip)
    {
        if ($trip->image) {
            Storage::disk('public')->delete($trip->image);
        }
        $trip->delete();
        return redirect()->route('trips.index')->with('success', 'Trip deleted successfully!');
    }
}
