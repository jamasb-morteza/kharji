<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Expends') }}
        </h2>
    </x-slot>

    <div class="card my-4">
        <div class="card-body">
            <form action="{{route('expends.create')}}" type="post">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="title">Title:</label>
                    <input class="form-control" id="title" name="title" value="{{old('title',$expend->title)}}"/>
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input class="form-control" type="number" id="price" name="price" value="{{old('price',$expend->price)}}"/>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description">{{old('description',$expend->description)}}</textarea>
                </div>
                <div class="form-group">
                    <label for="attachments">Attachments:</label>
                </div>
                <div class="row">
                    <input type="hidden" id="removing-attachments" name="removing-attachments">
                    @if($expend->images)
                    @foreach($expend->images as $image)
                    <div class="col-xs-12 col-sm-6 col-md-4 staged-attachment-container">
                        <img src="{{$image->file_path}}" alt="" class="img img-responsive">
                        <a data-attachment-id="{{$image->id}}" class="btn btn-link remove-staged-attachment"><i class="fa fa-times"></i></a>
                    </div>
                    @endforeach
                    @endif
                </div>
                <div id="attachments-container"></div>
                <span><a id="add-attachment-btn" class="btn btn-link text-success"><i class="fa fa-plus"></i></a></span>
                <div class="form-group d-flex justify-content-center">
                    <button class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
    @push('scripts')
        <script>
            $(document).ready(function () {
                var removing_attachments = [];
                $('#add-attachment-btn').on('click', function (event) {
                    $('#attachments-container').append(`
                    <div class="form-group">
                        <input type="file" name="attachments[]" />
                        <span><a class="btn btn-link text-danger delete-attachment"><i class="fa fa-times"></i></a></span>
                    </div>
                    `);
                });
                $(document).on('click', '.delete-attachment', function (event) {
                    $(event.currentTarget).parents('.form-group').remove()
                });
                $('.remove-staged-attachment').on('click',function (event){
                    image_id = $(event.currentTarget).data('attachment-id');
                    $(event.currentTarget).parents('.staged-attachment-container').remove();
                    removing_attachments.push(image_id);
                    $('#removing-attachments').val(JSON.stringify(image_id))
                });
            });
        </script>
    @endpush
</x-app-layout>
