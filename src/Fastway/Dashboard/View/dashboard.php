<?php $this->layout('template', ['title' => 'Dashboard']) ?>

<div id="welcome">
    <h1 class="display-5 fw-bold">Dashboard</h1>
    <p class="col-md-8 fs-4">Welcome, Track and Trace a Parcel. Get a Quote for Sending a Parcel<?= $this->e($name) ?></p>
</div>

<div id="loading" class="d-none">
    <div class="d-flex justify-content-center">
        <div class="spinner-border m-5" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
</div>

<div id="resultsParcelQuote" class="d-none">
    <h1 class="display-5 fw-bold">Quote for Sending a Parcel</h1>
    <main>
        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">Free</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">$0<small class="text-body-secondary fw-light">/mo</small></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>10 users included</li>
                            <li>2 GB of storage</li>
                            <li>Email support</li>
                            <li>Help center access</li>
                        </ul> <button type="button" class="w-100 btn btn-lg btn-outline-primary">Sign up for free</button>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">Pro</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">$15<small class="text-body-secondary fw-light">/mo</small></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>20 users included</li>
                            <li>10 GB of storage</li>
                            <li>Priority email support</li>
                            <li>Help center access</li>
                        </ul> <button type="button" class="w-100 btn btn-lg btn-primary">Get started</button>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm border-primary">
                    <div class="card-header py-3 text-bg-primary border-primary">
                        <h4 class="my-0 fw-normal">Enterprise</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">$29<small class="text-body-secondary fw-light">/mo</small></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>30 users included</li>
                            <li>15 GB of storage</li>
                            <li>Phone and email support</li>
                            <li>Help center access</li>
                        </ul> <button type="button" class="w-100 btn btn-lg btn-primary">Contact us</button>
                    </div>
                </div>
            </div>
        </div>
        <h2 class="display-6 text-center mb-4">Compare plans</h2>
        <div class="table-responsive">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th style="width: 34%;"></th>
                        <th style="width: 22%;">Free</th>
                        <th style="width: 22%;">Pro</th>
                        <th style="width: 22%;">Enterprise</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row" class="text-start">Public</th>
                        <td><svg class="bi" width="24" height="24" role="img" aria-label="Included">
                                <use xlink:href="#check"></use>
                            </svg></td>
                        <td><svg class="bi" width="24" height="24" role="img" aria-label="Included">
                                <use xlink:href="#check"></use>
                            </svg></td>
                        <td><svg class="bi" width="24" height="24" role="img" aria-label="Included">
                                <use xlink:href="#check"></use>
                            </svg></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-start">Private</th>
                        <td></td>
                        <td><svg class="bi" width="24" height="24" role="img" aria-label="Included">
                                <use xlink:href="#check"></use>
                            </svg></td>
                        <td><svg class="bi" width="24" height="24" role="img" aria-label="Included">
                                <use xlink:href="#check"></use>
                            </svg></td>
                    </tr>
                </tbody>
                <tbody>
                    <tr>
                        <th scope="row" class="text-start">Permissions</th>
                        <td><svg class="bi" width="24" height="24" role="img" aria-label="Included">
                                <use xlink:href="#check"></use>
                            </svg></td>
                        <td><svg class="bi" width="24" height="24" role="img" aria-label="Included">
                                <use xlink:href="#check"></use>
                            </svg></td>
                        <td><svg class="bi" width="24" height="24" role="img" aria-label="Included">
                                <use xlink:href="#check"></use>
                            </svg></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-start">Sharing</th>
                        <td></td>
                        <td><svg class="bi" width="24" height="24" role="img" aria-label="Included">
                                <use xlink:href="#check"></use>
                            </svg></td>
                        <td><svg class="bi" width="24" height="24" role="img" aria-label="Included">
                                <use xlink:href="#check"></use>
                            </svg></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-start">Unlimited members</th>
                        <td></td>
                        <td><svg class="bi" width="24" height="24" role="img" aria-label="Included">
                                <use xlink:href="#check"></use>
                            </svg></td>
                        <td><svg class="bi" width="24" height="24" role="img" aria-label="Included">
                                <use xlink:href="#check"></use>
                            </svg></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-start">Extra security</th>
                        <td></td>
                        <td></td>
                        <td><svg class="bi" width="24" height="24" role="img" aria-label="Included">
                                <use xlink:href="#check"></use>
                            </svg></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>

</div>

<div id="resultsParcelTracking" class="d-none">
    <h1 class="display-5 fw-bold">Track and Trace a Parcel</h1>
    <p class="col-md-8 fs-4">Welcome, Track and Trace a Parcel. Get a Quote for Sending a Parcel<?= $this->e($name) ?></p>
</div>

<script>
    function isLoading(isDone) {
        if (isDone) {
            document.querySelector('#loading').classList.add('d-none');
        } else {
            const resultsParcelTracking = document.querySelector('#resultsParcelTracking');
            const resultsParcelQuote = document.querySelector('#resultsParcelQuote');
            const welcome = document.querySelector('#welcome');
            !resultsParcelTracking.classList.contains('d-none') ? resultsParcelTracking.classList.add('d-none') : null;
            !resultsParcelQuote.classList.contains('d-none') ? resultsParcelQuote.classList.add('d-none') : null;
            !welcome.classList.contains('d-none') ? welcome.classList.add('d-none') : null;
            document.querySelector('#loading').classList.remove('d-none');
        }
    }

    async function getParcelTrackingDetails() {
        isLoading(false);
        const input = document.querySelector('#trackingNumber').value;
        const data = await fetch('/api/parcel-tracking', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                trackingNumber: input
            })
        });
        const results = await data.json();
        isLoading(true);
        document.querySelector('#resultsParcelTracking').classList.remove('d-none');
        console.log(results);
    }

    async function getParcelQuote() {
        isLoading(false);
        const destinationSuburb = document.querySelector('#destinationSuburb').value;
        const postalCode = document.querySelector('#postalCode').value;
        const parcelWeight = document.querySelector('#parcelWeight').value;
        const data = await fetch('/api/parcel-quote', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                drop_off: destinationSuburb,
                postal_code: postalCode,
                parcel_weight: parcelWeight,
            })
        });
        const results = await data.json();
        isLoading(true);
        document.querySelector('#resultsParcelQuote').classList.remove('d-none');
        console.log(results);
    }
</script>