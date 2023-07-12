<x-app-layout>

    <x-slot name="title">{{ __('Jabatan') }}</x-slot>

    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center gap-3">
            <h4 class="title-section-content">{{ __('Jabatan') }}</h4>
        </div>
    </x-slot>

    <div class="d-flex flex-column">
        <div class="store-card">
            <div class="mb-4">
                <a href="{{ route('admin.jabatan.create') }}" class="btn btn-success">Tambah Jabatan</a>
            </div>

            <div class="table-jabatan">
                <table class="table table-bordered jabatan">
                    <thead>
                        <tr>
                            <th width="40" class="text-center">#</th>
                            <th>Nama Jabatan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <x-slot name="styles">
        <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
    </x-slot>

    <x-slot name="scripts">
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
        <script type="text/javascript">
            $(function () {
          
          var table = $('.jabatan').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('admin.jabatan.index') }}",
              columns: [
                  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                  {data: 'name', name: 'name'},
                  {
                      data: 'action', 
                      name: 'action', 
                      orderable: true, 
                      searchable: true
                  },
              ]
          });
          
        });
        </script>
    </x-slot>

</x-app-layout>