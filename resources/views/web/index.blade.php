@extends('web.layout.app')

@section('content')

<div class="container pt-5">
	
	<div class="row">

		@foreach ($books as $book)

		<div class="col-md-4">
			<!-- Card Dark -->
			<div class="">

				<!-- Card image -->
				<div class="view overlay pb-2">
					<img class="card-img-top mx-auto" style="width: 50%;" src="{{ asset('web/images/uploads/'. $book->image) }}"
					alt="Card image cap">
					<a href="{{ route('home.book' , $book->slug) }}">
						<div class="mask rgba-white-slight"></div>
					</a>
				</div>

				<!-- Card content -->
				<div class="card card-body rounded-bottom text-center">
					
					
					<!-- Title -->
					<h4 class="card-title ">{{$book->name}}</h4>
					<hr>
					<!-- Text -->
					<p class="card-text">{{$book->author}}</p>			
					
				</div>

			</div>
			<!-- Card Dark -->
		</div>	
		
		@endforeach

	</div>


</div>

@endsection