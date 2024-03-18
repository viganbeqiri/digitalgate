@extends('admin.layout')
@section('content')
    @php
        $value = $data ?? null;
    @endphp
    <div class="card">
        <div class="card-header bg-primary text-white">Add / Update Page</div>
        @if (!empty($message))
            <x-alert type="{{ $type }}" message="{{ $message }}"/>
        @endif
        <div class="card-body">
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-12">
                        <x-forms.input name="name" label="Title" :isRequired="true" hintText="Product name" id="name"
                                       :value="$value->name ?? ''"/>
                        <x-forms.input name="subtitle" label="subtitle" disabled=true :value="$value->subtitle ?? ''"/>
                        <x-forms.input type="hidden" name="id" :value="$value->id ?? ''"/>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" name="price" id="price"
                                   value="{{ number_format($value->price, 0, ',', '') ?? '' }}">
                        </div>
                        <hr/>
                        @if(!empty($value->additional_info))
                            <h4>Additional Info</h4>
                            <div class="additional-info">
                                @foreach(($value->additional_info) as $key => $value)
                                    <div class="row row-{{$key}} mb-1 pe-3">
                                        <div class="col-11">
                                            <input type="text" class="form-control" name="additional_info[{{$key}}]"
                                                   value="{{ $value }}">
                                        </div>
                                        <div class="col-1">
                                            @if($loop->last)
                                                <a class="btn btn-primary btn-md btn-plus" data-key="{{ $key }}"><i
                                                        class="fa fa-plus"></i></a>
                                            @else
                                                <a class="btn btn-danger btn-md btn-min" data-key="{{ $key }}"><i
                                                        class="fa fa-minus"></i></a>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="additional-info">
                                <div class="row row-0 mb-1 pe-3">
                                    <div class="col-11">
                                        <input type="text" class="form-control" name="additional_info[0]"
                                        >
                                    </div>
                                    <div class="col-1">
                                        <a class="btn btn-primary btn-md btn-plus" data-key="0"><i
                                                class="fa fa-plus"></i></a>

                                    </div>
                                </div>
                            </div>
                        @endif


                    </div>
                    <div class="col-md-8 col-sm-6 col-12 ps-1">
                        <div class="form-group">
                            <label for="note">Note</label>
                            <textarea class="form-control" name="note" rows="5">{{$data->note ?? ''}}</textarea>

                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="image" class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-7">
                                    <input id="image" type="file" class="form-control" name="image" value="{{$data->image ?? ''}}">
                                    <img src="{{asset($data->image) ?? ''}}" id="category-img-tag" width="200px"/>
                                    <!--for preview purpose -->
                                </div>
                            </div>
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

        $("#image").change(function () {
            readURL(this);
        });
        $(document).on('click', '.btn-plus', function (e) {
            let key = $(this).data('key');
            let main = $('.additional-info')
            $(this).removeClass('btn-plus').addClass('btn-min').removeClass('btn-primary').addClass('btn-danger').html('<i class="fa fa-minus"></i>');
            main.append(`
                <div class="row row-${key+1} mb-1 pe-3">
                    <div class="col-11">
                        <input type="text" class="form-control" name="additional_info[${key+1}]">
                    </div>
                    <div class="col-1">
                        <a class="btn btn-primary btn-md btn-plus" data-key="${key+1}"><i
                                class="fa fa-plus"></i></a>
                    </div>
                </div>
            `)
        })
        $(document).on('click', '.btn-min', function (e) {
            let key = $(this).data('key');
            $(this).removeClass('btn-min').addClass('btn-plus').removeClass('btn-danger').addClass('btn-primary').html('<i class="fa fa-plus"></i>');
            $(`.row-${key}`).remove()
        })
    </script>
@endsection
