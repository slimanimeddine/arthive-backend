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
                                                                                <li class="tocify-item level-2" data-unique="artworks-GETapi-v1-users-me-artworks">
                                <a href="#artworks-GETapi-v1-users-me-artworks">List Authenticated User Artworks</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="artworks-GETapi-v1-users--username--artworks">
                                <a href="#artworks-GETapi-v1-users--username--artworks">List User Published Artworks</a>
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
                                                    <li class="tocify-item level-2" data-unique="authentication-POSTapi-v1-sign-up">
                                <a href="#authentication-POSTapi-v1-sign-up">Sign Up</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentication-POSTapi-v1-sign-in">
                                <a href="#authentication-POSTapi-v1-sign-in">Sign In</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentication-POSTapi-v1-sign-out">
                                <a href="#authentication-POSTapi-v1-sign-out">Sign Out</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentication-POSTapi-v1-reset-password">
                                <a href="#authentication-POSTapi-v1-reset-password">Reset Password</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentication-POSTapi-v1-admin-sign-in">
                                <a href="#authentication-POSTapi-v1-admin-sign-in">Admin Sign In</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-countries" class="tocify-header">
                <li class="tocify-item level-1" data-unique="countries">
                    <a href="#countries">Countries</a>
                </li>
                                    <ul id="tocify-subheader-countries" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="countries-GETapi-v1-countries">
                                <a href="#countries-GETapi-v1-countries">List Countries</a>
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
                                                                                <li class="tocify-item level-2" data-unique="favorites-POSTapi-v1-artworks--artworkId--favorites">
                                <a href="#favorites-POSTapi-v1-artworks--artworkId--favorites">Mark Artwork As Favorite</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="favorites-DELETEapi-v1-artworks--artworkId--favorites">
                                <a href="#favorites-DELETEapi-v1-artworks--artworkId--favorites">Remove Artwork From Favorites</a>
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
                                                                                <li class="tocify-item level-2" data-unique="users-GETapi-v1-users-me">
                                <a href="#users-GETapi-v1-users-me">Show Authenticated User</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="users-GETapi-v1-users--username-">
                                <a href="#users-GETapi-v1-users--username-">Show User</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="users-POSTapi-v1-users-me">
                                <a href="#users-POSTapi-v1-users-me">Update Authenticated User</a>
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
        <li>Last updated: February 17, 2025</li>
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
            &quot;id&quot;: 99,
            &quot;user_id&quot;: 320,
            &quot;status&quot;: &quot;rejected&quot;,
            &quot;reason&quot;: &quot;Id ut deleniti qui dolore qui reprehenderit dolorem. Accusamus est eaque ut sequi perspiciatis. Nisi libero dolor expedita sit quia et. Repellat ex dolores debitis assumenda sint accusamus sunt.&quot;,
            &quot;created_at&quot;: &quot;2025-02-17T17:08:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-17T17:08:10.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 320,
                &quot;username&quot;: &quot;altenwerth.jaclyn&quot;,
                &quot;first_name&quot;: &quot;Lauretta&quot;,
                &quot;last_name&quot;: &quot;Bogisich&quot;,
                &quot;email&quot;: &quot;lmurazik@example.org&quot;,
                &quot;country&quot;: &quot;Chile&quot;,
                &quot;bio&quot;: &quot;Dolores mollitia qui dolores possimus quaerat explicabo assumenda. Itaque et incidunt dignissimos ut natus tenetur quis. Et saepe velit quos vel voluptate unde. Voluptate deserunt quibusdam dicta ipsam rem.&quot;,
                &quot;photo&quot;: null,
                &quot;artist_verified_at&quot;: &quot;2025-02-17 17:08:10&quot;,
                &quot;email_verified_at&quot;: null,
                &quot;role&quot;: &quot;artist&quot;,
                &quot;created_at&quot;: &quot;2025-02-17T17:08:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-02-17T17:08:10.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 100,
            &quot;user_id&quot;: 321,
            &quot;status&quot;: &quot;pending&quot;,
            &quot;reason&quot;: &quot;Velit voluptate debitis aspernatur qui neque eos hic sit. Consequuntur voluptatibus quam repellendus tempore necessitatibus. Assumenda porro adipisci molestiae dolores velit voluptatum aspernatur. Adipisci ex dignissimos consequatur sit nihil.&quot;,
            &quot;created_at&quot;: &quot;2025-02-17T17:08:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-17T17:08:10.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 321,
                &quot;username&quot;: &quot;edaugherty&quot;,
                &quot;first_name&quot;: &quot;Wilfrid&quot;,
                &quot;last_name&quot;: &quot;McCullough&quot;,
                &quot;email&quot;: &quot;coralie74@example.com&quot;,
                &quot;country&quot;: &quot;Namibia&quot;,
                &quot;bio&quot;: &quot;Ut animi omnis exercitationem temporibus dolorum. Laborum iste quos sequi asperiores qui deleniti quae dolor. Dignissimos accusantium sed non odio quod quos.&quot;,
                &quot;photo&quot;: &quot;artwork-seeding-photos/3.jpeg&quot;,
                &quot;artist_verified_at&quot;: null,
                &quot;email_verified_at&quot;: &quot;2025-02-17T17:08:10.000000Z&quot;,
                &quot;role&quot;: &quot;artist&quot;,
                &quot;created_at&quot;: &quot;2025-02-17T17:08:10.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-02-17T17:08:10.000000Z&quot;
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
        &quot;id&quot;: 101,
        &quot;user_id&quot;: 322,
        &quot;status&quot;: &quot;approved&quot;,
        &quot;reason&quot;: &quot;Tempora aut unde similique ut sit. Et dolorem deleniti deserunt sed suscipit id omnis. Atque laboriosam deleniti rerum voluptas. Similique facilis minus rerum veniam.&quot;,
        &quot;created_at&quot;: &quot;2025-02-17T17:08:10.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-02-17T17:08:10.000000Z&quot;
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
    "http://localhost:8000/api/v1/artist-verification-requests/ipsa" \
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
    "http://localhost:8000/api/v1/artist-verification-requests/ipsa"
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
        &quot;id&quot;: 102,
        &quot;user_id&quot;: 323,
        &quot;status&quot;: &quot;rejected&quot;,
        &quot;reason&quot;: &quot;Provident illum assumenda voluptatibus sed et dolorem. Quam repudiandae enim praesentium sed occaecati perspiciatis voluptatum natus. Itaque repudiandae minus totam dolores ut temporibus sed quisquam. Et autem voluptas fuga magnam ut.&quot;,
        &quot;created_at&quot;: &quot;2025-02-17T17:08:10.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-02-17T17:08:10.000000Z&quot;
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
               value="ipsa"
               data-component="url">
    <br>
<p>The ID of the artist verification request to review. Example: <code>ipsa</code></p>
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
    "http://localhost:8000/api/v1/artworks/3/artwork-comments" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"comment_text\": \"enim\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artworks/3/artwork-comments"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "comment_text": "enim"
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
        &quot;id&quot;: 343,
        &quot;comment_text&quot;: &quot;Perspiciatis repellendus neque id autem repellat culpa dolorem eum.&quot;,
        &quot;artwork_id&quot;: 256,
        &quot;user_id&quot;: 314,
        &quot;created_at&quot;: &quot;2025-02-17T17:08:10.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-02-17T17:08:10.000000Z&quot;
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
               value="3"
               data-component="url">
    <br>
<p>The ID of the artwork to comment on Example: <code>3</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>comment_text</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="comment_text"                data-endpoint="POSTapi-v1-artworks--artworkId--artwork-comments"
               value="enim"
               data-component="body">
    <br>
<p>The text of the comment Example: <code>enim</code></p>
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
    "http://localhost:8000/api/v1/artwork-comments/6" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artwork-comments/6"
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
               value="6"
               data-component="url">
    <br>
<p>The ID of the comment to delete Example: <code>6</code></p>
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
    "http://localhost:8000/api/v1/artwork-comments/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"comment_text\": \"porro\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artwork-comments/17"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "comment_text": "porro"
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
        &quot;id&quot;: 344,
        &quot;comment_text&quot;: &quot;Quaerat qui rerum alias magnam explicabo ut.&quot;,
        &quot;artwork_id&quot;: 257,
        &quot;user_id&quot;: 316,
        &quot;created_at&quot;: &quot;2025-02-17T17:08:10.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-02-17T17:08:10.000000Z&quot;
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
               value="17"
               data-component="url">
    <br>
<p>The ID of the comment to update Example: <code>17</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>comment_text</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="comment_text"                data-endpoint="PUTapi-v1-artwork-comments--artworkCommentId-"
               value="porro"
               data-component="body">
    <br>
<p>The text of the comment Example: <code>porro</code></p>
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
    --get "http://localhost:8000/api/v1/users/dolore/artwork-likes/received/count/by-tag" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/users/dolore/artwork-likes/received/count/by-tag"
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
               value="dolore"
               data-component="url">
    <br>
<p>The username of the user Example: <code>dolore</code></p>
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
    --get "http://localhost:8000/api/v1/users/eveniet/artwork-likes/received/count" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/users/eveniet/artwork-likes/received/count"
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
               value="eveniet"
               data-component="url">
    <br>
