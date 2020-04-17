@extends('panel.layout.app')

@section('content')

<!--Main layout-->
<main class="pt-5 mx-lg-5">
  <div class="container-fluid mt-5">

    <!-- Heading -->
    <div class="card mb-4 wow fadeIn">

      <!--Card content-->
      <div class="card-body">

        <div class="row">

          <div class="col-md-12 my-auto">
            <h4 class="mb-2 mb-sm-0 pt-1">
              <a href="#" target="_blank">Home Page / Questions</a>
              <span>/</span>
              <span>Edit</span>
            </h4>
          </div>

        </div>
      </div>
    </div>

    <!-- Form -->
    <form action="{{ route('question.update', $question->id) }}" method="POST">
      @csrf
      @method('PUT')
      <!-- Question -->
      <div class="md-form">
        <input type="text" id="form1" class="form-control" name="question" value="{{$question->question}}">
        <label for="form1">Question</label>
      </div>
      <div class="md-form">
        <input type="text" id="form1" class="form-control" name="answer" value="{{$question->correct_choice}}">
        <label for="form1">Answer</label>
      </div>

      <select id="book_id" class="browser-default custom-select md-form productcategory" name="book">
        <option disabled selected>{{$question->book->name}} </option>

        @foreach ($books as $book)
        <option value="{{$book->id}}">{{$book->name}}</option>
        @endforeach

      </select>

      <!-- Test Number -->
      <select class="browser-default custom-select md-form productname" name="number">
        <option value="0" disabled selected>{{$question->test->name}}</option>

      </select>

      <button type="submit" class="btn btn-success">Create</button>

    </form>
    <!-- Form -->
  </div>
</main>

@endsection

@section('script')

<script>
  // Material Select Initialization
  $(document).ready(function() {
    $('.mdb-select').materialSelect();
  });
</script>

<script type="text/javascript">
	$(document).ready(function(){

		$(document).on('change','.productcategory',function(){
			// console.log("hmm its change");

			var cat_id=$(this).val();
			// console.log(cat_id);
			var div=$(this).parent();

			var op=" ";

			$.ajax({
				type:'get',
				url:'{{ URL::route('question.ajax') }}',
				data:{'id':cat_id},
				success:function(data){
					//console.log('success');

					//console.log(data);

					//console.log(data.length);
					op+='<option value="0" selected disabled>Current Test: {{$question->test_id}} | Please Choose Test</option>';
					for(var i=0;i<data.length;i++){
					op+='<option value="'+data[i].id+'">'+data[i].name+'</option>';
				   }

				   div.find('.productname').html(" ");
				   div.find('.productname').append(op);
				},
				error:function(){

				}
			});
		});

	});
</script>


@endsection



