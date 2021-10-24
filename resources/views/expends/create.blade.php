<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Expends') }}
        </h2>
    </x-slot>

    <div class="card my-4">
        <form action="{{route('expends.store')}}" method="post">
            <div class="card-body row">

                {{csrf_field()}}
                <div class="form-group col-md-6 col-xs-12">
                    <label for="title">عنوان:</label>
                    <input class="form-control" id="title" name="title" value="{{old('title')}}"/>
                </div>
                <div class="form-group col-md-6 col-xs-12" dir="ltr">
                    <label for="price">مبلغ:</label>
                    <input class="form-control number-separator" id="price" name="price" value="{{old('price')}}"/>
                </div>
                <div class="form-group col-md-6 col-xs-12" dir="ltr">
                    <label for="spend_at_date">تاریخ:</label>
                    <input class="form-control jalali_date_picker" id="spend_at_date" name="spend_at_date"
                           value="{{old('spend_at_date')}}" data-jdp/>
                </div>
                <div class="form-group col-md-6 col-xs-12" dir="ltr">
                    <label for="spend_at_time">زمان:</label>
                    <input type="time" class="form-control" id="spend_at_time" name="spend_at_time"
                           value="{{old('spend_at_time',\Carbon\Carbon::now()->format('H:i:s'))}}"/>
                </div>
                <div class="form-group col-12">
                    <label for="description">توضیحات:</label>
                    <textarea class="form-control" id="description" name="description">{{old('description')}}</textarea>
                </div>
                <div class="form-group col-12">
                    <label for="attachments">پیوست‌ها:</label>
                    <input type="file" class="form-control-file">
                </div>
                <div id="attachments-container"></div>

                <span><a id="add-attachment-btn" class="btn btn-link text-success"><i class="fa fa-plus"></i></a></span>

            </div>
            <div class="card-footer">
                <div class="form-group d-flex justify-content-end">
                    <button class="btn btn-success px-4">ثبت</button>
                </div>
            </div>
        </form>
    </div>
    @push('scripts')
        <script>
            $(document).ready(function () {
                jalaliDatepicker.startWatch();
                price = new AutoNumeric('#price', {
                    unformatOnSubmit: true,
                    modifyValueOnWheel: false,
                    decimalPlaces: 0,
                });
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
