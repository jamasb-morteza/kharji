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
                    <th>#</th>
                    <th>{{$expend->jalali_expend_at}}</th>
                    <th>{{$expend->user_name}}</th>
                    <th>{{$expend->title}}</th>
                    <th>{{$expend->price}}</th>
                    <th>{{$expend->description}}</th>
                    <th>
                        <a href="#" class="btn btn-link text-primary">
                            <i class="fa fa-edit"></i>
                        </a>
                        <form action="delete">
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
                {!! $expends->links() !!}
            </div>
        </div>
    </div>
</x-app-layout>
