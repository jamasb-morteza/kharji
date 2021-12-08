<x-app-layout>
    <x-slot name="header_breadcrumbs">
        <x-kharji.breadcrumb-item :title="__('Dashboard')" href="/"/>
        <x-kharji.breadcrumb-item :title="__('Expends')" :active="true"/>
    </x-slot>
    <x-slot name="subheader_nav_link">
        <x-kharji.subheader-nav-link class="text-success" :href="route('expends.create')" fa-icon="fa fa-plus"
                                     :title="__('New Expend')"/>
    </x-slot>

    <div class="card my-4">
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('Expend At')}}</th>
                    <th>{{__('User')}}</th>
                    <th>{{__('Title')}}</th>
                    <th>{{__('Price')}}</th>
                    <th>{{__('Description')}}</th>
                    <th>{{__('Actions')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($expends as $expend)
                    <tr>
                        <td>#</td>
                        <td><span dir="ltr">{{$expend->jalali_spend_at->format('Y/m/d H:i:s')}}</span></td>
                        <td>{{$expend->user->name}}</td>
                        <td>{{$expend->title}}</td>
                        <td>{{number_format($expend->price)}}</td>
                        <td>{{$expend->description}}</td>
                        <td class="d-inline-flex">
                            <a href="#" class="btn btn-link text-primary">
                                <i class="fa fa-edit"></i>
                            </a>
                            @if(auth()->id() == $expend->user_id)
                                <x-kharji.delete_item :route="route('expends.destroy',['expend_id'=>$expend->id])" title="حذف" />
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="row justify-content-center d-flex">
                {!! $expends->links() !!}
            </div>
        </div>
    </div>
</x-app-layout>
