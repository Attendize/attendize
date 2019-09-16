@extends('Bilettm.Layouts.BilettmLayout')
@section('content')
    {{\DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('add_event')}}
    <section>
        <form action="{{route('add_event')}}" method="POST">
            @csrf
            <input type="text" name="name" value="{{old('name')}}" placeholder="Name">
            <input type="email" name="email" value="{{old('email')}}" placeholder="Email">
            <input type="text" name="phone" value="{{old('phone')}}" placeholder="Phone">
            <input type="text" name="details" value="{{old('details')}}" placeholder="Details">
            <button type="submit" name="send" class="btn btn-danger"> Send</button>
        </form>
    </section>
@endsection