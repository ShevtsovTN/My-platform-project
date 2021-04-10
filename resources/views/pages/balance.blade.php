@extends('layouts.layout')


@section('title')

@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render('balance', $login) }}
@endsection
@section('content')
    <div class="">
        @if($selfBalance)
        <form action="{{route('changeBalance', $id)}}" method="post" id="balanceForm" name="balanceForm" class="mb-4">
            @csrf
            <div class="form-group w-25">
                <label for="amount">Amount</label>
                <input type="number" pattern="[0-9\.]" step="0.01" min="0" class="form-control @error('amount') is-invalid @enderror" name="amount" id="amount">
                @error('amount')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="operation" id="operationIn" value="in" checked>
                <label class="form-check-label" for="operationIn">
                    Operation "IN"
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="operation" id="operationOut" value="out">
                <label class="form-check-label" for="operationOut">
                    Operation "OUT"
                </label>
            </div>
            <input class="btn btn-dark mt-2" type="submit" form="balanceForm" value="Change Balance">
        </form>
        @endif
        <table class="table mt-2">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Balance</th>
                    <th scope="col">Balance before</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Currency</th>
                    <th scope="col">Operation</th>
                    <th scope="col">Status</th>
                    <th scope="col">Transaction</th>
                    <th scope="col">Payment System</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody>
            @foreach($data as $dataIndex => $dataItem)
                <tr>
                    <th class="align-middle" scope="row">{{$dataItem['id']}}</th>
                    <td class="align-middle">{{$dataItem['balance']}}</td>
                    <td class="align-middle">{{$dataItem['balance_before']}}</td>
                    <td class="align-middle">{{$dataItem['amount']}}</td>
                    <td class="align-middle">{{$dataItem['currency']}}</td>
                    <td class="align-middle">{{$dataItem['operation']}}</td>
                    <td class="align-middle"><span
                            class="@if($dataItem['status'] == 'success') text-success @else text-danger @endif"
                        >{{$dataItem['status']}}</span></td>
                    <td class="align-middle">{{$dataItem['transaction']}}</td>
                    <td class="align-middle">{{$dataItem['payment_system']}}</td>
                    <td class="align-middle">{{$dataItem['date']}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
