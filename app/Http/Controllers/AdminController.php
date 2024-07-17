<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class AdminController extends Controller
{
    public function index()
    {
        $invoices = Invoice::all();
        $totalPayments = 0;
        $currentYear = date('Y');
        
        $totalYear = Invoice::whereYear('created_at', $currentYear)
        ->where('status', 'paid')
        ->sum('amount');

        // Paid Invoices
        $janPaidTotal = Invoice::whereMonth('created_at', 1)
                                ->whereYear('created_at', $currentYear)
                                ->where('status', 'paid')
                                ->sum('amount');
        $febPaidTotal = Invoice::whereMonth('created_at', 2)
                                ->whereYear('created_at', $currentYear)
                                ->where('status', 'paid')
                                ->sum('amount');
        $marPaidTotal = Invoice::whereMonth('created_at', 3)
                                ->whereYear('created_at', $currentYear)
                                ->where('status', 'paid')
                                ->sum('amount');
        $aprPaidTotal = Invoice::whereMonth('created_at', 4)
                                ->whereYear('created_at', $currentYear)
                                ->where('status', 'paid')
                                ->sum('amount');
        $mayPaidTotal = Invoice::whereMonth('created_at', 5)
                                ->whereYear('created_at', $currentYear)
                                ->where('status', 'paid')
                                ->sum('amount');
        $junPaidTotal = Invoice::whereMonth('created_at', 6)
                                ->whereYear('created_at', $currentYear)
                                ->where('status', 'paid')
                                ->sum('amount');
        $julPaidTotal = Invoice::whereMonth('created_at', 7)
                                ->whereYear('created_at', $currentYear)
                                ->where('status', 'paid')
                                ->sum('amount');
        $augPaidTotal = Invoice::whereMonth('created_at', 8)
                                ->whereYear('created_at', $currentYear)
                                ->where('status', 'paid')
                                ->sum('amount');
        $sepPaidTotal = Invoice::whereMonth('created_at', 9)
                                ->whereYear('created_at', $currentYear)
                                ->where('status', 'paid')
                                ->sum('amount');
        $octPaidTotal = Invoice::whereMonth('created_at', 10)
                                ->whereYear('created_at', $currentYear)
                                ->where('status', 'paid')
                                ->sum('amount');
        $novPaidTotal = Invoice::whereMonth('created_at', 11)
                                ->whereYear('created_at', $currentYear)
                                ->where('status', 'paid')
                                ->sum('amount');
        $decPaidTotal = Invoice::whereMonth('created_at', 12)
                                ->whereYear('created_at', $currentYear)
                                ->where('status', 'paid')
                                ->sum('amount');
        
        // Unpaid Invoices
        $janUnpaidTotal = Invoice::whereMonth('created_at', 1)
                                ->whereYear('created_at', $currentYear)
                                ->where('status', 'unpaid')
                                ->sum('amount');
        $febUnpaidTotal = Invoice::whereMonth('created_at', 2)
                                ->whereYear('created_at', $currentYear)
                                ->where('status', 'unpaid')
                                ->sum('amount');
        $marUnpaidTotal = Invoice::whereMonth('created_at', 3)
                                ->whereYear('created_at', $currentYear)
                                ->where('status', 'unpaid')
                                ->sum('amount');
        $aprUnpaidTotal = Invoice::whereMonth('created_at', 4)
                                ->whereYear('created_at', $currentYear)
                                ->where('status', 'unpaid')
                                ->sum('amount');
        $mayUnpaidTotal = Invoice::whereMonth('created_at', 5)
                                ->whereYear('created_at', $currentYear)
                                ->where('status', 'unpaid')
                                ->sum('amount');
        $junUnpaidTotal = Invoice::whereMonth('created_at', 6)
                                ->whereYear('created_at', $currentYear)
                                ->where('status', 'unpaid')
                                ->sum('amount');
        $julUnpaidTotal = Invoice::whereMonth('created_at', 7)
                                ->whereYear('created_at', $currentYear)
                                ->where('status', 'unpaid')
                                ->sum('amount');
        $augUnpaidTotal = Invoice::whereMonth('created_at', 8)
                                ->whereYear('created_at', $currentYear)
                                ->where('status', 'unpaid')
                                ->sum('amount');
        $sepUnpaidTotal = Invoice::whereMonth('created_at', 9)
                                ->whereYear('created_at', $currentYear)
                                ->where('status', 'unpaid')
                                ->sum('amount');
        $octUnpaidTotal = Invoice::whereMonth('created_at', 10)
                                ->whereYear('created_at', $currentYear)
                                ->where('status', 'unpaid')
                                ->sum('amount');
        $novUnpaidTotal = Invoice::whereMonth('created_at', 11)
                                ->whereYear('created_at', $currentYear)
                                ->where('status', 'unpaid')
                                ->sum('amount');
        $decUnpaidTotal = Invoice::whereMonth('created_at', 12)
                                ->whereYear('created_at', $currentYear)
                                ->where('status', 'unpaid')
                                ->sum('amount');
        
        $paid = Invoice::where('status', 'paid')->whereYear('created_at', $currentYear)->count();
        $unpaid = Invoice::where('status', 'unpaid')->whereYear('created_at', $currentYear)->count();

        $year_current_unpaid = Invoice::whereYear('created_at', $currentYear)
        ->where('status', 'unpaid')
        ->sum('amount');
        $year_current_paid = Invoice::whereYear('created_at', $currentYear)
        ->where('status', 'paid')
        ->sum('amount');

        $lastYear = $currentYear - 1;

        $last_current_unpaid = Invoice::whereYear('created_at', $lastYear)
        ->where('status', 'unpaid')
        ->sum('amount');
        $last_current_paid = Invoice::whereYear('created_at', $lastYear)
        ->where('status', 'paid')
        ->sum('amount');

        $lastYear2 = $lastYear - 1;

        $last2_current_unpaid = Invoice::whereYear('created_at', $lastYear2)
        ->where('status', 'unpaid')
        ->sum('amount');
        $last2_current_paid = Invoice::whereYear('created_at', $lastYear2)
        ->where('status', 'paid')
        ->sum('amount');

        $lastYear3 = $lastYear2 - 1;

        $last3_current_unpaid = Invoice::whereYear('created_at', $lastYear3)
        ->where('status', 'unpaid')
        ->sum('amount');
        $last3_current_paid = Invoice::whereYear('created_at', $lastYear3)
        ->where('status', 'paid')
        ->sum('amount');

        $lastYear4 = $lastYear3 - 1;

        $last4_current_unpaid = Invoice::whereYear('created_at', $lastYear4)
        ->where('status', 'unpaid')
        ->sum('amount');
        $last4_current_paid = Invoice::whereYear('created_at', $lastYear4)
        ->where('status', 'paid')
        ->sum('amount');

        $lastYear5 = $lastYear4 - 1;

        $last5_current_unpaid = Invoice::whereYear('created_at', $lastYear5)
        ->where('status', 'unpaid')
        ->sum('amount');
        $last5_current_paid = Invoice::whereYear('created_at', $lastYear5)
        ->where('status', 'paid')
        ->sum('amount');
        
        $topCustomers = Invoice::with('customer')
            ->select('customer_id')
            ->selectRaw('COUNT(*) as total_invoices')
            ->groupBy('customer_id')
            ->orderByDesc('total_invoices')
            ->limit(5)
            ->get();

        $top5Customers = collect();

        foreach ($topCustomers as $invoice) {
            $top5Customers->push($invoice->customer);
        }
        
        return view('admin.index', [
            'lastYear5'=>$lastYear5,
            'lastYear4'=>$lastYear4,
            'lastYear3'=>$lastYear3,
            'lastYear2'=>$lastYear2,
            'lastYear'=>$lastYear,
            'currentYear'=>$currentYear,
            'last5_current_paid' => $last5_current_paid,
            'last5_current_unpaid' => $last5_current_unpaid,
            'last4_current_paid' => $last4_current_paid,
            'last4_current_unpaid' => $last4_current_unpaid,
            'last3_current_paid' => $last3_current_paid,
            'last3_current_unpaid' => $last3_current_unpaid,
            'last2_current_paid' => $last2_current_paid,
            'last2_current_unpaid' => $last2_current_unpaid,
            'last_current_paid' => $last_current_paid,
            'last_current_unpaid' => $last_current_unpaid,
            'year_current_unpaid' => $year_current_unpaid,
            'year_current_paid' => $year_current_paid,
            'top5Customers' => $top5Customers,
            'invoice' => $invoices,
            'paid' => $paid,
            'unpaid' => $unpaid,
            'total_year' => $totalYear,
            'janPaidTotal' => $janPaidTotal,
            'febPaidTotal' => $febPaidTotal,
            'marPaidTotal' => $marPaidTotal,
            'aprPaidTotal' => $aprPaidTotal,
            'mayPaidTotal' => $mayPaidTotal,
            'junPaidTotal' => $junPaidTotal,
            'julPaidTotal' => $julPaidTotal,
            'augPaidTotal' => $augPaidTotal,
            'sepPaidTotal' => $sepPaidTotal,
            'octPaidTotal' => $octPaidTotal,
            'novPaidTotal' => $novPaidTotal,
            'decPaidTotal' => $decPaidTotal,
            'janUnpaidTotal' => $janUnpaidTotal,
            'febUnpaidTotal' => $febUnpaidTotal,
            'marUnpaidTotal' => $marUnpaidTotal,
            'aprUnpaidTotal' => $aprUnpaidTotal,
            'mayUnpaidTotal' => $mayUnpaidTotal,
            'junUnpaidTotal' => $junUnpaidTotal,
            'julUnpaidTotal' => $julUnpaidTotal,
            'augUnpaidTotal' => $augUnpaidTotal,
            'sepUnpaidTotal' => $sepUnpaidTotal,
            'octUnpaidTotal' => $octUnpaidTotal,
            'novUnpaidTotal' => $novUnpaidTotal,
            'decUnpaidTotal' => $decUnpaidTotal,
        ]);
        
    }

    public function userPage()
    {
        $users = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'admin');
        })->get();
        return view('admin.user', ['users' => $users]);
    }

    public function addUser()
    {
        return view('admin.adduser');
    }

    public function storeUser(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);
        //dd($request->all());
        $user = new User();
        $user->creater_id = auth()->user()->id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        if ($request->filled('access') && $request->filled('access2')&& $request->filled('access3')) {
            $user->assignRole('all_access');

        }
        elseif($request->filled('access3'))
        {
            $user->assignRole('all_access');
        }
        elseif ($request->filled('access') && $request->filled('access2'))
        {
            $user->assignRole('user');
        }
        elseif ($request->filled('access') && $request->filled('access3')){
            $user->assignRole('all_access');
        } 
        elseif ($request->filled('access2') && $request->filled('access3')){
            $user->assignRole('all_access');
        } 
        elseif ($request->filled('access')) {

            $user->assignRole('payment');
        } elseif ($request->filled('access2')) {

            $user->assignRole('user');
        } else {
            $user->assignRole('not_access');
        }
        return redirect()->route('admin.users')->with(['success' => 'User created successfully']);
    }

    public function delete(Request $request)
    {
        $user = User::find($request->user_id);
        $user->delete();
        return redirect()->route('admin.users')->with(['success' => 'User deleted successfully']);
    }

    public function editUser($id)
    {
        $user = User::find($id);
        return view('admin.edituser', ['user' => $user]);
    }
    public function updateUser(Request $request)
    {
        $user = User::find($request->user_id);
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $user->id,
            'password' => 'nullable',
            'confirm_password' => 'nullable|same:password',
        ]);
        //dd($request->all());
        $user->name = $request->name;
        $user->email = $request->email;
        if (isset($request->password)) {

            $user->password = bcrypt($request->password);
        }
        $user->save();
        
        $user->roles()->detach();
        if ($request->filled('access') && $request->filled('access2')&& $request->filled('access3')) {
            $user->assignRole('all_access');

        }
        elseif($request->filled('access3'))
        {
            $user->assignRole('all_access');
        }
        elseif ($request->filled('access') && $request->filled('access2'))
        {
            $user->assignRole('user');
        }
        elseif ($request->filled('access') && $request->filled('access3')){
            $user->assignRole('all_access');
        } 
        elseif ($request->filled('access2') && $request->filled('access3')){
            $user->assignRole('all_access');
        } 
        elseif ($request->filled('access')) {
           
            $user->assignRole('payment');
        } elseif ($request->filled('access2')) {
           

            $user->assignRole('user');
        } else {
            $user->assignRole('not_access');
        }
        return redirect()->route('admin.users')->with(['success' => 'User updated successfully']);
    }
    public function invoicePage(Request $request)
    {
        $invoices = Invoice::orderBy('created_at', 'desc');
    
        // Filter by month if selected
        if ($request->has('month')) {
            $selectedMonth = $request->month;
            if ($selectedMonth != 'all') {
                $selectedMonth = Carbon::parse($selectedMonth)->format('m');
                $invoices->whereMonth('created_at', $selectedMonth);
            }
        }
    
        // Get distinct months from invoices
        $months = Invoice::selectRaw('MONTH(created_at) as month')
            ->groupBy('month')
            ->get()
            ->map(function ($item) {
                return Carbon::createFromFormat('m', $item->month)->format('F Y');
            });
    
        $invoices = $invoices->get();
    
        return view('admin.invoices', ['invoices' => $invoices, 'months' => $months]);
    }
    

    public function addInvoice()
    {
        $customers = Customer::all();
        return view('admin.addinvoice', ['customers' => $customers]);
    }

    public function profilePage()
    {
        $user = User::find(auth()->user()->id);
        return view('admin.profile', ['user' => $user]);
    }

    public function updateProfile(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        if (isset($request->password)) {

            $user->password = bcrypt($request->password);
        }
        if(isset($request->image))
        {
            $image = $request->file('image');
            $path = $image->store('profile', 'public');
            $user->image = asset('public/storage/' . $path);
        }
        $user->save();
        return redirect()->back()->with(['success' => 'Profile updated successfully']);
    }

    public function customer()
    {
        $users = Customer::all();
        return view('admin.customer', ['users' => $users]);
    }

    public function addCustomer()
    {
        $users = User::all();
        return view('admin.addcustomer', ['users' => $users]);
    }

    public function storeCustomer(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:customers',
            'phone' => 'nullable|unique:customers',
            'title' => 'nullable',
            'user_id' => 'required',
        ]);
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->title = $request->title;
        $customer->user_id = $request->user_id;
        $customer->save();
        return redirect()->route('admin.customer')->with(['success' => 'Customer created successfully']);
    }

    public function deleteCustomer(Request $request)
    {
        $customer = Customer::find($request->user_id);
        $customer->delete();
        return redirect()->route('admin.customer')->with(['success' => 'Customer deleted successfully']);
    }
    public function editCustomer($id)
    {
        $customer = Customer::find($id);
        $users = User::where('id', '!=', $customer->user_id)
        ->whereDoesntHave('roles', function ($query) {
            $query->where('name', 'admin');
        })
        ->get();
        return view('admin.editcustomer', ['customer' => $customer, 'users' => $users]);
    }

    public function updateCustomer(Request $request)
    {
        $customer = Customer::find($request->customer_id);

        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:customers,email,' . $customer->id,
            'phone' => 'nullable|unique:customers,phone,' . $customer->id,
            'title' => 'nullable',
            'user_id' => 'nullable',
        ]);
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->title = $request->title;
        if(isset($request->user_id))
        {
            $customer->transfer_user_id = $request->user_id;
        }
      
        $customer->save();
        return redirect()->route('admin.customer')->with(['success' => 'Customer updated successfully']);
    }

    public function viewCustomer($id, Request $request)
    {
        $customer = Customer::find($id);
    
        $invoices = Invoice::where('customer_id', $customer->id)->orderBy('created_at', 'desc');
    
        // Filter by month if selected
        if ($request->has('month')) {
            $selectedMonth = $request->month;
            if ($selectedMonth != 'all') {
                $selectedMonth = Carbon::parse($selectedMonth)->format('m');
                $invoices->whereMonth('created_at', $selectedMonth);
            }
        }
    
        // Get distinct months from invoices
        $months = Invoice::selectRaw('MONTH(created_at) as month')
            ->groupBy('month')->where('customer_id', $customer->id)
            ->get()
            ->map(function ($item) {
                return Carbon::createFromFormat('m', $item->month)->format('F Y');
            });
    
        $invoices = $invoices->get();
    
        return view('admin.viewcustomer', ['customer' => $customer, 'invoices' => $invoices, 'months' => $months]);
    }
    
}
