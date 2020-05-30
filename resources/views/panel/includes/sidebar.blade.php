<!-- Sidebar -->
<div class="sidebar-fixed position-fixed">

  <a class="logo-wrapper waves-effect">
    <img src="#" class="img-fluid mx-auto" alt="This is image">
  </a>

  <div class="list-group list-group-flush">

    <a href="{{ route('pages.dashboard') }}"
       class="list-group-item {{'pages.dashboard' == Request::route()->getName() ? 'active' : 'list-group-item-action'}} waves-effect">
      <i class="fas fa-chart-pie mr-3"></i>Dashboard
    </a>

    <a href="{{ route('pages.books') }}"
       class="list-group-item {{'pages.books' == Request::route()->getName() ? 'active' : 'list-group-item-action'}} waves-effect">
      <i class="far fa-book"></i>
      Books & Words
    </a>

    <a href="{{ route('questions.categories')}}" class="list-group-item {{'questions.categories' == Request::route()->getName() ? 'active' : 'list-group-item-action'}} waves-effect">
      <i class="far fa-scroll"></i>
      Tests
    </a>

    <a href="{{ route('pages.questions') }}" class="list-group-item {{'pages.questions' == Request::route()->getName() ? 'active' : 'list-group-item-action'}} waves-effect">
      <i class="far fa-map-marker-question"></i>
      Question
    </a>

    <a href="{{ route('page.choices') }}" class="list-group-item {{'page.choices' == Request::route()->getName() ? 'active' : 'list-group-item-action'}} waves-effect">
      <i class="far fa-ballot-check"></i>
        Misleading Choices
    </a>

  </div>
  <!-- Sidebar -->
@section('script')

@endsection
