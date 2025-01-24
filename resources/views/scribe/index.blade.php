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
                                                    <li class="tocify-item level-2" data-unique="artwork-likes-GETapi-v1-users--username--artwork-likes-received-count-by-tag">
                                <a href="#artwork-likes-GETapi-v1-users--username--artwork-likes-received-count-by-tag">List User Received Likes Count by Tag</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="artwork-likes-GETapi-v1-users--username--artwork-likes-received-count">
                                <a href="#artwork-likes-GETapi-v1-users--username--artwork-likes-received-count">Show User Received Likes Count</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="artwork-likes-POSTapi-v1-artwork-likes--id-">
                                <a href="#artwork-likes-POSTapi-v1-artwork-likes--id-">Like Artwork</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="artwork-likes-DELETEapi-v1-artwork-likes--id-">
                                <a href="#artwork-likes-DELETEapi-v1-artwork-likes--id-">Unlike Artwork</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-artwork-tags" class="tocify-header">
                <li class="tocify-item level-1" data-unique="artwork-tags">
                    <a href="#artwork-tags">Artwork Tags</a>
                </li>
                                    <ul id="tocify-subheader-artwork-tags" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="artwork-tags-GETapi-v1-users--username--artwork-tags">
                                <a href="#artwork-tags-GETapi-v1-users--username--artwork-tags">List User Artwork Tags</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-artworks" class="tocify-header">
                <li class="tocify-item level-1" data-unique="artworks">
                    <a href="#artworks">Artworks</a>
                </li>
                                    <ul id="tocify-subheader-artworks" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="artworks-GETapi-v1-artworks-published">
                                <a href="#artworks-GETapi-v1-artworks-published">List Published Artworks</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="artworks-GETapi-v1-artworks-published-trending--count-">
                                <a href="#artworks-GETapi-v1-artworks-published-trending--count-">List Trending Published Artworks</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="artworks-GETapi-v1-artworks-published-new--count-">
                                <a href="#artworks-GETapi-v1-artworks-published-new--count-">List New Published Artworks</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="artworks-GETapi-v1-artworks-published--id-">
                                <a href="#artworks-GETapi-v1-artworks-published--id-">Show Published Artwork</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="artworks-GETapi-v1-users--username--artworks-published">
                                <a href="#artworks-GETapi-v1-users--username--artworks-published">List User Published Artworks</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="artworks-GETapi-v1-authenticated-artworks-published">
                                <a href="#artworks-GETapi-v1-authenticated-artworks-published">List Authenticated User Favorite Artworks</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="artworks-POSTapi-v1-artworks-drafts">
                                <a href="#artworks-POSTapi-v1-artworks-drafts">Create Artwork Draft</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="artworks-PUTapi-v1-artworks-drafts--id-">
                                <a href="#artworks-PUTapi-v1-artworks-drafts--id-">Publish Artwork Draft</a>
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
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v1-artworks-drafts--id--artwork-photos">
                                <a href="#endpoints-POSTapi-v1-artworks-drafts--id--artwork-photos">Upload Artwork Photos</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-v1-artwork-photos--id-">
                                <a href="#endpoints-PUTapi-v1-artwork-photos--id-">Set Artwork Photo As Main</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-v1-artwork-photos--id-">
                                <a href="#endpoints-DELETEapi-v1-artwork-photos--id-">Delete Artwork Photo</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-follows" class="tocify-header">
                <li class="tocify-item level-1" data-unique="follows">
                    <a href="#follows">Follows</a>
                </li>
                                    <ul id="tocify-subheader-follows" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="follows-GETapi-v1-authenticated-follows-followers">
                                <a href="#follows-GETapi-v1-authenticated-follows-followers">List Authenticated User Following</a>
                            </li>
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
                                <a href="#users-GETapi-v1-users">List Users</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="users-GETapi-v1-users-verified--count-">
                                <a href="#users-GETapi-v1-users-verified--count-">List Verified Users</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="users-GETapi-v1-users--username-">
                                <a href="#users-GETapi-v1-users--username-">Show User</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="users-GETapi-v1-authenticated">
                                <a href="#users-GETapi-v1-authenticated">Show Authenticated User</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="users-PUTapi-v1-authenticated">
                                <a href="#users-PUTapi-v1-authenticated">Update User</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="users-PUTapi-v1-authenticated-photo">
                                <a href="#users-PUTapi-v1-authenticated-photo">Update User Photo</a>
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
        <li>Last updated: January 24, 2025</li>
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
    "http://localhost:8000/api/v1/artwork-comments/5" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"comment_text\": \"atque\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artwork-comments/5"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "comment_text": "atque"
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
        &quot;id&quot;: 23,
        &quot;comment_text&quot;: &quot;Nihil consectetur sequi natus aut quia ea tenetur et.&quot;,
        &quot;artwork_id&quot;: 117,
        &quot;user_id&quot;: 218,
        &quot;created_at&quot;: &quot;2025-01-24T13:44:46.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-01-24T13:44:46.000000Z&quot;
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
               value="5"
               data-component="url">
    <br>
<p>The ID of the artwork to comment on Example: <code>5</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>comment_text</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="comment_text"                data-endpoint="POSTapi-v1-artwork-comments--id-"
               value="atque"
               data-component="body">
    <br>
<p>The text of the comment Example: <code>atque</code></p>
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
    "http://localhost:8000/api/v1/artwork-comments/8" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artwork-comments/8"
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
               value="8"
               data-component="url">
    <br>
<p>The ID of the comment to delete Example: <code>8</code></p>
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
    "http://localhost:8000/api/v1/artwork-comments/16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"comment_text\": \"corporis\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artwork-comments/16"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "comment_text": "corporis"
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
        &quot;id&quot;: 24,
        &quot;comment_text&quot;: &quot;Nulla quia quo aliquam ratione et quisquam aut est.&quot;,
        &quot;artwork_id&quot;: 118,
        &quot;user_id&quot;: 220,
        &quot;created_at&quot;: &quot;2025-01-24T13:44:46.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-01-24T13:44:46.000000Z&quot;
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
               value="16"
               data-component="url">
    <br>
<p>The ID of the comment to update Example: <code>16</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>comment_text</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="comment_text"                data-endpoint="PUTapi-v1-artwork-comments--id-"
               value="corporis"
               data-component="body">
    <br>
<p>The text of the comment Example: <code>corporis</code></p>
        </div>
        </form>

                <h1 id="artwork-likes">Artwork Likes</h1>

    

                                <h2 id="artwork-likes-GETapi-v1-users--username--artwork-likes-received-count-by-tag">List User Received Likes Count by Tag</h2>

<p>
</p>

<p>Retrieve the number of likes an artist has received by tag</p>

<span id="example-requests-GETapi-v1-users--username--artwork-likes-received-count-by-tag">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/users/adipisci/artwork-likes/received/count/by-tag" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/users/adipisci/artwork-likes/received/count/by-tag"
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

