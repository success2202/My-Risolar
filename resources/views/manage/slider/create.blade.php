@extends('layouts.admin')
@section('content')

        <!-- begin::page-header -->
 <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                {{Form::open(['action' => 'PagesController@StoreSlider', 'method'=>'post', 'enctype' => 'multipart/form-data'])}}
              @csrf
              <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Add New Slider</h6>
                            <div class="row">
{{--                                
                              <div class="col-md-6">
                                <div class="form-group">
                                <input type="text" required name="name" placeholder="Enter Slider First Text" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" >
                                    <small id="emailHelp" class="form-text text-muted">Enter Slider First Text
                                    </small>
                                    @error('name')
                                    <span class="invalid-feedback"> <small> * </small> </span>
                                    @enderror
                                </div>
                              </div> --}}
                              <div class="col-md-6">
                                <div class="form-group">
                                <input type="text" required name="secondname" placeholder="Enter Slider Third Text" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" >
                                    <small id="emailHelp" class="form-text text-muted">Enter Slider First Text
                                    </small>
                                    @error('secondname')
                                    <span class="invalid-feedback"> <small> * </small> </span>
                                    @enderror
                                </div>
                              </div>  
                                       
                            </div> 
 
                            <div class="row">
                               
                              <div class="col-md-6">
                                <div class="form-group">
                                <input type="text" name="thirdname" required placeholder="Enter Slider Second Text" value="{{old('thirdname')}}" class="form-control @error('name') is-invalid @enderror" >
                                    <small id="emailHelp" class="form-text text-muted">Enter Slider Second Text
                                    </small>
                                    @error('thirdname')
                                    <span class="invalid-feedback"> <small> * </small> </span>
                                    @enderror
                                </div>
                              </div>
                              
                              <div class="col-md-6">
                                <div class="custom-file">
                                  <input type="file"name="image" required class="custom-file-input  @error('image') is-invalid @enderror" id="customFile">
                                  <label class="custom-file-label" for="customFile">Choose Image</label>
                                </div>
                                <small id="emailHelp" class="form-text text-muted">Upload Slider Image.. Image must be 1920 by 590 pixels
                                </small>
                                  @error('image')
                                  <span class="invalid-feedback"> <small> *</small> </span>
                                  @enderror
                                </div>        
                            </div> 
                        </div>
                         
                    </div>
                         <div class="card">
                        <div class="card-body">
                        <div class="row">
                          <div class="col-md-4">
                          </div>
                          <div class="col-md-4">
                        <div class="p-5">
                             <button type="submit" class="text-center btn btn-primary w-100 p-3 ">Add Slider</button>
                           </div>
                           </div>
                           </div>
                        </div>
                        </div>
                    {{Form::close()}}

    </div>
                        </div>
                    </div>
                   

@endsection
@section('script')
<script>

$('.clockpicker-example').clockpicker({
    autoclose: true
});

$('input[name="audition_date"]').daterangepicker({
  singleDatePicker: true,
  showDropdowns: true
});

let message = {!! json_encode(Session::get('message')) !!};
let msg = {!! json_encode(Session::get('msg')) !!};

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