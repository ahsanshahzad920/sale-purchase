<?php

namespace App\Http\Controllers\Admin;

use DB;
use Carbon\Carbon;
use App\Models\Sale;
use App\Models\Product;
use App\Models\Purchase;
use Carbon\CarbonPeriod;
use App\Models\SaleReturn;
use App\Models\ProductItem;
use App\Models\ManualReturn;
use Illuminate\Http\Request;
use App\Models\PurchaseReturn;
use App\Models\ProductWarehouse;
use App\Models\SalesInvoiceDetail;
use App\Http\Controllers\Controller;
use App\Models\PurchaseInvoiceDetail;

class DashboardController extends Controller
{
    public function index()
    {
        // $SalesAmount = SalesInvoiceDetail::sum('price');
        // $PurchaseAmount = PurchaseInvoiceDetail::sum('price');

        if (auth()->user()->hasRole('Cashier') || auth()->user()->hasRole('Manager')) {
            $warehouseId = auth()->user()->warehouse_id;
            $SalesAmount = Sale::where('warehouse_id', $warehouseId)->sum('grand_total');
            $PurchaseAmount = Purchase::where('warehouse_id', $warehouseId)->sum('grand_total');
            $todaySalesAmount = Sale::where('warehouse_id', $warehouseId)->whereDate('created_at', Carbon::today())->sum('grand_total');
            $todayPurchaseAmount = Purchase::where('warehouse_id', $warehouseId)->whereDate('created_at', Carbon::today())->sum('grand_total');
            $manualSaleReturn = ManualReturn::where('warehouse_id', $warehouseId)->sum('amount_due');

            $saleReturn = SaleReturn::whereHas('sales', function ($query) use ($warehouseId) {
                $query->where('warehouse_id', $warehouseId);
            })->sum('amount_due');
            // dd($saleReturn);
            $saleReturn += $manualSaleReturn;
            $topSellingProducts = ProductItem::select('product_id', DB::raw('sum(quantity) as total_quantity'))
                ->whereHas('sale', function ($query) use ($warehouseId) {
                    $query->where('warehouse_id', $warehouseId)->whereMonth('created_at', Carbon::now()->month);
                })
                ->groupBy('product_id')
                ->orderBy('total_quantity', 'desc')
                ->get();
            $topSellingProducts->load('product.product_warehouses');
            $topCustomerForMonth = Sale::select('customer_id', DB::raw('count(*) as total_sales'),  DB::raw('sum(grand_total) as total_amount'))
                ->where('warehouse_id', $warehouseId)
                ->whereMonth('created_at', Carbon::now()->month)
                ->groupBy('customer_id')
                ->orderBy('total_sales', 'desc')
                ->get();
            $topCustomerForMonth->load('customer');
            $products = Product::with('product_warehouses')->get();
            $stockAlert = collect();
            foreach ($products as $product) {
                foreach ($product->product_warehouses as $product_warehouse) {
                    if ($product_warehouse->quantity < $product->stock_alert && $product_warehouse->warehouse_id == $warehouseId) {
                        $stockAlert->push($product_warehouse);
                    }
                }
            }
            $stockAlert->each(function ($item) {
                $item->load('product', 'warehouse');
            });
            $recentTransactions = Sale::with('customer', 'warehouse')
                ->whereMonth('date', Carbon::now()->month )
                ->where('warehouse_id', $warehouseId)->orderBy('created_at', 'desc')->get();
            $endDate = Carbon::now()->startOfDay();
            $weekSales = [];
            $weakPurchase = collect();
            for ($i = 0; $i < 7; $i++) {
                $date = $endDate->copy()->subDays($i);
                $salesForDay = Sale::where('warehouse_id', $warehouseId)->whereDate('date', $date)
                    ->sum('grand_total');
                $purchaseForDay = Purchase::where('warehouse_id', $warehouseId)->whereDate('date', $date)
                    ->sum('grand_total');
                $weekSales[$date->toDateString()] = $salesForDay;
                $weekPurchase[$date->toDateString()] = $purchaseForDay;
            }
            $weekDays = collect($weekSales)->keys();
            $allWeekDays = collect();
            for ($i = 6; $i >= 0; $i--) {
                $allWeekDays->push(Carbon::now()->subDays($i)->toDateString());
            }
            $missingDays = $allWeekDays->diff($weekDays);
            foreach ($missingDays as $missingDay) {
                $weekSales[$missingDay] = 0;
            }
            $weekDays = collect($weekPurchase)->keys();
            $allWeekDaysPurchase = collect();
            for ($i = 6; $i >= 0; $i--) {
                $allWeekDaysPurchase->push(Carbon::now()->subDays($i)->toDateString());
            }
            $missingDaysPurchase = $allWeekDaysPurchase->diff($weekDays);
            foreach ($missingDaysPurchase as $missingDay) {
                $weekPurchase[$missingDay] = 0;
            }
            $purchaseReturn = PurchaseReturn::whereHas('purchase', function ($query) use ($warehouseId) {
                $query->where('warehouse_id', $warehouseId);
            })->sum('amount_due');

            return view('back.dashboard', compact(
                'SalesAmount',
                'PurchaseAmount',
                'todaySalesAmount',
                'todayPurchaseAmount',
                'saleReturn',
                'purchaseReturn',
                'topSellingProducts',
                'topCustomerForMonth',
                'stockAlert',
                'recentTransactions',
                'weekSales',
                'weekPurchase'
            ));
        }



        if (session()->has('selected_warehouse_id')) {
            $warehouseId = session('selected_warehouse_id');
            $SalesAmount = Sale::where('warehouse_id', $warehouseId)->sum('grand_total');
            $PurchaseAmount = Purchase::where('warehouse_id', $warehouseId)->sum('grand_total');
            $todaySalesAmount = Sale::where('warehouse_id', $warehouseId)->whereDate('created_at', Carbon::today())->sum('grand_total');
            $todayPurchaseAmount = Purchase::where('warehouse_id', $warehouseId)->whereDate('created_at', Carbon::today())->sum('grand_total');
            $manualSaleReturn = ManualReturn::where('warehouse_id', $warehouseId)->sum('amount_due');
            // $saleReturn = SaleReturn::where('warehouse_id', $warehouseId)->sum('amount_due');

            $saleReturn = SaleReturn::whereHas('sales', function ($query) use ($warehouseId) {
                $query->where('warehouse_id', $warehouseId);
            })->sum('amount_due');
            // dd($saleReturn);
            $saleReturn += $manualSaleReturn;
            $topSellingProducts = ProductItem::select('product_id', DB::raw('sum(quantity) as total_quantity'))
                ->whereHas('sale', function ($query) use ($warehouseId) {
                    $query->where('warehouse_id', $warehouseId)->whereMonth('created_at', Carbon::now()->month);
                })
                ->groupBy('product_id')
                ->orderBy('total_quantity', 'desc')
                ->get();
            $topSellingProducts->load('product.product_warehouses');
            $topCustomerForMonth = Sale::select('customer_id', DB::raw('count(*) as total_sales'),  DB::raw('sum(grand_total) as total_amount'))
                ->where('warehouse_id', $warehouseId)
                ->whereMonth('created_at', Carbon::now()->month)
                ->groupBy('customer_id')
                ->orderBy('total_sales', 'desc')
                ->get();
            $topCustomerForMonth->load('customer');
            $products = Product::with('product_warehouses')->get();
            $stockAlert = collect();
            foreach ($products as $product) {
                foreach ($product->product_warehouses as $product_warehouse) {
                    if ($product_warehouse->quantity < $product->stock_alert && $product_warehouse->warehouse_id == $warehouseId) {
                        $stockAlert->push($product_warehouse);
                    }
                }
            }
            $stockAlert->each(function ($item) {
                $item->load('product', 'warehouse');
            });
            $recentTransactions = Sale::with('customer', 'warehouse')
            ->whereMonth('date', Carbon::now()->month )
            ->where('warehouse_id', $warehouseId)->orderBy('created_at', 'desc')->get();
            $endDate = Carbon::now()->startOfDay();
            $weekSales = [];
            $weakPurchase = collect();
            for ($i = 0; $i < 7; $i++) {
                $date = $endDate->copy()->subDays($i);
                $salesForDay = Sale::where('warehouse_id', $warehouseId)->whereDate('date', $date)
                    ->sum('grand_total');
                $purchaseForDay = Purchase::where('warehouse_id', $warehouseId)->whereDate('date', $date)
                    ->sum('grand_total');
                $weekSales[$date->toDateString()] = $salesForDay;
                $weekPurchase[$date->toDateString()] = $purchaseForDay;
            }
            $weekDays = collect($weekSales)->keys();
            $allWeekDays = collect();
            for ($i = 6; $i >= 0; $i--) {
                $allWeekDays->push(Carbon::now()->subDays($i)->toDateString());
            }
            $missingDays = $allWeekDays->diff($weekDays);
            foreach ($missingDays as $missingDay) {
                $weekSales[$missingDay] = 0;
            }
            $weekDays = collect($weekPurchase)->keys();
            $allWeekDaysPurchase = collect();
            for ($i = 6; $i >= 0; $i--) {
                $allWeekDaysPurchase->push(Carbon::now()->subDays($i)->toDateString());
            }
            $missingDaysPurchase = $allWeekDaysPurchase->diff($weekDays);
            foreach ($missingDaysPurchase as $missingDay) {
                $weekPurchase[$missingDay] = 0;
            }
            $purchaseReturn = PurchaseReturn::whereHas('purchase', function ($query) use ($warehouseId) {
                $query->where('warehouse_id', $warehouseId);
            })->sum('amount_due');

            return view('back.dashboard', compact(
                'SalesAmount',
                'PurchaseAmount',
                'todaySalesAmount',
                'todayPurchaseAmount',
                'saleReturn',
                'purchaseReturn',
                'topSellingProducts',
                'topCustomerForMonth',
                'stockAlert',
                'recentTransactions',
                'weekSales',
                'weekPurchase'
            ));
        }

        $SalesAmount = Sale::sum('grand_total');
        $PurchaseAmount = Purchase::sum('grand_total');
        $todaySalesAmount = Sale::whereDate('created_at', Carbon::today())->sum('grand_total');

        $todayPurchaseAmount = Purchase::whereDate('created_at', Carbon::today())->sum('grand_total');

        $manualSaleReturn = ManualReturn::sum('amount_due');
        $saleReturn = SaleReturn::sum('amount_due');
        $saleReturn += $manualSaleReturn;

        // top selling products of this month with product and warehouse
        $topSellingProducts = ProductItem::select('product_id', DB::raw('sum(quantity) as total_quantity'))
            ->whereHas('sale', function ($query) {
                $query->whereMonth('created_at', Carbon::now()->month);
            })
            ->groupBy('product_id')
            ->orderBy('total_quantity', 'desc')
            ->get();
        $topSellingProducts->load('product.product_warehouses');

        // Top Customers
        $topCustomerForMonth = Sale::select('customer_id', DB::raw('count(*) as total_sales'),  DB::raw('sum(grand_total) as total_amount'))
            ->whereMonth('created_at', Carbon::now()->month)
            ->groupBy('customer_id')
            ->orderBy('total_sales', 'desc')
            ->get();
        $topCustomerForMonth->load('customer');
        // Stock Alert
        $products = Product::with('product_warehouses')->get();
        $stockAlert = collect();

        foreach ($products as $product) {
            foreach ($product->product_warehouses as $product_warehouse) {
                if ($product_warehouse->quantity < $product->stock_alert) {
                    $stockAlert->push($product_warehouse);
                }
            }
        }
        // Load the relationships on each item in the collection
        $stockAlert->each(function ($item) {
            $item->load('product', 'warehouse');
        });

        // Recent Transaction
        $recentTransactions = Sale::with('customer', 'warehouse')
        ->whereMonth('date', Carbon::now()->month)
        ->orderBy('created_at', 'desc')->get();

        // this week sale and purchase
        // $thisWeekSale = Sale::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('grand_total');
        // $thisWeekPurchase = Purchase::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('grand_total');
        // Get the start and end dates of the current week

        // // Get the start date (7 days ago) and end date (today)
        // $startDate = Carbon::now()->subDays(7)->startOfDay();
        // $endDate = Carbon::now()->endOfDay();

        // // // Get the sales data in descending order by creation date
        // $thisWeekSale = Sale::whereBetween('date', [$startDate, $endDate])
        //     ->orderBy('created_at', 'desc')
        //     ->get();
        // for($i = 0; $i < 7; $i++){
        //     if($thisWeekSale->where('date', Carbon::now()->subDays($i)->toDateString())->count() == 0){
        //         $thisWeekSale->push(new Sale([
        //             'date' => Carbon::now()->subDays($i)->toDateString(),
        //             'grand_total' => 0
        //         ]));
        //     }
        // }

        // week sale&purchase
        // Get today's date
        // $endDate = Carbon::now()->startOfDay();

        // // Initialize an array to store the sales data for each day
        // $weekSales = [];
        // $weakPurchase = collect();

        // // Iterate over the previous 7 days
        // for ($i = 0; $i < 7; $i++) {
        //     // Calculate the date by subtracting $i days from the end date
        //     $date = $endDate->copy()->subDays($i);

        //     // Query the sales data for the current day
        //     $salesForDay = Sale::whereDate('date', $date)
        //         ->sum('grand_total');
        //     $purchaseForDay = Purchase::whereDate('date', $date)
        //         ->sum('grand_total');

        //     // Assign the total sales for the day to the array
        //     $weekSales[$date->toDateString()] = $salesForDay;
        //     // Assign the total purchase for the day to the array
        //     $weekPurchase[$date->toDateString()] = $purchaseForDay;
        // }

        // // Fill in missing days with 0 sales
        // $weekDays = collect($weekSales)->keys();
        // $allWeekDays = collect();
        // for ($i = 6; $i >= 0; $i--) {
        //     $allWeekDays->push(Carbon::now()->subDays($i)->toDateString());
        // }
        // $missingDays = $allWeekDays->diff($weekDays);

        // foreach ($missingDays as $missingDay) {
        //     $weekSales[$missingDay] = 0;
        // }

        // // Fill in missing days with 0 purchase
        // $weekDays = collect($weekPurchase)->keys();
        // $allWeekDaysPurchase = collect();
        // for ($i = 6; $i >= 0; $i--) {
        //     $allWeekDaysPurchase->push(Carbon::now()->subDays($i)->toDateString());
        // }
        // $missingDaysPurchase = $allWeekDaysPurchase->diff($weekDays);

        // foreach ($missingDaysPurchase as $missingDay) {
        //     $weekPurchase[$missingDay] = 0;
        // }

        $purchaseReturn = PurchaseReturn::sum('amount_due');
        return view('back.dashboard', compact(
            'SalesAmount',
            'PurchaseAmount',
            'todaySalesAmount',
            'todayPurchaseAmount',
            'saleReturn',
            'purchaseReturn',
            'topSellingProducts',
            'topCustomerForMonth',
            'stockAlert',
            'recentTransactions',
            // 'weekSales',
            // 'weekPurchase'
        ));
    }


