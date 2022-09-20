@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="header-wrap mb-1">
        <h1 class="d-inline-block">Create Ticket</h1>
        <div class="options float-right">
            
        </div>
    </div>
@stop

@section('content')
    @include('layouts.errors')
    <div class="card shadow-sm rounded-0">
        <div class="card-body">
            <form action="{{ route('ticketsave') }}" method="post" class="form-row">
                @csrf
                <div class="col-md-12">
                    <label for="classification">Classification</label>
                    <div class="row">
                        <div class="col">
                            <x-adminlte-select name="classification_header">
                                <option>Select here...</option>
                                <option value="Fund Management">Fund Management</option>
                            </x-adminlte-select>
                        </div>
                        <div class="col">
                            <x-adminlte-select name="classification_desc">
                                <option>Select here...</option>
                                <option value="Fund matching">Fund matching</option>
                                <option value="Assignment payment">Assignment payment</option>
                                <option value="Proof of payment">Proof of payment</option>
                                <option value="Others">Others</option>
                            </x-adminlte-select>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <x-adminlte-input name="subject" type="text" placeholder="..." label="Subject"/>
                </div>

                <div class="col-md-6">
                    <x-adminlte-select name="department_id" label="Department">
                        <option>Select here...</option>
                        <option value="1">Customer Service</option>
                    </x-adminlte-select>
                </div>

                <div class="col-md-4">
                    <x-adminlte-input name="bl_no" type="text" placeholder="..." label="BL No."/>
                </div>
                <div class="col-md-4">
                    <x-adminlte-select name="priority" label="Priority">
                        <option>Select here...</option>
                        <option value="Low">Low</option>
                        <option value="Medium">Medium</option>
                        <option value="High">High</option>
                        <option value="Urgent">Urgent</option>
                    </x-adminlte-select>
                </div>
                <div class="col-md-4">
                    <x-adminlte-input name="expected_date_accomplished" type="date" placeholder="..." label="Expected date to accomplished"/>
                </div>

                <div class="col-md-12 mb-3">
                    <label for="ticketTinyMCE">Description</label>
                    <textarea id="ticketTinyMCE" name="description">Hello, World!</textarea>
                </div>

                <div class="col-md-6">

                </div>

                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
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