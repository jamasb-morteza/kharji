<x-app-layout>
    <x-slot name="header_breadcrumbs">
        <x-kharji.breadcrumb-item :title="__('Dashboard')" href="/"/>
        <x-kharji.breadcrumb-item :title="__('Teams')" :active="true"/>
    </x-slot>
    <x-slot name="subheader_nav_link">
        <x-kharji.subheader-nav-link class="text-success" :href="route('team.create')" fa-icon="fa fa-plus"
                                     :title="__('New Team')"/>
    </x-slot>

    <div class="card my-4">
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('Created At')}}</th>
                    <th>{{__('User')}}</th>
                    <th>{{__('Title')}}</th>
                    <th>{{__('Members')}}</th>
                    <th>{{__('Description')}}</th>
                    <th>{{__('Actions')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($teams as $team)
                    <tr>
                        <td>#</td>
                        <td><span dir="ltr">{{$team->jalali_created_at->format('Y/m/d H:i:s')}}</span></td>
                        <td>{{$team->creator->name}}</td>
                        <td>{{$team->title}}</td>
                        <td>
                            <x-kharji.members-thumbnail :members="$team->members"/>
                        </td>
                        <td>{{$team->description}}</td>
                        <td class="d-inline-flex">
                            <a href="{{route('team.edit',['team_id'=>$team->id])}}" class="btn btn-link text-primary">
                                <i class="fa fa-edit"></i>
                            </a>

                            <form action="{{route('team.destroy',['team_id'=>$team->id])}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-link text-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="row justify-content-center d-flex">
                {!! $teams->links() !!}
            </div>
        </div>
    </div>

</x-app-layout>
