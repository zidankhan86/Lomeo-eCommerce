@extends('backend.layout.app')

@section('content')
<div class="card card-lg">
    <div class="card-body">
        <div class="row">

            <div class="col-6">
                <p class="h3">{{ config('app.name') }}</p>
                <address>
                    {{ $inv->address }}
                </address>
            </div>
            <div class="col-6 text-end">
                <p class="h3">Client</p>
                <address>
                    {{ $inv->name }}<br>
                    {{ $inv->address }}<br>
                    {{ $inv->phone }}<br>
                    {{ $inv->email }}
                </address>
            </div>
            <div class="col-12 my-4">
                <h1>Invoice INV{{ $inv->created_at->format('dmyis') }}</h1>
            </div>
        </div>
        <table class="table table-transparent table-responsive">
            <thead>
                <tr>
                    <th class="text-center" style="width: 1%"></th>
                    <th>Product</th>
                    <th class="text-center" style="width: 1%">Qnt</th>
                    <th class="text-end" style="width: 1%">Unit(BDT)</th>
                    <th class="text-end" style="width: 1%"></th>
                </tr>
            </thead>
            <tr>
                <td class="text-center">1</td>




                <td>
                    @foreach ($invItem as $item)
                    <p class="strong mb-1">{{ $item->product->name }}</p><hr>
                     @endforeach
                </td>



                <td class="text-center">
                    @foreach ($invItem as $item)

                    {{ $item->quantity }} <hr>

                    @endforeach
                </td>

            <td class="text-end">
                @foreach ($invItem as $inv)
                {{ $inv->unit_price }} <hr>
                @endforeach
            </td>


            </tr>
            <tr>
                <td colspan="4" class="strong text-end">Subtotal(BDT)</td>
                <td class="text-end"> {{ $inv->order->total }}</td>
            </tr>
            <tr>
                <td colspan="4" class="strong text-end">Vat Rate</td>
                <td class="text-end">0%</td>
            </tr>
           
            <tr>
                <td colspan="4" class="font-weight-bold text-uppercase text-end">Total Due</td>
                <td class="font-weight-bold text-end">000,00</td>
            </tr>
        </table>
        <p class="text-muted text-center mt-5">Thank you very much. We look forward to working with
            you again!</p>
    </div>
    <div class="text-center mt-4">
        <button class="btn btn-primary" onclick="printInvoice()">Print Invoice</button>
    </div>
</div>

<script>
    function printInvoice() {
        window.print();
    }
</script>

@endsection