<span id="example-responses-GETapi-v1-users--username--artwork-likes-received-count-by-tag">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;tag_name&quot;: &quot;abstract&quot;,
            &quot;total_likes&quot;: 5
        },
        {
            &quot;tag_name&quot;: &quot;portrait&quot;,
            &quot;total_likes&quot;: 3
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-users--username--artwork-likes-received-count-by-tag" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-users--username--artwork-likes-received-count-by-tag"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-users--username--artwork-likes-received-count-by-tag"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-users--username--artwork-likes-received-count-by-tag" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-users--username--artwork-likes-received-count-by-tag">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-users--username--artwork-likes-received-count-by-tag" data-method="GET"
      data-path="api/v1/users/{username}/artwork-likes/received/count/by-tag"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-users--username--artwork-likes-received-count-by-tag', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-users--username--artwork-likes-received-count-by-tag"
                    onclick="tryItOut('GETapi-v1-users--username--artwork-likes-received-count-by-tag');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-users--username--artwork-likes-received-count-by-tag"
                    onclick="cancelTryOut('GETapi-v1-users--username--artwork-likes-received-count-by-tag');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-users--username--artwork-likes-received-count-by-tag"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/users/{username}/artwork-likes/received/count/by-tag</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-users--username--artwork-likes-received-count-by-tag"
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
                              name="Accept"                data-endpoint="GETapi-v1-users--username--artwork-likes-received-count-by-tag"
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
                              name="username"                data-endpoint="GETapi-v1-users--username--artwork-likes-received-count-by-tag"
               value="adipisci"
               data-component="url">
    <br>
<p>The username of the user Example: <code>adipisci</code></p>
            </div>
                    </form>

                    <h2 id="artwork-likes-GETapi-v1-users--username--artwork-likes-received-count">Show User Received Likes Count</h2>

<p>
</p>

<p>Retrieve the total number of likes an artist has received</p>

<span id="example-requests-GETapi-v1-users--username--artwork-likes-received-count">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/users/impedit/artwork-likes/received/count" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/users/impedit/artwork-likes/received/count"
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

<span id="example-responses-GETapi-v1-users--username--artwork-likes-received-count">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: 8
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-users--username--artwork-likes-received-count" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-users--username--artwork-likes-received-count"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-users--username--artwork-likes-received-count"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-users--username--artwork-likes-received-count" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-users--username--artwork-likes-received-count">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-users--username--artwork-likes-received-count" data-method="GET"
      data-path="api/v1/users/{username}/artwork-likes/received/count"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-users--username--artwork-likes-received-count', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-users--username--artwork-likes-received-count"
                    onclick="tryItOut('GETapi-v1-users--username--artwork-likes-received-count');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-users--username--artwork-likes-received-count"
                    onclick="cancelTryOut('GETapi-v1-users--username--artwork-likes-received-count');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-users--username--artwork-likes-received-count"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/users/{username}/artwork-likes/received/count</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-users--username--artwork-likes-received-count"
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
                              name="Accept"                data-endpoint="GETapi-v1-users--username--artwork-likes-received-count"
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
                              name="username"                data-endpoint="GETapi-v1-users--username--artwork-likes-received-count"
               value="impedit"
               data-component="url">
    <br>
<p>The username of the user Example: <code>impedit</code></p>
            </div>
                    </form>

                    <h2 id="artwork-likes-POSTapi-v1-artwork-likes--id-">Like Artwork</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Like an artwork</p>

<span id="example-requests-POSTapi-v1-artwork-likes--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/v1/artwork-likes/8" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artwork-likes/8"
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
        &quot;id&quot;: 18,
        &quot;artwork_id&quot;: 116,
        &quot;user_id&quot;: 216,
        &quot;created_at&quot;: &quot;2025-01-24T13:44:46.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-01-24T13:44:46.000000Z&quot;
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
               value="8"
               data-component="url">
    <br>
<p>The ID of the artwork to like Example: <code>8</code></p>
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
    "http://localhost:8000/api/v1/artwork-likes/6" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artwork-likes/6"
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
               value="6"
               data-component="url">
    <br>
<p>The ID of the artwork to unlike Example: <code>6</code></p>
            </div>
                    </form>

                <h1 id="artwork-tags">Artwork Tags</h1>

    

                                <h2 id="artwork-tags-GETapi-v1-users--username--artwork-tags">List User Artwork Tags</h2>

<p>
</p>

<p>Retrieve a list of tags used by a user's published artworks</p>

<span id="example-requests-GETapi-v1-users--username--artwork-tags">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/users/magnam/artwork-tags" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/users/magnam/artwork-tags"
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
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;abstract&quot;
        },
        {
            &quot;id&quot;: 5,
            &quot;name&quot;: &quot;portrait&quot;
        }
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
               value="magnam"
               data-component="url">
    <br>
<p>The username of the user Example: <code>magnam</code></p>
            </div>
                    </form>

                <h1 id="artworks">Artworks</h1>

    

                                <h2 id="artworks-GETapi-v1-artworks-published">List Published Artworks</h2>

<p>
</p>

<p>Retrieve a list of all published artworks</p>

<span id="example-requests-GETapi-v1-artworks-published">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/artworks/published?filter%5Btag%5D=filter%5Btag%5D%3Dabstract&amp;sort=sort%3Dtrending&amp;page=1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artworks/published"
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

