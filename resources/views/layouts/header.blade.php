<header>
  <div class="logo">
    <a href="{{ route('dashboard') }}">
      <i class="fa-solid fa-graduation-cap"></i> university portal
    </a>
  </div>

  <input type="checkbox" id="navToggle" class="nav-toggle-checkbox">
  <label for="navToggle" class="nav-toggle-label">
    <i class="fa-solid fa-bars"></i>
  </label>

  <nav>
    <div class="nav-links">
      <a href="{{ route('dashboard') }}">
        <i class="fa-solid fa-chart-column"></i> Dashboard
      </a>

      <a href="{{ route('departments.index') }}">
        <i class="fa-regular fa-building"></i> Departments
      </a>

      <a href="{{ route('students.index') }}">
        <i class="fa-solid fa-user-graduate"></i> Students
      </a>

      <a href="{{ route('courses.index') }}">
        <i class="fa-solid fa-book"></i> Courses
      </a>

      <a href="{{ route('professors.index') }}">
        <i class="fa-solid fa-person-chalkboard"></i> Professors
      </a>

      <a href="{{ route('enrollments.index') }}">
        <i class="fa-solid fa-users"></i> Enrollments
      </a>
    </div>

    <div class="profile-dropdown">
      <input type="checkbox" id="profileToggle">

      <label for="profileToggle">
        <i class="fa-regular fa-circle-user"></i>
        <i class="fa-solid fa-angle-down" style="margin-left: 6px;"></i>
      </label>

      <div class="profile-menu">
        <a href="profile-page.html">
          <i class="fa-regular fa-circle-user"></i> Profile
        </a>

        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit">
            <i class="fa-solid fa-right-from-bracket"></i> Logout
          </button>
        </form>
      </div>
    </div>
  </nav>
</header>