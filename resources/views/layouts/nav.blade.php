<section>
    <button aria-controls="sidebar" data-bs-toggle="offcanvas" data-bs-target=".sidebar" aria-label="Button Hamburger"
        class="sidebarOffcanvas mb-5 btn p-0 border-0 d-flex d-lg-none">
        <i class="fa-solid fa-bars"></i>
    </button>
    <nav class="nav-content gap-5">
        <div class="d-flex gap-3 align-items-center">
            <img src="{{ Storage::url(auth()->user()->photo) }}" alt="Photo Profile" class="photo-profile" />
            <div>
                <p class="title-content mb-2">Selamat datang, <b>{{ Auth::user()->name }}</b></p>
                <p class="subtitle-content">
                    Lengkapi profil kamu.
                    <a href="{{ route('profile.edit') }}" class="btn-link">Edit sekarang</a>
                </p>
            </div>
        </div>
    </nav>
</section>