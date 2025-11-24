@extends('layouts.app')
@section('content')
<div class="container">
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        General Setting
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                    <div class="accordion-body">
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label for="{{ $settings['site_title'] }}">Site Title</label>
                                <input type="text" class="form-control" value="{{ $settings['site_title'] }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="{{ $settings['site_tagline'] }}">Site Tagline</label>
                                <input type="text" class="form-control" value="{{ $settings['site_tagline'] }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="{{ $settings['site_description'] }}">Site Description</label>
                                <textarea class="form-control" name="site_description">{{ $settings['site_description'] }}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="{{ $settings['site_logo'] }}">Site Logo</label>
                                <input type="file" class="form-control" value="{{ $settings['site_logo'] }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="{{ $settings['site_favicon'] }}">Site Favicon</label>
                                <input type="file" class="form-control" value="{{ $settings['site_favicon'] }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="{{ $settings['site_footer_text'] }}">Footer text</label>
                                <textarea class="form-control" name="site_footer_text">{{ $settings['site_footer_text'] }}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="{{ $settings['google_analytics_id'] }}">Google Analytics</label>
                                <input type="text" class="form-control" value="{{ $settings['google_analytics_id'] }}">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Contact
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample" style="">
                    <div class="accordion-body">
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label for="{{ $settings['contact_email'] }}">Email</label>
                                <input type="text" class="form-control" value="{{ $settings['contact_email'] }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="{{ $settings['contact_phone'] }}">Phone</label>
                                <input type="text" class="form-control" value="{{ $settings['contact_phone'] }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="{{ $settings['contact_address'] }}">Address</label>
                                <input type="text" class="form-control" value="{{ $settings['contact_address'] }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="{{ $settings['contact_maps'] }}">Maps</label>
                                <input type="text" class="form-control" value="{{ $settings['contact_maps'] }}">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Social Media
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label for="{{ $settings['social_facebook'] }}">Facebook</label>
                                <input type="text" class="form-control" value="{{ $settings['social_facebook'] }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="{{ $settings['social_twitter'] }}">Twitter x X</label>
                                <input type="text" class="form-control" value="{{ $settings['social_twitter'] }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="{{ $settings['social_instagram'] }}">Instagram</label>
                                <input type="text" class="form-control" value="{{ $settings['social_instagram'] }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="{{ $settings['social_youtube'] }}">YouTube</label>
                                <input type="text" class="form-control" value="{{ $settings['social_youtube'] }}">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        SEO Setting
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label for="{{ $settings['seo_keywords'] }}">SEO Keywords</label>
                                <input type="text" class="form-control" value="{{ $settings['seo_keywords'] }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="{{ $settings['seo_author'] }}">SEO Author </label>
                                <input type="text" class="form-control" value="{{ $settings['seo_author'] }}">
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>








        <div class="d-flex justify-content-end mt-3">
            <button type="submit" class="btn btn-primary mx-2">Update</button>
            <button type="submit" class="btn btn-secondary">Cancel</button>
        </div>

    </form>


</div>
@endsection