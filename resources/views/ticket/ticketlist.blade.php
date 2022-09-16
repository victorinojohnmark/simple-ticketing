@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="header-wrap mb-1">
        <h1 class="d-inline-block">Tickets</h1>
        <div class="options float-right">
            <button class="btn btn-primary">Create ticket</button>
        </div>
    </div>
@stop

@section('content')
    <div class="card rounded-0">
        <div class="card-body">
            <table class="table table-head-fixed text-nowrap">
                <thead>
                  <tr>
                    <th>TICKET NO</th>
                    <th>SUMMARY</th>
                    <th>RAISED BY</th>
                    <th>UPDATED AT</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>202209-000001</td>
                    <td>
                        <div class="d-inline-block">
                            <strong>COAU040312523</strong>
                            <p>Subject of ticket</p>
                        </div>

                        <div class="float-right">
                            <strong>Open</strong>
                            <p class="text-secondary">Low</p>
                        </div>
                    </td>
                    <td>Mark Sanchez</td>
                    <td>15 minutes ago</td>
                  </tr>
                  
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
@stop

@section('js')
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script> console.log('Hi!'); </script>
@stop