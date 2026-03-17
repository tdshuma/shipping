<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="/css/bootstrap.min.css" rel="stylesheet">
  <!-- <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon.ico"> -->
  <title><?= $this->e($title) ?></title>
</head>

<body>

  <main>
    <div class="container py-4">
      <div class="p-5 mb-4 bg-body-tertiary rounded-3">
        <div class="container-fluid py-5">
          <?= $this->section('content') ?>
        </div>
      </div>
      <div class="row align-items-md-stretch">
        <div class="col-md-6">
          <div class="h-100 p-5 text-bg-light rounded-3">
            <h2>Track and Trace a Parcel</h2>
            <form>
              <div class="mb-3">
                <label for="trackingNumber" class="form-label">Tracking numbers</label>
                <input type="text" class="form-control" id="trackingNumber">
              </div>
              <button type="button" class="btn btn-primary" onclick="getParcelTrackingDetails()">Submit</button>
            </form>
          </div>
        </div>
        <div class="col-md-6">
          <div class="h-100 p-5 bg-body-secondary rounded-3">
            <h2>Quote for Sending a Parcel</h2>
            <form>
              <div class="mb-3">
                <label for="destinationSuburb" class="form-label">Destination suburb</label>
                <input type="text" class="form-control" id="destinationSuburb">
              </div>
              <div class="mb-3">
                <label for="postalCode" class="form-label">Postal code</label>
                <input type="text" class="form-control" id="postalCode">
              </div>
              <div class="mb-3">
                <label for="parcelWeight" class="form-label">Parcel weight</label>
                <input type="text" class="form-control" id="parcelWeight">
              </div>
              <button type="button" onclick="getParcelQuote()" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
      <footer class="pt-3 mt-4 text-body-secondary border-top">
        &copy; 2025 </footer>
    </div>
  </main>

</body>

</html>