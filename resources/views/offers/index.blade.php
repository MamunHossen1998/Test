@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center"><h5>Offer list</h5></div>
                    <div class="card-body">
                        {{-- {{ $offers }} --}}
                        @if (count($offers) <= 0)
                            <h5 class="text-center">No data available</h5>
                        @else
                            <table class="table" >
                                <thead>
                                    <tr>
                                        <th>Sl no</th>
                                        <th>Name</th>
                                        <th>Last</th>
                                        <th>Handle</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($offers as $key=> $offer)
                                        <tr>
                                            <th scope="row">{{  ++$key }}</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
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