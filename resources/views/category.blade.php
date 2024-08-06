<!DOCTYPE html>
<html lang="{{ __('en-US') }}" prefix="og: http://ogp.me/ns#">
<head>
    @include('include.head')
    <link rel="canonical" href="https://logo-logos.com/{{ $category[0]->categories_slug}}"/>
    <title>{{ $category[0]->categories_name}} &#8211; Logos, brands and logotypes download for free</title>
    <meta name="description"
          content="{{ $category[0]->categories_name}} HD resolution logos. All brands, logos, logotypes, best pictures and images All brands, logos, logotypes, best pictures and images. HD resolution logo, logotype.">
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="https://logo-logos.com/{{ $category[0]->categories_slug}}"/>
    <meta property="og:site_name" content="Logos, brands and logotypes PNG, SVG"/>
    <meta property="og:image" itemprop="image primaryImageOfPage"
          content="{{asset('images/logo-logos.png')}}"/>
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:domain" content="logo-logos.com"/>
    <meta name="twitter:title" property="og:title" itemprop="name"
          content="{{ $category[0]->categories_name}} &#8211; Logos, brands and logotypes download for free"/>
    <meta name="twitter:description" property="og:description" itemprop="description"
          content="{{ $category[0]->categories_name}} HD resolution logos. All brands, logos, logotypes, best pictures and images All brands, logos, logotypes, best pictures and images. HD resolution logo, logotype.">
    @include('include.adsense')
</head>
<body>
@include('include.header')
<main>
    <section class="section" itemscope itemtype="http://schema.org/Article">
        <article class="article" itemprop="articleBody">
            <h1 itemprop="headline">Category: {{$category[0]->categories_name}}</h1>
            <div class="pagination">{{ $logos->links('include.simple-pagination') }}</div>
            <div class="logos">
                @foreach ($logos as $logo)
                    <div class="logo">
                        <a class="img" href='/{{ $logo->slug}}'><img src="{{asset('')}}{!! $logo->img !!}" alt="{{$logo->post_title}} logo, logotype" loading="lazy"></a>
                        <p class="category"><a style="color: #8a8c8e;" href='/category/{{ $logo->categories_slug}}'>{{ $logo->categories_name}}</a></p>
                        <p class="logo_title"><a style="color: #333;" href='/{{ $logo->slug}}'>{{ $logo->post_title}}</a></p>
                    </div>
                @endforeach
            </div>
        </article>
    </section>
    @include('include.aside')
</main>
@include('include.footer')
</body>
</html>
@include('include.copy-protection')
