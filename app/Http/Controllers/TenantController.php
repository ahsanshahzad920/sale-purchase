<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Sale;
use App\Models\Unit;
use App\Models\Brand;
use App\Models\Tenant;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Category;
use App\Models\CustomDomain;
use App\Models\Customer;
use App\Models\Purchase;
use App\Models\SubCategory;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TenantController extends Controller
{
    public function index()
    {
        // Fetch all tenants
        // $tenants = Tenant::all();

        // return view('tenants.index', compact('tenants'));
    }

    public function site()
    {
        // Fetch tenant by subdomain
        // $tenant = Tenant::where('subdomain', $subdomain)->firstOrFail();

        // return view('tenants.site', compact('tenant'));
        // return "<h1 style='text-align:center'>Welcome to the website</h1>";
        $monthlyPlans = Plan::with('services')->displayOn()
            ->where('type', 'monthly')
            ->with('features')
            ->get();
        $yearlyPlans = Plan::with('services')->displayOn()
            ->where('type', 'yearly')
            ->with('features')
            ->get();
        return view('super-admin.index', compact('monthlyPlans', 'yearlyPlans'));
    }


    public function updateStatus(Request $request, $tenant_id)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,approved,rejected'
        ]);
        $tenant = Tenant::findOrFail($tenant_id);
        // dd($validated, $tenant);

        $tenant->update(['status' => $validated['status']]);

        return response()->json(['success' => true]);
    }



    public function contactStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:500'
        ]);

        Contact::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'subject' => $validated['subject'],
            'message' => $validated['message']
        ]);

        return redirect()->back()->with('success', 'Your message has been sent successfully.');
    }


    public function customDomainRequests()
    {
        $domains = CustomDomain::latest()->get();
        return view('super-admin.dashboard.domain.index',compact('domains'));
    }

    public function approveCustomDomain(Request $request, $domain_id)
    {
        $domain = CustomDomain::findOrFail($domain_id);
        $domain->update(['status' => 'approved']);

        // Here you can add logic to update the DNS records or any other necessary actions

        return redirect()->back()->with('success', 'Custom domain approved successfully.');
    }
    public function rejectCustomDomain(Request $request, $domain_id)
    {
        $domain = CustomDomain::findOrFail($domain_id);
        $domain->update(['status' => 'rejected']);

        // Here you can add logic to notify the user or any other necessary actions

        return redirect()->back()->with('success', 'Custom domain rejected successfully.');
    }
    // delete custom domain
    public function deleteCustomDomainRequest(Request $request, $domain_id)
    {
        $domain = CustomDomain::findOrFail($domain_id);
        $domain->delete();

        // Here you can add logic to notify the user or any other necessary actions

        return redirect()->back()->with('success', 'Custom domain deleted successfully.');
    }

    public function contactUs()
    {
        return view('super-admin.contact');
    }

    public function contactUsStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:1000'
        ]);

        Contact::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'subject' => $validated['subject'],
            'message' => $validated['message']
        ]);

        return redirect()->back()->with('success', 'Your message has been sent successfully.');
    }




    public function updateTenant(){

        // dd('This is a test function to update tenant ID for all models.');

        // increase time
        // set_time_limit(0);

        // $category = Category::all();
        // foreach($category as $cat){
        //     $cat->tenant_id = 10;
        //     $cat->save();
        // }
        // $subCategory = SubCategory::all();
        // foreach($subCategory as $subCat){
        //     $subCat->tenant_id = 10;
        //     $subCat->save();
        // }
        // $brand = Brand::all();
        // foreach($brand as $br){
        //     $br->tenant_id = 10;
        //     $br->save();
        // }
        // $product = Product::all();
        // foreach($product as $pro){
        //     $pro->tenant_id = 10;
        //     $pro->save();
        // }
        // $unit = Unit::all();
        // foreach($unit as $un){
        //     $un->tenant_id = 10;
        //     $un->save();
        // }
        // $customer = Customer::all();
        // foreach($customer as $cus){
        //     $cus->tenant_id = 10;
        //     $cus->save();
        // }
        // $sales = Sale::all();
        // foreach($sales as $sale){
        //     $sale->tenant_id = 10;
        //     $sale->save();
        // }
        // $purchase = Purchase::all();
        // foreach($purchase as $pur){
        //     $pur->tenant_id = 10;
        //     $pur->save();
        // }
        // $warehouses = Warehouse::all();
        // foreach($warehouses as $warehouse){
        //     $warehouse->tenant_id = 10;
        //     $warehouse->save();
        // }
        // $warehouseProducts = \App\Models\ProductWarehouse::all();
        // foreach($warehouseProducts as $warehouseProduct){
        //     $warehouseProduct->tenant_id = 10;
        //     $warehouseProduct->save();
        // }
        // $barcodes = \App\Models\Barcode::all();
        // foreach($barcodes as $barcode){
        //     $barcode->tenant_id = 10;
        //     $barcode->save();
        // }

        // $salesInvoicePayments = \App\Models\SalesInvoicePayment::all();
        // foreach($salesInvoicePayments as $payment){
        //     $payment->tenant_id = 10;
        //     $payment->save();
        // }
        // $sales_payment = \App\Models\SalesPayment::all();
        // foreach($sales_payment as $payment){
        //     $payment->tenant_id = 10;
        //     $payment->save();
        // }
        // $salesInvoice = \App\Models\SaleInvoice::all();
        // foreach($salesInvoice as $invoice){
        //     $invoice->tenant_id = 10;
        //     $invoice->save();
        // }
        return response()->json(['status' => 200, 'message' => 'Tenant ID updated successfully!']);
    }



}
