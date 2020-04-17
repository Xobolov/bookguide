@extends('web.layout.app')

@section('content')

<style type="text/css">

	.form-check-input[type="radio"]:not(:checked)+label:before
	{
		border: 2px solid #F4b41a !important;
	}

	.form-check-input[type="radio"]:checked+label:after
	{
		background-color: #F4b41a !important;
		border: 2px solid #F4b41a !important;
	}	

</style>

<div class="container pt-5">
	
	<div class="row py-5">

		@foreach ($questions as $question)
		

		<div class="col-md-6 mx-auto z-depth-3 p-5" style="border: 4px solid #212121 !important;border-radius: 5px;">
			
			<h5 class="h5 text-center pb-3" style="color: #143D59">{{$question->question}}</h5>
			<div class="shuffle">
				<!-- Group of material radios - option 1 -->
				<div class="form-check btn-rounded text-white py-2 my-2" style="background-color: #143D59">
					<input type="radio" class="form-check-input" id="materialGroupExample" name="groupOfMaterialRadios">
					<label class="form-check-label" for="materialGroupExample"> {{$question->correct_choice}} </label>
				</div>

				@foreach ($choices as $choice)

				<!-- Group of material radios - option 1 -->
				<div class="form-check btn-rounded text-white py-2 my-2" style="background-color: #143D59">
					<input type="radio" class="form-check-input" id="materialGroupExample{{$choice->id}}" name="groupOfMaterialRadios">
					<label class="form-check-label" for="materialGroupExample{{$choice->id}}"> {{$choice->choice}} </label>
				</div>

				@endforeach
			</div>
			{{-- <button class="button" id="shuffle">Shuffle</button> --}}
		</div>
		@endforeach
		
	</div>

</div>

@endsection

@section('script')
<script type="text/javascript">

	$.fn.shuffleChildren = function() {
		$.each(this.get(), function(index, el) {
			var $el = $(el);
			var $find = $el.children();

			$find.sort(function() {
				return 0.5 - Math.random();
			});

			$el.empty();
			$find.appendTo($el);
		});
	};

// 	$("#shuffle").click(function() { // Usage with Click
// // Usage
// $(".shuffle").shuffleChildren();
// });

$(".shuffle").shuffleChildren();
</script>
@endsection