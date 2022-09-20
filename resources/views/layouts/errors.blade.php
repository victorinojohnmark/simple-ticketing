@if ($errors->any())
<x-adminlte-alert theme="danger" dismissable>
    <ul class="m-0">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</x-adminlte-alert>
@endif
@if (Session::has('success'))
<x-adminlte-alert theme="success" dismissable>
    {{ Session::get('success') }}
</x-adminlte-alert>
@endif

@if (Session::has('danger'))
<x-adminlte-alert theme="danger" dismissable>
    {{ Session::get('danger') }}
</x-adminlte-alert>
@endif

@if (Session::has('warning'))
<x-adminlte-alert theme="warning" dismissable>
    {{ Session::get('warning') }}
</x-adminlte-alert>
@endif

@if (Session::has('info'))
<x-adminlte-alert theme="info" dismissable>
    {{ Session::get('info') }}
</x-adminlte-alert>
@endif