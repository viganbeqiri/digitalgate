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
                    <div class="col-md-4 col-sm-6 col-12">
                        <x-forms.input name="name" label="Title" :isRequired="true" hintText="Product name" id="name"
                            :value="$value->name ?? ''" />
                        <x-forms.input name="subtitle" label="subtitle" disabled=true :value="$value->subtitle ?? ''" />
                        <x-forms.input type="hidden" name="id" :value="$value->id ?? ''" />
                    </div>
                    <div class="col-md-8 col-sm-6 col-12">
                        <x-text-area name="note" label="note" :value="$value->note ?? ''" row=5 />

                    </div>

                </div>


                <a class="btn btn-outline-primary mt-3" href="{{ route('admin.categories.index') }}">Back</a>
                <button class="btn btn-primary mt-3" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection
