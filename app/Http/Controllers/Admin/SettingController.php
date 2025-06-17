<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Warehouse;
use App\Models\ShopifyStore;

class SettingController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd("setting");
        $warehouses = Warehouse::with('users')->where('tenant_id',getTenantId())->get();
        $customers = Customer::with('user')->where('tenant_id',getTenantId())->get();
        $setting = Setting::where('tenant_id',getTenantId())->first();
        $shopify_store = ShopifyStore::where('tenant_id',getTenantId())->first();
        // dd($setting);
            // $brands = SettingResource::collection(Setting::all());
        return view('back.setting.index',compact('warehouses','customers','setting','shopify_store'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // $warehouses = Warehouse::with('users')->get();
        // $customers = Customer::with('user')->get();
        // // dd($customers);
        //     // $brands = SettingResource::collection(Setting::all());
        // return view('back.setting.index',compact('warehouses','customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $data['created_by'] = auth()->id();
        $data['updated_by'] = auth()->id();
        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $filename = "logo"."_".rand(1111,9999).'.'.$file->extension();
            $file->storeAs('public/images/logo/',$filename);
            $data['logo'] = "/images/logo/".$filename;
        }
        // dd($data);
        $data['shopify_enable'] = $request->shopify_enable == 'on' ? 1 : 0;

        $setting = Setting::where('tenant_id',getTenantId())->first() ?? new Setting();
        $setting->fill($data)->save();

        // if request has access_token and shop_domain then check if shopify store exists then update otherwise create new
        if($request->has('access_token') && $request->has('shop_domain')){
            $shopify_store = ShopifyStore::where('shop_domain',$request->shop_domain)->where('tenant_id',getTenantId())->first();
            // if(ShopifyStore::where('shop_domain',$request->shop_domain)->first()){
            //     return redirect()->back()->with('error','Shopify Store Already Exists!');
            // }
            if($shopify_store){
                $shopify_store->update([
                    'access_token' => $request->access_token,
                    'shop_domain' => $request->shop_domain,
                    'user_id' => auth()->user()->id,
                    'updated_by' => auth()->user()->id,
                ]);
            }else{
                ShopifyStore::create([
                    'access_token' => $request->access_token,
                    'shop_domain' => $request->shop_domain,
                    'user_id' => auth()->user()->id,
                    'created_by' => auth()->user()->id,
                    'tenant_id' => getTenantId(),
                ]);
            }
        }
        return redirect()->back()->with('success','Setting Updated Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


     public function emailSetting(){
        // dd("ues");
        $setting = Setting::where('tenant_id',getTenantId())->first();
        return view('back.setting.email',compact('setting'));
     }

     public function smsSetting(){
        $setting = Setting::where('tenant_id',getTenantId())->first();
        return view('back.setting.sms',compact('setting'));
     }

     public function posSetting(){
        $setting = Setting::where('tenant_id',getTenantId())->first();
        return view('back.setting.pos',compact('setting'));
     }
     public function paymentSetting(){
        $setting = Setting::where('tenant_id',getTenantId())->first();
        return view('back.setting.payment',compact('setting'));
     }

    //shopifyEnable



    public function shopifyEnable(Request $request){
        // dd($request->all());
        $setting = Setting::where('tenant_id',getTenantId())->first();
        $setting->shopify_enable = $request->shopify_enable;
        $setting->save();
        return redirect()->back()->with('success','Shopify Enabled Successfully!');
    }

    public function pricingEnable(Request $request){

        $setting = Setting::where('tenant_id',getTenantId())->first();
        $setting->show_pricing = $request->show_pricing;
        $setting->save();
        return redirect()->back()->with('success','Shopify Enabled Successfully!');
    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
