@extends('layouts.app')

@section('content')

@foreach($news as $i)
    <p style="color: #f8fafc">{{$i->name}}</p>
@endforeach
@endsection
