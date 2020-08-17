@extends('layouts.app')

@section('content')
    @if ($message = session('message'))
        <div class="alert alert-success">{{ $message }}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('news.store')}}" class="col-5" method="post" id="createForm">
        @csrf
        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Enter name">
        </div>

        <div class="form-group">
            <textarea class="form-control" name="news" rows="4" cols="50"> </textarea>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                   placeholder="Enter short description" name="short_description">
        </div>
        <button type="submit" class="btn btn-primary" id="click">Submit</button>
    </form>
    <script>
        $(document).ready(() => {
            $('#createForm').validate(({
                rules: {
                    name: 'required',
                    short_description: {
                        required: true,
                        minLength: 50
                    },
                    news: {
                        required: true,
                        minLength: 150
                    },
                },

                messages: {
                    name: 'Enter your name',
                    short_description: 'short description is required',

                    news: {
                        required: 'News is required',
                    },
                }
            }))
        })
    </script>

@endsection
