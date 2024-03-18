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
            <form data-url="{{ route('admin.pages.updateOrSave') }}" method="POST" id="form-pages"
                  enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-12">
                        <x-forms.input name="title" label="Title" :isRequired="true" hintText="Category Title"
                                       id="title" :value="$value->title ?? ''"/>
                        <x-forms.input name="subtitle" label="subtitle" :value="$value->subtitle ?? ''"/>
                        <x-forms.input name="slug" label="slug" disabled=true :value="$value->slug ?? ''" disabled/>
                        <x-forms.input type="hidden" name="id" :value="$value->id ?? ''"/>

                    </div>
                    <div class="col-md-6 col-sm-6 col-12">
                        <div id="snow-editor" style="height: 300px;">
                            {!! $value->description ?? '' !!}

                        </div> <!-- end Snow-editor-->
                    </div>
                </div>
                <hr>
                <h3>Contents</h3>
                @foreach(json_decode($value->contents) as $key => $content)
                    <div class="row" id="content-{{ $key }}">
                        <div class="col-md-6 col-12">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" id="title-{{ $key }}" name="contents[{{ $key }}][title]"
                                       value="{{$content->title}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea id="description" name="contents[{{ $key }}][description]" class="form-control"
                                          rows="3">{{$content->description}}</textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <label for="image" class="col-sm-2 col-form-label">Image</label>
                                    <input id="image-input-{{$key}}" type="file" class="form-control image-input"
                                           data-image-id="{{ $key }}" data-preview-id="image-content-{{$key}}-tag"
                                           name="contents[{{ $key }}][image]"
                                           data-old-image="{{$content->image}}"
                                           data-image-changed="false"
                                           accept="image/*">

                                </div>
                                <div class="col-lg-6 col-12" id="image-{{ $key }}">
                                    <img src="{{$content->image}}" id="image-content-{{$key}}-tag" width="200px"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
                <a class="btn btn-outline-primary mt-3" href="{{ route('admin.categories.index') }}">Back</a>
                <button class="btn btn-primary mt-3" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection
@section('scripts')

    <script>
        var quill = new Quill("#snow-editor", {
            theme: "snow",
            modules: {toolbar: [[{font: []}, {size: []}], ["bold", "italic", "underline", "strike"], [{color: []}, {background: []}], [{script: "super"}, {script: "sub"}], [{header: [!1, 1, 2, 3, 4, 5, 6]}, "blockquote", "code-block"], [{list: "ordered"}, {list: "bullet"}, {indent: "-1"}, {indent: "+1"}], ["direction", {align: []}], ["link", "image", "video"], ["clean"]]}
        })
        $('#form-pages').submit(function (e) {
            e.preventDefault()
            let description = quill.root.innerHTML
            let formData = new FormData();
            let serialized = $(this).serializeArray()
            serialized.forEach(function (item) {
                if (item.name.includes('contents')) {
                    formData.append(item.name, item.value)

                } else {
                    formData.append(item.name, item.value)
                }
            });

            //get image data
            let images = $('.image-input')
            images.each(function () {
                let imageField = $(this).prop('files')[0];
                if (imageField) {
                    formData.append('contents[' + $(this).data('image-id') + '][image]', imageField)
                    formData.append('contents[' + $(this).data('image-id') + '][image_changed]', true)

                } else {
                    formData.append('contents[' + $(this).data('image-id') + '][image]', $(this).data('old-image'))
                    formData.append('contents[' + $(this).data('image-id') + '][image_changed]', false)
                }
            })

            formData.append('description', description)
            const url = $(this).data('url')

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.success) {
                        Swal.fire({
                            title: "Good job!", text: response.message, icon: "success", onClose: () => {
                                window.location.href = "{{ route('admin.pages.index') }}"
                            }
                        })
                    }
                }
            })
        })

        var room = 1;

        function contentFields() {

            room++;
            var objTo = document.getElementById('education_fields')
            var divtest = document.createElement("div");
            divtest.setAttribute("class", "form-group removeclass" + room);
            var rdiv = 'removeclass' + room;
            divtest.innerHTML = '<div class="col-sm-3 nopadding"><div class="form-group"> <input type="text" class="form-control" id="Schoolname" name="Schoolname[]" value="" placeholder="School name"></div></div><div class="col-sm-3 nopadding"><div class="form-group"> <input type="text" class="form-control" id="Major" name="Major[]" value="" placeholder="Major"></div></div><div class="col-sm-3 nopadding"><div class="form-group"> <input type="text" class="form-control" id="Degree" name="Degree[]" value="" placeholder="Degree"></div></div><div class="col-sm-3 nopadding"><div class="form-group"><div class="input-group"> <select class="form-control" id="educationDate" name="educationDate[]"><option value="">Date</option><option value="2015">2015</option><option value="2016">2016</option><option value="2017">2017</option><option value="2018">2018</option> </select><div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_education_fields(' + room + ');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div></div></div></div><div class="clear"></div>';

            objTo.appendChild(divtest)
        }

        function remove_education_fields(rid) {
            $('.removeclass' + rid).remove();
        }

        function readURL(input, previewId) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#' + previewId).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $(".image-input").change(function () {
            let previewId = $(this).data('preview-id');
            readURL(this, previewId);
            let image_changed = $(this).data('image-changed');
            if (!image_changed) {
                $(this).attr('data-image-changed', true);
            }
        });
    </script>

@endsection