    // public function fetchSalesPurchases(Request $request)
    // {
    //     $period = $request->input('period');
    //     $endDate = Carbon::now()->startOfDay();

    //     if ($period === 'week') {
    //         $interval = 7;
    //     } elseif ($period === 'month') {
    //         $interval = 30;
    //     } else {
    //         return response()->json(['error' => 'Invalid period'], 400);
    //     }

    //     $sales = [];
    //     $purchases = [];

    //     if (auth()->user()->hasRole('Cashier') || auth()->user()->hasRole('Manager')) {
    //         $warehouseId = auth()->user()->warehouse_id;
    //         for ($i = 0; $i < $interval; $i++) {
    //             $date = $endDate->copy()->subDays($i);

    //             $sales[$date->toDateString()] = Sale::where('warehouse_id',session($warehouseId))->whereDate('date', $date)->sum('grand_total');
    //             $purchases[$date->toDateString()] = Purchase::whereDate('date', $date)->sum('grand_total');
    //         }
    //     }


    //     else if (session()->has('selected_warehouse_id'))
    //     {
    //         for ($i = 0; $i < $interval; $i++) {
    //             $date = $endDate->copy()->subDays($i);

    //             $sales[$date->toDateString()] = Sale::where('warehouse_id',session('selected_warehouse_id'))->whereDate('date', $date)->sum('grand_total');
    //             $purchases[$date->toDateString()] = Purchase::whereDate('date', $date)->sum('grand_total');
    //         }
    //     }
    //     else
    //     {
    //         for ($i = 0; $i < $interval; $i++) {
    //             $date = $endDate->copy()->subDays($i);

