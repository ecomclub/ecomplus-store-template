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

# Getting started
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

## App main element
Your HTML must have an element (normally a `<div>`) with class `ecom-store-app`
and the attribute `data-ecom-store` with the ID of your store,
it's **required**:

```html
<div class="ecom-store-app" data-ecom-store="100">
  <!-- HTML CODE -->
</div>
```

All Vue template (mustache tags and Vue HTML attributes)
must be inside this element, so probably it will be the first element inside `<body>`:

```html
<body>
  <div class="ecom-store-app" data-ecom-store="100">
    <!-- HTML CODE -->
  </div>
</body>
```

## Attributes
List of available HTML tags attributes:
