@props([
    'title'=>'',
    'bgClass'=>'',
    'headClass'=>'',
    'iClass'=>'fas fa-th',
    'closable'=>false,
    'maximizable'=>true,
    'collapsable'=>true,
    'refreshable'=>false,
    'resourceUrl'=>'widgets.html',
    'loadOnInit'=>'false',
    'dataSourceSelector'=>'#card-refresh-content',
    'paneIconClass'=>'fas fa-comments',
    'paneTooltip'=>'',
    'height'=>''
])
<div class="card {{!empty($headClass)?"card-{$headClass}":''}} {{$bgClass}} {{isset($pane)?'direct-chat':''}}">
    <div class="card-header">
        <h3 class="card-title">
            <i class="{{$iClass}} ml-1"></i>
            {{$title}}
        </h3>

        <div class="card-tools">
            @if(isset($tools))
                {!! $tools !!}
            @endif
            @if(isset($pane))
                <button type="button" class="btn btn-tool" title="{{$paneTooltip}}"
                        data-widget="chat-pane-toggle">
                    <i class="{{$paneIconClass}}"></i>
                </button>
            @endif
            @if($refreshable)
                <button type="button" class="btn btn-tool" data-card-widget="card-refresh"
                        data-source="{{$resourceUrl}}"
                        data-source-selector="{{$dataSourceSelector}}" data-load-on-init="{{$loadOnInit}}">
                    <i class="fas fa-sync-alt"></i>
                </button>
            @endif
            @if($maximizable)
                <button type="button" class="btn btn-tool" data-card-widget="maximize">
                    <i class="fas fa-expand"></i>
                </button>
            @endif
            @if($collapsable)
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            @endif
            @if($closable)
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            @endif
        </div>
        <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        @if(isset($pane))
            <div class="direct-chat-messages" @if(!empty($height)) style="height:{{"{$height}px"}}" @endif>
                {!! $slot !!}
            </div>
            <div class="direct-chat-contacts" @if(!empty($height)) style="height:{{"{$height}px"}}" @endif>
                {!! $pane !!}
            </div>
        @else
            <div @if(!empty($height)) style="height:{{"{$height}px"}}" @endif>
                {!! $slot !!}
            </div>
        @endif
    </div>
    <!-- /.card-body -->
    @if(isset($footer))
        <div class="card-footer">
            {!! $footer !!}
        </div>
    @endif
</div>
