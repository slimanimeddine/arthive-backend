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
                    <ul id="tocify-header-artwork-comments" class="tocify-header">
                <li class="tocify-item level-1" data-unique="artwork-comments">
                    <a href="#artwork-comments">Artwork Comments</a>
                </li>
                                    <ul id="tocify-subheader-artwork-comments" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="artwork-comments-POSTapi-v1-artwork-comments--id-">
                                <a href="#artwork-comments-POSTapi-v1-artwork-comments--id-">Post Artwork Comment</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="artwork-comments-DELETEapi-v1-artwork-comments--id-">
                                <a href="#artwork-comments-DELETEapi-v1-artwork-comments--id-">Delete Artwork Comment</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="artwork-comments-PUTapi-v1-artwork-comments--id-">
                                <a href="#artwork-comments-PUTapi-v1-artwork-comments--id-">Update Artwork Comment</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-artwork-likes" class="tocify-header">
                <li class="tocify-item level-1" data-unique="artwork-likes">
                    <a href="#artwork-likes">Artwork Likes</a>
                </li>
                                    <ul id="tocify-subheader-artwork-likes" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="artwork-likes-POSTapi-v1-artwork-likes--id-">
                                <a href="#artwork-likes-POSTapi-v1-artwork-likes--id-">Like Artwork</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="artwork-likes-DELETEapi-v1-artwork-likes--id-">
                                <a href="#artwork-likes-DELETEapi-v1-artwork-likes--id-">Unlike Artwork</a>
                            </li>
                                                                        </ul>
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
                    <ul id="tocify-header-follows" class="tocify-header">
                <li class="tocify-item level-1" data-unique="follows">
                    <a href="#follows">Follows</a>
                </li>
                                    <ul id="tocify-subheader-follows" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="follows-POSTapi-v1-follows--id-">
                                <a href="#follows-POSTapi-v1-follows--id-">Follow User</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="follows-DELETEapi-v1-follows--id-">
                                <a href="#follows-DELETEapi-v1-follows--id-">Unfollow User</a>
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
                                                                                <li class="tocify-item level-2" data-unique="users-GETapi-v1-users-authenticated">
                                <a href="#users-GETapi-v1-users-authenticated">Get Authenticated User</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="users-GETapi-v1-users-authenticated-artworks">
                                <a href="#users-GETapi-v1-users-authenticated-artworks">Get Authenticated User Artworks</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="users-GETapi-v1-users-authenticated-favorite-artworks">
                                <a href="#users-GETapi-v1-users-authenticated-favorite-artworks">Get Authenticated User Favorite Artworks</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="users-GETapi-v1-users-authenticated-followers">
                                <a href="#users-GETapi-v1-users-authenticated-followers">Get Authenticated User Following</a>
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
        <li>Last updated: January 22, 2025</li>
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

        <h1 id="artwork-comments">Artwork Comments</h1>

    

                                <h2 id="artwork-comments-POSTapi-v1-artwork-comments--id-">Post Artwork Comment</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Post a comment on an artwork</p>

<span id="example-requests-POSTapi-v1-artwork-comments--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/v1/artwork-comments/7" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"comment_text\": \"quisquam\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artwork-comments/7"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "comment_text": "quisquam"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-artwork-comments--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 5,
        &quot;comment_text&quot;: &quot;Voluptatem qui sint est nesciunt.&quot;,
        &quot;artwork_id&quot;: 36,
        &quot;user_id&quot;: 61,
        &quot;created_at&quot;: &quot;2025-01-22T09:16:07.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-01-22T09:16:07.000000Z&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-artwork-comments--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-artwork-comments--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-artwork-comments--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-artwork-comments--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-artwork-comments--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-artwork-comments--id-" data-method="POST"
      data-path="api/v1/artwork-comments/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-artwork-comments--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-artwork-comments--id-"
                    onclick="tryItOut('POSTapi-v1-artwork-comments--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-artwork-comments--id-"
                    onclick="cancelTryOut('POSTapi-v1-artwork-comments--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-artwork-comments--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/artwork-comments/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-artwork-comments--id-"
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
                              name="Accept"                data-endpoint="POSTapi-v1-artwork-comments--id-"
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
               step="any"               name="id"                data-endpoint="POSTapi-v1-artwork-comments--id-"
               value="7"
               data-component="url">
    <br>
<p>The ID of the artwork to comment on Example: <code>7</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>comment_text</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="comment_text"                data-endpoint="POSTapi-v1-artwork-comments--id-"
               value="quisquam"
               data-component="body">
    <br>
<p>The text of the comment Example: <code>quisquam</code></p>
        </div>
        </form>

                    <h2 id="artwork-comments-DELETEapi-v1-artwork-comments--id-">Delete Artwork Comment</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Delete a comment on an artwork</p>

<span id="example-requests-DELETEapi-v1-artwork-comments--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/v1/artwork-comments/13" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artwork-comments/13"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-artwork-comments--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &#039;message&#039; =&gt; &#039;You have successfully deleted the comment.&#039;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-v1-artwork-comments--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-artwork-comments--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-artwork-comments--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-artwork-comments--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-artwork-comments--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-v1-artwork-comments--id-" data-method="DELETE"
      data-path="api/v1/artwork-comments/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-artwork-comments--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-artwork-comments--id-"
                    onclick="tryItOut('DELETEapi-v1-artwork-comments--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-artwork-comments--id-"
                    onclick="cancelTryOut('DELETEapi-v1-artwork-comments--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-artwork-comments--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/artwork-comments/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-v1-artwork-comments--id-"
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
                              name="Accept"                data-endpoint="DELETEapi-v1-artwork-comments--id-"
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
               step="any"               name="id"                data-endpoint="DELETEapi-v1-artwork-comments--id-"
               value="13"
               data-component="url">
    <br>
<p>The ID of the comment to delete Example: <code>13</code></p>
            </div>
                    </form>

                    <h2 id="artwork-comments-PUTapi-v1-artwork-comments--id-">Update Artwork Comment</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Update a comment on an artwork</p>

