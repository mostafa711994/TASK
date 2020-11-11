@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>name</th>
                                    <th>email</th>
                                    <th>Action</th>


                                </tr>
                                </thead>

                            </table>

                            @include('editModal')
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('js')
            <script>
                $(document).ready(function () {


                    var table = $('#dataTable').DataTable({


                        processing: true,
                        serverSide: true,
                        ajax: "{{ route('home') }}",
                        columns: [

                            {data: 'id', name: 'id'},
                            {data: 'name', name: 'name'},
                            {data: 'email', name: 'email'},
                            {data: 'action', name: 'action', orderable: false, searchable: false},

                        ],


                    });

                    //Get user's data into the modal
                    table.on('click', '#edit-user', function (e) {
                        e.preventDefault();

                        var id = $(this).data('id');
                        $.get('edit/' + id, function (data) {
                            $("#editModal").modal("show");
                            $('#id').val(data.data.id);
                            $('#name').val(data.data.name);
                            $('#email').val(data.data.email);

                        })


                    });


                    //Update user data
                    $("#submit").click(function (e) {
                        e.preventDefault();

                        var id = $("#id").val();
                        var name = $('#name').val();
                        var email = $("#email").val();
                        var el = $(this).closest("tr");

                        $.ajax({
                            url: "/update/" + id,
                            type: "POST",
                            data: {"_token": "{{ csrf_token() }}", id: id, name: name, email: email},
                            success: function (res) {
                                console.log(res);
                                $("#editModal").modal("hide");
                                window.location.reload();

                            },
                            error: function (xhr) {
                                $('#validation').html('');
                                $.each(xhr.responseJSON.errors, function (key, value) {
                                    $('#validation').append('<div class="alert alert-danger">' + value + '</div>');
                                });
                            },

                        })

                    });


                    // Delete user
                    table.on('click', '#delete-user', function (e) {
                        e.preventDefault();
                        var id = $(this).data("id");
                        var token = $("meta[name='csrf-token']").attr("content");

                        var el = $(this).closest("tr");

                        $.ajax({
                            url: "/delete/" + id,
                            type: "GET",
                            data: {id: id, "_token": token},

                            success: function (res) {
                                el.remove();
                                console.log(res);

                            }
                        })
                    });

                });
            </script>


@endsection
