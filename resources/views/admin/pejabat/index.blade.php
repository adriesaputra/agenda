<x-app-layout>

    <x-slot name="title">{{ __('Pejabat') }}</x-slot>

    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center gap-3">
            <h4 class="title-section-content">{{ __('Pejabat') }}</h4>
        </div>
    </x-slot>

    <div class="d-flex flex-column">
        <div class="product-card">
            <div class="mb-4">
                <a href="{{ route('admin.jabatan.create') }}" class="btn btn-danger me-3">Tambah Jabatan</a>
                <a href="{{ route('admin.pejabat.create') }}" class="btn btn-success">Tambah Pejabat</a>
            </div>

            <div class="table-pejabat">
                <table class="table table-bordered pejabat">
                    <thead>
                        <tr>
                            <th width="40" class="text-center">#</th>
                            <th>Foto</th>
                            <th>Nama Pejabat</th>
                            <th>Jabatan</th>
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
          
          var table = $('.pejabat').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('admin.pejabat.index') }}",
              columns: [
                  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                  {data: 'photo', name: 'photo',
                        render: function(data, type, full, meta) {
                            return "<img src=\"../../storage/" + data + "\" height=\"40\"/>";
                        }
                 },
                  {data: 'name', name: 'name'},
                  {data: 'jabatan.name', name: 'jabatan.name'},
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