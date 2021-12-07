@props(['route'=>null,'title'=>''])
<form action="{{$route}}" method="post" class="confirm_delete">
    @method('delete')
    @csrf
    <button class="btn btn-link text-danger" title="{{$title}}">
        <i class="fa fa-trash"></i>
    </button>
</form>

