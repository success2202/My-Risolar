@extends('layouts.admin')
@section('content')
    <div class="container-fluid">

        <form method="post" action="{{route('admin.blog.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Create Blog <a onclick="history.back()" class="btn btn-secondary"
                                    style="float:right"> return back</a></h6>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="title" value="{{ old('title') }}"
                                            class="form-control @error('title') is-invalid @enderror"
                                            id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="News Title">
                                        <small id="emailHelp" class="form-text text-muted">Enter Blog Title
                                        </small>
                                        @error('tile')
                                            <span class="invalid-feedback"> <small> * </small> </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-12">
                                <div class="form-group">

                                    <textarea id="summernote" class="@error('content') is-invalid @enderror" name="content">{{ old('content') }}</textarea>
                                    <small id="emailHelp" class="form-text text-muted">Blog Content
                                    </small>
                                    @error('content')
                                        <span class="invalid-feedback"> <small> *</small> </span>
                                    @enderror
                                </div>


                            </div>


                            <div class="col-md-6">
                                <div class="custom-file">
                                    <input type="file"name="image"
                                        class="custom-file-input  @error('image') is-invalid @enderror" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose Cover Image</label>
                                </div>
                                <small id="emailHelp" class="form-text text-muted"> Choose Blog Cover Image
                                </small>
                                @error('image')
                                    <span class="invalid-feedback"> <small> *</small> </span>
                                @enderror
                            </div>
                            <p></p>
                            <button type="submit" class="btn btn-primary w-50 p-3">Post Blog</button>
                        </div>
                    </div>
                </div>
         
            </div>
        </form>
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
        if (message != null && msg == 'success') {
            toastr.success(message);
        } else if (message != null && msg == 'error') {
            toastr.error(message);
        }
    </script>
@endsection
