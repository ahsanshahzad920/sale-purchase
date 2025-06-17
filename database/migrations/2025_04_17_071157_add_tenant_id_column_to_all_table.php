<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTenantIdColumnToAllTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('about_us', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('accounts', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('add_to_carts', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('admin_credit_cards', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('ads', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('app_settings', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('attendances', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('banner_sections', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('banner_section_images', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('barcodes', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('bills', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('bill_payment_histories', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('bill_product_items', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('brands', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('categories', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('companies', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('contact_us', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('credit_activities', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('customers', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('customer_shipping_addresses', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('departments', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('deposits', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('deposit_categories', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('designations', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('device_returns', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('employees', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('expenses', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('expense_categories', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('holidays', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('inventories', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('landing_page_headings', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('leave_requests', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('leave_types', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('manual_purchase_returns', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('manual_purchase_return_items', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('manual_returns', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('manual_return_items', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('non_purchase_payment', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('non_sales_payment', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('office_shifts', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('payment_methods', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('payrolls', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('pay_bills', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('products', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('product_images', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('product_inventories', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('product_reviews', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('product_items', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('product_warehouses', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('profiles', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('purchases', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('purchase_invoices', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('purchase_invoice_payment', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('purchase_payment', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('purchase_product_items', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('purchase_returns', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('purchase_return_items', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('reserve_orders', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('sales', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('sales_invoice_payment', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('sales_payment', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('sale_invoices', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('sale_returns', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('sale_return_items', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('sale_shipping_addresses', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('saved_credit_cards', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('settings', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('shipments', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('shopify_stores', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('sub_categories', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('support_tickets', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('taxes', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('tiers', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('transfers', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('transfer_money', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('transfer_product_items', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('units', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('variants', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('variant_options', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('vendors', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('warehouses', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('warranties', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
        Schema::table('wishlists', function (Blueprint $table) {
            $table->foreignId('tenant_id')->after('id')->nullable()->constrained('tenants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('about_us', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('accounts', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('add_to_carts', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('admin_credit_cards', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('ads', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('app_settings', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('attendances', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('banner_sections', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('banner_section_images', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('barcodes', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('bill_payment_histories', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('bill_product_items', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('brands', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('categories', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('companies', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('contact_us', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('credit_activities', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('customers', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('customer_shipping_addresses', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('departments', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('deposits', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('deposit_categories', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('designations', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('device_returns', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('employees', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('expenses', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('expense_categories', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('holidays', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('inventories', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('landing_page_headings', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('leave_requests', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('leave_types', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('manual_purchase_returns', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('manual_purchase_return_items', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('manual_returns', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('manual_return_items', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('non_purchase_payment', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('non_sales_payment', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('office_shifts', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('payment_methods', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('payrolls', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('pay_bills', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('product_inventories', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('product_reviews', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('product_warehouses', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('purchases', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('purchase_invoices', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('purchase_invoice_payment', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('purchase_payment', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('purchase_product_items', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('purchase_returns', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('purchase_return_items', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('reserve_orders', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('sales', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('sales_invoice_payment', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('sales_payment', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('sale_invoices', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('sale_returns', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('sale_return_items', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('sale_shipping_addresses', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('saved_credit_cards', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('settings', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('shipments', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('shopify_stores', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('sub_categories', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('support_tickets', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('taxes', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('tiers', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('transfers', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('transfer_money', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('transfer_product_items', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('units', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('variants', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('variant_options', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('vendors', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('warehouses', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('warranties', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
        Schema::table('wishlists', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
    }
}
