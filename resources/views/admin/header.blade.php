<head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />
{{-- {{asset('assets/vendor/css/core.css')}} --}}
    <!-- Page CSS -->

<!-- Firebase SDK -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/firebase/10.0.0/firebase-app-compat.min.js" integrity="sha512-QxCI6n9lTLJpOHQcpZV2klXd5DhqSrGGe1rU2Cbr9+uCTNozkfbs/w5LVrk/pIgJwd1sFaKtvWGqw3EBtguHcA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/firebase/10.0.0/firebase-messaging-compat.min.js" integrity="sha512-S1ikyG/9rWv+KJjbwHJGTKeYYnmVJxcvgQOBztLUPsRY4ZoSmPK+b8jTiDrt4lSP5SlpkpEQCbhwWQJK+kx7jQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Konfigurasi & inisialisasi -->
<script>
  const firebaseConfig = {
    apiKey: "AIzaSyBkqobkKtvkC84Df9pHYkDPCIjAE90H0_I",
    authDomain: "sistem-44a01.firebaseapp.com",
    projectId: "sistem-44a01",
    storageBucket: "sistem-44a01.firebasestorage.app",
    messagingSenderId: "422372955347",
    appId: "1:422372955347:web:7cbdd97c13aba63bd47026",
    measurementId: "G-RHPHKGXL3R"
  };

  // Pastikan firebase sudah tersedia sebelum dipakai
  // Inisialisasi Firebase
  firebase.initializeApp(firebaseConfig);
  const messaging = firebase.messaging();

  // Tampilkan prompt notifikasi berdasarkan status izin
  window.onload = function () {
    if (Notification.permission === 'default') {
      document.getElementById("notif-wrapper").classList.remove("d-none");
    } else if (Notification.permission === 'denied') {
      document.getElementById("notif-denied").classList.remove("d-none");
    }
  };

  // Fungsi minta izin notifikasi
  function mintaIzinNotifikasi() {
    Notification.requestPermission().then(function (permission) {
      if (permission === "granted") {
        messaging.getToken({ vapidKey: firebaseConfig.apiKey }).then((currentToken) => {
          console.log("FCM Token:", currentToken);
          alert("Notifikasi berhasil diaktifkan!");
          document.getElementById("notif-wrapper").classList.add("d-none");
        }).catch((err) => {
          console.warn("Gagal dapat token:", err);
        });
      } else {
        alert("Notifikasi tidak diizinkan 😥. Silakan aktifkan dari setting browser.");
        document.getElementById("notif-wrapper").classList.add("d-none");
        document.getElementById("notif-denied").classList.remove("d-none");
      }
    });
  }
</script>


    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
  </head>