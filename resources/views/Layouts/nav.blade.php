
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="">Practice App</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
      <ul class="navbar-nav me-auto d-flex justify-content-center mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/employees">Employee</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/departments">Department</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Users
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/users/permission/index">Permission</a></li>
            <li><a class="dropdown-item" href="#">Role</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">User</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/validations/create">Validate</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <div class="d-flex justify-content-end">
        <a href="/dashboard" class="nav-link">Dashboard</a>
      </div>
    </div>
  </div>
</nav>