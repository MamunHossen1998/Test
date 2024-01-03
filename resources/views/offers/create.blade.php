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
                    <div class="">
                        <label for="">Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    @error('title')
                         <div class="text-danger">
                            <h6>{{ $message }}</h6>
                        </div>
                    @enderror
                    <div class="">
                        <label for="">Price</label>
                        <input type="text" name="price" class="form-control">
                    </div>
                    @error('price')
                         <div class="text-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                    <div class="">
                        <label for="">Category</label>
                        <select name="categories[]" id="" class="form-control select2">
                            <option value=""></option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{$category->title  }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('categories.*')
                         <div class="text-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                    <div class="">
                        <label for="">Location</label>
                        <select name="location[]" id="" class="form-control select2" >
                            <option value=""></option>
                            @foreach ($locations as $location)
                                <option value="{{ $location->id }}">{{$location->title  }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('locations.*')
                         <div class="text-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                    <div class="">
                        <label for="">Image</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <div class="mb-2">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control" id="" cols="10" rows="5"></textarea>
                    </div>
                     @error('description')
                         <div class="text-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                    <div class="">
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
@endsection