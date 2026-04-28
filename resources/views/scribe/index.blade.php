<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Laravel API Documentation</title>

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
        var tryItOutBaseUrl = "http://192.168.8.32:8000";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.9.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.9.0.js") }}"></script>

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
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-auth-register">
                                <a href="#endpoints-POSTapi-auth-register">POST api/auth/register</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-auth-login">
                                <a href="#endpoints-POSTapi-auth-login">POST api/auth/login</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-warnings">
                                <a href="#endpoints-GETapi-warnings">GET /warnings
جلب التحذيرات النشطة غير المنتهية الصلاحية.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-crop-guides">
                                <a href="#endpoints-GETapi-crop-guides">Display a listing of crop guides.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-crop-guides-search">
                                <a href="#endpoints-GETapi-crop-guides-search">Search remotely using service logic.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-plants">
                                <a href="#endpoints-GETapi-plants">GET api/plants</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-plants-categories">
                                <a href="#endpoints-GETapi-plants-categories">GET api/plants/categories</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-plants--id-">
                                <a href="#endpoints-GETapi-plants--id-">GET api/plants/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-metadata">
                                <a href="#endpoints-GETapi-metadata">Get all application metadata (categories, units, payment methods, etc.)
This serves as the single source of truth for the mobile app.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-auth-profile">
                                <a href="#endpoints-GETapi-auth-profile">GET api/auth/profile</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-auth-profile-update">
                                <a href="#endpoints-POSTapi-auth-profile-update">POST api/auth/profile/update</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-auth-logout">
                                <a href="#endpoints-POSTapi-auth-logout">POST api/auth/logout</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-reports-statistics">
                                <a href="#endpoints-GETapi-reports-statistics">GET /reports/statistics
إحصائيات المستخدم للـ 7 أيام الأخيرة.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-marketplace-products">
                                <a href="#endpoints-GETapi-marketplace-products">GET /marketplace/products
جلب المنتجات مع الفلترة والترقيم</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-marketplace-stores">
                                <a href="#endpoints-GETapi-marketplace-stores">GET /marketplace/stores</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-marketplace-stores--slug-">
                                <a href="#endpoints-GETapi-marketplace-stores--slug-">GET /marketplace/stores/{slug}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-marketplace-stores--store_slug--products">
                                <a href="#endpoints-GETapi-marketplace-stores--store_slug--products">GET /marketplace/stores/{store}/products</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-marketplace-products--product_slug--reviews">
                                <a href="#endpoints-GETapi-marketplace-products--product_slug--reviews">GET /marketplace/products/{product}/reviews</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-marketplace-seller-products">
                                <a href="#endpoints-POSTapi-marketplace-seller-products">POST /marketplace/seller/products</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-marketplace-seller-products--product_slug-">
                                <a href="#endpoints-POSTapi-marketplace-seller-products--product_slug-">POST /marketplace/seller/products/{product} (مع _method=PUT)</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-marketplace-seller-products--product_slug-">
                                <a href="#endpoints-DELETEapi-marketplace-seller-products--product_slug-">DELETE /marketplace/seller/products/{product}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-marketplace-seller-catalogs">
                                <a href="#endpoints-GETapi-marketplace-seller-catalogs">GET /marketplace/seller/catalogs</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-marketplace-seller-catalogs">
                                <a href="#endpoints-POSTapi-marketplace-seller-catalogs">POST /marketplace/seller/catalogs</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-marketplace-seller-catalogs--catalog_slug-">
                                <a href="#endpoints-POSTapi-marketplace-seller-catalogs--catalog_slug-">POST /marketplace/seller/catalogs/{catalog} (مع _method=PUT)</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-marketplace-seller-catalogs--catalog_slug-">
                                <a href="#endpoints-DELETEapi-marketplace-seller-catalogs--catalog_slug-">DELETE /marketplace/seller/catalogs/{catalog}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-marketplace-seller-catalogs--catalog_slug--assign-products">
                                <a href="#endpoints-POSTapi-marketplace-seller-catalogs--catalog_slug--assign-products">POST /marketplace/seller/catalogs/{catalog}/assign-products</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-marketplace-seller-my-store">
                                <a href="#endpoints-GETapi-marketplace-seller-my-store">GET /marketplace/seller/my-store</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-marketplace-seller-my-store-update">
                                <a href="#endpoints-POSTapi-marketplace-seller-my-store-update">POST /marketplace/seller/my-store/update</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-marketplace-seller-orders">
                                <a href="#endpoints-GETapi-marketplace-seller-orders">GET /marketplace/seller/orders</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-marketplace-seller-orders--order_id--status">
                                <a href="#endpoints-POSTapi-marketplace-seller-orders--order_id--status">POST /marketplace/seller/orders/{order}/status</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-marketplace-checkout">
                                <a href="#endpoints-POSTapi-marketplace-checkout">POST /marketplace/checkout</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-marketplace-orders">
                                <a href="#endpoints-GETapi-marketplace-orders">GET /marketplace/orders</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-marketplace-products--product_slug--reviews">
                                <a href="#endpoints-POSTapi-marketplace-products--product_slug--reviews">POST /marketplace/products/{product}/reviews</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-farm-my-crops">
                                <a href="#endpoints-GETapi-farm-my-crops">GET api/farm/my-crops</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-farm-crops">
                                <a href="#endpoints-POSTapi-farm-crops">POST api/farm/crops</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-farm-crops--id-">
                                <a href="#endpoints-DELETEapi-farm-crops--id-">DELETE api/farm/crops/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-community-posts">
                                <a href="#endpoints-GETapi-community-posts">GET api/community/posts</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-community-posts">
                                <a href="#endpoints-POSTapi-community-posts">POST api/community/posts</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-community-posts--id-">
                                <a href="#endpoints-PUTapi-community-posts--id-">PUT api/community/posts/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-community-posts--id-">
                                <a href="#endpoints-DELETEapi-community-posts--id-">DELETE api/community/posts/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-community-my-posts">
                                <a href="#endpoints-GETapi-community-my-posts">GET api/community/my-posts</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-community-posts--id--like">
                                <a href="#endpoints-POSTapi-community-posts--id--like">POST api/community/posts/{id}/like</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-community-posts--id--save">
                                <a href="#endpoints-POSTapi-community-posts--id--save">POST api/community/posts/{id}/save</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-community-posts--id--comments">
                                <a href="#endpoints-POSTapi-community-posts--id--comments">POST api/community/posts/{id}/comments</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-community-comments--id-">
                                <a href="#endpoints-PUTapi-community-comments--id-">PUT api/community/comments/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-community-comments--id-">
                                <a href="#endpoints-DELETEapi-community-comments--id-">DELETE api/community/comments/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-community-saved-posts">
                                <a href="#endpoints-GETapi-community-saved-posts">GET api/community/saved-posts</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-community-activity">
                                <a href="#endpoints-GETapi-community-activity">GET api/community/activity</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-notifications">
                                <a href="#endpoints-GETapi-notifications">GET api/notifications</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-notifications--id--read">
                                <a href="#endpoints-POSTapi-notifications--id--read">POST api/notifications/{id}/read</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-notifications-read-all">
                                <a href="#endpoints-POSTapi-notifications-read-all">POST api/notifications/read-all</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-ai-analyze-plant">
                                <a href="#endpoints-POSTapi-ai-analyze-plant">POST api/ai/analyze-plant</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-iot-status">
                                <a href="#endpoints-GETapi-iot-status">Get the current device associated with the user.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-iot-toggle">
                                <a href="#endpoints-POSTapi-iot-toggle">Toggle irrigation manual state.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-iot-auto-irrigation">
                                <a href="#endpoints-POSTapi-iot-auto-irrigation">Update auto-irrigation settings.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-iot-schedules">
                                <a href="#endpoints-GETapi-iot-schedules">Manage Schedules</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-iot-schedules">
                                <a href="#endpoints-POSTapi-iot-schedules">POST api/iot/schedules</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-iot-schedules--id-">
                                <a href="#endpoints-DELETEapi-iot-schedules--id-">DELETE api/iot/schedules/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-iot-request-service">
                                <a href="#endpoints-POSTapi-iot-request-service">Request a new IoT device service.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-admin-stats">
                                <a href="#endpoints-GETapi-admin-stats">GET /admin/stats</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-admin-users">
                                <a href="#endpoints-GETapi-admin-users">GET /admin/users
per_page محدودة بـ 100 لمنع استرجاع كل السجلات دفعة واحدة</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-admin-users--id--role">
                                <a href="#endpoints-PUTapi-admin-users--id--role">PUT /admin/users/{id}/role</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-admin-users--id-">
                                <a href="#endpoints-DELETEapi-admin-users--id-">DELETE /admin/users/{id}</a>
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
        <li>Last updated: April 22, 2026</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>http://192.168.8.32:8000</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work with our API.

&lt;aside&gt;As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).&lt;/aside&gt;</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-POSTapi-auth-register">POST api/auth/register</h2>

<p>
</p>



<span id="example-requests-POSTapi-auth-register">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://192.168.8.32:8000/api/auth/register" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"vmqeopfuudtdsufvyvddq\",
    \"email\": \"kunde.eloisa@example.com\",
    \"password\": \"consequatur\",
    \"user_type\": \"seller\",
    \"store_type\": \"معدات\",
    \"phone\": \"mqeopfuudtdsufvyv\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/auth/register"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "vmqeopfuudtdsufvyvddq",
    "email": "kunde.eloisa@example.com",
    "password": "consequatur",
    "user_type": "seller",
    "store_type": "معدات",
    "phone": "mqeopfuudtdsufvyv"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-register">
</span>
<span id="execution-results-POSTapi-auth-register" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-register"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-register"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-register" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-register">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-auth-register" data-method="POST"
      data-path="api/auth/register"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-register', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-register"
                    onclick="tryItOut('POSTapi-auth-register');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-register"
                    onclick="cancelTryOut('POSTapi-auth-register');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-register"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/register</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-auth-register"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-auth-register"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-auth-register"
               value="vmqeopfuudtdsufvyvddq"
               data-component="body">
    <br>
<p>يجب أن لا يتجاوز طول نّص حقل value 255 حروفٍ/حرفًا. Example: <code>vmqeopfuudtdsufvyvddq</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-auth-register"
               value="kunde.eloisa@example.com"
               data-component="body">
    <br>
<p>يجب أن يكون حقل value عنوان بريد إلكتروني صحيح البُنية. يجب أن لا يتجاوز طول نّص حقل value 255 حروفٍ/حرفًا. Example: <code>kunde.eloisa@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-auth-register"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>user_type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="user_type"                data-endpoint="POSTapi-auth-register"
               value="seller"
               data-component="body">
    <br>
<p>Example: <code>seller</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>user</code></li> <li><code>seller</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>store_type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="store_type"                data-endpoint="POSTapi-auth-register"
               value="معدات"
               data-component="body">
    <br>
<p>This field is required when <code>user_type</code> is <code>seller</code>. Example: <code>معدات</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>بذور</code></li> <li><code>اسمدة</code></li> <li><code>مبيدات</code></li> <li><code>محاصيل</code></li> <li><code>معدات</code></li> <li><code>المشاتل</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="POSTapi-auth-register"
               value="mqeopfuudtdsufvyv"
               data-component="body">
    <br>
<p>Must match the regex /^[0-9+-\s()]+$/. يجب أن لا يتجاوز طول نّص حقل value 20 حروفٍ/حرفًا. Example: <code>mqeopfuudtdsufvyv</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-auth-login">POST api/auth/login</h2>

<p>
</p>



<span id="example-requests-POSTapi-auth-login">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://192.168.8.32:8000/api/auth/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"qkunze@example.com\",
    \"password\": \"consequatur\",
    \"user_type\": \"user\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/auth/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "qkunze@example.com",
    "password": "consequatur",
    "user_type": "user"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-login">
</span>
<span id="execution-results-POSTapi-auth-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-login"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-login">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-auth-login" data-method="POST"
      data-path="api/auth/login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-login"
                    onclick="tryItOut('POSTapi-auth-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-login"
                    onclick="cancelTryOut('POSTapi-auth-login');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-login"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/login</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-auth-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-auth-login"
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
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-auth-login"
               value="qkunze@example.com"
               data-component="body">
    <br>
<p>يجب أن يكون حقل value عنوان بريد إلكتروني صحيح البُنية. Example: <code>qkunze@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-auth-login"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>user_type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="user_type"                data-endpoint="POSTapi-auth-login"
               value="user"
               data-component="body">
    <br>
<p>Example: <code>user</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>user</code></li> <li><code>seller</code></li></ul>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-warnings">GET /warnings
جلب التحذيرات النشطة غير المنتهية الصلاحية.</h2>

<p>
</p>



<span id="example-requests-GETapi-warnings">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://192.168.8.32:8000/api/warnings" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/warnings"
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

<span id="example-responses-GETapi-warnings">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 59
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: null,
    &quot;data&quot;: []
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-warnings" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-warnings"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-warnings"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-warnings" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-warnings">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-warnings" data-method="GET"
      data-path="api/warnings"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-warnings', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-warnings"
                    onclick="tryItOut('GETapi-warnings');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-warnings"
                    onclick="cancelTryOut('GETapi-warnings');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-warnings"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/warnings</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-warnings"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-warnings"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-crop-guides">Display a listing of crop guides.</h2>

<p>
</p>



<span id="example-requests-GETapi-crop-guides">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://192.168.8.32:8000/api/crop-guides" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/crop-guides"
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

