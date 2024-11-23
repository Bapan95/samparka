<?php

namespace App\Http\Controllers;

use App\Models\Memberships;
use DB;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    // Display a listing of the memberships
    public function index(Request $request)
    {
        // Fetch branches for the dropdown using the Eloquent model
        $branches = DB::table('branch')->select('id', 'branch_name')->get();

        // Fetch unique names for the dropdown using the Memberships model
        $names = Memberships::select('name')->distinct()->get();

        // Start building the query using Eloquent
        $query = Memberships::query();

        // Apply filters based on the request inputs
        if ($request->filled('branch')) {
            $query->where('branch', $request->branch);
        }

        if ($request->filled('name')) {
            $query->where('name', $request->name);
        }

        // Order by id descending and retrieve results
        $memberships = $query->orderBy('id', 'desc')->get();

        return view('membership.index', compact('memberships', 'branches', 'names'));
    }
    // Show the form for creating a new membership
    public function create()
    {
        $branches = DB::table('branch')->select('id', 'branch_name')->get(); // Fetch all branches
        $newspapers = DB::table('newspapers')->select('id', 'newspaper_name')->get(); // Fetch all newspapers

        return view('membership.create', compact('branches', 'newspapers'));
    }

    // Store a newly created membership in the database
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'branch' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'age' => 'required|integer',
            'date_of_receipt' => 'required|date',
            'class' => 'nullable|string|max:255',
            'occupation' => 'nullable|string|max:255',
            'front' => 'nullable|string|max:255',
            'newspaper' => 'nullable|string|max:255',
            'monthly_income' => 'nullable|numeric',
            // 'levy_rate' => 'nullable|numeric',
            // 'january' => 'nullable|string|max:255',
            // 'february' => 'nullable|string|max:255',
            // 'march' => 'nullable|string|max:255',
            // 'april' => 'nullable|string|max:255',
            // 'may' => 'nullable|string|max:255',
            // 'june' => 'nullable|string|max:255',
            // 'july' => 'nullable|string|max:255',
            // 'august' => 'nullable|string|max:255',
            // 'september' => 'nullable|string|max:255',
            // 'october' => 'nullable|string|max:255',
            // 'november' => 'nullable|string|max:255',
            // 'december' => 'nullable|string|max:255',
            // 'state_relief_fund' => 'nullable|numeric',
            // 'one_day_income' => 'nullable|numeric',
            // 'aid_fago' => 'nullable|numeric',
            // 'comment' => 'nullable|string',
        ]);

        // Create a new membership record
        Memberships::create($request->all());

        // Redirect to the membership index page with a success message
        return redirect()->route('memberships.index')->with('success', 'Memberships created successfully!');
    }

    // Display the specified membership
    public function show(Memberships $membership)
    {
        return view('membership.show', compact('membership'));
    }

    // Show the form for editing the specified membership
    public function edit(Memberships $membership)
    {
        $branches = DB::table('branch')->pluck('branch_name', 'id');  // Assuming a `branches` table
        $newspapers = DB::table('newspapers')->pluck('newspaper_name', 'id');  // Assuming a `newspapers` table

        return view('membership.edit', compact('membership', 'branches', 'newspapers'));
    }


    // Update the specified membership in the database
    public function update(Request $request, Memberships $membership)
    {
        // print_r($request->all());
        // die;
        // Validate the request
        $request->validate([
            'branch' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'date_of_receipt' => 'required|date',
            'class' => 'nullable|string|max:255',
            'occupation' => 'nullable|string|max:255',
            'front' => 'nullable|string|max:255',
            'newspaper' => 'nullable|string|max:255',
            'monthly_income' => 'nullable|numeric',
            'levy_rate' => 'nullable|numeric',
            // 'state_relief_fund' => 'nullable|numeric',
            // 'one_day_income' => 'nullable|numeric',
            // 'aid_fago' => 'nullable|numeric',
            // 'comment' => 'nullable|string',
        ]);
        // Handle checkboxes for months (set to null if not present in the request)
        $months = [
            'january',
            'february',
            'march',
            'april',
            'may',
            'june',
            'july',
            'august',
            'september',
            'october',
            'november',
            'december'
        ];
        foreach ($months as $month) {
            $request[$month] = $request->has($month) ? $request[$month] : null;
        }
        // Calculate the age and store only the year
        $age = \Carbon\Carbon::parse($membership->date_of_birth)->age;
        $request->merge(['age' => $age]);
        // print_r($age);
        // die;
        // Update the membership record
        $membership->update($request->all());

        // Redirect to the membership index page with a success message
        return redirect()->route('memberships.index')->with('success', 'Memberships updated successfully!');
    }

    // Remove the specified membership from the database
    public function destroy(Memberships $membership)
    {
        $membership->delete();

        // Redirect to the membership index page with a success message
        return redirect()->route('memberships.index')->with('success', 'Memberships deleted successfully!');
    }
}
