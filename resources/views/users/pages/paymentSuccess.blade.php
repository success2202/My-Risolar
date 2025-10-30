@extends('layouts.app')
@section('content')
<div class="ps-shopping" style="background: #eee; ">
    <div class="container">
        <div class="ps-shopping__content">
            <div class="row">
                <div class="col-12 col-md-7 col-lg-12 mt-5" style="background: #fff; border-radius: 5px">
                    <div class="row">
                        <div class="col-12 col-md-12" >
                            <div class="ps-categogy--list">
                                <div class="ps-product ps-product--list"
                                style="border:2px solid #d1d5dad4; border-radius:10px">
                                <div class="ps-product__conent" style="border-right:0px">
                                    @if(isset($payment))
                                    <div class="ps-product__info"><a class="ps-product__branch"> <strong>PAYMENT COMPLETED SUCCESSFULLY </strong> </a>
                                        <hr>
                                        <table style="width:100%;max-width:620px;margin:0 auto;background-color:#ffffff">
                                            <tbody>
                                                <tr>
                                                    <td style="padding:10px 30px 10px">
                                                    </td>
                                                <tr>
                                                    <td style="padding:0 30px">
                                                        <table width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="150" style="font-weight:bolder">Amount</td>
                                                                    <td width="25">&nbsp;&nbsp; &nbsp;&nbsp;</td>
                                                                    <td> {{ $payment->currency }} {{ $payment->amount }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="150" style="font-weight:bolder">Status</td>
                                                                    <td width="25">&nbsp;&nbsp; &nbsp;&nbsp;</td>
                                                                    <td> <span class="badge bg-success"> Paid </span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="150" style="font-weight:bolder">Date Paid</td>
                                                                    <td width="25">&nbsp;&nbsp; &nbsp;&nbsp;</td>
                                                                    <td> <span class=""> {{$payment->date_paid}} </span></td>
                                                                </tr>
                                                                <tr> <td> <br> </td></tr>
                                                                <tr>
                                                                    <td width="150" style="font-weight:bolder">Products</td>
                                                                    <td width="25">&nbsp;&nbsp; &nbsp;&nbsp;</td>
                                                                  
                                                                    <td>
                                                                        @php
                                                                            $prod = json_decode($payment->products_name, true);
                                                                            $x = 1;
                                                                            foreach ($prod as $items) {
                                                                                echo '<strong>' .
                                                                                    $x .
                                                                                    ':</strong> ' .
                                                                                    $items .
                                                                                    '<br>';
                                                                                $x++;
                                                                            }
                                                                        @endphp
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="height: 2em; background:#eee"></div>
@endsection