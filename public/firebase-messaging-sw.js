// public/firebase-messaging-sw.js

importScripts("https://www.gstatic.com/firebasejs/10.8.0/firebase-app.js");
importScripts("https://www.gstatic.com/firebasejs/10.8.0/firebase-messaging.js");

firebase.initializeApp({
  apiKey: "AIzaSyBkqobkKtvkC84Df9pHYkDPCIjAE90H0_I",
  authDomain: "sistem-44a01.firebaseapp.com",
  projectId: "sistem-44a01",
  storageBucket: "sistem-44a01.appspot.com",
  messagingSenderId: "422372955347",
  appId: "1:422372955347:web:7cbdd97c13aba63bd47026",
  measurementId: "G-RHPHKGXL3R"
});

const messaging = firebase.messaging();

messaging.onBackgroundMessage(function (payload) {
  console.log('[firebase-messaging-sw.js] Received background message ', payload);
  const notificationTitle = payload.notification.title;
  const notificationOptions = {
    body: payload.notification.body,
    icon: '/favicon.ico'
  };

  self.registration.showNotification(notificationTitle, notificationOptions);
});