    //             $sales[$date->toDateString()] = Sale::whereDate('date', $date)->sum('grand_total');
    //             $purchases[$date->toDateString()] = Purchase::whereDate('date', $date)->sum('grand_total');
    //         }

    //     }


    //     $allDays = collect();
    //     for ($i = $interval - 1; $i >= 0; $i--) {
    //         $allDays->push(Carbon::now()->subDays($i)->toDateString());
    //     }

    //     $missingSalesDays = $allDays->diff(collect($sales)->keys());
    //     foreach ($missingSalesDays as $missingDay) {
    //         $sales[$missingDay] = 0;
    //     }

    //     $missingPurchaseDays = $allDays->diff(collect($purchases)->keys());
    //     foreach ($missingPurchaseDays as $missingDay) {
    //         $purchases[$missingDay] = 0;
    //     }

    //     ksort($sales);
    //     ksort($purchases);
    //     // dd($sales);

    //     return response()->json(['weekSales' => $sales, 'weekPurchase' => $purchases]);
    // }


    public function fetchSalesPurchases(Request $request)
    {
        $period = $request->input('period');
        $endDate = Carbon::now()->startOfDay();

        if ($period === 'week') {
            $interval = 7;
        } elseif ($period === 'month') {
            $interval = 30;
        } else {
            return response()->json(['error' => 'Invalid period'], 400);
        }

        $sales = [];
        $purchases = [];

        if (auth()->user()->hasRole('Cashier') || auth()->user()->hasRole('Manager')) {
            $warehouseId = auth()->user()->warehouse_id;
            for ($i = 0; $i < $interval; $i++) {
                $date = $endDate->copy()->subDays($i);

                // Format date as mm/dd/yy
                $formattedDate = $date->format('m/d/y');
                $sales[$formattedDate] = Sale::where('warehouse_id', session($warehouseId))
                    ->whereDate('date', $date)
                    ->sum('grand_total');
                $purchases[$formattedDate] = Purchase::whereDate('date', $date)
                    ->sum('grand_total');
            }
        } else if (session()->has('selected_warehouse_id')) {
            for ($i = 0; $i < $interval; $i++) {
                $date = $endDate->copy()->subDays($i);

                // Format date as mm/dd/yy
                $formattedDate = $date->format('m/d/y');
                $sales[$formattedDate] = Sale::where('warehouse_id', session('selected_warehouse_id'))
                    ->whereDate('date', $date)
                    ->sum('grand_total');
                $purchases[$formattedDate] = Purchase::whereDate('date', $date)
                    ->sum('grand_total');
            }
        } else {
            for ($i = 0; $i < $interval; $i++) {
                $date = $endDate->copy()->subDays($i);

                // Format date as mm/dd/yy
                $formattedDate = $date->format('m/d/y');
                $sales[$formattedDate] = Sale::whereDate('date', $date)
                    ->sum('grand_total');
                $purchases[$formattedDate] = Purchase::whereDate('date', $date)
                    ->sum('grand_total');
            }
        }

        $allDays = collect();
        for ($i = $interval - 1; $i >= 0; $i--) {
            $allDays->push(Carbon::now()->subDays($i)->format('m/d/y')); // Format date as mm/dd/yy
        }

        $missingSalesDays = $allDays->diff(collect($sales)->keys());
        foreach ($missingSalesDays as $missingDay) {
            $sales[$missingDay] = 0;
        }

        $missingPurchaseDays = $allDays->diff(collect($purchases)->keys());
        foreach ($missingPurchaseDays as $missingDay) {
            $purchases[$missingDay] = 0;
        }

        ksort($sales);
        ksort($purchases);

        return response()->json(['weekSales' => $sales, 'weekPurchase' => $purchases]);
    }
}
