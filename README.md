[Hosted with GitHub Pages](https://ecomclub.github.io/ecomplus-store-template/)

# Introduction
E-Com Plus storefront uses
[Vue.js 2](https://vuejs.org/v2/guide/) framework, so
store template specifications follow the
[Vue.js template syntax](https://vuejs.org/v2/guide/syntax.html).

This document is intended to list predefined mustache tags and
HTML attributes for layout rendering with
[ecomplus-store-render](https://github.com/ecomclub/ecomplus-store-render)
Vue.js app.

# Getting Started
Your HTML file must include
[Vue](https://vuejs.org/v2/),
[Axions](https://github.com/axios/axios) http client library,
[storefront JS SDK](https://github.com/ecomclub/ecomplus-sdk-js)
and the [layout renderer app](https://github.com/ecomclub/ecomplus-store-render).
You can include storefront "all in one" JS file **(recommended)**:

```html
<script src="https://ecvol.com/js/storefront-v1x0.min.js"></script>
```

Or import the scripts one by one (not recommended):

```html
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://ecom.nyc3.digitaloceanspaces.com/plus/js/sdk.min.js"></script>
<script src="https://ecom.nyc3.digitaloceanspaces.com/plus/js/renderer.min.js"></script>
```

Then, start the layout rendering with JS below:

```javascript
EcomStore.init()
```

# Guide
HTML attributes will be named with the prefix `data-ecom-`,
mustache tags with prefix (object) `Ecom.`.

## Body
HTML body tag must have the attribute `data-ecom-store`
with the ID of your store:

```html
<body data-ecom-store="100">
<!-- HTML CODE -->
</body>
```
