@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="header-wrap mb-1">
        <h1 class="d-inline-block">Tickets</h1>
        <div class="options float-right">
            <a href="{{ route('ticketcreate') }}" class="btn btn-primary">Create ticket</a>
        </div>
    </div>
@stop

@section('content')
    <div class="card shadow-sm rounded-0">
        <div class="card-body p-0">
            <table class="table table-head-fixed text-nowrap">
                <thead>
                  <tr>
                    <th>Ticket No</th>
                    <th style="width:45%;">Summary</th>
                    <th>Raised By</th>
                    <th>Updated at</th>
                    <th>Option</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($tickets as $ticket)
                  <tr>
                    <td>202209-000001</td>
                    <td>
                        <div class="d-inline-block">
                            <strong>{{ $ticket->bl_no }}</strong>
                            <p class="mb-0">{{ $ticket->subject }}</p>
                        </div>

                        <div class="float-right">
                            <strong>Open</strong>
                            <p class="text-secondary mb-0">{{ $ticket->priority }}</p>
                        </div>
                    </td>
                    <td>Mark Sanchez</td>
                    <td>15 minutes ago</td>
                    <td>
                        <a href="{{ route('ticketview', ['id' => $ticket->id]) }}" class="btn btn-primary btn-sm">View</a>
                    </td>
                  </tr>
                  @empty
                      <tr>
                        <td colspan="5">No ticket/s record available</td>
                      </tr>
                  @endforelse
                  
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
@stop