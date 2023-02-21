<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class TransactionController extends Controller
{
    public function getUnpaidTransaction(Request $request)
    {
        if ($request->ajax()) {
            $studentId = session('student_id');

            $data = DB::table('transaction')
                ->select('transaction.*')
                ->where('transaction_status', 'UNPAID')
                ->where('student_id', $studentId)
                ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('amount_dec', function ($row) {
                    return number_format($row->amount, 2, '.');
                })
                ->addColumn('description', function ($row) {

                    $transactionDetails = DB::table('transaction_detail')
                        ->select('transaction_detail.transaction_type', 'transaction_detail.transaction_name', 'transaction_detail.amount')
                        ->where('transaction_id', $row->id)
                        ->get();

                    $description = '<table class="table table-sm table-borderless mt-1" style="border-color: #eee;">';
                    foreach ($transactionDetails as $detail) {
                        $temp = '<tr>';
                        $temp .= '<td>' . $detail->transaction_type . '</td>';
                        $temp .= '<td>' . $detail->transaction_name . '</td>';
                        $temp .= '<td class="text-end">' . number_format($detail->amount, 2, '.') . '</td>';
                        $temp .= '</tr>';
                        $description .= $temp;
                    }
                    $description .= '</table>';

                    return $description;
                })
                ->addColumn('status_badge', function ($row) {

                    if ($row->transaction_status == 'CANCELLED') {
                        $badge = '<span class="badge bg-warning text-dark">' . $row->transaction_status . '</span>';
                    } else if ($row->transaction_status == 'PAID') {
                        $badge = '<span class="badge bg-success">' . $row->transaction_status . '</span>';
                    } else if ($row->transaction_status == 'UNPAID') {
                        $badge = '<span class="badge bg-danger">' . $row->transaction_status . '</span>';
                    } else {
                        $badge = '<span class="badge bg-light">' . $row->transaction_status . '</span>';
                    }

                    return $badge;
                })
                ->addColumn('action', function ($row) {

                    if ($row->transaction_status == 'UNPAID') {
                        $actionBtn = '
                        <a class="docs btn btn-primary btn-sm" data-student-id="' . $row->id . '">Pay</a>';
                    }

                    // else {
                    //     $actionBtn = '
                    //     <a class="docs btn btn-primary btn-sm" data-student-id="' . $row->id . '">Test</a>';
                    // }


                    return $actionBtn;
                })
                ->rawColumns(['action', 'status_badge', 'description', 'amount_dec'])
                ->make(true);
        }
    }
}
