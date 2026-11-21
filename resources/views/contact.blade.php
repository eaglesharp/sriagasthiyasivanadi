<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Contact Agasthiya Mahashiva Nadi Peedam for Nadi Astrology consultations and guidance.">
    <title>Contact Us | Agasthiya Mahashiva Nadi Peedam</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <link rel="stylesheet" href="/astrol.css"><script src="/astrol.js" defer></script>
</head>
<body>
    @php $suppress_global_banner = true; @endphp
    @include('partials.site-header')
    <main class="contact-page">
        @include('partials.page-banner', [
            'eyebrow' => 'Begin a conversation',
            'title' => 'Bring your questions.<br><span>We will listen.</span>',
            'subtitle' => 'Reach our team for consultation details, preparation guidance, or help understanding the Nadi reading process.',
            'image' => asset('images/nadi-deities.jpeg'),
            'alt' => 'Agastya and Lopamudra Devi',
        ])
        <section class="contact-content"><div class="container-custom contact-layout"><div class="contact-details"><p class="eyebrow">Find the Peedam</p><h2>A quiet place for thoughtful guidance.</h2><p class="contact-intro">You can contact us by phone, WhatsApp, email, or through the form. We will help you understand the next step.</p><div class="contact-detail-list"><a href="tel:+918925147243"><span>☎</span><div><small>Call / WhatsApp appointments</small><strong>+91 8925147243</strong></div></a><a href="tel:+919789686423"><span>?</span><div><small>Call / WhatsApp appointments</small><strong>+91 9789686423</strong></div></a><a href="mailto:mahashivanadi6423@gmail.com"><span>✉</span><div><small>Email</small><strong>mahashivanadi6423@gmail.com</strong></div></a><div><span>⌖</span><div><small>Visit us</small><strong>No.15, Agragaram Street,<br>South Madavilagam,<br>Vaitheeswaran Koil – 609117,<br>Tamil Nadu, South India</strong></div></div></div><a class="contact-whatsapp" href="https://wa.me/918925147243" target="_blank">Message us on WhatsApp <span>→</span></a></div><div class="contact-form-card"><p class="eyebrow">Send an enquiry</p><h2>How can we help?</h2>@if (session('contact_success'))<div class="contact-success">{{ session('contact_success') }}</div>@endif<form method="POST" action="{{ route('contact.store') }}">@csrf<div class="contact-form-row"><label>Name<input name="name" value="{{ old('name') }}" placeholder="Your name" required>@error('name')<small>{{ $message }}</small>@enderror</label><label>Email<input name="email" type="email" value="{{ old('email') }}" placeholder="you@example.com" required>@error('email')<small>{{ $message }}</small>@enderror</label></div><div class="contact-form-row"><label>Phone<input name="phone" value="{{ old('phone') }}" placeholder="Your phone number"></label><label>Interested in<select name="service"><option value="">Select a service</option><option>Nadi Reading</option><option>Prasnam</option><option>Online Consultation</option><option>General Enquiry</option></select></label></div><label>Message<textarea name="message" rows="6" placeholder="Tell us what you would like to know..." required>{{ old('message') }}</textarea>@error('message')<small>{{ $message }}</small>@enderror</label><button class="btn-primary" type="submit">Send enquiry <span>→</span></button></form></div></div></section>
        <section class="contact-location"><div class="container-custom"><div class="contact-location-heading"><div><p class="eyebrow">Visit Vaitheeswaran Koil</p><h2>Find your way to the Peedam.</h2></div><a class="text-link" href="https://www.google.com/maps/search/?api=1&query=Vaitheeswaran+Koil+Tamil+Nadu" target="_blank">Open in Google Maps <span>↗</span></a></div><div class="contact-map"><div id="map" class="leaflet-map"></div><div class="contact-map-label"><strong>Sri Agastyar Peedam</strong><span>Vaitheeswaran Koil, Tamil Nadu</span></div></div></div></section>
    </main>
    @include('partials.site-footer')
</body>
</html>
