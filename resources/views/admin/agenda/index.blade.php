<x-app-layout>

    <x-slot name="title">{{ __('Agenda') }}</x-slot>

    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center gap-3">
            <h4 class="title-section-content">{{ __('Agenda') }}</h4>
        </div>
    </x-slot>

    <div class="d-flex flex-column">
        <div class="product-card">
            <div class="mb-4">
                <a href="{{ route('admin.agenda.create') }}" class="btn btn-success">Tambah Agenda</a>
            </div>

            <div class="table-agenda">
                <table class="table table-bordered agenda">
                    <thead>
                        <tr>
                            <th width="40" class="text-center">#</th>
                            <th>Nama Acara</th>
                            <th>Pejabat</th>
                            <th>Petugas Liputan</th>
                            <th>Petugas Protokol</th>
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
          
          var table = $('.agenda').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('admin.agenda.index') }}",
              columns: [
                  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                  
                  {data: 'title', name: 'title'},
                  {data: 'pejabats[, ].name', name: 'pejabats'},
                  {data: 'liputans[, ].name', name: 'liputans'},
                  {data: 'protokols[, ].name', name: 'protokols'},

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