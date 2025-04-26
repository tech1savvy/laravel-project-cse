<div class="container-fluid footer bg-dark wow fadeIn" data-wow-delay=".3s">
    <div class="container pt-5 pb-4">
        <div class="row g-5 justify-content-end">
            <div class="col-lg-3 col-md-6 order-lg-2 ms-auto">
                <a href="#" class="h3 text-secondary"></a>
                <div class="mt-4 d-flex flex-column align-items-end short-link">
                    <a href="" class="mb-2 text-white">About us</a>
                    <a href="" class="mb-2 text-white">Contact us</a>
                    <a href="" class="mb-2 text-white">Our Services</a>
                    <a href="" class="mb-2 text-white">Our Projects</a>
                    <a href="" class="mb-2 text-white">Latest Blog</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 order-lg-1">
                <a href="{{ url('/') }}">
                    <h1 class="text-white fw-bold d-block">High<span class="text-secondary">Tech</span></h1>
                </a>
                <p class="mt-4 text-light">Empowering businesses with innovative technology solutions and trusted expertise.</p>
                <div class="d-flex hightech-link">
                    <a href="" class="btn-light nav-fill btn btn-square rounded-circle me-2"><i class="fab fa-facebook-f text-primary"></i></a>
                    <a href="" class="btn-light nav-fill btn btn-square rounded-circle me-2"><i class="fab fa-twitter text-primary"></i></a>
                    <a href="" class="btn-light nav-fill btn btn-square rounded-circle me-2"><i class="fab fa-instagram text-primary"></i></a>
                    <a href="" class="btn-light nav-fill btn btn-square rounded-circle me-0"><i class="fab fa-linkedin-in text-primary"></i></a>
                </div>
            </div>
            <!-- Other footer sections go here -->
        </div>
        <hr class="text-light mt-5 mb-4">
        <div class="row">
            <div class="col-md-6 text-center text-md-start">
                <span class="text-light"><a href="#" class="text-secondary">© HighTech</a></span>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <span class="text-light"><a href="{{ route('admin.adminLogin') }}" class="text-secondary">Admin</a></span>
            </div>
        </div>
    </div>
</div>
