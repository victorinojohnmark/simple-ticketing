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
                {{-- <a href="#" data-widget="control-sidebar">Toggle Control Sidebar</a> --}}
                <div class="col-md-12">
                    <label for="classification">Classification</label>
                    {{-- <div class="row">
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
                    </div> --}}
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

                <div class="col-md-12 mb-3">
                    <label for="ticketTinyMCE">Description</label>
                    <textarea id="ticketTinyMCE" name="description"></textarea>
                </div>

                <div class="col-md-6">

                </div>

                <div class="col-md-12">
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
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="{{ asset('vendor/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script src="{{ asset('js/ticket-tinymce.js') }}"></script>
    <script src="{{ asset('vendor/jstree/dist/jstree.min.js') }}"></script>
    
    <script>
    $("#my-toggle-button").ControlSidebar('toggle');
    var jsTree = $('#js_tree').jstree();

    jsTree.on('changed.jstree', function(e, data) {
        console.log();
        
        $('input[name="classification"]').val(data.instance.get_path(data.instance.get_selected(), ' > ').replace(/\s+/g, ' ').trim());

    });
    
    </script>
@stop