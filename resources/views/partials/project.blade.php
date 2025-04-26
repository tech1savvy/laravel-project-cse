
    

    <!-- Project Start -->
    <div class="container-fluid project py-5 my-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                <h5 class="text-primary">Our Project</h5>
                <h1>Our Recently Completed Projects</h1>
            </div>
            <div class="row g-5">
                @foreach($projects as $project)
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".3s">
                    <div class="project-item">
                        <div class="project-img">
                            <img src="{{ asset($project->image_path) }}" class="img-fluid w-100 rounded" alt="{{ $project->title }}">
                            <div class="project-content">
                                <div class="text-center">
                                    <h4 class="text-secondary">{{ $project->title }}</h4>
                                    <p class="m-0 text-black">{{ $project->short_description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Project End -->

