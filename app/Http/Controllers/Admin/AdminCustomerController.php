<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminCustomerController extends Controller
{
    public function getAllCustomersByCompanyId(Request $request)
    {
        return 'hello';
    }

    public function getCustomerInfoByCustomerId(Request $request)
    {
        return 'hello';
    }
    public function addCustomer(Request $request)
    {
        return 'hello';
    }
    public function deleteCustomer(Request $request)
    {
        return 'hello';
    }
}
