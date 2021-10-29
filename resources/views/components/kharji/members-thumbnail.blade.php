@props(['members'=>[]])
@foreach($members as $member)
    <a href="" data-user-id="{{$member->user_id}}">
        <img src="{{$member->avatar}}" alt="{{$member->name}}" class="img b-a-2 rounded-circle w-20 ml-1">
    </a>
@endforeach
