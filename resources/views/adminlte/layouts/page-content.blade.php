<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="c-subheader justify-content-between px-3 mb-4">
        <ol class="c-breadcrumb border-0 m-0 px-0 px-md-3">
            @if(isset($header_breadcrumbs))
                {!! $header_breadcrumbs !!}
            @endif
        </ol>
        <div class="c-subheader-nav mfe-2">
            @if(isset($subheader_nav_link))
                {!! $subheader_nav_link !!}
            @endif
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            {!! @$slot !!}
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

</div>
