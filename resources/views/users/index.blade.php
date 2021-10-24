<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Expends') }}
        </h2>
    </x-slot>

    <div class="card my-4">
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('Created At')}}</th>
                    <th>{{__('name')}}</th>
                    <th>{{__('email')}}</th>
                    <th>{{__('Actions')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <th>#</th>
                        <th>{{$user->created_at}}</th>
                        <th>{{$user->name}}</th>
                        <th>{{$user->email}}</th>
                        <th class="d-inline-flex">
                            <a href="{{route('users.edit',['user_id'=>$user->id])}}" class="btn btn-link text-primary">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form action="{{route('users.destroy',['user_id'=>$user->id])}}">
                                {{method_field('delete')}}
                                <button class="btn btn-link text-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </th>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="row justify-content-center d-flex">
                {!! $users->links() !!}
            </div>
        </div>
    </div>
</x-app-layout>
