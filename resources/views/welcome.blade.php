@extends('layouts.app')

@section('content')
    <h1>Consolidate App</h1>
    <hr>
    <form method="GET" action="/search">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Search Consolidations</h5>
                        <label>Type of App:</label>
                        <select id="TypeofAPP" name="select_app_type" class="form-control">
                            <option value="Supplemental">Supplemental</option>
                            <option value="Primary">Primary</option>
                        </select>
                        <label>Display by:</label>
                        <select class="form-control" name="quarter">
                            <option value="Annual">Annual</option>
                            <option value="1">1st</option>
                            <option value="2">2nd</option>
                            <option value="3">3rd</option>
                            <option value="4">4th</option>
                        </select>
                        <label>Year:</label>
                        <select class="form-control" name="year">
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                        </select> 
                        <hr>
                        <input type="submit" class="btn float-right btn-primary btn-block">
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
        
    </form>
    {{-- <div class="footer">
        @Copyright 2019. Alright Reserved.
    </div> --}}
@endsection