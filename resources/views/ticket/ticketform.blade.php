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
            <form action="{{ route('ticketsave') }}" method="post" class="form-row" enctype="multipart/form-data">
                @csrf
                {{-- <a href="#" data-widget="control-sidebar">Toggle Control Sidebar</a> --}}
                <div class="col-md-12">
                    <label for="classification">Classification</label>
                    <div class="input-group mb-3">
                        <input type="text" name="classification" class="form-control" placeholder="..." value="" readonly>
                        <div class="input-group-append">
                            <x-adminlte-modal id="modalJSTree" title="Ticket Classification" static-backdrop scrollable>
                                <div id="js_tree" class="rounded bg-light p-3">
                                    <ul>
                                        @foreach ($classifications as $classification)
                                            <li>
                                                {!! $classification['section'] !!}
                                                @if (count($classification['list']))
                                                <ul>
                                                        @foreach ($classification['list'] as $list)
                                                            <li>{!! $list !!}</li>
                                                        @endforeach
                                                </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </x-adminlte-modal>
                            <button class="btn btn-secondary" type="button" data-toggle="modal" data-target="#modalJSTree"><i class="fas fa-cogs"></i></button>
                        </div>
                      </div>
                </div>

                <div class="col-md-6">
                    <x-adminlte-input name="subject" type="text" placeholder="..." label="Subject"/>
                </div>

                <div class="col-md-6">
                    <x-adminlte-select name="department_id" label="Department">
                        @forelse ($departments as $department)
                            <option value="{{ $department->id }}">{!! $department->department_name !!}</option>
                        @empty
                            <option>Select here...</option>
                        @endforelse
                    </x-adminlte-select>
                </div>

                <div class="col-md-4">
                    <x-adminlte-input name="bl_no" type="text" placeholder="..." label="BL No."/>
                </div>
                <div class="col-md-4">
                    <x-adminlte-select name="priority" label="Priority">
                        @forelse ($priorities as $priority)
                            <option value="{{ $priority }}">{{ $priority }}</option>
                        @empty
                            <option>Select here...</option> 
                        @endforelse
                        
                        
                    </x-adminlte-select>
                </div>
                <div class="col-md-4">
                    <x-adminlte-input name="expected_date_accomplished" type="date" placeholder="..." label="Expected date to accomplished"/>
                </div>

                <div class="col-md-8 mb-3">
                    <label for="ticketTinyMCE">Description</label>
                    <textarea id="ticketTinyMCE" name="description"></textarea>
                </div>

                <div class="col-md-4">
                    <div class="p-2 bg-light rounded">
                        <label for="fileAttachment">File Attachment</label>
                        <input type="file" id="fileAttachment" name="fileAttachment" multiple allow-remove="false">
                        <input type="hidden" name="fileid">
                        </div>
                </div>

                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
@stop

@section('css')
    
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/jstree/dist/themes/default/style.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/filepond/filepond.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin_custom.css') }}">
@stop

@section('js')
    <script src="{{ mix('js/app.js') }}" defer></script>

    <script src="{{ asset('vendor/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script src="{{ asset('js/ticket-tinymce.js') }}"></script>

    <script src="{{ asset('vendor/jstree/dist/jstree.min.js') }}"></script>
    <script src="{{ asset('js/jstree.js') }}"></script>

    <script src="{{ asset('vendor/filepond/filepond.min.js') }}"></script>
    <script src="{{ asset('js/fileattachment.js') }}"></script>
@stop