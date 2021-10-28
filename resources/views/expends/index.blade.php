<x-app-layout>
    <x-slot name="header" class="d-flex justify-content-around">
        <h2 class="h4 font-weight-bold fa-pull-right d-inline">
            {{ __('Expends') }}
        </h2>
        <div class="fa-pull-left d-inline">
            <a href="{{route('expends.create')}}" class="text-success">
                <i class="fa fa-plus"></i>
                <span>خرج جدید</span>
            </a>
        </div>
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
                            <form action="delete">
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
                {!! $expends->links() !!}
            </div>
        </div>
    </div>
</x-app-layout>