<span id="example-responses-GETapi-crop-guides">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 59
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;الذرة الرفيعة&quot;,
            &quot;category&quot;: &quot;حبوب&quot;,
            &quot;scientific_name&quot;: &quot;Sorghum bicolor&quot;,
            &quot;description&quot;: &quot;نبات حبوب سنوي مقاوم للجفاف، يُزرع بكثرة في المرتفعات والمناطق الجافة في اليمن.&quot;,
            &quot;benefits&quot;: &quot;مصدر غني بالكربوهيدرات والبروتين والألياف. يستخدم السيقان الخضراء كعلف للماشية.&quot;,
            &quot;uses&quot;: &quot;صناعة الخبز التقليدي (الذرة)، العصيد اليمني، إنتاج الأعلاف.&quot;,
            &quot;planting_season&quot;: &quot;صيفي وخريفي وبيني&quot;,
            &quot;water_needs&quot;: &quot;بعلية أساسًا، ري خفيف&quot;,
            &quot;watering_schedule&quot;: &quot;متباعد جدا، مقاوم للجفاف&quot;,
            &quot;sunlight_requirement&quot;: &quot;شمس كاملة قوية&quot;,
            &quot;temperature&quot;: &quot;معتدل إلى حار&quot;,
            &quot;humidity&quot;: &quot;منخفضة إلى متوسطة&quot;,
            &quot;fertilizer_needs&quot;: &quot;سماد عضوي ونيتروجين&quot;,
            &quot;harvest_time&quot;: &quot;90-120 يوم&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1596489823521-707db99d2595?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;,
            &quot;created_at&quot;: &quot;2026-04-12T23:22:51.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T23:22:51.000000Z&quot;,
            &quot;scientific_definition&quot;: &quot;نبات عشبي حولي من الفصيلة النجيلية، يتميز بقدرته العالية على تحمل الجفاف والحرارة العالية، ويعد ثالث أهم محصول حبوب في اليمن من حيث المساحة والإنتاج.&quot;,
            &quot;growing_conditions&quot;: &quot;يزدهر في درجات حرارة بين 25-30 درجة مئوية. يتطلب موسم نمو طويل ودافئ وجاف نسبياً عند النضج.&quot;,
            &quot;soil_and_ph&quot;: &quot;يفضل التربة الطميية الرملية جيدة الصرف. الـ pH المثالي: 6.0 - 7.5.&quot;,
            &quot;pests_and_diseases&quot;: &quot;دودة الحشد الخريفية، ذبابة ثمار الذرة، ومرض التفحم.&quot;,
            &quot;harvesting_and_storage&quot;: &quot;يتم الحصاد عند جفاف الحبوب وتصلبها. تخزن في &#039;المدافن&#039; التقليدية لحمايتها من الرطوبة والآفات.&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;الدخن&quot;,
            &quot;category&quot;: &quot;حبوب&quot;,
            &quot;scientific_name&quot;: &quot;Pennisetum glaucum&quot;,
            &quot;description&quot;: &quot;نبات حبوب سنوي مقاوم جدًا للجفاف، ينمو في تربة فقيرة ومنتشر في تهامة.&quot;,
            &quot;benefits&quot;: &quot;خالٍ من الجلوتين، غني بالحديد والمغنيسيوم والبوتاسيوم.&quot;,
            &quot;uses&quot;: &quot;خبز الدخن، العصيدة التهامية، أعلاف الماشية.&quot;,
            &quot;planting_season&quot;: &quot;الخريف (أغسطس-سبتمبر)&quot;,
            &quot;water_needs&quot;: &quot;ري متباعد جداً&quot;,
            &quot;watering_schedule&quot;: &quot;لا يحتاج لسقاية يومية، بعلي&quot;,
            &quot;sunlight_requirement&quot;: &quot;شمس كاملة&quot;,
            &quot;temperature&quot;: &quot;حار&quot;,
            &quot;humidity&quot;: &quot;متدنية&quot;,
            &quot;fertilizer_needs&quot;: &quot;يكتفي بالسماد العضوي الخفيف&quot;,
            &quot;harvest_time&quot;: &quot;70-90 يوم&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;,
            &quot;created_at&quot;: &quot;2026-04-12T23:22:51.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T23:22:51.000000Z&quot;,
            &quot;scientific_definition&quot;: &quot;من أقوى المحاصيل النجيلية تحملاً للظروف الصحراوية القاسية، يتميز بإنتاج سنابل طويلة مليئة بالحبوب الصغيرة المغذية.&quot;,
            &quot;growing_conditions&quot;: &quot;يتطلب درجات حرارة مرتفعة جداً ولا يتحمل الصقيع. يزرع غالباً في المناطق الساحلية (تهامة).&quot;,
            &quot;soil_and_ph&quot;: &quot;ينمو جيداً في التربة الرملية الفقيرة والحامضية قليلاً. الـ pH المثالي: 5.5 - 7.0.&quot;,
            &quot;pests_and_diseases&quot;: &quot;مرض البياض الزغبي، الحشرات الثاقبة للساق، والطيور التي تهاجم السنابل.&quot;,
            &quot;harvesting_and_storage&quot;: &quot;يحصد يدوياً عند تحول لون السنابل إلى البني الفاتح. يجب تجفيفه جيداً تحت الشمس قبل التخزين.&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;الذرة الشامية&quot;,
            &quot;category&quot;: &quot;حبوب&quot;,
            &quot;scientific_name&quot;: &quot;Zea mays&quot;,
            &quot;description&quot;: &quot;نبات حبوب سنوي يُزرع بشكل واسع ويعد أساسياً للغذاء والعلف.&quot;,
            &quot;benefits&quot;: &quot;مصدر طاقة سريع، غني بالألياف وفيتامين ب والنشويات.&quot;,
            &quot;uses&quot;: &quot;الأكل طازجاً (مشوي)، إنتاج الدقيق، وصناعة السيلاج للأعلاف.&quot;,
            &quot;planting_season&quot;: &quot;صيفي وربيعي&quot;,
            &quot;water_needs&quot;: &quot;يحتاج مياه أكثر من الذرة الرفيعة&quot;,
            &quot;watering_schedule&quot;: &quot;ري منتظم أسبوعي&quot;,
            &quot;sunlight_requirement&quot;: &quot;شمس كاملة (7-8 ساعات)&quot;,
            &quot;temperature&quot;: &quot;معتدل إلى حار&quot;,
            &quot;humidity&quot;: &quot;متوسطة&quot;,
            &quot;fertilizer_needs&quot;: &quot;يفضل السماد الموازن الغني بالنيتروجين&quot;,
            &quot;harvest_time&quot;: &quot;80-110 يوم&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1551727974-8af20a3322f1?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;,
            &quot;created_at&quot;: &quot;2026-04-12T23:22:51.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T23:22:51.000000Z&quot;,
            &quot;scientific_definition&quot;: &quot;محصول استراتيجي يتبع الفصيلة النجيلية، يتميز بسيقان طويلة وقوية وأعراق مليئة بالحبوب الصفراء أو البيضاء.&quot;,
            &quot;growing_conditions&quot;: &quot;يحتاج إلى درجات حرارة دافئة (20-30 درجة مئوية) وتوزيع جيد للأمطار أو الري خلال فترة التزهير.&quot;,
            &quot;soil_and_ph&quot;: &quot;تربة طميية خصبة غنية بالمادة العضوية. الـ pH المثالي: 6.0 - 7.0.&quot;,
            &quot;pests_and_diseases&quot;: &quot;دودة ورق القطن، حفار الساق، الصدأ، والتفحم.&quot;,
            &quot;harvesting_and_storage&quot;: &quot;يحصد عند جفاف الأوراق الخارجية للعرن وتصلب الحبوب. يخزن في أماكن جافة ومهوية.&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;القمح (البر)&quot;,
            &quot;category&quot;: &quot;حبوب&quot;,
            &quot;scientific_name&quot;: &quot;Triticum aestivum&quot;,
            &quot;description&quot;: &quot;شريان الحياة والمحصول الرئيسي في المرتفعات اليمنية لصناعة الخبز.&quot;,
            &quot;benefits&quot;: &quot;البر اليمني مشهور بجودته العالية وقيمته الغذائية الكبيرة.&quot;,
            &quot;uses&quot;: &quot;صناعة الخبز اليمني، البرغل، السميد، والمخبوزات.&quot;,
            &quot;planting_season&quot;: &quot;شتوي وصيفي حسب الأمطار&quot;,
            &quot;water_needs&quot;: &quot;معتدل في بداية نموه&quot;,
            &quot;watering_schedule&quot;: &quot;كل أسبوع إلى 10 أيام&quot;,
            &quot;sunlight_requirement&quot;: &quot;يفضل الشمس المباشرة&quot;,
            &quot;temperature&quot;: &quot;معتدل مائل للبرودة&quot;,
            &quot;humidity&quot;: &quot;منخفضة نسبياً&quot;,
            &quot;fertilizer_needs&quot;: &quot;عضوي ومخصبات زراعية&quot;,
            &quot;harvest_time&quot;: &quot;120-150 يوم&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1501431821157-a7eb76ca553b?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;,
            &quot;created_at&quot;: &quot;2026-04-12T23:22:51.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T23:22:51.000000Z&quot;,
            &quot;scientific_definition&quot;: &quot;المحصول الغذائي الأول عالمياً، وهو نبات حولي يزرع من أجل حبوبه التي تطحن لصناعة الطحين.&quot;,
            &quot;growing_conditions&quot;: &quot;يزرع في المناطق الباردة والمعتدلة (المرتفعات). يتطلب برودة في مرحلة النمو الأولي ودفئاً عند النضج.&quot;,
            &quot;soil_and_ph&quot;: &quot;تربة طينية خفيفة أو طميية جيدة التهوية. الـ pH المثالي: 6.0 - 7.5.&quot;,
            &quot;pests_and_diseases&quot;: &quot;حشرة السونة، حشرة المن، أمراض الأصداء (الأسود والأصفر).&quot;,
            &quot;harvesting_and_storage&quot;: &quot;يحصد عند جفاف السيقان والسنابل تماماً. يدرس ويخزن في مخازن محمية من القوارض والرطوبة.&quot;
        },
        {
            &quot;id&quot;: 5,
            &quot;name&quot;: &quot;الشعير&quot;,
            &quot;category&quot;: &quot;حبوب&quot;,
            &quot;scientific_name&quot;: &quot;Hordeum vulgare&quot;,
            &quot;description&quot;: &quot;نبات حبوب يتحمل الطقس البارد والتربة الجافة، ينجح في المدرجات المرتفعة.&quot;,
            &quot;benefits&quot;: &quot;غني بالألياف الذائبة، مفيد لصحة القلب والجهاز الهضمي.&quot;,
            &quot;uses&quot;: &quot;خبز الشعير، التلبية النبوية، صناعة بدائل القهوة، وأعلاف مركزة.&quot;,
            &quot;planting_season&quot;: &quot;شتوي&quot;,
            &quot;water_needs&quot;: &quot;يعتمد على الأمطار (بعلي)&quot;,
            &quot;watering_schedule&quot;: &quot;قليل جداً&quot;,
            &quot;sunlight_requirement&quot;: &quot;شمس كاملة&quot;,
            &quot;temperature&quot;: &quot;بارد نسبيا&quot;,
            &quot;humidity&quot;: &quot;منخفضة&quot;,
            &quot;fertilizer_needs&quot;: &quot;سماد بلدي طبيعي&quot;,
            &quot;harvest_time&quot;: &quot;100-130 يوم&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1534067783941-51c9c22eada3?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;,
            &quot;created_at&quot;: &quot;2026-04-12T23:22:51.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T23:22:51.000000Z&quot;,
            &quot;scientific_definition&quot;: &quot;أقدم محصول حبوب عرفه الإنسان، يتميز بقدرته الفائقة على تحمل الملوحة والجفاف والبرودة القاسية.&quot;,
            &quot;growing_conditions&quot;: &quot;ينمو في المرتفعات العالية جداً حيث تفشل المحاصيل الأخرى بسبب البرودة.&quot;,
            &quot;soil_and_ph&quot;: &quot;يتحمل التربة القلوية والملحية بشكل جيد. الـ pH المثالي: 7.0 - 8.5.&quot;,
            &quot;pests_and_diseases&quot;: &quot;مرض التبقع الورقي، التفحم السائب، والمن.&quot;,
            &quot;harvesting_and_storage&quot;: &quot;يحصد عند النضج التام وجفاف الحبوب. يمتاز بقدرة تخزينية عالية جداً.&quot;
        },
        {
            &quot;id&quot;: 6,
            &quot;name&quot;: &quot;البن&quot;,
            &quot;category&quot;: &quot;محاصيل نقدية&quot;,
            &quot;scientific_name&quot;: &quot;Coffea arabica&quot;,
            &quot;description&quot;: &quot;واحدة من أثمن الأشجار النقدية العالمية. يزرع البن &#039;العربي&#039; ذو الجودة الاستثنائية في مدرجات حراز ويافع وغيرها.&quot;,
            &quot;benefits&quot;: &quot;يعتبر البن اليمني من أفضل أنواع القهوة عالمياً، ويعد فخر المحاصيل التصديرية التاريخية.&quot;,
            &quot;uses&quot;: &quot;صناعة القهوة، القشر اليمني، وتصدير المحاصيل المختصة.&quot;,
            &quot;planting_season&quot;: &quot;الربيع وأوائل الخريف&quot;,
            &quot;water_needs&quot;: &quot;معتدل، ري منتظم بالذات عند الإزهار&quot;,
            &quot;watering_schedule&quot;: &quot;مرتين أسبوعياً (حسب طبيعة التُربة)&quot;,
            &quot;sunlight_requirement&quot;: &quot;شمس غير مباشرة، يفضل زراعته تحت شجر مظلل&quot;,
            &quot;temperature&quot;: &quot;معتدل 15-25&quot;,
            &quot;humidity&quot;: &quot;متوسطة-عالية&quot;,
            &quot;fertilizer_needs&quot;: &quot;عضوي ومصادر بوتاسيوم&quot;,
            &quot;harvest_time&quot;: &quot;أكتوبر-ديسمبر (بعد 3-4 سنوات للإنتاج)&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;,
            &quot;created_at&quot;: &quot;2026-04-12T23:22:51.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T23:22:51.000000Z&quot;,
            &quot;scientific_definition&quot;: &quot;شجيرة معمرة تتبع الفصيلة الفوية، وتشتهر اليمن بإنتاج أجود أنواعها تحت اسم &#039;أرابيكا&#039; في المرتفعات الجبلية.&quot;,
            &quot;growing_conditions&quot;: &quot;تحتاج إلى مناخ معتدل مع تباين درجات الحرارة بين الليل والنهار، وتفضل المدرجات الجبلية المظللة بالغمم.&quot;,
            &quot;soil_and_ph&quot;: &quot;تربة بركانية حمراء غنية بالمعادن. الـ pH المثالي: 6.0 - 6.5.&quot;,
            &quot;pests_and_diseases&quot;: &quot;حفار ساق البن، صدأ الأوراق، وحشرة البق الدقيقي.&quot;,
            &quot;harvesting_and_storage&quot;: &quot;حصاد يدوي للكرز الأحمر الناضج فقط. يجفف طبيعياً تحت الشمس على أسرة خشبية.&quot;
        },
        {
            &quot;id&quot;: 7,
            &quot;name&quot;: &quot;القطن&quot;,
            &quot;category&quot;: &quot;محاصيل نقدية&quot;,
            &quot;scientific_name&quot;: &quot;Gossypium spp.&quot;,
            &quot;description&quot;: &quot;نبات صناعي شجيري يستخرج منه الألياف القطنية وبذور لاستخلاص الزيوت، يكثر في تهامة وتُبن.&quot;,
            &quot;benefits&quot;: &quot;محصول صناعي متكامل يوفر الألياف للملابس والزيوت للاستهلاك والعلف للحيوانات.&quot;,
            &quot;uses&quot;: &quot;صناعة المنسوجات، إنتاج زيت بذرة القطن، واستخدام الكسب كعلف.&quot;,
            &quot;planting_season&quot;: &quot;ربيعي-صيفي&quot;,
            &quot;water_needs&quot;: &quot;يُروى بانتظام خاصة في مرحلة تكوين اللوز&quot;,
            &quot;watering_schedule&quot;: &quot;حسب جفاف التربة (مرتين كل 10 أيام)&quot;,
            &quot;sunlight_requirement&quot;: &quot;المناطق المفتوحة المشمسة&quot;,
            &quot;temperature&quot;: &quot;دافئ وحار&quot;,
            &quot;humidity&quot;: &quot;منخفضة جداً لتجنب تعفن الألياف&quot;,
            &quot;fertilizer_needs&quot;: &quot;أسمدة مركبة (N-P-K)&quot;,
            &quot;harvest_time&quot;: &quot;150-180 يوم&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1592924357228-91a4daadcfea?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;,
            &quot;created_at&quot;: &quot;2026-04-12T23:22:51.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T23:22:51.000000Z&quot;,
            &quot;scientific_definition&quot;: &quot;محصول ليفي زيتي يتبع الفصيلة الخبازية، تتركز زراعته في المناطق الساحلية والسهول الفيضية.&quot;,
            &quot;growing_conditions&quot;: &quot;يحتاج إلى موسم نمو حار وطويل وفترة جافة عند تفتح اللوز.&quot;,
            &quot;soil_and_ph&quot;: &quot;تربة طميية عميقة وقوية. الـ pH المثالي: 6.0 - 8.0.&quot;,
            &quot;pests_and_diseases&quot;: &quot;دودة اللوز الشوكية والمحلية، حشرة المن، وحشرة البق.&quot;,
            &quot;harvesting_and_storage&quot;: &quot;جني يدوي للألياف البيضاء عند تفتح اللوز. يخزن في بالات في أماكن جافة ومحمية من الحريق.&quot;
        },
        {
            &quot;id&quot;: 8,
            &quot;name&quot;: &quot;السمسم (الجُلجُلان)&quot;,
            &quot;category&quot;: &quot;محاصيل نقدية&quot;,
            &quot;scientific_name&quot;: &quot;Sesamum indicum&quot;,
            &quot;description&quot;: &quot;نبات ناضج للزيوت ينمو بوفرة في تهامة والمناطق الدافئة. يمتاز بهيكله المستطيل وازهاره الناعمة.&quot;,
            &quot;benefits&quot;: &quot;مصدر ممتاز للدهون الصحية والبروتين والكالسيوم.&quot;,
            &quot;uses&quot;: &quot;إنتاج زيت السمسم (السليط) بالمعاصر التقليدية، صناعة الحلويات، والمخبوزات.&quot;,
            &quot;planting_season&quot;: &quot;بداية الصيف ووقت الأمطار&quot;,
            &quot;water_needs&quot;: &quot;تحمل للعطش، ري بعلي في الغالب&quot;,
            &quot;watering_schedule&quot;: &quot;تجنب الإغراق المائي لأن جذوره حساسة&quot;,
            &quot;sunlight_requirement&quot;: &quot;شمس كاملة مشتعلة&quot;,
            &quot;temperature&quot;: &quot;حار (25 - 35 درجة)&quot;,
            &quot;humidity&quot;: &quot;يفضل الجفاف&quot;,
            &quot;fertilizer_needs&quot;: &quot;سماد عضوي خفيف قبل الزراعة&quot;,
            &quot;harvest_time&quot;: &quot;90-110 يوم&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1595124253344-7786444f1df6?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;,
            &quot;created_at&quot;: &quot;2026-04-12T23:22:51.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T23:22:51.000000Z&quot;,
            &quot;scientific_definition&quot;: &quot;محصول زيتي قديم يتبع الفصيلة السمسمية، تزرع في اليمن أصناف عالية الجودة لإنتاج زيت &#039;السليط&#039; الشعبي.&quot;,
            &quot;growing_conditions&quot;: &quot;يتطلب درجات حرارة مرتفعة وظروفاً جافة نوعاً ما. حساس جداً لزيادة المياه والملوحة.&quot;,
            &quot;soil_and_ph&quot;: &quot;تربة طميية رملية خصبة وجيدة الصرف. الـ pH المثالي: 5.5 - 7.5.&quot;,
            &quot;pests_and_diseases&quot;: &quot;ذبابة السمسم، مرض الذبول، والديدان القارضة.&quot;,
            &quot;harvesting_and_storage&quot;: &quot;يحصد عند اصفرار النبات وتفتح الكبسولات السفلية. يربط في حزم ويوقف للأعلى ليجف ويخرج البذور.&quot;
        },
        {
            &quot;id&quot;: 9,
            &quot;name&quot;: &quot;المانجو&quot;,
            &quot;category&quot;: &quot;فواكه&quot;,
            &quot;scientific_name&quot;: &quot;Mangifera indica&quot;,
            &quot;description&quot;: &quot;ملكة الفواكه الصيفية. المانجو اليمني وتحديداً &#039;قلب الثور&#039; و&#039;التيمور&#039; من أجود الأنواع التي تُنتج في تهامة والأودية الدافئة.&quot;,
            &quot;benefits&quot;: &quot;غنية جداً بفيتامين A و C، ومضادات الأكسدة التي تعزز المناعة وصحة العيون والجلد.&quot;,
            &quot;uses&quot;: &quot;تستهلك طازجة، عصائر، مربيات، أو مخلل &#039;العشار&#039; اليمني الشهير.&quot;,
            &quot;planting_season&quot;: &quot;الربيع وأوائل الخريف&quot;,
            &quot;water_needs&quot;: &quot;ري منتظم، شرهة للماء وقت تضخم الثمار&quot;,
            &quot;watering_schedule&quot;: &quot;يومي للشتلات، مرتين أسبوعياً للاشجار الكبيرة&quot;,
            &quot;sunlight_requirement&quot;: &quot;شمس كاملة قوية&quot;,
            &quot;temperature&quot;: &quot;حار (20 - 35 درجة)&quot;,
            &quot;humidity&quot;: &quot;متوسطة إلى عالية&quot;,
            &quot;fertilizer_needs&quot;: &quot;تسميد بوتاسي وفوسفوري مكثف&quot;,
            &quot;harvest_time&quot;: &quot;3-5 سنوات للإنتاج التجاري&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1553284965-83fd3e82fa5a?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;,
            &quot;created_at&quot;: &quot;2026-04-12T23:22:51.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T23:22:51.000000Z&quot;,
            &quot;scientific_definition&quot;: &quot;شجرة فاكهة استوائية معمرة تنتمي للفصيلة الالبطمية (Anacardiaceae)، وتعتبر السهول الساحلية اليمنية موطناً مثالياً لإنتاج أصناف متميزة عالمياً.&quot;,
            &quot;growing_conditions&quot;: &quot;تفضل المناطق الحارة والرطبة، وتتأثر بشدة بالصقيع. تحتاج إلى فترات جفاف عند التزهير لضمان عقد الثمار.&quot;,
            &quot;soil_and_ph&quot;: &quot;تنجح في التربة الطميية الرملية العميقة جيدة الصرف. الـ pH المثالي: 5.5 - 7.5.&quot;,
            &quot;pests_and_diseases&quot;: &quot;ذبابة الفاكهة، تشوه القمم النامية، ومرض البياض الدقيقي.&quot;,
            &quot;harvesting_and_storage&quot;: &quot;تحصد الثمار عند بدء تغير لون الجلد. تخزن في مكان مهوي للنضج، وتبرد بعد ذلك لإطالة عمرها.&quot;
        },
        {
            &quot;id&quot;: 10,
            &quot;name&quot;: &quot;الموز&quot;,
            &quot;category&quot;: &quot;فواكه&quot;,
            &quot;scientific_name&quot;: &quot;Musa paradisiaca&quot;,
            &quot;description&quot;: &quot;أشجار استوائية عشيبة كبيرة جداً تعطي غلة اقتصادية وتستهلك المياه بشكل كبير. يكثر في وديان زبيد والمناطق الرطبة الدافئة.&quot;,
            &quot;benefits&quot;: &quot;مصدر ممتاز للبوتاسيوم والطاقة السريعة، وسهل الهضم للأطفال.&quot;,
            &quot;uses&quot;: &quot;يؤكل طازجاً، أو يستخدم في الحلويات الشعبية مثل (المعصوب) اليمني.&quot;,
            &quot;planting_season&quot;: &quot;طوال العام في المناطق الدافئة&quot;,
            &quot;water_needs&quot;: &quot;استهلاك عالي جداً للمياه&quot;,
            &quot;watering_schedule&quot;: &quot;ري يومي منتظم بغزارة&quot;,
            &quot;sunlight_requirement&quot;: &quot;شمس ساطعة مع ظل خفيف أحياناً&quot;,
            &quot;temperature&quot;: &quot;حار ورطب (أعلى من 18 درجة)&quot;,
            &quot;humidity&quot;: &quot;عالية جداً&quot;,
            &quot;fertilizer_needs&quot;: &quot;تسميد نيتروجيني وبوتاسي كثيف مستمر&quot;,
            &quot;harvest_time&quot;: &quot;9-12 شهر من زراعة الخلفة&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1571771894821-ad99b1a19b46?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;,
            &quot;created_at&quot;: &quot;2026-04-12T23:22:51.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T23:22:51.000000Z&quot;,
            &quot;scientific_definition&quot;: &quot;أضخم نبات عشبي في العالم، ينمو من جذقة (ريزوم) تحت الأرض، ويتميز بقدرته على الإنتاج المستمر طوال العام عند توفر المياه.&quot;,
            &quot;growing_conditions&quot;: &quot;يتطلب درجات حرارة دافئة، رطوبة عالية، وحماية من الرياح الشديدة التي قد تمزق أوراقه الكبيرة.&quot;,
            &quot;soil_and_ph&quot;: &quot;تربة طميية عميقة غنية بالمواد العضوية مع صرف جيد. الـ pH المثالي: 6.0 - 7.5.&quot;,
            &quot;pests_and_diseases&quot;: &quot;مرض تبرقش الأوراق، خنفساء الموز، والنيماتودا.&quot;,
            &quot;harvesting_and_storage&quot;: &quot;يحصد العذق وهو لا يزال أخضر وممتلئ. يعلق في مكان دافئ ومظلم ليصفر وينضج.&quot;
        },
        {
            &quot;id&quot;: 11,
            &quot;name&quot;: &quot;البابايا (العنبب)&quot;,
            &quot;category&quot;: &quot;فواكه&quot;,
            &quot;scientific_name&quot;: &quot;Carica papaya&quot;,
            &quot;description&quot;: &quot;شجرة سريعة الإثمار ذات ساق غض وتنتج ثماراً كبيرة وحلوة على مدار السنة في المناطق الحارة.&quot;,
            &quot;benefits&quot;: &quot;تحتوي على إنزيم البابايين المساعد على الهضم، وغنية جداً بفيتامين C.&quot;,
            &quot;uses&quot;: &quot;تؤكل طازجة، عصائر، أو تستخدم الثمار الخضراء في السلطات والطبخ.&quot;,
            &quot;planting_season&quot;: &quot;بداية الصيف والربيع&quot;,
            &quot;water_needs&quot;: &quot;ري معتدل ومنتظم&quot;,
            &quot;watering_schedule&quot;: &quot;كل يومين في الصيف&quot;,
            &quot;sunlight_requirement&quot;: &quot;شمس كاملة مباشرة&quot;,
            &quot;temperature&quot;: &quot;حار (25 - 32 درجة)&quot;,
            &quot;humidity&quot;: &quot;متوسطة&quot;,
            &quot;fertilizer_needs&quot;: &quot;أسمدة متوازنة دورياً&quot;,
            &quot;harvest_time&quot;: &quot;7-10 أشهر من الزراعة&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1528652393392-cc7d50ec952e?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;,
            &quot;created_at&quot;: &quot;2026-04-12T23:22:51.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T23:22:51.000000Z&quot;,
            &quot;scientific_definition&quot;: &quot;نبات استوائي شبه خشبي قصير العمر، يشتهر بنوره العنقودي وثماره اللحمية التي تحتوي على عدد كبير من البذور السوداء الصغيرة.&quot;,
            &quot;growing_conditions&quot;: &quot;تحتاج إلى جو حار جداً، ولا تتحمل البرودة أو الرياح القوية. سريعة النمو وتثمر في العام الأول.&quot;,
            &quot;soil_and_ph&quot;: &quot;تربة رملية طميية جيدة الصرف، حساسة جداً لتجمع المياه حول الجذور. الـ pH المثالي: 6.0 - 7.0.&quot;,
            &quot;pests_and_diseases&quot;: &quot;مرض تبرقش البابايا الفيروسي، والمن، وتعفن الجذور.&quot;,
            &quot;harvesting_and_storage&quot;: &quot;تحصد الثمرة عندما يظهر عليها اللون الأصفر بنسبة 20-40%. تنضج في درجة حرارة الغرفة.&quot;
        },
        {
            &quot;id&quot;: 12,
            &quot;name&quot;: &quot;النخيل (التمر)&quot;,
            &quot;category&quot;: &quot;فواكه&quot;,
            &quot;scientific_name&quot;: &quot;Phoenix dactylifera&quot;,
            &quot;description&quot;: &quot;رمز الصمود والعراقة. يشتهر وادي حضرموت وزبيد والجوف بإنتاج أصناف فاخرة من التمور اليمنية.&quot;,
            &quot;benefits&quot;: &quot;غذاء كامل غني بالسكريات الطبيعية والمعادن والألياف، ويعتبر مخزناً استراتيجياً للغذاء.&quot;,
            &quot;uses&quot;: &quot;تؤكل ثمارها (بلح، رطب، تمر)، وتستخدم أجزاؤها في الصناعات التقليدية والسعفيات.&quot;,
            &quot;planting_season&quot;: &quot;الربيع وأوائل الخريف (للفسائل)&quot;,
            &quot;water_needs&quot;: &quot;تتحمل الجفاف ولكن تحتاج ري وقت العقد&quot;,
            &quot;watering_schedule&quot;: &quot;أسبوعي للنخيل البالغ، مكثف للفسائل&quot;,
            &quot;sunlight_requirement&quot;: &quot;شمس كاملة قوية جداً&quot;,
            &quot;temperature&quot;: &quot;حار جداً صيفاً&quot;,
            &quot;humidity&quot;: &quot;منخفضة (الجفاف ضروري للنضج)&quot;,
            &quot;fertilizer_needs&quot;: &quot;سماد عضوي بلدي ومخصبات بوتاسية&quot;,
            &quot;harvest_time&quot;: &quot;4-7 سنوات للإنتاج من الفسيلة&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1594247585090-e31c81896068?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;,
            &quot;created_at&quot;: &quot;2026-04-12T23:22:51.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T23:22:51.000000Z&quot;,
            &quot;scientific_definition&quot;: &quot;شجرة معمرة دائمة الخضرة تتبع الفصيلة النخلية، قادرة على العيش لمئات السنين وإنتاج ثمار عالية القيمة الغذائية في أقسى الظروف.&quot;,
            &quot;growing_conditions&quot;: &quot;تحتاج إلى حرارة عالية جداً وجو جاف خلال مرحلة نضج الثمار، مع توفر مياه جوفية أو ري.&quot;,
            &quot;soil_and_ph&quot;: &quot;تتحمل الملوحة العالية وتنجح في معظم أنواع التربة، مفضلة التربة العميقة. الـ pH المثالي: 7.0 - 8.5.&quot;,
            &quot;pests_and_diseases&quot;: &quot;سوسة النخيل الحمراء، حشرة دوباس النخيل، ومرض البيوض.&quot;,
            &quot;harvesting_and_storage&quot;: &quot;يتم الحصاد يدوياً في أواخر الصيف والشتاء. تجفف التمور وتخزن في أماكن باردة وجافة.&quot;
        },
        {
            &quot;id&quot;: 13,
            &quot;name&quot;: &quot;العنب&quot;,
            &quot;category&quot;: &quot;فواكه&quot;,
            &quot;scientific_name&quot;: &quot;Vitis vinifera&quot;,
            &quot;description&quot;: &quot;جودة فاخرة تاريخية. يشتهر العنب الرازقي والعاصمي والصنعاني الذي يُزرع في المرتفعات الجبلية المحيطة بصنعاء.&quot;,
            &quot;benefits&quot;: &quot;غني بالسكريات الطبيعية والفيتامينات ومضادات الأكسدة القوية في القشرة والبذور.&quot;,
            &quot;uses&quot;: &quot;يؤكل طازجاً، أو يجفف لإنتاج &#039;الزبيب&#039; اليمني الشهير بجودته العالمية.&quot;,
            &quot;planting_season&quot;: &quot;الشتاء (فترة السكون) للغراس&quot;,
            &quot;water_needs&quot;: &quot;معتدل، يقلل عند بدء النضج&quot;,
            &quot;watering_schedule&quot;: &quot;كل 5-7 أيام حسب الجو&quot;,
            &quot;sunlight_requirement&quot;: &quot;شمس ساطعة مباشرة&quot;,
            &quot;temperature&quot;: &quot;صيف معتدل إلى دافئ (20 - 30 درجة)&quot;,
            &quot;humidity&quot;: &quot;منخفضة (الجفاء يحمي من الفطريات)&quot;,
            &quot;fertilizer_needs&quot;: &quot;سماد عضوي وأسمدة بوتاسية للحلاوة&quot;,
            &quot;harvest_time&quot;: &quot;يوليو - سبتمبر&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1536257321685-2e6fca78e1b6?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;,
            &quot;created_at&quot;: &quot;2026-04-12T23:22:51.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T23:22:51.000000Z&quot;,
            &quot;scientific_definition&quot;: &quot;شجيرة متسلقة خشبية معمرة، تعتبر اليمن من أقدم مواطن زراعتها في العلم، وتتميز أصنافها بحلاوتها العالية وقدرتها على التجفيف.&quot;,
            &quot;growing_conditions&quot;: &quot;تحتاج إلى شتاء بارد (فترة سكون) وصيف دافئ جاف. تتطلب أنظمة تدعيم (تعريش) وتقليم دوري.&quot;,
            &quot;soil_and_ph&quot;: &quot;تفضل التربة الكلسية الخفيفة جيدة الصرفة. الـ pH المثالي: 6.5 - 7.5.&quot;,
            &quot;pests_and_diseases&quot;: &quot;البياض الدقيقي، البياض الزغبي، حشرة الفلوكسيرا، والطيور.&quot;,
            &quot;harvesting_and_storage&quot;: &quot;تحصد العناقيد يدوياً عند اكتمال الحلاوة. يحفظ مبرداً أو يجفف شمسياً لإنتاج الزبيب.&quot;
        },
        {
            &quot;id&quot;: 14,
            &quot;name&quot;: &quot;الرمان (خاصة)&quot;,
            &quot;category&quot;: &quot;فواكه&quot;,
            &quot;scientific_name&quot;: &quot;Punica granatum&quot;,
            &quot;description&quot;: &quot;رمان صعدة اليمني ذو الحجم الضخم والمذاق السكري الفريد. شجرة قوية تتحمل الظروف الجبلية الصعبة.&quot;,
            &quot;benefits&quot;: &quot;مقوي للقلب والدم، غني بمضادات الأكسدة والألياف.&quot;,
            &quot;uses&quot;: &quot;يؤكل طازجاً، عصائر، أو يصنع منه دبس الرمان الفاخر.&quot;,
            &quot;planting_season&quot;: &quot;أواخر الشتاء (فبراير - مارس)&quot;,
            &quot;water_needs&quot;: &quot;معتدل (يجب الحذر من زيادة الري وقت النضج لتجنب التشقق)&quot;,
            &quot;watering_schedule&quot;: &quot;كل 4-10 أيام حسب نوع التربة&quot;,
            &quot;sunlight_requirement&quot;: &quot;شمس كاملة مباشرة&quot;,
            &quot;temperature&quot;: &quot;معتدل إلى حار صيفاً&quot;,
            &quot;humidity&quot;: &quot;منخفضة (الجفاف يقلل الأمراض)&quot;,
            &quot;fertilizer_needs&quot;: &quot;سماد بلدي متحلل أور مخصبات مركبة&quot;,
            &quot;harvest_time&quot;: &quot;أغسطس - أكتوبر&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1621516086745-fce15da1d977?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;,
            &quot;created_at&quot;: &quot;2026-04-12T23:22:51.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T23:22:51.000000Z&quot;,
            &quot;scientific_definition&quot;: &quot;شجيرة أو شجرة صغيرة متساقطة الأوراق، تتبع الفصيلة الرمانية، وتشتهر اليمن بإنتاج أصناف تعد من الأفضل عالمياً من حيث الحجم والحلاوة.&quot;,
            &quot;growing_conditions&quot;: &quot;تفضل المناطق ذات الصيف الطويل والدافئ والشتاء البارد. تتحمل الجفاف والرياح.&quot;,
            &quot;soil_and_ph&quot;: &quot;تنجح في معظم أنواع التربة، حتى التربة الكلسية والملحية. الـ pH المثالي: 6.0 - 7.5.&quot;,
            &quot;pests_and_diseases&quot;: &quot;دودة ثمار الرمان، المن، والبق الدقيقي.&quot;,
            &quot;harvesting_and_storage&quot;: &quot;تحصد الثمار عند اكتمال اللون والحجم. تمتاز بقدرة تخزينية عالية في أماكن باردة.&quot;
        },
        {
            &quot;id&quot;: 15,
            &quot;name&quot;: &quot;الطماطم&quot;,
            &quot;category&quot;: &quot;خضروات&quot;,
            &quot;scientific_name&quot;: &quot;Solanum lycopersicum&quot;,
            &quot;description&quot;: &quot;المحصول الأكثر طلباً في الأسواق اليمنية. تزرع في الحقول المكشوفة والبيوت المحمية على مدار العام.&quot;,
            &quot;benefits&quot;: &quot;غنية جداً بالليكوبين (مضاد سرطان قوي) وفيتامين C والبوتاسيوم.&quot;,
            &quot;uses&quot;: &quot;أساس الطبخ اليمني، السلطات، السحاوق، والصناعات الغذائية.&quot;,
            &quot;planting_season&quot;: &quot;على مدار العام (حسب المنطقة والتقنية)&quot;,
            &quot;water_needs&quot;: &quot;ري منتظم (حساسة للجفاف أو الغرق)&quot;,
            &quot;watering_schedule&quot;: &quot;يومي أو كل يومين (ري تنقيط يفضل)&quot;,
            &quot;sunlight_requirement&quot;: &quot;شمس ساطعة (6-8 ساعات)&quot;,
            &quot;temperature&quot;: &quot;دافئ (20 - 30 درجة)&quot;,
            &quot;humidity&quot;: &quot;متوسطة&quot;,
            &quot;fertilizer_needs&quot;: &quot;أسمدة مركبة غنية بالفوسفور والبوتاسيوم&quot;,
            &quot;harvest_time&quot;: &quot;70-90 يوم من الشتل&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1592924357228-91a4daadcfea?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;,
            &quot;created_at&quot;: &quot;2026-04-12T23:22:51.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T23:22:51.000000Z&quot;,
            &quot;scientific_definition&quot;: &quot;نبات عشبي حولي من الفصيلة الباذنجانية، يتميز بنموه السريع وتعدد أصنافه وتنوع استخداماته الغذائية.&quot;,
            &quot;growing_conditions&quot;: &quot;تحتاج إلى جو دافئ وإضاءة جيدة. حساسة جداً للصقيع وللرطوبة العالية التي تسبب الأمراض.&quot;,
            &quot;soil_and_ph&quot;: &quot;تربة طميية خصبة جيدة الصرف غنية بالمادة العضوية. الـ pH المثالي: 6.0 - 6.8.&quot;,
            &quot;pests_and_diseases&quot;: &quot;حشرة التوتا أبسوليوتا، الذبابة البيضاء، واللفحة المتأخرة.&quot;,
            &quot;harvesting_and_storage&quot;: &quot;تحصد الثمار عند تلونها. تحفظ في درجة حرارة الغرفة حتى تنضج تماماً ثم تبرد.&quot;
        },
        {
            &quot;id&quot;: 16,
            &quot;name&quot;: &quot;البطاطس&quot;,
            &quot;category&quot;: &quot;خضروات&quot;,
            &quot;scientific_name&quot;: &quot;Solanum tuberosum&quot;,
            &quot;description&quot;: &quot;من أهم محاصيل الأمن الغذائي في اليمن. تنجح زراعتها في المناطق المرتفعة والماردة مثل ذمار وإب وصنعاء.&quot;,
            &quot;benefits&quot;: &quot;مصدر غني بالكربوهيدرات والطاقة، ويحتوي على مستويات عالية من البوتاسيوم وفيتامين C.&quot;,
            &quot;uses&quot;: &quot;عنصر رئيسي في وجبات &#039;الطبيخ&#039; اليمني، والمقليات، والصناعات الغذائية (الشيبس).&quot;,
            &quot;planting_season&quot;: &quot;ربيعي وخريفي&quot;,
            &quot;water_needs&quot;: &quot;ري منتظم، حساسة للعطش وقت تكوين الدرنات&quot;,
            &quot;watering_schedule&quot;: &quot;كل 3-5 أيام حسب جو المنطقة&quot;,
            &quot;sunlight_requirement&quot;: &quot;شمس كاملة ساطعة&quot;,
            &quot;temperature&quot;: &quot;معتدل (15 - 25 درجة)&quot;,
            &quot;humidity&quot;: &quot;متوسطة&quot;,
            &quot;fertilizer_needs&quot;: &quot;سماد عضوي متحلل وأسمدة بوتاسية عالية&quot;,
            &quot;harvest_time&quot;: &quot;90-120 يوم&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1518977676601-b53f82aba655?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;,
            &quot;created_at&quot;: &quot;2026-04-12T23:22:51.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T23:22:51.000000Z&quot;,
            &quot;scientific_definition&quot;: &quot;نبات درني حولي من الفصيلة الباذنجانية، يكوّن سيقاناً أرضية متضخمة (درنات) غنية بالنشا والكربوهيدرات.&quot;,
            &quot;growing_conditions&quot;: &quot;تفضل المناخ المعتدل المائل للبرودة. تحتاج إلى موسم نمو خالٍ من الصقيع مع توفر رطوبة أرضية منتظمة.&quot;,
            &quot;soil_and_ph&quot;: &quot;تربة رملية أو طميية خفيفة غنية بالمواد العضوية، جيدة التهوية لتسهيل تمدد الدرنات. الـ pH المثالي: 5.0 - 6.0.&quot;,
            &quot;pests_and_diseases&quot;: &quot;اللفحة المتأخرة، خنفساء البطاطس، والنيماتودا.&quot;,
            &quot;harvesting_and_storage&quot;: &quot;تحصد الدرنات بعد جفاف المجموع الخضري. تخزن في أماكن باردة، مظلمة، وجيدة التهوية لمنع التبرعم.&quot;
        },
        {
            &quot;id&quot;: 17,
            &quot;name&quot;: &quot;البصل&quot;,
            &quot;category&quot;: &quot;خضروات&quot;,
            &quot;scientific_name&quot;: &quot;Allium cepa&quot;,
            &quot;description&quot;: &quot;محصول استراتيجي لا غنى عنه في المطبخ اليمني. تتركز زراعتها في المناطق المرتفعة والوديان الدافئة.&quot;,
            &quot;benefits&quot;: &quot;مضاد حيوي طبيعي، مقوي للمناعة، وغني بمضادات الأكسدة.&quot;,
            &quot;uses&quot;: &quot;يدخل في معظم الأطباق اليمنية، السلطات، السحاوق، وفي العلاج الشعبي.&quot;,
            &quot;planting_season&quot;: &quot;شتوي خريفي&quot;,
            &quot;water_needs&quot;: &quot;ري منتظم يقلل عند بدء النضج&quot;,
            &quot;watering_schedule&quot;: &quot;كل 4-7 أيام حسب نوع التربة&quot;,
            &quot;sunlight_requirement&quot;: &quot;شمس كاملة مباشره&quot;,
            &quot;temperature&quot;: &quot;معتدل (15 - 28 درجة)&quot;,
            &quot;humidity&quot;: &quot;منخفضة (الجفاف يحمي من التعفن)&quot;,
            &quot;fertilizer_needs&quot;: &quot;أسمدة فوسفورية وبوتاسية&quot;,
            &quot;harvest_time&quot;: &quot;120-160 يوم من الشتل&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1618512496245-5cb25446f254?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;,
            &quot;created_at&quot;: &quot;2026-04-12T23:22:51.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T23:22:51.000000Z&quot;,
            &quot;scientific_definition&quot;: &quot;نبات عشبي ثنائي الحول يزرع كحولي، يتميز بتكوين بصلة تحت أرضية مكونة من قواعد أوراق لحمية مخزنة للغذاء.&quot;,
            &quot;growing_conditions&quot;: &quot;يحتاج إلى جو بارد خلال مرحلة النمو الخضري الأولى، وجو دافئ وجاف خلال مرحلة نضج الأبصال.&quot;,
            &quot;soil_and_ph&quot;: &quot;يفضل التربة الطميية الخفيفة الخصبة جيدة الصرف. الـ pH المثالي: 6.0 - 7.0.&quot;,
            &quot;pests_and_diseases&quot;: &quot;تربس البصل، العفن القاعدي، ومرض البياض الزغبي.&quot;,
            &quot;harvesting_and_storage&quot;: &quot;يحصد عند رقاد 50-70% من الأوراق الخضراء. يجفف &#039;يعالج&#039; في الشمس قبل التخزين في مكان جاف.&quot;
        },
        {
            &quot;id&quot;: 18,
            &quot;name&quot;: &quot;الثوم&quot;,
            &quot;category&quot;: &quot;خضروات&quot;,
            &quot;scientific_name&quot;: &quot;Allium sativum&quot;,
            &quot;description&quot;: &quot;يتميز الثوم اليمني (خاصة البلدي) برائحته النفاذة القوية وجودته العالية التي تتفوق على الأصناف المستوردة.&quot;,
            &quot;benefits&quot;: &quot;مضاد حيوي طبيعي فعال، خافض لضغط الدم والكوليسترول، ومقوي للمناعة.&quot;,
            &quot;uses&quot;: &quot;كنكهة أساسية في الطبخ، بهارات (بسباس)، وفي الوصفات العلاجية التقليدية.&quot;,
            &quot;planting_season&quot;: &quot;شتوي (أكتوبر - نوفمبر)&quot;,
            &quot;water_needs&quot;: &quot;معتدل ومنتظم، يمنع قبل الحصاد بـ 3 أسابيع&quot;,
            &quot;watering_schedule&quot;: &quot;كل 5-8 أيام حسب التربة&quot;,
            &quot;sunlight_requirement&quot;: &quot;شمس كاملة&quot;,
            &quot;temperature&quot;: &quot;بارد للنمو، دافئ للنضج&quot;,
            &quot;humidity&quot;: &quot;منخفضة (الجفاف مفضل)&quot;,
            &quot;fertilizer_needs&quot;: &quot;سماد عضوي متحلل جيداً&quot;,
            &quot;harvest_time&quot;: &quot;150-180 يوم&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1540148426941-657152eb40f1?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;,
            &quot;created_at&quot;: &quot;2026-04-12T23:22:51.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T23:22:51.000000Z&quot;,
            &quot;scientific_definition&quot;: &quot;نبات عشبي حولي من الفصيلة الثومية، يتكون من فصوص مجتمعة حول ساق كاذبة، وهو من أقدم التوابل والمضادات الحيوية المعروفة.&quot;,
            &quot;growing_conditions&quot;: &quot;يتطلب جواً بارداً أثناء نمو الفصوص، وجواً دافئاً وجافاً عند النضج وجفاف المجموع الخضري.&quot;,
            &quot;soil_and_ph&quot;: &quot;تربة طميية خفيفة غنية بالمواد العضوية مع صرف ممتاز. الـ pH المثالي: 6.5 - 7.5.&quot;,
            &quot;pests_and_diseases&quot;: &quot;صدأ الثوم، العفن الأبيض، وتربس البصل.&quot;,
            &quot;harvesting_and_storage&quot;: &quot;يحصد عند اصفرار وجفاف الأوراق. يربط في حزم ويجفف في مكان مظلل وجاف جيد التهوية.&quot;
        },
        {
            &quot;id&quot;: 19,
            &quot;name&quot;: &quot;الباميا&quot;,
            &quot;category&quot;: &quot;خضروات&quot;,
            &quot;scientific_name&quot;: &quot;Abelmoschus esculentus&quot;,
            &quot;description&quot;: &quot;محصول صيفي محب للحرارة. تتميز الباميا اليمنية بطراوتها ومذاقها الفريد، وتزرع بكثرة في تهامة ولحج.&quot;,
            &quot;benefits&quot;: &quot;غنية بالألياف، فيتامين K، وحمض الفوليك، ومفيدة جداً لصحة الجهاز الهضمي.&quot;,
            &quot;uses&quot;: &quot;تطبخ في المرق (طبيخ الباميا) أو الملوخة، وتجفف أيضاً للاستهلاك الشتوي (الباميا الناشفة).&quot;,
            &quot;planting_season&quot;: &quot;صيفي (فبراير - يوليو)&quot;,
            &quot;water_needs&quot;: &quot;ري منتظم ومعتدل&quot;,
            &quot;watering_schedule&quot;: &quot;كل 2-4 أيام حسب الحرارة&quot;,
            &quot;sunlight_requirement&quot;: &quot;شمس كاملة قوية&quot;,
            &quot;temperature&quot;: &quot;حار (25 - 35 درجة)&quot;,
            &quot;humidity&quot;: &quot;متوسطة&quot;,
            &quot;fertilizer_needs&quot;: &quot;سماد بلدي وأسمدة مركبة دورياً&quot;,
            &quot;harvest_time&quot;: &quot;50-60 يوم من الزراعة&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1444732328340-a1c3c3e3c3c3?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;,
            &quot;created_at&quot;: &quot;2026-04-12T23:22:51.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T23:22:51.000000Z&quot;,
            &quot;scientific_definition&quot;: &quot;نبات عشبي حولي يتبع الفصيلة الخبازية، يزرع من أجل ثمار القرون الخضراء الهشة التي تحتوي على بذور صغيرة ومادة هلامية.&quot;,
            &quot;growing_conditions&quot;: &quot;تحتاج إلى درجات حرارة مرتفعة ولا تتحمل الصقيع. تزدهر في المناطق الساحلية والأودية الحارة.&quot;,
            &quot;soil_and_ph&quot;: &quot;تربة طميية خصبة غنية بالمواد العضوية جيدة الصرف. الـ pH المثالي: 6.0 - 7.0.&quot;,
            &quot;pests_and_diseases&quot;: &quot;دودة ورق القطن، المن، ومرض البياض الدقيقي.&quot;,
            &quot;harvesting_and_storage&quot;: &quot;تحصد القرون وهي صغيرة (4-7 سم) وهشة قبل أن تصبح ليفية. تستهلك طازجة أو تجفف.&quot;
        },
        {
            &quot;id&quot;: 20,
            &quot;name&quot;: &quot;الخيار&quot;,
            &quot;category&quot;: &quot;خضروات&quot;,
            &quot;scientific_name&quot;: &quot;Cucumis sativus&quot;,
            &quot;description&quot;: &quot;محصول صيفي سريع النمو. يزرع بكثافة في تهامة وفي البيوت المحمية في المناطق المعتدلة والباردة.&quot;,
            &quot;benefits&quot;: &quot;مرطب ممتاز للجسم، مدر للبول، ومنخفض السعرات الحرارية.&quot;,
            &quot;uses&quot;: &quot;يؤكل طازجاً، في السلطات، المقبلات، وصناعة المخللات.&quot;,
            &quot;planting_season&quot;: &quot;ربيعي-صيفي على مدار العام في الصوب&quot;,
            &quot;water_needs&quot;: &quot;ري منتظم وكثيف (حساس للعطش)&quot;,
            &quot;watering_schedule&quot;: &quot;يومي (يفضل الري بالتنقيط)&quot;,
            &quot;sunlight_requirement&quot;: &quot;شمس كاملة أو ظل خفيف جداً&quot;,
            &quot;temperature&quot;: &quot;دافئ (20 - 30 درجة)&quot;,
            &quot;humidity&quot;: &quot;عالية قليلاً&quot;,
            &quot;fertilizer_needs&quot;: &quot;أسمدة مركبة N-P-K خاصة في مرحلة التزهير&quot;,
            &quot;harvest_time&quot;: &quot;45-60 يوم من الزراعة&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1449300079323-02e209d9d3a6?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;,
            &quot;created_at&quot;: &quot;2026-04-12T23:22:51.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T23:22:51.000000Z&quot;,
            &quot;scientific_definition&quot;: &quot;نبات عشبي حولي متسلق من الفصيلة القرعية، يتميز بنمو سريع جداً وإنتاج ثمار مائية منعشة.&quot;,
            &quot;growing_conditions&quot;: &quot;يحتاج إلى درجات حرارة دافئة نهاراً ورطوبة أرضية وجوية معتدلة. حساس جداً للصقيع وللرياح القوية.&quot;,
            &quot;soil_and_ph&quot;: &quot;تربة طميية خفيفة غنية بالمواد العضوية سريعة الصرف. الـ pH المثالي: 6.0 - 7.0.&quot;,
            &quot;pests_and_diseases&quot;: &quot;المن، العنكبوت الأحمر، ومرض البياض الزغبي.&quot;,
            &quot;harvesting_and_storage&quot;: &quot;تحصد الثمار وهي خضراء شابة قبل كبر البذور. يستهلك طازجاً ولا يتحمل التخزين الطويل.&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-crop-guides" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-crop-guides"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-crop-guides"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-crop-guides" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-crop-guides">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-crop-guides" data-method="GET"
      data-path="api/crop-guides"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-crop-guides', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-crop-guides"
                    onclick="tryItOut('GETapi-crop-guides');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-crop-guides"
                    onclick="cancelTryOut('GETapi-crop-guides');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-crop-guides"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/crop-guides</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-crop-guides"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-crop-guides"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-crop-guides-search">Search remotely using service logic.</h2>

<p>
</p>



<span id="example-requests-GETapi-crop-guides-search">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://192.168.8.32:8000/api/crop-guides/search" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"query\": \"vmqeopfuudtdsufvyvddqamniihfqcoynlazghdtqtqxbajwbpilpmufinllwloauydlsmsjur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/crop-guides/search"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "query": "vmqeopfuudtdsufvyvddqamniihfqcoynlazghdtqtqxbajwbpilpmufinllwloauydlsmsjur"
};

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-crop-guides-search">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 59
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;لم نتمكن من العثور على معلومات حول هذا النبات حالياً.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-crop-guides-search" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-crop-guides-search"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-crop-guides-search"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-crop-guides-search" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-crop-guides-search">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-crop-guides-search" data-method="GET"
      data-path="api/crop-guides/search"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-crop-guides-search', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-crop-guides-search"
                    onclick="tryItOut('GETapi-crop-guides-search');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-crop-guides-search"
                    onclick="cancelTryOut('GETapi-crop-guides-search');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-crop-guides-search"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/crop-guides/search</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-crop-guides-search"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-crop-guides-search"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>query</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="query"                data-endpoint="GETapi-crop-guides-search"
               value="vmqeopfuudtdsufvyvddqamniihfqcoynlazghdtqtqxbajwbpilpmufinllwloauydlsmsjur"
               data-component="body">
    <br>
