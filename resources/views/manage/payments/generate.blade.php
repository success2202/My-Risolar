@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">
<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>

 <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                  <form action="{{route('AdminInitiatePayment.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
              <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Generate Payment Link</h6>
                            <div class="row">
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <input required type="text" name="name"  value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1"
                                                   aria-describedby="emailHelp" placeholder=" Customer name">
                                            <small id="emailHelp" class="form-text text-muted">Customer Name
                                            </small> 
                                            @error('name')
                                            <span class="invalid-feedback"> <small> * </small> </span>
                                            @enderror
                                        </div>
                                    </div> 
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input required type="text" name="email"  value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1"
                                                   aria-describedby="emailHelp" placeholder="Customer Email">
                                            <small id="emailHelp" class="form-text text-muted">Customer Email
                                            </small> 
                                            @error('name')
                                            <span class="invalid-feedback"> <small> * </small> </span>
                                            @enderror
                                        </div>
                                    </div> 

                                    <div class="col-md-12">
                                        <div class="form-group">
                                             
                                          <select required value="{{old('currency')}}" class="form-control  @error('currency') is-invalid @enderror"  name="currency" > 
                                            <option> Select Currency</option>
                                          @foreach ($currency as $currencies )
                                               <option value="{{$currencies->currency}}"> {{$currencies->currency}} - {{$currencies->country}}   </option>
                                          @endforeach
                                          </select>
                                          <small id="emailHelp" class="form-text text-muted">Select Currency
                                           </small>
                                           @error('currency"')
                                           <span class="invalid-feedback"> <small> *</small> </span>
                                           @enderror
                                       </div>           
                                     </div>
                                      <div class="col-md-12">
                                         <div class="form-group">
                                              
                                           <select required value="{{old('product_name')}}" class="select2-example  @error('product_name') is-invalid @enderror" multiple name="product_name[]" > 
                                           @foreach ($products as $cat )
                                                <option value="{{$cat->id}}"> {{$cat->name}} </option>
                                           @endforeach
                                           </select>
                                           <small id="emailHelp" class="form-text text-muted">Select Products
                                            </small>
                                            @error('product_name"')
                                            <span class="invalid-feedback"> <small> *</small> </span>
                                            @enderror
                                        </div>           
                                      </div>
                                      <button type="submit" class="btn btn-primary w-25 p-3">Generate Payment Link</button>

                                         
                                            
                            </div> 
                        </div>
                         
                    </div>
                  </form>

    </div>
                        </div>
                    </div>
                   

@endsection
@section('script')
<script>



$('.clockpicker-example').clockpicker({
    autoclose: true
});

$('input[name="date"]').daterangepicker({
  singleDatePicker: true,
  showDropdowns: true
});

let message = {!! json_encode(Session::get('message')) !!};
let msg = {!! json_encode(Session::get('alert')) !!};
//alert(msg);
toastr.options = {
        timeOut: 3000,
        progressBar: true,
        showMethod: "slideDown",
        hideMethod: "slideUp",
        showDuration: 200,
        hideDuration: 200
    };
if(message != null && msg == 'success'){
toastr.success(message);
}else if(message != null && msg == 'error'){
    toastr.error(message);
}
</script>
@endsection