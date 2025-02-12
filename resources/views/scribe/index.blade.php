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
                    <ul id="tocify-header-artist-verification-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="artist-verification-requests">
                    <a href="#artist-verification-requests">Artist Verification Requests</a>
                </li>
                                    <ul id="tocify-subheader-artist-verification-requests" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="artist-verification-requests-GETapi-v1-artist-verification-requests">
                                <a href="#artist-verification-requests-GETapi-v1-artist-verification-requests">List Artist Verification Requests</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="artist-verification-requests-POSTapi-v1-users-me-artist-verification-requests">
                                <a href="#artist-verification-requests-POSTapi-v1-users-me-artist-verification-requests">Submit Artist Verification Request</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="artist-verification-requests-PUTapi-v1-artist-verification-requests--artistVerificationRequestId-">
                                <a href="#artist-verification-requests-PUTapi-v1-artist-verification-requests--artistVerificationRequestId-">Review Artist Verification Request</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-artwork-comments" class="tocify-header">
                <li class="tocify-item level-1" data-unique="artwork-comments">
                    <a href="#artwork-comments">Artwork Comments</a>
                </li>
                                    <ul id="tocify-subheader-artwork-comments" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="artwork-comments-POSTapi-v1-artworks--artworkId--artwork-comments">
                                <a href="#artwork-comments-POSTapi-v1-artworks--artworkId--artwork-comments">Post Artwork Comment</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="artwork-comments-DELETEapi-v1-artwork-comments--artworkCommentId-">
                                <a href="#artwork-comments-DELETEapi-v1-artwork-comments--artworkCommentId-">Delete Artwork Comment</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="artwork-comments-PUTapi-v1-artwork-comments--artworkCommentId-">
                                <a href="#artwork-comments-PUTapi-v1-artwork-comments--artworkCommentId-">Update Artwork Comment</a>
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
                                                                                <li class="tocify-item level-2" data-unique="artwork-likes-POSTapi-v1-artworks--artworkId--artwork-likes">
                                <a href="#artwork-likes-POSTapi-v1-artworks--artworkId--artwork-likes">Like Artwork</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="artwork-likes-DELETEapi-v1-artworks--artworkId--artwork-likes">
                                <a href="#artwork-likes-DELETEapi-v1-artworks--artworkId--artwork-likes">Unlike Artwork</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-artwork-photos" class="tocify-header">
                <li class="tocify-item level-1" data-unique="artwork-photos">
                    <a href="#artwork-photos">Artwork Photos</a>
                </li>
                                    <ul id="tocify-subheader-artwork-photos" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="artwork-photos-POSTapi-v1-artworks--artworkId--artwork-photos">
                                <a href="#artwork-photos-POSTapi-v1-artworks--artworkId--artwork-photos">Upload Artwork Photos</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="artwork-photos-PUTapi-v1-artwork-photos--artworkPhotoId-">
                                <a href="#artwork-photos-PUTapi-v1-artwork-photos--artworkPhotoId-">Set Artwork Photo As Main</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="artwork-photos-DELETEapi-v1-artwork-photos--artworkPhotoId-">
                                <a href="#artwork-photos-DELETEapi-v1-artwork-photos--artworkPhotoId-">Delete Artwork Photo</a>
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
                                                                                <li class="tocify-item level-2" data-unique="artwork-tags-GETapi-v1-tags">
                                <a href="#artwork-tags-GETapi-v1-tags">List Tags</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-artworks" class="tocify-header">
                <li class="tocify-item level-1" data-unique="artworks">
                    <a href="#artworks">Artworks</a>
                </li>
                                    <ul id="tocify-subheader-artworks" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="artworks-GETapi-v1-artworks">
                                <a href="#artworks-GETapi-v1-artworks">List Published Artworks</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="artworks-GETapi-v1-artworks--artworkId-">
                                <a href="#artworks-GETapi-v1-artworks--artworkId-">Show Published Artwork</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="artworks-GETapi-v1-users--username--artworks">
                                <a href="#artworks-GETapi-v1-users--username--artworks">List User Published Artworks</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="artworks-GETapi-v1-users-me-artworks">
                                <a href="#artworks-GETapi-v1-users-me-artworks">List Authenticated User Artworks</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="artworks-POSTapi-v1-artworks">
                                <a href="#artworks-POSTapi-v1-artworks">Create Artwork</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="artworks-PUTapi-v1-artworks--artworkId-">
                                <a href="#artworks-PUTapi-v1-artworks--artworkId-">Update Artwork Draft</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="artworks-DELETEapi-v1-artworks--artworkId-">
                                <a href="#artworks-DELETEapi-v1-artworks--artworkId-">Delete Artwork</a>
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
                                                                                <li class="tocify-item level-2" data-unique="authentication-POSTapi-v1-admin-sign-in">
                                <a href="#authentication-POSTapi-v1-admin-sign-in">Admin Sign In</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-favorites" class="tocify-header">
                <li class="tocify-item level-1" data-unique="favorites">
                    <a href="#favorites">Favorites</a>
                </li>
                                    <ul id="tocify-subheader-favorites" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="favorites-GETapi-v1-users-me-favorites-artworks">
                                <a href="#favorites-GETapi-v1-users-me-favorites-artworks">List Authenticated User Favorite Artworks</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-follows" class="tocify-header">
                <li class="tocify-item level-1" data-unique="follows">
                    <a href="#follows">Follows</a>
                </li>
                                    <ul id="tocify-subheader-follows" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="follows-GETapi-v1-users-me-follows-followers">
                                <a href="#follows-GETapi-v1-users-me-follows-followers">List Authenticated User Followers</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="follows-GETapi-v1-users-me-follows-following">
                                <a href="#follows-GETapi-v1-users-me-follows-following">List Authenticated User Following</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="follows-POSTapi-v1-follows-users--userId-">
                                <a href="#follows-POSTapi-v1-follows-users--userId-">Follow User</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="follows-DELETEapi-v1-follows-users--userId-">
                                <a href="#follows-DELETEapi-v1-follows-users--userId-">Unfollow User</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-notifications" class="tocify-header">
                <li class="tocify-item level-1" data-unique="notifications">
                    <a href="#notifications">Notifications</a>
                </li>
                                    <ul id="tocify-subheader-notifications" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="notifications-GETapi-v1-users-me-notifications">
                                <a href="#notifications-GETapi-v1-users-me-notifications">List authenticated user notifications</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="notifications-PUTapi-v1-users-me-notifications-unread--notificationId-">
                                <a href="#notifications-PUTapi-v1-users-me-notifications-unread--notificationId-">Mark notification as read</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="notifications-PUTapi-v1-users-me-notifications-unread">
                                <a href="#notifications-PUTapi-v1-users-me-notifications-unread">Mark all notifications as read</a>
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
                                                                                <li class="tocify-item level-2" data-unique="users-GETapi-v1-users--username-">
                                <a href="#users-GETapi-v1-users--username-">Show User</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="users-GETapi-v1-users-me">
                                <a href="#users-GETapi-v1-users-me">Show Authenticated User</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="users-PUTapi-v1-users-me">
                                <a href="#users-PUTapi-v1-users-me">Update Authenticated User</a>
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
        <li>Last updated: February 12, 2025</li>
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
<p>To authenticate requests, include an <strong><code>Authorization</code></strong> header with the value <strong><code>"Bearer {YOUR_AUTH_KEY}"</code></strong>.</p>
<p>All authenticated endpoints are marked with a <code>requires authentication</code> badge in the documentation below.</p>
<p>You can retrieve your token by visiting your dashboard and clicking <b>Generate API token</b>.</p>

        <h1 id="artist-verification-requests">Artist Verification Requests</h1>

    

                                <h2 id="artist-verification-requests-GETapi-v1-artist-verification-requests">List Artist Verification Requests</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Retrieve a list of artist verification requests submitted by artists.</p>

<span id="example-requests-GETapi-v1-artist-verification-requests">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/artist-verification-requests?perPage=10" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artist-verification-requests"
);

const params = {
    "perPage": "10",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-artist-verification-requests">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 9,
            &quot;user_id&quot;: 113,
            &quot;status&quot;: &quot;pending&quot;,
            &quot;reason&quot;: &quot;Et nihil nostrum eos similique ut dolor quia nihil. Consequuntur id similique repellat voluptatem commodi inventore. Repudiandae ex esse delectus incidunt quisquam iste illo. Autem nobis aut quas aut consequuntur sed rerum.&quot;,
            &quot;created_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 113,
                &quot;username&quot;: &quot;jacquelyn33&quot;,
                &quot;first_name&quot;: &quot;Cordie&quot;,
                &quot;last_name&quot;: &quot;Wolf&quot;,
                &quot;email&quot;: &quot;lthiel@example.org&quot;,
                &quot;country&quot;: &quot;Macedonia&quot;,
                &quot;bio&quot;: &quot;Sed et aspernatur fugiat est aperiam fuga alias ipsam. Asperiores ratione nam ipsam molestiae.&quot;,
                &quot;photo&quot;: null,
                &quot;artist_verified_at&quot;: null,
                &quot;email_verified_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;,
                &quot;role&quot;: &quot;artist&quot;,
                &quot;created_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 10,
            &quot;user_id&quot;: 114,
            &quot;status&quot;: &quot;rejected&quot;,
            &quot;reason&quot;: &quot;Sequi quia animi quis iste qui. Architecto non temporibus similique dicta. Fuga ratione sunt accusantium tempora consequatur rem. Rerum dolor consequatur enim officia explicabo omnis.&quot;,
            &quot;created_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 114,
                &quot;username&quot;: &quot;csenger&quot;,
                &quot;first_name&quot;: &quot;Emery&quot;,
                &quot;last_name&quot;: &quot;Zboncak&quot;,
                &quot;email&quot;: &quot;bartoletti.cloyd@example.com&quot;,
                &quot;country&quot;: &quot;Singapore&quot;,
                &quot;bio&quot;: &quot;Porro deserunt ipsum eaque ipsum. Velit voluptates dolor illo nostrum ipsam laudantium expedita sed. Doloremque aut et magni est numquam distinctio dolor dolore.&quot;,
                &quot;photo&quot;: null,
                &quot;artist_verified_at&quot;: &quot;2025-02-12 17:06:39&quot;,
                &quot;email_verified_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;,
                &quot;role&quot;: &quot;artist&quot;,
                &quot;created_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;
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
            <blockquote>
            <p>Example response (401, Unauthenticated):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-artist-verification-requests" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-artist-verification-requests"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-artist-verification-requests"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-artist-verification-requests" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-artist-verification-requests">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-artist-verification-requests" data-method="GET"
      data-path="api/v1/artist-verification-requests"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-artist-verification-requests', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-artist-verification-requests"
                    onclick="tryItOut('GETapi-v1-artist-verification-requests');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-artist-verification-requests"
                    onclick="cancelTryOut('GETapi-v1-artist-verification-requests');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-artist-verification-requests"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/artist-verification-requests</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-artist-verification-requests"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-artist-verification-requests"
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
                              name="Accept"                data-endpoint="GETapi-v1-artist-verification-requests"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>perPage</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="perPage"                data-endpoint="GETapi-v1-artist-verification-requests"
               value="10"
               data-component="query">
    <br>
<p>The number of records to fetch per page. Example: <code>10</code></p>
            </div>
                </form>

                    <h2 id="artist-verification-requests-POSTapi-v1-users-me-artist-verification-requests">Submit Artist Verification Request</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Submits an artist verification request</p>

<span id="example-requests-POSTapi-v1-users-me-artist-verification-requests">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/v1/users/me/artist-verification-requests" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/users/me/artist-verification-requests"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-users-me-artist-verification-requests">
            <blockquote>
            <p>Example response (200, Success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 11,
        &quot;user_id&quot;: 115,
        &quot;status&quot;: &quot;pending&quot;,
        &quot;reason&quot;: &quot;A porro commodi doloremque assumenda. Impedit assumenda consequatur porro aperiam omnis aut. Similique doloribus magnam ducimus dolores est dolore et.&quot;,
        &quot;created_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (400, Request limit reached):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;You can only submit a verification request once every 7 days.&quot;,
    &quot;status&quot;: 400
}</code>
 </pre>
            <blockquote>
            <p>Example response (400, Pending request exists):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;You already have a pending verification request.&quot;,
    &quot;status&quot;: 400
}</code>
 </pre>
            <blockquote>
            <p>Example response (400, Insufficient artworks):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;You must have at least 3 published artworks to submit a verification request.&quot;,
    &quot;status&quot;: 400
}</code>
 </pre>
            <blockquote>
            <p>Example response (400, Incomplete profile):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;You must complete your profile details before submitting a verification request (first name, last name, bio, country, photo).&quot;,
    &quot;status&quot;: 400
}</code>
 </pre>
            <blockquote>
            <p>Example response (401, Unauthenticated):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Unauthorized):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;You are not authorized to submit an artist verification request.&quot;,
    &quot;status&quot;: 403
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-users-me-artist-verification-requests" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-users-me-artist-verification-requests"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-users-me-artist-verification-requests"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-users-me-artist-verification-requests" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-users-me-artist-verification-requests">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-users-me-artist-verification-requests" data-method="POST"
      data-path="api/v1/users/me/artist-verification-requests"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-users-me-artist-verification-requests', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-users-me-artist-verification-requests"
                    onclick="tryItOut('POSTapi-v1-users-me-artist-verification-requests');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-users-me-artist-verification-requests"
                    onclick="cancelTryOut('POSTapi-v1-users-me-artist-verification-requests');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-users-me-artist-verification-requests"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/users/me/artist-verification-requests</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-v1-users-me-artist-verification-requests"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-users-me-artist-verification-requests"
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
                              name="Accept"                data-endpoint="POSTapi-v1-users-me-artist-verification-requests"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="artist-verification-requests-PUTapi-v1-artist-verification-requests--artistVerificationRequestId-">Review Artist Verification Request</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Reviews an artist verification request</p>