<p>يجب أن يكون طول نص حقل value على الأقل 2 حروفٍ/حرفًا. Example: <code>vmqeopfuudtdsufvyvddqamniihfqcoynlazghdtqtqxbajwbpilpmufinllwloauydlsmsjur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-plants">GET api/plants</h2>

<p>
</p>



<span id="example-requests-GETapi-plants">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://192.168.8.32:8000/api/plants" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/plants"
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

<span id="example-responses-GETapi-plants">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 59
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;scientific_name&quot;: &quot;Sorghum bicolor&quot;,
            &quot;common_name&quot;: &quot;الذرة الرفيعة&quot;,
            &quot;description&quot;: &quot;نبات حبوب سنوي مقاوم للجفاف، يُزرع بكثرة في المرتفعات والمناطق الجافة في اليمن.&quot;,
            &quot;benefits&quot;: &quot;مصدر غني بالكربوهيدرات والبروتين والألياف. يستخدم السيقان الخضراء كعلف للماشية.&quot;,
            &quot;growth_guide&quot;: &quot;التعريف العلمي: نبات عشبي حولي من الفصيلة النجيلية، يتميز بقدرته العالية على تحمل الجفاف والحرارة العالية، ويعد ثالث أهم محصول حبوب في اليمن من حيث المساحة والإنتاج.\n\nظروف النمو: يزدهر في درجات حرارة بين 25-30 درجة مئوية. يتطلب موسم نمو طويل ودافئ وجاف نسبياً عند النضج.\n\nالتربة والحموضة: يفضل التربة الطميية الرملية جيدة الصرف. الـ pH المثالي: 6.0 - 7.5.\n\nالآفات والأمراض: دودة الحشد الخريفية، ذبابة ثمار الذرة، ومرض التفحم.\n\nالحصاد والتخزين: يتم الحصاد عند جفاف الحبوب وتصلبها. تخزن في &#039;المدافن&#039; التقليدية لحمايتها من الرطوبة والآفات.&quot;,
            &quot;difficulty_level&quot;: &quot;متوسط&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 27,
                &quot;name&quot;: &quot;حبوب&quot;,
                &quot;description&quot;: &quot;الذرة الرفيعة، القمح، الدخن، الشعير...&quot;
            },
            &quot;care_guide&quot;: {
                &quot;id&quot;: 1,
                &quot;watering_schedule&quot;: &quot;متباعد جدا، مقاوم للجفاف&quot;,
                &quot;sunlight_requirement&quot;: &quot;شمس كاملة قوية&quot;,
                &quot;temperature&quot;: &quot;معتدل إلى حار&quot;,
                &quot;humidity&quot;: &quot;منخفضة إلى متوسطة&quot;,
                &quot;min_temp&quot;: 25,
                &quot;max_temp&quot;: 30,
                &quot;light_type&quot;: &quot;شمس كاملة قوية&quot;,
                &quot;rainfall&quot;: &quot;بعلية أساسًا، ري خفيف&quot;,
                &quot;min_humidity&quot;: 40,
                &quot;max_humidity&quot;: 70,
                &quot;irrigation_level&quot;: &quot;بعلية أساسًا، ري خفيف&quot;,
                &quot;life_cycle&quot;: &quot;متوسطة&quot;,
                &quot;cultivation_method&quot;: &quot;بذر مباشر&quot;,
                &quot;planting_depth&quot;: &quot;2-5 سم&quot;,
                &quot;soil_texture&quot;: &quot;يفضل التربة الطميية الرملية جيدة الصرف&quot;,
                &quot;min_ph&quot;: 6,
                &quot;max_ph&quot;: 7.5,
                &quot;seed_rate&quot;: &quot;10-15 كجم/هكتار&quot;,
                &quot;n_amount&quot;: 80,
                &quot;p_amount&quot;: 40,
                &quot;k_amount&quot;: 40,
                &quot;companion_plants&quot;: &quot;البقوليات، الأعشاب العطرية&quot;,
                &quot;combative_plants&quot;: &quot;الأعشاب الضارة، المحاصيل المنافسة&quot;,
                &quot;management_tips&quot;: &quot;دودة الحشد الخريفية، ذبابة ثمار الذرة، ومرض التفحم.&quot;,
                &quot;succeeding_crops&quot;: &quot;البقوليات (لتحسين النيتروجين)&quot;,
                &quot;forbidden_crops&quot;: &quot;نفس العائلة النباتية&quot;,
                &quot;rotation_recommendation&quot;: &quot;دورة ثلاثية (حبوب - بقوليات - خضروات)&quot;
            },
            &quot;planting_season&quot;: &quot;صيفي وخريفي وبيني&quot;,
            &quot;harvest_time&quot;: &quot;90-120 يوم&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1596489823521-707db99d2595?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;,
            &quot;thumb_url&quot;: &quot;https://images.unsplash.com/photo-1596489823521-707db99d2595?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;scientific_name&quot;: &quot;Pennisetum glaucum&quot;,
            &quot;common_name&quot;: &quot;الدخن&quot;,
            &quot;description&quot;: &quot;نبات حبوب سنوي مقاوم جدًا للجفاف، ينمو في تربة فقيرة ومنتشر في تهامة.&quot;,
            &quot;benefits&quot;: &quot;خالٍ من الجلوتين، غني بالحديد والمغنيسيوم والبوتاسيوم.&quot;,
            &quot;growth_guide&quot;: &quot;التعريف العلمي: من أقوى المحاصيل النجيلية تحملاً للظروف الصحراوية القاسية، يتميز بإنتاج سنابل طويلة مليئة بالحبوب الصغيرة المغذية.\n\nظروف النمو: يتطلب درجات حرارة مرتفعة جداً ولا يتحمل الصقيع. يزرع غالباً في المناطق الساحلية (تهامة).\n\nالتربة والحموضة: ينمو جيداً في التربة الرملية الفقيرة والحامضية قليلاً. الـ pH المثالي: 5.5 - 7.0.\n\nالآفات والأمراض: مرض البياض الزغبي، الحشرات الثاقبة للساق، والطيور التي تهاجم السنابل.\n\nالحصاد والتخزين: يحصد يدوياً عند تحول لون السنابل إلى البني الفاتح. يجب تجفيفه جيداً تحت الشمس قبل التخزين.&quot;,
            &quot;difficulty_level&quot;: &quot;متوسط&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 27,
                &quot;name&quot;: &quot;حبوب&quot;,
                &quot;description&quot;: &quot;الذرة الرفيعة، القمح، الدخن، الشعير...&quot;
            },
            &quot;care_guide&quot;: {
                &quot;id&quot;: 2,
                &quot;watering_schedule&quot;: &quot;لا يحتاج لسقاية يومية، بعلي&quot;,
                &quot;sunlight_requirement&quot;: &quot;شمس كاملة&quot;,
                &quot;temperature&quot;: &quot;حار&quot;,
                &quot;humidity&quot;: &quot;متدنية&quot;,
                &quot;min_temp&quot;: null,
                &quot;max_temp&quot;: null,
                &quot;light_type&quot;: &quot;شمس كاملة&quot;,
                &quot;rainfall&quot;: &quot;ري متباعد جداً&quot;,
                &quot;min_humidity&quot;: 40,
                &quot;max_humidity&quot;: 70,
                &quot;irrigation_level&quot;: &quot;ري متباعد جداً&quot;,
                &quot;life_cycle&quot;: &quot;متوسطة&quot;,
                &quot;cultivation_method&quot;: &quot;بذر مباشر&quot;,
                &quot;planting_depth&quot;: &quot;2-5 سم&quot;,
                &quot;soil_texture&quot;: &quot;ينمو جيداً في التربة الرملية الفقيرة والحامضية قليلاً&quot;,
                &quot;min_ph&quot;: 5.5,
                &quot;max_ph&quot;: 7,
                &quot;seed_rate&quot;: &quot;10-15 كجم/هكتار&quot;,
                &quot;n_amount&quot;: 80,
                &quot;p_amount&quot;: 40,
                &quot;k_amount&quot;: 40,
                &quot;companion_plants&quot;: &quot;البقوليات، الأعشاب العطرية&quot;,
                &quot;combative_plants&quot;: &quot;الأعشاب الضارة، المحاصيل المنافسة&quot;,
                &quot;management_tips&quot;: &quot;مرض البياض الزغبي، الحشرات الثاقبة للساق، والطيور التي تهاجم السنابل.&quot;,
                &quot;succeeding_crops&quot;: &quot;البقوليات (لتحسين النيتروجين)&quot;,
                &quot;forbidden_crops&quot;: &quot;نفس العائلة النباتية&quot;,
                &quot;rotation_recommendation&quot;: &quot;دورة ثلاثية (حبوب - بقوليات - خضروات)&quot;
            },
            &quot;planting_season&quot;: &quot;الخريف (أغسطس-سبتمبر)&quot;,
            &quot;harvest_time&quot;: &quot;70-90 يوم&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;,
            &quot;thumb_url&quot;: &quot;https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;scientific_name&quot;: &quot;Zea mays&quot;,
            &quot;common_name&quot;: &quot;الذرة الشامية&quot;,
            &quot;description&quot;: &quot;نبات حبوب سنوي يُزرع بشكل واسع ويعد أساسياً للغذاء والعلف.&quot;,
            &quot;benefits&quot;: &quot;مصدر طاقة سريع، غني بالألياف وفيتامين ب والنشويات.&quot;,
            &quot;growth_guide&quot;: &quot;التعريف العلمي: محصول استراتيجي يتبع الفصيلة النجيلية، يتميز بسيقان طويلة وقوية وأعراق مليئة بالحبوب الصفراء أو البيضاء.\n\nظروف النمو: يحتاج إلى درجات حرارة دافئة (20-30 درجة مئوية) وتوزيع جيد للأمطار أو الري خلال فترة التزهير.\n\nالتربة والحموضة: تربة طميية خصبة غنية بالمادة العضوية. الـ pH المثالي: 6.0 - 7.0.\n\nالآفات والأمراض: دودة ورق القطن، حفار الساق، الصدأ، والتفحم.\n\nالحصاد والتخزين: يحصد عند جفاف الأوراق الخارجية للعرن وتصلب الحبوب. يخزن في أماكن جافة ومهوية.&quot;,
            &quot;difficulty_level&quot;: &quot;متوسط&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 27,
                &quot;name&quot;: &quot;حبوب&quot;,
                &quot;description&quot;: &quot;الذرة الرفيعة، القمح، الدخن، الشعير...&quot;
            },
            &quot;care_guide&quot;: {
                &quot;id&quot;: 3,
                &quot;watering_schedule&quot;: &quot;ري منتظم أسبوعي&quot;,
                &quot;sunlight_requirement&quot;: &quot;شمس كاملة (7-8 ساعات)&quot;,
                &quot;temperature&quot;: &quot;معتدل إلى حار&quot;,
                &quot;humidity&quot;: &quot;متوسطة&quot;,
                &quot;min_temp&quot;: 20,
                &quot;max_temp&quot;: 30,
                &quot;light_type&quot;: &quot;شمس كاملة (7-8 ساعات)&quot;,
                &quot;rainfall&quot;: &quot;يحتاج مياه أكثر من الذرة الرفيعة&quot;,
                &quot;min_humidity&quot;: 40,
                &quot;max_humidity&quot;: 70,
                &quot;irrigation_level&quot;: &quot;يحتاج مياه أكثر من الذرة الرفيعة&quot;,
                &quot;life_cycle&quot;: &quot;متوسطة&quot;,
                &quot;cultivation_method&quot;: &quot;بذر مباشر&quot;,
                &quot;planting_depth&quot;: &quot;2-5 سم&quot;,
                &quot;soil_texture&quot;: &quot;تربة طميية خصبة غنية بالمادة العضوية&quot;,
                &quot;min_ph&quot;: 6,
                &quot;max_ph&quot;: 7,
                &quot;seed_rate&quot;: &quot;10-15 كجم/هكتار&quot;,
                &quot;n_amount&quot;: 80,
                &quot;p_amount&quot;: 40,
                &quot;k_amount&quot;: 40,
                &quot;companion_plants&quot;: &quot;البقوليات، الأعشاب العطرية&quot;,
                &quot;combative_plants&quot;: &quot;الأعشاب الضارة، المحاصيل المنافسة&quot;,
                &quot;management_tips&quot;: &quot;دودة ورق القطن، حفار الساق، الصدأ، والتفحم.&quot;,
                &quot;succeeding_crops&quot;: &quot;البقوليات (لتحسين النيتروجين)&quot;,
                &quot;forbidden_crops&quot;: &quot;نفس العائلة النباتية&quot;,
                &quot;rotation_recommendation&quot;: &quot;دورة ثلاثية (حبوب - بقوليات - خضروات)&quot;
            },
            &quot;planting_season&quot;: &quot;صيفي وربيعي&quot;,
            &quot;harvest_time&quot;: &quot;80-110 يوم&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1551727974-8af20a3322f1?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;,
            &quot;thumb_url&quot;: &quot;https://images.unsplash.com/photo-1551727974-8af20a3322f1?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;scientific_name&quot;: &quot;Triticum aestivum&quot;,
            &quot;common_name&quot;: &quot;القمح (البر)&quot;,
            &quot;description&quot;: &quot;شريان الحياة والمحصول الرئيسي في المرتفعات اليمنية لصناعة الخبز.&quot;,
            &quot;benefits&quot;: &quot;البر اليمني مشهور بجودته العالية وقيمته الغذائية الكبيرة.&quot;,
            &quot;growth_guide&quot;: &quot;التعريف العلمي: المحصول الغذائي الأول عالمياً، وهو نبات حولي يزرع من أجل حبوبه التي تطحن لصناعة الطحين.\n\nظروف النمو: يزرع في المناطق الباردة والمعتدلة (المرتفعات). يتطلب برودة في مرحلة النمو الأولي ودفئاً عند النضج.\n\nالتربة والحموضة: تربة طينية خفيفة أو طميية جيدة التهوية. الـ pH المثالي: 6.0 - 7.5.\n\nالآفات والأمراض: حشرة السونة، حشرة المن، أمراض الأصداء (الأسود والأصفر).\n\nالحصاد والتخزين: يحصد عند جفاف السيقان والسنابل تماماً. يدرس ويخزن في مخازن محمية من القوارض والرطوبة.&quot;,
            &quot;difficulty_level&quot;: &quot;متوسط&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 27,
                &quot;name&quot;: &quot;حبوب&quot;,
                &quot;description&quot;: &quot;الذرة الرفيعة، القمح، الدخن، الشعير...&quot;
            },
            &quot;care_guide&quot;: {
                &quot;id&quot;: 4,
                &quot;watering_schedule&quot;: &quot;كل أسبوع إلى 10 أيام&quot;,
                &quot;sunlight_requirement&quot;: &quot;يفضل الشمس المباشرة&quot;,
                &quot;temperature&quot;: &quot;معتدل مائل للبرودة&quot;,
                &quot;humidity&quot;: &quot;منخفضة نسبياً&quot;,
                &quot;min_temp&quot;: null,
                &quot;max_temp&quot;: null,
                &quot;light_type&quot;: &quot;يفضل الشمس المباشرة&quot;,
                &quot;rainfall&quot;: &quot;معتدل في بداية نموه&quot;,
                &quot;min_humidity&quot;: 40,
                &quot;max_humidity&quot;: 70,
                &quot;irrigation_level&quot;: &quot;معتدل في بداية نموه&quot;,
                &quot;life_cycle&quot;: &quot;متوسطة&quot;,
                &quot;cultivation_method&quot;: &quot;بذر مباشر&quot;,
                &quot;planting_depth&quot;: &quot;2-5 سم&quot;,
                &quot;soil_texture&quot;: &quot;تربة طينية خفيفة أو طميية جيدة التهوية&quot;,
                &quot;min_ph&quot;: 6,
                &quot;max_ph&quot;: 7.5,
                &quot;seed_rate&quot;: &quot;10-15 كجم/هكتار&quot;,
                &quot;n_amount&quot;: 80,
                &quot;p_amount&quot;: 40,
                &quot;k_amount&quot;: 40,
                &quot;companion_plants&quot;: &quot;البقوليات، الأعشاب العطرية&quot;,
                &quot;combative_plants&quot;: &quot;الأعشاب الضارة، المحاصيل المنافسة&quot;,
                &quot;management_tips&quot;: &quot;حشرة السونة، حشرة المن، أمراض الأصداء (الأسود والأصفر).&quot;,
                &quot;succeeding_crops&quot;: &quot;البقوليات (لتحسين النيتروجين)&quot;,
                &quot;forbidden_crops&quot;: &quot;نفس العائلة النباتية&quot;,
                &quot;rotation_recommendation&quot;: &quot;دورة ثلاثية (حبوب - بقوليات - خضروات)&quot;
            },
            &quot;planting_season&quot;: &quot;شتوي وصيفي حسب الأمطار&quot;,
            &quot;harvest_time&quot;: &quot;120-150 يوم&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1501431821157-a7eb76ca553b?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;,
            &quot;thumb_url&quot;: &quot;https://images.unsplash.com/photo-1501431821157-a7eb76ca553b?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;
        },
        {
            &quot;id&quot;: 5,
            &quot;scientific_name&quot;: &quot;Hordeum vulgare&quot;,
            &quot;common_name&quot;: &quot;الشعير&quot;,
            &quot;description&quot;: &quot;نبات حبوب يتحمل الطقس البارد والتربة الجافة، ينجح في المدرجات المرتفعة.&quot;,
            &quot;benefits&quot;: &quot;غني بالألياف الذائبة، مفيد لصحة القلب والجهاز الهضمي.&quot;,
            &quot;growth_guide&quot;: &quot;التعريف العلمي: أقدم محصول حبوب عرفه الإنسان، يتميز بقدرته الفائقة على تحمل الملوحة والجفاف والبرودة القاسية.\n\nظروف النمو: ينمو في المرتفعات العالية جداً حيث تفشل المحاصيل الأخرى بسبب البرودة.\n\nالتربة والحموضة: يتحمل التربة القلوية والملحية بشكل جيد. الـ pH المثالي: 7.0 - 8.5.\n\nالآفات والأمراض: مرض التبقع الورقي، التفحم السائب، والمن.\n\nالحصاد والتخزين: يحصد عند النضج التام وجفاف الحبوب. يمتاز بقدرة تخزينية عالية جداً.&quot;,
            &quot;difficulty_level&quot;: &quot;متوسط&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 27,
                &quot;name&quot;: &quot;حبوب&quot;,
                &quot;description&quot;: &quot;الذرة الرفيعة، القمح، الدخن، الشعير...&quot;
            },
            &quot;care_guide&quot;: {
                &quot;id&quot;: 5,
                &quot;watering_schedule&quot;: &quot;قليل جداً&quot;,
                &quot;sunlight_requirement&quot;: &quot;شمس كاملة&quot;,
                &quot;temperature&quot;: &quot;بارد نسبيا&quot;,
                &quot;humidity&quot;: &quot;منخفضة&quot;,
                &quot;min_temp&quot;: null,
                &quot;max_temp&quot;: null,
                &quot;light_type&quot;: &quot;شمس كاملة&quot;,
                &quot;rainfall&quot;: &quot;يعتمد على الأمطار (بعلي)&quot;,
                &quot;min_humidity&quot;: 40,
                &quot;max_humidity&quot;: 70,
                &quot;irrigation_level&quot;: &quot;يعتمد على الأمطار (بعلي)&quot;,
                &quot;life_cycle&quot;: &quot;متوسطة&quot;,
                &quot;cultivation_method&quot;: &quot;بذر مباشر&quot;,
                &quot;planting_depth&quot;: &quot;2-5 سم&quot;,
                &quot;soil_texture&quot;: &quot;يتحمل التربة القلوية والملحية بشكل جيد&quot;,
                &quot;min_ph&quot;: 7,
                &quot;max_ph&quot;: 8.5,
                &quot;seed_rate&quot;: &quot;10-15 كجم/هكتار&quot;,
                &quot;n_amount&quot;: 80,
                &quot;p_amount&quot;: 40,
                &quot;k_amount&quot;: 40,
                &quot;companion_plants&quot;: &quot;البقوليات، الأعشاب العطرية&quot;,
                &quot;combative_plants&quot;: &quot;الأعشاب الضارة، المحاصيل المنافسة&quot;,
                &quot;management_tips&quot;: &quot;مرض التبقع الورقي، التفحم السائب، والمن.&quot;,
                &quot;succeeding_crops&quot;: &quot;البقوليات (لتحسين النيتروجين)&quot;,
                &quot;forbidden_crops&quot;: &quot;نفس العائلة النباتية&quot;,
                &quot;rotation_recommendation&quot;: &quot;دورة ثلاثية (حبوب - بقوليات - خضروات)&quot;
            },
            &quot;planting_season&quot;: &quot;شتوي&quot;,
            &quot;harvest_time&quot;: &quot;100-130 يوم&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1534067783941-51c9c22eada3?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;,
            &quot;thumb_url&quot;: &quot;https://images.unsplash.com/photo-1534067783941-51c9c22eada3?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;
        },
        {
            &quot;id&quot;: 6,
            &quot;scientific_name&quot;: &quot;Coffea arabica&quot;,
            &quot;common_name&quot;: &quot;البن&quot;,
            &quot;description&quot;: &quot;واحدة من أثمن الأشجار النقدية العالمية. يزرع البن &#039;العربي&#039; ذو الجودة الاستثنائية في مدرجات حراز ويافع وغيرها.&quot;,
            &quot;benefits&quot;: &quot;يعتبر البن اليمني من أفضل أنواع القهوة عالمياً، ويعد فخر المحاصيل التصديرية التاريخية.&quot;,
            &quot;growth_guide&quot;: &quot;التعريف العلمي: شجيرة معمرة تتبع الفصيلة الفوية، وتشتهر اليمن بإنتاج أجود أنواعها تحت اسم &#039;أرابيكا&#039; في المرتفعات الجبلية.\n\nظروف النمو: تحتاج إلى مناخ معتدل مع تباين درجات الحرارة بين الليل والنهار، وتفضل المدرجات الجبلية المظللة بالغمم.\n\nالتربة والحموضة: تربة بركانية حمراء غنية بالمعادن. الـ pH المثالي: 6.0 - 6.5.\n\nالآفات والأمراض: حفار ساق البن، صدأ الأوراق، وحشرة البق الدقيقي.\n\nالحصاد والتخزين: حصاد يدوي للكرز الأحمر الناضج فقط. يجفف طبيعياً تحت الشمس على أسرة خشبية.&quot;,
            &quot;difficulty_level&quot;: &quot;متوسط&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 30,
                &quot;name&quot;: &quot;محاصيل نقدية&quot;,
                &quot;description&quot;: &quot;القات، البن اليمني، القطن، السمسم...&quot;
            },
            &quot;care_guide&quot;: {
                &quot;id&quot;: 6,
                &quot;watering_schedule&quot;: &quot;مرتين أسبوعياً (حسب طبيعة التُربة)&quot;,
                &quot;sunlight_requirement&quot;: &quot;شمس غير مباشرة، يفضل زراعته تحت شجر مظلل&quot;,
                &quot;temperature&quot;: &quot;معتدل 15-25&quot;,
                &quot;humidity&quot;: &quot;متوسطة-عالية&quot;,
                &quot;min_temp&quot;: null,
                &quot;max_temp&quot;: null,
                &quot;light_type&quot;: &quot;شمس غير مباشرة، يفضل زراعته تحت شجر مظلل&quot;,
                &quot;rainfall&quot;: &quot;معتدل، ري منتظم بالذات عند الإزهار&quot;,
                &quot;min_humidity&quot;: 40,
                &quot;max_humidity&quot;: 70,
                &quot;irrigation_level&quot;: &quot;معتدل، ري منتظم بالذات عند الإزهار&quot;,
                &quot;life_cycle&quot;: &quot;متوسطة&quot;,
                &quot;cultivation_method&quot;: &quot;بذر مباشر&quot;,
                &quot;planting_depth&quot;: &quot;2-5 سم&quot;,
                &quot;soil_texture&quot;: &quot;تربة بركانية حمراء غنية بالمعادن&quot;,
                &quot;min_ph&quot;: 6,
                &quot;max_ph&quot;: 6.5,
                &quot;seed_rate&quot;: &quot;10-15 كجم/هكتار&quot;,
                &quot;n_amount&quot;: 80,
                &quot;p_amount&quot;: 40,
                &quot;k_amount&quot;: 40,
                &quot;companion_plants&quot;: &quot;البقوليات، الأعشاب العطرية&quot;,
                &quot;combative_plants&quot;: &quot;الأعشاب الضارة، المحاصيل المنافسة&quot;,
                &quot;management_tips&quot;: &quot;حفار ساق البن، صدأ الأوراق، وحشرة البق الدقيقي.&quot;,
                &quot;succeeding_crops&quot;: &quot;البقوليات (لتحسين النيتروجين)&quot;,
                &quot;forbidden_crops&quot;: &quot;نفس العائلة النباتية&quot;,
                &quot;rotation_recommendation&quot;: &quot;دورة ثلاثية (حبوب - بقوليات - خضروات)&quot;
            },
            &quot;planting_season&quot;: &quot;الربيع وأوائل الخريف&quot;,
            &quot;harvest_time&quot;: &quot;أكتوبر-ديسمبر (بعد 3-4 سنوات للإنتاج)&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;,
            &quot;thumb_url&quot;: &quot;https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;
        },
        {
            &quot;id&quot;: 7,
            &quot;scientific_name&quot;: &quot;Gossypium spp.&quot;,
            &quot;common_name&quot;: &quot;القطن&quot;,
            &quot;description&quot;: &quot;نبات صناعي شجيري يستخرج منه الألياف القطنية وبذور لاستخلاص الزيوت، يكثر في تهامة وتُبن.&quot;,
            &quot;benefits&quot;: &quot;محصول صناعي متكامل يوفر الألياف للملابس والزيوت للاستهلاك والعلف للحيوانات.&quot;,
            &quot;growth_guide&quot;: &quot;التعريف العلمي: محصول ليفي زيتي يتبع الفصيلة الخبازية، تتركز زراعته في المناطق الساحلية والسهول الفيضية.\n\nظروف النمو: يحتاج إلى موسم نمو حار وطويل وفترة جافة عند تفتح اللوز.\n\nالتربة والحموضة: تربة طميية عميقة وقوية. الـ pH المثالي: 6.0 - 8.0.\n\nالآفات والأمراض: دودة اللوز الشوكية والمحلية، حشرة المن، وحشرة البق.\n\nالحصاد والتخزين: جني يدوي للألياف البيضاء عند تفتح اللوز. يخزن في بالات في أماكن جافة ومحمية من الحريق.&quot;,
            &quot;difficulty_level&quot;: &quot;متوسط&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 30,
                &quot;name&quot;: &quot;محاصيل نقدية&quot;,
                &quot;description&quot;: &quot;القات، البن اليمني، القطن، السمسم...&quot;
            },
            &quot;care_guide&quot;: {
                &quot;id&quot;: 7,
                &quot;watering_schedule&quot;: &quot;حسب جفاف التربة (مرتين كل 10 أيام)&quot;,
                &quot;sunlight_requirement&quot;: &quot;المناطق المفتوحة المشمسة&quot;,
                &quot;temperature&quot;: &quot;دافئ وحار&quot;,
                &quot;humidity&quot;: &quot;منخفضة جداً لتجنب تعفن الألياف&quot;,
                &quot;min_temp&quot;: null,
                &quot;max_temp&quot;: null,
                &quot;light_type&quot;: &quot;المناطق المفتوحة المشمسة&quot;,
                &quot;rainfall&quot;: &quot;يُروى بانتظام خاصة في مرحلة تكوين اللوز&quot;,
                &quot;min_humidity&quot;: 40,
                &quot;max_humidity&quot;: 70,
                &quot;irrigation_level&quot;: &quot;يُروى بانتظام خاصة في مرحلة تكوين اللوز&quot;,
                &quot;life_cycle&quot;: &quot;متوسطة&quot;,
                &quot;cultivation_method&quot;: &quot;بذر مباشر&quot;,
                &quot;planting_depth&quot;: &quot;2-5 سم&quot;,
                &quot;soil_texture&quot;: &quot;تربة طميية عميقة وقوية&quot;,
                &quot;min_ph&quot;: 6,
                &quot;max_ph&quot;: 8,
                &quot;seed_rate&quot;: &quot;10-15 كجم/هكتار&quot;,
                &quot;n_amount&quot;: 80,
                &quot;p_amount&quot;: 40,
                &quot;k_amount&quot;: 40,
                &quot;companion_plants&quot;: &quot;البقوليات، الأعشاب العطرية&quot;,
                &quot;combative_plants&quot;: &quot;الأعشاب الضارة، المحاصيل المنافسة&quot;,
                &quot;management_tips&quot;: &quot;دودة اللوز الشوكية والمحلية، حشرة المن، وحشرة البق.&quot;,
                &quot;succeeding_crops&quot;: &quot;البقوليات (لتحسين النيتروجين)&quot;,
                &quot;forbidden_crops&quot;: &quot;نفس العائلة النباتية&quot;,
                &quot;rotation_recommendation&quot;: &quot;دورة ثلاثية (حبوب - بقوليات - خضروات)&quot;
            },
            &quot;planting_season&quot;: &quot;ربيعي-صيفي&quot;,
            &quot;harvest_time&quot;: &quot;150-180 يوم&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1592924357228-91a4daadcfea?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;,
            &quot;thumb_url&quot;: &quot;https://images.unsplash.com/photo-1592924357228-91a4daadcfea?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;
        },
        {
            &quot;id&quot;: 8,
            &quot;scientific_name&quot;: &quot;Sesamum indicum&quot;,
            &quot;common_name&quot;: &quot;السمسم (الجُلجُلان)&quot;,
            &quot;description&quot;: &quot;نبات ناضج للزيوت ينمو بوفرة في تهامة والمناطق الدافئة. يمتاز بهيكله المستطيل وازهاره الناعمة.&quot;,
            &quot;benefits&quot;: &quot;مصدر ممتاز للدهون الصحية والبروتين والكالسيوم.&quot;,
            &quot;growth_guide&quot;: &quot;التعريف العلمي: محصول زيتي قديم يتبع الفصيلة السمسمية، تزرع في اليمن أصناف عالية الجودة لإنتاج زيت &#039;السليط&#039; الشعبي.\n\nظروف النمو: يتطلب درجات حرارة مرتفعة وظروفاً جافة نوعاً ما. حساس جداً لزيادة المياه والملوحة.\n\nالتربة والحموضة: تربة طميية رملية خصبة وجيدة الصرف. الـ pH المثالي: 5.5 - 7.5.\n\nالآفات والأمراض: ذبابة السمسم، مرض الذبول، والديدان القارضة.\n\nالحصاد والتخزين: يحصد عند اصفرار النبات وتفتح الكبسولات السفلية. يربط في حزم ويوقف للأعلى ليجف ويخرج البذور.&quot;,
            &quot;difficulty_level&quot;: &quot;متوسط&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 30,
                &quot;name&quot;: &quot;محاصيل نقدية&quot;,
                &quot;description&quot;: &quot;القات، البن اليمني، القطن، السمسم...&quot;
            },
            &quot;care_guide&quot;: {
                &quot;id&quot;: 8,
                &quot;watering_schedule&quot;: &quot;تجنب الإغراق المائي لأن جذوره حساسة&quot;,
                &quot;sunlight_requirement&quot;: &quot;شمس كاملة مشتعلة&quot;,
                &quot;temperature&quot;: &quot;حار (25 - 35 درجة)&quot;,
                &quot;humidity&quot;: &quot;يفضل الجفاف&quot;,
                &quot;min_temp&quot;: null,
                &quot;max_temp&quot;: null,
                &quot;light_type&quot;: &quot;شمس كاملة مشتعلة&quot;,
                &quot;rainfall&quot;: &quot;تحمل للعطش، ري بعلي في الغالب&quot;,
                &quot;min_humidity&quot;: 40,
                &quot;max_humidity&quot;: 70,
                &quot;irrigation_level&quot;: &quot;تحمل للعطش، ري بعلي في الغالب&quot;,
                &quot;life_cycle&quot;: &quot;متوسطة&quot;,
                &quot;cultivation_method&quot;: &quot;بذر مباشر&quot;,
                &quot;planting_depth&quot;: &quot;2-5 سم&quot;,
                &quot;soil_texture&quot;: &quot;تربة طميية رملية خصبة وجيدة الصرف&quot;,
                &quot;min_ph&quot;: 5.5,
                &quot;max_ph&quot;: 7.5,
                &quot;seed_rate&quot;: &quot;10-15 كجم/هكتار&quot;,
                &quot;n_amount&quot;: 80,
                &quot;p_amount&quot;: 40,
                &quot;k_amount&quot;: 40,
                &quot;companion_plants&quot;: &quot;البقوليات، الأعشاب العطرية&quot;,
                &quot;combative_plants&quot;: &quot;الأعشاب الضارة، المحاصيل المنافسة&quot;,
                &quot;management_tips&quot;: &quot;ذبابة السمسم، مرض الذبول، والديدان القارضة.&quot;,
                &quot;succeeding_crops&quot;: &quot;البقوليات (لتحسين النيتروجين)&quot;,
                &quot;forbidden_crops&quot;: &quot;نفس العائلة النباتية&quot;,
                &quot;rotation_recommendation&quot;: &quot;دورة ثلاثية (حبوب - بقوليات - خضروات)&quot;
            },
            &quot;planting_season&quot;: &quot;بداية الصيف ووقت الأمطار&quot;,
            &quot;harvest_time&quot;: &quot;90-110 يوم&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1595124253344-7786444f1df6?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;,
            &quot;thumb_url&quot;: &quot;https://images.unsplash.com/photo-1595124253344-7786444f1df6?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;
        },
        {
            &quot;id&quot;: 9,
            &quot;scientific_name&quot;: &quot;Mangifera indica&quot;,
            &quot;common_name&quot;: &quot;المانجو&quot;,
            &quot;description&quot;: &quot;ملكة الفواكه الصيفية. المانجو اليمني وتحديداً &#039;قلب الثور&#039; و&#039;التيمور&#039; من أجود الأنواع التي تُنتج في تهامة والأودية الدافئة.&quot;,
            &quot;benefits&quot;: &quot;غنية جداً بفيتامين A و C، ومضادات الأكسدة التي تعزز المناعة وصحة العيون والجلد.&quot;,
            &quot;growth_guide&quot;: &quot;التعريف العلمي: شجرة فاكهة استوائية معمرة تنتمي للفصيلة الالبطمية (Anacardiaceae)، وتعتبر السهول الساحلية اليمنية موطناً مثالياً لإنتاج أصناف متميزة عالمياً.\n\nظروف النمو: تفضل المناطق الحارة والرطبة، وتتأثر بشدة بالصقيع. تحتاج إلى فترات جفاف عند التزهير لضمان عقد الثمار.\n\nالتربة والحموضة: تنجح في التربة الطميية الرملية العميقة جيدة الصرف. الـ pH المثالي: 5.5 - 7.5.\n\nالآفات والأمراض: ذبابة الفاكهة، تشوه القمم النامية، ومرض البياض الدقيقي.\n\nالحصاد والتخزين: تحصد الثمار عند بدء تغير لون الجلد. تخزن في مكان مهوي للنضج، وتبرد بعد ذلك لإطالة عمرها.&quot;,
            &quot;difficulty_level&quot;: &quot;متوسط&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 29,
                &quot;name&quot;: &quot;فواكه&quot;,
                &quot;description&quot;: &quot;المانجو، الموز، العنب، الرمان...&quot;
            },
            &quot;care_guide&quot;: {
                &quot;id&quot;: 9,
                &quot;watering_schedule&quot;: &quot;يومي للشتلات، مرتين أسبوعياً للاشجار الكبيرة&quot;,
                &quot;sunlight_requirement&quot;: &quot;شمس كاملة قوية&quot;,
                &quot;temperature&quot;: &quot;حار (20 - 35 درجة)&quot;,
                &quot;humidity&quot;: &quot;متوسطة إلى عالية&quot;,
                &quot;min_temp&quot;: null,
                &quot;max_temp&quot;: null,
                &quot;light_type&quot;: &quot;شمس كاملة قوية&quot;,
                &quot;rainfall&quot;: &quot;ري منتظم، شرهة للماء وقت تضخم الثمار&quot;,
                &quot;min_humidity&quot;: 40,
                &quot;max_humidity&quot;: 70,
                &quot;irrigation_level&quot;: &quot;ري منتظم، شرهة للماء وقت تضخم الثمار&quot;,
                &quot;life_cycle&quot;: &quot;متوسطة&quot;,
                &quot;cultivation_method&quot;: &quot;بذر مباشر&quot;,
                &quot;planting_depth&quot;: &quot;2-5 سم&quot;,
                &quot;soil_texture&quot;: &quot;تنجح في التربة الطميية الرملية العميقة جيدة الصرف&quot;,
                &quot;min_ph&quot;: 5.5,
                &quot;max_ph&quot;: 7.5,
                &quot;seed_rate&quot;: &quot;10-15 كجم/هكتار&quot;,
                &quot;n_amount&quot;: 80,
                &quot;p_amount&quot;: 40,
                &quot;k_amount&quot;: 40,
                &quot;companion_plants&quot;: &quot;البقوليات، الأعشاب العطرية&quot;,
                &quot;combative_plants&quot;: &quot;الأعشاب الضارة، المحاصيل المنافسة&quot;,
                &quot;management_tips&quot;: &quot;ذبابة الفاكهة، تشوه القمم النامية، ومرض البياض الدقيقي.&quot;,
                &quot;succeeding_crops&quot;: &quot;البقوليات (لتحسين النيتروجين)&quot;,
                &quot;forbidden_crops&quot;: &quot;نفس العائلة النباتية&quot;,
                &quot;rotation_recommendation&quot;: &quot;دورة ثلاثية (حبوب - بقوليات - خضروات)&quot;
            },
            &quot;planting_season&quot;: &quot;الربيع وأوائل الخريف&quot;,
            &quot;harvest_time&quot;: &quot;3-5 سنوات للإنتاج التجاري&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1553284965-83fd3e82fa5a?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;,
            &quot;thumb_url&quot;: &quot;https://images.unsplash.com/photo-1553284965-83fd3e82fa5a?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;
        },
        {
            &quot;id&quot;: 10,
            &quot;scientific_name&quot;: &quot;Musa paradisiaca&quot;,
            &quot;common_name&quot;: &quot;الموز&quot;,
            &quot;description&quot;: &quot;أشجار استوائية عشيبة كبيرة جداً تعطي غلة اقتصادية وتستهلك المياه بشكل كبير. يكثر في وديان زبيد والمناطق الرطبة الدافئة.&quot;,
            &quot;benefits&quot;: &quot;مصدر ممتاز للبوتاسيوم والطاقة السريعة، وسهل الهضم للأطفال.&quot;,
            &quot;growth_guide&quot;: &quot;التعريف العلمي: أضخم نبات عشبي في العالم، ينمو من جذقة (ريزوم) تحت الأرض، ويتميز بقدرته على الإنتاج المستمر طوال العام عند توفر المياه.\n\nظروف النمو: يتطلب درجات حرارة دافئة، رطوبة عالية، وحماية من الرياح الشديدة التي قد تمزق أوراقه الكبيرة.\n\nالتربة والحموضة: تربة طميية عميقة غنية بالمواد العضوية مع صرف جيد. الـ pH المثالي: 6.0 - 7.5.\n\nالآفات والأمراض: مرض تبرقش الأوراق، خنفساء الموز، والنيماتودا.\n\nالحصاد والتخزين: يحصد العذق وهو لا يزال أخضر وممتلئ. يعلق في مكان دافئ ومظلم ليصفر وينضج.&quot;,
            &quot;difficulty_level&quot;: &quot;متوسط&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 29,
                &quot;name&quot;: &quot;فواكه&quot;,
                &quot;description&quot;: &quot;المانجو، الموز، العنب، الرمان...&quot;
            },
            &quot;care_guide&quot;: {
                &quot;id&quot;: 10,
                &quot;watering_schedule&quot;: &quot;ري يومي منتظم بغزارة&quot;,
                &quot;sunlight_requirement&quot;: &quot;شمس ساطعة مع ظل خفيف أحياناً&quot;,
                &quot;temperature&quot;: &quot;حار ورطب (أعلى من 18 درجة)&quot;,
                &quot;humidity&quot;: &quot;عالية جداً&quot;,
                &quot;min_temp&quot;: null,
                &quot;max_temp&quot;: null,
                &quot;light_type&quot;: &quot;شمس ساطعة مع ظل خفيف أحياناً&quot;,
                &quot;rainfall&quot;: &quot;استهلاك عالي جداً للمياه&quot;,
                &quot;min_humidity&quot;: 40,
                &quot;max_humidity&quot;: 70,
                &quot;irrigation_level&quot;: &quot;استهلاك عالي جداً للمياه&quot;,
                &quot;life_cycle&quot;: &quot;قصيرة&quot;,
                &quot;cultivation_method&quot;: &quot;بذر مباشر&quot;,
                &quot;planting_depth&quot;: &quot;2-5 سم&quot;,
                &quot;soil_texture&quot;: &quot;تربة طميية عميقة غنية بالمواد العضوية مع صرف جيد&quot;,
                &quot;min_ph&quot;: 6,
                &quot;max_ph&quot;: 7.5,
                &quot;seed_rate&quot;: &quot;10-15 كجم/هكتار&quot;,
                &quot;n_amount&quot;: 80,
                &quot;p_amount&quot;: 40,
                &quot;k_amount&quot;: 40,
                &quot;companion_plants&quot;: &quot;البقوليات، الأعشاب العطرية&quot;,
                &quot;combative_plants&quot;: &quot;الأعشاب الضارة، المحاصيل المنافسة&quot;,
                &quot;management_tips&quot;: &quot;مرض تبرقش الأوراق، خنفساء الموز، والنيماتودا.&quot;,
                &quot;succeeding_crops&quot;: &quot;البقوليات (لتحسين النيتروجين)&quot;,
                &quot;forbidden_crops&quot;: &quot;نفس العائلة النباتية&quot;,
                &quot;rotation_recommendation&quot;: &quot;دورة ثلاثية (حبوب - بقوليات - خضروات)&quot;
            },
            &quot;planting_season&quot;: &quot;طوال العام في المناطق الدافئة&quot;,
            &quot;harvest_time&quot;: &quot;9-12 شهر من زراعة الخلفة&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1571771894821-ad99b1a19b46?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;,
            &quot;thumb_url&quot;: &quot;https://images.unsplash.com/photo-1571771894821-ad99b1a19b46?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;
        },
        {
            &quot;id&quot;: 11,
            &quot;scientific_name&quot;: &quot;Carica papaya&quot;,
            &quot;common_name&quot;: &quot;البابايا (العنبب)&quot;,
            &quot;description&quot;: &quot;شجرة سريعة الإثمار ذات ساق غض وتنتج ثماراً كبيرة وحلوة على مدار السنة في المناطق الحارة.&quot;,
            &quot;benefits&quot;: &quot;تحتوي على إنزيم البابايين المساعد على الهضم، وغنية جداً بفيتامين C.&quot;,
            &quot;growth_guide&quot;: &quot;التعريف العلمي: نبات استوائي شبه خشبي قصير العمر، يشتهر بنوره العنقودي وثماره اللحمية التي تحتوي على عدد كبير من البذور السوداء الصغيرة.\n\nظروف النمو: تحتاج إلى جو حار جداً، ولا تتحمل البرودة أو الرياح القوية. سريعة النمو وتثمر في العام الأول.\n\nالتربة والحموضة: تربة رملية طميية جيدة الصرف، حساسة جداً لتجمع المياه حول الجذور. الـ pH المثالي: 6.0 - 7.0.\n\nالآفات والأمراض: مرض تبرقش البابايا الفيروسي، والمن، وتعفن الجذور.\n\nالحصاد والتخزين: تحصد الثمرة عندما يظهر عليها اللون الأصفر بنسبة 20-40%. تنضج في درجة حرارة الغرفة.&quot;,
            &quot;difficulty_level&quot;: &quot;متوسط&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 29,
                &quot;name&quot;: &quot;فواكه&quot;,
                &quot;description&quot;: &quot;المانجو، الموز، العنب، الرمان...&quot;
            },
            &quot;care_guide&quot;: {
                &quot;id&quot;: 11,
                &quot;watering_schedule&quot;: &quot;كل يومين في الصيف&quot;,
                &quot;sunlight_requirement&quot;: &quot;شمس كاملة مباشرة&quot;,
                &quot;temperature&quot;: &quot;حار (25 - 32 درجة)&quot;,
                &quot;humidity&quot;: &quot;متوسطة&quot;,
                &quot;min_temp&quot;: null,
                &quot;max_temp&quot;: null,
                &quot;light_type&quot;: &quot;شمس كاملة مباشرة&quot;,
                &quot;rainfall&quot;: &quot;ري معتدل ومنتظم&quot;,
                &quot;min_humidity&quot;: 40,
                &quot;max_humidity&quot;: 70,
                &quot;irrigation_level&quot;: &quot;ري معتدل ومنتظم&quot;,
                &quot;life_cycle&quot;: &quot;قصيرة&quot;,
                &quot;cultivation_method&quot;: &quot;بذر مباشر&quot;,
                &quot;planting_depth&quot;: &quot;2-5 سم&quot;,
                &quot;soil_texture&quot;: &quot;تربة رملية طميية جيدة الصرف، حساسة جداً لتجمع المياه حول الجذور&quot;,
                &quot;min_ph&quot;: 6,
                &quot;max_ph&quot;: 7,
                &quot;seed_rate&quot;: &quot;10-15 كجم/هكتار&quot;,
                &quot;n_amount&quot;: 80,
                &quot;p_amount&quot;: 40,
                &quot;k_amount&quot;: 40,
                &quot;companion_plants&quot;: &quot;البقوليات، الأعشاب العطرية&quot;,
                &quot;combative_plants&quot;: &quot;الأعشاب الضارة، المحاصيل المنافسة&quot;,
                &quot;management_tips&quot;: &quot;مرض تبرقش البابايا الفيروسي، والمن، وتعفن الجذور.&quot;,
                &quot;succeeding_crops&quot;: &quot;البقوليات (لتحسين النيتروجين)&quot;,
                &quot;forbidden_crops&quot;: &quot;نفس العائلة النباتية&quot;,
                &quot;rotation_recommendation&quot;: &quot;دورة ثلاثية (حبوب - بقوليات - خضروات)&quot;
            },
            &quot;planting_season&quot;: &quot;بداية الصيف والربيع&quot;,
            &quot;harvest_time&quot;: &quot;7-10 أشهر من الزراعة&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1528652393392-cc7d50ec952e?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;,
            &quot;thumb_url&quot;: &quot;https://images.unsplash.com/photo-1528652393392-cc7d50ec952e?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;
        },
        {
            &quot;id&quot;: 12,
            &quot;scientific_name&quot;: &quot;Phoenix dactylifera&quot;,
            &quot;common_name&quot;: &quot;النخيل (التمر)&quot;,
            &quot;description&quot;: &quot;رمز الصمود والعراقة. يشتهر وادي حضرموت وزبيد والجوف بإنتاج أصناف فاخرة من التمور اليمنية.&quot;,
            &quot;benefits&quot;: &quot;غذاء كامل غني بالسكريات الطبيعية والمعادن والألياف، ويعتبر مخزناً استراتيجياً للغذاء.&quot;,
            &quot;growth_guide&quot;: &quot;التعريف العلمي: شجرة معمرة دائمة الخضرة تتبع الفصيلة النخلية، قادرة على العيش لمئات السنين وإنتاج ثمار عالية القيمة الغذائية في أقسى الظروف.\n\nظروف النمو: تحتاج إلى حرارة عالية جداً وجو جاف خلال مرحلة نضج الثمار، مع توفر مياه جوفية أو ري.\n\nالتربة والحموضة: تتحمل الملوحة العالية وتنجح في معظم أنواع التربة، مفضلة التربة العميقة. الـ pH المثالي: 7.0 - 8.5.\n\nالآفات والأمراض: سوسة النخيل الحمراء، حشرة دوباس النخيل، ومرض البيوض.\n\nالحصاد والتخزين: يتم الحصاد يدوياً في أواخر الصيف والشتاء. تجفف التمور وتخزن في أماكن باردة وجافة.&quot;,
            &quot;difficulty_level&quot;: &quot;متوسط&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 29,
                &quot;name&quot;: &quot;فواكه&quot;,
                &quot;description&quot;: &quot;المانجو، الموز، العنب، الرمان...&quot;
            },
            &quot;care_guide&quot;: {
                &quot;id&quot;: 12,
                &quot;watering_schedule&quot;: &quot;أسبوعي للنخيل البالغ، مكثف للفسائل&quot;,
                &quot;sunlight_requirement&quot;: &quot;شمس كاملة قوية جداً&quot;,
                &quot;temperature&quot;: &quot;حار جداً صيفاً&quot;,
                &quot;humidity&quot;: &quot;منخفضة (الجفاف ضروري للنضج)&quot;,
                &quot;min_temp&quot;: null,
                &quot;max_temp&quot;: null,
                &quot;light_type&quot;: &quot;شمس كاملة قوية جداً&quot;,
                &quot;rainfall&quot;: &quot;تتحمل الجفاف ولكن تحتاج ري وقت العقد&quot;,
                &quot;min_humidity&quot;: 40,
                &quot;max_humidity&quot;: 70,
                &quot;irrigation_level&quot;: &quot;تتحمل الجفاف ولكن تحتاج ري وقت العقد&quot;,
                &quot;life_cycle&quot;: &quot;متوسطة&quot;,
                &quot;cultivation_method&quot;: &quot;بذر مباشر&quot;,
                &quot;planting_depth&quot;: &quot;2-5 سم&quot;,
                &quot;soil_texture&quot;: &quot;تتحمل الملوحة العالية وتنجح في معظم أنواع التربة، مفضلة التربة العميقة&quot;,
                &quot;min_ph&quot;: 7,
                &quot;max_ph&quot;: 8.5,
                &quot;seed_rate&quot;: &quot;10-15 كجم/هكتار&quot;,
                &quot;n_amount&quot;: 80,
                &quot;p_amount&quot;: 40,
                &quot;k_amount&quot;: 40,
                &quot;companion_plants&quot;: &quot;البقوليات، الأعشاب العطرية&quot;,
                &quot;combative_plants&quot;: &quot;الأعشاب الضارة، المحاصيل المنافسة&quot;,
                &quot;management_tips&quot;: &quot;سوسة النخيل الحمراء، حشرة دوباس النخيل، ومرض البيوض.&quot;,
                &quot;succeeding_crops&quot;: &quot;البقوليات (لتحسين النيتروجين)&quot;,
                &quot;forbidden_crops&quot;: &quot;نفس العائلة النباتية&quot;,
                &quot;rotation_recommendation&quot;: &quot;دورة ثلاثية (حبوب - بقوليات - خضروات)&quot;
            },
            &quot;planting_season&quot;: &quot;الربيع وأوائل الخريف (للفسائل)&quot;,
            &quot;harvest_time&quot;: &quot;4-7 سنوات للإنتاج من الفسيلة&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1594247585090-e31c81896068?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;,
            &quot;thumb_url&quot;: &quot;https://images.unsplash.com/photo-1594247585090-e31c81896068?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;
        },
        {
            &quot;id&quot;: 13,
            &quot;scientific_name&quot;: &quot;Vitis vinifera&quot;,
            &quot;common_name&quot;: &quot;العنب&quot;,
            &quot;description&quot;: &quot;جودة فاخرة تاريخية. يشتهر العنب الرازقي والعاصمي والصنعاني الذي يُزرع في المرتفعات الجبلية المحيطة بصنعاء.&quot;,
            &quot;benefits&quot;: &quot;غني بالسكريات الطبيعية والفيتامينات ومضادات الأكسدة القوية في القشرة والبذور.&quot;,
            &quot;growth_guide&quot;: &quot;التعريف العلمي: شجيرة متسلقة خشبية معمرة، تعتبر اليمن من أقدم مواطن زراعتها في العلم، وتتميز أصنافها بحلاوتها العالية وقدرتها على التجفيف.\n\nظروف النمو: تحتاج إلى شتاء بارد (فترة سكون) وصيف دافئ جاف. تتطلب أنظمة تدعيم (تعريش) وتقليم دوري.\n\nالتربة والحموضة: تفضل التربة الكلسية الخفيفة جيدة الصرفة. الـ pH المثالي: 6.5 - 7.5.\n\nالآفات والأمراض: البياض الدقيقي، البياض الزغبي، حشرة الفلوكسيرا، والطيور.\n\nالحصاد والتخزين: تحصد العناقيد يدوياً عند اكتمال الحلاوة. يحفظ مبرداً أو يجفف شمسياً لإنتاج الزبيب.&quot;,
            &quot;difficulty_level&quot;: &quot;متوسط&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 29,
                &quot;name&quot;: &quot;فواكه&quot;,
                &quot;description&quot;: &quot;المانجو، الموز، العنب، الرمان...&quot;
            },
            &quot;care_guide&quot;: {
                &quot;id&quot;: 13,
                &quot;watering_schedule&quot;: &quot;كل 5-7 أيام حسب الجو&quot;,
                &quot;sunlight_requirement&quot;: &quot;شمس ساطعة مباشرة&quot;,
                &quot;temperature&quot;: &quot;صيف معتدل إلى دافئ (20 - 30 درجة)&quot;,
                &quot;humidity&quot;: &quot;منخفضة (الجفاء يحمي من الفطريات)&quot;,
                &quot;min_temp&quot;: null,
                &quot;max_temp&quot;: null,
                &quot;light_type&quot;: &quot;شمس ساطعة مباشرة&quot;,
                &quot;rainfall&quot;: &quot;معتدل، يقلل عند بدء النضج&quot;,
                &quot;min_humidity&quot;: 40,
                &quot;max_humidity&quot;: 70,
                &quot;irrigation_level&quot;: &quot;معتدل، يقلل عند بدء النضج&quot;,
                &quot;life_cycle&quot;: &quot;متوسطة&quot;,
                &quot;cultivation_method&quot;: &quot;بذر مباشر&quot;,
                &quot;planting_depth&quot;: &quot;2-5 سم&quot;,
                &quot;soil_texture&quot;: &quot;تفضل التربة الكلسية الخفيفة جيدة الصرفة&quot;,
                &quot;min_ph&quot;: 6.5,
                &quot;max_ph&quot;: 7.5,
                &quot;seed_rate&quot;: &quot;10-15 كجم/هكتار&quot;,
                &quot;n_amount&quot;: 80,
                &quot;p_amount&quot;: 40,
                &quot;k_amount&quot;: 40,
                &quot;companion_plants&quot;: &quot;البقوليات، الأعشاب العطرية&quot;,
                &quot;combative_plants&quot;: &quot;الأعشاب الضارة، المحاصيل المنافسة&quot;,
                &quot;management_tips&quot;: &quot;البياض الدقيقي، البياض الزغبي، حشرة الفلوكسيرا، والطيور.&quot;,
                &quot;succeeding_crops&quot;: &quot;البقوليات (لتحسين النيتروجين)&quot;,
                &quot;forbidden_crops&quot;: &quot;نفس العائلة النباتية&quot;,
                &quot;rotation_recommendation&quot;: &quot;دورة ثلاثية (حبوب - بقوليات - خضروات)&quot;
            },
            &quot;planting_season&quot;: &quot;الشتاء (فترة السكون) للغراس&quot;,
            &quot;harvest_time&quot;: &quot;يوليو - سبتمبر&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1536257321685-2e6fca78e1b6?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;,
            &quot;thumb_url&quot;: &quot;https://images.unsplash.com/photo-1536257321685-2e6fca78e1b6?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;
        },
        {
            &quot;id&quot;: 14,
            &quot;scientific_name&quot;: &quot;Punica granatum&quot;,
            &quot;common_name&quot;: &quot;الرمان (خاصة)&quot;,
            &quot;description&quot;: &quot;رمان صعدة اليمني ذو الحجم الضخم والمذاق السكري الفريد. شجرة قوية تتحمل الظروف الجبلية الصعبة.&quot;,
            &quot;benefits&quot;: &quot;مقوي للقلب والدم، غني بمضادات الأكسدة والألياف.&quot;,
            &quot;growth_guide&quot;: &quot;التعريف العلمي: شجيرة أو شجرة صغيرة متساقطة الأوراق، تتبع الفصيلة الرمانية، وتشتهر اليمن بإنتاج أصناف تعد من الأفضل عالمياً من حيث الحجم والحلاوة.\n\nظروف النمو: تفضل المناطق ذات الصيف الطويل والدافئ والشتاء البارد. تتحمل الجفاف والرياح.\n\nالتربة والحموضة: تنجح في معظم أنواع التربة، حتى التربة الكلسية والملحية. الـ pH المثالي: 6.0 - 7.5.\n\nالآفات والأمراض: دودة ثمار الرمان، المن، والبق الدقيقي.\n\nالحصاد والتخزين: تحصد الثمار عند اكتمال اللون والحجم. تمتاز بقدرة تخزينية عالية في أماكن باردة.&quot;,
            &quot;difficulty_level&quot;: &quot;متوسط&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 29,
                &quot;name&quot;: &quot;فواكه&quot;,
                &quot;description&quot;: &quot;المانجو، الموز، العنب، الرمان...&quot;
            },
            &quot;care_guide&quot;: {
                &quot;id&quot;: 14,
                &quot;watering_schedule&quot;: &quot;كل 4-10 أيام حسب نوع التربة&quot;,
                &quot;sunlight_requirement&quot;: &quot;شمس كاملة مباشرة&quot;,
                &quot;temperature&quot;: &quot;معتدل إلى حار صيفاً&quot;,
                &quot;humidity&quot;: &quot;منخفضة (الجفاف يقلل الأمراض)&quot;,
                &quot;min_temp&quot;: null,
                &quot;max_temp&quot;: null,
                &quot;light_type&quot;: &quot;شمس كاملة مباشرة&quot;,
                &quot;rainfall&quot;: &quot;معتدل (يجب الحذر من زيادة الري وقت النضج لتجنب التشقق)&quot;,
                &quot;min_humidity&quot;: 40,
                &quot;max_humidity&quot;: 70,
                &quot;irrigation_level&quot;: &quot;معتدل (يجب الحذر من زيادة الري وقت النضج لتجنب التشقق)&quot;,
                &quot;life_cycle&quot;: &quot;متوسطة&quot;,
                &quot;cultivation_method&quot;: &quot;بذر مباشر&quot;,
                &quot;planting_depth&quot;: &quot;2-5 سم&quot;,
                &quot;soil_texture&quot;: &quot;تنجح في معظم أنواع التربة، حتى التربة الكلسية والملحية&quot;,
                &quot;min_ph&quot;: 6,
                &quot;max_ph&quot;: 7.5,
                &quot;seed_rate&quot;: &quot;10-15 كجم/هكتار&quot;,
                &quot;n_amount&quot;: 80,
                &quot;p_amount&quot;: 40,
                &quot;k_amount&quot;: 40,
                &quot;companion_plants&quot;: &quot;البقوليات، الأعشاب العطرية&quot;,
                &quot;combative_plants&quot;: &quot;الأعشاب الضارة، المحاصيل المنافسة&quot;,
                &quot;management_tips&quot;: &quot;دودة ثمار الرمان، المن، والبق الدقيقي.&quot;,
                &quot;succeeding_crops&quot;: &quot;البقوليات (لتحسين النيتروجين)&quot;,
                &quot;forbidden_crops&quot;: &quot;نفس العائلة النباتية&quot;,
                &quot;rotation_recommendation&quot;: &quot;دورة ثلاثية (حبوب - بقوليات - خضروات)&quot;
            },
            &quot;planting_season&quot;: &quot;أواخر الشتاء (فبراير - مارس)&quot;,
            &quot;harvest_time&quot;: &quot;أغسطس - أكتوبر&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1621516086745-fce15da1d977?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;,
            &quot;thumb_url&quot;: &quot;https://images.unsplash.com/photo-1621516086745-fce15da1d977?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;
        },
        {
            &quot;id&quot;: 15,
            &quot;scientific_name&quot;: &quot;Solanum lycopersicum&quot;,
            &quot;common_name&quot;: &quot;الطماطم&quot;,
            &quot;description&quot;: &quot;المحصول الأكثر طلباً في الأسواق اليمنية. تزرع في الحقول المكشوفة والبيوت المحمية على مدار العام.&quot;,
            &quot;benefits&quot;: &quot;غنية جداً بالليكوبين (مضاد سرطان قوي) وفيتامين C والبوتاسيوم.&quot;,
            &quot;growth_guide&quot;: &quot;التعريف العلمي: نبات عشبي حولي من الفصيلة الباذنجانية، يتميز بنموه السريع وتعدد أصنافه وتنوع استخداماته الغذائية.\n\nظروف النمو: تحتاج إلى جو دافئ وإضاءة جيدة. حساسة جداً للصقيع وللرطوبة العالية التي تسبب الأمراض.\n\nالتربة والحموضة: تربة طميية خصبة جيدة الصرف غنية بالمادة العضوية. الـ pH المثالي: 6.0 - 6.8.\n\nالآفات والأمراض: حشرة التوتا أبسوليوتا، الذبابة البيضاء، واللفحة المتأخرة.\n\nالحصاد والتخزين: تحصد الثمار عند تلونها. تحفظ في درجة حرارة الغرفة حتى تنضج تماماً ثم تبرد.&quot;,
            &quot;difficulty_level&quot;: &quot;متوسط&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 28,
                &quot;name&quot;: &quot;خضروات&quot;,
                &quot;description&quot;: &quot;الطماطم، البطاطس، البصل، الخيار...&quot;
            },
            &quot;care_guide&quot;: {
                &quot;id&quot;: 15,
                &quot;watering_schedule&quot;: &quot;يومي أو كل يومين (ري تنقيط يفضل)&quot;,
                &quot;sunlight_requirement&quot;: &quot;شمس ساطعة (6-8 ساعات)&quot;,
                &quot;temperature&quot;: &quot;دافئ (20 - 30 درجة)&quot;,
                &quot;humidity&quot;: &quot;متوسطة&quot;,
                &quot;min_temp&quot;: null,
                &quot;max_temp&quot;: null,
                &quot;light_type&quot;: &quot;شمس ساطعة (6-8 ساعات)&quot;,
                &quot;rainfall&quot;: &quot;ري منتظم (حساسة للجفاف أو الغرق)&quot;,
                &quot;min_humidity&quot;: 40,
                &quot;max_humidity&quot;: 70,
                &quot;irrigation_level&quot;: &quot;ري منتظم (حساسة للجفاف أو الغرق)&quot;,
                &quot;life_cycle&quot;: &quot;متوسطة&quot;,
                &quot;cultivation_method&quot;: &quot;بذر مباشر&quot;,
                &quot;planting_depth&quot;: &quot;2-5 سم&quot;,
                &quot;soil_texture&quot;: &quot;تربة طميية خصبة جيدة الصرف غنية بالمادة العضوية&quot;,
                &quot;min_ph&quot;: 6,
                &quot;max_ph&quot;: 6.8,
                &quot;seed_rate&quot;: &quot;10-15 كجم/هكتار&quot;,
                &quot;n_amount&quot;: 80,
                &quot;p_amount&quot;: 40,
                &quot;k_amount&quot;: 40,
                &quot;companion_plants&quot;: &quot;البقوليات، الأعشاب العطرية&quot;,
                &quot;combative_plants&quot;: &quot;الأعشاب الضارة، المحاصيل المنافسة&quot;,
                &quot;management_tips&quot;: &quot;حشرة التوتا أبسوليوتا، الذبابة البيضاء، واللفحة المتأخرة.&quot;,
                &quot;succeeding_crops&quot;: &quot;البقوليات (لتحسين النيتروجين)&quot;,
                &quot;forbidden_crops&quot;: &quot;نفس العائلة النباتية&quot;,
                &quot;rotation_recommendation&quot;: &quot;دورة ثلاثية (حبوب - بقوليات - خضروات)&quot;
            },
            &quot;planting_season&quot;: &quot;على مدار العام (حسب المنطقة والتقنية)&quot;,
            &quot;harvest_time&quot;: &quot;70-90 يوم من الشتل&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1592924357228-91a4daadcfea?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;,
            &quot;thumb_url&quot;: &quot;https://images.unsplash.com/photo-1592924357228-91a4daadcfea?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;
        },
        {
            &quot;id&quot;: 16,
            &quot;scientific_name&quot;: &quot;Solanum tuberosum&quot;,
            &quot;common_name&quot;: &quot;البطاطس&quot;,
            &quot;description&quot;: &quot;من أهم محاصيل الأمن الغذائي في اليمن. تنجح زراعتها في المناطق المرتفعة والماردة مثل ذمار وإب وصنعاء.&quot;,
            &quot;benefits&quot;: &quot;مصدر غني بالكربوهيدرات والطاقة، ويحتوي على مستويات عالية من البوتاسيوم وفيتامين C.&quot;,
            &quot;growth_guide&quot;: &quot;التعريف العلمي: نبات درني حولي من الفصيلة الباذنجانية، يكوّن سيقاناً أرضية متضخمة (درنات) غنية بالنشا والكربوهيدرات.\n\nظروف النمو: تفضل المناخ المعتدل المائل للبرودة. تحتاج إلى موسم نمو خالٍ من الصقيع مع توفر رطوبة أرضية منتظمة.\n\nالتربة والحموضة: تربة رملية أو طميية خفيفة غنية بالمواد العضوية، جيدة التهوية لتسهيل تمدد الدرنات. الـ pH المثالي: 5.0 - 6.0.\n\nالآفات والأمراض: اللفحة المتأخرة، خنفساء البطاطس، والنيماتودا.\n\nالحصاد والتخزين: تحصد الدرنات بعد جفاف المجموع الخضري. تخزن في أماكن باردة، مظلمة، وجيدة التهوية لمنع التبرعم.&quot;,
            &quot;difficulty_level&quot;: &quot;متوسط&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 28,
                &quot;name&quot;: &quot;خضروات&quot;,
                &quot;description&quot;: &quot;الطماطم، البطاطس، البصل، الخيار...&quot;
            },
            &quot;care_guide&quot;: {
                &quot;id&quot;: 16,
                &quot;watering_schedule&quot;: &quot;كل 3-5 أيام حسب جو المنطقة&quot;,
                &quot;sunlight_requirement&quot;: &quot;شمس كاملة ساطعة&quot;,
                &quot;temperature&quot;: &quot;معتدل (15 - 25 درجة)&quot;,
                &quot;humidity&quot;: &quot;متوسطة&quot;,
                &quot;min_temp&quot;: null,
                &quot;max_temp&quot;: null,
                &quot;light_type&quot;: &quot;شمس كاملة ساطعة&quot;,
                &quot;rainfall&quot;: &quot;ري منتظم، حساسة للعطش وقت تكوين الدرنات&quot;,
                &quot;min_humidity&quot;: 40,
                &quot;max_humidity&quot;: 70,
                &quot;irrigation_level&quot;: &quot;ري منتظم، حساسة للعطش وقت تكوين الدرنات&quot;,
                &quot;life_cycle&quot;: &quot;متوسطة&quot;,
                &quot;cultivation_method&quot;: &quot;بذر مباشر&quot;,
                &quot;planting_depth&quot;: &quot;2-5 سم&quot;,
                &quot;soil_texture&quot;: &quot;تربة رملية أو طميية خفيفة غنية بالمواد العضوية، جيدة التهوية لتسهيل تمدد الدرنات&quot;,
                &quot;min_ph&quot;: 5,
                &quot;max_ph&quot;: 6,
                &quot;seed_rate&quot;: &quot;10-15 كجم/هكتار&quot;,
                &quot;n_amount&quot;: 80,
                &quot;p_amount&quot;: 40,
                &quot;k_amount&quot;: 40,
                &quot;companion_plants&quot;: &quot;البقوليات، الأعشاب العطرية&quot;,
                &quot;combative_plants&quot;: &quot;الأعشاب الضارة، المحاصيل المنافسة&quot;,
                &quot;management_tips&quot;: &quot;اللفحة المتأخرة، خنفساء البطاطس، والنيماتودا.&quot;,
                &quot;succeeding_crops&quot;: &quot;البقوليات (لتحسين النيتروجين)&quot;,
                &quot;forbidden_crops&quot;: &quot;نفس العائلة النباتية&quot;,
                &quot;rotation_recommendation&quot;: &quot;دورة ثلاثية (حبوب - بقوليات - خضروات)&quot;
            },
            &quot;planting_season&quot;: &quot;ربيعي وخريفي&quot;,
            &quot;harvest_time&quot;: &quot;90-120 يوم&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1518977676601-b53f82aba655?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;,
            &quot;thumb_url&quot;: &quot;https://images.unsplash.com/photo-1518977676601-b53f82aba655?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;
        },
        {
            &quot;id&quot;: 17,
            &quot;scientific_name&quot;: &quot;Allium cepa&quot;,
            &quot;common_name&quot;: &quot;البصل&quot;,
            &quot;description&quot;: &quot;محصول استراتيجي لا غنى عنه في المطبخ اليمني. تتركز زراعتها في المناطق المرتفعة والوديان الدافئة.&quot;,
            &quot;benefits&quot;: &quot;مضاد حيوي طبيعي، مقوي للمناعة، وغني بمضادات الأكسدة.&quot;,
            &quot;growth_guide&quot;: &quot;التعريف العلمي: نبات عشبي ثنائي الحول يزرع كحولي، يتميز بتكوين بصلة تحت أرضية مكونة من قواعد أوراق لحمية مخزنة للغذاء.\n\nظروف النمو: يحتاج إلى جو بارد خلال مرحلة النمو الخضري الأولى، وجو دافئ وجاف خلال مرحلة نضج الأبصال.\n\nالتربة والحموضة: يفضل التربة الطميية الخفيفة الخصبة جيدة الصرف. الـ pH المثالي: 6.0 - 7.0.\n\nالآفات والأمراض: تربس البصل، العفن القاعدي، ومرض البياض الزغبي.\n\nالحصاد والتخزين: يحصد عند رقاد 50-70% من الأوراق الخضراء. يجفف &#039;يعالج&#039; في الشمس قبل التخزين في مكان جاف.&quot;,
            &quot;difficulty_level&quot;: &quot;متوسط&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 28,
                &quot;name&quot;: &quot;خضروات&quot;,
                &quot;description&quot;: &quot;الطماطم، البطاطس، البصل، الخيار...&quot;
            },
            &quot;care_guide&quot;: {
                &quot;id&quot;: 17,
                &quot;watering_schedule&quot;: &quot;كل 4-7 أيام حسب نوع التربة&quot;,
                &quot;sunlight_requirement&quot;: &quot;شمس كاملة مباشره&quot;,
                &quot;temperature&quot;: &quot;معتدل (15 - 28 درجة)&quot;,
                &quot;humidity&quot;: &quot;منخفضة (الجفاف يحمي من التعفن)&quot;,
                &quot;min_temp&quot;: null,
                &quot;max_temp&quot;: null,
                &quot;light_type&quot;: &quot;شمس كاملة مباشره&quot;,
                &quot;rainfall&quot;: &quot;ري منتظم يقلل عند بدء النضج&quot;,
                &quot;min_humidity&quot;: 40,
                &quot;max_humidity&quot;: 70,
                &quot;irrigation_level&quot;: &quot;ري منتظم يقلل عند بدء النضج&quot;,
                &quot;life_cycle&quot;: &quot;متوسطة&quot;,
                &quot;cultivation_method&quot;: &quot;بذر مباشر&quot;,
                &quot;planting_depth&quot;: &quot;2-5 سم&quot;,
                &quot;soil_texture&quot;: &quot;يفضل التربة الطميية الخفيفة الخصبة جيدة الصرف&quot;,
                &quot;min_ph&quot;: 6,
                &quot;max_ph&quot;: 7,
                &quot;seed_rate&quot;: &quot;10-15 كجم/هكتار&quot;,
                &quot;n_amount&quot;: 80,
                &quot;p_amount&quot;: 40,
                &quot;k_amount&quot;: 40,
                &quot;companion_plants&quot;: &quot;البقوليات، الأعشاب العطرية&quot;,
                &quot;combative_plants&quot;: &quot;الأعشاب الضارة، المحاصيل المنافسة&quot;,
                &quot;management_tips&quot;: &quot;تربس البصل، العفن القاعدي، ومرض البياض الزغبي.&quot;,
                &quot;succeeding_crops&quot;: &quot;البقوليات (لتحسين النيتروجين)&quot;,
                &quot;forbidden_crops&quot;: &quot;نفس العائلة النباتية&quot;,
                &quot;rotation_recommendation&quot;: &quot;دورة ثلاثية (حبوب - بقوليات - خضروات)&quot;
            },
            &quot;planting_season&quot;: &quot;شتوي خريفي&quot;,
            &quot;harvest_time&quot;: &quot;120-160 يوم من الشتل&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1618512496245-5cb25446f254?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;,
            &quot;thumb_url&quot;: &quot;https://images.unsplash.com/photo-1618512496245-5cb25446f254?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;
        },
        {
            &quot;id&quot;: 18,
            &quot;scientific_name&quot;: &quot;Allium sativum&quot;,
            &quot;common_name&quot;: &quot;الثوم&quot;,
            &quot;description&quot;: &quot;يتميز الثوم اليمني (خاصة البلدي) برائحته النفاذة القوية وجودته العالية التي تتفوق على الأصناف المستوردة.&quot;,
            &quot;benefits&quot;: &quot;مضاد حيوي طبيعي فعال، خافض لضغط الدم والكوليسترول، ومقوي للمناعة.&quot;,
            &quot;growth_guide&quot;: &quot;التعريف العلمي: نبات عشبي حولي من الفصيلة الثومية، يتكون من فصوص مجتمعة حول ساق كاذبة، وهو من أقدم التوابل والمضادات الحيوية المعروفة.\n\nظروف النمو: يتطلب جواً بارداً أثناء نمو الفصوص، وجواً دافئاً وجافاً عند النضج وجفاف المجموع الخضري.\n\nالتربة والحموضة: تربة طميية خفيفة غنية بالمواد العضوية مع صرف ممتاز. الـ pH المثالي: 6.5 - 7.5.\n\nالآفات والأمراض: صدأ الثوم، العفن الأبيض، وتربس البصل.\n\nالحصاد والتخزين: يحصد عند اصفرار وجفاف الأوراق. يربط في حزم ويجفف في مكان مظلل وجاف جيد التهوية.&quot;,
            &quot;difficulty_level&quot;: &quot;متوسط&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 28,
                &quot;name&quot;: &quot;خضروات&quot;,
                &quot;description&quot;: &quot;الطماطم، البطاطس، البصل، الخيار...&quot;
            },
            &quot;care_guide&quot;: {
                &quot;id&quot;: 18,
                &quot;watering_schedule&quot;: &quot;كل 5-8 أيام حسب التربة&quot;,
                &quot;sunlight_requirement&quot;: &quot;شمس كاملة&quot;,
                &quot;temperature&quot;: &quot;بارد للنمو، دافئ للنضج&quot;,
                &quot;humidity&quot;: &quot;منخفضة (الجفاف مفضل)&quot;,
                &quot;min_temp&quot;: null,
                &quot;max_temp&quot;: null,
                &quot;light_type&quot;: &quot;شمس كاملة&quot;,
                &quot;rainfall&quot;: &quot;معتدل ومنتظم، يمنع قبل الحصاد بـ 3 أسابيع&quot;,
                &quot;min_humidity&quot;: 40,
                &quot;max_humidity&quot;: 70,
                &quot;irrigation_level&quot;: &quot;معتدل ومنتظم، يمنع قبل الحصاد بـ 3 أسابيع&quot;,
                &quot;life_cycle&quot;: &quot;متوسطة&quot;,
                &quot;cultivation_method&quot;: &quot;بذر مباشر&quot;,
                &quot;planting_depth&quot;: &quot;2-5 سم&quot;,
                &quot;soil_texture&quot;: &quot;تربة طميية خفيفة غنية بالمواد العضوية مع صرف ممتاز&quot;,
                &quot;min_ph&quot;: 6.5,
                &quot;max_ph&quot;: 7.5,
                &quot;seed_rate&quot;: &quot;10-15 كجم/هكتار&quot;,
                &quot;n_amount&quot;: 80,
                &quot;p_amount&quot;: 40,
                &quot;k_amount&quot;: 40,
                &quot;companion_plants&quot;: &quot;البقوليات، الأعشاب العطرية&quot;,
                &quot;combative_plants&quot;: &quot;الأعشاب الضارة، المحاصيل المنافسة&quot;,
                &quot;management_tips&quot;: &quot;صدأ الثوم، العفن الأبيض، وتربس البصل.&quot;,
                &quot;succeeding_crops&quot;: &quot;البقوليات (لتحسين النيتروجين)&quot;,
                &quot;forbidden_crops&quot;: &quot;نفس العائلة النباتية&quot;,
                &quot;rotation_recommendation&quot;: &quot;دورة ثلاثية (حبوب - بقوليات - خضروات)&quot;
            },
            &quot;planting_season&quot;: &quot;شتوي (أكتوبر - نوفمبر)&quot;,
            &quot;harvest_time&quot;: &quot;150-180 يوم&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1540148426941-657152eb40f1?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;,
            &quot;thumb_url&quot;: &quot;https://images.unsplash.com/photo-1540148426941-657152eb40f1?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;
        },
        {
            &quot;id&quot;: 19,
            &quot;scientific_name&quot;: &quot;Abelmoschus esculentus&quot;,
            &quot;common_name&quot;: &quot;الباميا&quot;,
            &quot;description&quot;: &quot;محصول صيفي محب للحرارة. تتميز الباميا اليمنية بطراوتها ومذاقها الفريد، وتزرع بكثرة في تهامة ولحج.&quot;,
            &quot;benefits&quot;: &quot;غنية بالألياف، فيتامين K، وحمض الفوليك، ومفيدة جداً لصحة الجهاز الهضمي.&quot;,
            &quot;growth_guide&quot;: &quot;التعريف العلمي: نبات عشبي حولي يتبع الفصيلة الخبازية، يزرع من أجل ثمار القرون الخضراء الهشة التي تحتوي على بذور صغيرة ومادة هلامية.\n\nظروف النمو: تحتاج إلى درجات حرارة مرتفعة ولا تتحمل الصقيع. تزدهر في المناطق الساحلية والأودية الحارة.\n\nالتربة والحموضة: تربة طميية خصبة غنية بالمواد العضوية جيدة الصرف. الـ pH المثالي: 6.0 - 7.0.\n\nالآفات والأمراض: دودة ورق القطن، المن، ومرض البياض الدقيقي.\n\nالحصاد والتخزين: تحصد القرون وهي صغيرة (4-7 سم) وهشة قبل أن تصبح ليفية. تستهلك طازجة أو تجفف.&quot;,
            &quot;difficulty_level&quot;: &quot;متوسط&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 28,
                &quot;name&quot;: &quot;خضروات&quot;,
                &quot;description&quot;: &quot;الطماطم، البطاطس، البصل، الخيار...&quot;
            },
            &quot;care_guide&quot;: {
                &quot;id&quot;: 19,
                &quot;watering_schedule&quot;: &quot;كل 2-4 أيام حسب الحرارة&quot;,
                &quot;sunlight_requirement&quot;: &quot;شمس كاملة قوية&quot;,
                &quot;temperature&quot;: &quot;حار (25 - 35 درجة)&quot;,
                &quot;humidity&quot;: &quot;متوسطة&quot;,
                &quot;min_temp&quot;: null,
                &quot;max_temp&quot;: null,
                &quot;light_type&quot;: &quot;شمس كاملة قوية&quot;,
                &quot;rainfall&quot;: &quot;ري منتظم ومعتدل&quot;,
                &quot;min_humidity&quot;: 40,
                &quot;max_humidity&quot;: 70,
                &quot;irrigation_level&quot;: &quot;ري منتظم ومعتدل&quot;,
                &quot;life_cycle&quot;: &quot;متوسطة&quot;,
                &quot;cultivation_method&quot;: &quot;بذر مباشر&quot;,
                &quot;planting_depth&quot;: &quot;2-5 سم&quot;,
                &quot;soil_texture&quot;: &quot;تربة طميية خصبة غنية بالمواد العضوية جيدة الصرف&quot;,
                &quot;min_ph&quot;: 6,
                &quot;max_ph&quot;: 7,
                &quot;seed_rate&quot;: &quot;10-15 كجم/هكتار&quot;,
                &quot;n_amount&quot;: 80,
                &quot;p_amount&quot;: 40,
                &quot;k_amount&quot;: 40,
                &quot;companion_plants&quot;: &quot;البقوليات، الأعشاب العطرية&quot;,
                &quot;combative_plants&quot;: &quot;الأعشاب الضارة، المحاصيل المنافسة&quot;,
                &quot;management_tips&quot;: &quot;دودة ورق القطن، المن، ومرض البياض الدقيقي.&quot;,
                &quot;succeeding_crops&quot;: &quot;البقوليات (لتحسين النيتروجين)&quot;,
                &quot;forbidden_crops&quot;: &quot;نفس العائلة النباتية&quot;,
                &quot;rotation_recommendation&quot;: &quot;دورة ثلاثية (حبوب - بقوليات - خضروات)&quot;
            },
            &quot;planting_season&quot;: &quot;صيفي (فبراير - يوليو)&quot;,
            &quot;harvest_time&quot;: &quot;50-60 يوم من الزراعة&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1444732328340-a1c3c3e3c3c3?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;,
            &quot;thumb_url&quot;: &quot;https://images.unsplash.com/photo-1444732328340-a1c3c3e3c3c3?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;
        },
        {
            &quot;id&quot;: 20,
            &quot;scientific_name&quot;: &quot;Cucumis sativus&quot;,
            &quot;common_name&quot;: &quot;الخيار&quot;,
            &quot;description&quot;: &quot;محصول صيفي سريع النمو. يزرع بكثافة في تهامة وفي البيوت المحمية في المناطق المعتدلة والباردة.&quot;,
            &quot;benefits&quot;: &quot;مرطب ممتاز للجسم، مدر للبول، ومنخفض السعرات الحرارية.&quot;,
            &quot;growth_guide&quot;: &quot;التعريف العلمي: نبات عشبي حولي متسلق من الفصيلة القرعية، يتميز بنمو سريع جداً وإنتاج ثمار مائية منعشة.\n\nظروف النمو: يحتاج إلى درجات حرارة دافئة نهاراً ورطوبة أرضية وجوية معتدلة. حساس جداً للصقيع وللرياح القوية.\n\nالتربة والحموضة: تربة طميية خفيفة غنية بالمواد العضوية سريعة الصرف. الـ pH المثالي: 6.0 - 7.0.\n\nالآفات والأمراض: المن، العنكبوت الأحمر، ومرض البياض الزغبي.\n\nالحصاد والتخزين: تحصد الثمار وهي خضراء شابة قبل كبر البذور. يستهلك طازجاً ولا يتحمل التخزين الطويل.&quot;,
            &quot;difficulty_level&quot;: &quot;متوسط&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 28,
                &quot;name&quot;: &quot;خضروات&quot;,
                &quot;description&quot;: &quot;الطماطم، البطاطس، البصل، الخيار...&quot;
            },
            &quot;care_guide&quot;: {
                &quot;id&quot;: 20,
                &quot;watering_schedule&quot;: &quot;يومي (يفضل الري بالتنقيط)&quot;,
                &quot;sunlight_requirement&quot;: &quot;شمس كاملة أو ظل خفيف جداً&quot;,
                &quot;temperature&quot;: &quot;دافئ (20 - 30 درجة)&quot;,
                &quot;humidity&quot;: &quot;عالية قليلاً&quot;,
                &quot;min_temp&quot;: null,
                &quot;max_temp&quot;: null,
                &quot;light_type&quot;: &quot;شمس كاملة أو ظل خفيف جداً&quot;,
                &quot;rainfall&quot;: &quot;ري منتظم وكثيف (حساس للعطش)&quot;,
                &quot;min_humidity&quot;: 40,
                &quot;max_humidity&quot;: 70,
                &quot;irrigation_level&quot;: &quot;ري منتظم وكثيف (حساس للعطش)&quot;,
                &quot;life_cycle&quot;: &quot;متوسطة&quot;,
                &quot;cultivation_method&quot;: &quot;بذر مباشر&quot;,
                &quot;planting_depth&quot;: &quot;2-5 سم&quot;,
                &quot;soil_texture&quot;: &quot;تربة طميية خفيفة غنية بالمواد العضوية سريعة الصرف&quot;,
                &quot;min_ph&quot;: 6,
                &quot;max_ph&quot;: 7,
                &quot;seed_rate&quot;: &quot;10-15 كجم/هكتار&quot;,
                &quot;n_amount&quot;: 80,
                &quot;p_amount&quot;: 40,
                &quot;k_amount&quot;: 40,
                &quot;companion_plants&quot;: &quot;البقوليات، الأعشاب العطرية&quot;,
                &quot;combative_plants&quot;: &quot;الأعشاب الضارة، المحاصيل المنافسة&quot;,
                &quot;management_tips&quot;: &quot;المن، العنكبوت الأحمر، ومرض البياض الزغبي.&quot;,
                &quot;succeeding_crops&quot;: &quot;البقوليات (لتحسين النيتروجين)&quot;,
                &quot;forbidden_crops&quot;: &quot;نفس العائلة النباتية&quot;,
                &quot;rotation_recommendation&quot;: &quot;دورة ثلاثية (حبوب - بقوليات - خضروات)&quot;
            },
            &quot;planting_season&quot;: &quot;ربيعي-صيفي على مدار العام في الصوب&quot;,
            &quot;harvest_time&quot;: &quot;45-60 يوم من الزراعة&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1449300079323-02e209d9d3a6?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;,
            &quot;thumb_url&quot;: &quot;https://images.unsplash.com/photo-1449300079323-02e209d9d3a6?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;
        },
        {
            &quot;id&quot;: 21,
            &quot;scientific_name&quot;: &quot;Cucurbita pepo&quot;,
            &quot;common_name&quot;: &quot;الكوسا&quot;,
            &quot;description&quot;: &quot;من الخضروات القرعية سريعة الإنتاج والمحبوبة في الطبخ اليمني. تزرع في معظم مناطق الجمهورية.&quot;,
            &quot;benefits&quot;: &quot;غنية بالألياف، فيتامين A، والبوتاسيوم، ومفيدة جداً للهضم.&quot;,
            &quot;growth_guide&quot;: &quot;التعريف العلمي: نبات عشبي حولي يتبع الفصيلة القرعية، يتميز بنمو شجيري أو زاحف وثمار صيفية رقيقة الجلد.\n\nظروف النمو: تحتاج إلى موسم نمو دافئ ومشمس. حساسة للصقيع وتتطلب تهوية جيدة لمنع الأمراض الفطرية.\n\nالتربة والحموضة: تربة طميية عميقة جيدة الصرف غنية بالسماد العضوي. الـ pH المثالي: 6.0 - 7.5.\n\nالآفات والأمراض: حشرة المن، خنفساء القثاء، ومرض البياض الدقيقي.\n\nالحصاد والتخزين: تحصد الثمار وهي صغيرة وطريقة (10-15 سم). تستهلك طازجة وتحفظ مبردة لفترات قصيرة.&quot;,
            &quot;difficulty_level&quot;: &quot;متوسط&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 28,
                &quot;name&quot;: &quot;خضروات&quot;,
                &quot;description&quot;: &quot;الطماطم، البطاطس، البصل، الخيار...&quot;
            },
            &quot;care_guide&quot;: {
                &quot;id&quot;: 21,
                &quot;watering_schedule&quot;: &quot;كل 2-3 أيام حسب الجو&quot;,
                &quot;sunlight_requirement&quot;: &quot;شمس كاملة مباشره&quot;,
                &quot;temperature&quot;: &quot;دافئ (18 - 28 درجة)&quot;,
                &quot;humidity&quot;: &quot;متوسطة&quot;,
                &quot;min_temp&quot;: null,
                &quot;max_temp&quot;: null,
                &quot;light_type&quot;: &quot;شمس كاملة مباشره&quot;,
                &quot;rainfall&quot;: &quot;ري منتظم دون إغراق&quot;,
                &quot;min_humidity&quot;: 40,
                &quot;max_humidity&quot;: 70,
                &quot;irrigation_level&quot;: &quot;ري منتظم دون إغراق&quot;,
                &quot;life_cycle&quot;: &quot;متوسطة&quot;,
                &quot;cultivation_method&quot;: &quot;بذر مباشر&quot;,
                &quot;planting_depth&quot;: &quot;2-5 سم&quot;,
                &quot;soil_texture&quot;: &quot;تربة طميية عميقة جيدة الصرف غنية بالسماد العضوي&quot;,
                &quot;min_ph&quot;: 6,
                &quot;max_ph&quot;: 7.5,
                &quot;seed_rate&quot;: &quot;10-15 كجم/هكتار&quot;,
                &quot;n_amount&quot;: 80,
                &quot;p_amount&quot;: 40,
                &quot;k_amount&quot;: 40,
                &quot;companion_plants&quot;: &quot;البقوليات، الأعشاب العطرية&quot;,
                &quot;combative_plants&quot;: &quot;الأعشاب الضارة، المحاصيل المنافسة&quot;,
                &quot;management_tips&quot;: &quot;حشرة المن، خنفساء القثاء، ومرض البياض الدقيقي.&quot;,
                &quot;succeeding_crops&quot;: &quot;البقوليات (لتحسين النيتروجين)&quot;,
                &quot;forbidden_crops&quot;: &quot;نفس العائلة النباتية&quot;,
                &quot;rotation_recommendation&quot;: &quot;دورة ثلاثية (حبوب - بقوليات - خضروات)&quot;
            },
            &quot;planting_season&quot;: &quot;ربيعي وصيفي&quot;,
            &quot;harvest_time&quot;: &quot;45-55 يوم&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1621516086745-fce15da1d977?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;,
            &quot;thumb_url&quot;: &quot;https://images.unsplash.com/photo-1621516086745-fce15da1d977?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;
        },
        {
            &quot;id&quot;: 22,
            &quot;scientific_name&quot;: &quot;Daucus carota&quot;,
            &quot;common_name&quot;: &quot;الجزر&quot;,
            &quot;description&quot;: &quot;محصول جذري يزرع بكثرة في المرتفعات اليمنية ذات الجو البارد والمعتدل.&quot;,
            &quot;benefits&quot;: &quot;غني جداً بالبيتا كاروتين (بروفيتامين A) الضروري لصحة النظر.&quot;,
            &quot;growth_guide&quot;: &quot;التعريف العلمي: نبات عشبي ثنائي الحول يزرع كحولي من أجل جذوره الوتدية المتضخمة الغنية بالكاروتين.\n\nظروف النمو: يحتاج إلى جو بارد لتكوين جذور ذات لون وجودة عالية. يتطلب تربة هشة جداً للسماح للجذر بالنمو مستقيماً.\n\nالتربة والحموضة: تربة رملية أو طميية خفيفة عميقة جداً وخالية من الأحجار. الـ pH المثالي: 6.0 - 7.0.\n\nالآفات والأمراض: ذُبابة الجزر، المن، ومرض النيماتودا.\n\nالحصاد والتخزين: يتم الحصاد عن طريق قلع الجذور عندما تصل للحجم المطلوب. يخزن مبرداً لفترات طويلة.&quot;,
            &quot;difficulty_level&quot;: &quot;متوسط&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 28,
                &quot;name&quot;: &quot;خضروات&quot;,
                &quot;description&quot;: &quot;الطماطم، البطاطس، البصل، الخيار...&quot;
            },
            &quot;care_guide&quot;: {
                &quot;id&quot;: 22,
                &quot;watering_schedule&quot;: &quot;كل 3-5 أيام حسب التربة&quot;,
                &quot;sunlight_requirement&quot;: &quot;شمس كاملة أو ظل خفيف&quot;,
                &quot;temperature&quot;: &quot;معتدل مائل للبرودة (12 - 22 درجة)&quot;,
                &quot;humidity&quot;: &quot;منخفضة إلى متوسطة&quot;,
                &quot;min_temp&quot;: null,
                &quot;max_temp&quot;: null,
                &quot;light_type&quot;: &quot;شمس كاملة أو ظل خفيف&quot;,
                &quot;rainfall&quot;: &quot;ري منتظم (الجفاف يسبب تشقق الجذور)&quot;,
                &quot;min_humidity&quot;: 40,
                &quot;max_humidity&quot;: 70,
                &quot;irrigation_level&quot;: &quot;ري منتظم (الجفاف يسبب تشقق الجذور)&quot;,
                &quot;life_cycle&quot;: &quot;متوسطة&quot;,
                &quot;cultivation_method&quot;: &quot;بذر مباشر&quot;,
                &quot;planting_depth&quot;: &quot;2-5 سم&quot;,
                &quot;soil_texture&quot;: &quot;تربة رملية أو طميية خفيفة عميقة جداً وخالية من الأحجار&quot;,
                &quot;min_ph&quot;: 6,
                &quot;max_ph&quot;: 7,
                &quot;seed_rate&quot;: &quot;10-15 كجم/هكتار&quot;,
                &quot;n_amount&quot;: 80,
                &quot;p_amount&quot;: 40,
                &quot;k_amount&quot;: 40,
                &quot;companion_plants&quot;: &quot;البقوليات، الأعشاب العطرية&quot;,
                &quot;combative_plants&quot;: &quot;الأعشاب الضارة، المحاصيل المنافسة&quot;,
                &quot;management_tips&quot;: &quot;ذُبابة الجزر، المن، ومرض النيماتودا.&quot;,
                &quot;succeeding_crops&quot;: &quot;البقوليات (لتحسين النيتروجين)&quot;,
                &quot;forbidden_crops&quot;: &quot;نفس العائلة النباتية&quot;,
                &quot;rotation_recommendation&quot;: &quot;دورة ثلاثية (حبوب - بقوليات - خضروات)&quot;
            },
            &quot;planting_season&quot;: &quot;خريفي وشتوي&quot;,
            &quot;harvest_time&quot;: &quot;80-100 يوم&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1598170845058-32b9d6a5da37?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;,
            &quot;thumb_url&quot;: &quot;https://images.unsplash.com/photo-1598170845058-32b9d6a5da37?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;
        },
        {
            &quot;id&quot;: 23,
            &quot;scientific_name&quot;: &quot;Phaseolus vulgaris&quot;,
            &quot;common_name&quot;: &quot;الفاصوليا الخضراء&quot;,
            &quot;description&quot;: &quot;محصول بقولي سريع الإنتاج، يزرع من أجل القرون الخضراء أو البذور الجافة. تنجح زراعتها في المناطق المعتدلة.&quot;,
            &quot;benefits&quot;: &quot;مصدر ممتاز للبروتين النباتي، الألياف، والعديد من المعادن كفيتامين B.&quot;,
            &quot;growth_guide&quot;: &quot;التعريف العلمي: نبات عشبي حولي يتبع الفصيلة البقولية، يتميز بقدرته على تثبيت النيتروجين الجوي في التربة عبر جذوره.\n\nظروف النمو: تحتاج إلى جو دافئ ومعتدل، حساسة جداً للصقيع وللحرارة المرتفعة جداً التي تسبب تساقط الأزهار.\n\nالتربة والحموضة: تربة طميية متوسطة جيدة الصرف غنية بالمادة العضوية. الـ pH المثالي: 6.0 - 7.5.\n\nالآفات والأمراض: المن، العنكبوت الأحمر، ومرض الصدأ.\n\nالحصاد والتخزين: تحصد القرون وهي خضراء طرية قبل بروز البذور بداخلها. تستهلك طازجة أو تبرد.&quot;,
            &quot;difficulty_level&quot;: &quot;متوسط&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 28,
                &quot;name&quot;: &quot;خضروات&quot;,
                &quot;description&quot;: &quot;الطماطم، البطاطس، البصل، الخيار...&quot;
            },
            &quot;care_guide&quot;: {
                &quot;id&quot;: 23,
                &quot;watering_schedule&quot;: &quot;كل 2-4 أيام حسب نوع التربة&quot;,
                &quot;sunlight_requirement&quot;: &quot;شمس كاملة مباشرة&quot;,
                &quot;temperature&quot;: &quot;معتدل (18 - 25 درجة)&quot;,
                &quot;humidity&quot;: &quot;متوسطة&quot;,
                &quot;min_temp&quot;: null,
                &quot;max_temp&quot;: null,
                &quot;light_type&quot;: &quot;شمس كاملة مباشرة&quot;,
                &quot;rainfall&quot;: &quot;ري منتظم (خاصة وقت التزهير والعقد)&quot;,
                &quot;min_humidity&quot;: 40,
                &quot;max_humidity&quot;: 70,
                &quot;irrigation_level&quot;: &quot;ري منتظم (خاصة وقت التزهير والعقد)&quot;,
                &quot;life_cycle&quot;: &quot;متوسطة&quot;,
                &quot;cultivation_method&quot;: &quot;بذر مباشر&quot;,
                &quot;planting_depth&quot;: &quot;2-5 سم&quot;,
                &quot;soil_texture&quot;: &quot;تربة طميية متوسطة جيدة الصرف غنية بالمادة العضوية&quot;,
                &quot;min_ph&quot;: 6,
                &quot;max_ph&quot;: 7.5,
                &quot;seed_rate&quot;: &quot;10-15 كجم/هكتار&quot;,
                &quot;n_amount&quot;: 80,
                &quot;p_amount&quot;: 40,
                &quot;k_amount&quot;: 40,
                &quot;companion_plants&quot;: &quot;البقوليات، الأعشاب العطرية&quot;,
                &quot;combative_plants&quot;: &quot;الأعشاب الضارة، المحاصيل المنافسة&quot;,
                &quot;management_tips&quot;: &quot;المن، العنكبوت الأحمر، ومرض الصدأ.&quot;,
                &quot;succeeding_crops&quot;: &quot;البقوليات (لتحسين النيتروجين)&quot;,
                &quot;forbidden_crops&quot;: &quot;نفس العائلة النباتية&quot;,
                &quot;rotation_recommendation&quot;: &quot;دورة ثلاثية (حبوب - بقوليات - خضروات)&quot;
            },
            &quot;planting_season&quot;: &quot;ربيعي وخريفي&quot;,
            &quot;harvest_time&quot;: &quot;50-70 يوم للقرون الخضراء&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1549419134-93e115049b81?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;,
            &quot;thumb_url&quot;: &quot;https://images.unsplash.com/photo-1549419134-93e115049b81?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;
        },
        {
            &quot;id&quot;: 24,
            &quot;scientific_name&quot;: &quot;Corchorus olitorius&quot;,
            &quot;common_name&quot;: &quot;الملوخية&quot;,
            &quot;description&quot;: &quot;نبا ورقي صيفي شعبي جداً في اليمن. يتميز بقدرته الكبيرة على تحمل الحرارة والنمو السريع.&quot;,
            &quot;benefits&quot;: &quot;ملينة طبيعية ممتازة، غنية بالحديد، الكالسيوم، وفيتامين A.&quot;,
            &quot;growth_guide&quot;: &quot;التعريف العلمي: نبات عشبي حولي يتبع الفصيلة الخبازية، يزرع من أجل أوراقه الخضراء الغنية بالمادة المخاطية المفيدة.\n\nظروف النمو: تحتاج إلى درجات حرارة مرتفعة جداً وإضاءة قوية. تتوقف عن النمو في الأجواء الباردة.\n\nالتربة والحموضة: تنجح في مختلف أنواع التربة، مفضلة التربة الطميية الخصبة. الـ pH المثالي: 6.0 - 7.5.\n\nالآفات والأمراض: المن، الدودة الخضراء، والعنكبوت الأحمر.\n\nالحصاد والتخزين: يتم الحش (الحصاد) المتكرر للأوراق والسيقان العلوية. تستهلك طازجة أو تجفف.&quot;,
            &quot;difficulty_level&quot;: &quot;متوسط&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 28,
                &quot;name&quot;: &quot;خضروات&quot;,
                &quot;description&quot;: &quot;الطماطم، البطاطس، البصل، الخيار...&quot;
            },
            &quot;care_guide&quot;: {
                &quot;id&quot;: 24,
                &quot;watering_schedule&quot;: &quot;يومي في الأيام الحارة&quot;,
                &quot;sunlight_requirement&quot;: &quot;شمس كاملة قوية جداً&quot;,
                &quot;temperature&quot;: &quot;حار جداً (30 - 40 درجة)&quot;,
                &quot;humidity&quot;: &quot;متوسطة&quot;,
                &quot;min_temp&quot;: null,
                &quot;max_temp&quot;: null,
                &quot;light_type&quot;: &quot;شمس كاملة قوية جداً&quot;,
                &quot;rainfall&quot;: &quot;ري مكثف ومنتظم (تحب الرطوبة)&quot;,
                &quot;min_humidity&quot;: 40,
                &quot;max_humidity&quot;: 70,
                &quot;irrigation_level&quot;: &quot;ري مكثف ومنتظم (تحب الرطوبة)&quot;,
                &quot;life_cycle&quot;: &quot;متوسطة&quot;,
                &quot;cultivation_method&quot;: &quot;بذر مباشر&quot;,
                &quot;planting_depth&quot;: &quot;2-5 سم&quot;,
                &quot;soil_texture&quot;: &quot;تنجح في مختلف أنواع التربة، مفضلة التربة الطميية الخصبة&quot;,
                &quot;min_ph&quot;: 6,
                &quot;max_ph&quot;: 7.5,
                &quot;seed_rate&quot;: &quot;10-15 كجم/هكتار&quot;,
                &quot;n_amount&quot;: 80,
                &quot;p_amount&quot;: 40,
                &quot;k_amount&quot;: 40,
                &quot;companion_plants&quot;: &quot;البقوليات، الأعشاب العطرية&quot;,
                &quot;combative_plants&quot;: &quot;الأعشاب الضارة، المحاصيل المنافسة&quot;,
                &quot;management_tips&quot;: &quot;المن، الدودة الخضراء، والعنكبوت الأحمر.&quot;,
                &quot;succeeding_crops&quot;: &quot;البقوليات (لتحسين النيتروجين)&quot;,
                &quot;forbidden_crops&quot;: &quot;نفس العائلة النباتية&quot;,
                &quot;rotation_recommendation&quot;: &quot;دورة ثلاثية (حبوب - بقوليات - خضروات)&quot;
            },
            &quot;planting_season&quot;: &quot;صيفي (مارس - أغسطس)&quot;,
            &quot;harvest_time&quot;: &quot;40-50 يوم للحشة الأولى&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1540148426941-657152eb40f1?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;,
            &quot;thumb_url&quot;: &quot;https://images.unsplash.com/photo-1540148426941-657152eb40f1?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;
        },
        {
            &quot;id&quot;: 25,
            &quot;scientific_name&quot;: &quot;Citrullus lanatus&quot;,
            &quot;common_name&quot;: &quot;البطيخ (الحبحب)&quot;,
            &quot;description&quot;: &quot;فاكهة الصيف الأولى في اليمن. تتركز زراعتها في تهامة والجوف ومأرب لإنتاج ثمار ضخمة وسكرية.&quot;,
            &quot;benefits&quot;: &quot;مرطب طبيعي منعش، مفيد لصحة الكلى والقلب، ومصدر للليكوبين.&quot;,
            &quot;growth_guide&quot;: &quot;التعريف العلمي: نبات عشبي حولي زاحف من الفصيلة القرعية، يتميز بإنتاج ثمار لبية ضخمة تحتوي على نسبة عالية من المياه والسكريات.\n\nظروف النمو: يحتاج إلى موسم نمو طار وحار جداً وجو جاف عند النضج. يتطلب مساحات واسعة للنمو الزاحف.\n\nالتربة والحموضة: يفضل التربة الرملية الطميية العميقة جيدة الصرف. الـ pH المثالي: 6.0 - 7.0.\n\nالآفات والأمراض: خنفساء البطيخ، المن، ومرض الذبول الفيوزاريومي.\n\nالحصاد والتخزين: يحصد عند ظهور علامات النضج (ذبول المحلاق وجفاف بقعة التلامس مع الأرض). يخزن مبرداً.&quot;,
            &quot;difficulty_level&quot;: &quot;متوسط&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 28,
                &quot;name&quot;: &quot;خضروات&quot;,
                &quot;description&quot;: &quot;الطماطم، البطاطس، البصل، الخيار...&quot;
            },
            &quot;care_guide&quot;: {
                &quot;id&quot;: 25,
                &quot;watering_schedule&quot;: &quot;كل 3-6 أيام حسب نوع التربة&quot;,
                &quot;sunlight_requirement&quot;: &quot;شمس كاملة حارقة&quot;,
                &quot;temperature&quot;: &quot;حار (25 - 38 درجة)&quot;,
                &quot;humidity&quot;: &quot;منخفضة (الجفاف مفضل)&quot;,
                &quot;min_temp&quot;: null,
                &quot;max_temp&quot;: null,
                &quot;light_type&quot;: &quot;شمس كاملة حارقة&quot;,
                &quot;rainfall&quot;: &quot;ري منتظم يقلل بشده قبل النضج لتركيز السكر&quot;,
                &quot;min_humidity&quot;: 40,
                &quot;max_humidity&quot;: 70,
                &quot;irrigation_level&quot;: &quot;ري منتظم يقلل بشده قبل النضج لتركيز السكر&quot;,
                &quot;life_cycle&quot;: &quot;متوسطة&quot;,
                &quot;cultivation_method&quot;: &quot;بذر مباشر&quot;,
                &quot;planting_depth&quot;: &quot;2-5 سم&quot;,
                &quot;soil_texture&quot;: &quot;يفضل التربة الرملية الطميية العميقة جيدة الصرف&quot;,
                &quot;min_ph&quot;: 6,
                &quot;max_ph&quot;: 7,
                &quot;seed_rate&quot;: &quot;10-15 كجم/هكتار&quot;,
                &quot;n_amount&quot;: 80,
                &quot;p_amount&quot;: 40,
                &quot;k_amount&quot;: 40,
                &quot;companion_plants&quot;: &quot;البقوليات، الأعشاب العطرية&quot;,
                &quot;combative_plants&quot;: &quot;الأعشاب الضارة، المحاصيل المنافسة&quot;,
                &quot;management_tips&quot;: &quot;خنفساء البطيخ، المن، ومرض الذبول الفيوزاريومي.&quot;,
                &quot;succeeding_crops&quot;: &quot;البقوليات (لتحسين النيتروجين)&quot;,
                &quot;forbidden_crops&quot;: &quot;نفس العائلة النباتية&quot;,
                &quot;rotation_recommendation&quot;: &quot;دورة ثلاثية (حبوب - بقوليات - خضروات)&quot;
            },
            &quot;planting_season&quot;: &quot;صيفي (فبراير - أبريل)&quot;,
            &quot;harvest_time&quot;: &quot;80-100 يوم&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1589739900266-43b2843f4c12?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;,
            &quot;thumb_url&quot;: &quot;https://images.unsplash.com/photo-1589739900266-43b2843f4c12?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;
        },
        {
            &quot;id&quot;: 26,
            &quot;scientific_name&quot;: &quot;Mentha spp.&quot;,
            &quot;common_name&quot;: &quot;النعناع&quot;,
            &quot;description&quot;: &quot;عشبة عطرية منعشة تزرع في معظم المنازل والمزارع اليمنية. يتميز النعناع اليمني برائحته القوية.&quot;,
            &quot;benefits&quot;: &quot;طارد للغازات، مهدئ للاعصاب، ويساعد على الهضم وتسكين الآلام.&quot;,
            &quot;growth_guide&quot;: &quot;التعريف العلمي: نبات عشبي معمر يتبع الفصيلة الشفوية، يتميز بسيقان زاحفة تحت أرضية ومدادات فوق أرضية تساعده على الانتشار السريع.\n\nظروف النمو: يفضل المناطق المعتدلة والباردة والرطبة. يحتاج إلى إضاءة جيدة وتوفر دائم للماء.\n\nالتربة والحموضة: يفضل التربة الطميية الغنية بالمادة العضوية والاحتفاظ بالرطوبة. الـ pH المثالي: 6.0 - 7.0.\n\nالآفات والأمراض: حشرة المن، والصدأ.\n\nالحصاد والتخزين: يتم الحصاد بقرط الأفرع والسيقان. تستهلك طازجة أو تجفف في الظل للحفاظ على رائحتها.&quot;,
            &quot;difficulty_level&quot;: &quot;متوسط&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 31,
                &quot;name&quot;: &quot;أعشاب ونباتات طبية&quot;,
                &quot;description&quot;: &quot;النعناع، الزعتر، الجرجير...&quot;
            },
            &quot;care_guide&quot;: {
                &quot;id&quot;: 26,
                &quot;watering_schedule&quot;: &quot;يومي في الصيف&quot;,
                &quot;sunlight_requirement&quot;: &quot;شمس كاملة أو ظل جزئي&quot;,
                &quot;temperature&quot;: &quot;معتدل (15 - 25 درجة)&quot;,
                &quot;humidity&quot;: &quot;عالية&quot;,
                &quot;min_temp&quot;: null,
                &quot;max_temp&quot;: null,
                &quot;light_type&quot;: &quot;شمس كاملة أو ظل جزئي&quot;,
                &quot;rainfall&quot;: &quot;ري منتظم وكثيف (يحب الرطوبة)&quot;,
                &quot;min_humidity&quot;: 40,
                &quot;max_humidity&quot;: 70,
                &quot;irrigation_level&quot;: &quot;ري منتظم وكثيف (يحب الرطوبة)&quot;,
                &quot;life_cycle&quot;: &quot;متوسطة&quot;,
                &quot;cultivation_method&quot;: &quot;بذر مباشر&quot;,
                &quot;planting_depth&quot;: &quot;2-5 سم&quot;,
                &quot;soil_texture&quot;: &quot;يفضل التربة الطميية الغنية بالمادة العضوية والاحتفاظ بالرطوبة&quot;,
                &quot;min_ph&quot;: 6,
                &quot;max_ph&quot;: 7,
                &quot;seed_rate&quot;: &quot;10-15 كجم/هكتار&quot;,
                &quot;n_amount&quot;: 80,
                &quot;p_amount&quot;: 40,
                &quot;k_amount&quot;: 40,
                &quot;companion_plants&quot;: &quot;البقوليات، الأعشاب العطرية&quot;,
                &quot;combative_plants&quot;: &quot;الأعشاب الضارة، المحاصيل المنافسة&quot;,
                &quot;management_tips&quot;: &quot;حشرة المن، والصدأ.&quot;,
                &quot;succeeding_crops&quot;: &quot;البقوليات (لتحسين النيتروجين)&quot;,
                &quot;forbidden_crops&quot;: &quot;نفس العائلة النباتية&quot;,
                &quot;rotation_recommendation&quot;: &quot;دورة ثلاثية (حبوب - بقوليات - خضروات)&quot;
            },
            &quot;planting_season&quot;: &quot;طوال العام (يفضل الربيع والخريف)&quot;,
            &quot;harvest_time&quot;: &quot;30-45 يوم للحشة الواحدة&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1600271886742-f049cd451bba?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;,
            &quot;thumb_url&quot;: &quot;https://images.unsplash.com/photo-1600271886742-f049cd451bba?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;
        },
        {
            &quot;id&quot;: 27,
            &quot;scientific_name&quot;: &quot;Thymus spp.&quot;,
            &quot;common_name&quot;: &quot;الزعتر&quot;,
            &quot;description&quot;: &quot;عشبة برية وعطرية هامة جداً في الثقافة اليمنية، تستخدم في الغذاء والدواء.&quot;,
            &quot;benefits&quot;: &quot;مضاد حيوي طبيعي، مطهر للمجاري التنفسية، ومنشط للدورة الدموية.&quot;,
            &quot;growth_guide&quot;: &quot;التعريف العلمي: شجيرة معمرة صغيرة دائمة الخضرة تتبع الفصيلة الشفوية، تتميز برائحتها العطرية ومحتواها العالي من الزيوت الطيارة (الثيمول).\n\nظروف النمو: تفضل المناطق الجبلية والجو الجاف. تتحمل العطش والحرارة والبرودة بشكل جيد جداً.\n\nالتربة والحموضة: تفضل التربة الخفيفة أو الكلسية جيدة الصرف. الـ pH المثالي: 7.0 - 8.5.\n\nالآفات والأمراض: نبات قوي ونادراً ما يصاب بالآفات، قد يتأثر بعفن الجذور عند زيادة الري.\n\nالحصاد والتخزين: تحصد الأفرع والأوراق قبل التزهير لتركيز الزيوت. تجفف في الظل وتطحن لاستخدامها.&quot;,
            &quot;difficulty_level&quot;: &quot;متوسط&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 31,
                &quot;name&quot;: &quot;أعشاب ونباتات طبية&quot;,
                &quot;description&quot;: &quot;النعناع، الزعتر، الجرجير...&quot;
            },
            &quot;care_guide&quot;: {
                &quot;id&quot;: 27,
                &quot;watering_schedule&quot;: &quot;كل 10-15 يوم&quot;,
                &quot;sunlight_requirement&quot;: &quot;شمس كاملة قوية&quot;,
                &quot;temperature&quot;: &quot;معتدل إلى حار&quot;,
                &quot;humidity&quot;: &quot;منخفضة (الجفاف صديقه)&quot;,
                &quot;min_temp&quot;: null,
                &quot;max_temp&quot;: null,
                &quot;light_type&quot;: &quot;شمس كاملة قوية&quot;,
                &quot;rainfall&quot;: &quot;ري قليل جداً (أو بعلي)&quot;,
                &quot;min_humidity&quot;: 40,
                &quot;max_humidity&quot;: 70,
                &quot;irrigation_level&quot;: &quot;ري قليل جداً (أو بعلي)&quot;,
                &quot;life_cycle&quot;: &quot;قصيرة&quot;,
                &quot;cultivation_method&quot;: &quot;بذر مباشر&quot;,
                &quot;planting_depth&quot;: &quot;2-5 سم&quot;,
                &quot;soil_texture&quot;: &quot;تفضل التربة الخفيفة أو الكلسية جيدة الصرف&quot;,
                &quot;min_ph&quot;: 7,
                &quot;max_ph&quot;: 8.5,
                &quot;seed_rate&quot;: &quot;10-15 كجم/هكتار&quot;,
                &quot;n_amount&quot;: 80,
                &quot;p_amount&quot;: 40,
                &quot;k_amount&quot;: 40,
                &quot;companion_plants&quot;: &quot;البقوليات، الأعشاب العطرية&quot;,
                &quot;combative_plants&quot;: &quot;الأعشاب الضارة، المحاصيل المنافسة&quot;,
                &quot;management_tips&quot;: &quot;نبات قوي ونادراً ما يصاب بالآفات، قد يتأثر بعفن الجذور عند زيادة الري.&quot;,
                &quot;succeeding_crops&quot;: &quot;البقوليات (لتحسين النيتروجين)&quot;,
                &quot;forbidden_crops&quot;: &quot;نفس العائلة النباتية&quot;,
                &quot;rotation_recommendation&quot;: &quot;دورة ثلاثية (حبوب - بقوليات - خضروات)&quot;
            },
            &quot;planting_season&quot;: &quot;الربيع وأوائل الخريف&quot;,
            &quot;harvest_time&quot;: &quot;بعد 4-6 أشهر من الزراعة&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1549419134-93e115049b81?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;,
            &quot;thumb_url&quot;: &quot;https://images.unsplash.com/photo-1549419134-93e115049b81?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;
        },
        {
            &quot;id&quot;: 28,
            &quot;scientific_name&quot;: &quot;Eruca vesicaria&quot;,
            &quot;common_name&quot;: &quot;الجرجير&quot;,
            &quot;description&quot;: &quot;من أكثر النباتات الورقية انتشاراً في اليمن. يتميز الجرجير البلدي بمذاقه الحريف القوي.&quot;,
            &quot;benefits&quot;: &quot;مقوي عام، غني بالفيتامينات والمعادن، ومنشط للهضم والدورة الدموية.&quot;,
            &quot;growth_guide&quot;: &quot;التعريف العلمي: نبات عشبي حولي يتبع الفصيلة الصليبية، يزرع من أجل أوراقه الخضراء المشرشرة التي تؤكل نيئة.\n\nظروف النمو: يفضل الأجواء المعتدلة والباردة. سريع النمو جداً ويزهر بسرعة عند ارتفاع درجات الحرارة.\n\nالتربة والحموضة: تفضل التربة الخفيفة الغنية بالمادة العضوية. الـ pH المثالي: 6.0 - 7.0.\n\nالآفات والأمراض: المن، والاصداء البيضاء.\n\nالحصاد والتخزين: يتم الحصاد بقطع الأوراق فوق سطح الأرض لتعاود النمو. يستهلك طازجاً.&quot;,
            &quot;difficulty_level&quot;: &quot;متوسط&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 31,
                &quot;name&quot;: &quot;أعشاب ونباتات طبية&quot;,
                &quot;description&quot;: &quot;النعناع، الزعتر، الجرجير...&quot;
            },
            &quot;care_guide&quot;: {
                &quot;id&quot;: 28,
                &quot;watering_schedule&quot;: &quot;يومي&quot;,
                &quot;sunlight_requirement&quot;: &quot;شمس كاملة أو ظل خفيف&quot;,
                &quot;temperature&quot;: &quot;معتدل إلى بارد (15 - 25 درجة)&quot;,
                &quot;humidity&quot;: &quot;متوسطة&quot;,
                &quot;min_temp&quot;: null,
                &quot;max_temp&quot;: null,
                &quot;light_type&quot;: &quot;شمس كاملة أو ظل خفيف&quot;,
                &quot;rainfall&quot;: &quot;ري يومي منتظم (يحب الماء)&quot;,
                &quot;min_humidity&quot;: 40,
                &quot;max_humidity&quot;: 70,
                &quot;irrigation_level&quot;: &quot;ري يومي منتظم (يحب الماء)&quot;,
                &quot;life_cycle&quot;: &quot;متوسطة&quot;,
                &quot;cultivation_method&quot;: &quot;بذر مباشر&quot;,
                &quot;planting_depth&quot;: &quot;2-5 سم&quot;,
                &quot;soil_texture&quot;: &quot;تفضل التربة الخفيفة الغنية بالمادة العضوية&quot;,
                &quot;min_ph&quot;: 6,
                &quot;max_ph&quot;: 7,
                &quot;seed_rate&quot;: &quot;10-15 كجم/هكتار&quot;,
                &quot;n_amount&quot;: 80,
                &quot;p_amount&quot;: 40,
                &quot;k_amount&quot;: 40,
                &quot;companion_plants&quot;: &quot;البقوليات، الأعشاب العطرية&quot;,
                &quot;combative_plants&quot;: &quot;الأعشاب الضارة، المحاصيل المنافسة&quot;,
                &quot;management_tips&quot;: &quot;المن، والاصداء البيضاء.&quot;,
                &quot;succeeding_crops&quot;: &quot;البقوليات (لتحسين النيتروجين)&quot;,
                &quot;forbidden_crops&quot;: &quot;نفس العائلة النباتية&quot;,
                &quot;rotation_recommendation&quot;: &quot;دورة ثلاثية (حبوب - بقوليات - خضروات)&quot;
            },
            &quot;planting_season&quot;: &quot;على مدار العام (يفضل الشهور المعتدلة)&quot;,
            &quot;harvest_time&quot;: &quot;20-30 يوم من الزراعة&quot;,
            &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1595124253344-7786444f1df6?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;,
            &quot;thumb_url&quot;: &quot;https://images.unsplash.com/photo-1595124253344-7786444f1df6?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;
        }
    ],
    &quot;success&quot;: true
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-plants" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-plants"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-plants"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-plants" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-plants">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-plants" data-method="GET"
      data-path="api/plants"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-plants', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-plants"
                    onclick="tryItOut('GETapi-plants');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-plants"
                    onclick="cancelTryOut('GETapi-plants');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-plants"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/plants</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-plants"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-plants"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-plants-categories">GET api/plants/categories</h2>

