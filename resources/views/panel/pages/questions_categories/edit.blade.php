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
              <a href="#" target="_blank">Home Page / Tests</a>
              <span>/</span>
              <span>Edit</span>
            </h4>
          </div>

        </div>
      </div>
    </div>

    <!-- Form -->
    <form action="{{ route('questions.categories.update', $question_categories->id)}}" method="POST">
      @csrf
      @method('PUT')
      <!-- Question -->
      <div class="md-form">
        <input type="text" id="form1" class="form-control" name="test_name" value="{{$question_categories->name}}">
        <label for="form1">Test Name</label>
      </div>

      <select class="mdb-select md-form" name="book">

        <option disabled selected>{{$question_categories->book->name}}</option>

        @foreach ($books as $book)
        <option value="{{$book->id}}">{{$book->name}}</option>
        @endforeach

      </select>

      <button type="submit" class="btn btn-success">Update</button>

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
@endsection
