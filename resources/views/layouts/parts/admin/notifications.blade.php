@if ($errors->count() > 0)
<div class="alert alert-danger" role="alert">
    @foreach ($errors->all() as $error)
        {{ $error }}<br/>
    @endforeach
</div>
@endif

{{--<div class="alert alert-secondary" role="alert">--}}
    {{--This is a secondary alert—check it out!--}}
{{--</div>--}}
@if (session('sucess_message'))
<div class="alert alert-success" role="alert">
    {{ session('sucess_message') }}
</div>
@endif

{{--<div class="alert alert-danger" role="alert">--}}
    {{--This is a danger alert—check it out!--}}
{{--</div>--}}
{{--<div class="alert alert-warning" role="alert">--}}
    {{--This is a warning alert—check it out!--}}
{{--</div>--}}
{{--<div class="alert alert-info" role="alert">--}}
    {{--This is a info alert—check it out!--}}
{{--</div>--}}
{{--<div class="alert alert-light" role="alert">--}}
    {{--This is a light alert—check it out!--}}
{{--</div>--}}
{{--<div class="alert alert-dark" role="alert">--}}
    {{--This is a dark alert—check it out!--}}
{{--</div>--}}