<p>
</p>



<span id="example-requests-GETapi-plants-categories">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://192.168.8.32:8000/api/plants/categories" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/plants/categories"
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

<span id="example-responses-GETapi-plants-categories">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 59
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 27,
            &quot;name&quot;: &quot;حبوب&quot;,
            &quot;description&quot;: &quot;الذرة الرفيعة، القمح، الدخن، الشعير...&quot;
        },
        {
            &quot;id&quot;: 28,
            &quot;name&quot;: &quot;خضروات&quot;,
            &quot;description&quot;: &quot;الطماطم، البطاطس، البصل، الخيار...&quot;
        },
        {
            &quot;id&quot;: 29,
            &quot;name&quot;: &quot;فواكه&quot;,
            &quot;description&quot;: &quot;المانجو، الموز، العنب، الرمان...&quot;
        },
        {
            &quot;id&quot;: 30,
            &quot;name&quot;: &quot;محاصيل نقدية&quot;,
            &quot;description&quot;: &quot;القات، البن اليمني، القطن، السمسم...&quot;
        },
        {
            &quot;id&quot;: 31,
            &quot;name&quot;: &quot;أعشاب ونباتات طبية&quot;,
            &quot;description&quot;: &quot;النعناع، الزعتر، الجرجير...&quot;
        }
    ],
    &quot;success&quot;: true
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-plants-categories" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-plants-categories"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-plants-categories"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-plants-categories" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-plants-categories">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-plants-categories" data-method="GET"
      data-path="api/plants/categories"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-plants-categories', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-plants-categories"
                    onclick="tryItOut('GETapi-plants-categories');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-plants-categories"
                    onclick="cancelTryOut('GETapi-plants-categories');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-plants-categories"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/plants/categories</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-plants-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-plants-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-plants--id-">GET api/plants/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-plants--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://192.168.8.32:8000/api/plants/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/plants/1"
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

