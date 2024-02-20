<x-admin.header />
{{-- <x-admin.sidenav/> --}}
@section('content-header', 'Customer Management')

<a href="{{ route('admin.add_color') }}" class="btn btn-success"><i class="fas fa-plus"></i> Add New Color</a>

<link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">

<div class="card">
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($color as $colors)
                    <tr>
                        <td>{{ $colors->id }}</td>
                        {{-- <td></td> --}}

                        {{-- <td></td> --}}
                        <td>{{ $colors->color_name }} </td>




                        <td>{{ $colors->created_at }}</td>

                        <td>
                            <a href="{{ route('admin.color.edit', ['id' => $colors->id]) }}"
                                class="btn btn-primary"><i class="fas fa-edit"></i></a>
                            <button class="btn btn-danger btn-delete"
                                data-url="{{ route('admin.color.destroy', $colors->id) }}"><i
                                    class="fas fa-trash"></i></button>
                            {{-- <button class="btn btn-danger btn-delete" data-url=""><i
                                        class="fas fa-trash"></i></button> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $(document).on('click', '.btn-delete', function() {
            const $this = $(this);
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            });

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: 'Do you really want to delete this product?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    // Use GET request instead of POST
                    $.ajax({
                        url: $this.data('url'),
                        type: 'GET',
                        success: function(res) {
                            $this.closest('tr').fadeOut(500, function() {
                                $(this).remove();
                            });
                        },
                        error: function(xhr, status, error) {
                            // Handle error
                            console.error(error);
                        }
                    });
                }
            });
        });
    });
</script>
<x-admin.footer />
