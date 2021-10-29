@props(['id'=>'','name'=>''])
<select
    @if(!empty($id))
    id="{{$id}}"
    @endif
    class="form-control select2-users-multi" name="{{$name}}" multiple></select>
<script>
    $('#{{$id}}.select2-users-multi').select2({
        minimumInputLength: 3,
        multiple: true,
        templateResult: formatUserResultForSelect2,
        ajax: {
            url: '{{route('users.json')}}',
            dataType: 'json',
            delay: 250
        }
    })
</script>
