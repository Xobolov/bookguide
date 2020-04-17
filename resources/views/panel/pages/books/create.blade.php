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
              <a href="#" target="_blank">Home Page / Books</a>
              <span>/</span>
              <span>Create</span>
            </h4>
          </div>        

        </div>
      </div>
    </div>

    <!-- Form -->
    <form action="{{ route('book.store')}}" method="POST" enctype= multipart/form-data>
        @csrf
      <div class="input-group">
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" name="image">
          <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
        </div>
      </div>

      <div class="md-form">
        <textarea name="words" class="form-control rounded-0" id="exampleFormControlTextarea1" rows="10"></textarea>
        @if ($errors->has('words'))
						<span class="help-block">
							<strong>{{ $errors->first('words') }}</strong>
						</span>
						@endif
      </div>

      <!-- Name -->
      <div class="md-form">
        <input type="text" id="form1" class="form-control" name="name">
        <label for="form1">Name</label>
      </div>

      <!-- Author -->
      <div class="md-form">
        <input type="text" id="form2" class="form-control" name="author">
        <label for="form2">Author</label>
      </div>

      <button class="btn btn-success">Create</button>

    </form>
    <!-- Form -->
  </div>
</main>
<!--Main layout-->
<script src="//cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>

<script>
  CKEDITOR.replace('words');
</script>

@endsection

@section('script')

@endsection