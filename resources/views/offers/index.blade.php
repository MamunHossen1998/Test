@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class=" ">Offer list</h5>
                        <a href="" class="fa-solid fa-plus btn btn-info ">Crete offer</a>
                    </div>
                    <div class="card-body">
                        {{-- {{ $offers }} --}}
                        @if (count($offers) <= 0)
                            <h5 class="text-center">No data available</h5>
                        @else
                            <div class="row">
                                <div class="col-md-12 ">
                                    <form action="{{ route('offers.index') }}" method="get">
                                        <div class="d-flex  me-2">
                                            <div class="col-md-2 form-group">
                                               <input type="text" name="daterange" value="" />
                                            </div>
                                            <div class="col-md-2 form-group">
                                                <select name="title" id="title" class="form-control select2">
                                                    <option value="0">--Select Offer--</option>
                                                    @foreach ($offers as $offer)
                                                        <option value="{{ $offer->id }}">{{ $offer->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-2 form-group">
                                                <select name="location" id="location" class="form-control select2">
                                                    <option value="0">--Select one location--</option>
                                                    @foreach ($locations as $location)
                                                        <option value="{{ $location->id }}">{{ $location->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            
                                            <div class="col-md-2 form-group">
                                                <select name="category" id="category" class="form-control select2">
                                                    <option value="0">--Select one category--</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-2 form-group">
                                                <select name="status" id="status" class="form-control select2">
                                                    <option value="0">--Select one status--</option>
                                                   <option value="published">Published</option>
                                                   <option value="draft">Draft</option>
                                        
                                                </select>
                                            </div>
                                            <div class="col-md-1 form-group">
                                                <button class="btn btn-info btn-sm">Search</button>
                                            </div>
                                           
                                        </div>
                                    </form>
                                 </div>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Sl no</th>
                                        <th>Title</th>
                                        <th>Price</th>
                                        <th>Create by</th>
                                        <th>Image</th>
                                        <th>Description</th>
                                        <th>Category</th>
                                        <th>Location</th>
                                        <th>Status</th>
                                        <th>Created_at</th>
                                        <th>Updated_at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($offers as $key => $offer)
                                        {{-- {{ $offer }} --}}
                                        <tr>
                                            <th scope="row">{{ ++$key }}</th>
                                            <td>{{ $offer->title }}</td>
                                            <td>{{ $offer->price }}</td>
                                            <td>{{ $offer->author->name }}</td>
                                            <td>
                                                <img src="{{ $offer->image_url }} " alt="not found" width="60" height="60">
                                            </td>
                                            <td>{{ $offer->description }}</td>
                                            <td>{{ getTitles($offer->categories) }}</td>
                                            <td>{{ getTitles($offer->locations) }}</td>
                                            <td>{{ $offer->status }}</td>
                                            <td>{{ $offer->created_at }}</td>
                                            <td>{{ $offer->updated_at }}</td>
                                            <td>
                                                <a href="{{ route('offers.edit',$offer->id) }}" class="btn btn-info">Edit</a>
                                                <a href="#" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div>
                                {{ $offers->withQueryString()->links('pagination::bootstrap-4') }}
                            </div>
                            

                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
 
<script>
    $(function() {
        $('input[name="daterange"]').daterangepicker({
            opens: 'left'
        }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });
    });
</script>



  <script>

       
       $(document).ready(function() {
            $('.select2').select2({
                theme: "classic",
                placeholder: "--Select one--",
                allowClear: true,
            });
        });
    </script>
@endsection