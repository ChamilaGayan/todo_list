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
                            {{-- succsess alert --}}
                            @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" style="width: 400px" role="alert">{{ session('status') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            </div><!--end col-->

                            <div class="col-xl-3 col-lg-6 col-md-8 mt-4 mt-md-0">
                                <div class="justify-content-md-end">
                                    <form action="" name="13" method="post" class="signin-form" enctype="multipart/form-data">
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-sm-12 col-md-5">
                                                <div class="mb-0 position-relative">
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-sm-12 col-md-7 mt-4 mt-sm-0">
                                                <div class="d-grid">
                                                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#taskform">New Task</a>
                                                </div>
                                            </div><!--end col-->
                                        </div><!--end row-->
                                    </form><!--end form-->
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->

                        <div class="row">
                            <div class="col-12 mt-4">
                                <div class="table-responsive bg-white shadow rounded">
                                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                                        <thead class="thead-light">
                                          <tr>
                                            <th>#</th>
                                            <th>Task</th>
                                            <th>Status</th>
                                            <th>date</th>
                                            <th>time</th>
                                            <th>Actions</th>
                                          </tr>
                                        </thead>

                                        <tbody>

                                            @foreach ($tasks as $task )
                                            @if (auth()->user()->id == $task->user_id)
                                            <tr>
                                                <td>{{ $task->id }}</td>
                                                <td>{{ $task->task }}</td>
                                                <td>{{ $task->status }}</td>
                                                <td>{{ $task->duedate }}</td>
                                                <td>{{ $task->duetime }}</td>
                                                <td class="align-middle">
                                                    @if ($task->status == 0)
                                                    <a href="{{ route ('task.view', $task->id) }}" class="btn btn-icon btn-pills btn-soft-primary"><i class="uil uil-pen"></i></a>
                                                    <a href="{{ route ('task.confirm', $task->id) }}" class="btn btn-icon btn-pills btn-soft-success" onClick="return confirm('Confirm task ?')"><i class="uil uil-check"></i></a>
                                                    <a href="{{ route ('task.delete', $task->id) }}" class="btn btn-icon btn-pills btn-soft-danger" onClick="return confirm('Are you sure you want to delete the task ?')"><i class="uil uil-times"></i></a>
                                                    @else
                                                    <span class="badge bg-soft-success">Complete</span>
                                                    @endif
                                                  </td>
                                              </tr>
                                            @endif

                                          @endforeach

                                        </tbody>
                                      </table>
                                </div>
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

        {{-- new task model  --}}
        <form action="{{ route('add.task') }}" method="POST">
            @csrf
        <div class="modal fade" id="taskform" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header border-bottom p-3">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Task</h5>
                        <button type="button" class="btn btn-icon btn-close" data-bs-dismiss="modal" id="close-modal"><i class="uil uil-times fs-4 text-dark"></i></button>
                    </div>
                    <div class="modal-body p-3 pt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                    </div>
                                </div><!--end col-->

                                <div class="col-lg-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">New task </label>
                                        <input name="task" type="text" class="form-control" placeholder="New task...." required>
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
                                        <button type="submit" name="submit" class="btn btn-primary">Add</button>
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                    </div>
                </div>
            </div>
        </div>
        </form>




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