<span id="example-responses-GETapi-plants--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 59
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;scientific_name&quot;: &quot;Sorghum bicolor&quot;,
        &quot;common_name&quot;: &quot;الذرة الرفيعة&quot;,
        &quot;description&quot;: &quot;نبات حبوب سنوي مقاوم للجفاف، يُزرع بكثرة في المرتفعات والمناطق الجافة في اليمن.&quot;,
        &quot;benefits&quot;: &quot;مصدر غني بالكربوهيدرات والبروتين والألياف. يستخدم السيقان الخضراء كعلف للماشية.&quot;,
        &quot;growth_guide&quot;: &quot;التعريف العلمي: نبات عشبي حولي من الفصيلة النجيلية، يتميز بقدرته العالية على تحمل الجفاف والحرارة العالية، ويعد ثالث أهم محصول حبوب في اليمن من حيث المساحة والإنتاج.\n\nظروف النمو: يزدهر في درجات حرارة بين 25-30 درجة مئوية. يتطلب موسم نمو طويل ودافئ وجاف نسبياً عند النضج.\n\nالتربة والحموضة: يفضل التربة الطميية الرملية جيدة الصرف. الـ pH المثالي: 6.0 - 7.5.\n\nالآفات والأمراض: دودة الحشد الخريفية، ذبابة ثمار الذرة، ومرض التفحم.\n\nالحصاد والتخزين: يتم الحصاد عند جفاف الحبوب وتصلبها. تخزن في &#039;المدافن&#039; التقليدية لحمايتها من الرطوبة والآفات.&quot;,
        &quot;difficulty_level&quot;: &quot;متوسط&quot;,
        &quot;category&quot;: {
            &quot;id&quot;: 27,
            &quot;name&quot;: &quot;حبوب&quot;,
            &quot;description&quot;: &quot;الذرة الرفيعة، القمح، الدخن، الشعير...&quot;
        },
        &quot;care_guide&quot;: {
            &quot;id&quot;: 1,
            &quot;watering_schedule&quot;: &quot;متباعد جدا، مقاوم للجفاف&quot;,
            &quot;sunlight_requirement&quot;: &quot;شمس كاملة قوية&quot;,
            &quot;temperature&quot;: &quot;معتدل إلى حار&quot;,
            &quot;humidity&quot;: &quot;منخفضة إلى متوسطة&quot;,
            &quot;min_temp&quot;: 25,
            &quot;max_temp&quot;: 30,
            &quot;light_type&quot;: &quot;شمس كاملة قوية&quot;,
            &quot;rainfall&quot;: &quot;بعلية أساسًا، ري خفيف&quot;,
            &quot;min_humidity&quot;: 40,
            &quot;max_humidity&quot;: 70,
            &quot;irrigation_level&quot;: &quot;بعلية أساسًا، ري خفيف&quot;,
            &quot;life_cycle&quot;: &quot;متوسطة&quot;,
            &quot;cultivation_method&quot;: &quot;بذر مباشر&quot;,
            &quot;planting_depth&quot;: &quot;2-5 سم&quot;,
            &quot;soil_texture&quot;: &quot;يفضل التربة الطميية الرملية جيدة الصرف&quot;,
            &quot;min_ph&quot;: 6,
            &quot;max_ph&quot;: 7.5,
            &quot;seed_rate&quot;: &quot;10-15 كجم/هكتار&quot;,
            &quot;n_amount&quot;: 80,
            &quot;p_amount&quot;: 40,
            &quot;k_amount&quot;: 40,
            &quot;companion_plants&quot;: &quot;البقوليات، الأعشاب العطرية&quot;,
            &quot;combative_plants&quot;: &quot;الأعشاب الضارة، المحاصيل المنافسة&quot;,
            &quot;management_tips&quot;: &quot;دودة الحشد الخريفية، ذبابة ثمار الذرة، ومرض التفحم.&quot;,
            &quot;succeeding_crops&quot;: &quot;البقوليات (لتحسين النيتروجين)&quot;,
            &quot;forbidden_crops&quot;: &quot;نفس العائلة النباتية&quot;,
            &quot;rotation_recommendation&quot;: &quot;دورة ثلاثية (حبوب - بقوليات - خضروات)&quot;
        },
        &quot;planting_season&quot;: &quot;صيفي وخريفي وبيني&quot;,
        &quot;harvest_time&quot;: &quot;90-120 يوم&quot;,
        &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1596489823521-707db99d2595?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;,
        &quot;thumb_url&quot;: &quot;https://images.unsplash.com/photo-1596489823521-707db99d2595?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&quot;
    },
    &quot;success&quot;: true
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-plants--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-plants--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-plants--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-plants--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-plants--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-plants--id-" data-method="GET"
      data-path="api/plants/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-plants--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-plants--id-"
                    onclick="tryItOut('GETapi-plants--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-plants--id-"
                    onclick="cancelTryOut('GETapi-plants--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-plants--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/plants/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-plants--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-plants--id-"
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
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-plants--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the plant. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-metadata">Get all application metadata (categories, units, payment methods, etc.)
This serves as the single source of truth for the mobile app.</h2>

