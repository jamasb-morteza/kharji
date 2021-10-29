<x-app-layout>
    <x-slot name="header_breadcrumbs">
        <x-kharji.breadcrumb-item :title="__('Dashboard')" href="/"/>
        <x-kharji.breadcrumb-item :title="__('Users')" :href="route('users.index')"/>
        <x-kharji.breadcrumb-item :title="__('New User')" :active="true"/>
    </x-slot>

    <div class="card my-4">
        <div class="card-body">
            <form action="{{route('expends.store')}}" type="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input class="form-control" id="title" name="title" value="{{old('title')}}"/>
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input class="form-control" type="number" id="price" name="price" value="{{old('price')}}"/>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description">{{old('description')}}</textarea>
                </div>
                <div class="form-group">
                    <label for="attachments">Attachments:</label>
                    <input type="file" class="form-control-file">
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
                $('#add-attachment-btn').on('click', function (event) {
                    $('#attachments-container').append(`
                    <div class="form-group">
                        <input type="file" name="attachments[]" />
                        <span><a class="btn btn-link text-danger delete-attachment"><i class="fa fa-times"></i></a></span>
                    </div>
                    `);
                })
                $(document).on('click', '.delete-attachment', function (event) {
                    $(event.currentTarget).parents('.form-group').remove()
                })
            });
        </script>
    @endpush
</x-app-layout>