<p>The username of the user Example: <code>eveniet</code></p>
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
    "http://localhost:8000/api/v1/artworks/6/artwork-likes" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artworks/6/artwork-likes"
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
        &quot;id&quot;: 1142,
        &quot;artwork_id&quot;: 255,
        &quot;user_id&quot;: 312,
        &quot;created_at&quot;: &quot;2025-02-17T17:08:10.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-02-17T17:08:10.000000Z&quot;
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
               value="6"
               data-component="url">
    <br>
<p>The ID of the artwork to like Example: <code>6</code></p>
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
    "http://localhost:8000/api/v1/artworks/14/artwork-likes" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artworks/14/artwork-likes"
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
               value="14"
               data-component="url">
    <br>
<p>The ID of the artwork to unlike Example: <code>14</code></p>
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
    "http://localhost:8000/api/v1/artworks/2/artwork-photos" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "photos[]=@/tmp/phpbvom8g16qjc6bIphndi" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artworks/2/artwork-photos"
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
            &quot;id&quot;: 529,
            &quot;path&quot;: &quot;artwork-seeding-photos/17.jpeg&quot;,
            &quot;is_main&quot;: 0,
            &quot;artwork_id&quot;: 258,
            &quot;created_at&quot;: &quot;2025-02-17T17:08:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-17T17:08:10.000000Z&quot;
        },
        {
            &quot;id&quot;: 530,
            &quot;path&quot;: &quot;artwork-seeding-photos/38.jpeg&quot;,
            &quot;is_main&quot;: 0,
            &quot;artwork_id&quot;: 259,
            &quot;created_at&quot;: &quot;2025-02-17T17:08:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-17T17:08:10.000000Z&quot;
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
               value="2"
               data-component="url">
    <br>
<p>The id of the artwork Example: <code>2</code></p>
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
    "http://localhost:8000/api/v1/artwork-photos/16" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artwork-photos/16"
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
        &quot;id&quot;: 531,
        &quot;path&quot;: &quot;artwork-seeding-photos/32.jpeg&quot;,
        &quot;is_main&quot;: 0,
        &quot;artwork_id&quot;: 260,
        &quot;created_at&quot;: &quot;2025-02-17T17:08:10.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-02-17T17:08:10.000000Z&quot;
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
               value="16"
               data-component="url">
    <br>
<p>The id of the artwork photo Example: <code>16</code></p>
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
    "http://localhost:8000/api/v1/artwork-photos/6" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artwork-photos/6"
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
               value="6"
               data-component="url">
    <br>
<p>The id of the artwork photo Example: <code>6</code></p>
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
    --get "http://localhost:8000/api/v1/users/provident/artwork-tags" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/users/provident/artwork-tags"
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
               value="provident"
               data-component="url">
    <br>
<p>The username of the user Example: <code>provident</code></p>
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
            &quot;id&quot;: 36,
            &quot;name&quot;: &quot;Dr. Kara Larkin&quot;,
            &quot;created_at&quot;: &quot;2025-02-17T17:08:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-17T17:08:10.000000Z&quot;
        },
        {
            &quot;id&quot;: 37,
            &quot;name&quot;: &quot;Mr. Tristian Deckow&quot;,
            &quot;created_at&quot;: &quot;2025-02-17T17:08:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-17T17:08:10.000000Z&quot;
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
    --get "http://localhost:8000/api/v1/artworks?filter%5Btag%5D=graphic&amp;searchQuery=lorem&amp;sort=trending&amp;page=1&amp;perPage=10" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artworks"
);