<span id="example-requests-PUTapi-v1-artist-verification-requests--artistVerificationRequestId-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/v1/artist-verification-requests/odio" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"status\": \"approved\",
    \"reason\": \"The submitted artworks are not original\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artist-verification-requests/odio"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "status": "approved",
    "reason": "The submitted artworks are not original"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-artist-verification-requests--artistVerificationRequestId-">
            <blockquote>
            <p>Example response (200, Success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 12,
        &quot;user_id&quot;: 116,
        &quot;status&quot;: &quot;approved&quot;,
        &quot;reason&quot;: &quot;Excepturi non atque aliquam qui et quo. Aut officia fugit dignissimos vel autem fugiat voluptas quas. Aut iure magni debitis placeat magnam maxime est. Eaque et unde voluptas culpa similique.&quot;,
        &quot;created_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (401, Unauthenticated):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Unauthorized):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;You are not authorized to review this artist verification request.&quot;,
    &quot;status&quot;: 403
}</code>
 </pre>
            <blockquote>
            <p>Example response (404, Artist verification request not found):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;The artist verification request you are trying to review does not exist.&quot;,
    &quot;status&quot;: 404
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-v1-artist-verification-requests--artistVerificationRequestId-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-artist-verification-requests--artistVerificationRequestId-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-artist-verification-requests--artistVerificationRequestId-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-artist-verification-requests--artistVerificationRequestId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-artist-verification-requests--artistVerificationRequestId-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-artist-verification-requests--artistVerificationRequestId-" data-method="PUT"
      data-path="api/v1/artist-verification-requests/{artistVerificationRequestId}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-artist-verification-requests--artistVerificationRequestId-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-artist-verification-requests--artistVerificationRequestId-"
                    onclick="tryItOut('PUTapi-v1-artist-verification-requests--artistVerificationRequestId-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-artist-verification-requests--artistVerificationRequestId-"
                    onclick="cancelTryOut('PUTapi-v1-artist-verification-requests--artistVerificationRequestId-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-artist-verification-requests--artistVerificationRequestId-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/artist-verification-requests/{artistVerificationRequestId}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-v1-artist-verification-requests--artistVerificationRequestId-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-artist-verification-requests--artistVerificationRequestId-"
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
                              name="Accept"                data-endpoint="PUTapi-v1-artist-verification-requests--artistVerificationRequestId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>artistVerificationRequestId</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="artistVerificationRequestId"                data-endpoint="PUTapi-v1-artist-verification-requests--artistVerificationRequestId-"
               value="odio"
               data-component="url">
    <br>
<p>The ID of the artist verification request to review. Example: <code>odio</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="PUTapi-v1-artist-verification-requests--artistVerificationRequestId-"
               value="approved"
               data-component="body">
    <br>
<p>The status of the artist verification request. Example: <code>approved</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>approved</code></li> <li><code>rejected</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>reason</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="reason"                data-endpoint="PUTapi-v1-artist-verification-requests--artistVerificationRequestId-"
               value="The submitted artworks are not original"
               data-component="body">
    <br>
<p>The reason for rejecting the artist verification request. This field is required when <code>status</code> is <code>rejected</code>. Example: <code>The submitted artworks are not original</code></p>
        </div>
        </form>

                <h1 id="artwork-comments">Artwork Comments</h1>

    

                                <h2 id="artwork-comments-POSTapi-v1-artworks--artworkId--artwork-comments">Post Artwork Comment</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Post a comment on an artwork</p>

<span id="example-requests-POSTapi-v1-artworks--artworkId--artwork-comments">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/v1/artworks/19/artwork-comments" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"comment_text\": \"voluptatem\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artworks/19/artwork-comments"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "comment_text": "voluptatem"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-artworks--artworkId--artwork-comments">
            <blockquote>
            <p>Example response (200, Success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 11,
        &quot;comment_text&quot;: &quot;Sed non quia aliquam quibusdam harum.&quot;,
        &quot;artwork_id&quot;: 54,
        &quot;user_id&quot;: 107,
        &quot;created_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (401, Unauthenticated):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Unauthorized):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;You are not authorized to post a comment on this artwork.&quot;,
    &quot;status&quot;: 403
}</code>
 </pre>
            <blockquote>
            <p>Example response (404, Artwork not found):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;The artwork you are trying to comment on does not exist.&quot;,
    &quot;status&quot;: 404
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-artworks--artworkId--artwork-comments" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-artworks--artworkId--artwork-comments"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-artworks--artworkId--artwork-comments"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-artworks--artworkId--artwork-comments" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-artworks--artworkId--artwork-comments">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-artworks--artworkId--artwork-comments" data-method="POST"
      data-path="api/v1/artworks/{artworkId}/artwork-comments"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-artworks--artworkId--artwork-comments', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-artworks--artworkId--artwork-comments"
                    onclick="tryItOut('POSTapi-v1-artworks--artworkId--artwork-comments');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-artworks--artworkId--artwork-comments"
                    onclick="cancelTryOut('POSTapi-v1-artworks--artworkId--artwork-comments');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-artworks--artworkId--artwork-comments"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/artworks/{artworkId}/artwork-comments</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-v1-artworks--artworkId--artwork-comments"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-artworks--artworkId--artwork-comments"
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
                              name="Accept"                data-endpoint="POSTapi-v1-artworks--artworkId--artwork-comments"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>artworkId</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="artworkId"                data-endpoint="POSTapi-v1-artworks--artworkId--artwork-comments"
               value="19"
               data-component="url">
    <br>
<p>The ID of the artwork to comment on Example: <code>19</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>comment_text</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="comment_text"                data-endpoint="POSTapi-v1-artworks--artworkId--artwork-comments"
               value="voluptatem"
               data-component="body">
    <br>
<p>The text of the comment Example: <code>voluptatem</code></p>
        </div>
        </form>

                    <h2 id="artwork-comments-DELETEapi-v1-artwork-comments--artworkCommentId-">Delete Artwork Comment</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Delete a comment on an artwork</p>

<span id="example-requests-DELETEapi-v1-artwork-comments--artworkCommentId-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/v1/artwork-comments/12" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artwork-comments/12"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-artwork-comments--artworkCommentId-">
            <blockquote>
            <p>Example response (200, Success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &#039;message&#039; =&gt; &#039;You have successfully deleted the comment.&#039;,
    &#039;data&#039; =&gt; [],
    &#039;status&#039; =&gt; 200,
}</code>
 </pre>
            <blockquote>
            <p>Example response (401, Unauthenticated):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Unauthorized):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;You are not authorized to delete this comment.&quot;,
    &quot;status&quot;: 403
}</code>
 </pre>
            <blockquote>
            <p>Example response (404, Comment not found):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;The comment you are trying to delete does not exist.&quot;,
    &quot;status&quot;: 404
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-v1-artwork-comments--artworkCommentId-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-artwork-comments--artworkCommentId-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-artwork-comments--artworkCommentId-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-artwork-comments--artworkCommentId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-artwork-comments--artworkCommentId-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-v1-artwork-comments--artworkCommentId-" data-method="DELETE"
      data-path="api/v1/artwork-comments/{artworkCommentId}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-artwork-comments--artworkCommentId-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-artwork-comments--artworkCommentId-"
                    onclick="tryItOut('DELETEapi-v1-artwork-comments--artworkCommentId-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-artwork-comments--artworkCommentId-"
                    onclick="cancelTryOut('DELETEapi-v1-artwork-comments--artworkCommentId-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-artwork-comments--artworkCommentId-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/artwork-comments/{artworkCommentId}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-v1-artwork-comments--artworkCommentId-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-v1-artwork-comments--artworkCommentId-"
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
                              name="Accept"                data-endpoint="DELETEapi-v1-artwork-comments--artworkCommentId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>artworkCommentId</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="artworkCommentId"                data-endpoint="DELETEapi-v1-artwork-comments--artworkCommentId-"
               value="12"
               data-component="url">
    <br>
<p>The ID of the comment to delete Example: <code>12</code></p>
            </div>
                    </form>

                    <h2 id="artwork-comments-PUTapi-v1-artwork-comments--artworkCommentId-">Update Artwork Comment</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Update a comment on an artwork</p>

<span id="example-requests-PUTapi-v1-artwork-comments--artworkCommentId-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/v1/artwork-comments/5" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"comment_text\": \"neque\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artwork-comments/5"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "comment_text": "neque"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-artwork-comments--artworkCommentId-">
            <blockquote>
            <p>Example response (200, Success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 12,
        &quot;comment_text&quot;: &quot;Et libero itaque vero officia.&quot;,
        &quot;artwork_id&quot;: 55,
        &quot;user_id&quot;: 109,
        &quot;created_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (401, Unauthenticated):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Unauthorized):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;You are not authorized to update this comment.&quot;,
    &quot;status&quot;: 403
}</code>
 </pre>
            <blockquote>
            <p>Example response (404, Comment not found):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;The comment you are trying to update on does not exist.&quot;,
    &quot;status&quot;: 404
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-v1-artwork-comments--artworkCommentId-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-artwork-comments--artworkCommentId-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-artwork-comments--artworkCommentId-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-artwork-comments--artworkCommentId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-artwork-comments--artworkCommentId-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-artwork-comments--artworkCommentId-" data-method="PUT"
      data-path="api/v1/artwork-comments/{artworkCommentId}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-artwork-comments--artworkCommentId-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-artwork-comments--artworkCommentId-"
                    onclick="tryItOut('PUTapi-v1-artwork-comments--artworkCommentId-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-artwork-comments--artworkCommentId-"
                    onclick="cancelTryOut('PUTapi-v1-artwork-comments--artworkCommentId-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-artwork-comments--artworkCommentId-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/artwork-comments/{artworkCommentId}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-v1-artwork-comments--artworkCommentId-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-artwork-comments--artworkCommentId-"
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
                              name="Accept"                data-endpoint="PUTapi-v1-artwork-comments--artworkCommentId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>artworkCommentId</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="artworkCommentId"                data-endpoint="PUTapi-v1-artwork-comments--artworkCommentId-"
               value="5"
               data-component="url">
    <br>
<p>The ID of the comment to update Example: <code>5</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>comment_text</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="comment_text"                data-endpoint="PUTapi-v1-artwork-comments--artworkCommentId-"
               value="neque"
               data-component="body">
    <br>
<p>The text of the comment Example: <code>neque</code></p>
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
    --get "http://localhost:8000/api/v1/users/quo/artwork-likes/received/count/by-tag" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/users/quo/artwork-likes/received/count/by-tag"
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
            <p>Example response (200, Success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;&quot;,
    &quot;data&quot;: [
        {
            &quot;tag_name&quot;: &quot;abstract&quot;,
            &quot;total_likes&quot;: 5
        },
        {
            &quot;tag_name&quot;: &quot;portrait&quot;,
            &quot;total_likes&quot;: 3
        }
    ],
    &quot;status&quot;: 200
}</code>
 </pre>
            <blockquote>
            <p>Example response (404, User not found):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;The user you are trying to retrieve likes for does not exist.&quot;,
    &quot;status&quot;: 404
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
               value="quo"
               data-component="url">
    <br>
<p>The username of the user Example: <code>quo</code></p>
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
    --get "http://localhost:8000/api/v1/users/ducimus/artwork-likes/received/count" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/users/ducimus/artwork-likes/received/count"
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
            <p>Example response (200, Success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;&quot;,
    &quot;data&quot;: 8,
    &quot;status&quot;: 200
}</code>
 </pre>
            <blockquote>
            <p>Example response (404, User not found):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;The user you are trying to retrieve likes for does not exist.&quot;,
    &quot;status&quot;: 404
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
               value="ducimus"
               data-component="url">
    <br>
<p>The username of the user Example: <code>ducimus</code></p>
            </div>
                    </form>

                    <h2 id="artwork-likes-POSTapi-v1-artworks--artworkId--artwork-likes">Like Artwork</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Like an artwork</p>

