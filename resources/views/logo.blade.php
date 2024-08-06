<!DOCTYPE html>
<html lang="{{ __('en-US') }}" prefix="og: http://ogp.me/ns#">
<head>
    @include('include.head')
    <link rel="canonical" href="https://logo-logos.com/{{ $logo[0]->slug}}"/>
    <title>{{ $logo[0]->post_title}} &#8211; Logo, brand and logotype</title>
    <meta name="description"
          content="{{ $logo[0]->post_title}} HD resolution logo, logotype. All logos, pictures and images of the brands in the {{ $logo[0]->categories_name}} category. Download free logos, brands and logotypes. All brands, logos, logotypes, best pictures and images. HD resolution logo, logotype.">
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="https://logo-logos.com/{{ $logo[0]->slug}}"/>
    <meta property="og:site_name" content="Logos, brands and logotypes PNG, SVG"/>
    <meta property="og:image" itemprop="image primaryImageOfPage"
          content="{{asset('')}}{!! $logo[0]->img !!}"/>
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:domain" content="logo-logos.com"/>
    <meta name="twitter:title" property="og:title" itemprop="name"
          content="{{ $logo[0]->post_title}} &#8211; Logo, brand and logotype"/>
    <meta name="twitter:description" property="og:description" itemprop="description"
          content="{{ $logo[0]->post_title}} HD resolution logo, logotype. All logos, pictures and images of the brands in the {{ $logo[0]->categories_name}} category. Download free logos, brands and logotypes. All brands, logos, logotypes, best pictures and images. HD resolution logo, logotype.">
    @include('include.adsense')
</head>
<body>
@include('include.header')
<main>
    <section class="section" itemscope itemtype="http://schema.org/Article">
        <article class="article" itemprop="articleBody">
            <h1 itemprop="headline">{{$logo[0]->post_title}} logo download for free</h1>
            <p><a href="{{ url()->previous() }}">{{ __('Back') }}</a></p>

            <p>{{$logo[0]->post_title}} logo photos and pictures in HD resolution from {{$logo[0]->categories_name}}
                category</p>
            <p>{{$logo[0]->post_title}} logotype pictures in high resolution quality available to download for free</p>

            <div style="max-width: 600px; margin: 0 auto">
                <img src="{{asset('')}}{!! $logo[0]->img !!}" alt="{{$logo[0]->post_title}} logo, logotype">
            </div>
            <p>Right click to free download this logo of the "{{$logo[0]->post_title}}" brand to your computer</p>
            <p>See other logos in the category: <a
                    href="/category/{{$logo[0]->categories_slug}}">{{$logo[0]->categories_name}}</a></p>

            <h4>HTML Embed Code full size Logo</h4>
            <label for=""></label><textarea name="" id="" cols="30" rows="5"><img src="{{asset('')}}{!! $logo[0]->img !!}" alt="{{$logo[0]->post_title}} logo, logotype"></textarea>
            <section class="related">
                <h2>{{__('Maybe try one of the links below or a search?')}}</h2>
                <div>
                    <h4>Search</h4>
                </div>
                <div class="logos">
                    @foreach ($related as $logo)
                        <div class="logo">
                            <a class="img" href='{{ $logo->slug}}'><img src="{{asset('')}}{!! $logo->img !!}" alt="{{$logo->post_title}} logo, logotype" loading="lazy"></a>
                            <p class="category"><a style="color: #8a8c8e;" href='/category/{{ $logo->categories_slug}}'>{{ $logo->categories_name}}</a></p>
                            <p class="logo_title"><a style="color: #333;" href='/{{ $logo->slug}}'>{{ $logo->post_title}}</a></p>
                        </div>
                    @endforeach
                </div>
            </section>
        </article>
    </section>
    @include('include.aside')
</main>
@include('include.footer')
</body>
</html>
@include('include.copy-protection')
