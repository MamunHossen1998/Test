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
                                    <form action="" method="">
                                        <div class="d-flex  me-2">
                                            <div class="col-md-3 form-group ">
                                                <select name="title" id="title" class="form-control select2">
                                                    <option value="0">--Select one--</option>
                                                    @foreach ($offers as $offer)
                                                        <option value="{{ $offer->id }}">{{ $offer->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3 form-group  ">
                                                <select name="category" id="category" class="form-control select2">
                                                    <option value="0">--Select one--</option>
                                                    @foreach ($offers as $offer)
                                                        <option value="{{ $offer->id }}">{{ $offer->title }}</option>
                                                    @endforeach
                                                </select>
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
                                            <td>{{ $offer->categories }}</td>
                                            <td>{{ $offer->status }}</td>
                                            <td>{{ $offer->created_at }}</td>
                                            <td>{{ $offer->updated_at }}</td>
                                            <td>
                                                <a href="#" class="btn btn-info">Edit</a>
                                                <a href="#" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
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