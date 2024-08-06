<aside class="aside">
    <div class="advertising-aside">
        <h4>Advertising</h4>
        {{-- <a target="_blank" href="https://getwab.com/?utm_source=logo-logos&utm_medium=referral&utm_campaign=free_dating"><figure><img height="150" src="https://ruogp.me/getwab.gif" alt="GETWAB free dating and chat" ><figcaption>GETWAB Free Dating</figcaption></figure></a> --}}
    </div>
    <h2>Logo Categories</h2>
    <hr>
    @foreach ($categories as $category)
        <p><a itemprop="url" href="/category/{{ $category->categories_slug}}">{{ $category->categories_name}}</a>
        </p>
    @endforeach
    <div class="advertising-sticky">
        <h4>Advertising</h4>
    </div>
</aside>
