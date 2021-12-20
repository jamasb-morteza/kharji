<div class="small-box {{@$attributes['bgClass']??'bg-info'}}">
    <div class="inner">
        <h3>{{@$title}}</h3>
        <p>{{@$text}}</p>
    </div>
    <div class="icon">
        <i class="{{@$iclass??''}}"></i>
    </div>
    <a href="{{@$href}}" class="small-box-footer">
        {{@$linkText}}
        <i class="fas fa-arrow-circle-left"></i></a>
</div>
{{--

usage
<x-adminlte.small-box
    bgClass="bg-danger"
    title="150"
    :text="__('New Orders 2')"
    iclass="ion ion-bag"
    href="#"
    linkText="Show More"
/>
--}}
