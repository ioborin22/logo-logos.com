<aside class="aside">
    <h2>Logo Categories</h2>
    <hr>
    @foreach ($categories as $category)
        <p><a itemprop="url" href="/category/{{ $category->categories_slug}}">{{ $category->categories_name}}</a>
        </p>
    @endforeach
</aside>
