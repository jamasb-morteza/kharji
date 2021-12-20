<!-- solid sales graph -->
@props(['title'=>'','bg-class','iclass'=>'fas fa-th'])
<div class="card">
    <div class="card-header border-0">
        <h3 class="card-title">
            <i class="{{$iclass}} ml-1"></i>
            {{$title}}
        </h3>

        <div class="card-tools">
            <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        {!! @$slot !!}
    </div>
    <!-- /.card-body -->
    <div class="card-footer bg-transparent">
        <div class="row">
            <div class="col-4 text-center">
                <input type="text" class="knob" data-readonly="true" value="20" data-width="60"
                       data-height="60"
                       data-fgColor="#39CCCC">

                <div class="text-white">Mail-Orders</div>
            </div>
            <!-- ./col -->
            <div class="col-4 text-center">
                <input type="text" class="knob" data-readonly="true" value="50" data-width="60"
                       data-height="60"
                       data-fgColor="#39CCCC">

                <div class="text-white">Online</div>
            </div>
            <!-- ./col -->
            <div class="col-4 text-center">
                <input type="text" class="knob" data-readonly="true" value="30" data-width="60"
                       data-height="60"
                       data-fgColor="#39CCCC">

                <div class="text-white">In-Store</div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.card-footer -->
</div>
<!-- /.card -->