<span id="example-requests-PUTapi-v1-artwork-comments--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/v1/artwork-comments/13" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"comment_text\": \"at\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artwork-comments/13"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "comment_text": "at"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-artwork-comments--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 6,
        &quot;comment_text&quot;: &quot;Omnis non atque voluptas vero quia sit officiis quis.&quot;,
        &quot;artwork_id&quot;: 37,
        &quot;user_id&quot;: 63,
        &quot;created_at&quot;: &quot;2025-01-22T09:16:07.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-01-22T09:16:07.000000Z&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-v1-artwork-comments--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-artwork-comments--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-artwork-comments--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-artwork-comments--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-artwork-comments--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-artwork-comments--id-" data-method="PUT"
      data-path="api/v1/artwork-comments/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-artwork-comments--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-artwork-comments--id-"
                    onclick="tryItOut('PUTapi-v1-artwork-comments--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-artwork-comments--id-"
                    onclick="cancelTryOut('PUTapi-v1-artwork-comments--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-artwork-comments--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/artwork-comments/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-artwork-comments--id-"
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
                              name="Accept"                data-endpoint="PUTapi-v1-artwork-comments--id-"
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
               step="any"               name="id"                data-endpoint="PUTapi-v1-artwork-comments--id-"
               value="13"
               data-component="url">
    <br>
<p>The ID of the comment to update Example: <code>13</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>comment_text</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="comment_text"                data-endpoint="PUTapi-v1-artwork-comments--id-"
               value="at"
               data-component="body">
    <br>
<p>The text of the comment Example: <code>at</code></p>
        </div>
        </form>

                <h1 id="artwork-likes">Artwork Likes</h1>

    

                                <h2 id="artwork-likes-POSTapi-v1-artwork-likes--id-">Like Artwork</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Like an artwork</p>

<span id="example-requests-POSTapi-v1-artwork-likes--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/v1/artwork-likes/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artwork-likes/1"
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

<span id="example-responses-POSTapi-v1-artwork-likes--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 5,
        &quot;artwork_id&quot;: 35,
        &quot;user_id&quot;: 59,
        &quot;created_at&quot;: &quot;2025-01-22T09:16:07.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-01-22T09:16:07.000000Z&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-artwork-likes--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-artwork-likes--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-artwork-likes--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-artwork-likes--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-artwork-likes--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-artwork-likes--id-" data-method="POST"
      data-path="api/v1/artwork-likes/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-artwork-likes--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-artwork-likes--id-"
                    onclick="tryItOut('POSTapi-v1-artwork-likes--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-artwork-likes--id-"
                    onclick="cancelTryOut('POSTapi-v1-artwork-likes--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-artwork-likes--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/artwork-likes/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-artwork-likes--id-"
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
                              name="Accept"                data-endpoint="POSTapi-v1-artwork-likes--id-"
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
               step="any"               name="id"                data-endpoint="POSTapi-v1-artwork-likes--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the artwork to like Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="artwork-likes-DELETEapi-v1-artwork-likes--id-">Unlike Artwork</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Unlike an artwork</p>

<span id="example-requests-DELETEapi-v1-artwork-likes--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/v1/artwork-likes/10" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artwork-likes/10"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-artwork-likes--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
     &#039;message&#039; =&gt; &#039;You have successfully unliked this artwork.&#039;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-v1-artwork-likes--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-artwork-likes--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-artwork-likes--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-artwork-likes--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-artwork-likes--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-v1-artwork-likes--id-" data-method="DELETE"
      data-path="api/v1/artwork-likes/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-artwork-likes--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-artwork-likes--id-"
                    onclick="tryItOut('DELETEapi-v1-artwork-likes--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-artwork-likes--id-"
                    onclick="cancelTryOut('DELETEapi-v1-artwork-likes--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-artwork-likes--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/artwork-likes/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-v1-artwork-likes--id-"
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
                              name="Accept"                data-endpoint="DELETEapi-v1-artwork-likes--id-"
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
               step="any"               name="id"                data-endpoint="DELETEapi-v1-artwork-likes--id-"
               value="10"
               data-component="url">
    <br>
