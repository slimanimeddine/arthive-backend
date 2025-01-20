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
                                                                                <li class="tocify-item level-2" data-unique="artworks-GETapi-v1-users--username--artworks">
                                <a href="#artworks-GETapi-v1-users--username--artworks">Get User Artworks</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-authentication" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authentication">
                    <a href="#authentication">Authentication</a>
                </li>
                                    <ul id="tocify-subheader-authentication" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="authentication-POSTapi-v1-sign-in">
                                <a href="#authentication-POSTapi-v1-sign-in">Sign in</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentication-POSTapi-v1-sign-up">
                                <a href="#authentication-POSTapi-v1-sign-up">Sign up</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentication-POSTapi-v1-sign-out">
                                <a href="#authentication-POSTapi-v1-sign-out">Sign out</a>
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
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: January 20, 2025</li>
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
            &quot;id&quot;: 155,
            &quot;title&quot;: &quot;Delectus dolore eveniet voluptatum et voluptates qui.&quot;,
            &quot;description&quot;: &quot;Impedit aut error suscipit amet fugit at sit. Laboriosam ratione maiores aut itaque sunt. Atque dolorem quaerat illo sed.&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;user_id&quot;: 391,
            &quot;created_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: null,
            &quot;user&quot;: {
                &quot;id&quot;: 391,
                &quot;username&quot;: &quot;lane.harber&quot;,
                &quot;first_name&quot;: &quot;Jewell&quot;,
                &quot;last_name&quot;: &quot;Crona&quot;,
                &quot;email&quot;: &quot;minerva96@example.net&quot;,
                &quot;country&quot;: &quot;Estonia&quot;,
                &quot;bio&quot;: &quot;Et et molestiae iure qui quo quas aliquid consequatur. At et illum reprehenderit aut. Et odit enim cupiditate commodi sint rerum consequuntur. Modi neque tempora saepe porro.&quot;,
                &quot;photo&quot;: &quot;https://via.placeholder.com/640x480.png/007711?text=est&quot;,
                &quot;artist_verified_at&quot;: null,
                &quot;email_verified_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
                &quot;created_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 156,
            &quot;title&quot;: &quot;Voluptatibus earum aliquid repellat cumque dolor.&quot;,
            &quot;description&quot;: &quot;Maiores possimus alias atque ex. Dicta alias est tenetur.&quot;,
            &quot;status&quot;: &quot;draft&quot;,
            &quot;user_id&quot;: 392,
            &quot;created_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: null,
            &quot;user&quot;: {
                &quot;id&quot;: 392,
                &quot;username&quot;: &quot;lynch.corrine&quot;,
                &quot;first_name&quot;: &quot;Lera&quot;,
                &quot;last_name&quot;: &quot;Maggio&quot;,
                &quot;email&quot;: &quot;dhagenes@example.com&quot;,
                &quot;country&quot;: &quot;Kiribati&quot;,
                &quot;bio&quot;: &quot;Laboriosam consequuntur ullam itaque. Sint velit rerum ea. Nihil nam sit ratione distinctio.&quot;,
                &quot;photo&quot;: null,
                &quot;artist_verified_at&quot;: &quot;2025-01-20 18:13:22&quot;,
                &quot;email_verified_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
                &quot;created_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;
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
    --get "http://localhost:8000/api/v1/artworks/trending/7" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artworks/trending/7"
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
            &quot;id&quot;: 157,
            &quot;title&quot;: &quot;Fugit mollitia enim quae harum sed qui.&quot;,
            &quot;description&quot;: &quot;Eos sed ex eos voluptas. Omnis eaque mollitia aut perferendis facilis. Soluta facilis earum rem quod officiis dolores doloremque deleniti.&quot;,
            &quot;status&quot;: &quot;draft&quot;,
            &quot;user_id&quot;: 393,
            &quot;created_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: null,
            &quot;user&quot;: {
                &quot;id&quot;: 393,
                &quot;username&quot;: &quot;armstrong.juana&quot;,
                &quot;first_name&quot;: &quot;Aurore&quot;,
                &quot;last_name&quot;: &quot;Conroy&quot;,
                &quot;email&quot;: &quot;al.durgan@example.org&quot;,
                &quot;country&quot;: &quot;Guatemala&quot;,
                &quot;bio&quot;: &quot;Sunt cum qui quae ipsam velit quo. Voluptas voluptatem ipsum veritatis odio dolore eaque. Voluptates dolore repellendus repudiandae quis ut enim nisi.&quot;,
                &quot;photo&quot;: null,
                &quot;artist_verified_at&quot;: null,
                &quot;email_verified_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
                &quot;created_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 158,
            &quot;title&quot;: &quot;Nesciunt et sed deleniti aut explicabo consequuntur.&quot;,
            &quot;description&quot;: &quot;Sapiente magni quae neque officia cupiditate sit quasi quia. Aliquam aut enim dolorem. Eos quos eveniet est consequatur quos ut quis. Dolores sed iste sint rerum tenetur provident.&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;user_id&quot;: 394,
            &quot;created_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: null,
            &quot;user&quot;: {
                &quot;id&quot;: 394,
                &quot;username&quot;: &quot;lenny.schaefer&quot;,
                &quot;first_name&quot;: &quot;Marilyne&quot;,
                &quot;last_name&quot;: &quot;Parisian&quot;,
                &quot;email&quot;: &quot;bins.trevor@example.com&quot;,
                &quot;country&quot;: &quot;Guyana&quot;,
                &quot;bio&quot;: &quot;Consequuntur quasi sed facilis neque ducimus voluptatibus autem. Quia recusandae aliquid corporis quia.&quot;,
                &quot;photo&quot;: &quot;https://via.placeholder.com/640x480.png/009988?text=error&quot;,
                &quot;artist_verified_at&quot;: null,
                &quot;email_verified_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
                &quot;created_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;
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
               value="7"
               data-component="url">
    <br>
<p>The number of records to retrieve Example: <code>7</code></p>
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
    --get "http://localhost:8000/api/v1/artworks/new/16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artworks/new/16"
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
            &quot;id&quot;: 159,
            &quot;title&quot;: &quot;Veniam impedit est eligendi sit.&quot;,
            &quot;description&quot;: &quot;Perferendis harum quo perspiciatis tenetur sit. Veniam doloremque et numquam incidunt dolores reprehenderit odit eveniet. Dolorum et similique voluptas molestiae quo. Fuga dolor in tenetur laboriosam quo. Minima quis magni pariatur voluptas consequatur.&quot;,
            &quot;status&quot;: &quot;draft&quot;,
            &quot;user_id&quot;: 395,
            &quot;created_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: null,
            &quot;user&quot;: {
                &quot;id&quot;: 395,
                &quot;username&quot;: &quot;cathy56&quot;,
                &quot;first_name&quot;: &quot;Rosemary&quot;,
                &quot;last_name&quot;: &quot;Pacocha&quot;,
                &quot;email&quot;: &quot;egrady@example.com&quot;,
                &quot;country&quot;: &quot;Ukraine&quot;,
                &quot;bio&quot;: &quot;Qui culpa cum et quia dolore. Quis et nemo sint unde in dignissimos ut. Qui perspiciatis natus qui eaque illo est minus.&quot;,
                &quot;photo&quot;: &quot;https://via.placeholder.com/640x480.png/0066dd?text=voluptas&quot;,
                &quot;artist_verified_at&quot;: null,
                &quot;email_verified_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
                &quot;created_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 160,
            &quot;title&quot;: &quot;Illo quo dolor cumque.&quot;,
            &quot;description&quot;: &quot;Voluptate occaecati qui voluptatum et dolorum. Odit omnis error deleniti debitis voluptate dolore unde. Iure qui autem quia illo mollitia.&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;user_id&quot;: 396,
            &quot;created_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: null,
            &quot;user&quot;: {
                &quot;id&quot;: 396,
                &quot;username&quot;: &quot;vgottlieb&quot;,
                &quot;first_name&quot;: &quot;Destin&quot;,
                &quot;last_name&quot;: &quot;Schroeder&quot;,
                &quot;email&quot;: &quot;schmidt.shania@example.org&quot;,
                &quot;country&quot;: &quot;Northern Mariana Islands&quot;,
                &quot;bio&quot;: &quot;Sapiente enim libero ullam tempore. Iste nostrum laboriosam rerum est facilis et. Consequatur at possimus id iste quia dolorem quasi.&quot;,
                &quot;photo&quot;: null,
                &quot;artist_verified_at&quot;: &quot;2025-01-20 18:13:22&quot;,
                &quot;email_verified_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
                &quot;created_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;
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
               value="16"
               data-component="url">
    <br>
<p>The number of records to retrieve Example: <code>16</code></p>
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
    --get "http://localhost:8000/api/v1/artworks/13" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artworks/13"
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
            &quot;id&quot;: 161,
            &quot;title&quot;: &quot;Laborum aut fugit quas.&quot;,
            &quot;description&quot;: &quot;Ratione error id cupiditate sint laboriosam. Consequatur aliquid dolor voluptatem odio.&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;user_id&quot;: 397,
            &quot;created_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 1,
            &quot;artwork_comments_count&quot;: 1,
            &quot;artwork_main_photo_path&quot;: null,
            &quot;user&quot;: {
                &quot;id&quot;: 397,
                &quot;username&quot;: &quot;huels.madilyn&quot;,
                &quot;first_name&quot;: &quot;Tierra&quot;,
                &quot;last_name&quot;: &quot;Kertzmann&quot;,
                &quot;email&quot;: &quot;camille.wilkinson@example.com&quot;,
                &quot;country&quot;: &quot;Cocos (Keeling) Islands&quot;,
                &quot;bio&quot;: &quot;Dolores laboriosam ut ut autem. Quia sapiente et eaque blanditiis. Eligendi veniam vitae odio illum totam. Impedit aliquid impedit quidem culpa facere.&quot;,
                &quot;photo&quot;: null,
                &quot;artist_verified_at&quot;: &quot;2025-01-20 18:13:22&quot;,
                &quot;email_verified_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
                &quot;created_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;
            },
            &quot;artwork_photos&quot;: [
                {
                    &quot;id&quot;: 101,
                    &quot;path&quot;: &quot;0&quot;,
                    &quot;is_main&quot;: 0,
                    &quot;artwork_id&quot;: 161,
                    &quot;created_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;
                }
            ],
            &quot;artwork_comments&quot;: [
                {
                    &quot;id&quot;: 99,
                    &quot;comment_text&quot;: &quot;Facere enim voluptatem in quas dolores reiciendis consequatur.&quot;,
                    &quot;artwork_id&quot;: 161,
                    &quot;user_id&quot;: 398,
                    &quot;created_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
                    &quot;user&quot;: {
                        &quot;id&quot;: 398,
                        &quot;username&quot;: &quot;brando81&quot;,
                        &quot;first_name&quot;: &quot;Noemi&quot;,
                        &quot;last_name&quot;: &quot;Casper&quot;,
                        &quot;email&quot;: &quot;abdullah.kassulke@example.com&quot;,
                        &quot;country&quot;: &quot;Liberia&quot;,
                        &quot;bio&quot;: &quot;Accusantium ea dignissimos consectetur assumenda nisi. Aliquam delectus vel rem nobis provident aperiam atque. Exercitationem ea aut veritatis. Aliquam voluptatem non nihil porro itaque.&quot;,
                        &quot;photo&quot;: &quot;https://via.placeholder.com/640x480.png/004477?text=nemo&quot;,
                        &quot;artist_verified_at&quot;: &quot;2025-01-20 18:13:22&quot;,
                        &quot;email_verified_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
                        &quot;created_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;
                    }
                }
            ],
            &quot;artwork_likes&quot;: [
                {
                    &quot;id&quot;: 99,
                    &quot;artwork_id&quot;: 161,
                    &quot;user_id&quot;: 399,
                    &quot;created_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
                    &quot;user&quot;: {
                        &quot;id&quot;: 399,
                        &quot;username&quot;: &quot;bernier.lindsey&quot;,
                        &quot;first_name&quot;: &quot;Joshua&quot;,
                        &quot;last_name&quot;: &quot;Ryan&quot;,
                        &quot;email&quot;: &quot;lilla.gerlach@example.com&quot;,
                        &quot;country&quot;: &quot;Jersey&quot;,
                        &quot;bio&quot;: &quot;Ut ea sit et eos sed voluptatum incidunt. Non molestias eum magnam a et.&quot;,
                        &quot;photo&quot;: &quot;https://via.placeholder.com/640x480.png/004499?text=aliquid&quot;,
                        &quot;artist_verified_at&quot;: null,
                        &quot;email_verified_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
                        &quot;created_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;
                    }
                }
            ],
            &quot;tags&quot;: [
                {
                    &quot;id&quot;: 99,
                    &quot;name&quot;: &quot;Miss Chyna Lehner&quot;,
                    &quot;created_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
                    &quot;pivot&quot;: {
                        &quot;artwork_id&quot;: 161,
                        &quot;tag_id&quot;: 99
                    }
                }
            ]
        },
        {
            &quot;id&quot;: 162,
            &quot;title&quot;: &quot;Eum doloribus fuga et id.&quot;,
            &quot;description&quot;: &quot;Ut inventore sint facilis hic in temporibus praesentium. Aliquid dolor voluptas qui voluptas. Ut velit eligendi velit.&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;user_id&quot;: 400,
            &quot;created_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 1,
            &quot;artwork_comments_count&quot;: 1,
            &quot;artwork_main_photo_path&quot;: null,
            &quot;user&quot;: {
                &quot;id&quot;: 400,
                &quot;username&quot;: &quot;ebony72&quot;,
                &quot;first_name&quot;: &quot;Leopoldo&quot;,
                &quot;last_name&quot;: &quot;Ferry&quot;,
                &quot;email&quot;: &quot;garry73@example.net&quot;,
                &quot;country&quot;: &quot;Hungary&quot;,
                &quot;bio&quot;: &quot;Nostrum et non aliquid quo quos. Nam occaecati ad quia eos voluptate odit sapiente. Eum ut et dolorem non voluptatem non.&quot;,
                &quot;photo&quot;: null,
                &quot;artist_verified_at&quot;: &quot;2025-01-20 18:13:22&quot;,
                &quot;email_verified_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
                &quot;created_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;
            },
            &quot;artwork_photos&quot;: [
                {
                    &quot;id&quot;: 102,
                    &quot;path&quot;: &quot;0&quot;,
                    &quot;is_main&quot;: 0,
                    &quot;artwork_id&quot;: 162,
                    &quot;created_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;
                }
            ],
            &quot;artwork_comments&quot;: [
                {
                    &quot;id&quot;: 100,
                    &quot;comment_text&quot;: &quot;Similique fuga porro voluptatum et quis quis porro.&quot;,
                    &quot;artwork_id&quot;: 162,
                    &quot;user_id&quot;: 401,
                    &quot;created_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
                    &quot;user&quot;: {
                        &quot;id&quot;: 401,
                        &quot;username&quot;: &quot;oreilly.jammie&quot;,
                        &quot;first_name&quot;: &quot;Alessia&quot;,
                        &quot;last_name&quot;: &quot;Quigley&quot;,
                        &quot;email&quot;: &quot;carole94@example.com&quot;,
                        &quot;country&quot;: &quot;Jordan&quot;,
                        &quot;bio&quot;: &quot;Amet fugiat sed exercitationem id consequatur enim. Molestiae natus officia odio ipsa non sunt. Eligendi dignissimos dignissimos quis quos mollitia. Deserunt tempora dicta porro est enim provident ut. Nostrum unde odit dolor sapiente.&quot;,
                        &quot;photo&quot;: &quot;https://via.placeholder.com/640x480.png/00ff99?text=est&quot;,
                        &quot;artist_verified_at&quot;: null,
                        &quot;email_verified_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
                        &quot;created_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;
                    }
                }
            ],
            &quot;artwork_likes&quot;: [
                {
                    &quot;id&quot;: 100,
                    &quot;artwork_id&quot;: 162,
                    &quot;user_id&quot;: 402,
                    &quot;created_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
                    &quot;user&quot;: {
                        &quot;id&quot;: 402,
                        &quot;username&quot;: &quot;briana.ondricka&quot;,
                        &quot;first_name&quot;: &quot;Sigurd&quot;,
                        &quot;last_name&quot;: &quot;Nolan&quot;,
                        &quot;email&quot;: &quot;west.gabriella@example.org&quot;,
                        &quot;country&quot;: &quot;Czech Republic&quot;,
                        &quot;bio&quot;: &quot;Consectetur et qui et voluptatum sunt tenetur consectetur. Quia commodi placeat suscipit itaque occaecati. Doloremque eum excepturi harum ut. Est dolor et non in cupiditate ut illum.&quot;,
                        &quot;photo&quot;: null,
                        &quot;artist_verified_at&quot;: null,
                        &quot;email_verified_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
                        &quot;created_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;
                    }
                }
            ],
            &quot;tags&quot;: [
                {
                    &quot;id&quot;: 100,
                    &quot;name&quot;: &quot;Jarrett Jenkins&quot;,
                    &quot;created_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-20T18:13:22.000000Z&quot;,
                    &quot;pivot&quot;: {
                        &quot;artwork_id&quot;: 162,
                        &quot;tag_id&quot;: 100
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
               value="13"
               data-component="url">
    <br>
<p>The id of the artwork Example: <code>13</code></p>
            </div>
                    </form>

                    <h2 id="artworks-GETapi-v1-users--username--artworks">Get User Artworks</h2>

<p>
</p>

<p>Get a list of artworks by a user</p>

<span id="example-requests-GETapi-v1-users--username--artworks">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/users/et/artworks?filter%5Btag%5D=filter%5Btag%5D%3Dabstract&amp;page=1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/users/et/artworks"
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
            &quot;id&quot;: 165,
            &quot;title&quot;: &quot;Necessitatibus voluptatem dolorem fugiat.&quot;,
            &quot;description&quot;: &quot;Delectus nobis beatae dolorem cupiditate aut quaerat consequuntur. Cum id eum consequuntur qui velit ipsa. Accusantium placeat incidunt animi ipsum aspernatur optio.&quot;,
            &quot;status&quot;: &quot;draft&quot;,
            &quot;user_id&quot;: 409,
            &quot;created_at&quot;: &quot;2025-01-20T18:13:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-20T18:13:23.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: null,
            &quot;user&quot;: {
                &quot;id&quot;: 409,
                &quot;username&quot;: &quot;lola.harris&quot;,
                &quot;first_name&quot;: &quot;Eliseo&quot;,
                &quot;last_name&quot;: &quot;Trantow&quot;,
                &quot;email&quot;: &quot;tmurphy@example.net&quot;,
                &quot;country&quot;: &quot;Grenada&quot;,
                &quot;bio&quot;: &quot;Qui ut quis consequatur dolores. Ipsum tenetur aut itaque nobis fuga rerum et. Distinctio sunt voluptatem velit sint voluptatem magni ipsum velit.&quot;,
                &quot;photo&quot;: &quot;https://via.placeholder.com/640x480.png/0011ee?text=aperiam&quot;,
                &quot;artist_verified_at&quot;: null,
                &quot;email_verified_at&quot;: &quot;2025-01-20T18:13:23.000000Z&quot;,
                &quot;created_at&quot;: &quot;2025-01-20T18:13:23.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-20T18:13:23.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 166,
            &quot;title&quot;: &quot;Officia rerum similique non non.&quot;,
            &quot;description&quot;: &quot;Odio quo molestias consectetur ut quo. Earum quaerat nam esse laborum atque expedita harum. Aut similique sapiente accusantium officia. Porro minima reprehenderit dicta ad nobis.&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;user_id&quot;: 410,
            &quot;created_at&quot;: &quot;2025-01-20T18:13:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-20T18:13:23.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: null,
            &quot;user&quot;: {
                &quot;id&quot;: 410,
                &quot;username&quot;: &quot;qlang&quot;,
                &quot;first_name&quot;: &quot;Oceane&quot;,
                &quot;last_name&quot;: &quot;Rolfson&quot;,
                &quot;email&quot;: &quot;myundt@example.org&quot;,
                &quot;country&quot;: &quot;French Guiana&quot;,
                &quot;bio&quot;: &quot;Natus voluptatem id vitae deserunt a repellat. Quis dignissimos pariatur magnam facere est et praesentium numquam. Architecto nihil nostrum id quis aliquam et illo.&quot;,
                &quot;photo&quot;: null,
                &quot;artist_verified_at&quot;: null,
                &quot;email_verified_at&quot;: &quot;2025-01-20T18:13:23.000000Z&quot;,
                &quot;created_at&quot;: &quot;2025-01-20T18:13:23.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-20T18:13:23.000000Z&quot;
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
               value="et"
               data-component="url">
    <br>
<p>The username of the user Example: <code>et</code></p>
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

                <h1 id="authentication">Authentication</h1>

    

                                <h2 id="authentication-POSTapi-v1-sign-in">Sign in</h2>

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

                    <h2 id="authentication-POSTapi-v1-sign-up">Sign up</h2>

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

                    <h2 id="authentication-POSTapi-v1-sign-out">Sign out</h2>

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
            &quot;id&quot;: 403,
            &quot;username&quot;: &quot;chesley.strosin&quot;,
            &quot;first_name&quot;: &quot;Cordell&quot;,
            &quot;last_name&quot;: &quot;Deckow&quot;,
            &quot;email&quot;: &quot;marques.homenick@example.net&quot;,
            &quot;country&quot;: &quot;Lebanon&quot;,
            &quot;bio&quot;: &quot;Enim ad atque omnis voluptates. Quasi recusandae quod aspernatur et. Nihil fugit molestias nihil illum.&quot;,
            &quot;photo&quot;: &quot;https://via.placeholder.com/640x480.png/0000ee?text=eveniet&quot;,
            &quot;artist_verified_at&quot;: &quot;2025-01-20 18:13:23&quot;,
            &quot;email_verified_at&quot;: &quot;2025-01-20T18:13:23.000000Z&quot;,
            &quot;created_at&quot;: &quot;2025-01-20T18:13:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-20T18:13:23.000000Z&quot;,
            &quot;artworks&quot;: [
                {
                    &quot;id&quot;: 163,
                    &quot;title&quot;: &quot;Officia aut numquam voluptatem autem corrupti.&quot;,
                    &quot;description&quot;: &quot;Perferendis neque ea aspernatur eius. Est illo facere rerum et et in reprehenderit aut. Sit doloribus delectus tenetur.&quot;,
                    &quot;status&quot;: &quot;published&quot;,
                    &quot;user_id&quot;: 403,
                    &quot;created_at&quot;: &quot;2025-01-20T18:13:23.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-20T18:13:23.000000Z&quot;,
                    &quot;artwork_likes_count&quot;: 0,
                    &quot;artwork_comments_count&quot;: 0,
                    &quot;artwork_main_photo_path&quot;: null
                }
            ]
        },
        {
            &quot;id&quot;: 404,
            &quot;username&quot;: &quot;monserrat82&quot;,
            &quot;first_name&quot;: &quot;Erwin&quot;,
            &quot;last_name&quot;: &quot;Nikolaus&quot;,
            &quot;email&quot;: &quot;orval.gottlieb@example.com&quot;,
            &quot;country&quot;: &quot;Ethiopia&quot;,
            &quot;bio&quot;: &quot;Debitis eos velit cupiditate. Tempora assumenda laboriosam asperiores. Et saepe fugiat maiores qui at aut et. Adipisci amet distinctio enim voluptatibus molestiae qui.&quot;,
            &quot;photo&quot;: null,
            &quot;artist_verified_at&quot;: null,
            &quot;email_verified_at&quot;: &quot;2025-01-20T18:13:23.000000Z&quot;,
            &quot;created_at&quot;: &quot;2025-01-20T18:13:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-20T18:13:23.000000Z&quot;,
            &quot;artworks&quot;: [
                {
                    &quot;id&quot;: 164,
                    &quot;title&quot;: &quot;Dignissimos laboriosam soluta unde neque voluptatem doloremque.&quot;,
                    &quot;description&quot;: &quot;Sapiente et exercitationem molestias veniam eos est ducimus. Iure ipsum facilis quod doloremque. Rerum molestiae quos vel voluptatum officia quo laborum.&quot;,
                    &quot;status&quot;: &quot;draft&quot;,
                    &quot;user_id&quot;: 404,
                    &quot;created_at&quot;: &quot;2025-01-20T18:13:23.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-20T18:13:23.000000Z&quot;,
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
    --get "http://localhost:8000/api/v1/users/verified/4" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/users/verified/4"
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
            &quot;id&quot;: 405,
            &quot;username&quot;: &quot;buckridge.ozella&quot;,
            &quot;first_name&quot;: &quot;Mckenzie&quot;,
            &quot;last_name&quot;: &quot;Quitzon&quot;,
            &quot;email&quot;: &quot;fschuppe@example.net&quot;,
            &quot;country&quot;: &quot;Hungary&quot;,
            &quot;bio&quot;: &quot;Quas voluptatem ea reiciendis dicta earum occaecati. Laborum aspernatur praesentium occaecati assumenda omnis. Dolorum alias fugit repudiandae.&quot;,
            &quot;photo&quot;: &quot;https://via.placeholder.com/640x480.png/00bb00?text=adipisci&quot;,
            &quot;artist_verified_at&quot;: &quot;2025-01-20 18:13:23&quot;,
            &quot;email_verified_at&quot;: &quot;2025-01-20T18:13:23.000000Z&quot;,
            &quot;created_at&quot;: &quot;2025-01-20T18:13:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-20T18:13:23.000000Z&quot;
        },
        {
            &quot;id&quot;: 406,
            &quot;username&quot;: &quot;hdietrich&quot;,
            &quot;first_name&quot;: &quot;Lisette&quot;,
            &quot;last_name&quot;: &quot;Hessel&quot;,
            &quot;email&quot;: &quot;stanton.hettie@example.net&quot;,
            &quot;country&quot;: &quot;Tonga&quot;,
            &quot;bio&quot;: &quot;Quia praesentium expedita nam error vero. Quia sunt facere eos. Et dolorum voluptatem sint et explicabo. Et placeat perferendis neque mollitia sit iure quis.&quot;,
            &quot;photo&quot;: null,
            &quot;artist_verified_at&quot;: &quot;2025-01-20 18:13:23&quot;,
            &quot;email_verified_at&quot;: &quot;2025-01-20T18:13:23.000000Z&quot;,
            &quot;created_at&quot;: &quot;2025-01-20T18:13:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-20T18:13:23.000000Z&quot;
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
               value="4"
               data-component="url">
    <br>
<p>The number of records to retrieve Example: <code>4</code></p>
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
    --get "http://localhost:8000/api/v1/users/rerum" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/users/rerum"
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
            &quot;id&quot;: 407,
            &quot;username&quot;: &quot;bernier.edd&quot;,
            &quot;first_name&quot;: &quot;Gunnar&quot;,
            &quot;last_name&quot;: &quot;Dooley&quot;,
            &quot;email&quot;: &quot;oleffler@example.org&quot;,
            &quot;country&quot;: &quot;Cape Verde&quot;,
            &quot;bio&quot;: &quot;Suscipit quidem voluptatem sed unde. Qui quasi ea sapiente. Et quia culpa qui consequuntur.&quot;,
            &quot;photo&quot;: null,
            &quot;artist_verified_at&quot;: &quot;2025-01-20 18:13:23&quot;,
            &quot;email_verified_at&quot;: &quot;2025-01-20T18:13:23.000000Z&quot;,
            &quot;created_at&quot;: &quot;2025-01-20T18:13:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-20T18:13:23.000000Z&quot;
        },
        {
            &quot;id&quot;: 408,
            &quot;username&quot;: &quot;cgerlach&quot;,
            &quot;first_name&quot;: &quot;Rafaela&quot;,
            &quot;last_name&quot;: &quot;Zulauf&quot;,
            &quot;email&quot;: &quot;qfranecki@example.org&quot;,
            &quot;country&quot;: &quot;Faroe Islands&quot;,
            &quot;bio&quot;: &quot;Dolorum omnis similique deleniti reiciendis ipsam quasi omnis. Ea sint dolorem voluptatem. Aut voluptatum sit explicabo.&quot;,
            &quot;photo&quot;: null,
            &quot;artist_verified_at&quot;: null,
            &quot;email_verified_at&quot;: &quot;2025-01-20T18:13:23.000000Z&quot;,
            &quot;created_at&quot;: &quot;2025-01-20T18:13:23.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-20T18:13:23.000000Z&quot;
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
               value="rerum"
               data-component="url">
    <br>
<p>The username of the user Example: <code>rerum</code></p>
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
    --get "http://localhost:8000/api/v1/users/dolorem/likes-by-tag" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/users/dolorem/likes-by-tag"
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
               value="dolorem"
               data-component="url">
    <br>
<p>The username of the user Example: <code>dolorem</code></p>
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
    --get "http://localhost:8000/api/v1/users/earum/artwork-tags" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/users/earum/artwork-tags"
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
               value="earum"
               data-component="url">
    <br>
<p>The username of the user Example: <code>earum</code></p>
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
