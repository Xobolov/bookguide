@extends('web.layout.app')

@section('content')

<div class="container pt-5">

	<div class="row">

        <div class="col-md-2 p-3">
            <img class="img-fluid" src="{{asset ('web/images/uploads/'.$book_image)}}" alt="">
        </div>
        <div class="col-md-6 pt-3 ml-4">
            <h4>{{$book_name}}</h4>
            <h6>{{$book_author}}</h6>
            <hr>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12" style="border:1px solid red">

            <div class="row">

                @foreach ($tests as $test)

                {{-- {{ route('book.test' , [$book_slug, $test->id, ]) }}--}}

                <div class="col-md-3" style="border:1px solid green">

                    @foreach ($test->questions as $question)

                    <a href="{{ route('book.test' , [$book_slug, $test->id, $question->id]) }}">

                        {{$test->name}}

                        </a>

                        @endforeach
                    </div>

                    @endforeach

                </div>

            </div>
            <div class="col-md-12">
               {!!$book_words!!}
           </div>
       </div>


   </div>

   @endsection