<span id="example-requests-POSTapi-v1-artworks--artworkId--artwork-likes">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/v1/artworks/10/artwork-likes" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artworks/10/artwork-likes"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-artworks--artworkId--artwork-likes">
            <blockquote>
            <p>Example response (200, Success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 9,
        &quot;artwork_id&quot;: 53,
        &quot;user_id&quot;: 105,
        &quot;created_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (401, Unauthenticated):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Unauthorized):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;You are not authorized to like this artwork.&quot;,
    &quot;status&quot;: 403
}</code>
 </pre>
            <blockquote>
            <p>Example response (404, Artwork not found):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;The artwork you are trying to like does not exist.&quot;,
    &quot;status&quot;: 404
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-artworks--artworkId--artwork-likes" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-artworks--artworkId--artwork-likes"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-artworks--artworkId--artwork-likes"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-artworks--artworkId--artwork-likes" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-artworks--artworkId--artwork-likes">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-artworks--artworkId--artwork-likes" data-method="POST"
      data-path="api/v1/artworks/{artworkId}/artwork-likes"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-artworks--artworkId--artwork-likes', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-artworks--artworkId--artwork-likes"
                    onclick="tryItOut('POSTapi-v1-artworks--artworkId--artwork-likes');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-artworks--artworkId--artwork-likes"
                    onclick="cancelTryOut('POSTapi-v1-artworks--artworkId--artwork-likes');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-artworks--artworkId--artwork-likes"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/artworks/{artworkId}/artwork-likes</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-v1-artworks--artworkId--artwork-likes"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-artworks--artworkId--artwork-likes"
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
                              name="Accept"                data-endpoint="POSTapi-v1-artworks--artworkId--artwork-likes"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>artworkId</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="artworkId"                data-endpoint="POSTapi-v1-artworks--artworkId--artwork-likes"
               value="10"
               data-component="url">
    <br>
<p>The ID of the artwork to like Example: <code>10</code></p>
            </div>
                    </form>

                    <h2 id="artwork-likes-DELETEapi-v1-artworks--artworkId--artwork-likes">Unlike Artwork</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Unlike an artwork</p>

<span id="example-requests-DELETEapi-v1-artworks--artworkId--artwork-likes">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/v1/artworks/1/artwork-likes" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artworks/1/artwork-likes"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-artworks--artworkId--artwork-likes">
            <blockquote>
            <p>Example response (200, Success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
     &#039;message&#039; =&gt; &#039;You have successfully unliked this artwork.&#039;,
     &#039;data&#039; =&gt; [],
     &#039;status&#039; =&gt; 200
}</code>
 </pre>
            <blockquote>
            <p>Example response (401, Unauthenticated):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Unauthorized):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;You are not authorized to unlike this artwork.&quot;,
    &quot;status&quot;: 403
}</code>
 </pre>
            <blockquote>
            <p>Example response (404, Artwork not found):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;The artwork you are trying to unlike does not exist.&quot;,
    &quot;status&quot;: 404
}</code>
 </pre>
            <blockquote>
            <p>Example response (404, Like not found):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;You have not liked this artwork.&quot;,
    &quot;status&quot;: 404
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-v1-artworks--artworkId--artwork-likes" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-artworks--artworkId--artwork-likes"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-artworks--artworkId--artwork-likes"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-artworks--artworkId--artwork-likes" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-artworks--artworkId--artwork-likes">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-v1-artworks--artworkId--artwork-likes" data-method="DELETE"
      data-path="api/v1/artworks/{artworkId}/artwork-likes"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-artworks--artworkId--artwork-likes', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-artworks--artworkId--artwork-likes"
                    onclick="tryItOut('DELETEapi-v1-artworks--artworkId--artwork-likes');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-artworks--artworkId--artwork-likes"
                    onclick="cancelTryOut('DELETEapi-v1-artworks--artworkId--artwork-likes');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-artworks--artworkId--artwork-likes"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/artworks/{artworkId}/artwork-likes</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-v1-artworks--artworkId--artwork-likes"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-v1-artworks--artworkId--artwork-likes"
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
                              name="Accept"                data-endpoint="DELETEapi-v1-artworks--artworkId--artwork-likes"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>artworkId</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="artworkId"                data-endpoint="DELETEapi-v1-artworks--artworkId--artwork-likes"
               value="1"
               data-component="url">
    <br>
<p>The ID of the artwork to unlike Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="artwork-photos">Artwork Photos</h1>

    

                                <h2 id="artwork-photos-POSTapi-v1-artworks--artworkId--artwork-photos">Upload Artwork Photos</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Upload photos to an artwork draft</p>

<span id="example-requests-POSTapi-v1-artworks--artworkId--artwork-photos">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/v1/artworks/17/artwork-photos" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "photos[]=@/tmp/phpilpn6sdlvmpdfMmoAfb" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artworks/17/artwork-photos"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
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

<span id="example-responses-POSTapi-v1-artworks--artworkId--artwork-photos">
            <blockquote>
            <p>Example response (200, Success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 23,
            &quot;path&quot;: &quot;/storage/seeding-photos/20.jpeg&quot;,
            &quot;is_main&quot;: 1,
            &quot;artwork_id&quot;: 56,
            &quot;created_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;
        },
        {
            &quot;id&quot;: 24,
            &quot;path&quot;: &quot;/storage/seeding-photos/18.jpeg&quot;,
            &quot;is_main&quot;: 1,
            &quot;artwork_id&quot;: 57,
            &quot;created_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;
        }
    ]
}</code>
 </pre>
            <blockquote>
            <p>Example response (401, Unauthenticated):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Unauthorized):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;You are not authorized to upload photos to this artwork.&quot;
    &quot;status&quot;: 403
}</code>
 </pre>
            <blockquote>
            <p>Example response (404, Artwork not found):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;The artwork you are trying to upload photos to does not exist.&quot;,
    &quot;status&quot;: 404
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-artworks--artworkId--artwork-photos" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-artworks--artworkId--artwork-photos"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-artworks--artworkId--artwork-photos"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-artworks--artworkId--artwork-photos" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-artworks--artworkId--artwork-photos">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-artworks--artworkId--artwork-photos" data-method="POST"
      data-path="api/v1/artworks/{artworkId}/artwork-photos"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-artworks--artworkId--artwork-photos', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-artworks--artworkId--artwork-photos"
                    onclick="tryItOut('POSTapi-v1-artworks--artworkId--artwork-photos');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-artworks--artworkId--artwork-photos"
                    onclick="cancelTryOut('POSTapi-v1-artworks--artworkId--artwork-photos');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-artworks--artworkId--artwork-photos"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/artworks/{artworkId}/artwork-photos</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-v1-artworks--artworkId--artwork-photos"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-artworks--artworkId--artwork-photos"
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
                              name="Accept"                data-endpoint="POSTapi-v1-artworks--artworkId--artwork-photos"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>artworkId</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="artworkId"                data-endpoint="POSTapi-v1-artworks--artworkId--artwork-photos"
               value="17"
               data-component="url">
    <br>
<p>The id of the artwork Example: <code>17</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>photos</code></b>&nbsp;&nbsp;
<small>file[]</small>&nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="photos[0]"                data-endpoint="POSTapi-v1-artworks--artworkId--artwork-photos"
               data-component="body">
        <input type="file" style="display: none"
               name="photos[1]"                data-endpoint="POSTapi-v1-artworks--artworkId--artwork-photos"
               data-component="body">
    <br>
<p>A photo of the artwork. Must be an image. Must not be greater than 2048 kilobytes.</p>
        </div>
        </form>

                    <h2 id="artwork-photos-PUTapi-v1-artwork-photos--artworkPhotoId-">Set Artwork Photo As Main</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Set an artwork photo as the main photo of the artwork</p>

<span id="example-requests-PUTapi-v1-artwork-photos--artworkPhotoId-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/v1/artwork-photos/14" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artwork-photos/14"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-artwork-photos--artworkPhotoId-">
            <blockquote>
            <p>Example response (200, Success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 25,
        &quot;path&quot;: &quot;/storage/seeding-photos/18.jpeg&quot;,
        &quot;is_main&quot;: 0,
        &quot;artwork_id&quot;: 58,
        &quot;created_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (401, Unauthenticated):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Unauthorized):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
   &quot;message&quot;: &quot;You are not authorized to set this photo as the main photo of the artwork.&quot;
   &quot;status&quot;: 403
}</code>
 </pre>
            <blockquote>
            <p>Example response (404, Artwork photo not found):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;The artwork photo you are trying to set as main does not exist.&quot;,
    &quot;status&quot;: 404
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-v1-artwork-photos--artworkPhotoId-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-artwork-photos--artworkPhotoId-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-artwork-photos--artworkPhotoId-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-artwork-photos--artworkPhotoId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-artwork-photos--artworkPhotoId-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-artwork-photos--artworkPhotoId-" data-method="PUT"
      data-path="api/v1/artwork-photos/{artworkPhotoId}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-artwork-photos--artworkPhotoId-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-artwork-photos--artworkPhotoId-"
                    onclick="tryItOut('PUTapi-v1-artwork-photos--artworkPhotoId-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-artwork-photos--artworkPhotoId-"
                    onclick="cancelTryOut('PUTapi-v1-artwork-photos--artworkPhotoId-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-artwork-photos--artworkPhotoId-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/artwork-photos/{artworkPhotoId}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-v1-artwork-photos--artworkPhotoId-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-artwork-photos--artworkPhotoId-"
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
                              name="Accept"                data-endpoint="PUTapi-v1-artwork-photos--artworkPhotoId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>artworkPhotoId</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="artworkPhotoId"                data-endpoint="PUTapi-v1-artwork-photos--artworkPhotoId-"
               value="14"
               data-component="url">
    <br>
<p>The id of the artwork photo Example: <code>14</code></p>
            </div>
                    </form>

                    <h2 id="artwork-photos-DELETEapi-v1-artwork-photos--artworkPhotoId-">Delete Artwork Photo</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Delete an artwork photo</p>

<span id="example-requests-DELETEapi-v1-artwork-photos--artworkPhotoId-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/v1/artwork-photos/3" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artwork-photos/3"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-artwork-photos--artworkPhotoId-">
            <blockquote>
            <p>Example response (200, Success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
   &quot;message&quot;: &quot;Artwork photo deleted successfully&quot;,
   &quot;data&quot; =&gt; [],
   &quot;status&quot;: 200
}</code>
 </pre>
            <blockquote>
            <p>Example response (400, Published artwork photo):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Cannot delete photos of published artworks&quot;,
    &quot;status&quot;: 400
}</code>
 </pre>
            <blockquote>
            <p>Example response (400, Only photo):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Cannot delete the only photo of the artwork&quot;,
    &quot;status&quot;: 400
}</code>
 </pre>
            <blockquote>
            <p>Example response (401, Unauthenticated):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Unauthorized):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;You are not authorized to delete this artwork photo.&quot;,
    &quot;status&quot;: 403
}</code>
 </pre>
            <blockquote>
            <p>Example response (404, Artwork photo not found):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;The artwork photo you are trying to delete does not exist.&quot;,
    &quot;status&quot;: 404
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-v1-artwork-photos--artworkPhotoId-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-artwork-photos--artworkPhotoId-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-artwork-photos--artworkPhotoId-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-artwork-photos--artworkPhotoId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-artwork-photos--artworkPhotoId-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-v1-artwork-photos--artworkPhotoId-" data-method="DELETE"
      data-path="api/v1/artwork-photos/{artworkPhotoId}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-artwork-photos--artworkPhotoId-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-artwork-photos--artworkPhotoId-"
                    onclick="tryItOut('DELETEapi-v1-artwork-photos--artworkPhotoId-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-artwork-photos--artworkPhotoId-"
                    onclick="cancelTryOut('DELETEapi-v1-artwork-photos--artworkPhotoId-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-artwork-photos--artworkPhotoId-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/artwork-photos/{artworkPhotoId}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-v1-artwork-photos--artworkPhotoId-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-v1-artwork-photos--artworkPhotoId-"
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
                              name="Accept"                data-endpoint="DELETEapi-v1-artwork-photos--artworkPhotoId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>artworkPhotoId</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="artworkPhotoId"                data-endpoint="DELETEapi-v1-artwork-photos--artworkPhotoId-"
               value="3"
               data-component="url">
    <br>
<p>The id of the artwork photo Example: <code>3</code></p>
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
    --get "http://localhost:8000/api/v1/users/non/artwork-tags" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/users/non/artwork-tags"
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
            <p>Example response (200, Success):</p>
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
    ],
    &quot;message&quot;: &quot;&quot;,
    &quot;status&quot;: 200
}</code>
 </pre>
            <blockquote>
            <p>Example response (404, User not found):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;The user you are trying to retrieve his artwork tags does not exist.&quot;,
    &quot;status&quot;: 404
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
               value="non"
               data-component="url">
    <br>
