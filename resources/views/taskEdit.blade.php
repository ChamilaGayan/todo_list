@extends('layouts.app')

@section('content')
        <div class="page-wrapper doctris-theme toggled">

        <!-- sidebar-start -->
         @include('layouts.sidebar')
         <!-- sidebar-end  -->

            <!-- Start Page Content -->
            <main class="page-content bg-light">

            <!-- navbar-start -->
            @include('layouts.navbar')
            <!-- navbar-end  -->

                <div class="container-fluid">
                    <div class="layout-specing">
                        <div class="row">
                            <div class="col-xl-9 col-lg-6 col-md-4">
                                <h5 class="mb-0">Task</h5>
                                <nav aria-label="breadcrumb" class="d-inline-block mt-2">
                                    <ul class="breadcrumb breadcrumb-muted bg-transparent rounded mb-0 p-0">
                                        <li class="breadcrumb-item">Home</li>
                                        <li class="breadcrumb-item active" aria-current="page">Task</li>
                                    </ul>
                                </nav>

                            <div class="col-xl-3 col-lg-6 col-md-8 mt-4 mt-md-0">
                                <div class="justify-content-md-end">
                                    <form action="" name="13" method="post" class="signin-form" enctype="multipart/form-data">
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-sm-12 col-md-5">
                                                <div class="mb-0 position-relative">
                                                </div>
                                            </div><!--end col-->
                                        </div><!--end row-->
                                    </form><!--end form-->
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->

                        <div class="row">
                            <div class="col-12 mt-4">

                                    <form action="{{ route('task.update',  $task->id) }}" method="POST">
                                        @csrf
                                            <div class="modal-content">
                                                <div class="modal-header border-bottom p-3">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Task</h5>
                                                </div>
                                                <div class="modal-body p-3 pt-4">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="mb-3">
                                                                </div>
                                                            </div><!--end col-->

                                                            <div class="col-lg-12 col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Task</label>
                                                                    <input name="task" type="text" class="form-control" value="{{ $task->task }}">
                                                                </div>
                                                            </div><!--end col-->

                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Due date : </label>
                                                                    <input name="duedate" type="date" class="form-control" required>
                                                                </div>
                                                            </div><!--end col-->

                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="input-time">Due time : </label>
                                                                    <input name="duetime" type="time" class="form-control timepicker" id="input-time" required>
                                                                </div>
                                                            </div><!--end col-->


                                                            <div class="col-lg-3">
                                                                <div class="d-grid">
                                                                    <button type="submit" name="submit" class="btn btn-success">Edit</button>
                                                                </div>
                                                            </div><!--end col-->
                                                        </div><!--end row-->
                                                </div>
                                            </div>


                                    </form>












                            </div>
                        </div><!--end row-->
                    </div>
                </div><!--end container-->

                 <!-- Footer Start -->
                 @include('layouts.footer')
                 <!--end footer-->

            </main>
            <!--End page-content" -->
        </div>
        <!-- page-wrapper -->

        {{-- edit model  --}}



        <!-- javascript -->
        <script src='{{ asset("assets/libs/simplebar/simplebar.min.js']")}}'></script>
        <script src="{{ asset('assets/libs/js-datepicker/datepicker.min.js')}}"></script>
        <script src="{{ asset('assets/libs/feather-icons/feather.min.js')}}"></script>
        <!-- Main Js -->
        <!-- JAVASCRIPT -->
        <script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset('assets/js/plugins.init.js')}}"></script>
        <script src="{{ asset('assets/js/app.js')}}"></script>

        <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>

        @endsection
