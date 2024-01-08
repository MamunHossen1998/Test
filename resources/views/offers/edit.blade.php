@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card">
                    <div class="card-header text-center">
                        <h5>Offer edit</h5>
                    </div>
                    <div class="card-body">
                        <div class="form">
                            <form action="{{ route('offers.update',$offer->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3 form-group">
                                    <label for="">Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title" class="form-control" value="{{ old('title',$offer->title) }}">
                                </div>
                               @error('title')
                                   <div class="text-danger" >{{ $message }}</div>
                               @enderror
                                <div class="mb-3 form-group">
                                    <label for="">Price <span class="text-danger">*</span></label>
                                    <input type="text" name="price" class="form-control" value="{{ old('price',$offer->price) }}">
                                </div>
                                @error('price')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="mb-3 form-group">
                                   <label for="categories">Category</label>ch
                                   <select name="categories[]" id="categories" class="form-control" multiple placeholder="--Select one--">
                                     <option value="">--Select one--</option>
                                     @foreach ($categories as $category)
                                        <option {{ in_array($category->id, old('locations', $offer->categories->pluck('id')->toArray())) ? 'selected' : '' }} value="{{ $category->id }}" >{{ $category->title }}</option>
                                     @endforeach
                                   </select>
                                </div>
                                @error('categories')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="mb-3 form-group">
                                    <label for="">Location</label>
                                    <select name="locations[]" id="locations" class="form-control" multiple placeholder="--Select one--">
                                        <option value="">--Select one--</option>
                                        @foreach ($locations as $location)
                                            <option {{ in_array($location->id, old('locations', $offer->locations->pluck('id')->toArray())) ? 'selected' : '' }} value="{{ $location->id }}">{{ $location->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('locations')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="mb-3 form-group  image-preview">
                                    <label for="">Image</label><br>
                                    <img src=" {{ asset($offer->image_url) }}" alt="" height="80" width="80">
                                    <input type="file" class="form-control mt-2 image-upload-input" name="image">
                                </div>
                                @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                 <div class="mb-3 form-group">
                                    <label for="">Description <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="description" id="description" cols="10" rows="5">{{ old('description',$offer->description) }}</textarea>
                                </div>
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                 <div class="mb-3 form-group">
                                    <a  class="btn btn-primary" href="{{ route('offers.index') }}">Cancel</a>
                                    <button type="submit" class="btn btn-info">Submit</button>
                                </div>
                               
                            </form>
                        </div>
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