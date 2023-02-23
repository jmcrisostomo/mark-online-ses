<?php

namespace App\Http\Controllers;

class CashierController extends Controller
{
    public function payments()
    {
        $dataTable = route('students.payment');
        return view('user.cashier.student-payment', ['header' => 'Payment',  'dataTable' => $dataTable]);
    }


}