<p>The username of the user Example: <code>non</code></p>
            </div>
                    </form>

                    <h2 id="artwork-tags-GETapi-v1-tags">List Tags</h2>

<p>
</p>

<p>Retrieve a list of all tags</p>

<span id="example-requests-GETapi-v1-tags">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/tags" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/tags"
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

<span id="example-responses-GETapi-v1-tags">
            <blockquote>
            <p>Example response (200, Success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 21,
            &quot;name&quot;: &quot;Ernestina Eichmann&quot;,
            &quot;created_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;
        },
        {
            &quot;id&quot;: 22,
            &quot;name&quot;: &quot;Dr. Tevin Wuckert Jr.&quot;,
            &quot;created_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-tags" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-tags"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-tags"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-tags" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-tags">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-tags" data-method="GET"
      data-path="api/v1/tags"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-tags', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-tags"
                    onclick="tryItOut('GETapi-v1-tags');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-tags"
                    onclick="cancelTryOut('GETapi-v1-tags');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-tags"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/tags</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-tags"
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
                              name="Accept"                data-endpoint="GETapi-v1-tags"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                <h1 id="artworks">Artworks</h1>

    

                                <h2 id="artworks-GETapi-v1-artworks">List Published Artworks</h2>

<p>
</p>

<p>Retrieve a list of all published artworks</p>

<span id="example-requests-GETapi-v1-artworks">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/artworks?filter%5Btag%5D=filter%5Btag%5D%3Dgraphic&amp;searchQuery=searchQuery%3Dlorem&amp;sort=sort%3Dtrending&amp;page=1&amp;perPage=10" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artworks"
);

const params = {
    "filter[tag]": "filter[tag]=graphic",
    "searchQuery": "searchQuery=lorem",
    "sort": "sort=trending",
    "page": "1",
    "perPage": "10",
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
            <p>Example response (200, Success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 41,
            &quot;title&quot;: &quot;Autem laudantium ducimus quae et.&quot;,
            &quot;description&quot;: &quot;Est sed ut cupiditate. Sunt commodi voluptate corporis. Vero corporis delectus ad aut quia quas enim.&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;user_id&quot;: 79,
            &quot;created_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: null,
            &quot;user&quot;: {
                &quot;id&quot;: 79,
                &quot;username&quot;: &quot;schroeder.maci&quot;,
                &quot;first_name&quot;: &quot;Meaghan&quot;,
                &quot;last_name&quot;: &quot;Hayes&quot;,
                &quot;email&quot;: &quot;goldner.chris@example.com&quot;,
                &quot;country&quot;: &quot;Papua New Guinea&quot;,
                &quot;bio&quot;: &quot;Voluptatem possimus sit laboriosam consectetur. Maiores repudiandae eligendi aut corrupti. Aliquam iste quia consequatur molestias dolor praesentium. Architecto ipsum atque quis sequi quo.&quot;,
                &quot;photo&quot;: &quot;https://via.placeholder.com/640x480.png/00ddbb?text=excepturi&quot;,
                &quot;artist_verified_at&quot;: &quot;2025-02-12 17:06:38&quot;,
                &quot;email_verified_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
                &quot;role&quot;: &quot;artist&quot;,
                &quot;created_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 42,
            &quot;title&quot;: &quot;Blanditiis similique molestias nesciunt.&quot;,
            &quot;description&quot;: &quot;Magni debitis alias in ipsa eligendi iusto aut. Cum deleniti nulla consequatur mollitia alias ut. Expedita maiores officiis est sint et quas et. Debitis et vero dolorem possimus.&quot;,
            &quot;status&quot;: &quot;draft&quot;,
            &quot;user_id&quot;: 80,
            &quot;created_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: null,
            &quot;user&quot;: {
                &quot;id&quot;: 80,
                &quot;username&quot;: &quot;schaefer.brenda&quot;,
                &quot;first_name&quot;: &quot;Santino&quot;,
                &quot;last_name&quot;: &quot;Donnelly&quot;,
                &quot;email&quot;: &quot;ykutch@example.com&quot;,
                &quot;country&quot;: &quot;Bermuda&quot;,
                &quot;bio&quot;: &quot;Ipsam modi necessitatibus rerum quidem tempore aut. Voluptatem officiis accusantium officiis voluptates inventore ut enim veritatis. Est quis molestiae cum quia impedit dicta.&quot;,
                &quot;photo&quot;: &quot;https://via.placeholder.com/640x480.png/0099aa?text=natus&quot;,
                &quot;artist_verified_at&quot;: &quot;2025-02-12 17:06:38&quot;,
                &quot;email_verified_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
                &quot;role&quot;: &quot;artist&quot;,
                &quot;created_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;
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
               value="filter[tag]=graphic"
               data-component="query">
    <br>
<p>Filter artworks by tag. Example: <code>filter[tag]=graphic</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>painting</code></li> <li><code>graphic</code></li> <li><code>sculpture</code></li> <li><code>folk art</code></li> <li><code>textile</code></li> <li><code>ceramics</code></li> <li><code>stained glass windows</code></li> <li><code>beads</code></li> <li><code>paper</code></li> <li><code>glass</code></li> <li><code>dolls</code></li> <li><code>jewellery</code></li> <li><code>fresco</code></li> <li><code>metal</code></li> <li><code>mosaic</code></li></ul>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>searchQuery</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="searchQuery"                data-endpoint="GETapi-v1-artworks"
               value="searchQuery=lorem"
               data-component="query">
    <br>
<p>Search for artworks by title or description. Example: <code>searchQuery=lorem</code></p>
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
<p>Sort artworks. Example: <code>sort=trending</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>rising</code></li> <li><code>new</code></li> <li><code>popular</code></li> <li><code>trending</code></li></ul>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="page"                data-endpoint="GETapi-v1-artworks"
               value="1"
               data-component="query">
    <br>
<p>The page number to fetch. Example: <code>1</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>perPage</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="perPage"                data-endpoint="GETapi-v1-artworks"
               value="10"
               data-component="query">
    <br>
<p>The number of records to fetch per page. Example: <code>10</code></p>
            </div>
                </form>

                    <h2 id="artworks-GETapi-v1-artworks--artworkId-">Show Published Artwork</h2>

<p>
</p>

<p>Retrieve a single published artwork by id</p>

<span id="example-requests-GETapi-v1-artworks--artworkId-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/artworks/10" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artworks/10"
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

<span id="example-responses-GETapi-v1-artworks--artworkId-">
            <blockquote>
            <p>Example response (200, Success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 43,
            &quot;title&quot;: &quot;Iste ad dolorum autem.&quot;,
            &quot;description&quot;: &quot;Ad rerum ipsum omnis. Sed rem necessitatibus laudantium voluptas delectus. Labore consequuntur distinctio ratione est. Molestiae veritatis suscipit provident sit magni.&quot;,
            &quot;status&quot;: &quot;draft&quot;,
            &quot;user_id&quot;: 81,
            &quot;created_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 1,
            &quot;artwork_comments_count&quot;: 1,
            &quot;artwork_main_photo_path&quot;: &quot;/storage/seeding-photos/10.jpeg&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 81,
                &quot;username&quot;: &quot;danny45&quot;,
                &quot;first_name&quot;: &quot;Dax&quot;,
                &quot;last_name&quot;: &quot;Cummings&quot;,
                &quot;email&quot;: &quot;laurie.buckridge@example.net&quot;,
                &quot;country&quot;: &quot;Serbia&quot;,
                &quot;bio&quot;: &quot;Magni delectus eaque ut quis. Id esse ratione totam quo. Velit minus sint soluta illo nisi vel sint sint. Quia qui quasi laboriosam corporis.&quot;,
                &quot;photo&quot;: null,
                &quot;artist_verified_at&quot;: &quot;2025-02-12 17:06:38&quot;,
                &quot;email_verified_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
                &quot;role&quot;: &quot;artist&quot;,
                &quot;created_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;
            },
            &quot;artwork_photos&quot;: [
                {
                    &quot;id&quot;: 19,
                    &quot;path&quot;: &quot;/storage/seeding-photos/10.jpeg&quot;,
                    &quot;is_main&quot;: 1,
                    &quot;artwork_id&quot;: 43,
                    &quot;created_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;
                }
            ],
            &quot;artwork_comments&quot;: [
                {
                    &quot;id&quot;: 9,
                    &quot;comment_text&quot;: &quot;Numquam odio in quam laborum beatae corrupti.&quot;,
                    &quot;artwork_id&quot;: 43,
                    &quot;user_id&quot;: 82,
                    &quot;created_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
                    &quot;user&quot;: {
                        &quot;id&quot;: 82,
                        &quot;username&quot;: &quot;gino45&quot;,
                        &quot;first_name&quot;: &quot;Pansy&quot;,
                        &quot;last_name&quot;: &quot;Kovacek&quot;,
                        &quot;email&quot;: &quot;ddouglas@example.net&quot;,
                        &quot;country&quot;: &quot;Latvia&quot;,
                        &quot;bio&quot;: &quot;Eos ducimus cum deserunt doloribus. Quis voluptatem ea quasi temporibus sint ut. Veritatis voluptatibus repellendus tenetur corrupti illum ut dolores. Mollitia quia dolorem cum accusamus sed. Molestiae quibusdam tempore tempora in ut at odio est.&quot;,
                        &quot;photo&quot;: &quot;https://via.placeholder.com/640x480.png/0000aa?text=quibusdam&quot;,
                        &quot;artist_verified_at&quot;: null,
                        &quot;email_verified_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
                        &quot;role&quot;: &quot;artist&quot;,
                        &quot;created_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;
                    }
                }
            ],
            &quot;artwork_likes&quot;: [
                {
                    &quot;id&quot;: 7,
                    &quot;artwork_id&quot;: 43,
                    &quot;user_id&quot;: 83,
                    &quot;created_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
                    &quot;user&quot;: {
                        &quot;id&quot;: 83,
                        &quot;username&quot;: &quot;cbernier&quot;,
                        &quot;first_name&quot;: &quot;Cloyd&quot;,
                        &quot;last_name&quot;: &quot;Klein&quot;,
                        &quot;email&quot;: &quot;zella76@example.org&quot;,
                        &quot;country&quot;: &quot;Gambia&quot;,
                        &quot;bio&quot;: &quot;Nihil provident eius et libero. Quia odit enim consequatur omnis inventore quod. Ipsum recusandae aut tempore vel dolore alias.&quot;,
                        &quot;photo&quot;: &quot;https://via.placeholder.com/640x480.png/00bb99?text=sit&quot;,
                        &quot;artist_verified_at&quot;: &quot;2025-02-12 17:06:38&quot;,
                        &quot;email_verified_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
                        &quot;role&quot;: &quot;artist&quot;,
                        &quot;created_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;
                    }
                }
            ],
            &quot;tags&quot;: [
                {
                    &quot;id&quot;: 17,
                    &quot;name&quot;: &quot;Seth Corkery III&quot;,
                    &quot;created_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
                    &quot;pivot&quot;: {
                        &quot;artwork_id&quot;: 43,
                        &quot;tag_id&quot;: 17
                    }
                }
            ]
        },
        {
            &quot;id&quot;: 44,
            &quot;title&quot;: &quot;Aliquam architecto ipsum dolores earum accusamus.&quot;,
            &quot;description&quot;: &quot;Dolore ut asperiores praesentium qui eos error officia. Illum impedit voluptas illum dolores beatae cumque commodi.&quot;,
            &quot;status&quot;: &quot;draft&quot;,
            &quot;user_id&quot;: 84,
            &quot;created_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 1,
            &quot;artwork_comments_count&quot;: 1,
            &quot;artwork_main_photo_path&quot;: &quot;/storage/seeding-photos/13.jpeg&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 84,
                &quot;username&quot;: &quot;yvonne89&quot;,
                &quot;first_name&quot;: &quot;Ramon&quot;,
                &quot;last_name&quot;: &quot;Runte&quot;,
                &quot;email&quot;: &quot;xhoeger@example.org&quot;,
                &quot;country&quot;: &quot;Belarus&quot;,
                &quot;bio&quot;: &quot;Suscipit qui facere soluta et. Nostrum sint voluptas est consequatur dolores. Nostrum vero corrupti asperiores odio. Pariatur sed reiciendis suscipit porro.&quot;,
                &quot;photo&quot;: &quot;https://via.placeholder.com/640x480.png/00ff99?text=aspernatur&quot;,
                &quot;artist_verified_at&quot;: null,
                &quot;email_verified_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
                &quot;role&quot;: &quot;artist&quot;,
                &quot;created_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;
            },
            &quot;artwork_photos&quot;: [
                {
                    &quot;id&quot;: 20,
                    &quot;path&quot;: &quot;/storage/seeding-photos/13.jpeg&quot;,
                    &quot;is_main&quot;: 1,
                    &quot;artwork_id&quot;: 44,
                    &quot;created_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;
                }
            ],
            &quot;artwork_comments&quot;: [
                {
                    &quot;id&quot;: 10,
                    &quot;comment_text&quot;: &quot;Totam aut ab doloribus sit perspiciatis sapiente.&quot;,
                    &quot;artwork_id&quot;: 44,
                    &quot;user_id&quot;: 85,
                    &quot;created_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
                    &quot;user&quot;: {
                        &quot;id&quot;: 85,
                        &quot;username&quot;: &quot;hswift&quot;,
                        &quot;first_name&quot;: &quot;Maybell&quot;,
                        &quot;last_name&quot;: &quot;Terry&quot;,
                        &quot;email&quot;: &quot;mafalda.huels@example.org&quot;,
                        &quot;country&quot;: &quot;Jamaica&quot;,
                        &quot;bio&quot;: &quot;Aut ex modi beatae sit laudantium molestiae. Maxime ipsam excepturi deserunt iusto id fuga. Nostrum non voluptate veritatis. Officia perspiciatis unde ea qui sit natus.&quot;,
                        &quot;photo&quot;: &quot;https://via.placeholder.com/640x480.png/0022aa?text=et&quot;,
                        &quot;artist_verified_at&quot;: &quot;2025-02-12 17:06:38&quot;,
                        &quot;email_verified_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
                        &quot;role&quot;: &quot;artist&quot;,
                        &quot;created_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;
                    }
                }
            ],
            &quot;artwork_likes&quot;: [
                {
                    &quot;id&quot;: 8,
                    &quot;artwork_id&quot;: 44,
                    &quot;user_id&quot;: 86,
                    &quot;created_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
                    &quot;user&quot;: {
                        &quot;id&quot;: 86,
                        &quot;username&quot;: &quot;april01&quot;,
                        &quot;first_name&quot;: &quot;Issac&quot;,
                        &quot;last_name&quot;: &quot;Schuster&quot;,
                        &quot;email&quot;: &quot;carolina.quigley@example.net&quot;,
                        &quot;country&quot;: &quot;Colombia&quot;,
                        &quot;bio&quot;: &quot;Nulla rem quas voluptatem tempora eaque. Sint voluptatem voluptatem saepe. Et accusantium et inventore repellat quo aut quasi.&quot;,
                        &quot;photo&quot;: &quot;https://via.placeholder.com/640x480.png/0066cc?text=sequi&quot;,
                        &quot;artist_verified_at&quot;: &quot;2025-02-12 17:06:38&quot;,
                        &quot;email_verified_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
                        &quot;role&quot;: &quot;artist&quot;,
                        &quot;created_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;
                    }
                }
            ],
            &quot;tags&quot;: [
                {
                    &quot;id&quot;: 18,
                    &quot;name&quot;: &quot;Marietta Shields&quot;,
                    &quot;created_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
                    &quot;pivot&quot;: {
                        &quot;artwork_id&quot;: 44,
                        &quot;tag_id&quot;: 18
                    }
                }
            ]
        }
    ]
}</code>
 </pre>
            <blockquote>
            <p>Example response (404, Artwork not found):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;The artwork you are trying to retrieve does not exist.&quot;,
    &quot;status&quot;: 404
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-artworks--artworkId-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-artworks--artworkId-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-artworks--artworkId-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-artworks--artworkId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-artworks--artworkId-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-artworks--artworkId-" data-method="GET"
      data-path="api/v1/artworks/{artworkId}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-artworks--artworkId-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-artworks--artworkId-"
                    onclick="tryItOut('GETapi-v1-artworks--artworkId-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-artworks--artworkId-"
                    onclick="cancelTryOut('GETapi-v1-artworks--artworkId-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-artworks--artworkId-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/artworks/{artworkId}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-artworks--artworkId-"
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
                              name="Accept"                data-endpoint="GETapi-v1-artworks--artworkId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>artworkId</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="artworkId"                data-endpoint="GETapi-v1-artworks--artworkId-"
               value="10"
               data-component="url">
    <br>
