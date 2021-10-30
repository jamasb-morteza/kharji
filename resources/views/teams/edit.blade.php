<x-app-layout>
    <x-slot name="header_breadcrumbs">
        <x-kharji.breadcrumb-item :title="__('Dashboard')" href="/"/>
        <x-kharji.breadcrumb-item :title="__('Teams')" :href="route('team.index')"/>
        <x-kharji.breadcrumb-item :title="__('Edit Team')" :active="true"/>
    </x-slot>

    <div class="card my-4">
        <form action="{{route('team.update',['team_id'=>$team->id])}}" method="post">
            @csrf
            @method('put')
            <div class="card-body row">
                @csrf
                <div class="form-group col-md-6 col-xs-12">
                    <label for="title">عنوان:</label>
                    <input class="form-control" id="title" name="title" value="{{old('title',$team->title)}}"/>
                    @error('title')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group col-md-6 col-xs-12">
                    <label for="title">خصوصی:</label>
                    <input type="checkbox" class="form-check" id="personal_team" name="personal_team"
                           value="1" {{old('personal_team',$team->personal_team)?'checked':''}}/>
                </div>
                <div class="form-group col-12">
                    <label for="description">توضیحات:</label>
                    <textarea class="form-control" id="description"
                              name="description">{{old('description',$team->description)}}</textarea>
                    @error('description')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group col-6">
                    <label for="members">اعضا:</label>
                    <x-kharji.select2-users-multi id="members" name="members[]" :items="$team->members"/>
                    @error('members')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <div class="form-group d-flex justify-content-between">
                    <a href="{{route('expends.index')}}" class="btn btn-danger px-4">لغو</a>
                    <div>
                        <button class="btn btn-success px-4" value="submit">ثبت</button>
                    </div>
                </div>
            </div>
        </form>
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
                $('.remove-staged-attachment').on('click', function (event) {
                    image_id = $(event.currentTarget).data('attachment-id');
                    $(event.currentTarget).parents('.staged-attachment-container').remove();
                    removing_attachments.push(image_id);
                    $('#removing-attachments').val(JSON.stringify(image_id))
                });
            });
        </script>
    @endpush
</x-app-layout>
