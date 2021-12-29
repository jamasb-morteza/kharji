@props([
    'class'=>'',
    'assoc'=>false,
    'options'=>null,
    'selects'=>null
])
<div class="select2-primary w-100">
    <select
        class="x-select2 w-100 {{$class}}"
        {{$attributes
            ->except(['class','assoc','options','selects'])
            ->merge(['data-dir'=>'rtl','data-placeholder'=>'','data-allow-clear'=>'true'])
            }}>
        @if($options)
            @if($assoc==='true')
                @foreach($options as $key=>$option)
                    @php
                        $selected= false;
                        if(!empty($selects)){
                            if(is_array($selected)){
                                $selected = in_array($key,$selects);
                            }else{
                                $selected = $key === $selects;
                            }
                        }
                    @endphp
                    <option value="{{$key}}" {{$selected?'selected':''}}>{{$option}}</option>
                @endforeach
            @else
                @foreach($options as $option)
                    @php
                        $selected= false;
                        if(!empty($selects)){
                            if(is_array($selects)){
                                $selected = in_array($option,$selects);
                            }else{
                                $selected = $option === $selects;
                            }
                        }
                    @endphp
                    @if($selected)
                        <option selected>{{$option}}</option>
                    @else
                        <option>{{$option}}</option>
                    @endif

                @endforeach
            @endif
        @else
            {{$slot}}
        @endif
    </select>
</div>

