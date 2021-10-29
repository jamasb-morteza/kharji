@props(['id'=>'','name'=>'','items'=>[]])
<select
    @if(!empty($id))
    id="{{$id}}"
    @endif
    class="form-control select2-users-multi" name="{{$name}}" multiple>
    @if(isset($items) && !empty($items))
        @foreach($items as $item)
            <option value="{{$item->id}}" selected>{{$item->name}}</option>
        @endforeach
    @endif
</select>
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
