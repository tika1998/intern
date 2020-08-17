@extends('layouts.app')

@section('content')

    <div>
        <form method="get">
            <input type="text" placeholder="Search" name="q" id="val">
            <button id="search" type="button">Search</button>
        </form>
        <div id="card" class="d-flex justify-content-center">
            @if($news)
                @foreach($news as $el)
                    <div class="card ml-5" style="width: 18rem;">
                        <div class="card-body">
                            <img class="card-img-top"
                                 src="data:image/png;base64,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"
                                 alt="Card image cap">

                            <h5 class="card-title">{{$el->name}}</h5>
                            <p class="card-text">{{$el->short_description}}</p>
                            <p class="card-text">{{ Str::limit($el->news, $limit = 10, $end = '...') }}</p>
                            <a href="{{route('news.edit',$el->id)}}" class="btn btn-primary">Edit</a>
                            <a href="{{route('news.show',$el->id)}}" class="btn btn-success">View</a>

                            <form action="{{route('news.destroy', $el->id)}}" method='post' style='display: contents'>
                                @csrf
                                @method('DELETE')
                                <input type='submit' class='btn btn-success' value='Delete'>
                            </form>
                        </div>
                    </div>
                @endforeach
            @endif
            <div style="margin-left: 29%; margin-top: 25px">{{ $news->links() }}</div>
        </div>

    </div>
    <div>
        <a href="{{route('news.create')}}" class="btn btn-primary">Create</a>
        <a href="{{url('hello')}}">My News</a>
    </div>

    <script>
        $(document).ready(() => {
            $('#search').on('click', () => {
                let q = $('#val').val();
                $.ajax(
                    {
                        type: 'get',
                        url: 'http://homestead.test/search',
                        data: {
                            q: q,
                        },
                        success: function (res) {
                            if (res && typeof res !== "string") {
                                res.forEach((e) => {
                                    $('#card').html('<div class="card" style="width: 18rem;">'
                                        + '<img class="card-img-top" src="data:image/png;base64,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" alt="Card image cap">\n'
                                        + '<div class="card-body">'
                                        + '<h5 class="card-title">'
                                        + e['name'] + '</h5>'
                                        + '<p class="card-text">' + e['short_description'] + '<p>'
                                        + '<p class="card-text">' + e['news'] + '<p>'
                                        + '<a href="{{route('news.edit',$el->id)}}" class="btn btn-primary">Edit</a>'
                                        + '<a href="{{route('news.show',$el->id)}}" class="btn btn-success">View</a>'
                                    )
                                })
                            } else {
                                $('#card').html('<p style="color: white">' + res + '</p>');
                            }
                        }
                    }
                )
            })
        })
    </script>
@endsection
