<?php

namespace App\Http\Controllers;

use App\Mail\StudentReceiptMail;
use App\Models\Student;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function sendPayment(Request $request)
    {
        $transaction_id = $request->input('transaction_id');
        $receipt = $request->file('receipt');

        $checkTransaction = Transaction::find($transaction_id);
        // dd($request);
        if ($checkTransaction !== null) {
            $id = $checkTransaction->student_id;

            if (isset($receipt) && $receipt != NULL) {
                $extension = $receipt->extension();
                $fileName = $receipt->hashName();
                $pathCustom = "files/students/$id/";
                $path = $receipt->storeAs($pathCustom, $fileName);


                $getStudent = Student::find($id);
                $getStudent->status = 'PROCESSING';
                $getStudent->save();

                // change status transaction
                $checkTransaction->transaction_status = 'PROCESSING';

                $checkTransaction->receipt_path = $pathCustom;
                $checkTransaction->receipt_filename = $fileName;
                $checkTransaction->receipt_ext = $extension;

                $checkTransaction->save();
            }
        }

        return redirect('/info')->with('message', 'Receipt Uploaded.');
    }

    public function approvePayment(Request $request)
    {
        $transaction_id = $request->input('transaction_id');
        $checkTransaction = Transaction::find($transaction_id);

        if ($checkTransaction !== null) {
            $id = $checkTransaction->student_id;

            $getStudent = Student::find($id);
            $getStudent->status = 'ENROLLED';
            $getStudent->save();

            $this->sendReceipt($checkTransaction->id);

            // change status transaction
            $checkTransaction->transaction_status = 'PAID';
            $checkTransaction->save();
        }
        return redirect('/payments')->with('message', 'Payment Approved.');
    }

    public function sendReceipt($tranasctionId)
    {
        if ($tranasctionId) {
            $transaction = Transaction::find($tranasctionId);
            $getTransactionDetail = TransactionDetail::where('transaction_id', $transaction->id)->get();
            $student = Student::find($transaction->student_id);
            $email = $student->email;
            $date = new Carbon($transaction->transaction_date);
            $date = $date->format('F d, Y h:mA');

            $transactionDetail = collect($getTransactionDetail)->map(function ($arr) {
                $temp = [
                    'description' => $arr->transaction_type . " - " . $arr->transaction_name,
                    'amount' => number_format($arr->amount, 2, '.')
                ];
                return $temp;
            });

            $mailData = [
                'name' => implode(" ", [$student->first_name, $student->last_name]),
                'transaction_number' => $transaction->transaction_number,
                'transaction_detail' => $transactionDetail,
                'transaction_date' => $date,
                'amount' =>  number_format($transaction->amount, 2, '.'),
            ];
            Mail::to($email)->send(new StudentReceiptMail($mailData));
        }
    }
}
