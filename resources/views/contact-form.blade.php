<!DOCTYPE html>
<html lang="{{ __('en-US') }}" prefix="og: http://ogp.me/ns#">
<head>
    @include('include.head')
    <link rel="canonical" href="https://logo-logos.com/contact-form.html"/>
    <title>Contact us &#8211; Logos, brands and logotypes</title>
    <meta name="description"
          content="Contact us if you are a copyright owner of a photo that appears on logo-logos.com please email us and we will remove it immediately.">
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="https://logo-logos.com/contact-form.html"/>
    <meta property="og:site_name" content="Logos, brands and logotypes PNG, SVG"/>
    <meta property="og:image" itemprop="image primaryImageOfPage"
          content="{{asset('images/logo-logos.png')}}"/>
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:domain" content="logo-logos.com"/>
    <meta name="twitter:title" property="og:title" itemprop="name"
          content="Contact us &#8211; Logos, brands and logotypes"/>
    <meta name="twitter:description" property="og:description" itemprop="description"
          content="Contact us if you are a copyright owner of a photo that appears on logo-logos.com please email us and we will remove it immediately.">
    @include('include.adsense')
</head>
<body>
@include('include.header')
<main>
    <section class="section" itemscope itemtype="http://schema.org/Article">
        <article class="article" itemprop="articleBody">
            <h1 itemprop="headline">Contact us</h1>
            <p><a href="{{ url()->previous() }}">{{ __('Back') }}</a></p>
            <p>If you are a copyright owner of a photo that appears on logo-logos.com please email us with a link to the
                photo and we will remove it immediately.</p>
            <section style="width: 100%">
                <article>
                    <h2>Write Your Message</h2>
                    <form  action="" method="post">
                        @csrf
                        <p><label>
                                <input required type="text" class="form-control" name="name" size="50" style="max-width:100%;" placeholder="Your name">
                            </label></p>
                        <p><label>
                                <input required type="email" class="form-control" name="email" size="50" style="max-width:100%;" placeholder="Your e-mail">
                            </label></p>
                        <p><label>
                                <textarea required class="form-control" name="text" rows="3" placeholder="Your text is right here"></textarea>
                            </label></p>
                        <p><button type="submit" name="send_a_message" value="true">SEND</button></p>
                    </form>
                </article>
            </section>
        </article>
    </section>
</main>
@include('include.footer')
</body>
</html>
@include('include.copy-protection')
