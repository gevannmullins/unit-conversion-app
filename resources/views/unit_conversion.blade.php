@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Unit Converter</p>

                    <form method="post" action="/unit-conversion">
                      @csrf
                      <label for="from_unit">From:</label>
                      <input type="text" name="from_unit" id="from_unit">
                      <select name="from_unit_type">
                          <!-- Options for unit types -->
                      </select>

                      <label for="to_unit">To:</label>
                      <input type="text" name="to_unit" id="to_unit">
                      <select name="to_unit_type">
                          <!-- Options for unit types -->
                      </select>

                      <button type="submit">Convert</button>
                  </form>
                    <p>&nbsp;</p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection