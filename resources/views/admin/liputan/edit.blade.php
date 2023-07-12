<x-app-layout>

    <x-slot name="title">{{ __('Edit Petugas Liputan') }}</x-slot>

    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center gap-3">
            <h4 class="title-section-content">{{ __('Edit Petugas Liputan') }}</h4>
        </div>
    </x-slot>

    <div class="d-flex flex-column">
        <div class="store-card">
            <form action="{{ route('admin.liputan.update',$liputan) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="form-label" for="name">Nama Petugas</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') ?? $liputan->name }}"
                        required autofocus>
                    @error('name')
                    <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label" for="jenis_liputan">Jenis Liputan</label>
                    <select name="jenis_liputan" id="jenis_liputan" class="form-control form-select">
                        <option value="Foto" @if(old('jenis_liputan', $liputan->jenis_liputan) == 'Foto') selected
                            @endif>Foto</option>
                        <option value="Video" @if(old('jenis_liputan', $liputan->jenis_liputan) == 'Video') selected
                            @endif>Video</option>
                    </select>
                    @error('jenis_liputan')
                    <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label" for="photo">{{ __('Upload Photo') }}</label>
                    <input id="photo" class="form-control" type="file" name="photo" />
                    @error('photo')
                    <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex align-items-center">
                    <button class="btn btn-success mr-4" type="submit">
                        {{ __('Update Petugas Liputan') }}</button>
                    <a href="{{ route('admin.liputan.index') }}"
                        class="btn btn-link text-dark fw-bold text-decoration-none">Back</a>

                </div>
            </form>
        </div>

    </div>

</x-app-layout>