<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Expends') }}
        </h2>
    </x-slot>

    <div class="card my-4">
        <form action="{{route('expends.store')}}" method="post" enctype="multipart/form-data">
            <div class="card-body row">
                {{csrf_field()}}
                <div class="form-group col-md-6 col-xs-12">
                    <label for="title">عنوان:</label>
                    <input class="form-control" id="name" name="name" value="{{old('name')}}"/>
                </div>
                <div class="form-group col-md-6 col-xs-12">
                    <label for="title">خصوصی:</label>
                    <input type="checkbox" class="form-control" id="personal_team" name="personal_team"
                           value="{{old('personal_team')}}"/>
                </div>
                <div class="form-group col-12">
                    <label for="description">توضیحات:</label>
                    <textarea class="form-control" id="description" name="description">{{old('description')}}</textarea>
                </div>
                <div class="form-group col-6">
                    <label for="members">اعضا:</label>
                    <x-kharji.select2-users-multi id="members" name="members[]"/>
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
</x-app-layout>
