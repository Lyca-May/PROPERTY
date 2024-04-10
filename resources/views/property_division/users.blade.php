<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PROPERTY AND SUPPLIES</title>

<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css">

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- DataTables JavaScript -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            @include('navbar')
            @include('sidebar')

            <div class="main-content">
                <section class="section">
                    <h1 class="section-header">
                        <div class="col-md-12 d-flex justify-content-between align-items-center">
                            <div>Users | Overview</div>

                            <button class="btn btn-primary float-right">
                                ADD USER
                            </button>
                        </div>
                    </h1>
                    <div class="row">
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <ul class="nav nav-pills" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab3" data-toggle="tab"
                                                    href="#home3" role="tab" aria-controls="home"
                                                    aria-selected="true">ORD</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3"
                                                    role="tab" aria-controls="profile"
                                                    aria-selected="false">FMRED</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#contact3"
                                                    role="tab" aria-controls="contact"
                                                    aria-selected="false">ACCOUNTING</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#contact3"
                                                    role="tab" aria-controls="contact"
                                                    aria-selected="false">FPSSD</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#contact3"
                                                    role="tab" aria-controls="contact"
                                                    aria-selected="false">RFTFCD</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#contact3"
                                                    role="tab" aria-controls="contact"
                                                    aria-selected="false">PROPERTY UNIT</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#contact3"
                                                    role="tab" aria-controls="contact"
                                                    aria-selected="false">RECORDS</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#contact3"
                                                    role="tab" aria-controls="contact"
                                                    aria-selected="false">CASHIER</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#contact3"
                                                    role="tab" aria-controls="contact" aria-selected="false">HR</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#contact3"
                                                    role="tab" aria-controls="contact"
                                                    aria-selected="false">FIMC</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="contact-tab3" data-toggle="tab"
                                                    href="#contact3" role="tab" aria-controls="contact"
                                                    aria-selected="false">PLANNING</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="contact-tab3" data-toggle="tab"
                                                    href="#contact3" role="tab" aria-controls="contact"
                                                    aria-selected="false">GSUS</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-content" id="myTabContent">
                                {{-- <div class="tab-pane fade show active" id="home3" role="tabpanel"
                                    aria-labelledby="home-tab3">
                                    <hr>
                                    <br>
                                    <div class="row card-row">
                                        <table id="myTable" class="display">
                                            <thead>
                                                <tr>
                                                    <th>Column 1</th>
                                                    <th>Column 2</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Row 1 Data 1</td>
                                                    <td>Row 1 Data 2</td>
                                                </tr>
                                                <tr>
                                                    <td>Row 2 Data 1</td>
                                                    <td>Row 2 Data 2</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div> --}}
                                <div class="tab-pane fade" id="profile3" role="tabpanel"
                                    aria-labelledby="profile-tab3">
                                    Sed sed metus vel lacus hendrerit tempus. Sed efficitur velit tortor, ac efficitur
                                    est lobortis
                                    quis. Nullam lacinia metus erat, sed fermentum justo rutrum ultrices. Proin quis
                                    iaculis tellus.
                                    Etiam ac vehicula eros, pharetra consectetur dui.
                                </div>
                                <div class="tab-pane fade" id="contact3" role="tabpanel"
                                    aria-labelledby="contact-tab3">
                                    Vestibulum imperdiet odio sed neque ultricies, ut dapibus mi maximus. Proin ligula
                                    massa,
                                    gravida in lacinia efficitur, hendrerit eget mauris. Pellentesque fermentum, sem
                                    interdum
                                    molestie finibus, nulla diam varius leo, nec varius lectus elit id dolor.
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
            </section>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                background: '#8cc63f',
                iconColor: '#ffffff',
                customClass: {
                    title: 'text-white',
                    content: 'text-white'
                }
            });
        </script>
    @endif

    @if (session('failed'))
        <script>
            Swal.fire({
                icon: 'failed',
                title: 'failed!',
                text: '{{ session('failed') }}',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                background: '#dc3545',
                iconColor: '#ffffff',
                customClass: {
                    title: 'text-white',
                    content: 'text-white'
                }
            });
        </script>
    @endif


    <script>
        $(document).ready(function ()){
          $('#myTable').DataTable();
        })
    </script>
</body>

</html>
