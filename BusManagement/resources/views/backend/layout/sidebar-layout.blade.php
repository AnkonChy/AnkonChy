<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
      <div>
        <h4 class="logo-text">PROJECT</h4>
      </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
      <li>
        <a href="">
          <div class="parent-icon">
            <ion-icon name="home-outline"></ion-icon>
          </div>
          <div class="menu-title">Dashboard</div>
        </a>
      </li>
      <li>
        <a href="#">
          <div class="parent-icon">
            <ion-icon name="person-circle-outline"></ion-icon>
          </div>
          <div class="menu-title">User Profile</div>
        </a>
      </li>
      <li class="menu-label">Pages</li>
      <li>
        <a class="has-arrow" href="{{ route('location.page') }}">
          <div class="parent-icon">
            <ion-icon name="home-outline"></ion-icon>
          </div>
          <div class="menu-title">Location</div>
        </a>
      </li>
      <li>
        <a class="has-arrow" href="{{ route('bus.page') }}">
          <div class="parent-icon">
            <ion-icon name="home-outline"></ion-icon>
          </div>
          <div class="menu-title">Bus</div>
        </a>
      </li>
      <li>
        <a class="has-arrow" href="{{ route('fare.page') }}">
          <div class="parent-icon">
            <ion-icon name="home-outline"></ion-icon>
          </div>
          <div class="menu-title">Fare</div>
        </a>
      </li>
      <li>
        <a class="has-arrow" href="{{route('trip.page')}}">
          <div class="parent-icon">
            <ion-icon name="home-outline"></ion-icon>
          </div>
          <div class="menu-title">Trip</div>
        </a>
      </li>
    </ul>
    <!--end navigation-->
  </aside>