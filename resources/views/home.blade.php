@extends('layouts.app')

@section('content')
<!--==========================
    Hero Section
============================-->
<section id="hero">
    <div class="hero-container">
        <h1>Welcome to IT-ESEGA</h1>
        <h2>We are team of talanted designers making websites with Bootstrap</h2>
        @guest
            <a href="/register" class="btn-get-started">Daftar sekarang</a>
        @else
            <a href="/team" class="btn-get-started">Kelola Tim</a>
        @endguest
    </div>
</section><!-- #hero -->

<main id="main">
    <!--==========================
      About Us Section
    ============================-->
    <section id="about">
        <div class="container">
            <div class="row about-container">

            <div class="col-lg-6 content order-lg-1 order-2">
                <h2 class="title">Tentang IT-ESEGA</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ultricies erat vitae justo lacinia, a auctor nunc tincidunt. Cras vel faucibus diam. Sed consequat dictum tortor nec luctus. Mauris velit orci, cursus eu imperdiet non, volutpat fringilla libero. Duis interdum, lorem ut facilisis consequat, mi nisl ullamcorper magna, id mollis ex diam et ligula. Curabitur rutrum, velit nec porttitor finibus, metus arcu maximus sapien, a condimentum risus urna at ex. Fusce vel orci auctor ipsum vehicula tristique. Nunc id feugiat ex, sed tincidunt augue. Sed eu nisl a diam dapibus eleifend. Sed eget libero vehicula, interdum nisl eget, mattis massa. Pellentesque scelerisque arcu a rutrum efficitur. Donec interdum nisi non ligula dapibus, ac viverra lectus varius. Maecenas sit amet ex volutpat est dapibus lobortis vitae non leo. Interdum et malesuada fames ac ante ipsum primis in faucibus. Integer varius, risus et accumsan ullamcorper, lacus orci ultrices elit, in posuere mauris eros eu velit.
                </p>
            </div>

            <div class="col-lg-6 background order-lg-2 order-1 wow fadeInRight"></div>
            </div>

        </div>
    </section><!-- #about -->

    <!--==========================
    Cara pendaftaran Section
    ============================-->
    <section id="cara-pendaftaran">
        <div class="container wow fadeIn">
            <div class="section-header">
            <h3 class="section-title">Cara Pendaftaran</h3>
            <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
            </div>
            <div class="row">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                <div class="box">
                <h4 class="title"><a href="">Lorem Ipsum</a></h4>
                <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                <div class="box">
                <h4 class="title"><a href="">Dolor Sitema</a></h4>
                <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                <div class="box">
                <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
                <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                <div class="box">
                <h4 class="title"><a href="">Magni Dolores</a></h4>
                <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                <div class="box">
                <h4 class="title"><a href="">Nemo Enim</a></h4>
                <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                <div class="box">
                <h4 class="title"><a href="">Eiusmod Tempor</a></h4>
                <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
                </div>
            </div>
            </div>

        </div>
    </section><!-- #cara-pendaftaran -->
    <!--==========================
    Call To Action Section
    ============================-->
    <section id="call-to-action">
        <div class="container wow fadeIn">
            <div class="row">
            <div class="col-lg-9 text-center text-lg-left">
                <h3 class="cta-title">Sudah memiliki tim?</h3>
                <p class="cta-text"> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
            <div class="col-lg-3 cta-btn-container text-center">
                <a class="cta-btn align-middle" href="#">Kirim bukti pembayaran</a>
            </div>
            </div>
        </div>
    </section><!-- #call-to-action -->
    <!--==========================
    Contact Section
    ============================-->
    <section id="contact">
        <div class="container wow fadeInUp">
            <div class="section-header">
            <h3 class="section-title">Hubungi Kami</h3>
            <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
            </div>
        </div>

        <div id="google-map" data-latitude="40.713732" data-longitude="-74.0092704"></div>

        <div class="container wow fadeInUp">
            <div class="row justify-content-center">

            <div class="col-lg-3 col-md-4">

                <div class="info">
                    <div>
                        <i class="fas fa-map-marker contact-icon"></i>
                        <p>Jl. Kampus Unud<br>Bukit Jimbaran, Badung, Bali</p>
                    </div>

                    <div>
                        <i class="fas fa-envelope contact-icon"></i>
                        <p>info@example.com</p>
                    </div>

                    <div>
                        <i class="fas fa-phone contact-icon"></i>
                        <p>+1 5589 55488 55s</p>
                    </div>
                </div>

                <div class="social-links">
                <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" class="facebook"><i class="fab fa-facebook"></i></a>
                <a href="#" class="instagram"><i class="fab fa-instagram"></i></a>
                <a href="#" class="google-plus"><i class="fab fa-google-plus"></i></a>
                <a href="#" class="linkedin"><i class="fab fa-linkedin"></i></a>
                </div>

            </div>

            <div class="col-lg-5 col-md-8">
                <div class="form">
                <div id="sendmessage">Your message has been sent. Thank you!</div>
                <div id="errormessage"></div>
                <form action="" method="post" role="form" class="contactForm">
                    <div class="form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validation"></div>
                    </div>
                    <div class="form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                    <div class="validation"></div>
                    </div>
                    <div class="form-group">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                    <div class="validation"></div>
                    </div>
                    <div class="form-group">
                    <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                    <div class="validation"></div>
                    </div>
                    <div class="text-center"><button type="submit">Send Message</button></div>
                </form>
                </div>
            </div>

            </div>

        </div>
    </section><!-- #contact -->
    <!--==========================
    Footer
    ============================-->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">

            </div>
        </div>

        <div class="container">
            <div class="copyright">
            &copy; Copyright <strong>IT-ESEGA</strong>. All Rights Reserved
            </div>
            <div class="credits">
            <!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Regna
            -->
            {{-- Bootstrap Templates by <a href="https://bootstrapmade.com/">BootstrapMade</a> --}}
            </div>
        </div>
    </footer><!-- #footer -->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
</main>
@endsection
