<x-front-layout>
    <!-- content -->
    <section class="bg-primary text-light p-5">
        <div class="container">
            <form action="{{url('/store')}}" method="post">
                @csrf
            <div class="d-md-flex justify-content-between align-items-center">
                <div class="input-group  news-input">
                    <h3 class="mb-3 mb-md-0 text-warning px-5">Short Url</h3>
                    <input type="text" name="url"  placeholder="Enter Your URL Here" class="form-control @error('url') is-invalid @enderror"/>
                    <button type="submit" class="btn btn-dark">Shorten</button>
                    @error('url')
                    <h6 class='invalid-feedback text-warning text-center'>{{$message}}</h6>
                    @enderror
                </div>
              
            </div>
             </form>
        </div>
    </section>

    <!-- Boxes -->

    <section class="p-5">
        <div class="container">
            <div class="row text-center g-4">
                <div class="col-md-4 col-sm-12">
                    <div class="card bg-dark text-light">
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                                <i class="bi bi-laptop"></i>
                            </div>
                            <h3 class="card-title mb-3 text-warning">Short Link</h3>
                            <p class="card-text">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque libero illum, labore molestiae est tempore.
                            </p>
                            <a href="#" class="btn btn-primary">Read More</a>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-primary text-light">
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                                <i class="bi bi-laptop"></i>
                            </div>
                            <h3 class="card-title mb-3 text-warning">Short Link</h3>
                            <p class="card-text">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque libero illum, labore molestiae est tempore.
                            </p>
                            <a href="#" class="btn btn-warning">Read More</a>

                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="card bg-secondary text-light">
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                                <i class="bi bi-laptop"></i>
                            </div>
                            <h3 class="card-title mb-3 text-warning">Short Link</h3>
                            <p class="card-text">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque libero illum, labore molestiae est tempore.
                            </p>
                            <a href="#" class="btn btn-dark">Read More</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- learn -->

    <section id="about_us" class="p-5">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md p-5">
                    <h2>Learn Abuot Shorten</h2>
                    <p class="lead">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi voluptas iure repellendus voluptatem molestias fugit explicabo magni quam, cupiditate natus dolor quibusdam repudiandae a sunt ut nisi animi dolore nihil?
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente esse eligendi, placeat molestiae perferendis cupiditate excepturi laudantium velit quam dolore error distinctio voluptate beatae, quae repellendus impedit corrupti neque quod?
                    </p>
                    <a href="#" class="btn btn-light mt-3">
                        <i class="bi bi-chevron-right">Read More</i>
                    </a>
                </div>
                <div class="col-md">
                    <img src="{{asset('assets/img/sh.png')}}" class="img-fluid" alt="link">
                </div>
            </div>
        </div>
    </section>
</x-front-layout>