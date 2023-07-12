<x-app-layout>

    <x-slot name="title">{{ __('Edit Agenda') }}</x-slot>

    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center gap-3">
            <h4 class="title-section-content">{{ __('Edit Agenda') }}</h4>
        </div>
    </x-slot>

    <div class="d-flex flex-column">
        <div class="store-card">
            <form action="{{ route('admin.agenda.update',$agenda) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="form-label" for="title">Nama Acara</label>
                    <input type="text" class="form-control" name="title" value="{{ old('title') ?? $agenda->title }}"
                        required autofocus>
                    @error('title')
                    <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label" for="slug">Slug</label>
                    <input type="text" class="form-control" name="slug" value="{{ old('slug') ?? $agenda->slug }}"
                        required>
                    @error('slug')
                    <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label" for="deskripsi_acara">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi_acara"
                        rows="3">{{old('deskripsi_acara') ?? $agenda->deskripsi_acara}}</textarea>
                    @error('deskripsi_acara')
                    <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label" for="lokasi_acara">Lokasi Acara</label>
                    <textarea class="form-control" name="lokasi_acara"
                        rows="2">{{old('lokasi_acara')??$agenda->lokasi_acara}}</textarea>
                    @error('lokasi_acara')
                    <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label" for="waktu_acara">Waktu Acara <span class="text-danger">*</span></label>
                    <input type="datetime-local" class="flatpickr form-control" placeholder="Pilih Waktu..."
                        name="waktu_acara" id="waktu_acara" value="{{ old('waktu_acara') ?? $agenda->waktu_acara }}">
                    @error('waktu_acara')
                    <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label" for="pejabats">Pejabat yang Hadir <span
                            class="text-danger">*</span></label>
                    <select name="pejabats[]" class="form-control form-select" multiple>
                        @foreach ($pejabats as $pejabat)
                        <option value="{{ $pejabat->id }}">{{ $pejabat->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label" for="liputans">Petugas Liputan <span class="text-danger">*</span></label>
                    <select name="liputans[]" class="form-control form-select" multiple>
                        @foreach ($liputans as $liputan)
                        <option value="{{ $liputan->id }}">{{ $liputan->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label" for="protokols">Petugas Protokol <span
                            class="text-danger">*</span></label>
                    <select name="protokols[]" class="form-control form-select" multiple>
                        @foreach ($protokols as $protokol)
                        <option value="{{ $protokol->id }}">{{ $protokol->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex align-items-center">
                    <button class="btn btn-success mr-4" type="submit">
                        {{ __('Update Agenda') }}</button>
                    <a href="{{ route('admin.agenda.index') }}"
                        class="btn btn-link text-dark fw-bold text-decoration-none">Back</a>

                </div>
            </form>
        </div>

    </div>

</x-app-layout>