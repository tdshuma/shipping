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

<div id="contentHolder" class="d-none"></div>

<template id="error">
    <h1 class="display-5 fw-bold">Opps! An error has occured</h1>
    <p class="col-md-8 fs-4 text-danger">{{message}}</p>
</template>

<template id="parcelQuoteTemplate" class="d-none">
    <h1 class="display-5 fw-bold">Quote for Sending a Parcel</h1>
    <p class="col-md-8 fs-4">{{ pickfranchise }} ({{pickfranchise_code}}) - TO - {{delfranchise}} ({{delfranchise_code}})</p>
    <p class="col-md-8 fs-4">{{parcel_weight_kg}} KG</p>
    <p class="col-md-8 fs-4">Pick franchise phone number {{pickfranchise_phone_number}}</p>
    <main>
        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
            {{#services}}
                <div class="col">
                    <div class="card mb-4 rounded-3 shadow-sm border-primary">
                        <div class="card-header py-3 text-bg-primary border-primary">
                            <h4 class="my-0 fw-normal">{{name}}</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">{{currency_symbol}}{{totalprice_normal}}</h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>{{baseweight}} Base weight</li>
                                <li>{{weightlimit}} Weight limit</li>
                                <li>R{{totalprice_frequent}} frequent price</li>
                            </ul>
                        </div>
                    </div>
                </div>
            {{/services}}
        </div>
        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
            {{#cheapest_service}}
                <div class="col">
                    <div class="card mb-4 rounded-3 shadow-sm border-success">
                        <div class="card-header py-3 text-bg-success border-success">
                            <h4 class="my-0 fw-normal">{{name}}</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">{{currency_symbol}}{{totalprice_normal}}</h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>Cheapest service</li>
                                <li>{{baseweight}} Base weight</li>
                                <li>{{weightlimit}} Weight limit</li>
                                <li>R{{totalprice_frequent}} frequent price</li>
                            </ul>
                        </div>
                    </div>
                </div>
            {{/cheapest_service}}
        </div>
        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
            {{#additional_services}}
                <div class="col">
                    <div class="card mb-4 rounded-3 shadow-sm">
                        <div class="card-header py-3">
                            <h4 class="my-0 fw-normal">{{name}}</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">{{currency_symbol}}{{totalprice_normal}}</h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>{{baseweight}} Base weight</li>
                                <li>{{weightlimit}} Weight limit</li>
                                <li>R{{totalprice_frequent}} frequent price</li>
                            </ul>
                        </div>
                    </div>
                </div>
            {{/additional_services}}
        </div>
    </main>
</template>

<template id="parcelTrackingTemplate" type="x-tmpl-mustache">
    <h1 class="display-5 fw-bold">Track and Trace a Parcel</h1>
    <p class="col-md-8 fs-4">{{ PickupFranchise }} ({{PickupFranchiseCode}}) - TO - {{DeliveryFranchise}} ({{DeliveryFranchiseCode}})</p>
    <p class="col-md-8 fs-4">{{LabelNumber}} ({{OriginalLabelNumber}})</p>
    Delivery ETA {{DeliveryETADate}}
    <div class="list-group">
        {{#Scans}}
            <div class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{Name}} ({{Franchise}})</h5>
                    <small>{{RealDateTime}}</small>
                </div>
                <p class="mb-1">{{StatusDescription}}</p>
                <small>{{Description}} - {{Status}}</small>
            </div>
        {{/Scans}}
    </div>
</template>

<script>
    function isLoading(isDone) {
        window.scrollTo({
            top: 0,
            left: 0,
            behavior: 'smooth'
        });

        if (isDone) {
            document.querySelector('#loading').classList.add('d-none');
            document.querySelector('#contentHolder').classList.remove('d-none');
        } else {
            const contentHolder = document.querySelector('#contentHolder');
            const welcome = document.querySelector('#welcome');
            !contentHolder.classList.contains('d-none') ? contentHolder.classList.add('d-none') : null;
            !welcome.classList.contains('d-none') ? welcome.classList.add('d-none') : null;
            document.querySelector('#loading').classList.remove('d-none');
        }
    }

    async function getParcelTrackingDetails() {
        const input = document.querySelector('#trackingNumber');
        if (input.value == '') {
            input.classList.add('is-invalid');
        } else {
            input.classList.remove('is-invalid');
            isLoading(false);
            const data = await fetch('/api/parcel-tracking', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    trackingNumber: input.value
                })
            });
            let results = await data.json();
            isLoading(true);
            let template = null;
            if (Object.keys(results).indexOf('message') > -1) {
                template = document.getElementById('error').innerHTML;
            } else {
                results = results[0];
                template = document.getElementById('parcelTrackingTemplate').innerHTML;
            }
            document.getElementById('contentHolder').innerHTML = Mustache.render(template, results);
        }
    }

    async function getParcelQuote() {
        const destinationSuburb = document.querySelector('#destinationSuburb');
        const postalCode = document.querySelector('#postalCode');
        const parcelWeight = document.querySelector('#parcelWeight');

        let isValid = true;
        if (destinationSuburb.value == '') {
            destinationSuburb.classList.add('is-invalid');
            isValid = false;
        } else {
            destinationSuburb.classList.remove('is-invalid');
        }

        if (postalCode.value == '') {
            postalCode.classList.add('is-invalid');
            isValid = false;
        } else {
            postalCode.classList.remove('is-invalid');
        }

        if (parcelWeight.value == '') {
            parcelWeight.classList.add('is-invalid');
            isValid = false;
        } else {
            parcelWeight.classList.remove('is-invalid');
        }

        if (isValid) {
            isLoading(false);
            const data = await fetch('/api/parcel-quote', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    drop_off: destinationSuburb.value,
                    postal_code: postalCode.value,
                    parcel_weight: parcelWeight.value,
                })
            });
            const results = await data.json();
            isLoading(true);
            let template = null;
            if (Object.keys(results).indexOf('message') > -1) {
                template = document.getElementById('error').innerHTML;
            } else {
                results = results[0];
                template = document.getElementById('parcelQuoteTemplate').innerHTML;
            }
            document.getElementById('contentHolder').innerHTML = Mustache.render(template, results);
        }

    }
</script>