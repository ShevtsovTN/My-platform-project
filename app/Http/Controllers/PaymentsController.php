<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\If_;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $login = Auth::user()->login;
        $selfBalance = false;
        $data = $this->getDataBalanceStatistic(Auth::id());
        return view('pages.balance', compact('data', 'login', 'selfBalance'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'operation' => 'string|required',
            'amount' => 'numeric|required'
        ]);
        $user = User::find($id);
        if (!empty($user)) {
            $insert_id = Payment::insertGetId([
                'userId' => $id,
                'payment_system' => env('APP_NAME'),
                'balance_before' => $user->cash,
                'cash' => $request->amount,
                'currency' => $user->currency,
                'operation' => $request->operation,
                'transaction_id' => env('APP_NAME'),
                'status' => 'success',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
             ]);
            if (!empty($insert_id)) {
                $cash = $request->operation == 'in'
                    ? $user->cash + $request->amount
                    : $user->cash - $request->amount;
                User::where('id', '=', $id)->update([
                    'cash' => $cash
                ]);
                $status = 'success';
                $message = 'Success operation';
            } else {
                $status = 'error';
                $message = 'Error operation';
            }
        } else {
            $status = 'error';
            $message = 'User not found';
        }
        return redirect()->route('balanceUser', $id)->with($status, $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $login = User::find($id)->login;
        $selfBalance = true;
        $data = $this->getDataBalanceStatistic($id);
        return view('pages.balance', compact('data', 'login', 'selfBalance', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Get user balance statistics
     *
     * @param $id
     * @return array
     */
    private function getDataBalanceStatistic($id)
    {
        $result = [];
        $paymentsStatistic = Payment::select(
            'id',
            'balance_before',
            'cash',
            'currency',
            'operation',
            'transaction_id',
            'status',
            'payment_system',
            'created_at'
        )
            ->where('userId', '=', $id)
            ->get()->toArray();
        if (!empty($paymentsStatistic)) {
            foreach ($paymentsStatistic as $index => $item) {
                $result[] = [
                    'id' => $item['id'],
                    'balance' => $item['operation'] == 'in'
                        ? number_format(($item['balance_before'] + $item['cash']), 2, ',', ' ')
                        : number_format(($item['balance_before'] - $item['cash']), 2, ',', ' '),
                    'balance_before' => number_format($item['balance_before'], 2, ',', ' '),
                    'amount' => number_format($item['cash'], 2, ',', ' '),
                    'currency' => $item['currency'],
                    'operation' => $item['operation'],
                    'status' => $item['status'],
                    'transaction' => $item['transaction_id'],
                    'payment_system' => $item['payment_system'],
                    'date' => date('Y-m-d H:i:s', strtotime($item['created_at']))
                ];
            };
        }
        return $result;
    }

    /**
     * Method for calling payment processing in the model Eloquent
     *
     * @param Request $request
     * @param $payment_system
     * @param $status
     */
    public function paymentSystem(Request $request, $payment_system, $status)
    {

    }
}
