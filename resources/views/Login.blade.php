@if (session('success'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK'
            });
        });
    </script>
@endif
@if (session('error'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                icon: 'error',
                title: 'Login Failed',
                text: '{{ session('error') }}',
                confirmButtonText: 'Try Again'
            });
        });
    </script>
@endif
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../img/apple-icon.png">
    <link rel="icon" type="image/png" href="../img/favicon.png">
    <title>
        JB Pay
    </title>
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <link href="../css/nucleo-icons.css" rel="stylesheet" />
    <link href="../css/nucleo-svg.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link id="pagestyle" href="../css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>

</head>

<body class="bg-gray-200">
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-100"
            style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container my-auto">
                <div class="row">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-secondary shadow-primary border-radius-lg py-3 pe-1">
                                    <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign in</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="/login" method="POST" role="form" class="text-start">
                                    @csrf
                                    <div class="input-group input-group-outline my-3">
                                        <input required autocomplete="off" name="Email" type="email"
                                            class="form-control" placeholder="Email...">
                                    </div>
                                    <div class="input-group input-group-outline mb-3">
                                        <input placeholder="Password" id="password" required autocomplete="off"
                                            name="password" type="password" class="form-control">
                                        <!-- <img id="iconpw" style="max-height: 50px;" src="assets/img/team-1.jpg" alt=""> -->
                                        <i class="ms-2 mt-2 material-icons opacity-10" id="iconpw">visibility</i>
                                    </div>
                                    <div class="form-check form-switch d-flex align-items-center mb-3">
                                        <input class="form-check-input" type="checkbox" id="rememberMe">
                                        <label class="form-check-label mb-0 ms-3" for="rememberMe">Remember me</label>
                                    </div>
                                    <div class="text-center">
                                        <button name="login" type="submit"
                                            class="btn bg-gradient-dark w-100 my-4 mb-2">Sign
                                            in</button>
                                    </div>
                                    <p class="mt-4 text-sm text-center">
                                        Don't have an account?
                                        <a href="/register" class="text-primary text-gradient font-weight-bold">Sign
                                            up</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer position-absolute bottom-2 py-2 w-100">
                <div class="container">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-12 col-md-6 my-auto">
                            <div class="copyright text-center text-sm text-white text-lg-start">
                                ©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>,
                                made with <i class="fa fa-heart" aria-hidden="true"></i> by
                                <a href="https://gungnanda.com" class="font-weight-bold text-white"
                                    target="_blank">gungnanda</a>
                                for a better web.
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </main>
    <!--   Core JS Files   -->
    <script src="../js/core/popper.min.js"></script>
    <script src="../js/core/bootstrap.min.js"></script>
    <script src="../js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <script>
        let iconpw = document.getElementById("iconpw");
        let password = document.getElementById("password");
        iconpw.onclick = function() {
            if (password.type == "password") {
                password.type = "text";
                iconpw.innerHTML = "visibility_off"
            } else {
                password.type = "password"
                iconpw.innerHTML = "visibility"
            }
        }
    </script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="../js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>
