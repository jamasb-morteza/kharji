<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                @if(isset($header_slot))
                    {{ $header_slot }}
                @else
                    <h1 class="m-0">{{$attributes['sub-header']}}</h1>
                @endif
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    @if(isset($breadcrumbs))
                        {!! $breadcrumbs !!}
                    @endif
                </ol>
            </div>
        </div>
    </div>
</div>
