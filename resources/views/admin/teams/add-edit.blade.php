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
            <form action="{{ route('admin.teams.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-12">
                        <x-forms.input name="name" label="Name" :isRequired="true" hintText="Name" id="title"
                            :value="$value->name ?? ''" />
                        <x-forms.input name="position" label="position"  :value="$value->position ?? ''" />
                        <x-forms.input type="hidden" name="id" :value="$value->id ?? ''" />
                    </div>
                    <div class="col-12">
                        <label for="image" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-7">
                            <input id="image" type="file" class="form-control" name="image">
                            <img src="{{asset($value->image)}}" id="category-img-tag" width="200px" />   <!--for preview purpose -->
                        </div>
                    </div>
                </div>


                <a class="btn btn-outline-primary mt-3" href="{{ route('admin.categories.index') }}">Back</a>
                <button class="btn btn-primary mt-3" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection
@section('scripts')

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#category-img-tag').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#image").change(function(){
            readURL(this);
        });
    </script>
@endsection