<p>The id of the artwork Example: <code>10</code></p>
            </div>
                    </form>

                    <h2 id="artworks-GETapi-v1-users--username--artworks">List User Published Artworks</h2>

<p>
</p>

<p>Retrieve a list of artworks published by a user</p>

<span id="example-requests-GETapi-v1-users--username--artworks">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/users/fugiat/artworks?filter%5Btag%5D=filter%5Btag%5D%3Dabstract&amp;page=1&amp;perPage=10" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/users/fugiat/artworks"
);

const params = {
    "filter[tag]": "filter[tag]=abstract",
    "page": "1",
    "perPage": "10",
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
            <p>Example response (200, Success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 45,
            &quot;title&quot;: &quot;Dolores tenetur iure et praesentium earum et.&quot;,
            &quot;description&quot;: &quot;Accusantium fugit recusandae aliquid. Numquam voluptate dolorem laborum nesciunt quibusdam. Perferendis voluptatem recusandae explicabo mollitia et tenetur.&quot;,
            &quot;status&quot;: &quot;draft&quot;,
            &quot;user_id&quot;: 87,
            &quot;created_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: null
        },
        {
            &quot;id&quot;: 46,
            &quot;title&quot;: &quot;Ut facilis porro iste provident.&quot;,
            &quot;description&quot;: &quot;Doloremque sit repellat sit aliquam vero. Quia sit repellendus numquam non ipsam et voluptatibus. Animi recusandae aut saepe repellat velit aut ut.&quot;,
            &quot;status&quot;: &quot;draft&quot;,
            &quot;user_id&quot;: 88,
            &quot;created_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
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
            <blockquote>
            <p>Example response (404, User not found):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;The user you are trying to retrieve his artworks does not exist.&quot;,
    &quot;status&quot;: 404
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
               value="fugiat"
               data-component="url">
    <br>
<p>The username of the user Example: <code>fugiat</code></p>
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
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>perPage</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="perPage"                data-endpoint="GETapi-v1-users--username--artworks"
               value="10"
               data-component="query">
    <br>
<p>The number of records to fetch per page. Example: <code>10</code></p>
            </div>
                </form>

                    <h2 id="artworks-GETapi-v1-users-me-artworks">List Authenticated User Artworks</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Retrieve a list of artworks published or drafts by the currently authenticated user</p>

<span id="example-requests-GETapi-v1-users-me-artworks">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/users/me/artworks?filter%5Bstatus%5D=filter%5Bstatus%5D%3Dpublished&amp;page=1&amp;perPage=10" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/users/me/artworks"
);

const params = {
    "filter[status]": "filter[status]=published",
    "page": "1",
    "perPage": "10",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-users-me-artworks">
            <blockquote>
            <p>Example response (200, Success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 47,
            &quot;title&quot;: &quot;Sit aut earum nesciunt doloribus corrupti perspiciatis.&quot;,
            &quot;description&quot;: &quot;Quae illo beatae omnis officia. Assumenda non blanditiis debitis labore. Rerum consequatur illum provident nam et et. Aut provident quia nihil temporibus est minima ut.&quot;,
            &quot;status&quot;: &quot;draft&quot;,
            &quot;user_id&quot;: 89,
            &quot;created_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: null,
            &quot;artwork_photos&quot;: [
                {
                    &quot;id&quot;: 21,
                    &quot;path&quot;: &quot;/storage/seeding-photos/10.jpeg&quot;,
                    &quot;is_main&quot;: 0,
                    &quot;artwork_id&quot;: 47,
                    &quot;created_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;
                }
            ],
            &quot;tags&quot;: [
                {
                    &quot;id&quot;: 19,
                    &quot;name&quot;: &quot;Karson Orn&quot;,
                    &quot;created_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
                    &quot;pivot&quot;: {
                        &quot;artwork_id&quot;: 47,
                        &quot;tag_id&quot;: 19
                    }
                }
            ]
        },
        {
            &quot;id&quot;: 48,
            &quot;title&quot;: &quot;Distinctio tempore deleniti reprehenderit quis et repudiandae consequatur.&quot;,
            &quot;description&quot;: &quot;Et laborum placeat enim dolores. At reiciendis consequuntur inventore exercitationem distinctio quos. Illo quaerat necessitatibus earum sint et nobis. Optio modi nostrum aliquam nemo. Sint deserunt ut earum nihil molestias aliquam.&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;user_id&quot;: 90,
            &quot;created_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: &quot;/storage/seeding-photos/5.jpeg&quot;,
            &quot;artwork_photos&quot;: [
                {
                    &quot;id&quot;: 22,
                    &quot;path&quot;: &quot;/storage/seeding-photos/5.jpeg&quot;,
                    &quot;is_main&quot;: 1,
                    &quot;artwork_id&quot;: 48,
                    &quot;created_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;
                }
            ],
            &quot;tags&quot;: [
                {
                    &quot;id&quot;: 20,
                    &quot;name&quot;: &quot;Reyes Gutmann&quot;,
                    &quot;created_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
                    &quot;pivot&quot;: {
                        &quot;artwork_id&quot;: 48,
                        &quot;tag_id&quot;: 20
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
            <blockquote>
            <p>Example response (401, Unauthenticated):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-users-me-artworks" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-users-me-artworks"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-users-me-artworks"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-users-me-artworks" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-users-me-artworks">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-users-me-artworks" data-method="GET"
      data-path="api/v1/users/me/artworks"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-users-me-artworks', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-users-me-artworks"
                    onclick="tryItOut('GETapi-v1-users-me-artworks');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-users-me-artworks"
                    onclick="cancelTryOut('GETapi-v1-users-me-artworks');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-users-me-artworks"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/users/me/artworks</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-users-me-artworks"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-users-me-artworks"
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
                              name="Accept"                data-endpoint="GETapi-v1-users-me-artworks"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>filter[status]</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="filter[status]"                data-endpoint="GETapi-v1-users-me-artworks"
               value="filter[status]=published"
               data-component="query">
    <br>
<p>Filter artworks by status. Example: <code>filter[status]=published</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>draft</code></li> <li><code>published</code></li></ul>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="page"                data-endpoint="GETapi-v1-users-me-artworks"
               value="1"
               data-component="query">
    <br>
<p>The page number to fetch. Example: <code>1</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>perPage</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="perPage"                data-endpoint="GETapi-v1-users-me-artworks"
               value="10"
               data-component="query">
    <br>
<p>The number of records to fetch per page. Example: <code>10</code></p>
            </div>
                </form>

                    <h2 id="artworks-POSTapi-v1-artworks">Create Artwork</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Create a new artwork</p>

<span id="example-requests-POSTapi-v1-artworks">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/v1/artworks" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "photos[][is_main]=1"\
    --form "title=Artwork Title"\
    --form "description=This is an artwork description"\
    --form "tags[]=abstract"\
    --form "photos[][file]=@/tmp/php1a3g2t1sjqif9gPdacA" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artworks"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
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

<span id="example-responses-POSTapi-v1-artworks">
            <blockquote>
            <p>Example response (200, Success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 49,
        &quot;title&quot;: &quot;Qui ipsum est consequuntur.&quot;,
        &quot;description&quot;: &quot;Non dolore dolores tempore accusamus ea est ut. Eum ipsa voluptatum cum maiores soluta aut est. Eum at enim deleniti error quidem autem pariatur.&quot;,
        &quot;status&quot;: &quot;draft&quot;,
        &quot;user_id&quot;: 91,
        &quot;created_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
        &quot;artwork_likes_count&quot;: 0,
        &quot;artwork_comments_count&quot;: 0,
        &quot;artwork_main_photo_path&quot;: null
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (401, Unauthenticated):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Unauthorized):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;You are not authorized to create an artwork draft.&quot;,
    &quot;status&quot;: 403
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-artworks" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-artworks"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-artworks"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-artworks" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-artworks">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-artworks" data-method="POST"
      data-path="api/v1/artworks"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-artworks', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-artworks"
                    onclick="tryItOut('POSTapi-v1-artworks');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-artworks"
                    onclick="cancelTryOut('POSTapi-v1-artworks');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-artworks"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/artworks</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-v1-artworks"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-artworks"
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
                              name="Accept"                data-endpoint="POSTapi-v1-artworks"
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
                              name="photos.0.file"                data-endpoint="POSTapi-v1-artworks"
               value=""
               data-component="body">
    <br>
<p>The file of the photo. Must be an image. Must not be greater than 2048 kilobytes. Example: <code>/tmp/php1a3g2t1sjqif9gPdacA</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>is_main</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
 &nbsp;
                <label data-endpoint="POSTapi-v1-artworks" style="display: none">
            <input type="radio" name="photos.0.is_main"
                   value="true"
                   data-endpoint="POSTapi-v1-artworks"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-v1-artworks" style="display: none">
            <input type="radio" name="photos.0.is_main"
                   value="false"
                   data-endpoint="POSTapi-v1-artworks"
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
                              name="title"                data-endpoint="POSTapi-v1-artworks"
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
                              name="description"                data-endpoint="POSTapi-v1-artworks"
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
                              name="tags[0]"                data-endpoint="POSTapi-v1-artworks"
               data-component="body">
        <input type="text" style="display: none"
               name="tags[1]"                data-endpoint="POSTapi-v1-artworks"
               data-component="body">
    <br>
<p>The tag of the artwork.</p>
        </div>
        </form>

                    <h2 id="artworks-PUTapi-v1-artworks--artworkId-">Update Artwork Draft</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Update an artwork draft</p>

<span id="example-requests-PUTapi-v1-artworks--artworkId-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/v1/artworks/8" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"title\": \"Artwork Title\",
    \"description\": \"This is an artwork description\",
    \"status\": \"published\",
    \"tags\": [
        \"abstract\"
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artworks/8"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "Artwork Title",
    "description": "This is an artwork description",
    "status": "published",
    "tags": [
        "abstract"
    ]
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-artworks--artworkId-">
            <blockquote>
            <p>Example response (200, Success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 50,
        &quot;title&quot;: &quot;Optio excepturi nostrum repellat cupiditate doloribus ratione.&quot;,
        &quot;description&quot;: &quot;Sint similique magnam aut accusamus dolores. Totam beatae dolorum magni laboriosam distinctio harum. Est architecto quidem repellat vel assumenda veritatis minus.&quot;,
        &quot;status&quot;: &quot;draft&quot;,
        &quot;user_id&quot;: 92,
        &quot;created_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-02-12T17:06:38.000000Z&quot;,
        &quot;artwork_likes_count&quot;: 0,
        &quot;artwork_comments_count&quot;: 0,
        &quot;artwork_main_photo_path&quot;: null
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (401, Unauthenticated):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Unauthorized):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;You are not authorized to update this artwork draft.&quot;,
    &quot;status&quot;: 403
}</code>
 </pre>
            <blockquote>
            <p>Example response (404, Artwork not found):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;The artwork you are trying to update does not exist.&quot;,
    &quot;status&quot;: 404
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-v1-artworks--artworkId-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-artworks--artworkId-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-artworks--artworkId-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-artworks--artworkId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-artworks--artworkId-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-artworks--artworkId-" data-method="PUT"
      data-path="api/v1/artworks/{artworkId}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-artworks--artworkId-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-artworks--artworkId-"
                    onclick="tryItOut('PUTapi-v1-artworks--artworkId-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-artworks--artworkId-"
                    onclick="cancelTryOut('PUTapi-v1-artworks--artworkId-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-artworks--artworkId-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/artworks/{artworkId}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-v1-artworks--artworkId-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-artworks--artworkId-"
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
                              name="Accept"                data-endpoint="PUTapi-v1-artworks--artworkId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>artworkId</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="artworkId"                data-endpoint="PUTapi-v1-artworks--artworkId-"
               value="8"
               data-component="url">
    <br>
<p>The id of the artwork Example: <code>8</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="PUTapi-v1-artworks--artworkId-"
               value="Artwork Title"
               data-component="body">
    <br>
<p>The title of the artwork. Must not be greater than 255 characters. Must be at least 5 characters. Example: <code>Artwork Title</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PUTapi-v1-artworks--artworkId-"
               value="This is an artwork description"
               data-component="body">
    <br>
<p>The description of the artwork. Example: <code>This is an artwork description</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="PUTapi-v1-artworks--artworkId-"
               value="published"
               data-component="body">
    <br>
<p>The status of the artwork. Example: <code>published</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>published</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>tags</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="tags[0]"                data-endpoint="PUTapi-v1-artworks--artworkId-"
               data-component="body">
        <input type="text" style="display: none"
               name="tags[1]"                data-endpoint="PUTapi-v1-artworks--artworkId-"
               data-component="body">
    <br>
<p>The tag of the artwork.</p>
        </div>
        </form>

                    <h2 id="artworks-DELETEapi-v1-artworks--artworkId-">Delete Artwork</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Delete an artwork</p>

<span id="example-requests-DELETEapi-v1-artworks--artworkId-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/v1/artworks/12" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artworks/12"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-artworks--artworkId-">
            <blockquote>
            <p>Example response (200, Success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Artwork deleted successfully&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (401, Unauthenticated):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Unauthorized):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;You are not authorized to delete this artwork.&quot;,
    &quot;status&quot;: 403
}</code>
 </pre>
            <blockquote>
            <p>Example response (404, Artwork not found):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;The artwork you are trying to delete does not exist.&quot;,
    &quot;status&quot;: 404
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-v1-artworks--artworkId-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-artworks--artworkId-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-artworks--artworkId-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-artworks--artworkId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-artworks--artworkId-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-v1-artworks--artworkId-" data-method="DELETE"
      data-path="api/v1/artworks/{artworkId}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-artworks--artworkId-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-artworks--artworkId-"
                    onclick="tryItOut('DELETEapi-v1-artworks--artworkId-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-artworks--artworkId-"
                    onclick="cancelTryOut('DELETEapi-v1-artworks--artworkId-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-artworks--artworkId-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/artworks/{artworkId}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-v1-artworks--artworkId-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-v1-artworks--artworkId-"
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
                              name="Accept"                data-endpoint="DELETEapi-v1-artworks--artworkId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>artworkId</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="artworkId"                data-endpoint="DELETEapi-v1-artworks--artworkId-"
               value="12"
               data-component="url">
    <br>
<p>The id of the artwork Example: <code>12</code></p>
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
            <p>Example response (200, Success):</p>
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
            <blockquote>
            <p>Example response (401, Invalid credentials):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Invalid credentials&quot;,
    &quot;status&quot;: 401
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
            <p>Example response (200, Success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;User created successfully&quot;,
    &quot;data&quot;: {
        &quot;id&quot;: 1
    },
    &quot;status&quot;: 200
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
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/sign-out"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
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
            <p>Example response (200, Success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Signed out successfully&quot;,
    &quot;data&quot;: [],
    &quot;status&quot;: 200
}</code>
 </pre>
            <blockquote>
            <p>Example response (401, Unauthenticated):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated&quot;
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
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-v1-sign-out"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
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

                    <h2 id="authentication-POSTapi-v1-admin-sign-in">Admin Sign In</h2>

<p>
</p>

<p>Signs in an admin user and returns an auth token</p>

<span id="example-requests-POSTapi-v1-admin-sign-in">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/v1/admin/sign-in" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"johndoe@gmail.com\",
    \"password\": \"password\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/admin/sign-in"
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

<span id="example-responses-POSTapi-v1-admin-sign-in">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Authenticated&quot;,
    &quot;data&quot;: {
        &quot;token&quot;: &quot;{YOUR_AUTH_KEY}&quot;,
        &quot;id&quot;: 1
    },
    &quot;status&quot;: 200
}</code>
 </pre>
            <blockquote>
            <p>Example response (401, Invalid credentials):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Invalid credentials&quot;,
    &quot;status&quot;: 401
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-admin-sign-in" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-admin-sign-in"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-admin-sign-in"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-admin-sign-in" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-admin-sign-in">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-admin-sign-in" data-method="POST"
      data-path="api/v1/admin/sign-in"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-admin-sign-in', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-admin-sign-in"
                    onclick="tryItOut('POSTapi-v1-admin-sign-in');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-admin-sign-in"
                    onclick="cancelTryOut('POSTapi-v1-admin-sign-in');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-admin-sign-in"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/admin/sign-in</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-admin-sign-in"
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
                              name="Accept"                data-endpoint="POSTapi-v1-admin-sign-in"
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
                              name="email"                data-endpoint="POSTapi-v1-admin-sign-in"
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
                              name="password"                data-endpoint="POSTapi-v1-admin-sign-in"
               value="password"
               data-component="body">
    <br>
<p>The password associated with the user account. Example: <code>password</code></p>
        </div>
        </form>

                <h1 id="favorites">Favorites</h1>

    

                                <h2 id="favorites-GETapi-v1-users-me-favorites-artworks">List Authenticated User Favorite Artworks</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Retrieve a list of artworks favorites by the currently authenticated user</p>

<span id="example-requests-GETapi-v1-users-me-favorites-artworks">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/users/me/favorites/artworks?page=1&amp;perPage=10" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/users/me/favorites/artworks"
);

const params = {
    "page": "1",
    "perPage": "10",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-users-me-favorites-artworks">
            <blockquote>
            <p>Example response (200, Success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 59,
            &quot;title&quot;: &quot;Facilis rerum ab et enim ex.&quot;,
            &quot;description&quot;: &quot;Soluta pariatur consequuntur qui natus. Sapiente eos quo vitae aut. Voluptates consequuntur ad nostrum consequatur eligendi voluptatibus id voluptatum. Eveniet architecto ullam aspernatur iste suscipit facere.&quot;,
            &quot;status&quot;: &quot;draft&quot;,
            &quot;user_id&quot;: 117,
            &quot;created_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: &quot;/storage/seeding-photos/14.jpeg&quot;,
            &quot;artwork_photos&quot;: [
                {
                    &quot;id&quot;: 26,
                    &quot;path&quot;: &quot;/storage/seeding-photos/14.jpeg&quot;,
                    &quot;is_main&quot;: 1,
                    &quot;artwork_id&quot;: 59,
                    &quot;created_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;
                }
            ],
            &quot;tags&quot;: [
                {
                    &quot;id&quot;: 23,
                    &quot;name&quot;: &quot;Raul Wilkinson&quot;,
                    &quot;created_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;,
                    &quot;pivot&quot;: {
                        &quot;artwork_id&quot;: 59,
                        &quot;tag_id&quot;: 23
                    }
                }
            ]
        },
        {
            &quot;id&quot;: 60,
            &quot;title&quot;: &quot;Fuga quibusdam esse autem.&quot;,
            &quot;description&quot;: &quot;Sed dolores nesciunt et iusto. In dignissimos voluptates officia dolores molestias explicabo. Et incidunt placeat doloremque error quod ut.&quot;,
            &quot;status&quot;: &quot;draft&quot;,
            &quot;user_id&quot;: 118,
            &quot;created_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: &quot;/storage/seeding-photos/11.jpeg&quot;,
            &quot;artwork_photos&quot;: [
                {
                    &quot;id&quot;: 27,
                    &quot;path&quot;: &quot;/storage/seeding-photos/11.jpeg&quot;,
                    &quot;is_main&quot;: 1,
                    &quot;artwork_id&quot;: 60,
                    &quot;created_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;
                }
            ],
            &quot;tags&quot;: [
                {
                    &quot;id&quot;: 24,
                    &quot;name&quot;: &quot;Jada Conroy&quot;,
                    &quot;created_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;,
                    &quot;pivot&quot;: {
                        &quot;artwork_id&quot;: 60,
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
            <blockquote>
            <p>Example response (401, Unauthenticated):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-users-me-favorites-artworks" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-users-me-favorites-artworks"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-users-me-favorites-artworks"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-users-me-favorites-artworks" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-users-me-favorites-artworks">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-users-me-favorites-artworks" data-method="GET"
      data-path="api/v1/users/me/favorites/artworks"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-users-me-favorites-artworks', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-users-me-favorites-artworks"
                    onclick="tryItOut('GETapi-v1-users-me-favorites-artworks');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-users-me-favorites-artworks"
                    onclick="cancelTryOut('GETapi-v1-users-me-favorites-artworks');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-users-me-favorites-artworks"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/users/me/favorites/artworks</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-users-me-favorites-artworks"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-users-me-favorites-artworks"
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
                              name="Accept"                data-endpoint="GETapi-v1-users-me-favorites-artworks"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="page"                data-endpoint="GETapi-v1-users-me-favorites-artworks"
               value="1"
               data-component="query">
    <br>
<p>The page number to fetch. Example: <code>1</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>perPage</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="perPage"                data-endpoint="GETapi-v1-users-me-favorites-artworks"
               value="10"
               data-component="query">
    <br>
<p>The number of records to fetch per page. Example: <code>10</code></p>
            </div>
                </form>

                <h1 id="follows">Follows</h1>

    

                                <h2 id="follows-GETapi-v1-users-me-follows-followers">List Authenticated User Followers</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Retrieve a list of users following the currently authenticated user</p>

<span id="example-requests-GETapi-v1-users-me-follows-followers">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/users/me/follows/followers?page=1&amp;perPage=10" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/users/me/follows/followers"
);

const params = {
    "page": "1",
    "perPage": "10",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-users-me-follows-followers">
            <blockquote>
            <p>Example response (200, Success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 98,
            &quot;username&quot;: &quot;wintheiser.marianna&quot;,
            &quot;first_name&quot;: &quot;Marie&quot;,
            &quot;last_name&quot;: &quot;Bergstrom&quot;,
            &quot;email&quot;: &quot;denesik.imelda@example.com&quot;,
            &quot;country&quot;: &quot;Costa Rica&quot;,
            &quot;bio&quot;: &quot;Eum corrupti quos voluptatem accusantium consectetur quia placeat ipsa. Porro facilis unde quisquam dolorem deserunt qui. Doloremque itaque in non iste. Ex quis eos impedit doloribus ut officia cum.&quot;,
            &quot;photo&quot;: null,
            &quot;artist_verified_at&quot;: &quot;2025-02-12 17:06:39&quot;,
            &quot;email_verified_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;,
            &quot;role&quot;: &quot;artist&quot;,
            &quot;created_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;
        },
        {
            &quot;id&quot;: 99,
            &quot;username&quot;: &quot;fdeckow&quot;,
            &quot;first_name&quot;: &quot;Eric&quot;,
            &quot;last_name&quot;: &quot;Hermiston&quot;,
            &quot;email&quot;: &quot;russ67@example.net&quot;,
            &quot;country&quot;: &quot;Tuvalu&quot;,
            &quot;bio&quot;: &quot;Dolores ut ut dolor aliquid. Exercitationem omnis dolores nostrum est. Sint quod sint illo. Aut ipsum qui ut omnis.&quot;,
            &quot;photo&quot;: null,
            &quot;artist_verified_at&quot;: null,
            &quot;email_verified_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;,
            &quot;role&quot;: &quot;artist&quot;,
            &quot;created_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;
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
            <blockquote>
            <p>Example response (401, Unauthenticated):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-users-me-follows-followers" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-users-me-follows-followers"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-users-me-follows-followers"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-users-me-follows-followers" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-users-me-follows-followers">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-users-me-follows-followers" data-method="GET"
      data-path="api/v1/users/me/follows/followers"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-users-me-follows-followers', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-users-me-follows-followers"
                    onclick="tryItOut('GETapi-v1-users-me-follows-followers');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-users-me-follows-followers"
                    onclick="cancelTryOut('GETapi-v1-users-me-follows-followers');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-users-me-follows-followers"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/users/me/follows/followers</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-users-me-follows-followers"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-users-me-follows-followers"
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
                              name="Accept"                data-endpoint="GETapi-v1-users-me-follows-followers"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="page"                data-endpoint="GETapi-v1-users-me-follows-followers"
               value="1"
               data-component="query">
    <br>
<p>The page number to fetch. Example: <code>1</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>perPage</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="perPage"                data-endpoint="GETapi-v1-users-me-follows-followers"
               value="10"
               data-component="query">
    <br>
<p>The number of items to fetch per page. Example: <code>10</code></p>
            </div>
                </form>

                    <h2 id="follows-GETapi-v1-users-me-follows-following">List Authenticated User Following</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Retrieve a list of users followed by the currently authenticated user</p>

<span id="example-requests-GETapi-v1-users-me-follows-following">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/users/me/follows/following?page=1&amp;perPage=10" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/users/me/follows/following"
);

const params = {
    "page": "1",
    "perPage": "10",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-users-me-follows-following">
            <blockquote>
            <p>Example response (200, Success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 100,
            &quot;username&quot;: &quot;jude.hills&quot;,
            &quot;first_name&quot;: &quot;Hyman&quot;,
            &quot;last_name&quot;: &quot;Nader&quot;,
            &quot;email&quot;: &quot;schoen.imogene@example.org&quot;,
            &quot;country&quot;: &quot;Guinea-Bissau&quot;,
            &quot;bio&quot;: &quot;Cumque sint qui ut aut est totam. Minus autem voluptatem delectus eum. Ea sit sed cupiditate assumenda nostrum.&quot;,
            &quot;photo&quot;: null,
            &quot;artist_verified_at&quot;: &quot;2025-02-12 17:06:39&quot;,
            &quot;email_verified_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;,
            &quot;role&quot;: &quot;artist&quot;,
            &quot;created_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;
        },
        {
            &quot;id&quot;: 101,
            &quot;username&quot;: &quot;dicki.allene&quot;,
            &quot;first_name&quot;: &quot;Harmon&quot;,
            &quot;last_name&quot;: &quot;Dickens&quot;,
            &quot;email&quot;: &quot;miguel06@example.net&quot;,
            &quot;country&quot;: &quot;Romania&quot;,
            &quot;bio&quot;: &quot;Possimus illo voluptatibus veritatis labore iure quisquam vel. Quam velit magni et non excepturi molestiae qui. Quos et qui quas. Beatae iste odit ut culpa quibusdam.&quot;,
            &quot;photo&quot;: null,
            &quot;artist_verified_at&quot;: null,
            &quot;email_verified_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;,
            &quot;role&quot;: &quot;artist&quot;,
            &quot;created_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;
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
            <blockquote>
            <p>Example response (401, Unauthenticated):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-users-me-follows-following" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-users-me-follows-following"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-users-me-follows-following"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-users-me-follows-following" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-users-me-follows-following">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-users-me-follows-following" data-method="GET"
      data-path="api/v1/users/me/follows/following"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-users-me-follows-following', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-users-me-follows-following"
                    onclick="tryItOut('GETapi-v1-users-me-follows-following');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-users-me-follows-following"
                    onclick="cancelTryOut('GETapi-v1-users-me-follows-following');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-users-me-follows-following"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/users/me/follows/following</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-users-me-follows-following"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-users-me-follows-following"
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
                              name="Accept"                data-endpoint="GETapi-v1-users-me-follows-following"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="page"                data-endpoint="GETapi-v1-users-me-follows-following"
               value="1"
               data-component="query">
    <br>
<p>The page number to fetch. Example: <code>1</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>perPage</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="perPage"                data-endpoint="GETapi-v1-users-me-follows-following"
               value="10"
               data-component="query">
    <br>
<p>The number of items to fetch per page. Example: <code>10</code></p>
            </div>
                </form>

                    <h2 id="follows-POSTapi-v1-follows-users--userId-">Follow User</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Follow a user</p>

<span id="example-requests-POSTapi-v1-follows-users--userId-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/v1/follows/users/13" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/follows/users/13"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-follows-users--userId-">
            <blockquote>
            <p>Example response (200, Success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 3,
        &quot;follower_id&quot;: 102,
        &quot;followed_id&quot;: 103,
        &quot;created_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (401, Unauthenticated):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Unauthorized):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;You are not authorized to follow this user.&quot;,
    &quot;status&quot;: 403
}</code>
 </pre>
            <blockquote>
            <p>Example response (404, User not found):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;The user you are trying to follow does not exist.&quot;,
    &quot;status&quot;: 404
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-follows-users--userId-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-follows-users--userId-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-follows-users--userId-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-follows-users--userId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-follows-users--userId-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-follows-users--userId-" data-method="POST"
      data-path="api/v1/follows/users/{userId}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-follows-users--userId-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-follows-users--userId-"
                    onclick="tryItOut('POSTapi-v1-follows-users--userId-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-follows-users--userId-"
                    onclick="cancelTryOut('POSTapi-v1-follows-users--userId-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-follows-users--userId-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/follows/users/{userId}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-v1-follows-users--userId-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-follows-users--userId-"
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
                              name="Accept"                data-endpoint="POSTapi-v1-follows-users--userId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>userId</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="userId"                data-endpoint="POSTapi-v1-follows-users--userId-"
               value="13"
               data-component="url">
    <br>
<p>The ID of the user to follow Example: <code>13</code></p>
            </div>
                    </form>

                    <h2 id="follows-DELETEapi-v1-follows-users--userId-">Unfollow User</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Unfollow a user</p>

<span id="example-requests-DELETEapi-v1-follows-users--userId-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/v1/follows/users/10" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/follows/users/10"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-follows-users--userId-">
            <blockquote>
            <p>Example response (200, Success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
     &#039;message&#039; =&gt; &#039;You have successfully unfollowed this user.&#039;
     &#039;data&#039; =&gt; [],
     &#039;status&#039; =&gt; 200
}</code>
 </pre>
            <blockquote>
            <p>Example response (401, Unauthenticated):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Unauthorized):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;You are not authorized to unfollow this user.&quot;,
    &quot;status&quot;: 403
}</code>
 </pre>
            <blockquote>
            <p>Example response (404, User not found):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;The user you are trying to unfollow does not exist.&quot;,
    &quot;status&quot;: 404
}</code>
 </pre>
            <blockquote>
            <p>Example response (404, Follow not found):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;You have not followed this user.&quot;,
    &quot;status&quot;: 404
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-v1-follows-users--userId-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-follows-users--userId-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-follows-users--userId-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-follows-users--userId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-follows-users--userId-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-v1-follows-users--userId-" data-method="DELETE"
      data-path="api/v1/follows/users/{userId}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-follows-users--userId-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-follows-users--userId-"
                    onclick="tryItOut('DELETEapi-v1-follows-users--userId-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-follows-users--userId-"
                    onclick="cancelTryOut('DELETEapi-v1-follows-users--userId-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-follows-users--userId-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/follows/users/{userId}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-v1-follows-users--userId-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-v1-follows-users--userId-"
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
                              name="Accept"                data-endpoint="DELETEapi-v1-follows-users--userId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>userId</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="userId"                data-endpoint="DELETEapi-v1-follows-users--userId-"
               value="10"
               data-component="url">
    <br>
<p>The ID of the user to unfollow Example: <code>10</code></p>
            </div>
                    </form>

                <h1 id="notifications">Notifications</h1>

    

                                <h2 id="notifications-GETapi-v1-users-me-notifications">List authenticated user notifications</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Retrieve a list of authenticated user notifications</p>

<span id="example-requests-GETapi-v1-users-me-notifications">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/users/me/notifications" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/users/me/notifications"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-users-me-notifications">
            <blockquote>
            <p>Example response (401, Unauthenticated):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-users-me-notifications" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-users-me-notifications"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-users-me-notifications"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-users-me-notifications" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-users-me-notifications">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-users-me-notifications" data-method="GET"
      data-path="api/v1/users/me/notifications"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-users-me-notifications', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-users-me-notifications"
                    onclick="tryItOut('GETapi-v1-users-me-notifications');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-users-me-notifications"
                    onclick="cancelTryOut('GETapi-v1-users-me-notifications');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-users-me-notifications"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/users/me/notifications</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-users-me-notifications"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-users-me-notifications"
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
                              name="Accept"                data-endpoint="GETapi-v1-users-me-notifications"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="notifications-PUTapi-v1-users-me-notifications-unread--notificationId-">Mark notification as read</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Mark a specific notification as read</p>

<span id="example-requests-PUTapi-v1-users-me-notifications-unread--notificationId-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/v1/users/me/notifications/unread/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/users/me/notifications/unread/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-users-me-notifications-unread--notificationId-">
            <blockquote>
            <p>Example response (200, Success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Notification marked as read&quot;,
    &quot;data&quot;: [],
    &quot;status&quot;: 200
}</code>
 </pre>
            <blockquote>
            <p>Example response (401, Unauthenticated):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (404, Notification not found):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;The notification you are trying to retrieve does not exist.&quot;,
    &quot;status&quot;: 404
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-v1-users-me-notifications-unread--notificationId-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-users-me-notifications-unread--notificationId-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-users-me-notifications-unread--notificationId-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-users-me-notifications-unread--notificationId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-users-me-notifications-unread--notificationId-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-users-me-notifications-unread--notificationId-" data-method="PUT"
      data-path="api/v1/users/me/notifications/unread/{notificationId}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-users-me-notifications-unread--notificationId-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-users-me-notifications-unread--notificationId-"
                    onclick="tryItOut('PUTapi-v1-users-me-notifications-unread--notificationId-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-users-me-notifications-unread--notificationId-"
                    onclick="cancelTryOut('PUTapi-v1-users-me-notifications-unread--notificationId-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-users-me-notifications-unread--notificationId-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/users/me/notifications/unread/{notificationId}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-v1-users-me-notifications-unread--notificationId-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-users-me-notifications-unread--notificationId-"
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
                              name="Accept"                data-endpoint="PUTapi-v1-users-me-notifications-unread--notificationId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>notificationId</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="notificationId"                data-endpoint="PUTapi-v1-users-me-notifications-unread--notificationId-"
               value="1"
               data-component="url">
    <br>
<p>The id of the notification Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="notifications-PUTapi-v1-users-me-notifications-unread">Mark all notifications as read</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Mark all authenticated user notifications as read</p>

<span id="example-requests-PUTapi-v1-users-me-notifications-unread">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/v1/users/me/notifications/unread" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/users/me/notifications/unread"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-users-me-notifications-unread">
            <blockquote>
            <p>Example response (200, Success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;All your notifications are marked as read.&quot;,
    &quot;data&quot;: [],
    &quot;status&quot;: 200
}</code>
 </pre>
            <blockquote>
            <p>Example response (401, Unauthenticated):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-v1-users-me-notifications-unread" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-users-me-notifications-unread"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-users-me-notifications-unread"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-users-me-notifications-unread" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-users-me-notifications-unread">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-users-me-notifications-unread" data-method="PUT"
      data-path="api/v1/users/me/notifications/unread"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-users-me-notifications-unread', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-users-me-notifications-unread"
                    onclick="tryItOut('PUTapi-v1-users-me-notifications-unread');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-users-me-notifications-unread"
                    onclick="cancelTryOut('PUTapi-v1-users-me-notifications-unread');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-users-me-notifications-unread"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/users/me/notifications/unread</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-v1-users-me-notifications-unread"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-users-me-notifications-unread"
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
                              name="Accept"                data-endpoint="PUTapi-v1-users-me-notifications-unread"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
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
    --get "http://localhost:8000/api/v1/users?filter%5Bcountry%5D=filter%5Bcountry%5D%3Dfinland&amp;filter%5Btag%5D=filter%5Btag%5D%3Dceramics&amp;filter%5Bverified%5D=0&amp;searchQuery=searchQuery%3Dlorem&amp;sort=sort%3Dnew&amp;include=include%3Dartworks&amp;page=1&amp;perPage=10" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/users"
);

const params = {
    "filter[country]": "filter[country]=finland",
    "filter[tag]": "filter[tag]=ceramics",
    "filter[verified]": "0",
    "searchQuery": "searchQuery=lorem",
    "sort": "sort=new",
    "include": "include=artworks",
    "page": "1",
    "perPage": "10",
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
            <p>Example response (200, Success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 93,
            &quot;username&quot;: &quot;obauch&quot;,
            &quot;first_name&quot;: &quot;Paxton&quot;,
            &quot;last_name&quot;: &quot;Jast&quot;,
            &quot;email&quot;: &quot;alfred55@example.net&quot;,
            &quot;country&quot;: &quot;Solomon Islands&quot;,
            &quot;bio&quot;: &quot;Recusandae similique voluptatem deserunt culpa quibusdam iste. Est nostrum quam nihil. Nam consequatur molestiae harum vel.&quot;,
            &quot;photo&quot;: &quot;https://via.placeholder.com/640x480.png/00ccee?text=et&quot;,
            &quot;artist_verified_at&quot;: null,
            &quot;email_verified_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;,
            &quot;role&quot;: &quot;artist&quot;,
            &quot;created_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;,
            &quot;artworks&quot;: [
                {
                    &quot;id&quot;: 51,
                    &quot;title&quot;: &quot;Et minus dolor iure incidunt.&quot;,
                    &quot;description&quot;: &quot;Minima reprehenderit nulla quia et autem. Nostrum recusandae perspiciatis aperiam non. Aut fugit quibusdam consequatur dolores similique qui.&quot;,
                    &quot;status&quot;: &quot;published&quot;,
                    &quot;user_id&quot;: 93,
                    &quot;created_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;,
                    &quot;artwork_likes_count&quot;: 0,
                    &quot;artwork_comments_count&quot;: 0,
                    &quot;artwork_main_photo_path&quot;: null
                }
            ]
        },
        {
            &quot;id&quot;: 94,
            &quot;username&quot;: &quot;legros.giuseppe&quot;,
            &quot;first_name&quot;: &quot;Loyce&quot;,
            &quot;last_name&quot;: &quot;O&#039;Hara&quot;,
            &quot;email&quot;: &quot;hessel.ericka@example.com&quot;,
            &quot;country&quot;: &quot;Slovenia&quot;,
            &quot;bio&quot;: &quot;Et praesentium quia ut sunt voluptate. Quas facere occaecati voluptas voluptas voluptatem necessitatibus atque. Aut reprehenderit id expedita ab eos similique sed culpa.&quot;,
            &quot;photo&quot;: &quot;https://via.placeholder.com/640x480.png/00bb66?text=alias&quot;,
            &quot;artist_verified_at&quot;: null,
            &quot;email_verified_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;,
            &quot;role&quot;: &quot;artist&quot;,
            &quot;created_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;,
            &quot;artworks&quot;: [
                {
                    &quot;id&quot;: 52,
                    &quot;title&quot;: &quot;Dicta consequatur quo quas.&quot;,
                    &quot;description&quot;: &quot;Libero exercitationem mollitia ea minus ut. Rerum voluptatem optio cum est aut ducimus. Vel velit dolorem repellendus officia ut blanditiis. Et nemo qui sit labore quis.&quot;,
                    &quot;status&quot;: &quot;draft&quot;,
                    &quot;user_id&quot;: 94,
                    &quot;created_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;,
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
                <b style="line-height: 2;"><code>filter[tag]</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="filter[tag]"                data-endpoint="GETapi-v1-users"
               value="filter[tag]=ceramics"
               data-component="query">
    <br>
<p>Filter artworks by tag. Example: <code>filter[tag]=ceramics</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>painting</code></li> <li><code>graphic</code></li> <li><code>sculpture</code></li> <li><code>folk art</code></li> <li><code>textile</code></li> <li><code>ceramics</code></li> <li><code>stained glass windows</code></li> <li><code>beads</code></li> <li><code>paper</code></li> <li><code>glass</code></li> <li><code>dolls</code></li> <li><code>jewellery</code></li> <li><code>fresco</code></li> <li><code>metal</code></li> <li><code>mosaic</code></li></ul>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>filter[verified]</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="filter[verified]"                data-endpoint="GETapi-v1-users"
               value="0"
               data-component="query">
    <br>
<p>Filter artists by verification status. Example: <code>0</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>1</code></li> <li><code>0</code></li></ul>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>searchQuery</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="searchQuery"                data-endpoint="GETapi-v1-users"
               value="searchQuery=lorem"
               data-component="query">
    <br>
<p>Search for users by username, first name, or last name. Example: <code>searchQuery=lorem</code></p>
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
                <b style="line-height: 2;"><code>include</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="include"                data-endpoint="GETapi-v1-users"
               value="include=artworks"
               data-component="query">
    <br>
<p>Include related artworks. Example: <code>include=artworks</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>artworks</code></li></ul>
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
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>perPage</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="perPage"                data-endpoint="GETapi-v1-users"
               value="10"
               data-component="query">
    <br>
<p>The number of records to retrieve per page. Example: <code>10</code></p>
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
    --get "http://localhost:8000/api/v1/users/magni" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/users/magni"
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
            <p>Example response (200, Success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 95,
        &quot;username&quot;: &quot;harris.rodger&quot;,
        &quot;first_name&quot;: &quot;Alfonzo&quot;,
        &quot;last_name&quot;: &quot;Kuhlman&quot;,
        &quot;email&quot;: &quot;tierra46@example.net&quot;,
        &quot;country&quot;: &quot;Luxembourg&quot;,
        &quot;bio&quot;: &quot;Officiis voluptatem aut ipsa natus qui nihil. Odit vel dolorem illo exercitationem et aut minus. Dolores nostrum dolorem voluptas sint. Et dolor debitis odit recusandae rerum et eveniet est.&quot;,
        &quot;photo&quot;: &quot;https://via.placeholder.com/640x480.png/0044ee?text=repudiandae&quot;,
        &quot;artist_verified_at&quot;: null,
        &quot;email_verified_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;,
        &quot;role&quot;: &quot;artist&quot;,
        &quot;created_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (404, User not found):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;The user you are trying to retrieve does not exist.&quot;,
    &quot;status&quot;: 404
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
               value="magni"
               data-component="url">
    <br>
<p>The username of the user Example: <code>magni</code></p>
            </div>
                    </form>

                    <h2 id="users-GETapi-v1-users-me">Show Authenticated User</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Retrieve the currently authenticated user</p>

<span id="example-requests-GETapi-v1-users-me">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/users/me" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/users/me"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-users-me">
            <blockquote>
            <p>Example response (200, Success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 96,
        &quot;username&quot;: &quot;cpowlowski&quot;,
        &quot;first_name&quot;: &quot;Arlene&quot;,
        &quot;last_name&quot;: &quot;Abbott&quot;,
        &quot;email&quot;: &quot;murray.ruby@example.com&quot;,
        &quot;country&quot;: &quot;United Kingdom&quot;,
        &quot;bio&quot;: &quot;Aut non explicabo molestias minus error mollitia. Nam doloribus rerum ut minus quae expedita nam. Porro distinctio optio enim.&quot;,
        &quot;photo&quot;: &quot;https://via.placeholder.com/640x480.png/0088dd?text=eos&quot;,
        &quot;artist_verified_at&quot;: null,
        &quot;email_verified_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;,
        &quot;role&quot;: &quot;artist&quot;,
        &quot;created_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (401, Unauthenticated):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-users-me" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-users-me"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-users-me"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-users-me" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-users-me">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-users-me" data-method="GET"
      data-path="api/v1/users/me"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-users-me', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-users-me"
                    onclick="tryItOut('GETapi-v1-users-me');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-users-me"
                    onclick="cancelTryOut('GETapi-v1-users-me');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-users-me"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/users/me</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-users-me"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-users-me"
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
                              name="Accept"                data-endpoint="GETapi-v1-users-me"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="users-PUTapi-v1-users-me">Update Authenticated User</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Update the currently authenticated user</p>

<span id="example-requests-PUTapi-v1-users-me">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/v1/users/me" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "username=johndoe"\
    --form "first_name=John"\
    --form "last_name=Doe"\
    --form "email=johndoe@gmail.com"\
    --form "country=United States"\
    --form "bio=This is a bio"\
    --form "photo=@/tmp/php3k853rkbbn29cBLkiDI" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/users/me"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('username', 'johndoe');
body.append('first_name', 'John');
body.append('last_name', 'Doe');
body.append('email', 'johndoe@gmail.com');
body.append('country', 'United States');
body.append('bio', 'This is a bio');
body.append('photo', document.querySelector('input[name="photo"]').files[0]);

fetch(url, {
    method: "PUT",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-users-me">
            <blockquote>
            <p>Example response (200, Success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 97,
        &quot;username&quot;: &quot;weissnat.einar&quot;,
        &quot;first_name&quot;: &quot;Melissa&quot;,
        &quot;last_name&quot;: &quot;Johnson&quot;,
        &quot;email&quot;: &quot;rosamond45@example.com&quot;,
        &quot;country&quot;: &quot;Greenland&quot;,
        &quot;bio&quot;: &quot;Et maxime qui voluptates tenetur tenetur voluptas. Explicabo ipsum consequatur dolor sed rerum repellendus voluptatem est. Dignissimos et repellendus exercitationem corrupti enim exercitationem. Delectus totam nostrum quibusdam placeat.&quot;,
        &quot;photo&quot;: &quot;https://via.placeholder.com/640x480.png/007733?text=saepe&quot;,
        &quot;artist_verified_at&quot;: &quot;2025-02-12 17:06:39&quot;,
        &quot;email_verified_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;,
        &quot;role&quot;: &quot;artist&quot;,
        &quot;created_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-02-12T17:06:39.000000Z&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (401, Unauthenticated):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (403, Unauthorized):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;You are not authorized to update this user.&quot;,
    &quot;status&quot;: 403
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-v1-users-me" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-users-me"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-users-me"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-users-me" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-users-me">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-users-me" data-method="PUT"
      data-path="api/v1/users/me"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-users-me', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-users-me"
                    onclick="tryItOut('PUTapi-v1-users-me');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-users-me"
                    onclick="cancelTryOut('PUTapi-v1-users-me');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-users-me"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/users/me</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-v1-users-me"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-users-me"
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
                              name="Accept"                data-endpoint="PUTapi-v1-users-me"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>username</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="username"                data-endpoint="PUTapi-v1-users-me"
               value="johndoe"
               data-component="body">
    <br>
<p>The username of the user. Must be at least 10 characters. Must not be greater than 255 characters. Example: <code>johndoe</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>first_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="first_name"                data-endpoint="PUTapi-v1-users-me"
               value="John"
               data-component="body">
    <br>
<p>The first name of the user. Must be at least 10 characters. Must not be greater than 255 characters. Example: <code>John</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>last_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="last_name"                data-endpoint="PUTapi-v1-users-me"
               value="Doe"
               data-component="body">
    <br>
<p>The last name of the user. Must be at least 10 characters. Must not be greater than 255 characters. Example: <code>Doe</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="PUTapi-v1-users-me"
               value="johndoe@gmail.com"
               data-component="body">
    <br>
<p>The email of the user. Must be a valid email address. Example: <code>johndoe@gmail.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>country</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="country"                data-endpoint="PUTapi-v1-users-me"
               value="United States"
               data-component="body">
    <br>
<p>The country of the user. Must be at least 10 characters. Must not be greater than 255 characters. Example: <code>United States</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>bio</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="bio"                data-endpoint="PUTapi-v1-users-me"
               value="This is a bio"
               data-component="body">
    <br>
<p>The bio of the user. Example: <code>This is a bio</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>photo</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="file" style="display: none"
                              name="photo"                data-endpoint="PUTapi-v1-users-me"
               value=""
               data-component="body">
    <br>
<p>The photo of the user. Must be an image. Must not be greater than 2048 kilobytes. Example: <code>/tmp/php3k853rkbbn29cBLkiDI</code></p>
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
