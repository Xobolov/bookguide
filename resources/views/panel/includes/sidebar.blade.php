<!-- Sidebar -->
<div class="sidebar-fixed position-fixed">

  <a class="logo-wrapper waves-effect">
    <img src="https://i.hizliresim.com/XMbRQj.jpg" class="img-fluid mx-auto" alt="">
  </a>

  <div class="list-group list-group-flush">

    <a href="{{ route('pages.dashboard') }}" class="list-group-item active waves-effect">
      <i class="fas fa-chart-pie mr-3"></i>Dashboard
    </a>

    <a href="{{ route('pages.books') }}" class="list-group-item list-group-item-action waves-effect">
      <i class="far fa-book"></i>
      Books & Words
    </a>

    <a href="{{ route('questions.categories')}}" class="list-group-item list-group-item-action waves-effect">
      <i class="far fa-scroll"></i>
      Tests
    </a>

    <a href="{{ route('pages.questions') }}" class="list-group-item list-group-item-action waves-effect">
      <i class="far fa-map-marker-question"></i>
      Question
    </a>

    <a href="{{ route('page.choices') }}" class="list-group-item list-group-item-action waves-effect">
      <i class="far fa-ballot-check"></i>
      Choices
    </a>

  </div>
  <!-- Sidebar -->
