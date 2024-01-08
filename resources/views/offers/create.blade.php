@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-6 m-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Offer create</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('offers.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                    </div>
                    @error('title')
                         <div class="text-danger">
                            <h6>{{ $message }}</h6>
                        </div>
                    @enderror
                    <div class="">
                        <label for="">Price</label>
                        <input type="text" name="price" class="form-control" value="{{ old('price') }}" autocomplete="off">
                    </div>
                    @error('price')
                         <div class="text-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                    <div class="form-group">
                        <label for="categories">Category</label>
                        <select name="categories[]" class="form-control" id="categories" multiple autocomplete="off" placeholder="--Select one--" required>
                            <option value="">--Select one--</option>
                            @foreach ($categories as $category)
                                <option {{ in_array($category->id,old('categories',[]))?'Selected':'' }} value="{{ $category->id }}">{{ $category->title  }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('categories.*')
                         <div class="text-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                    <div class="form-group">
                        <label for="">Location</label>
                        <select name="locations[]" class="form-control" id="locations" multiple autocomplete="off" placeholder="--Select one--" required>
                            <option value="">--Select one--</option>
                            @foreach ($locations as $location)
                                <option {{ in_array($location->id,old('locations',[]))?'Selected':'' }} value="{{ $location->id }}">{{$location->title  }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('locations.*')
                         <div class="text-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                    <div class="form-group  image-preview">
                        <label for="">Image</label><br>
                        <img src="{{ asset(App\Models\Offer::PLACEHOLDERIMAGE) }}" alt="" height="80" width="80">
                        <input type="file" class="form-control mt-2 image-upload-input" name="image">
                    </div>
                    @error('image')
                        <div class="text-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                    <div class="mb-2 form-group">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control" id="" cols="10" rows="5">{{ old('description') }}</textarea>
                    </div>
                    @error('description')
                         <div class="text-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                    <div class="form-group">
                        <a href="{{ route('home') }}" class="btn btn-primary ">Cancel</a>
                        <button class="btn btn-info" type="submit">Submit</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
    @include('customJs.tomSelect')
    @include('customJs.imageUploadPreview')
@endsection 
{{-- @section('script')
    <script>
        console.log("yess");
       $(document).ready(function() {
            $('.select2').select2({
                theme: "classic",
                placeholder: "Select a state",
                allowClear: true
            });
        });
    </script>
@endsection --}}
