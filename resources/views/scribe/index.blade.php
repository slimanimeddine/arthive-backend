<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>ArtHive API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://localhost";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-4.39.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-4.39.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-artworks" class="tocify-header">
                <li class="tocify-item level-1" data-unique="artworks">
                    <a href="#artworks">Artworks</a>
                </li>
                                    <ul id="tocify-subheader-artworks" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="artworks-GETapi-v1-artworks">
                                <a href="#artworks-GETapi-v1-artworks">Get All Artworks</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: January 21, 2025</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<p>ArtHive API Documentation</p>
<aside>
    <strong>Base URL</strong>: <code>http://localhost:8000</code>
</aside>
<p>This documentation aims to provide all the information you need to work with our API.</p>
<aside>As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).</aside>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="artworks">Artworks</h1>

    

                                <h2 id="artworks-GETapi-v1-artworks">Get All Artworks</h2>

<p>
</p>

<p>Get a list of all artworks</p>

<span id="example-requests-GETapi-v1-artworks">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/artworks?filter%5Btag%5D=filter%5Btag%5D%3Dabstract&amp;sort=sort%3Dtrending&amp;page=1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artworks"
);

const params = {
    "filter[tag]": "filter[tag]=abstract",
    "sort": "sort=trending",
    "page": "1",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-artworks">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;title&quot;: &quot;Vero quia facere itaque nesciunt laboriosam ullam.&quot;,
            &quot;description&quot;: &quot;Molestias quo aut quia repudiandae similique similique vitae. Iure architecto aut illum minus alias doloribus. Doloremque corrupti eius quis debitis.&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;user_id&quot;: 1,
            &quot;created_at&quot;: &quot;2025-01-21T15:51:53.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-21T15:51:53.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: null,
            &quot;user&quot;: {
                &quot;id&quot;: 1,
                &quot;username&quot;: &quot;volkman.bertha&quot;,
                &quot;first_name&quot;: &quot;Jermey&quot;,
                &quot;last_name&quot;: &quot;Schaden&quot;,
                &quot;email&quot;: &quot;perry.haley@example.org&quot;,
                &quot;country&quot;: &quot;United States Virgin Islands&quot;,
                &quot;bio&quot;: &quot;Officiis provident libero laboriosam vero. Ex qui sed hic magnam voluptatem. Ut enim sapiente voluptas distinctio consequatur sint ut. Quia consectetur eaque provident enim ratione et enim.&quot;,
                &quot;photo&quot;: null,
                &quot;artist_verified_at&quot;: &quot;2025-01-21 15:51:53&quot;,
                &quot;email_verified_at&quot;: &quot;2025-01-21T15:51:53.000000Z&quot;,
                &quot;role&quot;: &quot;artist&quot;,
                &quot;created_at&quot;: &quot;2025-01-21T15:51:53.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-21T15:51:53.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 2,
            &quot;title&quot;: &quot;Accusantium ad excepturi quos minus alias.&quot;,
            &quot;description&quot;: &quot;Est eos quia et sed dolorem non qui vitae. Recusandae laboriosam iste vero aut enim id qui. Nemo vitae id tempore molestiae est omnis et.&quot;,
            &quot;status&quot;: &quot;draft&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2025-01-21T15:51:53.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-21T15:51:53.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: null,
            &quot;user&quot;: {
                &quot;id&quot;: 2,
                &quot;username&quot;: &quot;hildegard96&quot;,
                &quot;first_name&quot;: &quot;Marjory&quot;,
                &quot;last_name&quot;: &quot;Rath&quot;,
                &quot;email&quot;: &quot;dcarter@example.com&quot;,
                &quot;country&quot;: &quot;Haiti&quot;,
                &quot;bio&quot;: &quot;Sunt ea amet aliquid et. Doloremque aliquid accusamus laboriosam. Fuga totam deserunt libero rem rerum provident maxime. Ab maiores et et.&quot;,
                &quot;photo&quot;: &quot;https://via.placeholder.com/640x480.png/000077?text=illo&quot;,
                &quot;artist_verified_at&quot;: null,
                &quot;email_verified_at&quot;: &quot;2025-01-21T15:51:53.000000Z&quot;,
                &quot;role&quot;: &quot;artist&quot;,
                &quot;created_at&quot;: &quot;2025-01-21T15:51:53.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-21T15:51:53.000000Z&quot;
            }
        }
    ],
    &quot;links&quot;: {
        &quot;first&quot;: &quot;/?page=1&quot;,
        &quot;last&quot;: &quot;/?page=1&quot;,
        &quot;prev&quot;: null,
        &quot;next&quot;: null
    },
    &quot;meta&quot;: {
        &quot;current_page&quot;: 1,
        &quot;from&quot;: 1,
        &quot;last_page&quot;: 1,
        &quot;links&quot;: [
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;/?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;active&quot;: false
            }
        ],
        &quot;path&quot;: &quot;/&quot;,
        &quot;per_page&quot;: 10,
        &quot;to&quot;: 2,
        &quot;total&quot;: 2
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-artworks" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-artworks"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-artworks"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-artworks" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-artworks">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-artworks" data-method="GET"
      data-path="api/v1/artworks"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-artworks', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-artworks"
                    onclick="tryItOut('GETapi-v1-artworks');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-artworks"
                    onclick="cancelTryOut('GETapi-v1-artworks');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-artworks"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/artworks</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-artworks"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-artworks"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>filter[tag]</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="filter[tag]"                data-endpoint="GETapi-v1-artworks"
               value="filter[tag]=abstract"
               data-component="query">
    <br>
<p>Filter artworks by tag. Example: <code>filter[tag]=abstract</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="sort"                data-endpoint="GETapi-v1-artworks"
               value="sort=trending"
               data-component="query">
    <br>
<p>Sort artworks by trending, rising, new, or popular. Example: <code>sort=trending</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>page</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="page"                data-endpoint="GETapi-v1-artworks"
               value="1"
               data-component="query">
    <br>
<p>The page number to fetch. Example: <code>1</code></p>
            </div>
                </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
