<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
  <sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    @foreach ($jasa as $item)
    <sitemap>
        <url>
            <loc>{{ url($item->slug) }}</loc>
                <lastmod>{{ $item->created_at->toAtomString() }}</lastmod>
                <changefreq>weekly</changefreq>
            <priority>0.6</priority>
        </url>
    </sitemap>
    @endforeach
    <sitemap>
        <url>
            <loc>{{ url('/blog') }}</loc>
                <lastmod>{{ $blog->created_at->toAtomString() }}</lastmod>
                <changefreq>weekly</changefreq>
            <priority>0.6</priority>
        </url>
    </sitemap>
    <sitemap>
        <url>
            <loc>{{ url('/tickets') }}</loc>
                <lastmod>{{ $tickets->created_at->toAtomString() }}</lastmod>
                <changefreq>weekly</changefreq>
            <priority>0.6</priority>
        </url>
    </sitemap>
    @foreach ($galeri as $data)
    <sitemap>
        <url>
            <loc>{{ url('jasa-pembuatan-website/tema/') }}</loc>
                <lastmod>{{ $data->created_at->toAtomString() }}</lastmod>
                <changefreq>weekly</changefreq>
            <priority>0.6</priority>
        </url>
    </sitemap>
    @endforeach
  </sitemapindex>