<p>
</p>



<span id="example-requests-GETapi-metadata">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://192.168.8.32:8000/api/metadata" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/metadata"
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

<span id="example-responses-GETapi-metadata">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 59
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: null,
    &quot;data&quot;: {
        &quot;marketplace&quot;: {
            &quot;categories&quot;: [
                {
                    &quot;id&quot;: &quot;بذور&quot;,
                    &quot;label&quot;: &quot;بذور&quot;,
                    &quot;icon&quot;: &quot;seeds&quot;
                },
                {
                    &quot;id&quot;: &quot;اسمدة&quot;,
                    &quot;label&quot;: &quot;اسمدة&quot;,
                    &quot;icon&quot;: &quot;fertilizer&quot;
                },
                {
                    &quot;id&quot;: &quot;مبيدات&quot;,
                    &quot;label&quot;: &quot;مبيدات&quot;,
                    &quot;icon&quot;: &quot;pest&quot;
                },
                {
                    &quot;id&quot;: &quot;محاصيل&quot;,
                    &quot;label&quot;: &quot;محاصيل&quot;,
                    &quot;icon&quot;: &quot;harvest&quot;
                },
                {
                    &quot;id&quot;: &quot;معدات&quot;,
                    &quot;label&quot;: &quot;معدات&quot;,
                    &quot;icon&quot;: &quot;tools&quot;
                },
                {
                    &quot;id&quot;: &quot;المشاتل&quot;,
                    &quot;label&quot;: &quot;المشاتل&quot;,
                    &quot;icon&quot;: &quot;nursery&quot;
                }
            ],
            &quot;units&quot;: [
                &quot;جرام&quot;,
                &quot;حبة&quot;,
                &quot;صندوق&quot;,
                &quot;طن&quot;,
                &quot;كيس&quot;,
                &quot;كيلوجرام&quot;,
                &quot;لتر&quot;,
                &quot;مل&quot;
            ],
            &quot;payment_methods&quot;: [
                {
                    &quot;id&quot;: &quot;cash&quot;,
                    &quot;label&quot;: &quot;نقدي عند الاستلام&quot;,
                    &quot;icon&quot;: &quot;cash&quot;
                },
                {
                    &quot;id&quot;: &quot;bank_transfer&quot;,
                    &quot;label&quot;: &quot;تحويل بنكي&quot;,
                    &quot;icon&quot;: &quot;bank&quot;
                },
                {
                    &quot;id&quot;: &quot;credit_card&quot;,
                    &quot;label&quot;: &quot;بطاقة ائتمانية&quot;,
                    &quot;icon&quot;: &quot;card&quot;
                },
                {
                    &quot;id&quot;: &quot;mada&quot;,
                    &quot;label&quot;: &quot;مدى&quot;,
                    &quot;icon&quot;: &quot;mada&quot;
                },
                {
                    &quot;id&quot;: &quot;apple_pay&quot;,
                    &quot;label&quot;: &quot;Apple Pay&quot;,
                    &quot;icon&quot;: &quot;apple&quot;
                },
                {
                    &quot;id&quot;: &quot;stc_pay&quot;,
                    &quot;label&quot;: &quot;STC Pay&quot;,
                    &quot;icon&quot;: &quot;stc&quot;
                }
            ]
        },
        &quot;app_info&quot;: {
            &quot;version&quot;: &quot;2.0.0&quot;,
            &quot;contact_email&quot;: &quot;support@smartfarm.sa&quot;,
            &quot;terms_url&quot;: &quot;https://smartfarm.sa/terms&quot;,
            &quot;privacy_url&quot;: &quot;https://smartfarm.sa/privacy&quot;
        }
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-metadata" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-metadata"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-metadata"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-metadata" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-metadata">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-metadata" data-method="GET"
      data-path="api/metadata"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-metadata', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-metadata"
                    onclick="tryItOut('GETapi-metadata');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-metadata"
                    onclick="cancelTryOut('GETapi-metadata');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-metadata"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/metadata</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-metadata"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-metadata"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-auth-profile">GET api/auth/profile</h2>

<p>
</p>



<span id="example-requests-GETapi-auth-profile">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://192.168.8.32:8000/api/auth/profile" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/auth/profile"
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

<span id="example-responses-GETapi-auth-profile">
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
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Unauthenticated&quot;,
    &quot;data&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-auth-profile" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-auth-profile"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-auth-profile"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-auth-profile" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-auth-profile">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-auth-profile" data-method="GET"
      data-path="api/auth/profile"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-auth-profile', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-auth-profile"
                    onclick="tryItOut('GETapi-auth-profile');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-auth-profile"
                    onclick="cancelTryOut('GETapi-auth-profile');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-auth-profile"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/auth/profile</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-auth-profile"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-auth-profile"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-auth-profile-update">POST api/auth/profile/update</h2>

<p>
</p>



<span id="example-requests-POSTapi-auth-profile-update">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://192.168.8.32:8000/api/auth/profile/update" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "name=vmqeopfuudtdsufvyvddq"\
    --form "phone=consequatur"\
    --form "current_password=consequatur"\
    --form "new_password=mqeopfuudtdsufvyvddqamniihfqcoynlazghdtqtqxbajwbpilpmufinllwloauydlsmsjury"\
    --form "profile_image=@C:\Users\Eng-salah\AppData\Local\Temp\php931E.tmp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/auth/profile/update"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('name', 'vmqeopfuudtdsufvyvddq');
body.append('phone', 'consequatur');
body.append('current_password', 'consequatur');
body.append('new_password', 'mqeopfuudtdsufvyvddqamniihfqcoynlazghdtqtqxbajwbpilpmufinllwloauydlsmsjury');
body.append('profile_image', document.querySelector('input[name="profile_image"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-profile-update">
</span>
<span id="execution-results-POSTapi-auth-profile-update" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-profile-update"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-profile-update"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-profile-update" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-profile-update">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-auth-profile-update" data-method="POST"
      data-path="api/auth/profile/update"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-profile-update', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-profile-update"
                    onclick="tryItOut('POSTapi-auth-profile-update');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-profile-update"
                    onclick="cancelTryOut('POSTapi-auth-profile-update');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-profile-update"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/profile/update</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-auth-profile-update"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-auth-profile-update"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-auth-profile-update"
               value="vmqeopfuudtdsufvyvddq"
               data-component="body">
    <br>
<p>يجب أن لا يتجاوز طول نّص حقل value 255 حروفٍ/حرفًا. Example: <code>vmqeopfuudtdsufvyvddq</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="POSTapi-auth-profile-update"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>current_password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="current_password"                data-endpoint="POSTapi-auth-profile-update"
               value="consequatur"
               data-component="body">
    <br>
<p>This field is required when <code>new_password</code> is present. Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>new_password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="new_password"                data-endpoint="POSTapi-auth-profile-update"
               value="mqeopfuudtdsufvyvddqamniihfqcoynlazghdtqtqxbajwbpilpmufinllwloauydlsmsjury"
               data-component="body">
    <br>
<p>يجب أن يكون طول نص حقل value على الأقل 6 حروفٍ/حرفًا. Example: <code>mqeopfuudtdsufvyvddqamniihfqcoynlazghdtqtqxbajwbpilpmufinllwloauydlsmsjury</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>profile_image</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="profile_image"                data-endpoint="POSTapi-auth-profile-update"
               value=""
               data-component="body">
    <br>
<p>يجب أن يكون حقل value صورةً. يجب أن لا يتجاوز حجم ملف حقل value 5120 كيلوبايت. Example: <code>C:\Users\Eng-salah\AppData\Local\Temp\php931E.tmp</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-auth-logout">POST api/auth/logout</h2>

<p>
</p>



<span id="example-requests-POSTapi-auth-logout">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://192.168.8.32:8000/api/auth/logout" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/auth/logout"
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

<span id="example-responses-POSTapi-auth-logout">
</span>
<span id="execution-results-POSTapi-auth-logout" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-logout"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-logout"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-logout">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-auth-logout" data-method="POST"
      data-path="api/auth/logout"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-logout', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-logout"
                    onclick="tryItOut('POSTapi-auth-logout');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-logout"
                    onclick="cancelTryOut('POSTapi-auth-logout');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-logout"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/logout</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-auth-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-auth-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-reports-statistics">GET /reports/statistics
إحصائيات المستخدم للـ 7 أيام الأخيرة.</h2>

<p>
</p>

<p>✅ تم إصلاح N+1: بدلاً من 31 query، نستخدم aggregate queries مُجمَّعة</p>

<span id="example-requests-GETapi-reports-statistics">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://192.168.8.32:8000/api/reports/statistics" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/reports/statistics"
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

<span id="example-responses-GETapi-reports-statistics">
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
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Unauthenticated&quot;,
    &quot;data&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-reports-statistics" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-reports-statistics"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-reports-statistics"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-reports-statistics" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-reports-statistics">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-reports-statistics" data-method="GET"
      data-path="api/reports/statistics"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-reports-statistics', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-reports-statistics"
                    onclick="tryItOut('GETapi-reports-statistics');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-reports-statistics"
                    onclick="cancelTryOut('GETapi-reports-statistics');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-reports-statistics"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/reports/statistics</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-reports-statistics"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-reports-statistics"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-marketplace-products">GET /marketplace/products
جلب المنتجات مع الفلترة والترقيم</h2>

<p>
</p>



<span id="example-requests-GETapi-marketplace-products">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://192.168.8.32:8000/api/marketplace/products" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/marketplace/products"
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

<span id="example-responses-GETapi-marketplace-products">
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
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Unauthenticated&quot;,
    &quot;data&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-marketplace-products" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-marketplace-products"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-marketplace-products"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-marketplace-products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-marketplace-products">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-marketplace-products" data-method="GET"
      data-path="api/marketplace/products"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-marketplace-products', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-marketplace-products"
                    onclick="tryItOut('GETapi-marketplace-products');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-marketplace-products"
                    onclick="cancelTryOut('GETapi-marketplace-products');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-marketplace-products"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/marketplace/products</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-marketplace-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-marketplace-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-marketplace-stores">GET /marketplace/stores</h2>

<p>
</p>



<span id="example-requests-GETapi-marketplace-stores">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://192.168.8.32:8000/api/marketplace/stores" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/marketplace/stores"
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

<span id="example-responses-GETapi-marketplace-stores">
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
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Unauthenticated&quot;,
    &quot;data&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-marketplace-stores" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-marketplace-stores"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-marketplace-stores"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-marketplace-stores" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-marketplace-stores">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-marketplace-stores" data-method="GET"
      data-path="api/marketplace/stores"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-marketplace-stores', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-marketplace-stores"
                    onclick="tryItOut('GETapi-marketplace-stores');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-marketplace-stores"
                    onclick="cancelTryOut('GETapi-marketplace-stores');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-marketplace-stores"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/marketplace/stores</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-marketplace-stores"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-marketplace-stores"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-marketplace-stores--slug-">GET /marketplace/stores/{slug}</h2>

<p>
</p>



<span id="example-requests-GETapi-marketplace-stores--slug-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://192.168.8.32:8000/api/marketplace/stores/consequatur" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/marketplace/stores/consequatur"
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

<span id="example-responses-GETapi-marketplace-stores--slug-">
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
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Unauthenticated&quot;,
    &quot;data&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-marketplace-stores--slug-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-marketplace-stores--slug-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-marketplace-stores--slug-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-marketplace-stores--slug-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-marketplace-stores--slug-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-marketplace-stores--slug-" data-method="GET"
      data-path="api/marketplace/stores/{slug}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-marketplace-stores--slug-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-marketplace-stores--slug-"
                    onclick="tryItOut('GETapi-marketplace-stores--slug-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-marketplace-stores--slug-"
                    onclick="cancelTryOut('GETapi-marketplace-stores--slug-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-marketplace-stores--slug-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/marketplace/stores/{slug}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-marketplace-stores--slug-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-marketplace-stores--slug-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="slug"                data-endpoint="GETapi-marketplace-stores--slug-"
               value="consequatur"
               data-component="url">
    <br>
<p>The slug of the store. Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-marketplace-stores--store_slug--products">GET /marketplace/stores/{store}/products</h2>

<p>
</p>



<span id="example-requests-GETapi-marketplace-stores--store_slug--products">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://192.168.8.32:8000/api/marketplace/stores/slah-store/products" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/marketplace/stores/slah-store/products"
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

<span id="example-responses-GETapi-marketplace-stores--store_slug--products">
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
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Unauthenticated&quot;,
    &quot;data&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-marketplace-stores--store_slug--products" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-marketplace-stores--store_slug--products"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-marketplace-stores--store_slug--products"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-marketplace-stores--store_slug--products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-marketplace-stores--store_slug--products">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-marketplace-stores--store_slug--products" data-method="GET"
      data-path="api/marketplace/stores/{store_slug}/products"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-marketplace-stores--store_slug--products', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-marketplace-stores--store_slug--products"
                    onclick="tryItOut('GETapi-marketplace-stores--store_slug--products');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-marketplace-stores--store_slug--products"
                    onclick="cancelTryOut('GETapi-marketplace-stores--store_slug--products');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-marketplace-stores--store_slug--products"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/marketplace/stores/{store_slug}/products</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-marketplace-stores--store_slug--products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-marketplace-stores--store_slug--products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>store_slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="store_slug"                data-endpoint="GETapi-marketplace-stores--store_slug--products"
               value="slah-store"
               data-component="url">
    <br>
<p>The slug of the store. Example: <code>slah-store</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-marketplace-products--product_slug--reviews">GET /marketplace/products/{product}/reviews</h2>

<p>
</p>



<span id="example-requests-GETapi-marketplace-products--product_slug--reviews">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://192.168.8.32:8000/api/marketplace/products/tmatm/reviews" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/marketplace/products/tmatm/reviews"
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

<span id="example-responses-GETapi-marketplace-products--product_slug--reviews">
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
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Unauthenticated&quot;,
    &quot;data&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-marketplace-products--product_slug--reviews" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-marketplace-products--product_slug--reviews"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-marketplace-products--product_slug--reviews"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-marketplace-products--product_slug--reviews" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-marketplace-products--product_slug--reviews">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-marketplace-products--product_slug--reviews" data-method="GET"
      data-path="api/marketplace/products/{product_slug}/reviews"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-marketplace-products--product_slug--reviews', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-marketplace-products--product_slug--reviews"
                    onclick="tryItOut('GETapi-marketplace-products--product_slug--reviews');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-marketplace-products--product_slug--reviews"
                    onclick="cancelTryOut('GETapi-marketplace-products--product_slug--reviews');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-marketplace-products--product_slug--reviews"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/marketplace/products/{product_slug}/reviews</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-marketplace-products--product_slug--reviews"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-marketplace-products--product_slug--reviews"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>product_slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="product_slug"                data-endpoint="GETapi-marketplace-products--product_slug--reviews"
               value="tmatm"
               data-component="url">
    <br>
<p>The slug of the product. Example: <code>tmatm</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-marketplace-seller-products">POST /marketplace/seller/products</h2>

<p>
</p>



<span id="example-requests-POSTapi-marketplace-seller-products">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://192.168.8.32:8000/api/marketplace/seller/products" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "name=vmqeopfuudtdsufvyvddq"\
    --form "description=Dolores dolorum amet iste laborum eius est dolor."\
    --form "price=12"\
    --form "unit=consequatur"\
    --form "stock_quantity=45"\
    --form "category=consequatur"\
    --form "is_featured="\
    --form "image=@C:\Users\Eng-salah\AppData\Local\Temp\php939C.tmp" \
    --form "other_images[]=@C:\Users\Eng-salah\AppData\Local\Temp\php939D.tmp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/marketplace/seller/products"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('name', 'vmqeopfuudtdsufvyvddq');
body.append('description', 'Dolores dolorum amet iste laborum eius est dolor.');
body.append('price', '12');
body.append('unit', 'consequatur');
body.append('stock_quantity', '45');
body.append('category', 'consequatur');
body.append('is_featured', '');
body.append('image', document.querySelector('input[name="image"]').files[0]);
body.append('other_images[]', document.querySelector('input[name="other_images[]"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-marketplace-seller-products">
</span>
<span id="execution-results-POSTapi-marketplace-seller-products" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-marketplace-seller-products"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-marketplace-seller-products"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-marketplace-seller-products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-marketplace-seller-products">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-marketplace-seller-products" data-method="POST"
      data-path="api/marketplace/seller/products"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-marketplace-seller-products', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-marketplace-seller-products"
                    onclick="tryItOut('POSTapi-marketplace-seller-products');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-marketplace-seller-products"
                    onclick="cancelTryOut('POSTapi-marketplace-seller-products');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-marketplace-seller-products"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/marketplace/seller/products</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-marketplace-seller-products"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-marketplace-seller-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-marketplace-seller-products"
               value="vmqeopfuudtdsufvyvddq"
               data-component="body">
    <br>
<p>يجب أن لا يتجاوز طول نّص حقل value 255 حروفٍ/حرفًا. Example: <code>vmqeopfuudtdsufvyvddq</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTapi-marketplace-seller-products"
               value="Dolores dolorum amet iste laborum eius est dolor."
               data-component="body">
    <br>
<p>Example: <code>Dolores dolorum amet iste laborum eius est dolor.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>price</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="price"                data-endpoint="POSTapi-marketplace-seller-products"
               value="12"
               data-component="body">
    <br>
<p>يجب أن تكون قيمة حقل value مساوية أو أكبر من 0. Example: <code>12</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>unit</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="unit"                data-endpoint="POSTapi-marketplace-seller-products"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>stock_quantity</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="stock_quantity"                data-endpoint="POSTapi-marketplace-seller-products"
               value="45"
               data-component="body">
    <br>
<p>يجب أن تكون قيمة حقل value مساوية أو أكبر من 0. Example: <code>45</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>catalog_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="catalog_id"                data-endpoint="POSTapi-marketplace-seller-products"
               value=""
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the store_catalogs table.</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>category</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="category"                data-endpoint="POSTapi-marketplace-seller-products"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_featured</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="POSTapi-marketplace-seller-products" style="display: none">
            <input type="radio" name="is_featured"
                   value="true"
                   data-endpoint="POSTapi-marketplace-seller-products"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-marketplace-seller-products" style="display: none">
            <input type="radio" name="is_featured"
                   value="false"
                   data-endpoint="POSTapi-marketplace-seller-products"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>false</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="image"                data-endpoint="POSTapi-marketplace-seller-products"
               value=""
               data-component="body">
    <br>
<p>يجب أن يكون حقل value صورةً. يجب أن لا يتجاوز حجم ملف حقل value 2048 كيلوبايت. Example: <code>C:\Users\Eng-salah\AppData\Local\Temp\php939C.tmp</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>other_images</code></b>&nbsp;&nbsp;
<small>file[]</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="other_images[0]"                data-endpoint="POSTapi-marketplace-seller-products"
               data-component="body">
        <input type="file" style="display: none"
               name="other_images[1]"                data-endpoint="POSTapi-marketplace-seller-products"
               data-component="body">
    <br>
<p>يجب أن يكون حقل value صورةً. يجب أن لا يتجاوز حجم ملف حقل value 2048 كيلوبايت.</p>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-marketplace-seller-products--product_slug-">POST /marketplace/seller/products/{product} (مع _method=PUT)</h2>

<p>
</p>



<span id="example-requests-POSTapi-marketplace-seller-products--product_slug-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://192.168.8.32:8000/api/marketplace/seller/products/tmatm" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "name=vmqeopfuudtdsufvyvddq"\
    --form "description=Dolores dolorum amet iste laborum eius est dolor."\
    --form "price=12"\
    --form "unit=consequatur"\
    --form "stock_quantity=45"\
    --form "category=consequatur"\
    --form "is_featured=1"\
    --form "image=@C:\Users\Eng-salah\AppData\Local\Temp\php93AE.tmp" \
    --form "other_images[]=@C:\Users\Eng-salah\AppData\Local\Temp\php93AF.tmp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/marketplace/seller/products/tmatm"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('name', 'vmqeopfuudtdsufvyvddq');
body.append('description', 'Dolores dolorum amet iste laborum eius est dolor.');
body.append('price', '12');
body.append('unit', 'consequatur');
body.append('stock_quantity', '45');
body.append('category', 'consequatur');
body.append('is_featured', '1');
body.append('image', document.querySelector('input[name="image"]').files[0]);
body.append('other_images[]', document.querySelector('input[name="other_images[]"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-marketplace-seller-products--product_slug-">
</span>
<span id="execution-results-POSTapi-marketplace-seller-products--product_slug-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-marketplace-seller-products--product_slug-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-marketplace-seller-products--product_slug-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-marketplace-seller-products--product_slug-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-marketplace-seller-products--product_slug-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-marketplace-seller-products--product_slug-" data-method="POST"
      data-path="api/marketplace/seller/products/{product_slug}"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-marketplace-seller-products--product_slug-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-marketplace-seller-products--product_slug-"
                    onclick="tryItOut('POSTapi-marketplace-seller-products--product_slug-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-marketplace-seller-products--product_slug-"
                    onclick="cancelTryOut('POSTapi-marketplace-seller-products--product_slug-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-marketplace-seller-products--product_slug-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/marketplace/seller/products/{product_slug}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-marketplace-seller-products--product_slug-"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-marketplace-seller-products--product_slug-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>product_slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="product_slug"                data-endpoint="POSTapi-marketplace-seller-products--product_slug-"
               value="tmatm"
               data-component="url">
    <br>
<p>The slug of the product. Example: <code>tmatm</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-marketplace-seller-products--product_slug-"
               value="vmqeopfuudtdsufvyvddq"
               data-component="body">
    <br>
<p>يجب أن لا يتجاوز طول نّص حقل value 255 حروفٍ/حرفًا. Example: <code>vmqeopfuudtdsufvyvddq</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTapi-marketplace-seller-products--product_slug-"
               value="Dolores dolorum amet iste laborum eius est dolor."
               data-component="body">
    <br>
<p>Example: <code>Dolores dolorum amet iste laborum eius est dolor.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>price</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="price"                data-endpoint="POSTapi-marketplace-seller-products--product_slug-"
               value="12"
               data-component="body">
    <br>
<p>يجب أن تكون قيمة حقل value مساوية أو أكبر من 0. Example: <code>12</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>unit</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="unit"                data-endpoint="POSTapi-marketplace-seller-products--product_slug-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>stock_quantity</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="stock_quantity"                data-endpoint="POSTapi-marketplace-seller-products--product_slug-"
               value="45"
               data-component="body">
    <br>
<p>يجب أن تكون قيمة حقل value مساوية أو أكبر من 0. Example: <code>45</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>catalog_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="catalog_id"                data-endpoint="POSTapi-marketplace-seller-products--product_slug-"
               value=""
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the store_catalogs table.</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>category</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="category"                data-endpoint="POSTapi-marketplace-seller-products--product_slug-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_featured</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="POSTapi-marketplace-seller-products--product_slug-" style="display: none">
            <input type="radio" name="is_featured"
                   value="true"
                   data-endpoint="POSTapi-marketplace-seller-products--product_slug-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-marketplace-seller-products--product_slug-" style="display: none">
            <input type="radio" name="is_featured"
                   value="false"
                   data-endpoint="POSTapi-marketplace-seller-products--product_slug-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>true</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="image"                data-endpoint="POSTapi-marketplace-seller-products--product_slug-"
               value=""
               data-component="body">
    <br>
<p>يجب أن يكون حقل value صورةً. يجب أن لا يتجاوز حجم ملف حقل value 2048 كيلوبايت. Example: <code>C:\Users\Eng-salah\AppData\Local\Temp\php93AE.tmp</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>other_images</code></b>&nbsp;&nbsp;
<small>file[]</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="other_images[0]"                data-endpoint="POSTapi-marketplace-seller-products--product_slug-"
               data-component="body">
        <input type="file" style="display: none"
               name="other_images[1]"                data-endpoint="POSTapi-marketplace-seller-products--product_slug-"
               data-component="body">
    <br>
<p>يجب أن يكون حقل value صورةً. يجب أن لا يتجاوز حجم ملف حقل value 2048 كيلوبايت.</p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-marketplace-seller-products--product_slug-">DELETE /marketplace/seller/products/{product}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-marketplace-seller-products--product_slug-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://192.168.8.32:8000/api/marketplace/seller/products/tmatm" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/marketplace/seller/products/tmatm"
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

<span id="example-responses-DELETEapi-marketplace-seller-products--product_slug-">
</span>
<span id="execution-results-DELETEapi-marketplace-seller-products--product_slug-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-marketplace-seller-products--product_slug-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-marketplace-seller-products--product_slug-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-marketplace-seller-products--product_slug-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-marketplace-seller-products--product_slug-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-marketplace-seller-products--product_slug-" data-method="DELETE"
      data-path="api/marketplace/seller/products/{product_slug}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-marketplace-seller-products--product_slug-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-marketplace-seller-products--product_slug-"
                    onclick="tryItOut('DELETEapi-marketplace-seller-products--product_slug-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-marketplace-seller-products--product_slug-"
                    onclick="cancelTryOut('DELETEapi-marketplace-seller-products--product_slug-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-marketplace-seller-products--product_slug-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/marketplace/seller/products/{product_slug}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-marketplace-seller-products--product_slug-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-marketplace-seller-products--product_slug-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>product_slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="product_slug"                data-endpoint="DELETEapi-marketplace-seller-products--product_slug-"
               value="tmatm"
               data-component="url">
    <br>
<p>The slug of the product. Example: <code>tmatm</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-marketplace-seller-catalogs">GET /marketplace/seller/catalogs</h2>

<p>
</p>



<span id="example-requests-GETapi-marketplace-seller-catalogs">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://192.168.8.32:8000/api/marketplace/seller/catalogs" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/marketplace/seller/catalogs"
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

<span id="example-responses-GETapi-marketplace-seller-catalogs">
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
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Unauthenticated&quot;,
    &quot;data&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-marketplace-seller-catalogs" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-marketplace-seller-catalogs"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-marketplace-seller-catalogs"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-marketplace-seller-catalogs" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-marketplace-seller-catalogs">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-marketplace-seller-catalogs" data-method="GET"
      data-path="api/marketplace/seller/catalogs"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-marketplace-seller-catalogs', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-marketplace-seller-catalogs"
                    onclick="tryItOut('GETapi-marketplace-seller-catalogs');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-marketplace-seller-catalogs"
                    onclick="cancelTryOut('GETapi-marketplace-seller-catalogs');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-marketplace-seller-catalogs"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/marketplace/seller/catalogs</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-marketplace-seller-catalogs"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-marketplace-seller-catalogs"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-marketplace-seller-catalogs">POST /marketplace/seller/catalogs</h2>

<p>
</p>



<span id="example-requests-POSTapi-marketplace-seller-catalogs">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://192.168.8.32:8000/api/marketplace/seller/catalogs" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "name=vmqeopfuudtdsufvyvddq"\
    --form "description=Dolores molestias ipsam sit."\
    --form "sort_order=25"\
    --form "image=@C:\Users\Eng-salah\AppData\Local\Temp\php93CF.tmp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/marketplace/seller/catalogs"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('name', 'vmqeopfuudtdsufvyvddq');
body.append('description', 'Dolores molestias ipsam sit.');
body.append('sort_order', '25');
body.append('image', document.querySelector('input[name="image"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-marketplace-seller-catalogs">
</span>
<span id="execution-results-POSTapi-marketplace-seller-catalogs" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-marketplace-seller-catalogs"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-marketplace-seller-catalogs"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-marketplace-seller-catalogs" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-marketplace-seller-catalogs">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-marketplace-seller-catalogs" data-method="POST"
      data-path="api/marketplace/seller/catalogs"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-marketplace-seller-catalogs', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-marketplace-seller-catalogs"
                    onclick="tryItOut('POSTapi-marketplace-seller-catalogs');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-marketplace-seller-catalogs"
                    onclick="cancelTryOut('POSTapi-marketplace-seller-catalogs');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-marketplace-seller-catalogs"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/marketplace/seller/catalogs</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-marketplace-seller-catalogs"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-marketplace-seller-catalogs"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-marketplace-seller-catalogs"
               value="vmqeopfuudtdsufvyvddq"
               data-component="body">
    <br>
<p>يجب أن لا يتجاوز طول نّص حقل value 100 حروفٍ/حرفًا. Example: <code>vmqeopfuudtdsufvyvddq</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTapi-marketplace-seller-catalogs"
               value="Dolores molestias ipsam sit."
               data-component="body">
    <br>
<p>يجب أن لا يتجاوز طول نّص حقل value 500 حروفٍ/حرفًا. Example: <code>Dolores molestias ipsam sit.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="image"                data-endpoint="POSTapi-marketplace-seller-catalogs"
               value=""
               data-component="body">
    <br>
<p>يجب أن يكون حقل value صورةً. يجب أن لا يتجاوز حجم ملف حقل value 2048 كيلوبايت. Example: <code>C:\Users\Eng-salah\AppData\Local\Temp\php93CF.tmp</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>sort_order</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="sort_order"                data-endpoint="POSTapi-marketplace-seller-catalogs"
               value="25"
               data-component="body">
    <br>
<p>يجب أن تكون قيمة حقل value مساوية أو أكبر من 0. Example: <code>25</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-marketplace-seller-catalogs--catalog_slug-">POST /marketplace/seller/catalogs/{catalog} (مع _method=PUT)</h2>

<p>
</p>



<span id="example-requests-POSTapi-marketplace-seller-catalogs--catalog_slug-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://192.168.8.32:8000/api/marketplace/seller/catalogs/anbat-alshaar" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "name=vmqeopfuudtdsufvyvddq"\
    --form "description=Dolores molestias ipsam sit."\
    --form "sort_order=25"\
    --form "image=@C:\Users\Eng-salah\AppData\Local\Temp\php93E0.tmp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/marketplace/seller/catalogs/anbat-alshaar"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('name', 'vmqeopfuudtdsufvyvddq');
body.append('description', 'Dolores molestias ipsam sit.');
body.append('sort_order', '25');
body.append('image', document.querySelector('input[name="image"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-marketplace-seller-catalogs--catalog_slug-">
</span>
<span id="execution-results-POSTapi-marketplace-seller-catalogs--catalog_slug-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-marketplace-seller-catalogs--catalog_slug-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-marketplace-seller-catalogs--catalog_slug-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-marketplace-seller-catalogs--catalog_slug-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-marketplace-seller-catalogs--catalog_slug-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-marketplace-seller-catalogs--catalog_slug-" data-method="POST"
      data-path="api/marketplace/seller/catalogs/{catalog_slug}"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-marketplace-seller-catalogs--catalog_slug-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-marketplace-seller-catalogs--catalog_slug-"
                    onclick="tryItOut('POSTapi-marketplace-seller-catalogs--catalog_slug-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-marketplace-seller-catalogs--catalog_slug-"
                    onclick="cancelTryOut('POSTapi-marketplace-seller-catalogs--catalog_slug-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-marketplace-seller-catalogs--catalog_slug-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/marketplace/seller/catalogs/{catalog_slug}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-marketplace-seller-catalogs--catalog_slug-"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-marketplace-seller-catalogs--catalog_slug-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>catalog_slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="catalog_slug"                data-endpoint="POSTapi-marketplace-seller-catalogs--catalog_slug-"
               value="anbat-alshaar"
               data-component="url">
    <br>
<p>The slug of the catalog. Example: <code>anbat-alshaar</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-marketplace-seller-catalogs--catalog_slug-"
               value="vmqeopfuudtdsufvyvddq"
               data-component="body">
    <br>
<p>يجب أن لا يتجاوز طول نّص حقل value 100 حروفٍ/حرفًا. Example: <code>vmqeopfuudtdsufvyvddq</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTapi-marketplace-seller-catalogs--catalog_slug-"
               value="Dolores molestias ipsam sit."
               data-component="body">
    <br>
<p>يجب أن لا يتجاوز طول نّص حقل value 500 حروفٍ/حرفًا. Example: <code>Dolores molestias ipsam sit.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="image"                data-endpoint="POSTapi-marketplace-seller-catalogs--catalog_slug-"
               value=""
               data-component="body">
    <br>
<p>يجب أن يكون حقل value صورةً. يجب أن لا يتجاوز حجم ملف حقل value 2048 كيلوبايت. Example: <code>C:\Users\Eng-salah\AppData\Local\Temp\php93E0.tmp</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>sort_order</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="sort_order"                data-endpoint="POSTapi-marketplace-seller-catalogs--catalog_slug-"
               value="25"
               data-component="body">
    <br>
<p>يجب أن تكون قيمة حقل value مساوية أو أكبر من 0. Example: <code>25</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-marketplace-seller-catalogs--catalog_slug-">DELETE /marketplace/seller/catalogs/{catalog}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-marketplace-seller-catalogs--catalog_slug-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://192.168.8.32:8000/api/marketplace/seller/catalogs/anbat-alshaar" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/marketplace/seller/catalogs/anbat-alshaar"
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

<span id="example-responses-DELETEapi-marketplace-seller-catalogs--catalog_slug-">
</span>
<span id="execution-results-DELETEapi-marketplace-seller-catalogs--catalog_slug-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-marketplace-seller-catalogs--catalog_slug-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-marketplace-seller-catalogs--catalog_slug-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-marketplace-seller-catalogs--catalog_slug-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-marketplace-seller-catalogs--catalog_slug-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-marketplace-seller-catalogs--catalog_slug-" data-method="DELETE"
      data-path="api/marketplace/seller/catalogs/{catalog_slug}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-marketplace-seller-catalogs--catalog_slug-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-marketplace-seller-catalogs--catalog_slug-"
                    onclick="tryItOut('DELETEapi-marketplace-seller-catalogs--catalog_slug-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-marketplace-seller-catalogs--catalog_slug-"
                    onclick="cancelTryOut('DELETEapi-marketplace-seller-catalogs--catalog_slug-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-marketplace-seller-catalogs--catalog_slug-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/marketplace/seller/catalogs/{catalog_slug}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-marketplace-seller-catalogs--catalog_slug-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-marketplace-seller-catalogs--catalog_slug-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>catalog_slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="catalog_slug"                data-endpoint="DELETEapi-marketplace-seller-catalogs--catalog_slug-"
               value="anbat-alshaar"
               data-component="url">
    <br>
<p>The slug of the catalog. Example: <code>anbat-alshaar</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-marketplace-seller-catalogs--catalog_slug--assign-products">POST /marketplace/seller/catalogs/{catalog}/assign-products</h2>

<p>
</p>



<span id="example-requests-POSTapi-marketplace-seller-catalogs--catalog_slug--assign-products">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://192.168.8.32:8000/api/marketplace/seller/catalogs/anbat-alshaar/assign-products" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/marketplace/seller/catalogs/anbat-alshaar/assign-products"
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

<span id="example-responses-POSTapi-marketplace-seller-catalogs--catalog_slug--assign-products">
</span>
<span id="execution-results-POSTapi-marketplace-seller-catalogs--catalog_slug--assign-products" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-marketplace-seller-catalogs--catalog_slug--assign-products"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-marketplace-seller-catalogs--catalog_slug--assign-products"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-marketplace-seller-catalogs--catalog_slug--assign-products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-marketplace-seller-catalogs--catalog_slug--assign-products">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-marketplace-seller-catalogs--catalog_slug--assign-products" data-method="POST"
      data-path="api/marketplace/seller/catalogs/{catalog_slug}/assign-products"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-marketplace-seller-catalogs--catalog_slug--assign-products', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-marketplace-seller-catalogs--catalog_slug--assign-products"
                    onclick="tryItOut('POSTapi-marketplace-seller-catalogs--catalog_slug--assign-products');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-marketplace-seller-catalogs--catalog_slug--assign-products"
                    onclick="cancelTryOut('POSTapi-marketplace-seller-catalogs--catalog_slug--assign-products');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-marketplace-seller-catalogs--catalog_slug--assign-products"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/marketplace/seller/catalogs/{catalog_slug}/assign-products</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-marketplace-seller-catalogs--catalog_slug--assign-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-marketplace-seller-catalogs--catalog_slug--assign-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>catalog_slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="catalog_slug"                data-endpoint="POSTapi-marketplace-seller-catalogs--catalog_slug--assign-products"
               value="anbat-alshaar"
               data-component="url">
    <br>
<p>The slug of the catalog. Example: <code>anbat-alshaar</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>product_ids</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="product_ids[0]"                data-endpoint="POSTapi-marketplace-seller-catalogs--catalog_slug--assign-products"
               data-component="body">
        <input type="text" style="display: none"
               name="product_ids[1]"                data-endpoint="POSTapi-marketplace-seller-catalogs--catalog_slug--assign-products"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the products table.</p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-marketplace-seller-my-store">GET /marketplace/seller/my-store</h2>

<p>
</p>



<span id="example-requests-GETapi-marketplace-seller-my-store">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://192.168.8.32:8000/api/marketplace/seller/my-store" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/marketplace/seller/my-store"
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

<span id="example-responses-GETapi-marketplace-seller-my-store">
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
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Unauthenticated&quot;,
    &quot;data&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-marketplace-seller-my-store" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-marketplace-seller-my-store"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-marketplace-seller-my-store"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-marketplace-seller-my-store" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-marketplace-seller-my-store">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-marketplace-seller-my-store" data-method="GET"
      data-path="api/marketplace/seller/my-store"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-marketplace-seller-my-store', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-marketplace-seller-my-store"
                    onclick="tryItOut('GETapi-marketplace-seller-my-store');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-marketplace-seller-my-store"
                    onclick="cancelTryOut('GETapi-marketplace-seller-my-store');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-marketplace-seller-my-store"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/marketplace/seller/my-store</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-marketplace-seller-my-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-marketplace-seller-my-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-marketplace-seller-my-store-update">POST /marketplace/seller/my-store/update</h2>

<p>
</p>



<span id="example-requests-POSTapi-marketplace-seller-my-store-update">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://192.168.8.32:8000/api/marketplace/seller/my-store/update" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "store_name=vmqeopfuudtdsufvyvddq"\
    --form "description=Dolores dolorum amet iste laborum eius est dolor."\
    --form "address=consequatur"\
    --form "logo=@C:\Users\Eng-salah\AppData\Local\Temp\php9400.tmp" \
    --form "cover_image=@C:\Users\Eng-salah\AppData\Local\Temp\php9401.tmp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/marketplace/seller/my-store/update"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('store_name', 'vmqeopfuudtdsufvyvddq');
body.append('description', 'Dolores dolorum amet iste laborum eius est dolor.');
body.append('address', 'consequatur');
body.append('logo', document.querySelector('input[name="logo"]').files[0]);
body.append('cover_image', document.querySelector('input[name="cover_image"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-marketplace-seller-my-store-update">
</span>
<span id="execution-results-POSTapi-marketplace-seller-my-store-update" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-marketplace-seller-my-store-update"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-marketplace-seller-my-store-update"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-marketplace-seller-my-store-update" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-marketplace-seller-my-store-update">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-marketplace-seller-my-store-update" data-method="POST"
      data-path="api/marketplace/seller/my-store/update"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-marketplace-seller-my-store-update', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-marketplace-seller-my-store-update"
                    onclick="tryItOut('POSTapi-marketplace-seller-my-store-update');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-marketplace-seller-my-store-update"
                    onclick="cancelTryOut('POSTapi-marketplace-seller-my-store-update');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-marketplace-seller-my-store-update"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/marketplace/seller/my-store/update</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-marketplace-seller-my-store-update"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-marketplace-seller-my-store-update"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>store_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="store_name"                data-endpoint="POSTapi-marketplace-seller-my-store-update"
               value="vmqeopfuudtdsufvyvddq"
               data-component="body">
    <br>
<p>يجب أن لا يتجاوز طول نّص حقل value 255 حروفٍ/حرفًا. Example: <code>vmqeopfuudtdsufvyvddq</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTapi-marketplace-seller-my-store-update"
               value="Dolores dolorum amet iste laborum eius est dolor."
               data-component="body">
    <br>
<p>Example: <code>Dolores dolorum amet iste laborum eius est dolor.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="address"                data-endpoint="POSTapi-marketplace-seller-my-store-update"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>logo</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="logo"                data-endpoint="POSTapi-marketplace-seller-my-store-update"
               value=""
               data-component="body">
    <br>
<p>يجب أن يكون حقل value صورةً. يجب أن لا يتجاوز حجم ملف حقل value 2048 كيلوبايت. Example: <code>C:\Users\Eng-salah\AppData\Local\Temp\php9400.tmp</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>cover_image</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="cover_image"                data-endpoint="POSTapi-marketplace-seller-my-store-update"
               value=""
               data-component="body">
    <br>
<p>يجب أن يكون حقل value صورةً. يجب أن لا يتجاوز حجم ملف حقل value 4096 كيلوبايت. Example: <code>C:\Users\Eng-salah\AppData\Local\Temp\php9401.tmp</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-marketplace-seller-orders">GET /marketplace/seller/orders</h2>

<p>
</p>



<span id="example-requests-GETapi-marketplace-seller-orders">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://192.168.8.32:8000/api/marketplace/seller/orders" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/marketplace/seller/orders"
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

<span id="example-responses-GETapi-marketplace-seller-orders">
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
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Unauthenticated&quot;,
    &quot;data&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-marketplace-seller-orders" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-marketplace-seller-orders"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-marketplace-seller-orders"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-marketplace-seller-orders" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-marketplace-seller-orders">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-marketplace-seller-orders" data-method="GET"
      data-path="api/marketplace/seller/orders"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-marketplace-seller-orders', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-marketplace-seller-orders"
                    onclick="tryItOut('GETapi-marketplace-seller-orders');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-marketplace-seller-orders"
                    onclick="cancelTryOut('GETapi-marketplace-seller-orders');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-marketplace-seller-orders"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/marketplace/seller/orders</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-marketplace-seller-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-marketplace-seller-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-marketplace-seller-orders--order_id--status">POST /marketplace/seller/orders/{order}/status</h2>

<p>
</p>



<span id="example-requests-POSTapi-marketplace-seller-orders--order_id--status">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://192.168.8.32:8000/api/marketplace/seller/orders/1/status" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"status\": \"shipped\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/marketplace/seller/orders/1/status"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "status": "shipped"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-marketplace-seller-orders--order_id--status">
</span>
<span id="execution-results-POSTapi-marketplace-seller-orders--order_id--status" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-marketplace-seller-orders--order_id--status"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-marketplace-seller-orders--order_id--status"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-marketplace-seller-orders--order_id--status" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-marketplace-seller-orders--order_id--status">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-marketplace-seller-orders--order_id--status" data-method="POST"
      data-path="api/marketplace/seller/orders/{order_id}/status"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-marketplace-seller-orders--order_id--status', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-marketplace-seller-orders--order_id--status"
                    onclick="tryItOut('POSTapi-marketplace-seller-orders--order_id--status');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-marketplace-seller-orders--order_id--status"
                    onclick="cancelTryOut('POSTapi-marketplace-seller-orders--order_id--status');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-marketplace-seller-orders--order_id--status"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/marketplace/seller/orders/{order_id}/status</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-marketplace-seller-orders--order_id--status"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-marketplace-seller-orders--order_id--status"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>order_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="order_id"                data-endpoint="POSTapi-marketplace-seller-orders--order_id--status"
               value="1"
               data-component="url">
    <br>
<p>The ID of the order. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="POSTapi-marketplace-seller-orders--order_id--status"
               value="shipped"
               data-component="body">
    <br>
<p>Example: <code>shipped</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>pending</code></li> <li><code>processing</code></li> <li><code>shipped</code></li> <li><code>delivered</code></li> <li><code>cancelled</code></li></ul>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-marketplace-checkout">POST /marketplace/checkout</h2>

<p>
</p>



<span id="example-requests-POSTapi-marketplace-checkout">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://192.168.8.32:8000/api/marketplace/checkout" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "items[][product_id]=consequatur"\
    --form "items[][quantity]=45"\
    --form "total_amount=11613.31890586"\
    --form "shipping_address=consequatur"\
    --form "payment_method=cash"\
    --form "notes=consequatur"\
    --form "receipt_image=@C:\Users\Eng-salah\AppData\Local\Temp\php948F.tmp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/marketplace/checkout"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('items[][product_id]', 'consequatur');
body.append('items[][quantity]', '45');
body.append('total_amount', '11613.31890586');
body.append('shipping_address', 'consequatur');
body.append('payment_method', 'cash');
body.append('notes', 'consequatur');
body.append('receipt_image', document.querySelector('input[name="receipt_image"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-marketplace-checkout">
</span>
<span id="execution-results-POSTapi-marketplace-checkout" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-marketplace-checkout"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-marketplace-checkout"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-marketplace-checkout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-marketplace-checkout">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-marketplace-checkout" data-method="POST"
      data-path="api/marketplace/checkout"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-marketplace-checkout', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-marketplace-checkout"
                    onclick="tryItOut('POSTapi-marketplace-checkout');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-marketplace-checkout"
                    onclick="cancelTryOut('POSTapi-marketplace-checkout');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-marketplace-checkout"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/marketplace/checkout</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-marketplace-checkout"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-marketplace-checkout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>items</code></b>&nbsp;&nbsp;
<small>object[]</small>&nbsp;
 &nbsp;
 &nbsp;
<br>

            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>product_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="items.0.product_id"                data-endpoint="POSTapi-marketplace-checkout"
               value="consequatur"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the products table. Example: <code>consequatur</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>quantity</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="items.0.quantity"                data-endpoint="POSTapi-marketplace-checkout"
               value="45"
               data-component="body">
    <br>
<p>يجب أن تكون قيمة حقل value مساوية أو أكبر من 1. Example: <code>45</code></p>
                    </div>
                                    </details>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>total_amount</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="total_amount"                data-endpoint="POSTapi-marketplace-checkout"
               value="11613.31890586"
               data-component="body">
    <br>
<p>Example: <code>11613.31890586</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>shipping_address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="shipping_address"                data-endpoint="POSTapi-marketplace-checkout"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>payment_method</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="payment_method"                data-endpoint="POSTapi-marketplace-checkout"
               value="cash"
               data-component="body">
    <br>
<p>Example: <code>cash</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>cash</code></li> <li><code>bank_transfer</code></li> <li><code>credit_card</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>receipt_image</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="receipt_image"                data-endpoint="POSTapi-marketplace-checkout"
               value=""
               data-component="body">
    <br>
<p>This field is required when <code>payment_method</code> is <code>bank_transfer</code>. يجب أن يكون حقل value صورةً. يجب أن لا يتجاوز حجم ملف حقل value 4096 كيلوبايت. Example: <code>C:\Users\Eng-salah\AppData\Local\Temp\php948F.tmp</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>notes</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="notes"                data-endpoint="POSTapi-marketplace-checkout"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-marketplace-orders">GET /marketplace/orders</h2>

<p>
</p>



<span id="example-requests-GETapi-marketplace-orders">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://192.168.8.32:8000/api/marketplace/orders" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/marketplace/orders"
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

<span id="example-responses-GETapi-marketplace-orders">
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
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Unauthenticated&quot;,
    &quot;data&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-marketplace-orders" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-marketplace-orders"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-marketplace-orders"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-marketplace-orders" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-marketplace-orders">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-marketplace-orders" data-method="GET"
      data-path="api/marketplace/orders"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-marketplace-orders', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-marketplace-orders"
                    onclick="tryItOut('GETapi-marketplace-orders');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-marketplace-orders"
                    onclick="cancelTryOut('GETapi-marketplace-orders');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-marketplace-orders"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/marketplace/orders</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-marketplace-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-marketplace-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-marketplace-products--product_slug--reviews">POST /marketplace/products/{product}/reviews</h2>

<p>
</p>



<span id="example-requests-POSTapi-marketplace-products--product_slug--reviews">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://192.168.8.32:8000/api/marketplace/products/tmatm/reviews" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"rating\": 5,
    \"comment\": \"mqeopfuudtdsufvyvddqa\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/marketplace/products/tmatm/reviews"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "rating": 5,
    "comment": "mqeopfuudtdsufvyvddqa"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-marketplace-products--product_slug--reviews">
</span>
<span id="execution-results-POSTapi-marketplace-products--product_slug--reviews" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-marketplace-products--product_slug--reviews"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-marketplace-products--product_slug--reviews"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-marketplace-products--product_slug--reviews" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-marketplace-products--product_slug--reviews">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-marketplace-products--product_slug--reviews" data-method="POST"
      data-path="api/marketplace/products/{product_slug}/reviews"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-marketplace-products--product_slug--reviews', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-marketplace-products--product_slug--reviews"
                    onclick="tryItOut('POSTapi-marketplace-products--product_slug--reviews');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-marketplace-products--product_slug--reviews"
                    onclick="cancelTryOut('POSTapi-marketplace-products--product_slug--reviews');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-marketplace-products--product_slug--reviews"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/marketplace/products/{product_slug}/reviews</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-marketplace-products--product_slug--reviews"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-marketplace-products--product_slug--reviews"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>product_slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="product_slug"                data-endpoint="POSTapi-marketplace-products--product_slug--reviews"
               value="tmatm"
               data-component="url">
    <br>
<p>The slug of the product. Example: <code>tmatm</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>rating</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="rating"                data-endpoint="POSTapi-marketplace-products--product_slug--reviews"
               value="5"
               data-component="body">
    <br>
<p>يجب أن تكون قيمة حقل value مساوية أو أكبر من 1. يجب أن تكون قيمة حقل value مساوية أو أصغر من 5. Example: <code>5</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>comment</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="comment"                data-endpoint="POSTapi-marketplace-products--product_slug--reviews"
               value="mqeopfuudtdsufvyvddqa"
               data-component="body">
    <br>
<p>يجب أن لا يتجاوز طول نّص حقل value 500 حروفٍ/حرفًا. Example: <code>mqeopfuudtdsufvyvddqa</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-farm-my-crops">GET api/farm/my-crops</h2>

<p>
</p>



<span id="example-requests-GETapi-farm-my-crops">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://192.168.8.32:8000/api/farm/my-crops" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/farm/my-crops"
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

<span id="example-responses-GETapi-farm-my-crops">
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
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Unauthenticated&quot;,
    &quot;data&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-farm-my-crops" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-farm-my-crops"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-farm-my-crops"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-farm-my-crops" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-farm-my-crops">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-farm-my-crops" data-method="GET"
      data-path="api/farm/my-crops"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-farm-my-crops', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-farm-my-crops"
                    onclick="tryItOut('GETapi-farm-my-crops');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-farm-my-crops"
                    onclick="cancelTryOut('GETapi-farm-my-crops');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-farm-my-crops"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/farm/my-crops</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-farm-my-crops"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-farm-my-crops"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-farm-crops">POST api/farm/crops</h2>

<p>
</p>



<span id="example-requests-POSTapi-farm-crops">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://192.168.8.32:8000/api/farm/crops" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"vmqeopfuudtdsufvyvddq\",
    \"crop_type\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/farm/crops"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "vmqeopfuudtdsufvyvddq",
    "crop_type": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-farm-crops">
</span>
<span id="execution-results-POSTapi-farm-crops" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-farm-crops"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-farm-crops"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-farm-crops" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-farm-crops">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-farm-crops" data-method="POST"
      data-path="api/farm/crops"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-farm-crops', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-farm-crops"
                    onclick="tryItOut('POSTapi-farm-crops');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-farm-crops"
                    onclick="cancelTryOut('POSTapi-farm-crops');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-farm-crops"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/farm/crops</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-farm-crops"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-farm-crops"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-farm-crops"
               value="vmqeopfuudtdsufvyvddq"
               data-component="body">
    <br>
<p>يجب أن لا يتجاوز طول نّص حقل value 255 حروفٍ/حرفًا. Example: <code>vmqeopfuudtdsufvyvddq</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>crop_type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="crop_type"                data-endpoint="POSTapi-farm-crops"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-farm-crops--id-">DELETE api/farm/crops/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-farm-crops--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://192.168.8.32:8000/api/farm/crops/consequatur" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/farm/crops/consequatur"
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

<span id="example-responses-DELETEapi-farm-crops--id-">
</span>
<span id="execution-results-DELETEapi-farm-crops--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-farm-crops--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-farm-crops--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-farm-crops--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-farm-crops--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-farm-crops--id-" data-method="DELETE"
      data-path="api/farm/crops/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-farm-crops--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-farm-crops--id-"
                    onclick="tryItOut('DELETEapi-farm-crops--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-farm-crops--id-"
                    onclick="cancelTryOut('DELETEapi-farm-crops--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-farm-crops--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/farm/crops/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-farm-crops--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-farm-crops--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-farm-crops--id-"
               value="consequatur"
               data-component="url">
    <br>
<p>The ID of the crop. Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-community-posts">GET api/community/posts</h2>

<p>
</p>



<span id="example-requests-GETapi-community-posts">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://192.168.8.32:8000/api/community/posts" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/community/posts"
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

<span id="example-responses-GETapi-community-posts">
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
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Unauthenticated&quot;,
    &quot;data&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-community-posts" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-community-posts"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-community-posts"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-community-posts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-community-posts">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-community-posts" data-method="GET"
      data-path="api/community/posts"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-community-posts', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-community-posts"
                    onclick="tryItOut('GETapi-community-posts');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-community-posts"
                    onclick="cancelTryOut('GETapi-community-posts');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-community-posts"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/community/posts</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-community-posts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-community-posts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-community-posts">POST api/community/posts</h2>

<p>
</p>



<span id="example-requests-POSTapi-community-posts">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://192.168.8.32:8000/api/community/posts" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "content=consequatur"\
    --form "image=@C:\Users\Eng-salah\AppData\Local\Temp\php956A.tmp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/community/posts"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('content', 'consequatur');
body.append('image', document.querySelector('input[name="image"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-community-posts">
</span>
<span id="execution-results-POSTapi-community-posts" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-community-posts"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-community-posts"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-community-posts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-community-posts">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-community-posts" data-method="POST"
      data-path="api/community/posts"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-community-posts', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-community-posts"
                    onclick="tryItOut('POSTapi-community-posts');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-community-posts"
                    onclick="cancelTryOut('POSTapi-community-posts');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-community-posts"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/community/posts</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-community-posts"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-community-posts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>content</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="content"                data-endpoint="POSTapi-community-posts"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="image"                data-endpoint="POSTapi-community-posts"
               value=""
               data-component="body">
    <br>
<p>يجب أن يكون حقل value صورةً. يجب أن لا يتجاوز حجم ملف حقل value 10240 كيلوبايت. Example: <code>C:\Users\Eng-salah\AppData\Local\Temp\php956A.tmp</code></p>
        </div>
        </form>

                    <h2 id="endpoints-PUTapi-community-posts--id-">PUT api/community/posts/{id}</h2>

<p>
</p>



<span id="example-requests-PUTapi-community-posts--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://192.168.8.32:8000/api/community/posts/consequatur" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "content=consequatur"\
    --form "image=@C:\Users\Eng-salah\AppData\Local\Temp\php957B.tmp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/community/posts/consequatur"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('content', 'consequatur');
body.append('image', document.querySelector('input[name="image"]').files[0]);

fetch(url, {
    method: "PUT",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-community-posts--id-">
</span>
<span id="execution-results-PUTapi-community-posts--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-community-posts--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-community-posts--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-community-posts--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-community-posts--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-community-posts--id-" data-method="PUT"
      data-path="api/community/posts/{id}"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-community-posts--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-community-posts--id-"
                    onclick="tryItOut('PUTapi-community-posts--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-community-posts--id-"
                    onclick="cancelTryOut('PUTapi-community-posts--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-community-posts--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/community/posts/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-community-posts--id-"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-community-posts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-community-posts--id-"
               value="consequatur"
               data-component="url">
    <br>
<p>The ID of the post. Example: <code>consequatur</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>content</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="content"                data-endpoint="PUTapi-community-posts--id-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="image"                data-endpoint="PUTapi-community-posts--id-"
               value=""
               data-component="body">
    <br>
<p>يجب أن يكون حقل value صورةً. يجب أن لا يتجاوز حجم ملف حقل value 10240 كيلوبايت. Example: <code>C:\Users\Eng-salah\AppData\Local\Temp\php957B.tmp</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-community-posts--id-">DELETE api/community/posts/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-community-posts--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://192.168.8.32:8000/api/community/posts/consequatur" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/community/posts/consequatur"
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

<span id="example-responses-DELETEapi-community-posts--id-">
</span>
<span id="execution-results-DELETEapi-community-posts--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-community-posts--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-community-posts--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-community-posts--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-community-posts--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-community-posts--id-" data-method="DELETE"
      data-path="api/community/posts/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-community-posts--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-community-posts--id-"
                    onclick="tryItOut('DELETEapi-community-posts--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-community-posts--id-"
                    onclick="cancelTryOut('DELETEapi-community-posts--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-community-posts--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/community/posts/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-community-posts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-community-posts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-community-posts--id-"
               value="consequatur"
               data-component="url">
    <br>
<p>The ID of the post. Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-community-my-posts">GET api/community/my-posts</h2>

<p>
</p>



<span id="example-requests-GETapi-community-my-posts">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://192.168.8.32:8000/api/community/my-posts" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/community/my-posts"
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

<span id="example-responses-GETapi-community-my-posts">
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
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Unauthenticated&quot;,
    &quot;data&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-community-my-posts" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-community-my-posts"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-community-my-posts"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-community-my-posts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-community-my-posts">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-community-my-posts" data-method="GET"
      data-path="api/community/my-posts"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-community-my-posts', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-community-my-posts"
                    onclick="tryItOut('GETapi-community-my-posts');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-community-my-posts"
                    onclick="cancelTryOut('GETapi-community-my-posts');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-community-my-posts"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/community/my-posts</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-community-my-posts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-community-my-posts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-community-posts--id--like">POST api/community/posts/{id}/like</h2>

<p>
</p>



<span id="example-requests-POSTapi-community-posts--id--like">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://192.168.8.32:8000/api/community/posts/consequatur/like" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/community/posts/consequatur/like"
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

<span id="example-responses-POSTapi-community-posts--id--like">
</span>
<span id="execution-results-POSTapi-community-posts--id--like" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-community-posts--id--like"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-community-posts--id--like"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-community-posts--id--like" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-community-posts--id--like">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-community-posts--id--like" data-method="POST"
      data-path="api/community/posts/{id}/like"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-community-posts--id--like', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-community-posts--id--like"
                    onclick="tryItOut('POSTapi-community-posts--id--like');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-community-posts--id--like"
                    onclick="cancelTryOut('POSTapi-community-posts--id--like');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-community-posts--id--like"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/community/posts/{id}/like</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-community-posts--id--like"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-community-posts--id--like"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="POSTapi-community-posts--id--like"
               value="consequatur"
               data-component="url">
    <br>
<p>The ID of the post. Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-community-posts--id--save">POST api/community/posts/{id}/save</h2>

<p>
</p>



<span id="example-requests-POSTapi-community-posts--id--save">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://192.168.8.32:8000/api/community/posts/consequatur/save" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/community/posts/consequatur/save"
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

<span id="example-responses-POSTapi-community-posts--id--save">
</span>
<span id="execution-results-POSTapi-community-posts--id--save" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-community-posts--id--save"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-community-posts--id--save"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-community-posts--id--save" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-community-posts--id--save">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-community-posts--id--save" data-method="POST"
      data-path="api/community/posts/{id}/save"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-community-posts--id--save', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-community-posts--id--save"
                    onclick="tryItOut('POSTapi-community-posts--id--save');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-community-posts--id--save"
                    onclick="cancelTryOut('POSTapi-community-posts--id--save');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-community-posts--id--save"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/community/posts/{id}/save</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-community-posts--id--save"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-community-posts--id--save"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="POSTapi-community-posts--id--save"
               value="consequatur"
               data-component="url">
    <br>
<p>The ID of the post. Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-community-posts--id--comments">POST api/community/posts/{id}/comments</h2>

<p>
</p>



<span id="example-requests-POSTapi-community-posts--id--comments">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://192.168.8.32:8000/api/community/posts/consequatur/comments" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"content\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/community/posts/consequatur/comments"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "content": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-community-posts--id--comments">
</span>
<span id="execution-results-POSTapi-community-posts--id--comments" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-community-posts--id--comments"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-community-posts--id--comments"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-community-posts--id--comments" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-community-posts--id--comments">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-community-posts--id--comments" data-method="POST"
      data-path="api/community/posts/{id}/comments"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-community-posts--id--comments', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-community-posts--id--comments"
                    onclick="tryItOut('POSTapi-community-posts--id--comments');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-community-posts--id--comments"
                    onclick="cancelTryOut('POSTapi-community-posts--id--comments');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-community-posts--id--comments"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/community/posts/{id}/comments</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-community-posts--id--comments"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-community-posts--id--comments"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="POSTapi-community-posts--id--comments"
               value="consequatur"
               data-component="url">
    <br>
<p>The ID of the post. Example: <code>consequatur</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>content</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="content"                data-endpoint="POSTapi-community-posts--id--comments"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-PUTapi-community-comments--id-">PUT api/community/comments/{id}</h2>

<p>
</p>



<span id="example-requests-PUTapi-community-comments--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://192.168.8.32:8000/api/community/comments/consequatur" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"content\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/community/comments/consequatur"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "content": "consequatur"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-community-comments--id-">
</span>
<span id="execution-results-PUTapi-community-comments--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-community-comments--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-community-comments--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-community-comments--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-community-comments--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-community-comments--id-" data-method="PUT"
      data-path="api/community/comments/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-community-comments--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-community-comments--id-"
                    onclick="tryItOut('PUTapi-community-comments--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-community-comments--id-"
                    onclick="cancelTryOut('PUTapi-community-comments--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-community-comments--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/community/comments/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-community-comments--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-community-comments--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-community-comments--id-"
               value="consequatur"
               data-component="url">
    <br>
<p>The ID of the comment. Example: <code>consequatur</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>content</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="content"                data-endpoint="PUTapi-community-comments--id-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-community-comments--id-">DELETE api/community/comments/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-community-comments--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://192.168.8.32:8000/api/community/comments/consequatur" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/community/comments/consequatur"
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

<span id="example-responses-DELETEapi-community-comments--id-">
</span>
<span id="execution-results-DELETEapi-community-comments--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-community-comments--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-community-comments--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-community-comments--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-community-comments--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-community-comments--id-" data-method="DELETE"
      data-path="api/community/comments/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-community-comments--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-community-comments--id-"
                    onclick="tryItOut('DELETEapi-community-comments--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-community-comments--id-"
                    onclick="cancelTryOut('DELETEapi-community-comments--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-community-comments--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/community/comments/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-community-comments--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-community-comments--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-community-comments--id-"
               value="consequatur"
               data-component="url">
    <br>
<p>The ID of the comment. Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-community-saved-posts">GET api/community/saved-posts</h2>

<p>
</p>



<span id="example-requests-GETapi-community-saved-posts">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://192.168.8.32:8000/api/community/saved-posts" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/community/saved-posts"
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

<span id="example-responses-GETapi-community-saved-posts">
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
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Unauthenticated&quot;,
    &quot;data&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-community-saved-posts" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-community-saved-posts"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-community-saved-posts"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-community-saved-posts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-community-saved-posts">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-community-saved-posts" data-method="GET"
      data-path="api/community/saved-posts"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-community-saved-posts', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-community-saved-posts"
                    onclick="tryItOut('GETapi-community-saved-posts');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-community-saved-posts"
                    onclick="cancelTryOut('GETapi-community-saved-posts');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-community-saved-posts"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/community/saved-posts</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-community-saved-posts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-community-saved-posts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-community-activity">GET api/community/activity</h2>

<p>
</p>



<span id="example-requests-GETapi-community-activity">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://192.168.8.32:8000/api/community/activity" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/community/activity"
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

<span id="example-responses-GETapi-community-activity">
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
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Unauthenticated&quot;,
    &quot;data&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-community-activity" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-community-activity"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-community-activity"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-community-activity" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-community-activity">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-community-activity" data-method="GET"
      data-path="api/community/activity"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-community-activity', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-community-activity"
                    onclick="tryItOut('GETapi-community-activity');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-community-activity"
                    onclick="cancelTryOut('GETapi-community-activity');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-community-activity"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/community/activity</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-community-activity"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-community-activity"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-notifications">GET api/notifications</h2>

<p>
</p>



<span id="example-requests-GETapi-notifications">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://192.168.8.32:8000/api/notifications" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/notifications"
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

<span id="example-responses-GETapi-notifications">
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
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Unauthenticated&quot;,
    &quot;data&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-notifications" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-notifications"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-notifications"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-notifications" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-notifications">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-notifications" data-method="GET"
      data-path="api/notifications"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-notifications', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-notifications"
                    onclick="tryItOut('GETapi-notifications');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-notifications"
                    onclick="cancelTryOut('GETapi-notifications');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-notifications"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/notifications</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-notifications"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-notifications"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-notifications--id--read">POST api/notifications/{id}/read</h2>

<p>
</p>



<span id="example-requests-POSTapi-notifications--id--read">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://192.168.8.32:8000/api/notifications/consequatur/read" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/notifications/consequatur/read"
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

<span id="example-responses-POSTapi-notifications--id--read">
</span>
<span id="execution-results-POSTapi-notifications--id--read" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-notifications--id--read"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-notifications--id--read"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-notifications--id--read" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-notifications--id--read">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-notifications--id--read" data-method="POST"
      data-path="api/notifications/{id}/read"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-notifications--id--read', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-notifications--id--read"
                    onclick="tryItOut('POSTapi-notifications--id--read');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-notifications--id--read"
                    onclick="cancelTryOut('POSTapi-notifications--id--read');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-notifications--id--read"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/notifications/{id}/read</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-notifications--id--read"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-notifications--id--read"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="POSTapi-notifications--id--read"
               value="consequatur"
               data-component="url">
    <br>
<p>The ID of the notification. Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-notifications-read-all">POST api/notifications/read-all</h2>

<p>
</p>



<span id="example-requests-POSTapi-notifications-read-all">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://192.168.8.32:8000/api/notifications/read-all" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/notifications/read-all"
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

<span id="example-responses-POSTapi-notifications-read-all">
</span>
<span id="execution-results-POSTapi-notifications-read-all" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-notifications-read-all"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-notifications-read-all"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-notifications-read-all" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-notifications-read-all">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-notifications-read-all" data-method="POST"
      data-path="api/notifications/read-all"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-notifications-read-all', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-notifications-read-all"
                    onclick="tryItOut('POSTapi-notifications-read-all');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-notifications-read-all"
                    onclick="cancelTryOut('POSTapi-notifications-read-all');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-notifications-read-all"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/notifications/read-all</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-notifications-read-all"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-notifications-read-all"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-ai-analyze-plant">POST api/ai/analyze-plant</h2>

<p>
</p>



<span id="example-requests-POSTapi-ai-analyze-plant">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://192.168.8.32:8000/api/ai/analyze-plant" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "image=@C:\Users\Eng-salah\AppData\Local\Temp\php9686.tmp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/ai/analyze-plant"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('image', document.querySelector('input[name="image"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-ai-analyze-plant">
</span>
<span id="execution-results-POSTapi-ai-analyze-plant" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-ai-analyze-plant"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-ai-analyze-plant"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-ai-analyze-plant" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-ai-analyze-plant">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-ai-analyze-plant" data-method="POST"
      data-path="api/ai/analyze-plant"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-ai-analyze-plant', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-ai-analyze-plant"
                    onclick="tryItOut('POSTapi-ai-analyze-plant');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-ai-analyze-plant"
                    onclick="cancelTryOut('POSTapi-ai-analyze-plant');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-ai-analyze-plant"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/ai/analyze-plant</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-ai-analyze-plant"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-ai-analyze-plant"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="image"                data-endpoint="POSTapi-ai-analyze-plant"
               value=""
               data-component="body">
    <br>
<p>يجب أن يكون حقل value صورةً. يجب أن لا يتجاوز حجم ملف حقل value 5120 كيلوبايت. Example: <code>C:\Users\Eng-salah\AppData\Local\Temp\php9686.tmp</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-iot-status">Get the current device associated with the user.</h2>

<p>
</p>



<span id="example-requests-GETapi-iot-status">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://192.168.8.32:8000/api/iot/status" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/iot/status"
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

<span id="example-responses-GETapi-iot-status">
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
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Unauthenticated&quot;,
    &quot;data&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-iot-status" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-iot-status"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-iot-status"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-iot-status" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-iot-status">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-iot-status" data-method="GET"
      data-path="api/iot/status"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-iot-status', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-iot-status"
                    onclick="tryItOut('GETapi-iot-status');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-iot-status"
                    onclick="cancelTryOut('GETapi-iot-status');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-iot-status"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/iot/status</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-iot-status"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-iot-status"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-iot-toggle">Toggle irrigation manual state.</h2>

<p>
</p>



<span id="example-requests-POSTapi-iot-toggle">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://192.168.8.32:8000/api/iot/toggle" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"status\": true
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/iot/toggle"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "status": true
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-iot-toggle">
</span>
<span id="execution-results-POSTapi-iot-toggle" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-iot-toggle"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-iot-toggle"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-iot-toggle" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-iot-toggle">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-iot-toggle" data-method="POST"
      data-path="api/iot/toggle"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-iot-toggle', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-iot-toggle"
                    onclick="tryItOut('POSTapi-iot-toggle');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-iot-toggle"
                    onclick="cancelTryOut('POSTapi-iot-toggle');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-iot-toggle"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/iot/toggle</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-iot-toggle"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-iot-toggle"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
 &nbsp;
 &nbsp;
                <label data-endpoint="POSTapi-iot-toggle" style="display: none">
            <input type="radio" name="status"
                   value="true"
                   data-endpoint="POSTapi-iot-toggle"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-iot-toggle" style="display: none">
            <input type="radio" name="status"
                   value="false"
                   data-endpoint="POSTapi-iot-toggle"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>true</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-iot-auto-irrigation">Update auto-irrigation settings.</h2>

<p>
</p>



<span id="example-requests-POSTapi-iot-auto-irrigation">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://192.168.8.32:8000/api/iot/auto-irrigation" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"auto_irrigation\": false
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/iot/auto-irrigation"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "auto_irrigation": false
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-iot-auto-irrigation">
</span>
<span id="execution-results-POSTapi-iot-auto-irrigation" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-iot-auto-irrigation"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-iot-auto-irrigation"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-iot-auto-irrigation" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-iot-auto-irrigation">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-iot-auto-irrigation" data-method="POST"
      data-path="api/iot/auto-irrigation"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-iot-auto-irrigation', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-iot-auto-irrigation"
                    onclick="tryItOut('POSTapi-iot-auto-irrigation');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-iot-auto-irrigation"
                    onclick="cancelTryOut('POSTapi-iot-auto-irrigation');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-iot-auto-irrigation"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/iot/auto-irrigation</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-iot-auto-irrigation"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-iot-auto-irrigation"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>auto_irrigation</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
 &nbsp;
 &nbsp;
                <label data-endpoint="POSTapi-iot-auto-irrigation" style="display: none">
            <input type="radio" name="auto_irrigation"
                   value="true"
                   data-endpoint="POSTapi-iot-auto-irrigation"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-iot-auto-irrigation" style="display: none">
            <input type="radio" name="auto_irrigation"
                   value="false"
                   data-endpoint="POSTapi-iot-auto-irrigation"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>false</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-iot-schedules">Manage Schedules</h2>

<p>
</p>



<span id="example-requests-GETapi-iot-schedules">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://192.168.8.32:8000/api/iot/schedules" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/iot/schedules"
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

<span id="example-responses-GETapi-iot-schedules">
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
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Unauthenticated&quot;,
    &quot;data&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-iot-schedules" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-iot-schedules"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-iot-schedules"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-iot-schedules" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-iot-schedules">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-iot-schedules" data-method="GET"
      data-path="api/iot/schedules"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-iot-schedules', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-iot-schedules"
                    onclick="tryItOut('GETapi-iot-schedules');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-iot-schedules"
                    onclick="cancelTryOut('GETapi-iot-schedules');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-iot-schedules"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/iot/schedules</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-iot-schedules"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-iot-schedules"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-iot-schedules">POST api/iot/schedules</h2>

<p>
</p>



<span id="example-requests-POSTapi-iot-schedules">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://192.168.8.32:8000/api/iot/schedules" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"start_time\": \"consequatur\",
    \"days\": []
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/iot/schedules"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "start_time": "consequatur",
    "days": []
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-iot-schedules">
</span>
<span id="execution-results-POSTapi-iot-schedules" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-iot-schedules"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-iot-schedules"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-iot-schedules" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-iot-schedules">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-iot-schedules" data-method="POST"
      data-path="api/iot/schedules"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-iot-schedules', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-iot-schedules"
                    onclick="tryItOut('POSTapi-iot-schedules');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-iot-schedules"
                    onclick="cancelTryOut('POSTapi-iot-schedules');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-iot-schedules"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/iot/schedules</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-iot-schedules"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-iot-schedules"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>start_time</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="start_time"                data-endpoint="POSTapi-iot-schedules"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>days</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="days"                data-endpoint="POSTapi-iot-schedules"
               value=""
               data-component="body">
    <br>

        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-iot-schedules--id-">DELETE api/iot/schedules/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-iot-schedules--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://192.168.8.32:8000/api/iot/schedules/consequatur" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/iot/schedules/consequatur"
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

<span id="example-responses-DELETEapi-iot-schedules--id-">
</span>
<span id="execution-results-DELETEapi-iot-schedules--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-iot-schedules--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-iot-schedules--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-iot-schedules--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-iot-schedules--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-iot-schedules--id-" data-method="DELETE"
      data-path="api/iot/schedules/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-iot-schedules--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-iot-schedules--id-"
                    onclick="tryItOut('DELETEapi-iot-schedules--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-iot-schedules--id-"
                    onclick="cancelTryOut('DELETEapi-iot-schedules--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-iot-schedules--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/iot/schedules/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-iot-schedules--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-iot-schedules--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-iot-schedules--id-"
               value="consequatur"
               data-component="url">
    <br>
<p>The ID of the schedule. Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-iot-request-service">Request a new IoT device service.</h2>

<p>
</p>



<span id="example-requests-POSTapi-iot-request-service">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://192.168.8.32:8000/api/iot/request-service" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/iot/request-service"
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

<span id="example-responses-POSTapi-iot-request-service">
</span>
<span id="execution-results-POSTapi-iot-request-service" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-iot-request-service"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-iot-request-service"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-iot-request-service" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-iot-request-service">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-iot-request-service" data-method="POST"
      data-path="api/iot/request-service"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-iot-request-service', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-iot-request-service"
                    onclick="tryItOut('POSTapi-iot-request-service');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-iot-request-service"
                    onclick="cancelTryOut('POSTapi-iot-request-service');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-iot-request-service"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/iot/request-service</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-iot-request-service"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-iot-request-service"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-admin-stats">GET /admin/stats</h2>

<p>
</p>



<span id="example-requests-GETapi-admin-stats">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://192.168.8.32:8000/api/admin/stats" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/admin/stats"
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

<span id="example-responses-GETapi-admin-stats">
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
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Unauthenticated&quot;,
    &quot;data&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-admin-stats" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-admin-stats"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-admin-stats"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-admin-stats" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-admin-stats">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-admin-stats" data-method="GET"
      data-path="api/admin/stats"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-admin-stats', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-admin-stats"
                    onclick="tryItOut('GETapi-admin-stats');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-admin-stats"
                    onclick="cancelTryOut('GETapi-admin-stats');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-admin-stats"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/admin/stats</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-admin-stats"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-admin-stats"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-admin-users">GET /admin/users
per_page محدودة بـ 100 لمنع استرجاع كل السجلات دفعة واحدة</h2>

<p>
</p>



<span id="example-requests-GETapi-admin-users">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://192.168.8.32:8000/api/admin/users" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/admin/users"
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

<span id="example-responses-GETapi-admin-users">
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
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Unauthenticated&quot;,
    &quot;data&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-admin-users" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-admin-users"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-admin-users"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-admin-users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-admin-users">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-admin-users" data-method="GET"
      data-path="api/admin/users"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-admin-users', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-admin-users"
                    onclick="tryItOut('GETapi-admin-users');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-admin-users"
                    onclick="cancelTryOut('GETapi-admin-users');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-admin-users"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/admin/users</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-admin-users"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-admin-users"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-PUTapi-admin-users--id--role">PUT /admin/users/{id}/role</h2>

<p>
</p>



<span id="example-requests-PUTapi-admin-users--id--role">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://192.168.8.32:8000/api/admin/users/consequatur/role" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"user_type\": \"admin\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/admin/users/consequatur/role"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user_type": "admin"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-admin-users--id--role">
</span>
<span id="execution-results-PUTapi-admin-users--id--role" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-admin-users--id--role"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-admin-users--id--role"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-admin-users--id--role" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-admin-users--id--role">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-admin-users--id--role" data-method="PUT"
      data-path="api/admin/users/{id}/role"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-admin-users--id--role', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-admin-users--id--role"
                    onclick="tryItOut('PUTapi-admin-users--id--role');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-admin-users--id--role"
                    onclick="cancelTryOut('PUTapi-admin-users--id--role');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-admin-users--id--role"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/admin/users/{id}/role</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-admin-users--id--role"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-admin-users--id--role"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-admin-users--id--role"
               value="consequatur"
               data-component="url">
    <br>
<p>The ID of the user. Example: <code>consequatur</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>user_type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="user_type"                data-endpoint="PUTapi-admin-users--id--role"
               value="admin"
               data-component="body">
    <br>
<p>Example: <code>admin</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>admin</code></li> <li><code>seller</code></li> <li><code>user</code></li></ul>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-admin-users--id-">DELETE /admin/users/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-admin-users--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://192.168.8.32:8000/api/admin/users/consequatur" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://192.168.8.32:8000/api/admin/users/consequatur"
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

<span id="example-responses-DELETEapi-admin-users--id-">
</span>
<span id="execution-results-DELETEapi-admin-users--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-admin-users--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-admin-users--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-admin-users--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-admin-users--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-admin-users--id-" data-method="DELETE"
      data-path="api/admin/users/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-admin-users--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-admin-users--id-"
                    onclick="tryItOut('DELETEapi-admin-users--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-admin-users--id-"
                    onclick="cancelTryOut('DELETEapi-admin-users--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-admin-users--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/admin/users/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-admin-users--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-admin-users--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-admin-users--id-"
               value="consequatur"
               data-component="url">
    <br>
<p>The ID of the user. Example: <code>consequatur</code></p>
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
