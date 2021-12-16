<div class="small-box {{@$attributes['class']}}">
    <div class="inner">
        @if(isset($attributes['header']))
            <h3>{{$attributes['header']}}</h3>
        @else
            {!! @$header !!}
        @endif
        @if(isset($attributes['desc']))
            <p>{{$attributes['desc']}}</p>
        @else
            {!! @$desc !!}
        @endif
    </div>
    <div class="icon">
        @if(isset($attributes['iclass']))
            <i class="{{$attributes['iclass']}}"></i>
        @else
            {!! @$icon !!}
        @endif
    </div>
    <a href="{{@$attributes->href??'#'}}" class="small-box-footer">
        {{@$attributes->atext}}
        <i class="fas fa-arrow-circle-left"></i>
    </a>
</div>
