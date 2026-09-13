@extends('layouts.website')
@section('title', 'Contact')
@section('content')
    <!-- Page Title -->
        <section class="section-page-title text-center flat-spacing-2 pb-0">
            <div class="container">
                <div class="main-page-title">
                    <div class="breadcrumbs">
                        <a href="{{ route('web.home') }}" class="text-caption-01 cl-text-3 link">Home</a>
                        <i class="icon icon-CaretRightThin cl-text-3"></i>
                        <P class="text-caption-01">
                            Contact Us
                        </P>
                    </div>
                    <h3>
                        Contact Us
                    </h3>
                    <p class="text-body-1 cl-text-2">
                        Get in touch with us for inquiries, support, or collaboration we’re here to help you.
                    </p>
                </div>
            </div>
        </section>
        <!-- /Page Title -->
        <!-- Map -->
        <div class="section-map flat-spacing-2 pb-0">
            <div class="container">
                <div class="wg-map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7880.148272329334!2d151.20657421407668!3d-33.858885268389294!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b12ae682c546039%3A0x16da940d587922a1!2sCircular%20Quay!5e0!3m2!1sen!2s!4v1745205798630!5m2!1sen!2s"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
        <!-- /Map -->
    <!-- Contact -->
        <section class="section-contact flat-spacing">
            <div class="container">
                <div class="row gy-5 flex-wrap-reverse">
                    <div class="col-md-6">
                        <div class="col-left">
                            <div class="heading d-grid gap-8">
                                <h4>Information</h4>
                                <h5 class="d-none">Perfect Heading SEO</h5>
                                <p class="cl-text-2">
                                    Have a question? Please contact us using the customer support channels below.
                                </p>
                            </div>
                            <div class="grid-info tf-grid-layout sm-col-2">
                                <div class="d-grid gap-8">
                                    <h6>Phone:</h6>
                                    <p>
                                        <a href="tel:16662348888" class="cl-text-2 link">
                                            +92 030 56084530
                                        </a>
                                    </p>
                                </div>
                                <div class="d-grid gap-8">
                                    <h6>Email:</h6>
                                    <p>
                                        <a href="mailto:hi.amere@gmail.com" class="cl-text-2 link">
                                            abdullahriaaz@gmail.com
                                        </a>
                                    </p>
                                </div>
                                <div class="wd-full d-grid gap-8">
                                    <h6>Address:</h6>
                                    <p>
                                        <a href="https://www.google.com/maps?q=600+N+Michigan+Ave+Chicago,+IL+60611+USA"
                                            target="_blank" class="cl-text-2 link">
                                            Near Gondal Plaza, Gojra, Mandi-bahauddin, Punjab, Pakistan
                                        </a>
                                    </p>
                                </div>
                                <div class="wd-full d-grid gap-8">
                                    <h6>Open Time:</h6>
                                    <ul class="open-text">
                                        <li class="d-flex gap-4 mb-4">
                                            <span class="cl-text-2">Mon - Sat:</span>7:30am - 8:00pm PST
                                        </li>
                                        <li class="d-flex gap-4">
                                            <span class="cl-text-2">Sunday:</span>OFF
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4 class="mb-8">Get In Touch</h4>
                        <p class="mb-24 cl-text-2">
                            Use the form below to get in touch with the sales team
                        </p>
                        <form class="form-get" id="contactForm" method="post" action="{{ route('web.contact.message') }}">
                            @csrf
                            <div class="form-content">
                                <div class="tf-grid-layout sm-col-2">
                                    <fieldset class="tf-field">
                                        <label for="name" class="tf-lable fw-medium">
                                            Your Name
                                            <span class="text-primary">*</span>
                                        </label>
                                        <input type="text" id="name" name="name" placeholder="Your Name*" value="{{ old('name') }}" required>
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </fieldset>
                                    <fieldset class="tf-field">
                                        <label for="email" class="tf-lable fw-medium">
                                            Your Email
                                            <span class="text-primary">*</span>
                                        </label>
                                        <input type="email" id="email" name="email" placeholder="Your Email*" value="{{ old('email') }}" required>
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </fieldset>
                                </div>
                                <fieldset class="tf-field">
                                    <label for="message" class="tf-lable fw-medium">
                                        Your Message
                                        <span class="text-primary">*</span>
                                    </label>
                                    <textarea id="message" name="message" placeholder="Your Message*" required>{{ old('message') }}</textarea>
                                    @error('message')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </fieldset>
                                {{-- <div class="checkbox-wrap">
                                    <input class="tf-check flex-shrink-0" type="checkbox" id="agree-term-2">
                                    <label for="agree-term-2">
                                        Save my name, email, and website in this browser for the next time I comment.
                                    </label>
                                </div> --}}
                            </div>
                            <button type="submit" class="tf-btn animate-btn" id="sendButton">
                                <span id="buttonText">Send Message</span>
                                <span id="buttonSpinner" class="fa-solid fa-spinner fa-spin d-none"></span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Contact -->
        
@endsection