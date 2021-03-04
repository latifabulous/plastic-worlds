<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="<?= base_url('assets/img/logo.png') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?= $judul ?> | Plastic World</title>

    <style>
    .navbar {
        padding: 0 16px !important;
    }

    .dropdown-menu {
        font-size: 0.85rem !important;
        padding: 13px 0 !important;
    }

    .dropdown-menu {
        min-width: 8rem !important;
    }

    .jenis-artikel {
        bottom: 303px !important;
    }
    </style>

    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">

    <script src="<?= base_url('assets/'); ?>sweetalert/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>sweetalert/sweetalert2.min.css">

    <script src="http://maps.googleapis.com/maps/api/js"></script>


    <script>
    function initialize() {
        var propertiPeta = {
            center: new google.maps.LatLng(-8.5830695, 116.3202515),
            zoom: 9,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);

        // membuat Marker
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(-8.5830695, 116.3202515),
            map: peta
        });

    }

    // // event jendela di-load  
    google.maps.event.addDomListener(window, 'load', initialize);

    // function initMap() {

    //         // membuat objek untuk titik koordinat
    //         var lombok = {lat: -8.5830695, lng: 116.3202515};

    //         // membuat objek peta
    //         var map = new google.maps.Map(document.getElementById('map'), {
    //           zoom: 9,
    //           center: lombok
    //         });

    //         // mebuat konten untuk info window
    //         var contentString = '<h2>Hello Dunia!</h2>';

    //         // membuat objek info window
    //         var infowindow = new google.maps.InfoWindow({
    //           content: contentString,
    //           position: lombok
    //         });

    //         // membuat marker
    //         var marker = new google.maps.Marker({
    //           position: lombok,
    //           map: map,
    //           title: 'Pulau Lombok'
    //         });

    //         // event saat marker diklik
    //         marker.addListener('click', function() {
    //           // tampilkan info window di atas marker
    //           infowindow.open(map, marker);
    //         });

    //       }
    </script>

</head>

<body>