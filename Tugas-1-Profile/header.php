<div id="carouselExampleAutoplaying"
     class="carousel slide carousel-fade"
     data-bs-ride="carousel"
     data-bs-interval="3000">

  <!-- indicator -->
  <div class="carousel-indicators">

    <button type="button"
            data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide-to="0"
            class="active"
            aria-current="true">
    </button>

    <button type="button"
            data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide-to="1">
    </button>

    <button type="button"
            data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide-to="2">
    </button>

  </div>

  <!-- isi carousel -->
  <div class="carousel-inner rounded-4 overflow-hidden shadow">

    <!-- slide 1 -->
    <div class="carousel-item active">

      <img
        src="img/pt1.jpg"
        class="d-block w-100 img-fluid"
        style="
          width:100%;
          height:60vh;
          min-height:250px;
          max-height:700px;
          object-fit:cover;
        "
        alt="Slide 1">

    </div>

    <!-- slide 2 -->
    <div class="carousel-item">

      <img
        src="img/pt2.jpg"
        class="d-block w-100 img-fluid"
        style="
          width:100%;
          height:60vh;
          min-height:250px;
          max-height:700px;
          object-fit:cover;
        "
        alt="Slide 2">

    </div>

    <!-- slide 3 -->
    <div class="carousel-item">

      <img
        src="img/pt3.jpg"
        class="d-block w-100 img-fluid"
        style="
          width:100%;
          height:60vh;
          min-height:250px;
          max-height:700px;
          object-fit:cover;
        "
        alt="Slide 3">

    </div>

  </div>

  <!-- tombol prev -->
  <button
    class="carousel-control-prev"
    type="button"
    data-bs-target="#carouselExampleAutoplaying"
    data-bs-slide="prev">

    <span class="carousel-control-prev-icon"></span>

  </button>

  <!-- tombol next -->
  <button
    class="carousel-control-next"
    type="button"
    data-bs-target="#carouselExampleAutoplaying"
    data-bs-slide="next">

    <span class="carousel-control-next-icon"></span>

  </button>

</div>