const params = {
    "filter[tag]": "graphic",
    "searchQuery": "lorem",
    "sort": "trending",
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
            &quot;id&quot;: 243,
            &quot;title&quot;: &quot;Nemo quidem enim quibusdam.&quot;,
            &quot;description&quot;: &quot;Quia delectus rerum quaerat corporis. Ducimus iure ab exercitationem soluta illo et vero. Qui est et dolorum quos aut dolorem.&quot;,
            &quot;status&quot;: &quot;draft&quot;,
            &quot;user_id&quot;: 286,
            &quot;created_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: null,
            &quot;user&quot;: {
                &quot;id&quot;: 286,
                &quot;username&quot;: &quot;volkman.rickey&quot;,
                &quot;first_name&quot;: &quot;Rosetta&quot;,
                &quot;last_name&quot;: &quot;Lesch&quot;,
                &quot;email&quot;: &quot;jazmyn47@example.org&quot;,
                &quot;country&quot;: &quot;Suriname&quot;,
                &quot;bio&quot;: &quot;Illum optio et impedit illo vel vitae. Sunt eius quis explicabo impedit quis labore facilis ullam.&quot;,
                &quot;photo&quot;: null,
                &quot;artist_verified_at&quot;: null,
                &quot;email_verified_at&quot;: &quot;2025-02-17T17:08:08.000000Z&quot;,
                &quot;role&quot;: &quot;artist&quot;,
                &quot;created_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 244,
            &quot;title&quot;: &quot;Est quia est tempore.&quot;,
            &quot;description&quot;: &quot;Repellat dolorem perferendis harum impedit dicta et sit. Aut dolores nostrum laudantium molestias. Et aperiam quod est architecto maxime animi.&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;user_id&quot;: 287,
            &quot;created_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: null,
            &quot;user&quot;: {
                &quot;id&quot;: 287,
                &quot;username&quot;: &quot;bashirian.priscilla&quot;,
                &quot;first_name&quot;: &quot;Anabel&quot;,
                &quot;last_name&quot;: &quot;Abshire&quot;,
                &quot;email&quot;: &quot;schaden.christiana@example.com&quot;,
                &quot;country&quot;: &quot;Belgium&quot;,
                &quot;bio&quot;: &quot;Iste vel qui voluptas. Quam ullam est reiciendis in dolores facere eum perspiciatis. Fuga ipsa ipsa eum quibusdam blanditiis iure.&quot;,
                &quot;photo&quot;: null,
                &quot;artist_verified_at&quot;: null,
                &quot;email_verified_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
                &quot;role&quot;: &quot;artist&quot;,
                &quot;created_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;
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
               value="graphic"
               data-component="query">
    <br>
<p>Filter artworks by tag. Example: <code>graphic</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>painting</code></li> <li><code>graphic</code></li> <li><code>sculpture</code></li> <li><code>folk art</code></li> <li><code>textile</code></li> <li><code>ceramics</code></li> <li><code>stained glass windows</code></li> <li><code>beads</code></li> <li><code>paper</code></li> <li><code>glass</code></li> <li><code>dolls</code></li> <li><code>jewellery</code></li> <li><code>fresco</code></li> <li><code>metal</code></li> <li><code>mosaic</code></li></ul>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>searchQuery</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="searchQuery"                data-endpoint="GETapi-v1-artworks"
               value="lorem"
               data-component="query">
    <br>
<p>Search for artworks by title or description. Example: <code>lorem</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="sort"                data-endpoint="GETapi-v1-artworks"
               value="trending"
               data-component="query">
    <br>
<p>Sort artworks. Example: <code>trending</code></p>
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
    --get "http://localhost:8000/api/v1/artworks/16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artworks/16"
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
            &quot;id&quot;: 245,
            &quot;title&quot;: &quot;Omnis eum illum qui.&quot;,
            &quot;description&quot;: &quot;Consequatur voluptas nobis vel nesciunt doloribus accusantium veniam. Ad enim adipisci exercitationem maiores aut fugit id. Accusantium minima animi dolorum quia sed deserunt. Rem debitis fuga sit recusandae cumque sequi.&quot;,
            &quot;status&quot;: &quot;draft&quot;,
            &quot;user_id&quot;: 288,
            &quot;created_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 1,
            &quot;artwork_comments_count&quot;: 1,
            &quot;artwork_main_photo_path&quot;: null,
            &quot;user&quot;: {
                &quot;id&quot;: 288,
                &quot;username&quot;: &quot;anthony19&quot;,
                &quot;first_name&quot;: &quot;Precious&quot;,
                &quot;last_name&quot;: &quot;Lubowitz&quot;,
                &quot;email&quot;: &quot;mflatley@example.com&quot;,
                &quot;country&quot;: &quot;Sweden&quot;,
                &quot;bio&quot;: &quot;Facilis quo saepe totam molestiae est quos similique corporis. Et explicabo omnis veniam velit molestias numquam. Enim at quo quae sit quasi voluptatem nemo. Aut voluptas repellat in est eveniet culpa repellat.&quot;,
                &quot;photo&quot;: null,
                &quot;artist_verified_at&quot;: null,
                &quot;email_verified_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
                &quot;role&quot;: &quot;artist&quot;,
                &quot;created_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;
            },
            &quot;artwork_photos&quot;: [
                {
                    &quot;id&quot;: 525,
                    &quot;path&quot;: &quot;artwork-seeding-photos/35.jpeg&quot;,
                    &quot;is_main&quot;: 0,
                    &quot;artwork_id&quot;: 245,
                    &quot;created_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;
                }
            ],
            &quot;artwork_comments&quot;: [
                {
                    &quot;id&quot;: 341,
                    &quot;comment_text&quot;: &quot;Aut itaque quae quaerat dolor deserunt.&quot;,
                    &quot;artwork_id&quot;: 245,
                    &quot;user_id&quot;: 289,
                    &quot;created_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
                    &quot;user&quot;: {
                        &quot;id&quot;: 289,
                        &quot;username&quot;: &quot;ntillman&quot;,
                        &quot;first_name&quot;: &quot;Kamren&quot;,
                        &quot;last_name&quot;: &quot;Hayes&quot;,
                        &quot;email&quot;: &quot;xdavis@example.com&quot;,
                        &quot;country&quot;: &quot;Maldives&quot;,
                        &quot;bio&quot;: &quot;Non sit tempore assumenda natus non. Magni iure maxime magnam voluptatum nostrum reiciendis. Qui repudiandae harum deleniti id at est nesciunt.&quot;,
                        &quot;photo&quot;: &quot;artwork-seeding-photos/24.jpeg&quot;,
                        &quot;artist_verified_at&quot;: null,
                        &quot;email_verified_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
                        &quot;role&quot;: &quot;artist&quot;,
                        &quot;created_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;
                    }
                }
            ],
            &quot;artwork_likes&quot;: [
                {
                    &quot;id&quot;: 1140,
                    &quot;artwork_id&quot;: 245,
                    &quot;user_id&quot;: 290,
                    &quot;created_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
                    &quot;user&quot;: {
                        &quot;id&quot;: 290,
                        &quot;username&quot;: &quot;walker.karl&quot;,
                        &quot;first_name&quot;: &quot;Gardner&quot;,
                        &quot;last_name&quot;: &quot;Cartwright&quot;,
                        &quot;email&quot;: &quot;marilie.harvey@example.com&quot;,
                        &quot;country&quot;: &quot;Iceland&quot;,
                        &quot;bio&quot;: &quot;Cupiditate porro officiis quam aut ad. Aliquid quia ut ex id fugit asperiores non repudiandae. Sunt in sed dolor sapiente voluptatem quia provident. Eos nemo animi aspernatur vitae. Et quidem suscipit cum.&quot;,
                        &quot;photo&quot;: null,
                        &quot;artist_verified_at&quot;: null,
                        &quot;email_verified_at&quot;: null,
                        &quot;role&quot;: &quot;artist&quot;,
                        &quot;created_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;
                    }
                }
            ],
            &quot;tags&quot;: [
                {
                    &quot;id&quot;: 32,
                    &quot;name&quot;: &quot;Mrs. Callie Littel MD&quot;,
                    &quot;created_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
                    &quot;pivot&quot;: {
                        &quot;artwork_id&quot;: 245,
                        &quot;tag_id&quot;: 32
                    }
                }
            ]
        },
        {
            &quot;id&quot;: 246,
            &quot;title&quot;: &quot;Veniam id a.&quot;,
            &quot;description&quot;: &quot;Maiores enim aut recusandae ducimus et eum eum voluptatem. Sed suscipit tempore enim tenetur magni et voluptatem. Laborum labore id sed excepturi accusantium fugit vel. Et repudiandae unde veniam quos vel sit delectus.&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;user_id&quot;: 291,
            &quot;created_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 1,
            &quot;artwork_comments_count&quot;: 1,
            &quot;artwork_main_photo_path&quot;: null,
            &quot;user&quot;: {
                &quot;id&quot;: 291,
                &quot;username&quot;: &quot;katelin55&quot;,
                &quot;first_name&quot;: &quot;Jacklyn&quot;,
                &quot;last_name&quot;: &quot;Friesen&quot;,
                &quot;email&quot;: &quot;ischmidt@example.org&quot;,
                &quot;country&quot;: &quot;Andorra&quot;,
                &quot;bio&quot;: &quot;A quia voluptatem asperiores at odit quia doloremque et. Mollitia pariatur veniam architecto quod atque. Et molestiae aut quae delectus voluptate voluptas. Dolore officiis eius rerum quod voluptas necessitatibus.&quot;,
                &quot;photo&quot;: &quot;artwork-seeding-photos/27.jpeg&quot;,
                &quot;artist_verified_at&quot;: null,
                &quot;email_verified_at&quot;: null,
                &quot;role&quot;: &quot;artist&quot;,
                &quot;created_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;
            },
            &quot;artwork_photos&quot;: [
                {
                    &quot;id&quot;: 526,
                    &quot;path&quot;: &quot;artwork-seeding-photos/40.jpeg&quot;,
                    &quot;is_main&quot;: 0,
                    &quot;artwork_id&quot;: 246,
                    &quot;created_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;
                }
            ],
            &quot;artwork_comments&quot;: [
                {
                    &quot;id&quot;: 342,
                    &quot;comment_text&quot;: &quot;Rem blanditiis est expedita quia vel.&quot;,
                    &quot;artwork_id&quot;: 246,
                    &quot;user_id&quot;: 292,
                    &quot;created_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
                    &quot;user&quot;: {
                        &quot;id&quot;: 292,
                        &quot;username&quot;: &quot;marguerite02&quot;,
                        &quot;first_name&quot;: &quot;Coty&quot;,
                        &quot;last_name&quot;: &quot;Runolfsdottir&quot;,
                        &quot;email&quot;: &quot;bmayert@example.org&quot;,
                        &quot;country&quot;: &quot;China&quot;,
                        &quot;bio&quot;: &quot;Nesciunt placeat quaerat cumque facilis. Modi est maiores non consequatur dolor quod fugit. Impedit aut sed qui voluptate ipsum eum. Velit omnis eaque dolores beatae.&quot;,
                        &quot;photo&quot;: null,
                        &quot;artist_verified_at&quot;: null,
                        &quot;email_verified_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
                        &quot;role&quot;: &quot;artist&quot;,
                        &quot;created_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;
                    }
                }
            ],
            &quot;artwork_likes&quot;: [
                {
                    &quot;id&quot;: 1141,
                    &quot;artwork_id&quot;: 246,
                    &quot;user_id&quot;: 293,
                    &quot;created_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
                    &quot;user&quot;: {
                        &quot;id&quot;: 293,
                        &quot;username&quot;: &quot;nakia32&quot;,
                        &quot;first_name&quot;: &quot;Marlene&quot;,
                        &quot;last_name&quot;: &quot;Reichert&quot;,
                        &quot;email&quot;: &quot;imogene79@example.com&quot;,
                        &quot;country&quot;: &quot;Turkey&quot;,
                        &quot;bio&quot;: &quot;Facilis dolore laudantium explicabo sunt omnis blanditiis. Corrupti sit omnis dolores tempore ex ratione. A eaque et laborum dicta facere delectus. Vel nam tempore saepe id neque sunt.&quot;,
                        &quot;photo&quot;: &quot;artwork-seeding-photos/9.jpeg&quot;,
                        &quot;artist_verified_at&quot;: &quot;2025-02-17 17:08:09&quot;,
                        &quot;email_verified_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
                        &quot;role&quot;: &quot;artist&quot;,
                        &quot;created_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;
                    }
                }
            ],
            &quot;tags&quot;: [
                {
                    &quot;id&quot;: 33,
                    &quot;name&quot;: &quot;Abraham Jaskolski&quot;,
                    &quot;created_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
                    &quot;pivot&quot;: {
                        &quot;artwork_id&quot;: 246,
                        &quot;tag_id&quot;: 33
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
               value="16"
               data-component="url">
    <br>
<p>The id of the artwork Example: <code>16</code></p>
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
    --get "http://localhost:8000/api/v1/users/me/artworks?filter%5Bstatus%5D=published&amp;page=1&amp;perPage=10" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/users/me/artworks"
);

const params = {
    "filter[status]": "published",
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
            &quot;id&quot;: 247,
            &quot;title&quot;: &quot;Doloribus nisi cupiditate.&quot;,
            &quot;description&quot;: &quot;Dolorem reiciendis voluptates consequatur. Eligendi iure eos nisi doloremque at. Beatae impedit atque incidunt placeat nam. Laudantium vero sed incidunt pariatur.&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;user_id&quot;: 294,
            &quot;created_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: null,
            &quot;artwork_photos&quot;: [
                {
                    &quot;id&quot;: 527,
                    &quot;path&quot;: &quot;artwork-seeding-photos/39.jpeg&quot;,
                    &quot;is_main&quot;: 0,
                    &quot;artwork_id&quot;: 247,
                    &quot;created_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;
                }
            ],
            &quot;tags&quot;: [
                {
                    &quot;id&quot;: 34,
                    &quot;name&quot;: &quot;Lucienne Quitzon&quot;,
                    &quot;created_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
                    &quot;pivot&quot;: {
                        &quot;artwork_id&quot;: 247,
                        &quot;tag_id&quot;: 34
                    }
                }
            ]
        },
        {
            &quot;id&quot;: 248,
            &quot;title&quot;: &quot;Sequi eum omnis.&quot;,
            &quot;description&quot;: &quot;Hic sed voluptas aspernatur officia. Blanditiis harum necessitatibus sint minima. Sequi accusantium ipsa inventore et rerum. Molestiae et provident ut autem quis maxime.&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;user_id&quot;: 295,
            &quot;created_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: null,
            &quot;artwork_photos&quot;: [
                {
                    &quot;id&quot;: 528,
                    &quot;path&quot;: &quot;artwork-seeding-photos/37.jpeg&quot;,
                    &quot;is_main&quot;: 0,
                    &quot;artwork_id&quot;: 248,
                    &quot;created_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;
                }
            ],
            &quot;tags&quot;: [
                {
                    &quot;id&quot;: 35,
                    &quot;name&quot;: &quot;Madisen Wuckert&quot;,
                    &quot;created_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
                    &quot;pivot&quot;: {
                        &quot;artwork_id&quot;: 248,
                        &quot;tag_id&quot;: 35
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
               value="published"
               data-component="query">
    <br>
<p>Filter artworks by status. Example: <code>published</code></p>
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

                    <h2 id="artworks-GETapi-v1-users--username--artworks">List User Published Artworks</h2>

<p>
</p>

<p>Retrieve a list of artworks published by a user</p>

<span id="example-requests-GETapi-v1-users--username--artworks">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/users/soluta/artworks?filter%5Btag%5D=graphic&amp;page=1&amp;perPage=10" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/users/soluta/artworks"
);

const params = {
    "filter[tag]": "graphic",
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
            &quot;id&quot;: 249,
            &quot;title&quot;: &quot;Dolore possimus a.&quot;,
            &quot;description&quot;: &quot;Molestiae debitis sed occaecati nobis omnis qui maiores. Voluptatibus eveniet eveniet hic omnis assumenda similique reprehenderit. Tempora aliquid nulla omnis fuga deserunt voluptatem quod. Sit deleniti et corporis neque accusantium veniam velit recusandae.&quot;,
            &quot;status&quot;: &quot;draft&quot;,
            &quot;user_id&quot;: 296,
            &quot;created_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: null
        },
        {
            &quot;id&quot;: 250,
            &quot;title&quot;: &quot;Iste omnis nihil qui.&quot;,
            &quot;description&quot;: &quot;Aut eius illo vitae aut. Impedit nesciunt molestias enim ea fugit. Omnis quisquam et commodi doloribus maiores. Voluptates maxime minus modi voluptates.&quot;,
            &quot;status&quot;: &quot;draft&quot;,
            &quot;user_id&quot;: 297,
            &quot;created_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
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
               value="soluta"
               data-component="url">
    <br>
<p>The username of the user Example: <code>soluta</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>filter[tag]</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="filter[tag]"                data-endpoint="GETapi-v1-users--username--artworks"
               value="graphic"
               data-component="query">
    <br>
<p>Filter artworks by tag. Example: <code>graphic</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>painting</code></li> <li><code>graphic</code></li> <li><code>sculpture</code></li> <li><code>folk art</code></li> <li><code>textile</code></li> <li><code>ceramics</code></li> <li><code>stained glass windows</code></li> <li><code>beads</code></li> <li><code>paper</code></li> <li><code>glass</code></li> <li><code>dolls</code></li> <li><code>jewellery</code></li> <li><code>fresco</code></li> <li><code>metal</code></li> <li><code>mosaic</code></li></ul>
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
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"title\": \"Artwork Title\",
    \"description\": \"This is an artwork description\",
    \"tags\": [
        \"abstract\"
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artworks"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "Artwork Title",
    "description": "This is an artwork description",
    "tags": [
        "abstract"
    ]
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-artworks">
            <blockquote>
            <p>Example response (200, Success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 251,
        &quot;title&quot;: &quot;Aut consequatur eaque occaecati.&quot;,
        &quot;description&quot;: &quot;Officia est debitis autem harum qui aut ea. Nihil reprehenderit quo et beatae id nostrum. Perspiciatis eaque expedita qui natus ut perferendis nesciunt dolorum.&quot;,
        &quot;status&quot;: &quot;published&quot;,
        &quot;user_id&quot;: 298,
        &quot;created_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
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
      data-hasfiles="0"
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
                              name="Accept"                data-endpoint="POSTapi-v1-artworks"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
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
<p>The tag of the artwork. The <code>name</code> of an existing record in the tags table.</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>photos</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
<br>
<p>The photos of the artwork.</p>
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
<p>The file of the photo. Must be an image. Must not be greater than 2048 kilobytes. Example: <code>/tmp/phpi7fhg1ipuba16oAJaJH</code></p>
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
    "http://localhost:8000/api/v1/artworks/5" \
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
    "http://localhost:8000/api/v1/artworks/5"
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
        &quot;id&quot;: 252,
        &quot;title&quot;: &quot;Natus soluta vitae.&quot;,
        &quot;description&quot;: &quot;Et quo a quod eveniet. Nulla dolorem iusto qui quidem inventore. Dolores omnis nesciunt quia vel sint architecto ipsam repellendus.&quot;,
        &quot;status&quot;: &quot;published&quot;,
        &quot;user_id&quot;: 299,
        &quot;created_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
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
               value="5"
               data-component="url">
    <br>
<p>The id of the artwork Example: <code>5</code></p>
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
<p>The title of the artwork. Must not be greater than 255 characters. Example: <code>Artwork Title</code></p>
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
<p>The tag of the artwork. The <code>name</code> of an existing record in the tags table.</p>
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
    "http://localhost:8000/api/v1/artworks/2" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artworks/2"
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
               value="2"
               data-component="url">
    <br>
<p>The id of the artwork Example: <code>2</code></p>
            </div>
                    </form>

                <h1 id="authentication">Authentication</h1>

    

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

                    <h2 id="authentication-POSTapi-v1-reset-password">Reset Password</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Resets the password of the authenticated user</p>

<span id="example-requests-POSTapi-v1-reset-password">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/v1/reset-password" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"current_password\": \"password\",
    \"new_password\": \"new_password\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/reset-password"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "current_password": "password",
    "new_password": "new_password"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-reset-password">
            <blockquote>
            <p>Example response (200, Success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Password updated successfully&quot;,
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
<span id="execution-results-POSTapi-v1-reset-password" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-reset-password"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-reset-password"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-reset-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-reset-password">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-reset-password" data-method="POST"
      data-path="api/v1/reset-password"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-reset-password', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-reset-password"
                    onclick="tryItOut('POSTapi-v1-reset-password');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-reset-password"
                    onclick="cancelTryOut('POSTapi-v1-reset-password');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-reset-password"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/reset-password</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-v1-reset-password"
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
                              name="Content-Type"                data-endpoint="POSTapi-v1-reset-password"
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
                              name="Accept"                data-endpoint="POSTapi-v1-reset-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>current_password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="current_password"                data-endpoint="POSTapi-v1-reset-password"
               value="password"
               data-component="body">
    <br>
<p>The current password of the user. Example: <code>password</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>new_password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="new_password"                data-endpoint="POSTapi-v1-reset-password"
               value="new_password"
               data-component="body">
    <br>
<p>The new password of the user. Must be at least 8 characters. Example: <code>new_password</code></p>
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

                <h1 id="countries">Countries</h1>

    

                                <h2 id="countries-GETapi-v1-countries">List Countries</h2>

<p>
</p>

<p>Retrieve a list of countries</p>

<span id="example-requests-GETapi-v1-countries">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/countries" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/countries"
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

<span id="example-responses-GETapi-v1-countries">
            <blockquote>
            <p>Example response (200, Success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 249,
            &quot;name&quot;: &quot;Monaco&quot;,
            &quot;created_at&quot;: &quot;2025-02-17T17:08:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-17T17:08:10.000000Z&quot;
        },
        {
            &quot;id&quot;: 250,
            &quot;name&quot;: &quot;Philippines&quot;,
            &quot;created_at&quot;: &quot;2025-02-17T17:08:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-17T17:08:10.000000Z&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-countries" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-countries"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-countries"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-countries" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-countries">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-countries" data-method="GET"
      data-path="api/v1/countries"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-countries', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-countries"
                    onclick="tryItOut('GETapi-v1-countries');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-countries"
                    onclick="cancelTryOut('GETapi-v1-countries');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-countries"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/countries</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-countries"
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
                              name="Accept"                data-endpoint="GETapi-v1-countries"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
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
            &quot;id&quot;: 261,
            &quot;title&quot;: &quot;Fugiat perspiciatis modi ut.&quot;,
            &quot;description&quot;: &quot;Quisquam occaecati est officiis aliquam. Eligendi sed corporis cumque blanditiis. Cupiditate iusto perspiciatis ab voluptatum rerum.&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;user_id&quot;: 324,
            &quot;created_at&quot;: &quot;2025-02-17T17:08:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-17T17:08:10.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: null,
            &quot;artwork_photos&quot;: [
                {
                    &quot;id&quot;: 532,
                    &quot;path&quot;: &quot;artwork-seeding-photos/3.jpeg&quot;,
                    &quot;is_main&quot;: 0,
                    &quot;artwork_id&quot;: 261,
                    &quot;created_at&quot;: &quot;2025-02-17T17:08:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-02-17T17:08:10.000000Z&quot;
                }
            ],
            &quot;tags&quot;: [
                {
                    &quot;id&quot;: 38,
                    &quot;name&quot;: &quot;Magali Ankunding II&quot;,
                    &quot;created_at&quot;: &quot;2025-02-17T17:08:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-02-17T17:08:10.000000Z&quot;,
                    &quot;pivot&quot;: {
                        &quot;artwork_id&quot;: 261,
                        &quot;tag_id&quot;: 38
                    }
                }
            ]
        },
        {
            &quot;id&quot;: 262,
            &quot;title&quot;: &quot;Dolores fugit suscipit minima.&quot;,
            &quot;description&quot;: &quot;Eaque magnam tempore officia vel. Dolores reprehenderit libero autem laboriosam odio. Itaque mollitia non sequi rerum non nostrum. Sit officiis et non ad quod iusto fuga nisi.&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;user_id&quot;: 325,
            &quot;created_at&quot;: &quot;2025-02-17T17:08:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-17T17:08:10.000000Z&quot;,
            &quot;artwork_likes_count&quot;: 0,
            &quot;artwork_comments_count&quot;: 0,
            &quot;artwork_main_photo_path&quot;: null,
            &quot;artwork_photos&quot;: [
                {
                    &quot;id&quot;: 533,
                    &quot;path&quot;: &quot;artwork-seeding-photos/2.jpeg&quot;,
                    &quot;is_main&quot;: 0,
                    &quot;artwork_id&quot;: 262,
                    &quot;created_at&quot;: &quot;2025-02-17T17:08:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-02-17T17:08:10.000000Z&quot;
                }
            ],
            &quot;tags&quot;: [
                {
                    &quot;id&quot;: 39,
                    &quot;name&quot;: &quot;Conner Ebert MD&quot;,
                    &quot;created_at&quot;: &quot;2025-02-17T17:08:10.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-02-17T17:08:10.000000Z&quot;,
                    &quot;pivot&quot;: {
                        &quot;artwork_id&quot;: 262,
                        &quot;tag_id&quot;: 39
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

                    <h2 id="favorites-POSTapi-v1-artworks--artworkId--favorites">Mark Artwork As Favorite</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Mark an artwork as favorite</p>

<span id="example-requests-POSTapi-v1-artworks--artworkId--favorites">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/v1/artworks/4/favorites" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artworks/4/favorites"
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

<span id="example-responses-POSTapi-v1-artworks--artworkId--favorites">
            <blockquote>
            <p>Example response (200, Success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 1148,
        &quot;artwork_id&quot;: 263,
        &quot;user_id&quot;: 327,
        &quot;created_at&quot;: &quot;2025-02-17T17:08:10.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-02-17T17:08:10.000000Z&quot;
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
    &quot;message&quot;: &quot;You are not authorized to mark as favorite this artwork.&quot;,
    &quot;status&quot;: 403
}</code>
 </pre>
            <blockquote>
            <p>Example response (404, Artwork not found):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;The artwork you are trying to mark as favorite does not exist.&quot;,
    &quot;status&quot;: 404
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-artworks--artworkId--favorites" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-artworks--artworkId--favorites"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-artworks--artworkId--favorites"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-artworks--artworkId--favorites" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-artworks--artworkId--favorites">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-artworks--artworkId--favorites" data-method="POST"
      data-path="api/v1/artworks/{artworkId}/favorites"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-artworks--artworkId--favorites', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-artworks--artworkId--favorites"
                    onclick="tryItOut('POSTapi-v1-artworks--artworkId--favorites');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-artworks--artworkId--favorites"
                    onclick="cancelTryOut('POSTapi-v1-artworks--artworkId--favorites');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-artworks--artworkId--favorites"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/artworks/{artworkId}/favorites</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-v1-artworks--artworkId--favorites"
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
                              name="Content-Type"                data-endpoint="POSTapi-v1-artworks--artworkId--favorites"
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
                              name="Accept"                data-endpoint="POSTapi-v1-artworks--artworkId--favorites"
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
               step="any"               name="artworkId"                data-endpoint="POSTapi-v1-artworks--artworkId--favorites"
               value="4"
               data-component="url">
    <br>
<p>The ID of the artwork to mark as favorite Example: <code>4</code></p>
            </div>
                    </form>

                    <h2 id="favorites-DELETEapi-v1-artworks--artworkId--favorites">Remove Artwork From Favorites</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Remove an artwork from favorites</p>

<span id="example-requests-DELETEapi-v1-artworks--artworkId--favorites">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/v1/artworks/16/favorites" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/artworks/16/favorites"
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

<span id="example-responses-DELETEapi-v1-artworks--artworkId--favorites">
            <blockquote>
            <p>Example response (200, Success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
     &#039;message&#039; =&gt; &#039;You have successfully removed this artwork from your favorites.&#039;,
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
    &quot;message&quot;: &quot;You are not authorized to remove from favorites this artwork.&quot;,
    &quot;status&quot;: 403
}</code>
 </pre>
            <blockquote>
            <p>Example response (404, Artwork not found):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;The artwork you are trying to remove from favorites does not exist.&quot;,
    &quot;status&quot;: 404
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-v1-artworks--artworkId--favorites" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-artworks--artworkId--favorites"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-artworks--artworkId--favorites"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-artworks--artworkId--favorites" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-artworks--artworkId--favorites">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-v1-artworks--artworkId--favorites" data-method="DELETE"
      data-path="api/v1/artworks/{artworkId}/favorites"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-artworks--artworkId--favorites', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-artworks--artworkId--favorites"
                    onclick="tryItOut('DELETEapi-v1-artworks--artworkId--favorites');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-artworks--artworkId--favorites"
                    onclick="cancelTryOut('DELETEapi-v1-artworks--artworkId--favorites');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-artworks--artworkId--favorites"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/artworks/{artworkId}/favorites</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-v1-artworks--artworkId--favorites"
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
                              name="Content-Type"                data-endpoint="DELETEapi-v1-artworks--artworkId--favorites"
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
                              name="Accept"                data-endpoint="DELETEapi-v1-artworks--artworkId--favorites"
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
               step="any"               name="artworkId"                data-endpoint="DELETEapi-v1-artworks--artworkId--favorites"
               value="16"
               data-component="url">
    <br>
<p>The ID of the artwork to remove from favorites Example: <code>16</code></p>
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
            &quot;id&quot;: 305,
            &quot;username&quot;: &quot;amaya42&quot;,
            &quot;first_name&quot;: &quot;Parker&quot;,
            &quot;last_name&quot;: &quot;Rolfson&quot;,
            &quot;email&quot;: &quot;hulda21@example.net&quot;,
            &quot;country&quot;: &quot;Jersey&quot;,
            &quot;bio&quot;: &quot;Sed veniam iste excepturi maiores aliquid rerum. Dolorum et totam consequatur dolorum neque. Adipisci eum est dolorem quisquam.&quot;,
            &quot;photo&quot;: null,
            &quot;artist_verified_at&quot;: null,
            &quot;email_verified_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
            &quot;role&quot;: &quot;artist&quot;,
            &quot;created_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;
        },
        {
            &quot;id&quot;: 306,
            &quot;username&quot;: &quot;margret45&quot;,
            &quot;first_name&quot;: &quot;Annabelle&quot;,
            &quot;last_name&quot;: &quot;Sporer&quot;,
            &quot;email&quot;: &quot;thomas97@example.com&quot;,
            &quot;country&quot;: &quot;Mauritania&quot;,
            &quot;bio&quot;: &quot;Molestias eveniet sunt veritatis officiis. Ad nisi nulla neque ea. Id corrupti quos quae et quo.&quot;,
            &quot;photo&quot;: &quot;artwork-seeding-photos/11.jpeg&quot;,
            &quot;artist_verified_at&quot;: &quot;2025-02-17 17:08:09&quot;,
            &quot;email_verified_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
            &quot;role&quot;: &quot;artist&quot;,
            &quot;created_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;
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
            &quot;id&quot;: 307,
            &quot;username&quot;: &quot;sschmidt&quot;,
            &quot;first_name&quot;: &quot;Margot&quot;,
            &quot;last_name&quot;: &quot;Grimes&quot;,
            &quot;email&quot;: &quot;idenesik@example.org&quot;,
            &quot;country&quot;: &quot;Guernsey&quot;,
            &quot;bio&quot;: &quot;Asperiores rerum ipsa assumenda voluptates consequatur totam. Facere blanditiis facilis pariatur dolores sed vel vero. Accusantium sapiente aut praesentium architecto. Accusamus aut quia quia facilis.&quot;,
            &quot;photo&quot;: &quot;artwork-seeding-photos/24.jpeg&quot;,
            &quot;artist_verified_at&quot;: null,
            &quot;email_verified_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
            &quot;role&quot;: &quot;artist&quot;,
            &quot;created_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;
        },
        {
            &quot;id&quot;: 308,
            &quot;username&quot;: &quot;conn.urban&quot;,
            &quot;first_name&quot;: &quot;Murl&quot;,
            &quot;last_name&quot;: &quot;Durgan&quot;,
            &quot;email&quot;: &quot;ddach@example.com&quot;,
            &quot;country&quot;: &quot;Tuvalu&quot;,
            &quot;bio&quot;: &quot;Sapiente qui nisi dicta at nulla ducimus. Rerum minus necessitatibus inventore pariatur est.&quot;,
            &quot;photo&quot;: &quot;artwork-seeding-photos/7.jpeg&quot;,
            &quot;artist_verified_at&quot;: null,
            &quot;email_verified_at&quot;: null,
            &quot;role&quot;: &quot;artist&quot;,
            &quot;created_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;
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
    "http://localhost:8000/api/v1/follows/users/7" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/follows/users/7"
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
        &quot;id&quot;: 1139,
        &quot;follower_id&quot;: 309,
        &quot;followed_id&quot;: 310,
        &quot;created_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;
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
               value="7"
               data-component="url">
    <br>
<p>The ID of the user to follow Example: <code>7</code></p>
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
    "http://localhost:8000/api/v1/follows/users/12" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/follows/users/12"
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
               value="12"
               data-component="url">
    <br>
<p>The ID of the user to unfollow Example: <code>12</code></p>
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
    --get "http://localhost:8000/api/v1/users/me/notifications?filter%5BnotificationType%5D=follow&amp;filter%5BreadStatus%5D=read&amp;page=1&amp;perPage=10" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/users/me/notifications"
);

const params = {
    "filter[notificationType]": "follow",
    "filter[readStatus]": "read",
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

<span id="example-responses-GETapi-v1-users-me-notifications">
            <blockquote>
            <p>Example response (200, Authenticated as admin):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;current_page&quot;: 1,
        &quot;data&quot;: [
            {
                &quot;id&quot;: &quot;1773d412-2e2e-4081-8cac-37c829f1b8f4&quot;,
                &quot;type&quot;: &quot;artist-verification-request&quot;,
                &quot;notifiable_type&quot;: &quot;App\\Models\\User&quot;,
                &quot;notifiable_id&quot;: 1,
                &quot;data&quot;: {
                    &quot;user&quot;: {
                        &quot;id&quot;: 196,
                        &quot;username&quot;: &quot;luigi.feeney&quot;
                    }
                },
                &quot;read_at&quot;: null,
                &quot;created_at&quot;: &quot;2025-02-17T14:12:35.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-02-17T14:12:35.000000Z&quot;
            },
            {
                &quot;id&quot;: &quot;8e65eefd-3680-497a-9552-92e11d634c64&quot;,
                &quot;type&quot;: &quot;artist-verification-request&quot;,
                &quot;notifiable_type&quot;: &quot;App\\Models\\User&quot;,
                &quot;notifiable_id&quot;: 1,
                &quot;data&quot;: {
                    &quot;user&quot;: {
                        &quot;id&quot;: 199,
                        &quot;username&quot;: &quot;alvah.gislason&quot;
                    }
                },
                &quot;read_at&quot;: null,
                &quot;created_at&quot;: &quot;2025-02-17T14:12:35.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-02-17T14:12:35.000000Z&quot;
            },
            {
                &quot;id&quot;: &quot;9b6f8486-f4db-418b-8bed-013d9fb53271&quot;,
                &quot;type&quot;: &quot;artist-verification-request&quot;,
                &quot;notifiable_type&quot;: &quot;App\\Models\\User&quot;,
                &quot;notifiable_id&quot;: 1,
                &quot;data&quot;: {
                    &quot;user&quot;: {
                        &quot;id&quot;: 192,
                        &quot;username&quot;: &quot;fkihn&quot;
                    }
                },
                &quot;read_at&quot;: null,
                &quot;created_at&quot;: &quot;2025-02-17T14:12:35.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-02-17T14:12:35.000000Z&quot;
            },
            {
                &quot;id&quot;: &quot;dc7d7aff-5c8f-4eca-8bfa-2664dd3141b0&quot;,
                &quot;type&quot;: &quot;artist-verification-request&quot;,
                &quot;notifiable_type&quot;: &quot;App\\Models\\User&quot;,
                &quot;notifiable_id&quot;: 1,
                &quot;data&quot;: {
                    &quot;user&quot;: {
                        &quot;id&quot;: 194,
                        &quot;username&quot;: &quot;udouglas&quot;
                    }
                },
                &quot;read_at&quot;: null,
                &quot;created_at&quot;: &quot;2025-02-17T14:12:35.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-02-17T14:12:35.000000Z&quot;
            },
            {
                &quot;id&quot;: &quot;e861a862-5d79-4791-85e5-acffd079b54f&quot;,
                &quot;type&quot;: &quot;artist-verification-request&quot;,
                &quot;notifiable_type&quot;: &quot;App\\Models\\User&quot;,
                &quot;notifiable_id&quot;: 1,
                &quot;data&quot;: {
                    &quot;user&quot;: {
                        &quot;id&quot;: 195,
                        &quot;username&quot;: &quot;roob.itzel&quot;
                    }
                },
                &quot;read_at&quot;: null,
                &quot;created_at&quot;: &quot;2025-02-17T14:12:35.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-02-17T14:12:35.000000Z&quot;
            },
            {
                &quot;id&quot;: &quot;00dd0d86-e262-497e-88d7-f5273964300c&quot;,
                &quot;type&quot;: &quot;artist-verification-request&quot;,
                &quot;notifiable_type&quot;: &quot;App\\Models\\User&quot;,
                &quot;notifiable_id&quot;: 1,
                &quot;data&quot;: {
                    &quot;user&quot;: {
                        &quot;id&quot;: 40,
                        &quot;username&quot;: &quot;bdavis&quot;
                    }
                },
                &quot;read_at&quot;: null,
                &quot;created_at&quot;: &quot;2025-02-17T14:12:34.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-02-17T14:12:34.000000Z&quot;
            },
            {
                &quot;id&quot;: &quot;098d612f-d71a-4b3b-bffd-f9f4c110cf6f&quot;,
                &quot;type&quot;: &quot;artist-verification-request&quot;,
                &quot;notifiable_type&quot;: &quot;App\\Models\\User&quot;,
                &quot;notifiable_id&quot;: 1,
                &quot;data&quot;: {
                    &quot;user&quot;: {
                        &quot;id&quot;: 51,
                        &quot;username&quot;: &quot;amir.will&quot;
                    }
                },
                &quot;read_at&quot;: null,
                &quot;created_at&quot;: &quot;2025-02-17T14:12:34.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-02-17T14:12:34.000000Z&quot;
            },
            {
                &quot;id&quot;: &quot;0adbfa94-283e-4584-a147-fe21c83addd7&quot;,
                &quot;type&quot;: &quot;artist-verification-request&quot;,
                &quot;notifiable_type&quot;: &quot;App\\Models\\User&quot;,
                &quot;notifiable_id&quot;: 1,
                &quot;data&quot;: {
                    &quot;user&quot;: {
                        &quot;id&quot;: 20,
                        &quot;username&quot;: &quot;aurore.kuvalis&quot;
                    }
                },
                &quot;read_at&quot;: null,
                &quot;created_at&quot;: &quot;2025-02-17T14:12:34.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-02-17T14:12:34.000000Z&quot;
            },
            {
                &quot;id&quot;: &quot;0d4d43ed-331c-40be-81db-e181f01f724d&quot;,
                &quot;type&quot;: &quot;artist-verification-request&quot;,
                &quot;notifiable_type&quot;: &quot;App\\Models\\User&quot;,
                &quot;notifiable_id&quot;: 1,
                &quot;data&quot;: {
                    &quot;user&quot;: {
                        &quot;id&quot;: 47,
                        &quot;username&quot;: &quot;brant87&quot;
                    }
                },
                &quot;read_at&quot;: null,
                &quot;created_at&quot;: &quot;2025-02-17T14:12:34.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-02-17T14:12:34.000000Z&quot;
            },
            {
                &quot;id&quot;: &quot;13c5495e-f6be-4a52-a823-116a5ea0ae93&quot;,
                &quot;type&quot;: &quot;artist-verification-request&quot;,
                &quot;notifiable_type&quot;: &quot;App\\Models\\User&quot;,
                &quot;notifiable_id&quot;: 1,
                &quot;data&quot;: {
                    &quot;user&quot;: {
                        &quot;id&quot;: 143,
                        &quot;username&quot;: &quot;jarod.prohaska&quot;
                    }
                },
                &quot;read_at&quot;: null,
                &quot;created_at&quot;: &quot;2025-02-17T14:12:34.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-02-17T14:12:34.000000Z&quot;
            }
        ],
        &quot;first_page_url&quot;: &quot;http://localhost:8000/api/v1/users/me/notifications?page=1&quot;,
        &quot;from&quot;: 1,
        &quot;last_page&quot;: 9,
        &quot;last_page_url&quot;: &quot;http://localhost:8000/api/v1/users/me/notifications?page=9&quot;,
        &quot;links&quot;: [
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://localhost:8000/api/v1/users/me/notifications?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: &quot;http://localhost:8000/api/v1/users/me/notifications?page=2&quot;,
                &quot;label&quot;: &quot;2&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://localhost:8000/api/v1/users/me/notifications?page=3&quot;,
                &quot;label&quot;: &quot;3&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://localhost:8000/api/v1/users/me/notifications?page=4&quot;,
                &quot;label&quot;: &quot;4&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://localhost:8000/api/v1/users/me/notifications?page=5&quot;,
                &quot;label&quot;: &quot;5&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://localhost:8000/api/v1/users/me/notifications?page=6&quot;,
                &quot;label&quot;: &quot;6&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://localhost:8000/api/v1/users/me/notifications?page=7&quot;,
                &quot;label&quot;: &quot;7&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://localhost:8000/api/v1/users/me/notifications?page=8&quot;,
                &quot;label&quot;: &quot;8&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://localhost:8000/api/v1/users/me/notifications?page=9&quot;,
                &quot;label&quot;: &quot;9&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://localhost:8000/api/v1/users/me/notifications?page=2&quot;,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;active&quot;: false
            }
        ],
        &quot;next_page_url&quot;: &quot;http://localhost:8000/api/v1/users/me/notifications?page=2&quot;,
        &quot;path&quot;: &quot;http://localhost:8000/api/v1/users/me/notifications&quot;,
        &quot;per_page&quot;: 10,
        &quot;prev_page_url&quot;: null,
        &quot;to&quot;: 10,
        &quot;total&quot;: 90
    },
    &quot;message&quot;: &quot;&quot;,
    &quot;status&quot;: 200
}</code>
 </pre>
            <blockquote>
            <p>Example response (200, Authenticated as artist):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;current_page&quot;: 1,
        &quot;data&quot;: [
            {
                &quot;id&quot;: &quot;74709d47-be8d-4afa-b301-9623d10e5b02&quot;,
                &quot;type&quot;: &quot;follow&quot;,
                &quot;notifiable_type&quot;: &quot;App\\Models\\User&quot;,
                &quot;notifiable_id&quot;: 2,
                &quot;data&quot;: {
                    &quot;follower&quot;: {
                        &quot;id&quot;: 187,
                        &quot;username&quot;: &quot;uspinka&quot;
                    }
                },
                &quot;read_at&quot;: null,
                &quot;created_at&quot;: &quot;2025-02-17T14:12:33.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-02-17T14:12:33.000000Z&quot;
            },
            {
                &quot;id&quot;: &quot;eddd2652-d7b2-45c3-8937-0fd5c6180fd2&quot;,
                &quot;type&quot;: &quot;follow&quot;,
                &quot;notifiable_type&quot;: &quot;App\\Models\\User&quot;,
                &quot;notifiable_id&quot;: 2,
                &quot;data&quot;: {
                    &quot;follower&quot;: {
                        &quot;id&quot;: 185,
                        &quot;username&quot;: &quot;lemke.seth&quot;
                    }
                },
                &quot;read_at&quot;: null,
                &quot;created_at&quot;: &quot;2025-02-17T14:12:33.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-02-17T14:12:33.000000Z&quot;
            },
            {
                &quot;id&quot;: &quot;2f8c921b-0700-4cff-903a-1276ac9b5330&quot;,
                &quot;type&quot;: &quot;artwork-like&quot;,
                &quot;notifiable_type&quot;: &quot;App\\Models\\User&quot;,
                &quot;notifiable_id&quot;: 2,
                &quot;data&quot;: {
                    &quot;liker&quot;: {
                        &quot;id&quot;: 191,
                        &quot;username&quot;: &quot;hubert64&quot;
                    },
                    &quot;artwork&quot;: {
                        &quot;id&quot;: 110,
                        &quot;title&quot;: &quot;Rem laborum vel.&quot;
                    }
                },
                &quot;read_at&quot;: null,
                &quot;created_at&quot;: &quot;2025-02-17T14:12:21.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-02-17T14:12:21.000000Z&quot;
            },
            {
                &quot;id&quot;: &quot;7af511d5-29c2-4912-9d6e-668b934e10c1&quot;,
                &quot;type&quot;: &quot;artwork-like&quot;,
                &quot;notifiable_type&quot;: &quot;App\\Models\\User&quot;,
                &quot;notifiable_id&quot;: 2,
                &quot;data&quot;: {
                    &quot;liker&quot;: {
                        &quot;id&quot;: 190,
                        &quot;username&quot;: &quot;angus.robel&quot;
                    },
                    &quot;artwork&quot;: {
                        &quot;id&quot;: 110,
                        &quot;title&quot;: &quot;Rem laborum vel.&quot;
                    }
                },
                &quot;read_at&quot;: null,
                &quot;created_at&quot;: &quot;2025-02-17T14:12:21.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-02-17T14:12:21.000000Z&quot;
            },
            {
                &quot;id&quot;: &quot;1f56b097-d207-4514-aa5c-fb1d064b01e8&quot;,
                &quot;type&quot;: &quot;artwork-comment&quot;,
                &quot;notifiable_type&quot;: &quot;App\\Models\\User&quot;,
                &quot;notifiable_id&quot;: 2,
                &quot;data&quot;: {
                    &quot;commenter&quot;: {
                        &quot;id&quot;: 92,
                        &quot;username&quot;: &quot;wcollier&quot;
                    },
                    &quot;artwork&quot;: {
                        &quot;id&quot;: 110,
                        &quot;title&quot;: &quot;Rem laborum vel.&quot;
                    }
                },
                &quot;read_at&quot;: null,
                &quot;created_at&quot;: &quot;2025-02-17T14:12:11.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-02-17T14:12:11.000000Z&quot;
            },
            {
                &quot;id&quot;: &quot;6cc99454-478e-4fbc-ba4a-ded3e3a79605&quot;,
                &quot;type&quot;: &quot;artwork-comment&quot;,
                &quot;notifiable_type&quot;: &quot;App\\Models\\User&quot;,
                &quot;notifiable_id&quot;: 2,
                &quot;data&quot;: {
                    &quot;commenter&quot;: {
                        &quot;id&quot;: 10,
                        &quot;username&quot;: &quot;bcummerata&quot;
                    },
                    &quot;artwork&quot;: {
                        &quot;id&quot;: 110,
                        &quot;title&quot;: &quot;Rem laborum vel.&quot;
                    }
                },
                &quot;read_at&quot;: null,
                &quot;created_at&quot;: &quot;2025-02-17T14:12:11.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-02-17T14:12:11.000000Z&quot;
            },
            {
                &quot;id&quot;: &quot;7792b926-1fdd-481d-ba29-f0520f46611d&quot;,
                &quot;type&quot;: &quot;artist-verification-response&quot;,
                &quot;notifiable_type&quot;: &quot;App\\Models\\User&quot;,
                &quot;notifiable_id&quot;: 2,
                &quot;data&quot;: {
                    &quot;id&quot;: 8,
                    &quot;status&quot;: &quot;rejected&quot;,
                    &quot;reason&quot;: &quot;Beatae perferendis quisquam voluptatem nobis atque. Consequatur ut dolorem corporis et. Atque asperiores dolore possimus.&quot;
                },
                &quot;read_at&quot;: null,
                &quot;created_at&quot;: &quot;2025-02-17T14:12:35.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-02-17T14:12:35.000000Z&quot;
            }
        ],
        &quot;first_page_url&quot;: &quot;http://localhost:8000/api/v1/users/me/notifications?page=1&quot;,
        &quot;from&quot;: 1,
        &quot;last_page&quot;: 2,
        &quot;last_page_url&quot;: &quot;http://localhost:8000/api/v1/users/me/notifications?page=2&quot;,
        &quot;links&quot;: [
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://localhost:8000/api/v1/users/me/notifications?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: &quot;http://localhost:8000/api/v1/users/me/notifications?page=2&quot;,
                &quot;label&quot;: &quot;2&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://localhost:8000/api/v1/users/me/notifications?page=2&quot;,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;active&quot;: false
            }
        ],
        &quot;next_page_url&quot;: &quot;http://localhost:8000/api/v1/users/me/notifications?page=2&quot;,
        &quot;path&quot;: &quot;http://localhost:8000/api/v1/users/me/notifications&quot;,
        &quot;per_page&quot;: 10,
        &quot;prev_page_url&quot;: null,
        &quot;to&quot;: 10,
        &quot;total&quot;: 18
    },
    &quot;message&quot;: &quot;&quot;,
    &quot;status&quot;: 200
}</code>
 </pre>
            <blockquote>
            <p>Example response (400, Invalid notificationType):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Invalid notificationType for the given userType&quot;,
    &quot;status&quot;: 400
}</code>
 </pre>
            <blockquote>
            <p>Example response (400, Invalid readStatus):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Invalid readStatus&quot;,
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
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>filter[notificationType]</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="filter[notificationType]"                data-endpoint="GETapi-v1-users-me-notifications"
               value="follow"
               data-component="query">
    <br>
<p>Filter notification by notification type. Example: <code>follow</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>artist-verification-request</code></li> <li><code>artist-verification-response</code></li> <li><code>artwork-comment</code></li> <li><code>artwork-like</code></li> <li><code>follow</code></li></ul>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>filter[readStatus]</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="filter[readStatus]"                data-endpoint="GETapi-v1-users-me-notifications"
               value="read"
               data-component="query">
    <br>
<p>Filter notification by read and unread. Example: <code>read</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>read</code></li> <li><code>unread</code></li></ul>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="page"                data-endpoint="GETapi-v1-users-me-notifications"
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
               step="any"               name="perPage"                data-endpoint="GETapi-v1-users-me-notifications"
               value="10"
               data-component="query">
    <br>
<p>The number of records to fetch per page. Example: <code>10</code></p>
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
    --get "http://localhost:8000/api/v1/users?filter%5Bcountry%5D=finland&amp;filter%5Btag%5D=ceramics&amp;filter%5Bverified%5D=1&amp;searchQuery=lorem&amp;sort=new&amp;include=artworks&amp;page=1&amp;perPage=10" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/users"
);

const params = {
    "filter[country]": "finland",
    "filter[tag]": "ceramics",
    "filter[verified]": "1",
    "searchQuery": "lorem",
    "sort": "new",
    "include": "artworks",
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
            &quot;id&quot;: 300,
            &quot;username&quot;: &quot;grace.hackett&quot;,
            &quot;first_name&quot;: &quot;Ladarius&quot;,
            &quot;last_name&quot;: &quot;D&#039;Amore&quot;,
            &quot;email&quot;: &quot;jrempel@example.org&quot;,
            &quot;country&quot;: &quot;France&quot;,
            &quot;bio&quot;: &quot;Et sed autem alias consequatur. Est itaque et vero quod labore fugit. Enim quis enim perferendis sit itaque excepturi. Totam praesentium vero aliquid similique totam. Dolorem ullam earum ducimus est magni iure.&quot;,
            &quot;photo&quot;: null,
            &quot;artist_verified_at&quot;: null,
            &quot;email_verified_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
            &quot;role&quot;: &quot;artist&quot;,
            &quot;created_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
            &quot;artworks&quot;: [
                {
                    &quot;id&quot;: 253,
                    &quot;title&quot;: &quot;Sequi dolor reiciendis.&quot;,
                    &quot;description&quot;: &quot;Nemo non asperiores quo quas et. Dicta illo cupiditate autem sint qui.&quot;,
                    &quot;status&quot;: &quot;draft&quot;,
                    &quot;user_id&quot;: 300,
                    &quot;created_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
                    &quot;artwork_likes_count&quot;: 0,
                    &quot;artwork_comments_count&quot;: 0,
                    &quot;artwork_main_photo_path&quot;: null
                }
            ]
        },
        {
            &quot;id&quot;: 301,
            &quot;username&quot;: &quot;gutkowski.al&quot;,
            &quot;first_name&quot;: &quot;Jewel&quot;,
            &quot;last_name&quot;: &quot;Rutherford&quot;,
            &quot;email&quot;: &quot;antwan24@example.net&quot;,
            &quot;country&quot;: &quot;Nicaragua&quot;,
            &quot;bio&quot;: &quot;Placeat fugiat qui aut. Consectetur sapiente porro commodi. Dicta dignissimos dolor voluptate voluptates voluptate alias.&quot;,
            &quot;photo&quot;: &quot;artwork-seeding-photos/15.jpeg&quot;,
            &quot;artist_verified_at&quot;: &quot;2025-02-17 17:08:09&quot;,
            &quot;email_verified_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
            &quot;role&quot;: &quot;artist&quot;,
            &quot;created_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
            &quot;artworks&quot;: [
                {
                    &quot;id&quot;: 254,
                    &quot;title&quot;: &quot;Nemo et facere.&quot;,
                    &quot;description&quot;: &quot;Id illum consequatur vitae cupiditate culpa architecto. Cupiditate ab corrupti perspiciatis placeat laboriosam occaecati tempore. Vero libero quia accusantium accusamus vitae cumque.&quot;,
                    &quot;status&quot;: &quot;draft&quot;,
                    &quot;user_id&quot;: 301,
                    &quot;created_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
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
               value="finland"
               data-component="query">
    <br>
<p>Filter artworks by country. Example: <code>finland</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>filter[tag]</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="filter[tag]"                data-endpoint="GETapi-v1-users"
               value="ceramics"
               data-component="query">
    <br>
<p>Filter artworks by tag. Example: <code>ceramics</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>painting</code></li> <li><code>graphic</code></li> <li><code>sculpture</code></li> <li><code>folk art</code></li> <li><code>textile</code></li> <li><code>ceramics</code></li> <li><code>stained glass windows</code></li> <li><code>beads</code></li> <li><code>paper</code></li> <li><code>glass</code></li> <li><code>dolls</code></li> <li><code>jewellery</code></li> <li><code>fresco</code></li> <li><code>metal</code></li> <li><code>mosaic</code></li></ul>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>filter[verified]</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="filter[verified]"                data-endpoint="GETapi-v1-users"
               value="1"
               data-component="query">
    <br>
<p>Filter artists by verification status. Example: <code>1</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>1</code></li> <li><code>0</code></li></ul>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>searchQuery</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="searchQuery"                data-endpoint="GETapi-v1-users"
               value="lorem"
               data-component="query">
    <br>
<p>Search for users by username, first name, or last name. Example: <code>lorem</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="sort"                data-endpoint="GETapi-v1-users"
               value="new"
               data-component="query">
    <br>
<p>Sort artworks by new, or popular. Example: <code>new</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>include</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="include"                data-endpoint="GETapi-v1-users"
               value="artworks"
               data-component="query">
    <br>
<p>Include related artworks. Example: <code>artworks</code></p>
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
        &quot;id&quot;: 302,
        &quot;username&quot;: &quot;khalil39&quot;,
        &quot;first_name&quot;: &quot;Federico&quot;,
        &quot;last_name&quot;: &quot;Medhurst&quot;,
        &quot;email&quot;: &quot;trisha.kohler@example.net&quot;,
        &quot;country&quot;: &quot;Seychelles&quot;,
        &quot;bio&quot;: &quot;Error et ad delectus suscipit consectetur rerum. Ut sed sint sunt tenetur. Ut assumenda nostrum tempora perspiciatis nisi quis.&quot;,
        &quot;photo&quot;: &quot;artwork-seeding-photos/37.jpeg&quot;,
        &quot;artist_verified_at&quot;: &quot;2025-02-17 17:08:09&quot;,
        &quot;email_verified_at&quot;: null,
        &quot;role&quot;: &quot;artist&quot;,
        &quot;created_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;
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

                    <h2 id="users-GETapi-v1-users--username-">Show User</h2>

<p>
</p>

<p>Retrieve a single user by username</p>

<span id="example-requests-GETapi-v1-users--username-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/users/id" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/users/id"
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
        &quot;id&quot;: 303,
        &quot;username&quot;: &quot;macejkovic.margarett&quot;,
        &quot;first_name&quot;: &quot;Lewis&quot;,
        &quot;last_name&quot;: &quot;Heaney&quot;,
        &quot;email&quot;: &quot;liza.johnson@example.org&quot;,
        &quot;country&quot;: &quot;Kenya&quot;,
        &quot;bio&quot;: &quot;Error voluptatem aliquam ex aut fuga et. Quod sed qui et iusto iste quo eveniet. Magni quam debitis sit non fuga rem. Ad sit laudantium magnam dolorum quaerat quasi architecto.&quot;,
        &quot;photo&quot;: &quot;artwork-seeding-photos/9.jpeg&quot;,
        &quot;artist_verified_at&quot;: null,
        &quot;email_verified_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
        &quot;role&quot;: &quot;artist&quot;,
        &quot;created_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;
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
               value="id"
               data-component="url">
    <br>
<p>The username of the user Example: <code>id</code></p>
            </div>
                    </form>

                    <h2 id="users-POSTapi-v1-users-me">Update Authenticated User</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Update the currently authenticated user</p>

<span id="example-requests-POSTapi-v1-users-me">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
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
    --form "photo=@/tmp/phps850l9q2mg0jdgObLEN" </code></pre></div>


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
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-users-me">
            <blockquote>
            <p>Example response (200, Success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 304,
        &quot;username&quot;: &quot;fay.kassandra&quot;,
        &quot;first_name&quot;: &quot;Rocky&quot;,
        &quot;last_name&quot;: &quot;Beier&quot;,
        &quot;email&quot;: &quot;kurtis51@example.net&quot;,
        &quot;country&quot;: &quot;Serbia&quot;,
        &quot;bio&quot;: &quot;Voluptate est nostrum enim id. Blanditiis ut in repudiandae mollitia sint. Sed rerum officiis distinctio cum aut explicabo qui. Voluptatibus deserunt culpa unde doloremque reiciendis.&quot;,
        &quot;photo&quot;: null,
        &quot;artist_verified_at&quot;: &quot;2025-02-17 17:08:09&quot;,
        &quot;email_verified_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
        &quot;role&quot;: &quot;artist&quot;,
        &quot;created_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-02-17T17:08:09.000000Z&quot;
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
<span id="execution-results-POSTapi-v1-users-me" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-users-me"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-users-me"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-users-me" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-users-me">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-users-me" data-method="POST"
      data-path="api/v1/users/me"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-users-me', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-users-me"
                    onclick="tryItOut('POSTapi-v1-users-me');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-users-me"
                    onclick="cancelTryOut('POSTapi-v1-users-me');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-users-me"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/users/me</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-v1-users-me"
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
                              name="Content-Type"                data-endpoint="POSTapi-v1-users-me"
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
                              name="Accept"                data-endpoint="POSTapi-v1-users-me"
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
                              name="username"                data-endpoint="POSTapi-v1-users-me"
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
                              name="first_name"                data-endpoint="POSTapi-v1-users-me"
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
                              name="last_name"                data-endpoint="POSTapi-v1-users-me"
               value="Doe"
               data-component="body">
    <br>
<p>The last name of the user. Must not be greater than 255 characters. Example: <code>Doe</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-v1-users-me"
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
                              name="country"                data-endpoint="POSTapi-v1-users-me"
               value="United States"
               data-component="body">
    <br>
<p>The country of the user. The <code>name</code> of an existing record in the countries table. Must not be greater than 255 characters. Example: <code>United States</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>bio</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="bio"                data-endpoint="POSTapi-v1-users-me"
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
                              name="photo"                data-endpoint="POSTapi-v1-users-me"
               value=""
               data-component="body">
    <br>
<p>The photo of the user. Must be an image. Must not be greater than 2048 kilobytes. Example: <code>/tmp/phps850l9q2mg0jdgObLEN</code></p>
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
