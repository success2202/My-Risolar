@extends('layouts.app')
@section('title')
<title> Order Details | Sanlive Pharmarcy</title>
@endsection
@section('head')

<link rel="canonical" href="{{ url()->current() }}">
@endsection
@section('content')
@section('styles')
    <style>
        .navIL {
            padding: 15px;
            padding-left: 10px
        }

        .dropdown-item:hover {
            background: rgb(219, 218, 218);
        }
    </style>
@endsection

<div class="ps-shopping" style="background: #eee; ">
    <div class="container">
        <div class="ps-shopping__content">
            <div class="row">
              @include('includes.sidebarAccount')
                

              <div class="col-12 col-md-7 col-lg-8 mt-4" style="background: #fff; border-radius: 5px">
                    
                    {{-- Back button --}}
                    {{-- <a href="" class="btn btn-link mt-3">
                        &laquo; Back
                    </a> --}}

                    {{-- Order Header --}}
                    <h6 class="mt-2">Order Details</h6>
                    <hr>

                    <p>
                        <strong>Order No:</strong> {{ $orders->order_no }} <br>
                        <strong>Total Amount:</strong> {{ moneyFormat($orders->payable, 2) }} <br>
                        <strong>Placed On:</strong> {{ $orders->created_at->format('Y-m-d h:i:s A') }}
                    </p>

                    {{-- Items in this Order --}}
                    <h6 class="mt-4">Items in this Order</h6>
                    <hr>
                    @foreach($order_items as $item)
                        <div class="row mb-3">
                             @if($item)
                            <div class="col-md-3">
                                <img src="{{ asset('images/products/'.$item->image) }}" 
                                     class="img-fluid rounded border" 
                                     alt="{{ $item->product_name }}">

                    @else
                        <img src="{{ asset('images/no-image.png') }}" 
                             class="img-fluid rounded-start" 
                             alt="No product">
                    @endif
                            </div>
                            <div class="col-md-9">
                                <p class="mb-1"><strong>{{ $item->product_name }}</strong></p>
                                <p class="mb-1">Placed On: {{ $item->created_at->format('Y-m-d h:i:s A') }}</p>
                                <p class="mb-1">Amount: {{ moneyFormat($item->price, 2) }}</p>
                                <p class="mb-1">QTY: {{ $item->qty }}</p>
                            </div>
                        </div>
                    @endforeach

                    {{-- Shipping and Payment Info --}}
                    <div class="row mt-4">
                        {{-- Shipping Info --}}
              
                        
                        <div class="col-md-6">
                            <div class="card border-0 shadow-sm">
                                <div class="card-header bg-light">
                                    <strong>Shipping Information</strong>
                                </div>
                                <div class="card-body">
                                    <p><strong>Phone:</strong> {{isset($shipping->phone)?$shipping->phone:''}} </p>
                                    <p><strong>Email:</strong> {{isset($shipping->email)?$shipping->email:''}} </p>
                                    <p><strong>Address:</strong> {{isset($shipping->address)?$shipping->address:''}} </p>
                                    <p><strong>City:</strong>  {{isset($shipping->city)?$shipping->city:''}}</p>
                                </div>
                            </div>
                        </div>

                        {{-- Payment Info --}}
                        <div class="col-md-6">
                            <div class="card border-0 shadow-sm">
                                <div class="card-header bg-light">
                                    <strong>Payment Information</strong>
                                </div>
                                <div class="card-body">
                                    <p><strong>Transaction Ref:</strong> {{ $orders->transaction_ref ?? '-' }}</p>
                                    <p><strong>Amount:</strong> {{ moneyFormat($orders->payable, 2) }}</p>
                                    
                                    <p><strong>Payment Status:</strong>
                                        @if($orders->is_paid == 1)
                                            <span class="badge bg-success">Paid</span>
                                        @else
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        @endif
                                    </p>

                                    <p><strong>Delivery Status:</strong>
                                        @if($orders->dispatch_status == 1)
                                            <span class="badge bg-success">Delivered</span>
                                        @elseif($orders->dispatch_status == 0)
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        @elseif($orders->dispatch_status == 2)
                                            <span class="badge bg-primary">Shipped</span>
                                        @elseif($orders->dispatch_status == -1)
                                            <span class="badge bg-danger">Cancelled</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>
                </div>



            </div>

        </div>
    </div>
</div>



@endsection

@section('script')

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
       
       <script>

        let orderNo = {!! json_encode($orders->order_no) !!}
    window.jsPDF = window.jspdf.jsPDF;
            window.html2canvas = html2canvas;
            let downloadBtn = document.getElementById('downloadBtn');
            downloadBtn.addEventListener("click", createPdf);

            function createPdf() {
                $('#userDetails').attr('hidden', false);
                html2canvas(document.getElementById('pdfContent')).then(canvas => {
                    let source = $('#pdfContent')[0];
                    const doc = new jsPDF({
                        unit: "pt",
                        orientation: 'portrait'
                    });

                    let margins = {
                        top: 50,
                        bottom: 50,
                        left: 50,
                        width: 500
                    }

                    let specialElementHandlers = {
                        '#hasCharr': function(element, renderer) {
                            return true;
                        }
                    };

                    doc.setFont('Poppins-Bold', 'bold');
                    doc.html(source, {
                        x: margins.left,
                        y: margins.top,
                        width: margins.width,
                        windowWidth: 900,
                        elementHandlers: specialElementHandlers,
                        callback: function() {
                            doc.save(orderNo, margins)
                        }
                    });
                });

            }
            setTimeout(() => {
           
                //  $('#userDetails').attr('hidden', true); 
                 document.getElementById('userDetails').hidden = true
               
            }, 5000);
           
</script>
@endsection
