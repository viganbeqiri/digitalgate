@extends('admin.layout')
@section('content')
    @php
        $value = $data ?? null;
    @endphp
    <div class="card">
        <div class="card-header bg-primary text-white">Add / Update Category</div>
        @if (!empty($message))
            <x-alert type="{{ $type }}" message="{{ $message }}" />
        @endif
        <div class="card-body">
            <form action="{{ route('admin.categories.store') }}" method="POST">
                {{ csrf_field() }}
                <x-forms.input name="title" label="Title" :isRequired="true" hintText="Category Title" id="title"
                    :value="$value->title ?? ''" />

                <x-forms.input name="slug" label="slug" disabled=true :value="$value->slug ?? ''" />
                <x-forms.input type="hidden" name="id" :value="$value->id ?? ''" />

                <a class="btn btn-outline-primary mt-3" href="{{ route('admin.categories.index') }}">Back</a>
                <button class="btn btn-primary mt-3" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection
