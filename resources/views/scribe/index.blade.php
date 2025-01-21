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
                                                                                <li class="tocify-item level-2" data-unique="artworks-GETapi-v1-artworks-trending--count-">
                                <a href="#artworks-GETapi-v1-artworks-trending--count-">Get Trending Artworks</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="artworks-GETapi-v1-artworks-new--count-">
                                <a href="#artworks-GETapi-v1-artworks-new--count-">Get New Artworks</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="artworks-GETapi-v1-artworks--id-">
                                <a href="#artworks-GETapi-v1-artworks--id-">Get Artwork by Id</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-authentication" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authentication">
                    <a href="#authentication">Authentication</a>
                </li>
                                    <ul id="tocify-subheader-authentication" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="authentication-POSTapi-v1-sign-in">
                                <a href="#authentication-POSTapi-v1-sign-in">Sign In</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentication-POSTapi-v1-sign-up">
                                <a href="#authentication-POSTapi-v1-sign-up">Sign Up</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentication-POSTapi-v1-sign-out">
                                <a href="#authentication-POSTapi-v1-sign-out">Sign Out</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-users" class="tocify-header">
                <li class="tocify-item level-1" data-unique="users">
                    <a href="#users">Users</a>
                </li>
                                    <ul id="tocify-subheader-users" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="users-GETapi-v1-users">
                                <a href="#users-GETapi-v1-users">Get All Users</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="users-GETapi-v1-users-verified--count-">
                                <a href="#users-GETapi-v1-users-verified--count-">Get Verified Users</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="users-GETapi-v1-users--username-">
                                <a href="#users-GETapi-v1-users--username-">Get User by Username</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="users-GETapi-v1-users--username--likes-by-tag">
                                <a href="#users-GETapi-v1-users--username--likes-by-tag">Get User Total Likes and Likes by Tag</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="users-GETapi-v1-users--username--artwork-tags">
                                <a href="#users-GETapi-v1-users--username--artwork-tags">Get User Artwork Tags</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="users-GETapi-v1-users--username--artworks">
                                <a href="#users-GETapi-v1-users--username--artworks">Get User Artworks</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="users-GETapi-v1-users-authenticated-user">
                                <a href="#users-GETapi-v1-users-authenticated-user">Get Authenticated User</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="users-GETapi-v1-users-authenticated-user-artworks">
                                <a href="#users-GETapi-v1-users-authenticated-user-artworks">Get Authenticated User Artworks</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="users-GETapi-v1-users-authenticated-user-favorite-artworks">
                                <a href="#users-GETapi-v1-users-authenticated-user-favorite-artworks">Get Authenticated User Favorite Artworks</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="users-GETapi-v1-users-authenticated-user-followers">
                                <a href="#users-GETapi-v1-users-authenticated-user-followers">Get Authenticated User Following</a>
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
            &quot;id&quot;: 221,
            &quot;title&quot;: &quot;Nobis ipsa voluptatem rem illum molestiae.&quot;,
            &quot;description&quot;: &quot;Voluptate est deleniti aut recusandae placeat magnam sunt. Ratione enim consequatur dolorum alias sequi. Mollitia hic ea incidunt architecto omnis rerum tempora. Repellendus iusto et ad amet quas iure.&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;user_id&quot;: 501,
            &quot;created_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: null,
            &quot;user&quot;: {
                &quot;id&quot;: 501,
                &quot;username&quot;: &quot;jane.lang&quot;,
                &quot;first_name&quot;: &quot;Jamel&quot;,
                &quot;last_name&quot;: &quot;Cole&quot;,
                &quot;email&quot;: &quot;tweissnat@example.net&quot;,
                &quot;country&quot;: &quot;Ghana&quot;,
                &quot;bio&quot;: &quot;Neque voluptatum officia magnam amet voluptates qui at. Dolores nostrum enim nulla odit voluptatibus doloribus. Suscipit quidem dolorum nihil atque.&quot;,
                &quot;photo&quot;: &quot;https://via.placeholder.com/640x480.png/00bb22?text=voluptatum&quot;,
                &quot;artist_verified_at&quot;: &quot;2025-01-21 08:36:09&quot;,
                &quot;email_verified_at&quot;: &quot;2025-01-21T08:36:09.000000Z&quot;,
                &quot;created_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 222,
            &quot;title&quot;: &quot;Repellendus rerum sunt consequuntur autem.&quot;,
            &quot;description&quot;: &quot;Id laudantium qui velit occaecati. Est aut odit at molestiae ipsa sint. Qui libero inventore minima voluptas sed.&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;user_id&quot;: 502,
            &quot;created_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: null,
            &quot;user&quot;: {
                &quot;id&quot;: 502,
                &quot;username&quot;: &quot;claire35&quot;,
                &quot;first_name&quot;: &quot;Deshawn&quot;,
                &quot;last_name&quot;: &quot;Yost&quot;,
                &quot;email&quot;: &quot;hbotsford@example.com&quot;,
                &quot;country&quot;: &quot;Mali&quot;,
                &quot;bio&quot;: &quot;In veritatis eum exercitationem ut enim recusandae. Animi officia voluptates dolorem temporibus. Alias ab consequatur occaecati pariatur vero ut non. Fuga amet ut quo quae.&quot;,
                &quot;photo&quot;: &quot;https://via.placeholder.com/640x480.png/005544?text=facere&quot;,
                &quot;artist_verified_at&quot;: null,
                &quot;email_verified_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
                &quot;created_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;
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

                    <h2 id="artworks-GETapi-v1-artworks-trending--count-">Get Trending Artworks</h2>

<p>
</p>

<p>Get a list of trending artworks</p>

<span id="example-requests-GETapi-v1-artworks-trending--count-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/artworks/trending/20" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artworks/trending/20"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-artworks-trending--count-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 223,
            &quot;title&quot;: &quot;Incidunt numquam ipsam repudiandae dolor.&quot;,
            &quot;description&quot;: &quot;Culpa ducimus nihil nesciunt quo molestiae libero eos rerum. Aspernatur iusto error possimus exercitationem minima molestias voluptate. Ipsam dicta quos ex officia natus tenetur quia quod. Ipsa voluptas commodi nemo et.&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;user_id&quot;: 503,
            &quot;created_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: null,
            &quot;user&quot;: {
                &quot;id&quot;: 503,
                &quot;username&quot;: &quot;zritchie&quot;,
                &quot;first_name&quot;: &quot;Judson&quot;,
                &quot;last_name&quot;: &quot;Langosh&quot;,
                &quot;email&quot;: &quot;abdul23@example.net&quot;,
                &quot;country&quot;: &quot;Ghana&quot;,
                &quot;bio&quot;: &quot;Qui corporis maxime placeat tempora non illum harum beatae. Repudiandae et voluptas doloremque qui ut aut. Enim voluptatem amet reiciendis laborum maxime cum nulla. Vitae sed maxime doloribus.&quot;,
                &quot;photo&quot;: null,
                &quot;artist_verified_at&quot;: null,
                &quot;email_verified_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
                &quot;created_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 224,
            &quot;title&quot;: &quot;Quis corporis nostrum animi voluptatem.&quot;,
            &quot;description&quot;: &quot;Perspiciatis sit ut doloribus consectetur. Est sit ut velit explicabo delectus. Incidunt enim aperiam delectus voluptatem unde. In omnis laborum numquam.&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;user_id&quot;: 504,
            &quot;created_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: null,
            &quot;user&quot;: {
                &quot;id&quot;: 504,
                &quot;username&quot;: &quot;sylvia45&quot;,
                &quot;first_name&quot;: &quot;Misael&quot;,
                &quot;last_name&quot;: &quot;Pfannerstill&quot;,
                &quot;email&quot;: &quot;cary.koch@example.org&quot;,
                &quot;country&quot;: &quot;Iceland&quot;,
                &quot;bio&quot;: &quot;Commodi est harum consectetur et consequatur. Omnis enim deserunt quaerat.&quot;,
                &quot;photo&quot;: null,
                &quot;artist_verified_at&quot;: &quot;2025-01-21 08:36:10&quot;,
                &quot;email_verified_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
                &quot;created_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;
            }
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-artworks-trending--count-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-artworks-trending--count-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-artworks-trending--count-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-artworks-trending--count-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-artworks-trending--count-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-artworks-trending--count-" data-method="GET"
      data-path="api/v1/artworks/trending/{count}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-artworks-trending--count-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-artworks-trending--count-"
                    onclick="tryItOut('GETapi-v1-artworks-trending--count-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-artworks-trending--count-"
                    onclick="cancelTryOut('GETapi-v1-artworks-trending--count-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-artworks-trending--count-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/artworks/trending/{count}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-artworks-trending--count-"
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
                              name="Accept"                data-endpoint="GETapi-v1-artworks-trending--count-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>count</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="count"                data-endpoint="GETapi-v1-artworks-trending--count-"
               value="20"
               data-component="url">
    <br>
<p>The number of records to retrieve Example: <code>20</code></p>
            </div>
                    </form>

                    <h2 id="artworks-GETapi-v1-artworks-new--count-">Get New Artworks</h2>

<p>
</p>

<p>Get a list of new artworks</p>

<span id="example-requests-GETapi-v1-artworks-new--count-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/artworks/new/13" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artworks/new/13"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-artworks-new--count-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 225,
            &quot;title&quot;: &quot;Maxime dolores placeat dolore ut nam.&quot;,
            &quot;description&quot;: &quot;Blanditiis voluptas praesentium possimus velit incidunt molestiae optio nemo. Consequuntur ut quia et laboriosam incidunt autem. Velit deserunt et reprehenderit deleniti. Sit laborum sunt quisquam quas rerum.&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;user_id&quot;: 505,
            &quot;created_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: null,
            &quot;user&quot;: {
                &quot;id&quot;: 505,
                &quot;username&quot;: &quot;pagac.madilyn&quot;,
                &quot;first_name&quot;: &quot;Curt&quot;,
                &quot;last_name&quot;: &quot;Deckow&quot;,
                &quot;email&quot;: &quot;shirley21@example.net&quot;,
                &quot;country&quot;: &quot;China&quot;,
                &quot;bio&quot;: &quot;Soluta quaerat autem harum. Velit hic ut atque dolor. Iure quibusdam consequatur cumque fugit dolores numquam.&quot;,
                &quot;photo&quot;: null,
                &quot;artist_verified_at&quot;: null,
                &quot;email_verified_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
                &quot;created_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 226,
            &quot;title&quot;: &quot;Vel minus consequatur corporis quia a assumenda.&quot;,
            &quot;description&quot;: &quot;Amet voluptatem mollitia totam delectus in harum et. Ut fuga neque inventore animi officiis tempora excepturi. Optio veritatis ducimus veniam ea in tempora. Est sit aut et vel cupiditate debitis sed.&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;user_id&quot;: 506,
            &quot;created_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: null,
            &quot;user&quot;: {
                &quot;id&quot;: 506,
                &quot;username&quot;: &quot;hhalvorson&quot;,
                &quot;first_name&quot;: &quot;Savanah&quot;,
                &quot;last_name&quot;: &quot;Boyer&quot;,
                &quot;email&quot;: &quot;lorenzo42@example.net&quot;,
                &quot;country&quot;: &quot;Burundi&quot;,
                &quot;bio&quot;: &quot;Consequatur ab ab sint aliquam sint et blanditiis. Excepturi omnis aut unde. Autem nam quo dolores earum.&quot;,
                &quot;photo&quot;: null,
                &quot;artist_verified_at&quot;: null,
                &quot;email_verified_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
                &quot;created_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;
            }
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-artworks-new--count-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-artworks-new--count-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-artworks-new--count-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-artworks-new--count-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-artworks-new--count-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-artworks-new--count-" data-method="GET"
      data-path="api/v1/artworks/new/{count}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-artworks-new--count-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-artworks-new--count-"
                    onclick="tryItOut('GETapi-v1-artworks-new--count-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-artworks-new--count-"
                    onclick="cancelTryOut('GETapi-v1-artworks-new--count-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-artworks-new--count-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/artworks/new/{count}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-artworks-new--count-"
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
                              name="Accept"                data-endpoint="GETapi-v1-artworks-new--count-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>count</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="count"                data-endpoint="GETapi-v1-artworks-new--count-"
               value="13"
               data-component="url">
    <br>
<p>The number of records to retrieve Example: <code>13</code></p>
            </div>
                    </form>

                    <h2 id="artworks-GETapi-v1-artworks--id-">Get Artwork by Id</h2>

<p>
</p>

<p>Get a single artwork by id</p>

<span id="example-requests-GETapi-v1-artworks--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/artworks/11" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artworks/11"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-artworks--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 227,
            &quot;title&quot;: &quot;Fugit aut et nihil fuga aspernatur rem.&quot;,
            &quot;description&quot;: &quot;Pariatur in non quidem praesentium sunt qui. Distinctio neque libero eum quasi ad voluptatem voluptates. Quaerat ut eveniet magni ut aperiam laborum rerum. Consequatur architecto tenetur quos autem asperiores porro aut.&quot;,
            &quot;status&quot;: &quot;draft&quot;,
            &quot;user_id&quot;: 507,
            &quot;created_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 1,
            &quot;artwork_comments_count&quot;: 1,
            &quot;artwork_main_photo_path&quot;: null,
            &quot;user&quot;: {
                &quot;id&quot;: 507,
                &quot;username&quot;: &quot;hfunk&quot;,
                &quot;first_name&quot;: &quot;Darrick&quot;,
                &quot;last_name&quot;: &quot;Jacobs&quot;,
                &quot;email&quot;: &quot;kay65@example.org&quot;,
                &quot;country&quot;: &quot;Greenland&quot;,
                &quot;bio&quot;: &quot;Sed aperiam suscipit ut dolorum laborum ad. Nemo unde quis necessitatibus. Dolorum porro voluptas quisquam quae dolores exercitationem ut. Commodi fugit id laborum nisi quaerat quam.&quot;,
                &quot;photo&quot;: null,
                &quot;artist_verified_at&quot;: &quot;2025-01-21 08:36:10&quot;,
                &quot;email_verified_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
                &quot;created_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;
            },
            &quot;artwork_photos&quot;: [
                {
                    &quot;id&quot;: 117,
                    &quot;path&quot;: &quot;0&quot;,
                    &quot;is_main&quot;: 0,
                    &quot;artwork_id&quot;: 227,
                    &quot;created_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;
                }
            ],
            &quot;artwork_comments&quot;: [
                {
                    &quot;id&quot;: 109,
                    &quot;comment_text&quot;: &quot;Accusantium veniam ut libero itaque ut placeat omnis.&quot;,
                    &quot;artwork_id&quot;: 227,
                    &quot;user_id&quot;: 508,
                    &quot;created_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
                    &quot;user&quot;: {
                        &quot;id&quot;: 508,
                        &quot;username&quot;: &quot;noemie26&quot;,
                        &quot;first_name&quot;: &quot;Freeman&quot;,
                        &quot;last_name&quot;: &quot;Krajcik&quot;,
                        &quot;email&quot;: &quot;raul.crist@example.com&quot;,
                        &quot;country&quot;: &quot;Western Sahara&quot;,
                        &quot;bio&quot;: &quot;Libero odit quia accusantium quidem maiores commodi sit. Eos omnis deserunt magnam libero. In quaerat nemo in dolorum.&quot;,
                        &quot;photo&quot;: null,
                        &quot;artist_verified_at&quot;: &quot;2025-01-21 08:36:10&quot;,
                        &quot;email_verified_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
                        &quot;created_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;
                    }
                }
            ],
            &quot;artwork_likes&quot;: [
                {
                    &quot;id&quot;: 109,
                    &quot;artwork_id&quot;: 227,
                    &quot;user_id&quot;: 509,
                    &quot;created_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
                    &quot;user&quot;: {
                        &quot;id&quot;: 509,
                        &quot;username&quot;: &quot;harvey.roselyn&quot;,
                        &quot;first_name&quot;: &quot;Marietta&quot;,
                        &quot;last_name&quot;: &quot;Mayer&quot;,
                        &quot;email&quot;: &quot;trent.bartell@example.org&quot;,
                        &quot;country&quot;: &quot;Georgia&quot;,
                        &quot;bio&quot;: &quot;Sunt nobis ipsum iste cupiditate tempora numquam repellat rerum. Modi quae mollitia fuga saepe quaerat. Tempora omnis deserunt sit quia beatae consequatur sint. Quaerat iusto velit voluptatem voluptatem.&quot;,
                        &quot;photo&quot;: null,
                        &quot;artist_verified_at&quot;: &quot;2025-01-21 08:36:10&quot;,
                        &quot;email_verified_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
                        &quot;created_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;
                    }
                }
            ],
            &quot;tags&quot;: [
                {
                    &quot;id&quot;: 115,
                    &quot;name&quot;: &quot;Camila Ebert&quot;,
                    &quot;created_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
                    &quot;pivot&quot;: {
                        &quot;artwork_id&quot;: 227,
                        &quot;tag_id&quot;: 115
                    }
                }
            ]
        },
        {
            &quot;id&quot;: 228,
            &quot;title&quot;: &quot;Sit iste tenetur ex iste eum vero ipsa.&quot;,
            &quot;description&quot;: &quot;Harum aut dolorem autem provident. Et ratione adipisci non qui omnis reprehenderit suscipit illum. Possimus consequatur et similique.&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;user_id&quot;: 510,
            &quot;created_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 1,
            &quot;artwork_comments_count&quot;: 1,
            &quot;artwork_main_photo_path&quot;: &quot;0&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 510,
                &quot;username&quot;: &quot;mmacejkovic&quot;,
                &quot;first_name&quot;: &quot;Raquel&quot;,
                &quot;last_name&quot;: &quot;Hamill&quot;,
                &quot;email&quot;: &quot;wayne78@example.org&quot;,
                &quot;country&quot;: &quot;Saint Barthelemy&quot;,
                &quot;bio&quot;: &quot;Quod ullam ut occaecati culpa molestiae id. Nobis laboriosam necessitatibus amet et quas iusto. Et amet animi nisi dolor. Rem facilis repudiandae est incidunt sint.&quot;,
                &quot;photo&quot;: &quot;https://via.placeholder.com/640x480.png/0033cc?text=consequatur&quot;,
                &quot;artist_verified_at&quot;: &quot;2025-01-21 08:36:10&quot;,
                &quot;email_verified_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
                &quot;created_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;
            },
            &quot;artwork_photos&quot;: [
                {
                    &quot;id&quot;: 118,
                    &quot;path&quot;: &quot;0&quot;,
                    &quot;is_main&quot;: 1,
                    &quot;artwork_id&quot;: 228,
                    &quot;created_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;
                }
            ],
            &quot;artwork_comments&quot;: [
                {
                    &quot;id&quot;: 110,
                    &quot;comment_text&quot;: &quot;Quo et tempora quia.&quot;,
                    &quot;artwork_id&quot;: 228,
                    &quot;user_id&quot;: 511,
                    &quot;created_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
                    &quot;user&quot;: {
                        &quot;id&quot;: 511,
                        &quot;username&quot;: &quot;skirlin&quot;,
                        &quot;first_name&quot;: &quot;Bernardo&quot;,
                        &quot;last_name&quot;: &quot;Lueilwitz&quot;,
                        &quot;email&quot;: &quot;susie.williamson@example.com&quot;,
                        &quot;country&quot;: &quot;Turks and Caicos Islands&quot;,
                        &quot;bio&quot;: &quot;Ullam omnis velit et repellendus possimus. Occaecati in exercitationem sed aut sed rerum totam. Alias deleniti et est ab eveniet et. Dicta maxime voluptas asperiores adipisci est aperiam enim.&quot;,
                        &quot;photo&quot;: null,
                        &quot;artist_verified_at&quot;: null,
                        &quot;email_verified_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
                        &quot;created_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;
                    }
                }
            ],
            &quot;artwork_likes&quot;: [
                {
                    &quot;id&quot;: 110,
                    &quot;artwork_id&quot;: 228,
                    &quot;user_id&quot;: 512,
                    &quot;created_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
                    &quot;user&quot;: {
                        &quot;id&quot;: 512,
                        &quot;username&quot;: &quot;bfranecki&quot;,
                        &quot;first_name&quot;: &quot;Adeline&quot;,
                        &quot;last_name&quot;: &quot;Cummerata&quot;,
                        &quot;email&quot;: &quot;gertrude20@example.com&quot;,
                        &quot;country&quot;: &quot;Guatemala&quot;,
                        &quot;bio&quot;: &quot;Praesentium deleniti aut voluptatem quod debitis iusto nisi. Facere dignissimos voluptatem aut et non optio. Minima quis eligendi voluptates dignissimos.&quot;,
                        &quot;photo&quot;: &quot;https://via.placeholder.com/640x480.png/00ffaa?text=voluptatem&quot;,
                        &quot;artist_verified_at&quot;: null,
                        &quot;email_verified_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
                        &quot;created_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;
                    }
                }
            ],
            &quot;tags&quot;: [
                {
                    &quot;id&quot;: 116,
                    &quot;name&quot;: &quot;Queen Ruecker&quot;,
                    &quot;created_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
                    &quot;pivot&quot;: {
                        &quot;artwork_id&quot;: 228,
                        &quot;tag_id&quot;: 116
                    }
                }
            ]
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-artworks--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-artworks--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-artworks--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-artworks--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-artworks--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-artworks--id-" data-method="GET"
      data-path="api/v1/artworks/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-artworks--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-artworks--id-"
                    onclick="tryItOut('GETapi-v1-artworks--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-artworks--id-"
                    onclick="cancelTryOut('GETapi-v1-artworks--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-artworks--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/artworks/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-artworks--id-"
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
                              name="Accept"                data-endpoint="GETapi-v1-artworks--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-v1-artworks--id-"
               value="11"
               data-component="url">
    <br>
<p>The id of the artwork Example: <code>11</code></p>
            </div>
                    </form>

                <h1 id="authentication">Authentication</h1>

    

                                <h2 id="authentication-POSTapi-v1-sign-in">Sign In</h2>

<p>
</p>

<p>Signs in a user and returns an auth token</p>

<span id="example-requests-POSTapi-v1-sign-in">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/v1/sign-in" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"johndoe@gmail.com\",
    \"password\": \"password\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/sign-in"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "johndoe@gmail.com",
    "password": "password"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-sign-in">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
 &quot;message&quot;: &quot;Authenticated&quot;,
 &quot;data&quot;: {
     &quot;token&quot;: &quot;{YOUR_AUTH_KEY}&quot;,
     &quot;id&quot;: 1
 },
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-sign-in" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-sign-in"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-sign-in"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-sign-in" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-sign-in">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-sign-in" data-method="POST"
      data-path="api/v1/sign-in"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-sign-in', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-sign-in"
                    onclick="tryItOut('POSTapi-v1-sign-in');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-sign-in"
                    onclick="cancelTryOut('POSTapi-v1-sign-in');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-sign-in"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/sign-in</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-sign-in"
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
                              name="Accept"                data-endpoint="POSTapi-v1-sign-in"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-v1-sign-in"
               value="johndoe@gmail.com"
               data-component="body">
    <br>
<p>The email address of the user attempting to sign in. Must be a valid email address. Example: <code>johndoe@gmail.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-v1-sign-in"
               value="password"
               data-component="body">
    <br>
<p>The password associated with the user account. Example: <code>password</code></p>
        </div>
        </form>

                    <h2 id="authentication-POSTapi-v1-sign-up">Sign Up</h2>

<p>
</p>

<p>Creates a new user</p>

<span id="example-requests-POSTapi-v1-sign-up">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/v1/sign-up" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"username\": \"johndoe\",
    \"email\": \"johndoe@gmail.com\",
    \"password\": \"password\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/sign-up"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "username": "johndoe",
    "email": "johndoe@gmail.com",
    "password": "password"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-sign-up">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
&quot;message&quot;: &quot;User created successfully&quot;,
&quot;data&quot;: {
     &quot;id&quot;: 1
},
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-sign-up" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-sign-up"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-sign-up"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-sign-up" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-sign-up">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-sign-up" data-method="POST"
      data-path="api/v1/sign-up"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-sign-up', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-sign-up"
                    onclick="tryItOut('POSTapi-v1-sign-up');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-sign-up"
                    onclick="cancelTryOut('POSTapi-v1-sign-up');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-sign-up"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/sign-up</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-sign-up"
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
                              name="Accept"                data-endpoint="POSTapi-v1-sign-up"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>username</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="username"                data-endpoint="POSTapi-v1-sign-up"
               value="johndoe"
               data-component="body">
    <br>
<p>A unique username for the user. Example: <code>johndoe</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-v1-sign-up"
               value="johndoe@gmail.com"
               data-component="body">
    <br>
<p>The email address of the user. Must be unique. Must be a valid email address. Example: <code>johndoe@gmail.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-v1-sign-up"
               value="password"
               data-component="body">
    <br>
<p>A secure password for the user. Must be at least 8 characters long. Must be at least 8 characters. Example: <code>password</code></p>
        </div>
        </form>

                    <h2 id="authentication-POSTapi-v1-sign-out">Sign Out</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Signs out a user and deletes the auth token</p>

<span id="example-requests-POSTapi-v1-sign-out">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/v1/sign-out" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/sign-out"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-sign-out">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
     &quot;message&quot;: &quot;Signed out successfully&quot;,
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-sign-out" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-sign-out"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-sign-out"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-sign-out" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-sign-out">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-sign-out" data-method="POST"
      data-path="api/v1/sign-out"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-sign-out', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-sign-out"
                    onclick="tryItOut('POSTapi-v1-sign-out');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-sign-out"
                    onclick="cancelTryOut('POSTapi-v1-sign-out');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-sign-out"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/sign-out</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-sign-out"
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
                              name="Accept"                data-endpoint="POSTapi-v1-sign-out"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                <h1 id="users">Users</h1>

    

                                <h2 id="users-GETapi-v1-users">Get All Users</h2>

<p>
</p>

<p>Get a list of all users</p>

<span id="example-requests-GETapi-v1-users">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/users?filter%5Bcountry%5D=filter%5Bcountry%5D%3Dfinland&amp;filter%5Bcategory%5D=filter%5Bcategory%5D%3Dceramics&amp;sort=sort%3Dnew&amp;page=1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/users"
);

const params = {
    "filter[country]": "filter[country]=finland",
    "filter[category]": "filter[category]=ceramics",
    "sort": "sort=new",
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

<span id="example-responses-GETapi-v1-users">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 513,
            &quot;username&quot;: &quot;smitham.briana&quot;,
            &quot;first_name&quot;: &quot;Jaycee&quot;,
            &quot;last_name&quot;: &quot;Pouros&quot;,
            &quot;email&quot;: &quot;salvador86@example.net&quot;,
            &quot;country&quot;: &quot;Cameroon&quot;,
            &quot;bio&quot;: &quot;Animi praesentium ea numquam est magni. Non expedita impedit quo nihil magni veniam incidunt. Veniam tenetur sit ea quae fugiat.&quot;,
            &quot;photo&quot;: &quot;https://via.placeholder.com/640x480.png/00bb66?text=corrupti&quot;,
            &quot;artist_verified_at&quot;: &quot;2025-01-21 08:36:10&quot;,
            &quot;email_verified_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
            &quot;created_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
            &quot;artworks&quot;: [
                {
                    &quot;id&quot;: 229,
                    &quot;title&quot;: &quot;Aut asperiores aut soluta deserunt.&quot;,
                    &quot;description&quot;: &quot;Modi illum quia sapiente hic praesentium doloribus velit. Dolor aspernatur ea et maxime fugit.&quot;,
                    &quot;status&quot;: &quot;published&quot;,
                    &quot;user_id&quot;: 513,
                    &quot;created_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
                    &quot;artwork_likes_count&quot;: 0,
                    &quot;artwork_comments_count&quot;: 0,
                    &quot;artwork_main_photo_path&quot;: null
                }
            ]
        },
        {
            &quot;id&quot;: 514,
            &quot;username&quot;: &quot;dgerlach&quot;,
            &quot;first_name&quot;: &quot;Florian&quot;,
            &quot;last_name&quot;: &quot;Boyer&quot;,
            &quot;email&quot;: &quot;simone06@example.com&quot;,
            &quot;country&quot;: &quot;Bouvet Island (Bouvetoya)&quot;,
            &quot;bio&quot;: &quot;Dolorum et nulla voluptatibus voluptas modi et dolor ipsa. Inventore quisquam et impedit temporibus aperiam nesciunt. Non facere perspiciatis sapiente placeat vel voluptas modi. Quisquam perferendis maiores vel velit qui eum autem iste.&quot;,
            &quot;photo&quot;: null,
            &quot;artist_verified_at&quot;: &quot;2025-01-21 08:36:10&quot;,
            &quot;email_verified_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
            &quot;created_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
            &quot;artworks&quot;: [
                {
                    &quot;id&quot;: 230,
                    &quot;title&quot;: &quot;Animi repellendus laborum fugit est sed.&quot;,
                    &quot;description&quot;: &quot;Optio officiis molestiae quos eum sit. Voluptates id velit consequatur repellendus. Nihil blanditiis in et inventore. Itaque ad necessitatibus fuga voluptate ratione.&quot;,
                    &quot;status&quot;: &quot;published&quot;,
                    &quot;user_id&quot;: 514,
                    &quot;created_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
                    &quot;artwork_likes_count&quot;: 0,
                    &quot;artwork_comments_count&quot;: 0,
                    &quot;artwork_main_photo_path&quot;: null
                }
            ]
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
<span id="execution-results-GETapi-v1-users" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-users"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-users"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-users">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-users" data-method="GET"
      data-path="api/v1/users"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-users', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-users"
                    onclick="tryItOut('GETapi-v1-users');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-users"
                    onclick="cancelTryOut('GETapi-v1-users');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-users"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/users</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-users"
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
                              name="Accept"                data-endpoint="GETapi-v1-users"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>filter[country]</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="filter[country]"                data-endpoint="GETapi-v1-users"
               value="filter[country]=finland"
               data-component="query">
    <br>
<p>Filter artworks by country. Example: <code>filter[country]=finland</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>filter[category]</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="filter[category]"                data-endpoint="GETapi-v1-users"
               value="filter[category]=ceramics"
               data-component="query">
    <br>
<p>Filter artworks by category. Example: <code>filter[category]=ceramics</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="sort"                data-endpoint="GETapi-v1-users"
               value="sort=new"
               data-component="query">
    <br>
<p>Sort artworks by new, or popular. Example: <code>sort=new</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>page</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="page"                data-endpoint="GETapi-v1-users"
               value="1"
               data-component="query">
    <br>
<p>The page number to fetch. Example: <code>1</code></p>
            </div>
                </form>

                    <h2 id="users-GETapi-v1-users-verified--count-">Get Verified Users</h2>

<p>
</p>

<p>Get a list of verified users</p>

<span id="example-requests-GETapi-v1-users-verified--count-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/users/verified/8" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/users/verified/8"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-users-verified--count-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 515,
            &quot;username&quot;: &quot;anne44&quot;,
            &quot;first_name&quot;: &quot;Brenna&quot;,
            &quot;last_name&quot;: &quot;Moore&quot;,
            &quot;email&quot;: &quot;gregg29@example.com&quot;,
            &quot;country&quot;: &quot;Cape Verde&quot;,
            &quot;bio&quot;: &quot;Quo ut neque libero natus necessitatibus adipisci. Nobis non suscipit consectetur aspernatur illo et. Velit facilis non cum dolorem pariatur.&quot;,
            &quot;photo&quot;: null,
            &quot;artist_verified_at&quot;: null,
            &quot;email_verified_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
            &quot;created_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;
        },
        {
            &quot;id&quot;: 516,
            &quot;username&quot;: &quot;gislason.eusebio&quot;,
            &quot;first_name&quot;: &quot;Esperanza&quot;,
            &quot;last_name&quot;: &quot;Swaniawski&quot;,
            &quot;email&quot;: &quot;stevie76@example.org&quot;,
            &quot;country&quot;: &quot;Uzbekistan&quot;,
            &quot;bio&quot;: &quot;Qui ex sequi adipisci quis et. Neque qui in tempora et libero. Quaerat magni sint debitis aliquam et.&quot;,
            &quot;photo&quot;: null,
            &quot;artist_verified_at&quot;: &quot;2025-01-21 08:36:10&quot;,
            &quot;email_verified_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
            &quot;created_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-users-verified--count-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-users-verified--count-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-users-verified--count-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-users-verified--count-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-users-verified--count-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-users-verified--count-" data-method="GET"
      data-path="api/v1/users/verified/{count}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-users-verified--count-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-users-verified--count-"
                    onclick="tryItOut('GETapi-v1-users-verified--count-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-users-verified--count-"
                    onclick="cancelTryOut('GETapi-v1-users-verified--count-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-users-verified--count-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/users/verified/{count}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-users-verified--count-"
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
                              name="Accept"                data-endpoint="GETapi-v1-users-verified--count-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>count</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="count"                data-endpoint="GETapi-v1-users-verified--count-"
               value="8"
               data-component="url">
    <br>
<p>The number of records to retrieve Example: <code>8</code></p>
            </div>
                    </form>

                    <h2 id="users-GETapi-v1-users--username-">Get User by Username</h2>

<p>
</p>

<p>Get a single user by username</p>

<span id="example-requests-GETapi-v1-users--username-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/users/consequatur" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/users/consequatur"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-users--username-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 517,
            &quot;username&quot;: &quot;vlesch&quot;,
            &quot;first_name&quot;: &quot;Oscar&quot;,
            &quot;last_name&quot;: &quot;Greenholt&quot;,
            &quot;email&quot;: &quot;runte.albina@example.org&quot;,
            &quot;country&quot;: &quot;Mayotte&quot;,
            &quot;bio&quot;: &quot;Dicta illo reiciendis unde magni laboriosam tempora in quis. Et modi in est ad sed tenetur voluptas molestiae. Laboriosam id nulla non occaecati beatae laboriosam.&quot;,
            &quot;photo&quot;: &quot;https://via.placeholder.com/640x480.png/002222?text=harum&quot;,
            &quot;artist_verified_at&quot;: &quot;2025-01-21 08:36:10&quot;,
            &quot;email_verified_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
            &quot;created_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;
        },
        {
            &quot;id&quot;: 518,
            &quot;username&quot;: &quot;xmarvin&quot;,
            &quot;first_name&quot;: &quot;Aleen&quot;,
            &quot;last_name&quot;: &quot;Bechtelar&quot;,
            &quot;email&quot;: &quot;kitty.murazik@example.org&quot;,
            &quot;country&quot;: &quot;Greenland&quot;,
            &quot;bio&quot;: &quot;Aut eos sed expedita praesentium id quasi vitae. Facilis ullam maxime alias similique accusantium architecto ipsum. Dolores officiis expedita animi qui. Illum repellat voluptatem nulla quis necessitatibus.&quot;,
            &quot;photo&quot;: &quot;https://via.placeholder.com/640x480.png/00ee99?text=nesciunt&quot;,
            &quot;artist_verified_at&quot;: &quot;2025-01-21 08:36:10&quot;,
            &quot;email_verified_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
            &quot;created_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-users--username-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-users--username-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-users--username-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-users--username-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-users--username-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-users--username-" data-method="GET"
      data-path="api/v1/users/{username}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-users--username-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-users--username-"
                    onclick="tryItOut('GETapi-v1-users--username-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-users--username-"
                    onclick="cancelTryOut('GETapi-v1-users--username-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-users--username-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/users/{username}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-users--username-"
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
                              name="Accept"                data-endpoint="GETapi-v1-users--username-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>username</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="username"                data-endpoint="GETapi-v1-users--username-"
               value="consequatur"
               data-component="url">
    <br>
<p>The username of the user Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="users-GETapi-v1-users--username--likes-by-tag">Get User Total Likes and Likes by Tag</h2>

<p>
</p>

<p>Get the total number of likes received by a user and the number of likes received by tag</p>

<span id="example-requests-GETapi-v1-users--username--likes-by-tag">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/users/inventore/likes-by-tag" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/users/inventore/likes-by-tag"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-users--username--likes-by-tag">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
  &quot;data&quot;: [
     &quot;total_likes&quot;: 10,
     &quot;likes_by_tag&quot;: [
         {
             &quot;tag_name&quot;: &quot;abstract&quot;,
             &quot;total_likes&quot;: 5
         },
         {
             &quot;tag_name&quot;: &quot;portrait&quot;,
             &quot;total_likes&quot;: 3
         }
     ]
  ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-users--username--likes-by-tag" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-users--username--likes-by-tag"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-users--username--likes-by-tag"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-users--username--likes-by-tag" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-users--username--likes-by-tag">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-users--username--likes-by-tag" data-method="GET"
      data-path="api/v1/users/{username}/likes-by-tag"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-users--username--likes-by-tag', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-users--username--likes-by-tag"
                    onclick="tryItOut('GETapi-v1-users--username--likes-by-tag');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-users--username--likes-by-tag"
                    onclick="cancelTryOut('GETapi-v1-users--username--likes-by-tag');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-users--username--likes-by-tag"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/users/{username}/likes-by-tag</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-users--username--likes-by-tag"
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
                              name="Accept"                data-endpoint="GETapi-v1-users--username--likes-by-tag"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>username</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="username"                data-endpoint="GETapi-v1-users--username--likes-by-tag"
               value="inventore"
               data-component="url">
    <br>
<p>The username of the user Example: <code>inventore</code></p>
            </div>
                    </form>

                    <h2 id="users-GETapi-v1-users--username--artwork-tags">Get User Artwork Tags</h2>

<p>
</p>

<p>Get a list of tags used by a user's artworks</p>

<span id="example-requests-GETapi-v1-users--username--artwork-tags">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/users/quod/artwork-tags" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/users/quod/artwork-tags"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-users--username--artwork-tags">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
  &quot;data&quot;: [
     &quot;tags&quot;: [
         {
             &quot;id&quot;: 1,
             &quot;name&quot;: &quot;abstract&quot;
         },
         {
             &quot;id&quot;: 5,
             &quot;name&quot;: &quot;portrait&quot;
         }
     ]
  ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-users--username--artwork-tags" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-users--username--artwork-tags"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-users--username--artwork-tags"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-users--username--artwork-tags" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-users--username--artwork-tags">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-users--username--artwork-tags" data-method="GET"
      data-path="api/v1/users/{username}/artwork-tags"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-users--username--artwork-tags', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-users--username--artwork-tags"
                    onclick="tryItOut('GETapi-v1-users--username--artwork-tags');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-users--username--artwork-tags"
                    onclick="cancelTryOut('GETapi-v1-users--username--artwork-tags');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-users--username--artwork-tags"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/users/{username}/artwork-tags</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-users--username--artwork-tags"
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
                              name="Accept"                data-endpoint="GETapi-v1-users--username--artwork-tags"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>username</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="username"                data-endpoint="GETapi-v1-users--username--artwork-tags"
               value="quod"
               data-component="url">
    <br>
<p>The username of the user Example: <code>quod</code></p>
            </div>
                    </form>

                    <h2 id="users-GETapi-v1-users--username--artworks">Get User Artworks</h2>

<p>
</p>

<p>Get a list of artworks by a user</p>

<span id="example-requests-GETapi-v1-users--username--artworks">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/users/voluptates/artworks?filter%5Btag%5D=filter%5Btag%5D%3Dabstract&amp;page=1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/users/voluptates/artworks"
);

const params = {
    "filter[tag]": "filter[tag]=abstract",
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

<span id="example-responses-GETapi-v1-users--username--artworks">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 231,
            &quot;title&quot;: &quot;Neque qui debitis voluptas aut.&quot;,
            &quot;description&quot;: &quot;Corrupti non explicabo aut vel ipsam modi quo. Et voluptates possimus dolorum atque dolorum quas. Eligendi blanditiis voluptatem quae est quae. Dolorem id reprehenderit quasi enim rerum sit et.&quot;,
            &quot;status&quot;: &quot;draft&quot;,
            &quot;user_id&quot;: 519,
            &quot;created_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: null
        },
        {
            &quot;id&quot;: 232,
            &quot;title&quot;: &quot;Voluptas ratione officiis nemo sint.&quot;,
            &quot;description&quot;: &quot;Voluptas unde et modi ut. Facilis possimus molestiae commodi eligendi enim porro deleniti. Reiciendis consequuntur eos ea perferendis. Harum nisi ut fuga sit ea quos et.&quot;,
            &quot;status&quot;: &quot;draft&quot;,
            &quot;user_id&quot;: 520,
            &quot;created_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: null
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
<span id="execution-results-GETapi-v1-users--username--artworks" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-users--username--artworks"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-users--username--artworks"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-users--username--artworks" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-users--username--artworks">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-users--username--artworks" data-method="GET"
      data-path="api/v1/users/{username}/artworks"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-users--username--artworks', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-users--username--artworks"
                    onclick="tryItOut('GETapi-v1-users--username--artworks');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-users--username--artworks"
                    onclick="cancelTryOut('GETapi-v1-users--username--artworks');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-users--username--artworks"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/users/{username}/artworks</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-users--username--artworks"
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
                              name="Accept"                data-endpoint="GETapi-v1-users--username--artworks"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>username</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="username"                data-endpoint="GETapi-v1-users--username--artworks"
               value="voluptates"
               data-component="url">
    <br>
<p>The username of the user Example: <code>voluptates</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>filter[tag]</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="filter[tag]"                data-endpoint="GETapi-v1-users--username--artworks"
               value="filter[tag]=abstract"
               data-component="query">
    <br>
<p>Filter artworks by tag. Example: <code>filter[tag]=abstract</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>page</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="page"                data-endpoint="GETapi-v1-users--username--artworks"
               value="1"
               data-component="query">
    <br>
<p>The page number to fetch. Example: <code>1</code></p>
            </div>
                </form>

                    <h2 id="users-GETapi-v1-users-authenticated-user">Get Authenticated User</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Get the authenticated user</p>

<span id="example-requests-GETapi-v1-users-authenticated-user">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/users/authenticated-user" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/users/authenticated-user"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-users-authenticated-user">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 521,
        &quot;username&quot;: &quot;jody53&quot;,
        &quot;first_name&quot;: &quot;Ervin&quot;,
        &quot;last_name&quot;: &quot;Blanda&quot;,
        &quot;email&quot;: &quot;monahan.veda@example.net&quot;,
        &quot;country&quot;: &quot;Philippines&quot;,
        &quot;bio&quot;: &quot;Veritatis a laboriosam aut quaerat. Delectus et voluptas et quia. Consequatur commodi perspiciatis error iusto perferendis voluptates quia. Iusto qui eveniet dolorum dolorem facilis cumque ipsa distinctio.&quot;,
        &quot;photo&quot;: null,
        &quot;artist_verified_at&quot;: &quot;2025-01-21 08:36:10&quot;,
        &quot;email_verified_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
        &quot;created_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-users-authenticated-user" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-users-authenticated-user"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-users-authenticated-user"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-users-authenticated-user" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-users-authenticated-user">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-users-authenticated-user" data-method="GET"
      data-path="api/v1/users/authenticated-user"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-users-authenticated-user', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-users-authenticated-user"
                    onclick="tryItOut('GETapi-v1-users-authenticated-user');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-users-authenticated-user"
                    onclick="cancelTryOut('GETapi-v1-users-authenticated-user');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-users-authenticated-user"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/users/authenticated-user</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-users-authenticated-user"
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
                              name="Accept"                data-endpoint="GETapi-v1-users-authenticated-user"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="users-GETapi-v1-users-authenticated-user-artworks">Get Authenticated User Artworks</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Get a list of artworks by the authenticated user</p>

<span id="example-requests-GETapi-v1-users-authenticated-user-artworks">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/users/authenticated-user/artworks?page=1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/users/authenticated-user/artworks"
);

const params = {
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

<span id="example-responses-GETapi-v1-users-authenticated-user-artworks">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 233,
            &quot;title&quot;: &quot;Voluptatum quaerat ducimus sed libero omnis aliquid.&quot;,
            &quot;description&quot;: &quot;Inventore alias facere exercitationem ipsam sapiente reiciendis ut consectetur. Expedita qui et consectetur dolor. Deserunt consequatur optio itaque rerum ea sunt dolorem. Consequuntur rem enim dolor molestias et consequatur.&quot;,
            &quot;status&quot;: &quot;draft&quot;,
            &quot;user_id&quot;: 522,
            &quot;created_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: null,
            &quot;artwork_photos&quot;: [
                {
                    &quot;id&quot;: 119,
                    &quot;path&quot;: &quot;0&quot;,
                    &quot;is_main&quot;: 0,
                    &quot;artwork_id&quot;: 233,
                    &quot;created_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;
                }
            ],
            &quot;tags&quot;: [
                {
                    &quot;id&quot;: 117,
                    &quot;name&quot;: &quot;Mr. Eino Rolfson&quot;,
                    &quot;created_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
                    &quot;pivot&quot;: {
                        &quot;artwork_id&quot;: 233,
                        &quot;tag_id&quot;: 117
                    }
                }
            ]
        },
        {
            &quot;id&quot;: 234,
            &quot;title&quot;: &quot;Quia ut modi et consequatur.&quot;,
            &quot;description&quot;: &quot;Non quod omnis non voluptatum. Aliquam quos maxime officiis dolor possimus. Dolorem non reprehenderit consequatur eius. Dolores recusandae et molestias ex quidem totam.&quot;,
            &quot;status&quot;: &quot;draft&quot;,
            &quot;user_id&quot;: 523,
            &quot;created_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: null,
            &quot;artwork_photos&quot;: [
                {
                    &quot;id&quot;: 120,
                    &quot;path&quot;: &quot;0&quot;,
                    &quot;is_main&quot;: 0,
                    &quot;artwork_id&quot;: 234,
                    &quot;created_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;
                }
            ],
            &quot;tags&quot;: [
                {
                    &quot;id&quot;: 118,
                    &quot;name&quot;: &quot;Mabelle Kirlin&quot;,
                    &quot;created_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
                    &quot;pivot&quot;: {
                        &quot;artwork_id&quot;: 234,
                        &quot;tag_id&quot;: 118
                    }
                }
            ]
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
<span id="execution-results-GETapi-v1-users-authenticated-user-artworks" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-users-authenticated-user-artworks"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-users-authenticated-user-artworks"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-users-authenticated-user-artworks" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-users-authenticated-user-artworks">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-users-authenticated-user-artworks" data-method="GET"
      data-path="api/v1/users/authenticated-user/artworks"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-users-authenticated-user-artworks', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-users-authenticated-user-artworks"
                    onclick="tryItOut('GETapi-v1-users-authenticated-user-artworks');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-users-authenticated-user-artworks"
                    onclick="cancelTryOut('GETapi-v1-users-authenticated-user-artworks');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-users-authenticated-user-artworks"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/users/authenticated-user/artworks</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-users-authenticated-user-artworks"
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
                              name="Accept"                data-endpoint="GETapi-v1-users-authenticated-user-artworks"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>page</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="page"                data-endpoint="GETapi-v1-users-authenticated-user-artworks"
               value="1"
               data-component="query">
    <br>
<p>The page number to fetch. Example: <code>1</code></p>
            </div>
                </form>

                    <h2 id="users-GETapi-v1-users-authenticated-user-favorite-artworks">Get Authenticated User Favorite Artworks</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Get a list of artworks marked as favorite by the authenticated user</p>

<span id="example-requests-GETapi-v1-users-authenticated-user-favorite-artworks">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/users/authenticated-user/favorite-artworks?page=1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/users/authenticated-user/favorite-artworks"
);

const params = {
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

<span id="example-responses-GETapi-v1-users-authenticated-user-favorite-artworks">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 235,
            &quot;title&quot;: &quot;Unde officiis qui nihil.&quot;,
            &quot;description&quot;: &quot;Quia ipsa quisquam culpa odio. Aperiam consequatur velit magni aut eos.&quot;,
            &quot;status&quot;: &quot;draft&quot;,
            &quot;user_id&quot;: 524,
            &quot;created_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: null,
            &quot;artwork_photos&quot;: [
                {
                    &quot;id&quot;: 121,
                    &quot;path&quot;: &quot;0&quot;,
                    &quot;is_main&quot;: 0,
                    &quot;artwork_id&quot;: 235,
                    &quot;created_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;
                }
            ],
            &quot;tags&quot;: [
                {
                    &quot;id&quot;: 119,
                    &quot;name&quot;: &quot;Dr. Stephen Schroeder&quot;,
                    &quot;created_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
                    &quot;pivot&quot;: {
                        &quot;artwork_id&quot;: 235,
                        &quot;tag_id&quot;: 119
                    }
                }
            ]
        },
        {
            &quot;id&quot;: 236,
            &quot;title&quot;: &quot;Reiciendis eius natus atque voluptatem.&quot;,
            &quot;description&quot;: &quot;Tempora et voluptatem doloremque architecto error. Magnam dolorem sint qui quia. Et ipsum ipsum odio rerum repudiandae aut. Est eum et officia sed qui. Mollitia error aut id soluta nesciunt eveniet.&quot;,
            &quot;status&quot;: &quot;draft&quot;,
            &quot;user_id&quot;: 525,
            &quot;created_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: &quot;0&quot;,
            &quot;artwork_photos&quot;: [
                {
                    &quot;id&quot;: 122,
                    &quot;path&quot;: &quot;0&quot;,
                    &quot;is_main&quot;: 1,
                    &quot;artwork_id&quot;: 236,
                    &quot;created_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;
                }
            ],
            &quot;tags&quot;: [
                {
                    &quot;id&quot;: 120,
                    &quot;name&quot;: &quot;Ransom Schmidt I&quot;,
                    &quot;created_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
                    &quot;pivot&quot;: {
                        &quot;artwork_id&quot;: 236,
                        &quot;tag_id&quot;: 120
                    }
                }
            ]
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
<span id="execution-results-GETapi-v1-users-authenticated-user-favorite-artworks" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-users-authenticated-user-favorite-artworks"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-users-authenticated-user-favorite-artworks"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-users-authenticated-user-favorite-artworks" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-users-authenticated-user-favorite-artworks">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-users-authenticated-user-favorite-artworks" data-method="GET"
      data-path="api/v1/users/authenticated-user/favorite-artworks"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-users-authenticated-user-favorite-artworks', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-users-authenticated-user-favorite-artworks"
                    onclick="tryItOut('GETapi-v1-users-authenticated-user-favorite-artworks');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-users-authenticated-user-favorite-artworks"
                    onclick="cancelTryOut('GETapi-v1-users-authenticated-user-favorite-artworks');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-users-authenticated-user-favorite-artworks"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/users/authenticated-user/favorite-artworks</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-users-authenticated-user-favorite-artworks"
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
                              name="Accept"                data-endpoint="GETapi-v1-users-authenticated-user-favorite-artworks"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>page</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="page"                data-endpoint="GETapi-v1-users-authenticated-user-favorite-artworks"
               value="1"
               data-component="query">
    <br>
<p>The page number to fetch. Example: <code>1</code></p>
            </div>
                </form>

                    <h2 id="users-GETapi-v1-users-authenticated-user-followers">Get Authenticated User Following</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Get a list of users the authenticated user is following</p>

<span id="example-requests-GETapi-v1-users-authenticated-user-followers">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/users/authenticated-user/followers?page=1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/users/authenticated-user/followers"
);

const params = {
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

<span id="example-responses-GETapi-v1-users-authenticated-user-followers">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 526,
            &quot;username&quot;: &quot;zboncak.marley&quot;,
            &quot;first_name&quot;: &quot;Christian&quot;,
            &quot;last_name&quot;: &quot;Kuhic&quot;,
            &quot;email&quot;: &quot;cbatz@example.org&quot;,
            &quot;country&quot;: &quot;Swaziland&quot;,
            &quot;bio&quot;: &quot;Facere a id occaecati omnis alias praesentium. Perspiciatis vel libero at soluta harum ut. Veritatis officiis qui cupiditate nesciunt officia. Totam omnis et animi praesentium. Ut reprehenderit blanditiis sit exercitationem dicta hic et.&quot;,
            &quot;photo&quot;: &quot;https://via.placeholder.com/640x480.png/00ddee?text=aliquam&quot;,
            &quot;artist_verified_at&quot;: null,
            &quot;email_verified_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
            &quot;created_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;
        },
        {
            &quot;id&quot;: 527,
            &quot;username&quot;: &quot;rosalyn.grimes&quot;,
            &quot;first_name&quot;: &quot;Matilda&quot;,
            &quot;last_name&quot;: &quot;VonRueden&quot;,
            &quot;email&quot;: &quot;vgrimes@example.com&quot;,
            &quot;country&quot;: &quot;Heard Island and McDonald Islands&quot;,
            &quot;bio&quot;: &quot;Quidem laudantium repellendus commodi rerum. Quidem eos dolores placeat qui ut blanditiis esse.&quot;,
            &quot;photo&quot;: null,
            &quot;artist_verified_at&quot;: null,
            &quot;email_verified_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
            &quot;created_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-21T08:36:10.000000Z&quot;
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
<span id="execution-results-GETapi-v1-users-authenticated-user-followers" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-users-authenticated-user-followers"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-users-authenticated-user-followers"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-users-authenticated-user-followers" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-users-authenticated-user-followers">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-users-authenticated-user-followers" data-method="GET"
      data-path="api/v1/users/authenticated-user/followers"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-users-authenticated-user-followers', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-users-authenticated-user-followers"
                    onclick="tryItOut('GETapi-v1-users-authenticated-user-followers');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-users-authenticated-user-followers"
                    onclick="cancelTryOut('GETapi-v1-users-authenticated-user-followers');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-users-authenticated-user-followers"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/users/authenticated-user/followers</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-users-authenticated-user-followers"
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
                              name="Accept"                data-endpoint="GETapi-v1-users-authenticated-user-followers"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>page</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="page"                data-endpoint="GETapi-v1-users-authenticated-user-followers"
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
