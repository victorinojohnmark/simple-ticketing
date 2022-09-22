@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="header-wrap mb-1">
        <h5 class="d-inline-block">Ticket #00988990</h5>
        <div class="options float-right">
            <a href="{{ route('ticketview') }}" class="btn btn-primary">Ticket List</a>
        </div>
    </div>
@stop

@section('content')
    @include('layouts.errors')
    <div class="card shadow-sm rounded-0 h-100">
        <div class="card-body p-0">
            <div class="ticket-header p-3 border-bottom">
                <div class="row">
                    <div class="col">
                        <h6 class="d-inline-block mr-1"><strong>{!! $ticket->subject !!}</strong> <span class="badge badge-secondary">{!! $ticket->bl_no !!}</span></h6><br>
                        <span class="badge badge-primary mb-2">Customer Service</span>
                        <span class="badge badge-primary mb-2">{!! $ticket->classification !!}</span>
                       {!! $ticket->statusBadge !!}
                        <span class="badge badge-light mb-2">Low</span>
                    </div>
                    <div class="col-6">
                        <div class="float-right text-right">
                            
                            @include('ticketreply.ticketreplymodal')
                            
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="ticket-description p-4">
                        {!! $ticket->description !!}
                    </div>
                </div>
                <div class="col-md-7">
                    @include('ticketreply.ticketreplylist')
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
@stop

@section('js')
    <script src="{{ asset('vendor/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script src="{{ asset('js/ticket-tinymce.js') }}"></script>
    <script src="{{ mix('js/app.js') }}" defer></script>
@stop