<p>The ID of the artwork to unlike Example: <code>10</code></p>
            </div>
                    </form>

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
            &quot;id&quot;: 19,
            &quot;title&quot;: &quot;Exercitationem a soluta enim.&quot;,
            &quot;description&quot;: &quot;Deleniti quis occaecati fugit est quasi deleniti. Soluta necessitatibus expedita aut placeat ut. Aut porro minima possimus voluptatem vel iure aut. Autem cumque sunt occaecati ex.&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;user_id&quot;: 30,
            &quot;created_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: null,
            &quot;user&quot;: {
                &quot;id&quot;: 30,
                &quot;username&quot;: &quot;federico07&quot;,
                &quot;first_name&quot;: &quot;Mozelle&quot;,
                &quot;last_name&quot;: &quot;Schuppe&quot;,
                &quot;email&quot;: &quot;jgrant@example.org&quot;,
                &quot;country&quot;: &quot;Algeria&quot;,
                &quot;bio&quot;: &quot;Dicta in ex explicabo et quia. Fuga id quo nobis tempore alias iste. Qui ea quae numquam.&quot;,
                &quot;photo&quot;: null,
                &quot;artist_verified_at&quot;: &quot;2025-01-22 09:16:05&quot;,
                &quot;email_verified_at&quot;: &quot;2025-01-22T09:16:05.000000Z&quot;,
                &quot;role&quot;: &quot;artist&quot;,
                &quot;created_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 20,
            &quot;title&quot;: &quot;Et eum quis maiores recusandae.&quot;,
            &quot;description&quot;: &quot;Animi magnam ullam aut. Eveniet consequuntur neque dolores at. Nemo enim quae sint quisquam perspiciatis illum tempore. Suscipit aut sint quas laboriosam.&quot;,
            &quot;status&quot;: &quot;draft&quot;,
            &quot;user_id&quot;: 31,
            &quot;created_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: null,
            &quot;user&quot;: {
                &quot;id&quot;: 31,
                &quot;username&quot;: &quot;fwolff&quot;,
                &quot;first_name&quot;: &quot;Bo&quot;,
                &quot;last_name&quot;: &quot;Waelchi&quot;,
                &quot;email&quot;: &quot;jacobson.rashawn@example.org&quot;,
                &quot;country&quot;: &quot;Uzbekistan&quot;,
                &quot;bio&quot;: &quot;Sit quis nesciunt deserunt et modi. Quis repellendus eum explicabo ut nulla. Aut eveniet quia perspiciatis iste nam. Neque accusamus quo nemo.&quot;,
                &quot;photo&quot;: null,
                &quot;artist_verified_at&quot;: null,
                &quot;email_verified_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
                &quot;role&quot;: &quot;artist&quot;,
                &quot;created_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;
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
    --get "http://localhost:8000/api/v1/artworks/trending/19" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artworks/trending/19"
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
            &quot;id&quot;: 21,
            &quot;title&quot;: &quot;Magnam voluptatum aut eum aut natus vel.&quot;,
            &quot;description&quot;: &quot;Occaecati saepe cumque corporis in at blanditiis. Consectetur culpa in voluptatum velit doloribus. Dolor laborum dolorem corrupti eaque.&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;user_id&quot;: 32,
            &quot;created_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: null,
            &quot;user&quot;: {
                &quot;id&quot;: 32,
                &quot;username&quot;: &quot;corrine59&quot;,
                &quot;first_name&quot;: &quot;Ethan&quot;,
                &quot;last_name&quot;: &quot;Zboncak&quot;,
                &quot;email&quot;: &quot;slakin@example.org&quot;,
                &quot;country&quot;: &quot;Jordan&quot;,
                &quot;bio&quot;: &quot;Magnam dolore suscipit ea ipsa. Quas consequatur commodi voluptas laboriosam ullam atque rerum. Ut odit assumenda enim eum pariatur qui dolore.&quot;,
                &quot;photo&quot;: null,
                &quot;artist_verified_at&quot;: &quot;2025-01-22 09:16:06&quot;,
                &quot;email_verified_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
                &quot;role&quot;: &quot;artist&quot;,
                &quot;created_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 22,
            &quot;title&quot;: &quot;Est facilis quia exercitationem voluptate qui.&quot;,
            &quot;description&quot;: &quot;Nam qui dolores dicta tempora. Velit doloremque possimus deleniti eveniet atque maxime. Commodi saepe neque ipsum et quo. Voluptas amet inventore quibusdam id temporibus nulla sint.&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;user_id&quot;: 33,
            &quot;created_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: null,
            &quot;user&quot;: {
                &quot;id&quot;: 33,
                &quot;username&quot;: &quot;reyes92&quot;,
                &quot;first_name&quot;: &quot;Tavares&quot;,
                &quot;last_name&quot;: &quot;Kris&quot;,
                &quot;email&quot;: &quot;schaden.katelyn@example.com&quot;,
                &quot;country&quot;: &quot;Luxembourg&quot;,
                &quot;bio&quot;: &quot;Eligendi voluptates quos deserunt unde dolor. Sed provident tenetur iure est fugit laboriosam. Odit qui aut magnam et deleniti error et.&quot;,
                &quot;photo&quot;: null,
                &quot;artist_verified_at&quot;: null,
                &quot;email_verified_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
                &quot;role&quot;: &quot;artist&quot;,
                &quot;created_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;
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
               value="19"
               data-component="url">
    <br>
<p>The number of records to retrieve Example: <code>19</code></p>
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
    --get "http://localhost:8000/api/v1/artworks/new/18" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artworks/new/18"
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
            &quot;id&quot;: 23,
            &quot;title&quot;: &quot;Distinctio saepe asperiores accusamus laboriosam provident et.&quot;,
            &quot;description&quot;: &quot;Sit voluptatem dolores qui voluptas libero. Sed eius ut eos recusandae architecto aut nostrum. Animi beatae laboriosam facilis vero. Fugiat vitae quia aut dolorem. Deserunt tenetur et eum sunt voluptatum non.&quot;,
            &quot;status&quot;: &quot;draft&quot;,
            &quot;user_id&quot;: 34,
            &quot;created_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: null,
            &quot;user&quot;: {
                &quot;id&quot;: 34,
                &quot;username&quot;: &quot;schoen.lillian&quot;,
                &quot;first_name&quot;: &quot;Sophie&quot;,
                &quot;last_name&quot;: &quot;Hickle&quot;,
                &quot;email&quot;: &quot;jacobi.alf@example.net&quot;,
                &quot;country&quot;: &quot;Faroe Islands&quot;,
                &quot;bio&quot;: &quot;Et ut nobis quibusdam vel qui. Rerum ipsa et maiores expedita repudiandae magnam enim omnis. Cumque corporis ipsam omnis. Voluptatibus sed et enim esse quisquam numquam.&quot;,
                &quot;photo&quot;: &quot;https://via.placeholder.com/640x480.png/0044cc?text=sed&quot;,
                &quot;artist_verified_at&quot;: &quot;2025-01-22 09:16:06&quot;,
                &quot;email_verified_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
                &quot;role&quot;: &quot;artist&quot;,
                &quot;created_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 24,
            &quot;title&quot;: &quot;Modi vero dolorem et sed dignissimos.&quot;,
            &quot;description&quot;: &quot;Tempora sint earum dolorum explicabo dolorum dolore est. Ipsa soluta inventore laudantium laudantium dolorum quia. Vel possimus et ea earum omnis. Amet ut expedita sed consequatur velit illum voluptates culpa.&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;user_id&quot;: 35,
            &quot;created_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: null,
            &quot;user&quot;: {
                &quot;id&quot;: 35,
                &quot;username&quot;: &quot;chris90&quot;,
                &quot;first_name&quot;: &quot;Nola&quot;,
                &quot;last_name&quot;: &quot;Morissette&quot;,
                &quot;email&quot;: &quot;benton.williamson@example.net&quot;,
                &quot;country&quot;: &quot;Norway&quot;,
                &quot;bio&quot;: &quot;Qui sunt ex sunt perspiciatis. Nam illo id eaque ut eius nisi incidunt. Corporis rem dolore odio et repudiandae quia qui.&quot;,
                &quot;photo&quot;: &quot;https://via.placeholder.com/640x480.png/00ffee?text=repudiandae&quot;,
                &quot;artist_verified_at&quot;: null,
                &quot;email_verified_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
                &quot;role&quot;: &quot;artist&quot;,
                &quot;created_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;
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
               value="18"
               data-component="url">
    <br>
<p>The number of records to retrieve Example: <code>18</code></p>
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
    --get "http://localhost:8000/api/v1/artworks/17" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artworks/17"
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
            &quot;id&quot;: 25,
            &quot;title&quot;: &quot;Autem hic quis error et velit.&quot;,
            &quot;description&quot;: &quot;Quibusdam ut fuga aliquid earum laboriosam. Aliquam accusamus quia iste eos facilis. Rerum maxime et aut inventore neque exercitationem labore fugiat. Culpa aliquid eos fugiat nulla corporis ratione totam.&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;user_id&quot;: 36,
            &quot;created_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 1,
            &quot;artwork_comments_count&quot;: 1,
            &quot;artwork_main_photo_path&quot;: null,
            &quot;user&quot;: {
                &quot;id&quot;: 36,
                &quot;username&quot;: &quot;myah33&quot;,
                &quot;first_name&quot;: &quot;Ebony&quot;,
                &quot;last_name&quot;: &quot;Hackett&quot;,
                &quot;email&quot;: &quot;trent41@example.com&quot;,
                &quot;country&quot;: &quot;Wallis and Futuna&quot;,
                &quot;bio&quot;: &quot;Facere ut nisi id unde rerum explicabo aperiam molestiae. Aut mollitia molestiae neque quas quis sit qui distinctio. Nesciunt voluptate similique quia labore laborum voluptatem dolores consectetur.&quot;,
                &quot;photo&quot;: null,
                &quot;artist_verified_at&quot;: null,
                &quot;email_verified_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
                &quot;role&quot;: &quot;artist&quot;,
                &quot;created_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;
            },
            &quot;artwork_photos&quot;: [
                {
                    &quot;id&quot;: 7,
                    &quot;path&quot;: &quot;0&quot;,
                    &quot;is_main&quot;: 0,
                    &quot;artwork_id&quot;: 25,
                    &quot;created_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;
                }
            ],
            &quot;artwork_comments&quot;: [
                {
                    &quot;id&quot;: 3,
                    &quot;comment_text&quot;: &quot;Mollitia excepturi quae et cupiditate.&quot;,
                    &quot;artwork_id&quot;: 25,
                    &quot;user_id&quot;: 37,
                    &quot;created_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
                    &quot;user&quot;: {
                        &quot;id&quot;: 37,
                        &quot;username&quot;: &quot;lionel08&quot;,
                        &quot;first_name&quot;: &quot;Nathen&quot;,
                        &quot;last_name&quot;: &quot;Carroll&quot;,
                        &quot;email&quot;: &quot;betty71@example.org&quot;,
                        &quot;country&quot;: &quot;Saint Helena&quot;,
                        &quot;bio&quot;: &quot;Dolore aut atque expedita soluta dolores eum esse. Nemo dignissimos occaecati in aperiam possimus quibusdam ea. Non odit atque at velit omnis illum quo qui.&quot;,
                        &quot;photo&quot;: null,
                        &quot;artist_verified_at&quot;: &quot;2025-01-22 09:16:06&quot;,
                        &quot;email_verified_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
                        &quot;role&quot;: &quot;artist&quot;,
                        &quot;created_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;
                    }
                }
            ],
            &quot;artwork_likes&quot;: [
                {
                    &quot;id&quot;: 3,
                    &quot;artwork_id&quot;: 25,
                    &quot;user_id&quot;: 38,
                    &quot;created_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
                    &quot;user&quot;: {
                        &quot;id&quot;: 38,
                        &quot;username&quot;: &quot;farrell.gavin&quot;,
                        &quot;first_name&quot;: &quot;Rebeka&quot;,
                        &quot;last_name&quot;: &quot;Kilback&quot;,
                        &quot;email&quot;: &quot;bins.augustus@example.net&quot;,
                        &quot;country&quot;: &quot;British Virgin Islands&quot;,
                        &quot;bio&quot;: &quot;Dolores in cumque non magni. Ex ea reprehenderit quis magnam tenetur. Reiciendis illum non et a.&quot;,
                        &quot;photo&quot;: null,
                        &quot;artist_verified_at&quot;: &quot;2025-01-22 09:16:06&quot;,
                        &quot;email_verified_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
                        &quot;role&quot;: &quot;artist&quot;,
                        &quot;created_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;
                    }
                }
            ],
            &quot;tags&quot;: [
                {
                    &quot;id&quot;: 7,
                    &quot;name&quot;: &quot;Estrella Yundt&quot;,
                    &quot;created_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
                    &quot;pivot&quot;: {
                        &quot;artwork_id&quot;: 25,
                        &quot;tag_id&quot;: 7
                    }
                }
            ]
        },
        {
            &quot;id&quot;: 26,
            &quot;title&quot;: &quot;Minima voluptas consequatur unde cumque aperiam.&quot;,
            &quot;description&quot;: &quot;Fugit sit nihil animi omnis temporibus blanditiis illo praesentium. Tempore fugiat voluptatibus incidunt occaecati magnam. Exercitationem similique quo eveniet reiciendis eos. Distinctio dignissimos tempore rerum pariatur expedita repellat et.&quot;,
            &quot;status&quot;: &quot;draft&quot;,
            &quot;user_id&quot;: 39,
            &quot;created_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 1,
            &quot;artwork_comments_count&quot;: 1,
            &quot;artwork_main_photo_path&quot;: null,
            &quot;user&quot;: {
                &quot;id&quot;: 39,
                &quot;username&quot;: &quot;volkman.shyanne&quot;,
                &quot;first_name&quot;: &quot;Isai&quot;,
                &quot;last_name&quot;: &quot;Lebsack&quot;,
                &quot;email&quot;: &quot;lbreitenberg@example.com&quot;,
                &quot;country&quot;: &quot;Isle of Man&quot;,
                &quot;bio&quot;: &quot;Delectus ducimus alias sed aut ea. Voluptas molestiae inventore dolores consequuntur nesciunt facere sint. Vel deserunt minima praesentium voluptatibus aut. Sed accusantium accusamus perferendis cumque explicabo. Nesciunt eaque temporibus repellendus vel minima culpa.&quot;,
                &quot;photo&quot;: null,
                &quot;artist_verified_at&quot;: null,
                &quot;email_verified_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
                &quot;role&quot;: &quot;artist&quot;,
                &quot;created_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;
            },
            &quot;artwork_photos&quot;: [
                {
                    &quot;id&quot;: 8,
                    &quot;path&quot;: &quot;0&quot;,
                    &quot;is_main&quot;: 0,
                    &quot;artwork_id&quot;: 26,
                    &quot;created_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;
                }
            ],
            &quot;artwork_comments&quot;: [
                {
                    &quot;id&quot;: 4,
                    &quot;comment_text&quot;: &quot;Sint est numquam veritatis nemo.&quot;,
                    &quot;artwork_id&quot;: 26,
                    &quot;user_id&quot;: 40,
                    &quot;created_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
                    &quot;user&quot;: {
                        &quot;id&quot;: 40,
                        &quot;username&quot;: &quot;ebaumbach&quot;,
                        &quot;first_name&quot;: &quot;Felix&quot;,
                        &quot;last_name&quot;: &quot;Murazik&quot;,
                        &quot;email&quot;: &quot;korey51@example.net&quot;,
                        &quot;country&quot;: &quot;Saudi Arabia&quot;,
                        &quot;bio&quot;: &quot;Rerum eos sunt aut quas neque. Eum tempore quaerat et voluptatem voluptas sint praesentium. Necessitatibus expedita porro quod illo.&quot;,
                        &quot;photo&quot;: null,
                        &quot;artist_verified_at&quot;: &quot;2025-01-22 09:16:06&quot;,
                        &quot;email_verified_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
                        &quot;role&quot;: &quot;artist&quot;,
                        &quot;created_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;
                    }
                }
            ],
            &quot;artwork_likes&quot;: [
                {
                    &quot;id&quot;: 4,
                    &quot;artwork_id&quot;: 26,
                    &quot;user_id&quot;: 41,
                    &quot;created_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
                    &quot;user&quot;: {
                        &quot;id&quot;: 41,
                        &quot;username&quot;: &quot;skiles.gabrielle&quot;,
                        &quot;first_name&quot;: &quot;Kevon&quot;,
                        &quot;last_name&quot;: &quot;Hamill&quot;,
                        &quot;email&quot;: &quot;rogahn.robin@example.com&quot;,
                        &quot;country&quot;: &quot;Bhutan&quot;,
                        &quot;bio&quot;: &quot;Fugit sapiente quia exercitationem cupiditate. Nihil dolorem ut excepturi in alias consectetur. Et mollitia provident velit ad hic ea. Accusamus consequatur expedita rerum corporis voluptatem et fugiat beatae.&quot;,
                        &quot;photo&quot;: &quot;https://via.placeholder.com/640x480.png/007788?text=similique&quot;,
                        &quot;artist_verified_at&quot;: null,
                        &quot;email_verified_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
                        &quot;role&quot;: &quot;artist&quot;,
                        &quot;created_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;
                    }
                }
            ],
            &quot;tags&quot;: [
                {
                    &quot;id&quot;: 8,
                    &quot;name&quot;: &quot;Maye Wolf&quot;,
                    &quot;created_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
                    &quot;pivot&quot;: {
                        &quot;artwork_id&quot;: 26,
                        &quot;tag_id&quot;: 8
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
               value="17"
               data-component="url">
    <br>
<p>The id of the artwork Example: <code>17</code></p>
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

                <h1 id="follows">Follows</h1>

    

                                <h2 id="follows-POSTapi-v1-follows--id-">Follow User</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Follow a user</p>

<span id="example-requests-POSTapi-v1-follows--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/v1/follows/2" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/follows/2"
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

<span id="example-responses-POSTapi-v1-follows--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;follower_id&quot;: 56,
        &quot;followed_id&quot;: 57,
        &quot;created_at&quot;: &quot;2025-01-22T09:16:07.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-01-22T09:16:07.000000Z&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-follows--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-follows--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-follows--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-follows--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-follows--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-follows--id-" data-method="POST"
      data-path="api/v1/follows/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-follows--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-follows--id-"
                    onclick="tryItOut('POSTapi-v1-follows--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-follows--id-"
                    onclick="cancelTryOut('POSTapi-v1-follows--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-follows--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/follows/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-follows--id-"
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
                              name="Accept"                data-endpoint="POSTapi-v1-follows--id-"
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
               step="any"               name="id"                data-endpoint="POSTapi-v1-follows--id-"
               value="2"
               data-component="url">
    <br>
<p>The ID of the user to follow Example: <code>2</code></p>
            </div>
                    </form>

                    <h2 id="follows-DELETEapi-v1-follows--id-">Unfollow User</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Unfollow a user</p>

<span id="example-requests-DELETEapi-v1-follows--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/v1/follows/14" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/follows/14"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-follows--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
     &#039;message&#039; =&gt; &#039;You have successfully unfollowed this user.&#039;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-v1-follows--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-follows--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-follows--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-follows--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-follows--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-v1-follows--id-" data-method="DELETE"
      data-path="api/v1/follows/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-follows--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-follows--id-"
                    onclick="tryItOut('DELETEapi-v1-follows--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-follows--id-"
                    onclick="cancelTryOut('DELETEapi-v1-follows--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-follows--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/follows/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-v1-follows--id-"
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
                              name="Accept"                data-endpoint="DELETEapi-v1-follows--id-"
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
               step="any"               name="id"                data-endpoint="DELETEapi-v1-follows--id-"
               value="14"
               data-component="url">
    <br>
<p>The ID of the user to unfollow Example: <code>14</code></p>
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
            &quot;id&quot;: 42,
            &quot;username&quot;: &quot;collins.talia&quot;,
            &quot;first_name&quot;: &quot;Baylee&quot;,
            &quot;last_name&quot;: &quot;Rosenbaum&quot;,
            &quot;email&quot;: &quot;tremblay.cecile@example.com&quot;,
            &quot;country&quot;: &quot;Colombia&quot;,
            &quot;bio&quot;: &quot;Consectetur alias id est eos. Minus sunt doloremque laboriosam. Velit fugit nam quidem pariatur.&quot;,
            &quot;photo&quot;: &quot;https://via.placeholder.com/640x480.png/00ffee?text=vel&quot;,
            &quot;artist_verified_at&quot;: null,
            &quot;email_verified_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
            &quot;role&quot;: &quot;artist&quot;,
            &quot;created_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
            &quot;artworks&quot;: [
                {
                    &quot;id&quot;: 27,
                    &quot;title&quot;: &quot;Voluptas nesciunt sit dolorem dolorem voluptatibus.&quot;,
                    &quot;description&quot;: &quot;Odit dicta consectetur sed sit sequi exercitationem aliquid. Sint fugit eveniet voluptatem ea deleniti. Eius non a nam quia quibusdam repellendus aut. Quis temporibus nobis qui quaerat.&quot;,
                    &quot;status&quot;: &quot;published&quot;,
                    &quot;user_id&quot;: 42,
                    &quot;created_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
                    &quot;artwork_likes_count&quot;: 0,
                    &quot;artwork_comments_count&quot;: 0,
                    &quot;artwork_main_photo_path&quot;: null
                }
            ]
        },
        {
            &quot;id&quot;: 43,
            &quot;username&quot;: &quot;woconner&quot;,
            &quot;first_name&quot;: &quot;Clair&quot;,
            &quot;last_name&quot;: &quot;DuBuque&quot;,
            &quot;email&quot;: &quot;america09@example.com&quot;,
            &quot;country&quot;: &quot;Afghanistan&quot;,
            &quot;bio&quot;: &quot;Aut vel autem soluta labore at. Doloribus aut quis facilis doloribus. Impedit similique molestiae esse temporibus molestias dicta.&quot;,
            &quot;photo&quot;: &quot;https://via.placeholder.com/640x480.png/0066aa?text=minus&quot;,
            &quot;artist_verified_at&quot;: &quot;2025-01-22 09:16:06&quot;,
            &quot;email_verified_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
            &quot;role&quot;: &quot;artist&quot;,
            &quot;created_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
            &quot;artworks&quot;: [
                {
                    &quot;id&quot;: 28,
                    &quot;title&quot;: &quot;Ullam voluptatem alias laudantium optio ratione amet officia.&quot;,
                    &quot;description&quot;: &quot;Qui illo ipsum quia et mollitia laudantium atque dolores. Similique a dolores architecto dolorem tenetur nam quidem facilis. Dolores ea quos corporis quia optio adipisci.&quot;,
                    &quot;status&quot;: &quot;published&quot;,
                    &quot;user_id&quot;: 43,
                    &quot;created_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
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
    --get "http://localhost:8000/api/v1/users/verified/15" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/users/verified/15"
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
            &quot;id&quot;: 44,
            &quot;username&quot;: &quot;keyshawn06&quot;,
            &quot;first_name&quot;: &quot;Darby&quot;,
            &quot;last_name&quot;: &quot;Koch&quot;,
            &quot;email&quot;: &quot;chaag@example.com&quot;,
            &quot;country&quot;: &quot;Japan&quot;,
            &quot;bio&quot;: &quot;Sed doloremque iusto aut. In qui qui ab saepe. Rerum qui omnis unde laboriosam. Quod blanditiis vero architecto. Mollitia aperiam nostrum nihil aut adipisci.&quot;,
            &quot;photo&quot;: null,
            &quot;artist_verified_at&quot;: &quot;2025-01-22 09:16:06&quot;,
            &quot;email_verified_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
            &quot;role&quot;: &quot;artist&quot;,
            &quot;created_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;
        },
        {
            &quot;id&quot;: 45,
            &quot;username&quot;: &quot;melany.schneider&quot;,
            &quot;first_name&quot;: &quot;Lazaro&quot;,
            &quot;last_name&quot;: &quot;Lebsack&quot;,
            &quot;email&quot;: &quot;mschultz@example.net&quot;,
            &quot;country&quot;: &quot;Reunion&quot;,
            &quot;bio&quot;: &quot;Reprehenderit aut delectus facere id et tempora autem quis. Dolor dolorum consequatur quis et hic iste amet. Aliquam porro et exercitationem dolores dolores quo eos.&quot;,
            &quot;photo&quot;: null,
            &quot;artist_verified_at&quot;: &quot;2025-01-22 09:16:06&quot;,
            &quot;email_verified_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
            &quot;role&quot;: &quot;artist&quot;,
            &quot;created_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;
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
               value="15"
               data-component="url">
    <br>
<p>The number of records to retrieve Example: <code>15</code></p>
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
    --get "http://localhost:8000/api/v1/users/ea" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/users/ea"
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
    &quot;data&quot;: {
        &quot;id&quot;: 46,
        &quot;username&quot;: &quot;cathy.flatley&quot;,
        &quot;first_name&quot;: &quot;Elian&quot;,
        &quot;last_name&quot;: &quot;Lang&quot;,
        &quot;email&quot;: &quot;leuschke.linda@example.org&quot;,
        &quot;country&quot;: &quot;Albania&quot;,
        &quot;bio&quot;: &quot;Nihil cum fugit voluptatibus minus illum enim. Voluptas natus et quidem quibusdam. Distinctio incidunt iusto dolorem est earum.&quot;,
        &quot;photo&quot;: &quot;https://via.placeholder.com/640x480.png/009988?text=libero&quot;,
        &quot;artist_verified_at&quot;: &quot;2025-01-22 09:16:06&quot;,
        &quot;email_verified_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
        &quot;role&quot;: &quot;artist&quot;,
        &quot;created_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;
    }
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
               value="ea"
               data-component="url">
    <br>
<p>The username of the user Example: <code>ea</code></p>
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
    --get "http://localhost:8000/api/v1/users/beatae/likes-by-tag" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/users/beatae/likes-by-tag"
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
               value="beatae"
               data-component="url">
    <br>
<p>The username of the user Example: <code>beatae</code></p>
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
    --get "http://localhost:8000/api/v1/users/eligendi/artwork-tags" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/users/eligendi/artwork-tags"
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
               value="eligendi"
               data-component="url">
    <br>
<p>The username of the user Example: <code>eligendi</code></p>
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
    --get "http://localhost:8000/api/v1/users/ad/artworks?filter%5Btag%5D=filter%5Btag%5D%3Dabstract&amp;page=1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/users/ad/artworks"
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
            &quot;id&quot;: 29,
            &quot;title&quot;: &quot;Ipsum omnis voluptas sed et in quia.&quot;,
            &quot;description&quot;: &quot;Ratione sunt nihil voluptatem magnam est. Quis illum perspiciatis corporis optio et. Omnis sequi sed dolor et incidunt eius voluptatem.&quot;,
            &quot;status&quot;: &quot;draft&quot;,
            &quot;user_id&quot;: 47,
            &quot;created_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: null
        },
        {
            &quot;id&quot;: 30,
            &quot;title&quot;: &quot;Nostrum quisquam hic dolor ab et.&quot;,
            &quot;description&quot;: &quot;Numquam quo repellat deleniti labore. Inventore non ut quia et velit eaque. Placeat quos laudantium qui sapiente.&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;user_id&quot;: 48,
            &quot;created_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
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
               value="ad"
               data-component="url">
    <br>
<p>The username of the user Example: <code>ad</code></p>
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

                    <h2 id="users-GETapi-v1-users-authenticated">Get Authenticated User</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Get the authenticated user</p>

<span id="example-requests-GETapi-v1-users-authenticated">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/users/authenticated" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/users/authenticated"
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

<span id="example-responses-GETapi-v1-users-authenticated">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 49,
        &quot;username&quot;: &quot;turner.asha&quot;,
        &quot;first_name&quot;: &quot;Elena&quot;,
        &quot;last_name&quot;: &quot;Jakubowski&quot;,
        &quot;email&quot;: &quot;letitia.upton@example.org&quot;,
        &quot;country&quot;: &quot;Mauritius&quot;,
        &quot;bio&quot;: &quot;Aut voluptatem consequatur quo. Voluptatem tenetur illo itaque. Molestias ipsa doloribus dolorum minima rem praesentium dicta.&quot;,
        &quot;photo&quot;: &quot;https://via.placeholder.com/640x480.png/002277?text=deserunt&quot;,
        &quot;artist_verified_at&quot;: null,
        &quot;email_verified_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
        &quot;role&quot;: &quot;artist&quot;,
        &quot;created_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-users-authenticated" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-users-authenticated"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-users-authenticated"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-users-authenticated" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-users-authenticated">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-users-authenticated" data-method="GET"
      data-path="api/v1/users/authenticated"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-users-authenticated', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-users-authenticated"
                    onclick="tryItOut('GETapi-v1-users-authenticated');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-users-authenticated"
                    onclick="cancelTryOut('GETapi-v1-users-authenticated');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-users-authenticated"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/users/authenticated</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-users-authenticated"
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
                              name="Accept"                data-endpoint="GETapi-v1-users-authenticated"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="users-GETapi-v1-users-authenticated-artworks">Get Authenticated User Artworks</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Get a list of artworks by the authenticated user</p>

<span id="example-requests-GETapi-v1-users-authenticated-artworks">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/users/authenticated/artworks?page=1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/users/authenticated/artworks"
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

<span id="example-responses-GETapi-v1-users-authenticated-artworks">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 31,
            &quot;title&quot;: &quot;Rerum explicabo magnam blanditiis repellendus quia sit.&quot;,
            &quot;description&quot;: &quot;Qui molestiae ipsa consequuntur provident tempora vel qui aspernatur. Quis sapiente eveniet qui consequuntur qui eius. Doloremque quo fuga est cum quo est esse. Suscipit modi eum fuga facere.&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;user_id&quot;: 50,
            &quot;created_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: null,
            &quot;artwork_photos&quot;: [
                {
                    &quot;id&quot;: 9,
                    &quot;path&quot;: &quot;0&quot;,
                    &quot;is_main&quot;: 0,
                    &quot;artwork_id&quot;: 31,
                    &quot;created_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;
                }
            ],
            &quot;tags&quot;: [
                {
                    &quot;id&quot;: 9,
                    &quot;name&quot;: &quot;Mrs. Brionna Zulauf III&quot;,
                    &quot;created_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
                    &quot;pivot&quot;: {
                        &quot;artwork_id&quot;: 31,
                        &quot;tag_id&quot;: 9
                    }
                }
            ]
        },
        {
            &quot;id&quot;: 32,
            &quot;title&quot;: &quot;Molestiae mollitia adipisci praesentium veniam sit voluptas commodi.&quot;,
            &quot;description&quot;: &quot;Accusamus optio modi qui et. Voluptas et nostrum accusamus expedita dolorum repellendus totam. Quisquam occaecati saepe quam.&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;user_id&quot;: 51,
            &quot;created_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: &quot;0&quot;,
            &quot;artwork_photos&quot;: [
                {
                    &quot;id&quot;: 10,
                    &quot;path&quot;: &quot;0&quot;,
                    &quot;is_main&quot;: 1,
                    &quot;artwork_id&quot;: 32,
                    &quot;created_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;
                }
            ],
            &quot;tags&quot;: [
                {
                    &quot;id&quot;: 10,
                    &quot;name&quot;: &quot;Prof. Ezequiel Hill&quot;,
                    &quot;created_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
                    &quot;pivot&quot;: {
                        &quot;artwork_id&quot;: 32,
                        &quot;tag_id&quot;: 10
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
<span id="execution-results-GETapi-v1-users-authenticated-artworks" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-users-authenticated-artworks"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-users-authenticated-artworks"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-users-authenticated-artworks" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-users-authenticated-artworks">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-users-authenticated-artworks" data-method="GET"
      data-path="api/v1/users/authenticated/artworks"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-users-authenticated-artworks', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-users-authenticated-artworks"
                    onclick="tryItOut('GETapi-v1-users-authenticated-artworks');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-users-authenticated-artworks"
                    onclick="cancelTryOut('GETapi-v1-users-authenticated-artworks');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-users-authenticated-artworks"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/users/authenticated/artworks</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-users-authenticated-artworks"
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
                              name="Accept"                data-endpoint="GETapi-v1-users-authenticated-artworks"
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
                              name="page"                data-endpoint="GETapi-v1-users-authenticated-artworks"
               value="1"
               data-component="query">
    <br>
<p>The page number to fetch. Example: <code>1</code></p>
            </div>
                </form>

                    <h2 id="users-GETapi-v1-users-authenticated-favorite-artworks">Get Authenticated User Favorite Artworks</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Get a list of artworks marked as favorite by the authenticated user</p>

<span id="example-requests-GETapi-v1-users-authenticated-favorite-artworks">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/users/authenticated/favorite-artworks?page=1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/users/authenticated/favorite-artworks"
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

<span id="example-responses-GETapi-v1-users-authenticated-favorite-artworks">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 33,
            &quot;title&quot;: &quot;Exercitationem impedit aspernatur veniam sint totam et deleniti.&quot;,
            &quot;description&quot;: &quot;Quas eos non molestias aut culpa perspiciatis iusto cupiditate. Voluptas et sit ab quibusdam. Animi rerum et explicabo minima laborum provident. Aspernatur ipsum asperiores ducimus deserunt voluptatem et nam.&quot;,
            &quot;status&quot;: &quot;draft&quot;,
            &quot;user_id&quot;: 52,
            &quot;created_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-22T09:16:06.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: null,
            &quot;artwork_photos&quot;: [
                {
                    &quot;id&quot;: 11,
                    &quot;path&quot;: &quot;0&quot;,
                    &quot;is_main&quot;: 0,
                    &quot;artwork_id&quot;: 33,
                    &quot;created_at&quot;: &quot;2025-01-22T09:16:07.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-22T09:16:07.000000Z&quot;
                }
            ],
            &quot;tags&quot;: [
                {
                    &quot;id&quot;: 11,
                    &quot;name&quot;: &quot;Andrew Bradtke&quot;,
                    &quot;created_at&quot;: &quot;2025-01-22T09:16:07.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-22T09:16:07.000000Z&quot;,
                    &quot;pivot&quot;: {
                        &quot;artwork_id&quot;: 33,
                        &quot;tag_id&quot;: 11
                    }
                }
            ]
        },
        {
            &quot;id&quot;: 34,
            &quot;title&quot;: &quot;Et accusantium enim rerum molestiae maiores.&quot;,
            &quot;description&quot;: &quot;Omnis dolor velit et. Possimus in asperiores repellendus facilis id sint consectetur. Sed ullam nam alias earum autem.&quot;,
            &quot;status&quot;: &quot;draft&quot;,
            &quot;user_id&quot;: 53,
            &quot;created_at&quot;: &quot;2025-01-22T09:16:07.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-22T09:16:07.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: null,
            &quot;artwork_photos&quot;: [
                {
                    &quot;id&quot;: 12,
                    &quot;path&quot;: &quot;0&quot;,
                    &quot;is_main&quot;: 0,
                    &quot;artwork_id&quot;: 34,
                    &quot;created_at&quot;: &quot;2025-01-22T09:16:07.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-22T09:16:07.000000Z&quot;
                }
            ],
            &quot;tags&quot;: [
                {
                    &quot;id&quot;: 12,
                    &quot;name&quot;: &quot;Maritza Veum&quot;,
                    &quot;created_at&quot;: &quot;2025-01-22T09:16:07.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-22T09:16:07.000000Z&quot;,
                    &quot;pivot&quot;: {
                        &quot;artwork_id&quot;: 34,
                        &quot;tag_id&quot;: 12
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
<span id="execution-results-GETapi-v1-users-authenticated-favorite-artworks" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-users-authenticated-favorite-artworks"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-users-authenticated-favorite-artworks"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-users-authenticated-favorite-artworks" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-users-authenticated-favorite-artworks">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-users-authenticated-favorite-artworks" data-method="GET"
      data-path="api/v1/users/authenticated/favorite-artworks"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-users-authenticated-favorite-artworks', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-users-authenticated-favorite-artworks"
                    onclick="tryItOut('GETapi-v1-users-authenticated-favorite-artworks');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-users-authenticated-favorite-artworks"
                    onclick="cancelTryOut('GETapi-v1-users-authenticated-favorite-artworks');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-users-authenticated-favorite-artworks"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/users/authenticated/favorite-artworks</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-users-authenticated-favorite-artworks"
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
                              name="Accept"                data-endpoint="GETapi-v1-users-authenticated-favorite-artworks"
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
                              name="page"                data-endpoint="GETapi-v1-users-authenticated-favorite-artworks"
               value="1"
               data-component="query">
    <br>
<p>The page number to fetch. Example: <code>1</code></p>
            </div>
                </form>

                    <h2 id="users-GETapi-v1-users-authenticated-followers">Get Authenticated User Following</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Get a list of users the authenticated user is following</p>

<span id="example-requests-GETapi-v1-users-authenticated-followers">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/users/authenticated/followers?page=1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/users/authenticated/followers"
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

<span id="example-responses-GETapi-v1-users-authenticated-followers">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 54,
            &quot;username&quot;: &quot;clueilwitz&quot;,
            &quot;first_name&quot;: &quot;Morris&quot;,
            &quot;last_name&quot;: &quot;Mertz&quot;,
            &quot;email&quot;: &quot;presley56@example.com&quot;,
            &quot;country&quot;: &quot;Uganda&quot;,
            &quot;bio&quot;: &quot;Voluptate inventore magni molestiae adipisci veritatis libero. Veniam quis itaque commodi aut consectetur occaecati. Repudiandae autem dignissimos corporis expedita temporibus ut sed sit. Reiciendis et culpa similique.&quot;,
            &quot;photo&quot;: &quot;https://via.placeholder.com/640x480.png/00eedd?text=asperiores&quot;,
            &quot;artist_verified_at&quot;: null,
            &quot;email_verified_at&quot;: &quot;2025-01-22T09:16:07.000000Z&quot;,
            &quot;role&quot;: &quot;artist&quot;,
            &quot;created_at&quot;: &quot;2025-01-22T09:16:07.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-22T09:16:07.000000Z&quot;
        },
        {
            &quot;id&quot;: 55,
            &quot;username&quot;: &quot;lockman.arvel&quot;,
            &quot;first_name&quot;: &quot;Nola&quot;,
            &quot;last_name&quot;: &quot;Nolan&quot;,
            &quot;email&quot;: &quot;gail.schmeler@example.net&quot;,
            &quot;country&quot;: &quot;Singapore&quot;,
            &quot;bio&quot;: &quot;Aut eos et voluptatibus nihil voluptatum delectus quis. Omnis sed quo quia et aperiam sit. Maiores quasi quam ipsum facilis quo voluptates. Non voluptatum quibusdam adipisci odio.&quot;,
            &quot;photo&quot;: &quot;https://via.placeholder.com/640x480.png/008855?text=et&quot;,
            &quot;artist_verified_at&quot;: &quot;2025-01-22 09:16:07&quot;,
            &quot;email_verified_at&quot;: &quot;2025-01-22T09:16:07.000000Z&quot;,
            &quot;role&quot;: &quot;artist&quot;,
            &quot;created_at&quot;: &quot;2025-01-22T09:16:07.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-22T09:16:07.000000Z&quot;
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
<span id="execution-results-GETapi-v1-users-authenticated-followers" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-users-authenticated-followers"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-users-authenticated-followers"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-users-authenticated-followers" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-users-authenticated-followers">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-users-authenticated-followers" data-method="GET"
      data-path="api/v1/users/authenticated/followers"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-users-authenticated-followers', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-users-authenticated-followers"
                    onclick="tryItOut('GETapi-v1-users-authenticated-followers');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-users-authenticated-followers"
                    onclick="cancelTryOut('GETapi-v1-users-authenticated-followers');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-users-authenticated-followers"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/users/authenticated/followers</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-users-authenticated-followers"
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
                              name="Accept"                data-endpoint="GETapi-v1-users-authenticated-followers"
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
                              name="page"                data-endpoint="GETapi-v1-users-authenticated-followers"
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