<span id="example-responses-GETapi-v1-artworks-published">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 100,
            &quot;title&quot;: &quot;Est ad dignissimos illo dolorum numquam.&quot;,
            &quot;description&quot;: &quot;Voluptate illum sequi temporibus vero similique. Accusamus voluptatem et amet rerum tempore. Modi ut veniam veniam reiciendis et voluptates alias.&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;user_id&quot;: 185,
            &quot;created_at&quot;: &quot;2025-01-24T13:44:25.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-24T13:44:25.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: null,
            &quot;user&quot;: {
                &quot;id&quot;: 185,
                &quot;username&quot;: &quot;eva.beier&quot;,
                &quot;first_name&quot;: &quot;Anahi&quot;,
                &quot;last_name&quot;: &quot;Hintz&quot;,
                &quot;email&quot;: &quot;jenkins.damon@example.com&quot;,
                &quot;country&quot;: &quot;Latvia&quot;,
                &quot;bio&quot;: &quot;Omnis autem velit dolorum porro et aliquid. Consequatur aut voluptates nihil voluptates animi doloremque. Sint eum molestiae esse quia. Deleniti unde eius qui adipisci aut vel et quibusdam.&quot;,
                &quot;photo&quot;: &quot;https://via.placeholder.com/640x480.png/00ee22?text=sint&quot;,
                &quot;artist_verified_at&quot;: &quot;2025-01-24 13:44:25&quot;,
                &quot;email_verified_at&quot;: &quot;2025-01-24T13:44:25.000000Z&quot;,
                &quot;role&quot;: &quot;artist&quot;,
                &quot;created_at&quot;: &quot;2025-01-24T13:44:25.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-24T13:44:25.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 101,
            &quot;title&quot;: &quot;Qui voluptas est corrupti id.&quot;,
            &quot;description&quot;: &quot;Fugit consequuntur quis qui deleniti nemo eum aut. Nam voluptas dolorem reiciendis voluptatibus placeat. Non excepturi excepturi adipisci doloremque aliquid consectetur.&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;user_id&quot;: 186,
            &quot;created_at&quot;: &quot;2025-01-24T13:44:25.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-24T13:44:25.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: null,
            &quot;user&quot;: {
                &quot;id&quot;: 186,
                &quot;username&quot;: &quot;ricky.romaguera&quot;,
                &quot;first_name&quot;: &quot;Pascale&quot;,
                &quot;last_name&quot;: &quot;Kautzer&quot;,
                &quot;email&quot;: &quot;kovacek.alexandra@example.net&quot;,
                &quot;country&quot;: &quot;Kazakhstan&quot;,
                &quot;bio&quot;: &quot;Quos autem minus qui officiis repellat. Fugiat vel sint ipsum repellat ea. Id magnam et minus. Itaque sit quam est expedita.&quot;,
                &quot;photo&quot;: null,
                &quot;artist_verified_at&quot;: null,
                &quot;email_verified_at&quot;: &quot;2025-01-24T13:44:25.000000Z&quot;,
                &quot;role&quot;: &quot;artist&quot;,
                &quot;created_at&quot;: &quot;2025-01-24T13:44:25.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-24T13:44:25.000000Z&quot;
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
<span id="execution-results-GETapi-v1-artworks-published" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-artworks-published"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-artworks-published"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-artworks-published" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-artworks-published">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-artworks-published" data-method="GET"
      data-path="api/v1/artworks/published"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-artworks-published', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-artworks-published"
                    onclick="tryItOut('GETapi-v1-artworks-published');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-artworks-published"
                    onclick="cancelTryOut('GETapi-v1-artworks-published');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-artworks-published"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/artworks/published</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-artworks-published"
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
                              name="Accept"                data-endpoint="GETapi-v1-artworks-published"
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
                              name="filter[tag]"                data-endpoint="GETapi-v1-artworks-published"
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
                              name="sort"                data-endpoint="GETapi-v1-artworks-published"
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
                              name="page"                data-endpoint="GETapi-v1-artworks-published"
               value="1"
               data-component="query">
    <br>
<p>The page number to fetch. Example: <code>1</code></p>
            </div>
                </form>

                    <h2 id="artworks-GETapi-v1-artworks-published-trending--count-">List Trending Published Artworks</h2>

<p>
</p>

<p>Retrieve a list of trending published artworks</p>

<span id="example-requests-GETapi-v1-artworks-published-trending--count-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/artworks/published/trending/9" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artworks/published/trending/9"
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

<span id="example-responses-GETapi-v1-artworks-published-trending--count-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 102,
            &quot;title&quot;: &quot;Omnis inventore veniam odit dolorem sit ut nostrum.&quot;,
            &quot;description&quot;: &quot;Sint iusto ut omnis reiciendis similique aut numquam. Eligendi asperiores vel placeat eius similique quisquam. Minima earum quo unde qui molestiae.&quot;,
            &quot;status&quot;: &quot;draft&quot;,
            &quot;user_id&quot;: 187,
            &quot;created_at&quot;: &quot;2025-01-24T13:44:25.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-24T13:44:25.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: null,
            &quot;user&quot;: {
                &quot;id&quot;: 187,
                &quot;username&quot;: &quot;becker.belle&quot;,
                &quot;first_name&quot;: &quot;Melyssa&quot;,
                &quot;last_name&quot;: &quot;Bins&quot;,
                &quot;email&quot;: &quot;rolando.white@example.com&quot;,
                &quot;country&quot;: &quot;Cameroon&quot;,
                &quot;bio&quot;: &quot;Quibusdam sint fuga blanditiis aliquid eius necessitatibus architecto. Illum non dolor hic rerum praesentium.&quot;,
                &quot;photo&quot;: null,
                &quot;artist_verified_at&quot;: null,
                &quot;email_verified_at&quot;: &quot;2025-01-24T13:44:25.000000Z&quot;,
                &quot;role&quot;: &quot;artist&quot;,
                &quot;created_at&quot;: &quot;2025-01-24T13:44:25.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-24T13:44:25.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 103,
            &quot;title&quot;: &quot;Explicabo voluptatem natus ut in quaerat optio qui.&quot;,
            &quot;description&quot;: &quot;Vero ut exercitationem esse et eveniet laudantium ratione. Quidem itaque iste error consequatur quae. Ab vel labore rerum velit voluptatibus repellat.&quot;,
            &quot;status&quot;: &quot;draft&quot;,
            &quot;user_id&quot;: 188,
            &quot;created_at&quot;: &quot;2025-01-24T13:44:25.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-24T13:44:25.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: null,
            &quot;user&quot;: {
                &quot;id&quot;: 188,
                &quot;username&quot;: &quot;kim.thiel&quot;,
                &quot;first_name&quot;: &quot;Javier&quot;,
                &quot;last_name&quot;: &quot;Ortiz&quot;,
                &quot;email&quot;: &quot;vito56@example.com&quot;,
                &quot;country&quot;: &quot;Madagascar&quot;,
                &quot;bio&quot;: &quot;Aliquid nostrum ab cum fugit ut distinctio. Ratione magni et qui similique aspernatur quibusdam ea. Aperiam et tempore placeat expedita eum voluptatem. Consequatur blanditiis magnam et vel qui tempora molestiae.&quot;,
                &quot;photo&quot;: null,
                &quot;artist_verified_at&quot;: &quot;2025-01-24 13:44:25&quot;,
                &quot;email_verified_at&quot;: &quot;2025-01-24T13:44:25.000000Z&quot;,
                &quot;role&quot;: &quot;artist&quot;,
                &quot;created_at&quot;: &quot;2025-01-24T13:44:25.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-24T13:44:25.000000Z&quot;
            }
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-artworks-published-trending--count-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-artworks-published-trending--count-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-artworks-published-trending--count-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-artworks-published-trending--count-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-artworks-published-trending--count-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-artworks-published-trending--count-" data-method="GET"
      data-path="api/v1/artworks/published/trending/{count}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-artworks-published-trending--count-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-artworks-published-trending--count-"
                    onclick="tryItOut('GETapi-v1-artworks-published-trending--count-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-artworks-published-trending--count-"
                    onclick="cancelTryOut('GETapi-v1-artworks-published-trending--count-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-artworks-published-trending--count-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/artworks/published/trending/{count}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-artworks-published-trending--count-"
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
                              name="Accept"                data-endpoint="GETapi-v1-artworks-published-trending--count-"
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
               step="any"               name="count"                data-endpoint="GETapi-v1-artworks-published-trending--count-"
               value="9"
               data-component="url">
    <br>
<p>The number of records to retrieve Example: <code>9</code></p>
            </div>
                    </form>

                    <h2 id="artworks-GETapi-v1-artworks-published-new--count-">List New Published Artworks</h2>

<p>
</p>

<p>Retrieve a list of new published artworks</p>

<span id="example-requests-GETapi-v1-artworks-published-new--count-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/artworks/published/new/18" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artworks/published/new/18"
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

<span id="example-responses-GETapi-v1-artworks-published-new--count-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 104,
            &quot;title&quot;: &quot;Veniam praesentium illo dolore aliquam.&quot;,
            &quot;description&quot;: &quot;Harum quis nemo quis non. Perferendis incidunt debitis fugiat expedita exercitationem unde illum. Dolorum unde tempore harum quasi sunt et.&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;user_id&quot;: 189,
            &quot;created_at&quot;: &quot;2025-01-24T13:44:25.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-24T13:44:25.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: null,
            &quot;user&quot;: {
                &quot;id&quot;: 189,
                &quot;username&quot;: &quot;pauline59&quot;,
                &quot;first_name&quot;: &quot;Bertha&quot;,
                &quot;last_name&quot;: &quot;Boehm&quot;,
                &quot;email&quot;: &quot;noelia.pfannerstill@example.net&quot;,
                &quot;country&quot;: &quot;Nigeria&quot;,
                &quot;bio&quot;: &quot;Suscipit assumenda consequatur ut eius. Autem dolor ipsa sed. Sed numquam aliquam quis adipisci.&quot;,
                &quot;photo&quot;: &quot;https://via.placeholder.com/640x480.png/000033?text=qui&quot;,
                &quot;artist_verified_at&quot;: null,
                &quot;email_verified_at&quot;: &quot;2025-01-24T13:44:25.000000Z&quot;,
                &quot;role&quot;: &quot;artist&quot;,
                &quot;created_at&quot;: &quot;2025-01-24T13:44:25.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-24T13:44:25.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 105,
            &quot;title&quot;: &quot;Natus earum omnis fuga dolorem vitae quo.&quot;,
            &quot;description&quot;: &quot;Corporis ipsum voluptates et enim quia repudiandae voluptatem. Ea perferendis ut omnis doloribus et qui.&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;user_id&quot;: 190,
            &quot;created_at&quot;: &quot;2025-01-24T13:44:25.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-24T13:44:25.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: null,
            &quot;user&quot;: {
                &quot;id&quot;: 190,
                &quot;username&quot;: &quot;maya92&quot;,
                &quot;first_name&quot;: &quot;Petra&quot;,
                &quot;last_name&quot;: &quot;Effertz&quot;,
                &quot;email&quot;: &quot;hand.lessie@example.net&quot;,
                &quot;country&quot;: &quot;France&quot;,
                &quot;bio&quot;: &quot;Similique cum amet dolorum earum quibusdam. Cupiditate est aut aut consequatur minima architecto et. Eos a vel quia consequatur autem ipsam inventore. Aliquam natus hic quaerat sit.&quot;,
                &quot;photo&quot;: null,
                &quot;artist_verified_at&quot;: &quot;2025-01-24 13:44:25&quot;,
                &quot;email_verified_at&quot;: &quot;2025-01-24T13:44:25.000000Z&quot;,
                &quot;role&quot;: &quot;artist&quot;,
                &quot;created_at&quot;: &quot;2025-01-24T13:44:25.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-24T13:44:25.000000Z&quot;
            }
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-artworks-published-new--count-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-artworks-published-new--count-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-artworks-published-new--count-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-artworks-published-new--count-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-artworks-published-new--count-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-artworks-published-new--count-" data-method="GET"
      data-path="api/v1/artworks/published/new/{count}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-artworks-published-new--count-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-artworks-published-new--count-"
                    onclick="tryItOut('GETapi-v1-artworks-published-new--count-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-artworks-published-new--count-"
                    onclick="cancelTryOut('GETapi-v1-artworks-published-new--count-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-artworks-published-new--count-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/artworks/published/new/{count}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-artworks-published-new--count-"
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
                              name="Accept"                data-endpoint="GETapi-v1-artworks-published-new--count-"
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
               step="any"               name="count"                data-endpoint="GETapi-v1-artworks-published-new--count-"
               value="18"
               data-component="url">
    <br>
<p>The number of records to retrieve Example: <code>18</code></p>
            </div>
                    </form>

                    <h2 id="artworks-GETapi-v1-artworks-published--id-">Show Published Artwork</h2>

<p>
</p>

<p>Retrieve a single published artwork by id</p>

<span id="example-requests-GETapi-v1-artworks-published--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/artworks/published/4" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artworks/published/4"
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

<span id="example-responses-GETapi-v1-artworks-published--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 106,
            &quot;title&quot;: &quot;Molestiae provident consequuntur quibusdam.&quot;,
            &quot;description&quot;: &quot;Minima quia voluptas molestiae et. Laudantium eos voluptas iure sint.&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;user_id&quot;: 191,
            &quot;created_at&quot;: &quot;2025-01-24T13:44:25.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-24T13:44:25.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 1,
            &quot;artwork_comments_count&quot;: 1,
            &quot;artwork_main_photo_path&quot;: null,
            &quot;user&quot;: {
                &quot;id&quot;: 191,
                &quot;username&quot;: &quot;orempel&quot;,
                &quot;first_name&quot;: &quot;Alejandra&quot;,
                &quot;last_name&quot;: &quot;Bode&quot;,
                &quot;email&quot;: &quot;glover.adrain@example.org&quot;,
                &quot;country&quot;: &quot;Belize&quot;,
                &quot;bio&quot;: &quot;Consequatur similique et quia labore libero voluptas. Et est quibusdam ea ea est sint. Porro nemo laboriosam sed voluptatum non voluptatem perspiciatis. Ut totam dolorem distinctio amet fugiat rem laudantium.&quot;,
                &quot;photo&quot;: null,
                &quot;artist_verified_at&quot;: null,
                &quot;email_verified_at&quot;: &quot;2025-01-24T13:44:25.000000Z&quot;,
                &quot;role&quot;: &quot;artist&quot;,
                &quot;created_at&quot;: &quot;2025-01-24T13:44:25.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-24T13:44:25.000000Z&quot;
            },
            &quot;artwork_photos&quot;: [
                {
                    &quot;id&quot;: 25,
                    &quot;path&quot;: &quot;0&quot;,
                    &quot;is_main&quot;: 0,
                    &quot;artwork_id&quot;: 106,
                    &quot;created_at&quot;: &quot;2025-01-24T13:44:30.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-24T13:44:30.000000Z&quot;
                }
            ],
            &quot;artwork_comments&quot;: [
                {
                    &quot;id&quot;: 21,
                    &quot;comment_text&quot;: &quot;Maxime et deleniti hic repudiandae tempora labore est.&quot;,
                    &quot;artwork_id&quot;: 106,
                    &quot;user_id&quot;: 192,
                    &quot;created_at&quot;: &quot;2025-01-24T13:44:30.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-24T13:44:30.000000Z&quot;,
                    &quot;user&quot;: {
                        &quot;id&quot;: 192,
                        &quot;username&quot;: &quot;haven.doyle&quot;,
                        &quot;first_name&quot;: &quot;Nathanael&quot;,
                        &quot;last_name&quot;: &quot;Waelchi&quot;,
                        &quot;email&quot;: &quot;bechtelar.edgar@example.net&quot;,
                        &quot;country&quot;: &quot;Liechtenstein&quot;,
                        &quot;bio&quot;: &quot;Velit occaecati dolores magnam laudantium dolorum maxime dolores. Labore praesentium at praesentium qui. Excepturi dolores facilis voluptatum.&quot;,
                        &quot;photo&quot;: &quot;https://via.placeholder.com/640x480.png/009955?text=reiciendis&quot;,
                        &quot;artist_verified_at&quot;: null,
                        &quot;email_verified_at&quot;: &quot;2025-01-24T13:44:30.000000Z&quot;,
                        &quot;role&quot;: &quot;artist&quot;,
                        &quot;created_at&quot;: &quot;2025-01-24T13:44:30.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-01-24T13:44:30.000000Z&quot;
                    }
                }
            ],
            &quot;artwork_likes&quot;: [
                {
                    &quot;id&quot;: 16,
                    &quot;artwork_id&quot;: 106,
                    &quot;user_id&quot;: 193,
                    &quot;created_at&quot;: &quot;2025-01-24T13:44:30.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-24T13:44:30.000000Z&quot;,
                    &quot;user&quot;: {
                        &quot;id&quot;: 193,
                        &quot;username&quot;: &quot;sarai.schmeler&quot;,
                        &quot;first_name&quot;: &quot;Mac&quot;,
                        &quot;last_name&quot;: &quot;Will&quot;,
                        &quot;email&quot;: &quot;isabelle.stroman@example.net&quot;,
                        &quot;country&quot;: &quot;Belgium&quot;,
                        &quot;bio&quot;: &quot;Repellendus ipsa et soluta at. Dolor quidem animi rem enim facere. Itaque et nihil voluptatem rerum impedit.&quot;,
                        &quot;photo&quot;: null,
                        &quot;artist_verified_at&quot;: null,
                        &quot;email_verified_at&quot;: &quot;2025-01-24T13:44:30.000000Z&quot;,
                        &quot;role&quot;: &quot;artist&quot;,
                        &quot;created_at&quot;: &quot;2025-01-24T13:44:30.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-01-24T13:44:30.000000Z&quot;
                    }
                }
            ],
            &quot;tags&quot;: [
                {
                    &quot;id&quot;: 21,
                    &quot;name&quot;: &quot;Dr. Junius Weber&quot;,
                    &quot;created_at&quot;: &quot;2025-01-24T13:44:30.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-24T13:44:30.000000Z&quot;,
                    &quot;pivot&quot;: {
                        &quot;artwork_id&quot;: 106,
                        &quot;tag_id&quot;: 21
                    }
                }
            ]
        },
        {
            &quot;id&quot;: 107,
            &quot;title&quot;: &quot;Nihil tempore consequatur ducimus molestiae possimus.&quot;,
            &quot;description&quot;: &quot;Magni dolore voluptatem voluptates et voluptatum. Accusantium vel quas quasi qui quia vero error. Rem tempora eum aut dolorem aliquid ipsam a.&quot;,
            &quot;status&quot;: &quot;draft&quot;,
            &quot;user_id&quot;: 194,
            &quot;created_at&quot;: &quot;2025-01-24T13:44:30.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-24T13:44:30.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 1,
            &quot;artwork_comments_count&quot;: 1,
            &quot;artwork_main_photo_path&quot;: &quot;0&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 194,
                &quot;username&quot;: &quot;macy85&quot;,
                &quot;first_name&quot;: &quot;Elsa&quot;,
                &quot;last_name&quot;: &quot;Lesch&quot;,
                &quot;email&quot;: &quot;ypfannerstill@example.com&quot;,
                &quot;country&quot;: &quot;Western Sahara&quot;,
                &quot;bio&quot;: &quot;Culpa veritatis et quod nisi. Nam impedit voluptas consequatur et. Debitis accusamus ipsa quis quo sed.&quot;,
                &quot;photo&quot;: &quot;https://via.placeholder.com/640x480.png/00eebb?text=qui&quot;,
                &quot;artist_verified_at&quot;: null,
                &quot;email_verified_at&quot;: &quot;2025-01-24T13:44:30.000000Z&quot;,
                &quot;role&quot;: &quot;artist&quot;,
                &quot;created_at&quot;: &quot;2025-01-24T13:44:30.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-01-24T13:44:30.000000Z&quot;
            },
            &quot;artwork_photos&quot;: [
                {
                    &quot;id&quot;: 26,
                    &quot;path&quot;: &quot;0&quot;,
                    &quot;is_main&quot;: 1,
                    &quot;artwork_id&quot;: 107,
                    &quot;created_at&quot;: &quot;2025-01-24T13:44:35.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-24T13:44:35.000000Z&quot;
                }
            ],
            &quot;artwork_comments&quot;: [
                {
                    &quot;id&quot;: 22,
                    &quot;comment_text&quot;: &quot;Amet dolor repudiandae animi ipsam eos.&quot;,
                    &quot;artwork_id&quot;: 107,
                    &quot;user_id&quot;: 195,
                    &quot;created_at&quot;: &quot;2025-01-24T13:44:35.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-24T13:44:35.000000Z&quot;,
                    &quot;user&quot;: {
                        &quot;id&quot;: 195,
                        &quot;username&quot;: &quot;vraynor&quot;,
                        &quot;first_name&quot;: &quot;Eda&quot;,
                        &quot;last_name&quot;: &quot;Sauer&quot;,
                        &quot;email&quot;: &quot;ahmed36@example.com&quot;,
                        &quot;country&quot;: &quot;Kiribati&quot;,
                        &quot;bio&quot;: &quot;Quod eum et consequatur praesentium et quos. Neque suscipit eius et rerum.&quot;,
                        &quot;photo&quot;: null,
                        &quot;artist_verified_at&quot;: &quot;2025-01-24 13:44:35&quot;,
                        &quot;email_verified_at&quot;: &quot;2025-01-24T13:44:35.000000Z&quot;,
                        &quot;role&quot;: &quot;artist&quot;,
                        &quot;created_at&quot;: &quot;2025-01-24T13:44:35.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-01-24T13:44:35.000000Z&quot;
                    }
                }
            ],
            &quot;artwork_likes&quot;: [
                {
                    &quot;id&quot;: 17,
                    &quot;artwork_id&quot;: 107,
                    &quot;user_id&quot;: 196,
                    &quot;created_at&quot;: &quot;2025-01-24T13:44:35.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-24T13:44:35.000000Z&quot;,
                    &quot;user&quot;: {
                        &quot;id&quot;: 196,
                        &quot;username&quot;: &quot;juwan76&quot;,
                        &quot;first_name&quot;: &quot;Lamar&quot;,
                        &quot;last_name&quot;: &quot;Jaskolski&quot;,
                        &quot;email&quot;: &quot;arlie.satterfield@example.com&quot;,
                        &quot;country&quot;: &quot;China&quot;,
                        &quot;bio&quot;: &quot;Ex ad veritatis illo cum adipisci. Magnam eveniet omnis autem consectetur. Voluptatibus magnam ullam veniam nam quam.&quot;,
                        &quot;photo&quot;: null,
                        &quot;artist_verified_at&quot;: &quot;2025-01-24 13:44:35&quot;,
                        &quot;email_verified_at&quot;: &quot;2025-01-24T13:44:35.000000Z&quot;,
                        &quot;role&quot;: &quot;artist&quot;,
                        &quot;created_at&quot;: &quot;2025-01-24T13:44:35.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-01-24T13:44:35.000000Z&quot;
                    }
                }
            ],
            &quot;tags&quot;: [
                {
                    &quot;id&quot;: 22,
                    &quot;name&quot;: &quot;Miss Carmela Sauer DVM&quot;,
                    &quot;created_at&quot;: &quot;2025-01-24T13:44:35.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-24T13:44:35.000000Z&quot;,
                    &quot;pivot&quot;: {
                        &quot;artwork_id&quot;: 107,
                        &quot;tag_id&quot;: 22
                    }
                }
            ]
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-artworks-published--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-artworks-published--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-artworks-published--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-artworks-published--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-artworks-published--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-artworks-published--id-" data-method="GET"
      data-path="api/v1/artworks/published/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-artworks-published--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-artworks-published--id-"
                    onclick="tryItOut('GETapi-v1-artworks-published--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-artworks-published--id-"
                    onclick="cancelTryOut('GETapi-v1-artworks-published--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-artworks-published--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/artworks/published/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-artworks-published--id-"
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
                              name="Accept"                data-endpoint="GETapi-v1-artworks-published--id-"
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
               step="any"               name="id"                data-endpoint="GETapi-v1-artworks-published--id-"
               value="4"
               data-component="url">
    <br>
<p>The id of the artwork Example: <code>4</code></p>
            </div>
                    </form>

                    <h2 id="artworks-GETapi-v1-users--username--artworks-published">List User Published Artworks</h2>

<p>
</p>

<p>Retrieve a list of artworks published by a user</p>

<span id="example-requests-GETapi-v1-users--username--artworks-published">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/users/ad/artworks/published?filter%5Btag%5D=filter%5Btag%5D%3Dabstract&amp;page=1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/users/ad/artworks/published"
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

<span id="example-responses-GETapi-v1-users--username--artworks-published">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 108,
            &quot;title&quot;: &quot;Dolores quae sit voluptatem dolore.&quot;,
            &quot;description&quot;: &quot;Magni minus asperiores enim iusto numquam soluta. Et voluptatem cupiditate molestiae qui. Et dolorem ut ut eius tenetur nesciunt eum pariatur. Magni molestiae quo et numquam quam. Et voluptatem perferendis minima quibusdam aut.&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;user_id&quot;: 197,
            &quot;created_at&quot;: &quot;2025-01-24T13:44:35.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-24T13:44:35.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: null
        },
        {
            &quot;id&quot;: 109,
            &quot;title&quot;: &quot;Et possimus reiciendis quidem sunt ut minima et.&quot;,
            &quot;description&quot;: &quot;Aut maxime commodi impedit voluptas at tempore accusantium. Ex iure dolor accusamus voluptatem sed voluptatum id est. Quia aut beatae totam aut ratione quisquam totam odit.&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;user_id&quot;: 198,
            &quot;created_at&quot;: &quot;2025-01-24T13:44:35.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-24T13:44:35.000000Z&quot;,
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
<span id="execution-results-GETapi-v1-users--username--artworks-published" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-users--username--artworks-published"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-users--username--artworks-published"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-users--username--artworks-published" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-users--username--artworks-published">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-users--username--artworks-published" data-method="GET"
      data-path="api/v1/users/{username}/artworks/published"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-users--username--artworks-published', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-users--username--artworks-published"
                    onclick="tryItOut('GETapi-v1-users--username--artworks-published');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-users--username--artworks-published"
                    onclick="cancelTryOut('GETapi-v1-users--username--artworks-published');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-users--username--artworks-published"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/users/{username}/artworks/published</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-users--username--artworks-published"
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
                              name="Accept"                data-endpoint="GETapi-v1-users--username--artworks-published"
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
                              name="username"                data-endpoint="GETapi-v1-users--username--artworks-published"
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
                              name="filter[tag]"                data-endpoint="GETapi-v1-users--username--artworks-published"
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
                              name="page"                data-endpoint="GETapi-v1-users--username--artworks-published"
               value="1"
               data-component="query">
    <br>
<p>The page number to fetch. Example: <code>1</code></p>
            </div>
                </form>

                    <h2 id="artworks-GETapi-v1-authenticated-artworks-published">List Authenticated User Favorite Artworks</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Retrieve a list of artworks marked as favorite by the currently authenticated user</p>

<span id="example-requests-GETapi-v1-authenticated-artworks-published">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/authenticated/artworks/published?page=1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/authenticated/artworks/published"
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

<span id="example-responses-GETapi-v1-authenticated-artworks-published">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 110,
            &quot;title&quot;: &quot;Vel voluptatem reprehenderit nisi mollitia ipsum.&quot;,
            &quot;description&quot;: &quot;Ut voluptatibus nulla eius laudantium minus saepe. Id commodi labore et. Accusamus ipsam eum est rem.&quot;,
            &quot;status&quot;: &quot;draft&quot;,
            &quot;user_id&quot;: 199,
            &quot;created_at&quot;: &quot;2025-01-24T13:44:36.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-24T13:44:36.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: null,
            &quot;artwork_photos&quot;: [
                {
                    &quot;id&quot;: 27,
                    &quot;path&quot;: &quot;0&quot;,
                    &quot;is_main&quot;: 0,
                    &quot;artwork_id&quot;: 110,
                    &quot;created_at&quot;: &quot;2025-01-24T13:44:41.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-24T13:44:41.000000Z&quot;
                }
            ],
            &quot;tags&quot;: [
                {
                    &quot;id&quot;: 23,
                    &quot;name&quot;: &quot;Herbert Vandervort&quot;,
                    &quot;created_at&quot;: &quot;2025-01-24T13:44:41.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-24T13:44:41.000000Z&quot;,
                    &quot;pivot&quot;: {
                        &quot;artwork_id&quot;: 110,
                        &quot;tag_id&quot;: 23
                    }
                }
            ]
        },
        {
            &quot;id&quot;: 111,
            &quot;title&quot;: &quot;Quia et dolorem dolores autem.&quot;,
            &quot;description&quot;: &quot;Qui a qui soluta voluptatem aut. Sit accusamus esse ratione amet. Perspiciatis optio qui soluta corporis.&quot;,
            &quot;status&quot;: &quot;draft&quot;,
            &quot;user_id&quot;: 200,
            &quot;created_at&quot;: &quot;2025-01-24T13:44:41.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-24T13:44:41.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: null,
            &quot;artwork_photos&quot;: [
                {
                    &quot;id&quot;: 28,
                    &quot;path&quot;: &quot;0&quot;,
                    &quot;is_main&quot;: 0,
                    &quot;artwork_id&quot;: 111,
                    &quot;created_at&quot;: &quot;2025-01-24T13:44:46.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-24T13:44:46.000000Z&quot;
                }
            ],
            &quot;tags&quot;: [
                {
                    &quot;id&quot;: 24,
                    &quot;name&quot;: &quot;Uriel Dicki&quot;,
                    &quot;created_at&quot;: &quot;2025-01-24T13:44:46.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-24T13:44:46.000000Z&quot;,
                    &quot;pivot&quot;: {
                        &quot;artwork_id&quot;: 111,
                        &quot;tag_id&quot;: 24
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
<span id="execution-results-GETapi-v1-authenticated-artworks-published" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-authenticated-artworks-published"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-authenticated-artworks-published"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-authenticated-artworks-published" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-authenticated-artworks-published">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-authenticated-artworks-published" data-method="GET"
      data-path="api/v1/authenticated/artworks/published"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-authenticated-artworks-published', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-authenticated-artworks-published"
                    onclick="tryItOut('GETapi-v1-authenticated-artworks-published');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-authenticated-artworks-published"
                    onclick="cancelTryOut('GETapi-v1-authenticated-artworks-published');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-authenticated-artworks-published"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/authenticated/artworks/published</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-authenticated-artworks-published"
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
                              name="Accept"                data-endpoint="GETapi-v1-authenticated-artworks-published"
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
                              name="page"                data-endpoint="GETapi-v1-authenticated-artworks-published"
               value="1"
               data-component="query">
    <br>
<p>The page number to fetch. Example: <code>1</code></p>
            </div>
                </form>

                    <h2 id="artworks-POSTapi-v1-artworks-drafts">Create Artwork Draft</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Create a new artwork draft</p>

<span id="example-requests-POSTapi-v1-artworks-drafts">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/v1/artworks/drafts" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "photos[][is_main]=1"\
    --form "title=Artwork Title"\
    --form "description=This is an artwork description"\
    --form "tags[]=abstract"\
    --form "photos[][file]=@/tmp/phpv9pd3psr2210bAlPhHB" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artworks/drafts"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('photos[][is_main]', '1');
body.append('title', 'Artwork Title');
body.append('description', 'This is an artwork description');
body.append('tags[]', 'abstract');
body.append('photos[][file]', document.querySelector('input[name="photos[][file]"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-artworks-drafts">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 112,
        &quot;title&quot;: &quot;Rerum enim tenetur aliquam ea molestias quasi laborum.&quot;,
        &quot;description&quot;: &quot;Labore est est dolorem praesentium magnam ad vel qui. Quos repellat distinctio sed at. Voluptates provident illo doloremque. Magnam nam unde est sequi voluptatem consequatur. Sit omnis corporis saepe id sint.&quot;,
        &quot;status&quot;: &quot;draft&quot;,
        &quot;user_id&quot;: 201,
        &quot;created_at&quot;: &quot;2025-01-24T13:44:46.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-01-24T13:44:46.000000Z&quot;,
        &quot;artwork_likes_count&quot;: 0,
        &quot;artwork_comments_count&quot;: 0,
        &quot;artwork_main_photo_path&quot;: null
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-artworks-drafts" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-artworks-drafts"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-artworks-drafts"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-artworks-drafts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-artworks-drafts">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-artworks-drafts" data-method="POST"
      data-path="api/v1/artworks/drafts"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-artworks-drafts', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-artworks-drafts"
                    onclick="tryItOut('POSTapi-v1-artworks-drafts');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-artworks-drafts"
                    onclick="cancelTryOut('POSTapi-v1-artworks-drafts');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-artworks-drafts"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/artworks/drafts</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-artworks-drafts"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-artworks-drafts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>photos</code></b>&nbsp;&nbsp;
<small>object[]</small>&nbsp;
 &nbsp;
<br>
<p>The photos of the artwork. Must have at least 1 items. Must not have more than 10 items.</p>
            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>file</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="photos.0.file"                data-endpoint="POSTapi-v1-artworks-drafts"
               value=""
               data-component="body">
    <br>
<p>The file of the photo. Must be an image. Must not be greater than 2048 kilobytes. Example: <code>/tmp/phpv9pd3psr2210bAlPhHB</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>is_main</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
 &nbsp;
                <label data-endpoint="POSTapi-v1-artworks-drafts" style="display: none">
            <input type="radio" name="photos.0.is_main"
                   value="true"
                   data-endpoint="POSTapi-v1-artworks-drafts"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-v1-artworks-drafts" style="display: none">
            <input type="radio" name="photos.0.is_main"
                   value="false"
                   data-endpoint="POSTapi-v1-artworks-drafts"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Set a photo as main or not. Example: <code>true</code></p>
                    </div>
                                    </details>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="POSTapi-v1-artworks-drafts"
               value="Artwork Title"
               data-component="body">
    <br>
<p>The title of the artwork. Must not be greater than 255 characters. Example: <code>Artwork Title</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTapi-v1-artworks-drafts"
               value="This is an artwork description"
               data-component="body">
    <br>
<p>The description of the artwork. Example: <code>This is an artwork description</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>tags</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="tags[0]"                data-endpoint="POSTapi-v1-artworks-drafts"
               data-component="body">
        <input type="text" style="display: none"
               name="tags[1]"                data-endpoint="POSTapi-v1-artworks-drafts"
               data-component="body">
    <br>
<p>The tag of the artwork.</p>
        </div>
        </form>

                    <h2 id="artworks-PUTapi-v1-artworks-drafts--id-">Publish Artwork Draft</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Publish an artwork draft</p>

<span id="example-requests-PUTapi-v1-artworks-drafts--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/v1/artworks/drafts/18" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artworks/drafts/18"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-artworks-drafts--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 113,
        &quot;title&quot;: &quot;Voluptas ut et modi iure placeat nulla quos.&quot;,
        &quot;description&quot;: &quot;Et odio aut ut voluptatum quia aut. Blanditiis voluptatum quam tempora nesciunt et omnis vel. Voluptatum praesentium sed nostrum animi.&quot;,
        &quot;status&quot;: &quot;published&quot;,
        &quot;user_id&quot;: 202,
        &quot;created_at&quot;: &quot;2025-01-24T13:44:46.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-01-24T13:44:46.000000Z&quot;,
        &quot;artwork_likes_count&quot;: 0,
        &quot;artwork_comments_count&quot;: 0,
        &quot;artwork_main_photo_path&quot;: null
    }
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-v1-artworks-drafts--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-artworks-drafts--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-artworks-drafts--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-artworks-drafts--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-artworks-drafts--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-artworks-drafts--id-" data-method="PUT"
      data-path="api/v1/artworks/drafts/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-artworks-drafts--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-artworks-drafts--id-"
                    onclick="tryItOut('PUTapi-v1-artworks-drafts--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-artworks-drafts--id-"
                    onclick="cancelTryOut('PUTapi-v1-artworks-drafts--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-artworks-drafts--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/artworks/drafts/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-artworks-drafts--id-"
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
                              name="Accept"                data-endpoint="PUTapi-v1-artworks-drafts--id-"
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
               step="any"               name="id"                data-endpoint="PUTapi-v1-artworks-drafts--id-"
               value="18"
               data-component="url">
    <br>
<p>The id of the artwork Example: <code>18</code></p>
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

                <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-POSTapi-v1-artworks-drafts--id--artwork-photos">Upload Artwork Photos</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Upload photos to an artwork draft</p>

<span id="example-requests-POSTapi-v1-artworks-drafts--id--artwork-photos">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/v1/artworks/drafts/13/artwork-photos" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "photos[]=@/tmp/phpim2cvkqhkslk0odAllH" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artworks/drafts/13/artwork-photos"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('photos[]', document.querySelector('input[name="photos[]"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-artworks-drafts--id--artwork-photos">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 29,
            &quot;path&quot;: &quot;0&quot;,
            &quot;is_main&quot;: 0,
            &quot;artwork_id&quot;: 119,
            &quot;created_at&quot;: &quot;2025-01-24T13:44:51.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-24T13:44:51.000000Z&quot;
        },
        {
            &quot;id&quot;: 30,
            &quot;path&quot;: &quot;0&quot;,
            &quot;is_main&quot;: 0,
            &quot;artwork_id&quot;: 120,
            &quot;created_at&quot;: &quot;2025-01-24T13:44:56.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-24T13:44:56.000000Z&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-artworks-drafts--id--artwork-photos" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-artworks-drafts--id--artwork-photos"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-artworks-drafts--id--artwork-photos"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-artworks-drafts--id--artwork-photos" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-artworks-drafts--id--artwork-photos">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-artworks-drafts--id--artwork-photos" data-method="POST"
      data-path="api/v1/artworks/drafts/{id}/artwork-photos"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-artworks-drafts--id--artwork-photos', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-artworks-drafts--id--artwork-photos"
                    onclick="tryItOut('POSTapi-v1-artworks-drafts--id--artwork-photos');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-artworks-drafts--id--artwork-photos"
                    onclick="cancelTryOut('POSTapi-v1-artworks-drafts--id--artwork-photos');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-artworks-drafts--id--artwork-photos"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/artworks/drafts/{id}/artwork-photos</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-artworks-drafts--id--artwork-photos"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-artworks-drafts--id--artwork-photos"
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
               step="any"               name="id"                data-endpoint="POSTapi-v1-artworks-drafts--id--artwork-photos"
               value="13"
               data-component="url">
    <br>
<p>The id of the artwork Example: <code>13</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>photos</code></b>&nbsp;&nbsp;
<small>file[]</small>&nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="photos[0]"                data-endpoint="POSTapi-v1-artworks-drafts--id--artwork-photos"
               data-component="body">
        <input type="file" style="display: none"
               name="photos[1]"                data-endpoint="POSTapi-v1-artworks-drafts--id--artwork-photos"
               data-component="body">
    <br>
<p>A photo of the artwork. Must be an image. Must not be greater than 2048 kilobytes.</p>
        </div>
        </form>

                    <h2 id="endpoints-PUTapi-v1-artwork-photos--id-">Set Artwork Photo As Main</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Set an artwork photo as the main photo of the artwork</p>

<span id="example-requests-PUTapi-v1-artwork-photos--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/v1/artwork-photos/2" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artwork-photos/2"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-artwork-photos--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 31,
        &quot;path&quot;: &quot;0&quot;,
        &quot;is_main&quot;: 1,
        &quot;artwork_id&quot;: 121,
        &quot;created_at&quot;: &quot;2025-01-24T13:45:01.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-01-24T13:45:01.000000Z&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-v1-artwork-photos--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-artwork-photos--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-artwork-photos--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-artwork-photos--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-artwork-photos--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-artwork-photos--id-" data-method="PUT"
      data-path="api/v1/artwork-photos/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-artwork-photos--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-artwork-photos--id-"
                    onclick="tryItOut('PUTapi-v1-artwork-photos--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-artwork-photos--id-"
                    onclick="cancelTryOut('PUTapi-v1-artwork-photos--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-artwork-photos--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/artwork-photos/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-artwork-photos--id-"
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
                              name="Accept"                data-endpoint="PUTapi-v1-artwork-photos--id-"
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
               step="any"               name="id"                data-endpoint="PUTapi-v1-artwork-photos--id-"
               value="2"
               data-component="url">
    <br>
<p>The id of the artwork photo Example: <code>2</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-DELETEapi-v1-artwork-photos--id-">Delete Artwork Photo</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Delete an artwork photo</p>

<span id="example-requests-DELETEapi-v1-artwork-photos--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/v1/artwork-photos/13" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artwork-photos/13"
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

<span id="example-responses-DELETEapi-v1-artwork-photos--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Artwork photo deleted successfully&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-v1-artwork-photos--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-artwork-photos--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-artwork-photos--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-artwork-photos--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-artwork-photos--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-v1-artwork-photos--id-" data-method="DELETE"
      data-path="api/v1/artwork-photos/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-artwork-photos--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-artwork-photos--id-"
                    onclick="tryItOut('DELETEapi-v1-artwork-photos--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-artwork-photos--id-"
                    onclick="cancelTryOut('DELETEapi-v1-artwork-photos--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-artwork-photos--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/artwork-photos/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-v1-artwork-photos--id-"
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
                              name="Accept"                data-endpoint="DELETEapi-v1-artwork-photos--id-"
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
               step="any"               name="id"                data-endpoint="DELETEapi-v1-artwork-photos--id-"
               value="13"
               data-component="url">
    <br>
<p>The id of the artwork photo Example: <code>13</code></p>
            </div>
                    </form>

                <h1 id="follows">Follows</h1>

    

                                <h2 id="follows-GETapi-v1-authenticated-follows-followers">List Authenticated User Following</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Retrieve a list of users the authenticated user is following</p>

<span id="example-requests-GETapi-v1-authenticated-follows-followers">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/authenticated/follows/followers?page=1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/authenticated/follows/followers"
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

<span id="example-responses-GETapi-v1-authenticated-follows-followers">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 211,
            &quot;username&quot;: &quot;romaguera.furman&quot;,
            &quot;first_name&quot;: &quot;Vincent&quot;,
            &quot;last_name&quot;: &quot;Emard&quot;,
            &quot;email&quot;: &quot;xziemann@example.org&quot;,
            &quot;country&quot;: &quot;Indonesia&quot;,
            &quot;bio&quot;: &quot;Aspernatur sequi et optio. Qui corrupti quaerat ea. Doloribus quae fuga consectetur odit.&quot;,
            &quot;photo&quot;: &quot;https://via.placeholder.com/640x480.png/0011bb?text=quisquam&quot;,
            &quot;artist_verified_at&quot;: null,
            &quot;email_verified_at&quot;: &quot;2025-01-24T13:44:46.000000Z&quot;,
            &quot;role&quot;: &quot;artist&quot;,
            &quot;created_at&quot;: &quot;2025-01-24T13:44:46.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-24T13:44:46.000000Z&quot;
        },
        {
            &quot;id&quot;: 212,
            &quot;username&quot;: &quot;gfadel&quot;,
            &quot;first_name&quot;: &quot;Beth&quot;,
            &quot;last_name&quot;: &quot;Feeney&quot;,
            &quot;email&quot;: &quot;bethel60@example.org&quot;,
            &quot;country&quot;: &quot;Mali&quot;,
            &quot;bio&quot;: &quot;Libero nihil ratione dignissimos sit neque dolorem. Est nobis repudiandae hic aut qui ullam.&quot;,
            &quot;photo&quot;: null,
            &quot;artist_verified_at&quot;: null,
            &quot;email_verified_at&quot;: &quot;2025-01-24T13:44:46.000000Z&quot;,
            &quot;role&quot;: &quot;artist&quot;,
            &quot;created_at&quot;: &quot;2025-01-24T13:44:46.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-24T13:44:46.000000Z&quot;
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
<span id="execution-results-GETapi-v1-authenticated-follows-followers" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-authenticated-follows-followers"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-authenticated-follows-followers"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-authenticated-follows-followers" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-authenticated-follows-followers">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-authenticated-follows-followers" data-method="GET"
      data-path="api/v1/authenticated/follows/followers"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-authenticated-follows-followers', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-authenticated-follows-followers"
                    onclick="tryItOut('GETapi-v1-authenticated-follows-followers');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-authenticated-follows-followers"
                    onclick="cancelTryOut('GETapi-v1-authenticated-follows-followers');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-authenticated-follows-followers"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/authenticated/follows/followers</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-authenticated-follows-followers"
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
                              name="Accept"                data-endpoint="GETapi-v1-authenticated-follows-followers"
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
                              name="page"                data-endpoint="GETapi-v1-authenticated-follows-followers"
               value="1"
               data-component="query">
    <br>
<p>The page number to fetch. Example: <code>1</code></p>
            </div>
                </form>

                    <h2 id="follows-POSTapi-v1-follows--id-">Follow User</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Follow a user</p>

<span id="example-requests-POSTapi-v1-follows--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/v1/follows/19" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/follows/19"
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
        &quot;id&quot;: 6,
        &quot;follower_id&quot;: 213,
        &quot;followed_id&quot;: 214,
        &quot;created_at&quot;: &quot;2025-01-24T13:44:46.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-01-24T13:44:46.000000Z&quot;
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
               value="19"
               data-component="url">
    <br>
<p>The ID of the user to follow Example: <code>19</code></p>
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
    "http://localhost:8000/api/v1/follows/12" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/follows/12"
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
               value="12"
               data-component="url">
    <br>
<p>The ID of the user to unfollow Example: <code>12</code></p>
            </div>
                    </form>

                <h1 id="users">Users</h1>

    

                                <h2 id="users-GETapi-v1-users">List Users</h2>

<p>
</p>

<p>Retrieve a list of all users</p>

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
            &quot;id&quot;: 203,
            &quot;username&quot;: &quot;johnny24&quot;,
            &quot;first_name&quot;: &quot;Monty&quot;,
            &quot;last_name&quot;: &quot;Torp&quot;,
            &quot;email&quot;: &quot;romaguera.perry@example.com&quot;,
            &quot;country&quot;: &quot;South Georgia and the South Sandwich Islands&quot;,
            &quot;bio&quot;: &quot;Incidunt velit temporibus id iure. Doloribus fuga ut atque adipisci repudiandae. Eveniet ipsam cupiditate laborum aut reiciendis omnis atque consequatur. Dolore repellendus amet est inventore.&quot;,
            &quot;photo&quot;: null,
            &quot;artist_verified_at&quot;: null,
            &quot;email_verified_at&quot;: &quot;2025-01-24T13:44:46.000000Z&quot;,
            &quot;role&quot;: &quot;artist&quot;,
            &quot;created_at&quot;: &quot;2025-01-24T13:44:46.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-24T13:44:46.000000Z&quot;,
            &quot;artworks&quot;: [
                {
                    &quot;id&quot;: 114,
                    &quot;title&quot;: &quot;Rerum adipisci dolores et voluptates fuga atque.&quot;,
                    &quot;description&quot;: &quot;Eum cupiditate quia facere non. Id beatae dolore magnam laudantium et odit quia. Quia qui odio deleniti sequi quae. Soluta dolor delectus molestias sit qui expedita.&quot;,
                    &quot;status&quot;: &quot;draft&quot;,
                    &quot;user_id&quot;: 203,
                    &quot;created_at&quot;: &quot;2025-01-24T13:44:46.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-24T13:44:46.000000Z&quot;,
                    &quot;artwork_likes_count&quot;: 0,
                    &quot;artwork_comments_count&quot;: 0,
                    &quot;artwork_main_photo_path&quot;: null
                }
            ]
        },
        {
            &quot;id&quot;: 204,
            &quot;username&quot;: &quot;maritza58&quot;,
            &quot;first_name&quot;: &quot;Abraham&quot;,
            &quot;last_name&quot;: &quot;Nicolas&quot;,
            &quot;email&quot;: &quot;ashton67@example.net&quot;,
            &quot;country&quot;: &quot;Belgium&quot;,
            &quot;bio&quot;: &quot;Reiciendis sit necessitatibus earum laboriosam voluptatem. Qui commodi soluta consequatur recusandae. Et inventore error delectus voluptatem debitis provident quo. Nisi impedit veniam aut dignissimos vel incidunt odit.&quot;,
            &quot;photo&quot;: &quot;https://via.placeholder.com/640x480.png/0077dd?text=reprehenderit&quot;,
            &quot;artist_verified_at&quot;: &quot;2025-01-24 13:44:46&quot;,
            &quot;email_verified_at&quot;: &quot;2025-01-24T13:44:46.000000Z&quot;,
            &quot;role&quot;: &quot;artist&quot;,
            &quot;created_at&quot;: &quot;2025-01-24T13:44:46.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-24T13:44:46.000000Z&quot;,
            &quot;artworks&quot;: [
                {
                    &quot;id&quot;: 115,
                    &quot;title&quot;: &quot;Non dolorem perspiciatis molestiae fugiat quod ad ipsam.&quot;,
                    &quot;description&quot;: &quot;Sapiente esse consectetur veritatis aut. Iure et vel nihil. Eius pariatur non dicta quam dignissimos nam.&quot;,
                    &quot;status&quot;: &quot;draft&quot;,
                    &quot;user_id&quot;: 204,
                    &quot;created_at&quot;: &quot;2025-01-24T13:44:46.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-01-24T13:44:46.000000Z&quot;,
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

                    <h2 id="users-GETapi-v1-users-verified--count-">List Verified Users</h2>

<p>
</p>

<p>Retrieve a list of verified users</p>

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
            &quot;id&quot;: 205,
            &quot;username&quot;: &quot;marvin.crist&quot;,
            &quot;first_name&quot;: &quot;Harmony&quot;,
            &quot;last_name&quot;: &quot;Prohaska&quot;,
            &quot;email&quot;: &quot;rcartwright@example.com&quot;,
            &quot;country&quot;: &quot;Venezuela&quot;,
            &quot;bio&quot;: &quot;Eum illum occaecati optio est quo rem cupiditate. Voluptas asperiores iusto rerum asperiores sed commodi nulla.&quot;,
            &quot;photo&quot;: null,
            &quot;artist_verified_at&quot;: &quot;2025-01-24 13:44:46&quot;,
            &quot;email_verified_at&quot;: &quot;2025-01-24T13:44:46.000000Z&quot;,
            &quot;role&quot;: &quot;artist&quot;,
            &quot;created_at&quot;: &quot;2025-01-24T13:44:46.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-24T13:44:46.000000Z&quot;
        },
        {
            &quot;id&quot;: 206,
            &quot;username&quot;: &quot;eleazar.metz&quot;,
            &quot;first_name&quot;: &quot;Roselyn&quot;,
            &quot;last_name&quot;: &quot;Parker&quot;,
            &quot;email&quot;: &quot;alphonso52@example.org&quot;,
            &quot;country&quot;: &quot;Monaco&quot;,
            &quot;bio&quot;: &quot;Odio velit nam aut soluta molestiae ullam. Sint et tenetur voluptas qui.&quot;,
            &quot;photo&quot;: &quot;https://via.placeholder.com/640x480.png/0044aa?text=qui&quot;,
            &quot;artist_verified_at&quot;: null,
            &quot;email_verified_at&quot;: &quot;2025-01-24T13:44:46.000000Z&quot;,
            &quot;role&quot;: &quot;artist&quot;,
            &quot;created_at&quot;: &quot;2025-01-24T13:44:46.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-01-24T13:44:46.000000Z&quot;
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

                    <h2 id="users-GETapi-v1-users--username-">Show User</h2>

<p>
</p>

<p>Retrieve a single user by username</p>

<span id="example-requests-GETapi-v1-users--username-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/users/optio" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/users/optio"
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
        &quot;id&quot;: 207,
        &quot;username&quot;: &quot;helmer72&quot;,
        &quot;first_name&quot;: &quot;Marcelo&quot;,
        &quot;last_name&quot;: &quot;Bailey&quot;,
        &quot;email&quot;: &quot;haley.luna@example.org&quot;,
        &quot;country&quot;: &quot;Liechtenstein&quot;,
        &quot;bio&quot;: &quot;Sunt saepe natus sint at molestiae distinctio nisi aperiam. Harum in similique dolores porro. Voluptas illo cum non rem beatae dolore ullam quia. Molestias aut quia consequatur et ullam vitae quod.&quot;,
        &quot;photo&quot;: null,
        &quot;artist_verified_at&quot;: &quot;2025-01-24 13:44:46&quot;,
        &quot;email_verified_at&quot;: &quot;2025-01-24T13:44:46.000000Z&quot;,
        &quot;role&quot;: &quot;artist&quot;,
        &quot;created_at&quot;: &quot;2025-01-24T13:44:46.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-01-24T13:44:46.000000Z&quot;
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
               value="optio"
               data-component="url">
    <br>
<p>The username of the user Example: <code>optio</code></p>
            </div>
                    </form>

                    <h2 id="users-GETapi-v1-authenticated">Show Authenticated User</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Retrieve the currently authenticated user</p>

<span id="example-requests-GETapi-v1-authenticated">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/authenticated" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/authenticated"
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

<span id="example-responses-GETapi-v1-authenticated">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 208,
        &quot;username&quot;: &quot;ccarroll&quot;,
        &quot;first_name&quot;: &quot;Philip&quot;,
        &quot;last_name&quot;: &quot;Fritsch&quot;,
        &quot;email&quot;: &quot;egerlach@example.net&quot;,
        &quot;country&quot;: &quot;Saint Lucia&quot;,
        &quot;bio&quot;: &quot;A occaecati consequatur laudantium doloremque eaque. Beatae veniam eos vel est consequatur veritatis. Corrupti optio nostrum qui vitae porro quia aliquid. Optio vel quia architecto. Eligendi necessitatibus sequi ratione impedit.&quot;,
        &quot;photo&quot;: null,
        &quot;artist_verified_at&quot;: null,
        &quot;email_verified_at&quot;: &quot;2025-01-24T13:44:46.000000Z&quot;,
        &quot;role&quot;: &quot;artist&quot;,
        &quot;created_at&quot;: &quot;2025-01-24T13:44:46.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-01-24T13:44:46.000000Z&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-authenticated" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-authenticated"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-authenticated"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-authenticated" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-authenticated">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-authenticated" data-method="GET"
      data-path="api/v1/authenticated"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-authenticated', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-authenticated"
                    onclick="tryItOut('GETapi-v1-authenticated');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-authenticated"
                    onclick="cancelTryOut('GETapi-v1-authenticated');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-authenticated"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/authenticated</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-authenticated"
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
                              name="Accept"                data-endpoint="GETapi-v1-authenticated"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="users-PUTapi-v1-authenticated">Update User</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Update the currently authenticated user</p>

<span id="example-requests-PUTapi-v1-authenticated">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/v1/authenticated" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"username\": \"johndoe\",
    \"first_name\": \"John\",
    \"last_name\": \"Doe\",
    \"email\": \"johndoe@gmail.com\",
    \"country\": \"United States\",
    \"bio\": \"This is a bio\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/authenticated"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "username": "johndoe",
    "first_name": "John",
    "last_name": "Doe",
    "email": "johndoe@gmail.com",
    "country": "United States",
    "bio": "This is a bio"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-authenticated">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 209,
        &quot;username&quot;: &quot;xpadberg&quot;,
        &quot;first_name&quot;: &quot;Breanne&quot;,
        &quot;last_name&quot;: &quot;Medhurst&quot;,
        &quot;email&quot;: &quot;jayde.kris@example.org&quot;,
        &quot;country&quot;: &quot;Barbados&quot;,
        &quot;bio&quot;: &quot;Eligendi autem error non et. Qui non eaque dolorum quod molestias voluptates reprehenderit. Qui deleniti non eligendi voluptatem aut.&quot;,
        &quot;photo&quot;: null,
        &quot;artist_verified_at&quot;: null,
        &quot;email_verified_at&quot;: &quot;2025-01-24T13:44:46.000000Z&quot;,
        &quot;role&quot;: &quot;artist&quot;,
        &quot;created_at&quot;: &quot;2025-01-24T13:44:46.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-01-24T13:44:46.000000Z&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-v1-authenticated" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-authenticated"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-authenticated"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-authenticated" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-authenticated">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-authenticated" data-method="PUT"
      data-path="api/v1/authenticated"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-authenticated', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-authenticated"
                    onclick="tryItOut('PUTapi-v1-authenticated');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-authenticated"
                    onclick="cancelTryOut('PUTapi-v1-authenticated');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-authenticated"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/authenticated</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-authenticated"
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
                              name="Accept"                data-endpoint="PUTapi-v1-authenticated"
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
                              name="username"                data-endpoint="PUTapi-v1-authenticated"
               value="johndoe"
               data-component="body">
    <br>
<p>The username of the user. Must not be greater than 255 characters. Example: <code>johndoe</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>first_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="first_name"                data-endpoint="PUTapi-v1-authenticated"
               value="John"
               data-component="body">
    <br>
<p>The first name of the user. Must not be greater than 255 characters. Example: <code>John</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>last_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="last_name"                data-endpoint="PUTapi-v1-authenticated"
               value="Doe"
               data-component="body">
    <br>
<p>The last name of the user. Must not be greater than 255 characters. Example: <code>Doe</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="PUTapi-v1-authenticated"
               value="johndoe@gmail.com"
               data-component="body">
    <br>
<p>The email of the user. Must be a valid email address. Must not be greater than 255 characters. Example: <code>johndoe@gmail.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>country</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="country"                data-endpoint="PUTapi-v1-authenticated"
               value="United States"
               data-component="body">
    <br>
<p>The country of the user. Must not be greater than 255 characters. Example: <code>United States</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>bio</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="bio"                data-endpoint="PUTapi-v1-authenticated"
               value="This is a bio"
               data-component="body">
    <br>
<p>The bio of the user. Example: <code>This is a bio</code></p>
        </div>
        </form>

                    <h2 id="users-PUTapi-v1-authenticated-photo">Update User Photo</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Update the profile picture of the currently authenticated user</p>

<span id="example-requests-PUTapi-v1-authenticated-photo">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/v1/authenticated/photo" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "photo=@/tmp/php4hitg36joqh12AMIeFE" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/authenticated/photo"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('photo', document.querySelector('input[name="photo"]').files[0]);

fetch(url, {
    method: "PUT",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-authenticated-photo">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 210,
        &quot;username&quot;: &quot;barrows.claudia&quot;,
        &quot;first_name&quot;: &quot;Renee&quot;,
        &quot;last_name&quot;: &quot;Kirlin&quot;,
        &quot;email&quot;: &quot;ustracke@example.com&quot;,
        &quot;country&quot;: &quot;Ecuador&quot;,
        &quot;bio&quot;: &quot;Eius assumenda et velit voluptas cumque odit molestias consequuntur. Reiciendis ut nostrum animi vitae quis. Vero numquam autem hic odit voluptatibus reiciendis. Consequatur eligendi deleniti ipsam autem.&quot;,
        &quot;photo&quot;: null,
        &quot;artist_verified_at&quot;: null,
        &quot;email_verified_at&quot;: &quot;2025-01-24T13:44:46.000000Z&quot;,
        &quot;role&quot;: &quot;artist&quot;,
        &quot;created_at&quot;: &quot;2025-01-24T13:44:46.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-01-24T13:44:46.000000Z&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-v1-authenticated-photo" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-authenticated-photo"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-authenticated-photo"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-authenticated-photo" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-authenticated-photo">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-authenticated-photo" data-method="PUT"
      data-path="api/v1/authenticated/photo"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-authenticated-photo', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-authenticated-photo"
                    onclick="tryItOut('PUTapi-v1-authenticated-photo');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-authenticated-photo"
                    onclick="cancelTryOut('PUTapi-v1-authenticated-photo');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-authenticated-photo"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/authenticated/photo</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-authenticated-photo"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-v1-authenticated-photo"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>photo</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="photo"                data-endpoint="PUTapi-v1-authenticated-photo"
               value=""
               data-component="body">
    <br>
<p>The photo of the user. Must be an image. Must not be greater than 2048 kilobytes. Example: <code>/tmp/php4hitg36joqh12AMIeFE</code></p>
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
