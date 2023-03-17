@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">{{ __('Dashboard') }}</h1>
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                @endif
                {{ __('You are logged in!') }}
            </div>
        </div>
    </div>
    
    <div class="row row-cols-4 ">
        <div class="col pb-3">
            <div class="card h-100 shadow-sm ">
                <div class="car-body text-center py-3">
                    <h5 class="card-title fw-bold">Text A</h5>
                    <p class="card-text">100</p>
                </div>
            </div>
        </div>

        <div class="col pb-3">
            <div class="card h-100 shadow-sm ">
                <div class="car-body text-center py-3">
                    <h5 class="card-title fw-bold">Text A</h5>
                    <p class="card-text">100</p>
                </div>
            </div>
        </div>

        <div class="col pb-3">
            <div class="card h-100 shadow-sm ">
                <div class="car-body text-center py-3">
                    <h5 class="card-title fw-bold">Text A</h5>
                    <p class="card-text">100</p>
                </div>
            </div>
        </div>

        <div class="col pb-3">
            <div class="card h-100 shadow-sm ">
                <div class="car-body text-center py-3">
                    <h5 class="card-title fw-bold">Text A</h5>
                    <p class="card-text">100</p>
                </div>
            </div>
        </div>
    </div>

    <hr/>


    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                      </tr>
                </thead>
                <tbody>
                     <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                      </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
