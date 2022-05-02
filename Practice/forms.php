<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>fomstest</title>
  </head>
  <body>


    <form action="complet.php" method="post">

      <input class="btn-check " type="radio" name="robotChoice" value="doctors" id="card4">
      <label class="btn btn-outline-info btn-outline-light d-flex align-items-center justify-content-center text-nowrap border border-5 rounded-0 text-bold" for="card4" style="height: 400px; width: 400px;" >
        <div class="row row-cols-2">

            <div class="col-12 " >
              <i class="material-icons md-large ">medication</i>
            </div>
            <div class="col-12 ">
              <span style="font-size: 300%;">DOCTORS</span>
            </div>

          </div>
      </label>

      <input class="btn-check " type="radio" name="robotChoice" value="school" id="card5">
      <label class="btn btn-outline-info btn-outline-light d-flex align-items-center justify-content-center text-nowrap border border-5 rounded-0 text-bold" for="card5" style="height: 400px; width: 400px;" >
        <div class="row row-cols-2">

            <div class="col-12 " >
              <i class="material-icons md-large ">directions_bus_filled</i>
            </div>
            <div class="col-12 ">
              <span style="font-size: 300%;">SCHOOL TRIP</span>
            </div>

          </div>
      </label>

  <button type="submit" value="Submit"> submit </button>
</form>


  </body>
</html>
