<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<!-- Mirrored from themesdesign.in/medroc/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Aug 2022 04:24:12 GMT -->

<head>

    <meta charset="utf-8" />
    <title>DMgo</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="icon" href="{{ asset('images/logo1removebg.png') }}" type="image/png" />
    <!-- jquery.vectormap css -->
    <link href={{ asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }} rel="stylesheet"
        type="text/css" />

    <!-- Bootstrap Css -->
    <link href={{ asset('assets/css/bootstrap.min.css') }} id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href={{ asset('assets/css/icons.min.css') }} rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href={{ asset('assets/css/app.min.css') }} id="app-style" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

    <!--Edit and changepwd-->
    <link rel="stylesheet" href={{ asset('css/backend/editprofile.css') }}>
    <link rel="stylesheet" href={{ asset('css/backend/profile.css') }}>


    <!-- alert message -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0- 
     alpha/css/bootstrap.css"
        rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


</head>

<body data-topbar="light">

    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        @include('backend.admin.layouts.header')

        <!-- ========== Left Sidebar Start ========== -->
        @include('backend.admin.layouts.leftMenu')
        <!-- Left Sidebar End -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>




    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> ©Dmgo Express, All Rights Reserved.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        We make it by <i class="mdi mdi-heart text-danger"></i> by <a
                            href="http://logistic.cc/admin/dashboard" target="_blank">DimMeyDesign</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    </div>
    <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->


    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <!-- Alert message-->
    <script>
        @if (Session::has('message'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('message') }}");
        @endif

        @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('error') }}");
        @endif

        @if (Session::has('info'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.info("{{ session('info') }}");
        @endif

        @if (Session::has('warning'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.warning("{{ session('warning') }}");
        @endif
    </script>
    <!--get value when we complete form user and send to summary.-->
    <script>
        function getInputValue() {
            // Selecting the input element and get its value
            let inputVal = document.getElementsByClassName("inputId")[0].value;
            // Displaying the value
            alert(inputVal);
        }
    </script>

    <script src={{ asset('assets/libs/jquery/jquery.min.js') }}></script>
    <script src={{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}></script>
    <script src={{ asset('assets/libs/metismenu/metisMenu.min.js') }}></script>
    <script src={{ asset('assets/libs/simplebar/simplebar.min.js') }}></script>
    <script src={{ asset('assets/libs/node-waves/waves.min.js') }}></script>

    {{-- datatable search --}}
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <!-- apexcharts -->
    <script src={{ asset('assets/libs/apexcharts/apexcharts.min.js') }}></script>

    <!-- jquery.vectormap map -->
    <script src={{ asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}></script>
    <script src={{ asset('assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js') }}></script>

    <script src={{ asset('assets/js/pages/dashboard.init.js') }}></script>

    <!-- App js -->
    <script src={{ asset('assets/js/app.js') }}></script>

    <!-- show alert -->
    <script>
        $(document).ready(function() {
            // show the alert
            $(".alert").fadeTo(4000, 500).slideUp(500, function() {
                $(".alert").alert('close');
            });
        });
    </script>

    {{-- js calendar,date,time, --}}
    <script>
        function refreshTime() {
            const timeDisplay = document.getElementById("time");
            const dateString = new Date().toLocaleString();
            const formattedString = dateString.replace(", ", " - ");
            timeDisplay.textContent = formattedString;
        }
        setInterval(refreshTime, 1000);
    </script>
    {{-- //search --}}
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

    {{-- toggle open password --}}
    <script>
        var password = document.getElementById("password");
        const toggle_password = document.querySelector('#toggle_password');
        const toggle_password2 = document.querySelector('#toggle_password2');

        function genPassword() {
            var chars = "0123456789abcdefghijklmnopqrstuvwxyz!@$ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            var passwordLength = 8;
            var password = "";
            for (var i = 0; i <= passwordLength; i++) {
                var randomNumber = Math.floor(Math.random() * chars.length);
                password += chars.substring(randomNumber, randomNumber + 1);
            }
            document.getElementById("password").value = password;
        }

        function copyPassword() {
            var copyText = document.getElementById("password");
            copyText.select();
            document.execCommand("copy");
        }

        // Show password
        toggle_password.addEventListener("click", function() {

            // toggle the icon
            this.classList.toggle("bi-eye-fill");
        });

        toggle_password2.addEventListener("click", function() {

            this.classList.toggle("bi-eye-fill");
        });

        function showPassword(idclick) {
            const password = document.querySelector('#' + idclick);
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);

        }
    </script>

</body>


<!-- Mirrored from themesdesign.in/medroc/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Aug 2022 04:24:37 GMT -->

</html>
