@extends("layouts.app")

@section("content")
<div class="container-md d-flex justify-content-center" >
    <div class="container-md mt-4 bg-white p-4 rounded" style="opacity: 0.9;">
        <p class="display-4 fw-bold">Selamat Datang di Petshop</p>
        <p class="h2 fw-normal text-primary">Petshop</p>
        <p class="h4 fw-normal">
            Temukan solusi terbaik untuk perawatan hewan peliharaan Anda di HalloPets. Kami menyediakan produk berkualitas
            dan pelayanan profesional untuk memastikan kesehatan dan kebahagiaan hewan kesayangan Anda.
        </p>
        <p class="h4 fw-normal">Kunjungi kami di Jl. Surabaya,  Jawa Timur atau hubungi kami via:</p>
        <a class="shadow icon-link mt-2 px-5 bg-success py-2 rounded link-light link-offset-2 link-underline-opacity-25 text-decoration-none h4 fw-medium"
            href="https://wa.me/yourwhatsapplink">
            Chat via WhatsApp<i class="bi bi-whatsapp ms-2"></i>
        </a>
        <p class="h4 mt-3">Telepon: <a href="tel:+628123456789">0812-3456-789</a></p>
        <p class="h4">Email: <a href="mailto:info@hallopets.com">info@hallopets.com</a></p>
    </div>
    <div class="container-md mt-4">
        <img class="img-fluid float-lg-start" src="{{ Vite::asset('resources/images/file.png') }}" alt="Kittens">
    </div>
</div>
@endsection
