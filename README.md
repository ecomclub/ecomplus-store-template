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
the [storefront JS SDK](https://github.com/ecomclub/ecomplus-sdk-js)
and the [layout renderer app](https://github.com/ecomclub/ecomplus-store-render):

```html
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<script src="https://ecom.nyc3.digitaloceanspaces.com/plus/js/sdk.min.js"></script>
<script src="https://ecom.nyc3.digitaloceanspaces.com/plus/js/renderer.min.js"></script>
```

Then, start the layout rendering with JS below:

```javascript
EcomStore.init()
```

# Guide
HTML attributes will be named with the prefix `ecom-`,
mustache tags with prefix (object) `Ecom.`.

## Body
HTML body tag must have the attribute `ecom-store`
with the ID of current store.

Example:

```html
<body ecom-store="100">
```
