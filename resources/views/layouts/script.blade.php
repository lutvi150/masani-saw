 <!-- jQuery -->
 <script src="{{ asset('assets/jquery/dist/jquery.min.js') }}"></script>
 <!-- Bootstrap -->
 <script src="{{ asset('assets/bootstrap/dist/js/bootstrap.min.js') }}"></script>
 <!-- NProgress -->
 <script src="{{ asset('assets/nprogress/nprogress.js') }}"></script>
 <!-- bootstrap-daterangepicker -->
 <script src="{{ asset('assets/moment/min/moment.min.js') }}"></script>

 <!-- Custom Theme Scripts -->
 <script src="{{ asset('assets/build/js/custom.min.js') }}"></script>
 <script src="{{ asset('assets/form-master/dist/jquery.form.min.js') }}"></script>
 <script src="{{ asset('assets/notiflix/build/notiflix-aio.js') }}"></script>
 <script>
     notif_success = (message) => {
         Notiflix.Report.success(
             'Berhasil',
             message,
             'Okay',
         );
     }

     notif_error = (message) => {
         Notiflix.Report.failure(
             'Gagal',
             message,
             'Okay',
         );
     }
 </script>
