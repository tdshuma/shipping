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
            <form id="parcel-quote-form" novalidate>
              <div class="mb-3">
                <label for="trackingNumber" class="form-label">Tracking numbers</label>
                <input type="text" class="form-control" id="trackingNumber" aria-describedby="trackingNumberValidationFeedback" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Tracking/Label number" required>
                <div id="trackingNumberValidationFeedback" class="invalid-feedback">
                  Please enter destination suburb.
                </div>
              </div>
              <button type="button" class="btn btn-primary" onclick="getParcelTrackingDetails()" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Get parcel tracking status">Track parcel</button>
            </form>
          </div>
        </div>
        <div class="col-md-6">
          <div class="h-100 p-5 bg-body-secondary rounded-3">
            <h2>Quote for Sending a Parcel</h2>
            <form id="parcel-quote-form" novalidate>
              <div class="mb-3">
                <label for="destinationSuburb" class="form-label">Destination suburb</label>
                <input data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Your parcel destination suburb e.g: Pretoria" type="text" class="form-control" id="destinationSuburb" aria-describedby="destinationSuburbValidationFeedback" required>
                <div class="invalid-feedback" id="destinationSuburbValidationFeedback">
                  Please enter destination suburb.
                </div>
              </div>
              <div class="mb-3">
                <label for="postalCode" class="form-label">Postal code</label>
                <input data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Your parce postal code. e.g: 0001" type="number" class="form-control" id="postalCode" aria-describedby="postalCodeValidationFeedback" required>
                <div class="invalid-feedback" id="postalCodeValidationFeedback">
                  Please enter postal code.
                </div>
              </div>
              <div class="mb-3">
                <label for="parcelWeight" class="form-label">Parcel weight (KG)</label>
                <input data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Your parcel weight. Maximum is 30KG" type="number" class="form-control" min="1" max="30" id="parcelWeight" aria-describedby="parcelWeightValidationFeedback" required>
                <div class="invalid-feedback" id="parcelWeightValidationFeedback">
                  Please enter parcel weight.
                </div>
              </div>
              <button type="button" onclick="getParcelQuote()" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Get a quote">Get a quote</button>
            </form>
          </div>
        </div>
      </div>
      <footer class="pt-3 mt-4 text-body-secondary border-top">
        &copy; <?= date('Y') ?> </footer>
    </div>
  </main>
  <script src="/js/bootstrap.bundle.min.js"></script>
  <script src="/js/mustache.min.js"></script>
  <script>
    // Initialize all tooltips on the page
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    })
  </script>
</body>

</html>