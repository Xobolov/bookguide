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
              <a href="#" target="_blank">Home Page / Choices</a>
              <span>/</span>
              <span>Create</span>
            </h4>
          </div>

        </div>
      </div>
    </div>

    <!-- Form -->
    <form action="{{ route('choice.store')}}" method="POST">
      @csrf
      @method('PUT')
      <!-- Question -->
      <div class="md-form">
        <input type="text" id="form1" class="form-control" name="choice">
        <label for="form1">Choice</label>
      </div>

      <select class="mdb-select md-form" name="test_id">

        <option disabled selected>Which Book to Test</option>

        @foreach ($tests as $test)
        <option value="{{$test->id}}">{{$test->book->name}} <--> {{$test->name}}</option>
        @endforeach

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
@endsection
