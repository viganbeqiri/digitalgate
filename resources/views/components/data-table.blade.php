<div>
    <div class="table-responsive">
        <table class="table" id="datatable">
            <thead>
                <tr>
                    @foreach ($columns as $column)
                        <th>{{ isset($column['th']) ? $column['th'] : str_replace('_', ' ', $column['name']) }}</th>
                    @endforeach
                </tr>
            </thead>
        </table>
    </div>
    @push('style')
        <link href="{{ asset('assets/vendors/general/datatable/jquery.dataTables.min.css') }}" rel="stylesheet">
        <style>
            table.dataTable thead>tr>th {
                text-transform: capitalize;
            }
        </style>
    @endpush
    @push('script')
        <script src="{{ asset('assets/vendors/general/datatable/datatables.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/general/datatable/dataTables.bootstrap4.min.js') }}"></script>
        <script>
            $(function() {
                //filter toggle
                $('#toggleSearchBar').click(function(e) {
                    e.preventDefault();
                    $('#toggleDatatableSearch').slideToggle();
                });
                //datatable config
                let datatable = $('#datatable').DataTable({
                    searching: false,
                    lengthChange: false,
                    processing: true,
                    serverSide: true,
                    pageLength: 25,
                    order: [
                        [0, 'desc']
                    ],
                    columnDefs: [{
                        orderable: false,
                        targets: -1
                    }],
                    ajax: {
                        url: '{{ $route }}',
                        data: function(e) {
                            var fields = $('#datatableSearch').serializeArray();
                            $.each(fields, function(i, field) {
                                e[field.name] = field.value;
                            });
                        }
                    },
                    columns: @json($columns),
                });
                $('#datatableSearch').submit(function(e) {
                    e.preventDefault();
                    datatable.draw();
                });
                $('#datatableSearch button[type=reset]').click(function(e) {
                    $('#datatableSearch').trigger('reset');
                    $('#datatable').DataTable().ajax.reload();
                });
            });
        </script>
    @endpush
</div>
