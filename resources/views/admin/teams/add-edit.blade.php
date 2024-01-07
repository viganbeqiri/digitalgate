@extends('admin.layout')
@section('content')
    @php
        $value = $data ?? null;
    @endphp
    <div class="card">
        <div class="card-header bg-primary text-white">Add / Update Page</div>
        @if (!empty($message))
            <x-alert type="{{ $type }}" message="{{ $message }}" />
        @endif
        <div class="card-body">
            <form action="{{ route('admin.categories.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-12">
                        <x-forms.input name="name" label="Name" :isRequired="true" hintText="Name" id="title"
                            :value="$value->name ?? ''" />
                        <x-forms.input name="position" label="position" disabled=true :value="$value->position ?? ''" />
                        <x-forms.input type="hidden" name="id" :value="$value->id ?? ''" />
                    </div>


                </div>


                <a class="btn btn-outline-primary mt-3" href="{{ route('admin.categories.index') }}">Back</a>
                <button class="btn btn-primary mt-3" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection
