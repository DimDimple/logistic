<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<!-- Mirrored from themesdesign.in/medroc/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Aug 2022 04:24:12 GMT -->

<head>

    <meta charset="utf-8" />
    <title>DMgo</title>

    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->

    <link rel="icon" href="{{ asset('images/logo1removebg.png') }}" type="image/png" />

    {{-- <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}"> --}}


    <!-- jquery.vectormap css -->
    <link href={{ asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }} rel="stylesheet"
        type="text/css" />

    <!-- Bootstrap Css -->
    <link href={{ asset('assets/css/bootstrap.min.css') }} id="bootstrap-style" rel="stylesheet" type="text/css"
        type="text/css" />
    <!-- Icons Css -->
    <link href={{ asset('assets/css/icons.min.css') }} rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href={{ asset('assets/css/app.min.css') }} id="app-style" rel="stylesheet" type="text/css" />

</head>

<body data-topbar="light">

    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        @include('backend.manager.layouts.header')



        <!-- ========== Left Sidebar Start ========== -->
        @include('backend.manager.layouts.leftMenu')
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
                        We make it by <i class="mdi mdi-heart text-danger"></i> by <a href="http://dmgo.express/manager"
                            target="_blank">DimMeyDesign</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    {{-- <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> © Medroc.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Crafted with <i class="mdi mdi-heart text-danger"></i> by <a
                            href="https://1.envato.market/themesdesign" target="_blank">Themesdesign</a>
                    </div>
                </div>
            </div>
        </div>
    </footer> --}}

    </div>
    <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->


    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->

    <script src={{ asset('assets/libs/jquery/jquery.min.js') }}></script>
    <script src={{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}></script>
    <script src={{ asset('assets/libs/metismenu/metisMenu.min.js') }}></script>
    <script src={{ asset('assets/libs/simplebar/simplebar.min.js') }}></script>
    <script src={{ asset('assets/libs/node-waves/waves.min.js') }}></script>

    <!-- apexcharts -->
    {{-- <script src={{ asset('assets/libs/apexcharts/apexcharts.min.js') }}></script> --}}

    <!-- jquery.vectormap map -->
    <script src={{ asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}></script>
    <script src={{ asset('assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js') }}></script>

    {{-- <script src={{ asset('assets/js/pages/dashboard.init.js') }}></script> --}}

    <!-- App js -->
    <script src={{ asset('assets/js/app.js') }}></script>

    {{-- Sweet Alert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>


    <script type="text/javascript">
        $('.show-alert-delete-box').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            const swal = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger  m-3'
                },
                buttonsStyling: false
            })

            swal.fire({
                title: 'Are you sure?',
                text: 'This record and it`s details will be permanantly deleted!',
                imageUrl: 'https://img.freepik.com/free-vector/thoughtful-people-making-difficult-choice-two-options-isolated-flat-illustration_74855-11083.jpg?w=1380&t=st=1662450177~exp=1662450777~hmac=b9bcee078055976cec8b9800bdf37d69c08255c04679be55af34c37c087d4dff',
                footer: 'If you delete it this record will gone forever.',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                    form.submit();

                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swal.fire(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                    )
                }
            })
        })
    </script>

    
    {{-- <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr ").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script> --}}
    <!-- display Calendar, date, time-->
    <script>
        function refreshTime() {
            const timeDisplay = document.getElementById("time");
            const dateString = new Date().toLocaleString();
            const formattedString = dateString.replace(", ", " - ");
            timeDisplay.textContent = formattedString;
        }
        setInterval(refreshTime, 1000);
    </script>

    <!-- show alert -->
    <script>
        $(document).ready(function() {
            // show the alert
            $(".alert").fadeTo(4000, 500).slideUp(500, function() {
                $(".alert").alert('close');
            });
        });
    </script>
</body>


<!-- Mirrored from themesdesign.in/medroc/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Aug 2022 04:24:37 GMT -->

</html>
