<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Expends') }}
        </h2>
    </x-slot>
    <x-slot name="header_breadcrumbs">
        <x-kharji.breadcrumb-item :title="__('Dashboard')" href="/"/>
        <x-kharji.breadcrumb-item :title="__('Expends')" :active="true"/>
    </x-slot>
    <x-slot name="subheader_nav_link">
        <x-kharji.subheader-nav-link class="text-success" :href="route('expends.create')" fa-icon="fa fa-plus"
                                     :title="__('New Expend')"/>
    </x-slot>
    <div class="card">
        <div class="card-header">
            <h5>
                <a
                    href="#table-panel-body"
                    aria-controls="table-panel-body"
                    data-toggle="collapse"
                    aria-expanded="true">
                    <span>لیست مخارج</span>
                </a>
            </h5>
        </div>
        <div class="card-body" >
            <div class="row  collapse" id="table-panel-body">
                <div class="col-xs1-12 table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">{{__('Expend At')}}</th>
                            <th class="text-center">{{__('User')}}</th>
                            <th class="text-center">{{__('Title')}}</th>
                            <th class="text-center">{{__('Price')}}</th>
                            <th class="text-center">{{__('Description')}}</th>
                            <th class="text-center">{{__('Actions')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($expends as $key => $expend)
                            <tr>
                                <td>{{$expends->firstItem() + $key}}</td>
                                <td><span dir="ltr">{{$expend->jalali_spend_at->format('Y/m/d H:i:s')}}</span></td>
                                <td>
                                    <img src="{{$expend->user->default_profile}}"
                                         class="img b-a-2 rounded-circle w-30px" alt="">
                                    <span>{{$expend->user->name}}</span>
                                </td>
                                <td>{{$expend->title}}</td>
                                <td>{{number_format($expend->price)}}</td>
                                <td>{{$expend->description}}</td>
                                <td class="d-inline-flex">
                                    <a href="#" class="btn btn-link text-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    @if(auth()->id() == $expend->user_id)
                                        <x-kharji.delete_item
                                            :route="route('expends.destroy',['expend_id'=>$expend->id])" title="حذف"/>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row justify-content-center d-flex">
                {!! $expends->links() !!}
            </div>
        </div>
    </div>
</x-app-layout>
