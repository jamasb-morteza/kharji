<script>
    $(document).on('submit', 'form.confirm_delete', function (event) {
        event.preventDefault();
        form = $(event.currentTarget);
        Swal.fire({
            title: 'آیا مطمئن هستید؟',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'انصراف',
            confirmButtonText: 'بله'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        })
    });

    @if($action_result = session('action-result'))
    @php
        if($action_result && isset($action_result['success'])){
            if($action_result['success']){
                $action_result_title = 'عملیات موفق';
                $action_result_icon = 'success';
            }else{
                $action_result_title = 'عملیات ناموفق';
                $action_result_icon = 'danger';
            }
        }
    @endphp
    Swal.fire({
        title: '{{$action_result_title}}',
        text: '{{isset($action_result['message'])?$action_result['message']:''}}',
        icon: '{{$action_result_icon}}',
        confirmButtonText: 'بله'
    });
    @endif
</script>
