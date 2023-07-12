<x-app-layout>

    <x-slot name="title">{{ __('Edit Pejabat') }}</x-slot>

    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center gap-3">
            <h4 class="title-section-content">{{ __('Edit Pejabat') }}</h4>
        </div>
    </x-slot>

    <div class="d-flex flex-column">
        <div class="store-card">
            <form action="{{ route('admin.pejabat.update',$pejabat) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="form-label" for="name">Nama Pejabat</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') ?? $pejabat->name }}"
                        required autofocus>
                    @error('name')
                    <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label" for="jabatan">{{ __('Nama Jabatan') }}</label>
                    <select class="form-select jabatan mb-3" name="jabatan_id" id="jabatan_id" required>
                        <option value="{{ $pejabat->jabatan_id }}" selected>
                            {{ $pejabat->jabatan->name }}</option>

                        @foreach ($jabatan as $jabatan)
                        <option value="{{ $jabatan->id }}">{{ $jabatan->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('jabatan_id')
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
                        {{ __('Update Pejabat') }}</button>
                    <a href="{{ route('admin.pejabat.index') }}"
                        class="btn btn-link text-dark fw-bold text-decoration-none">Back</a>

                </div>
            </form>
        </div>

    </div>

</x-app-layout>