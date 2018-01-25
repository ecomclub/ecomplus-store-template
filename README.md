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
classes with prefix `_ecom-`.

## App main element
Your HTML must have an element (normally a `<div>` or `<span>`)
with class `_ecom-store` and the attribute `data-ecom-store`
with the ID of your store, it's **required**.

All Vue template must be inside this element,
including all mustache tags and Vue HTML attributes,
so probably it will be the first and only element inside `<body>` (but it's not a rule):

```html
<body>
  <div class="_ecom-store" data-ecom-store="100">
    <!-- HTML CODE -->
  </div>
</body>
```

## Vue instances
Each HTML element with class `_ecom-app-el` will be an
[Vue instance](https://vuejs.org/v2/guide/instance.html), it also must
have some data attributes, `data-ecom-object` and others depending of
object type.

Inside `_ecom-app-el` elements you can use mustache tags and any
[Vue template](https://vuejs.org/v2/guide/syntax.html) attributes.

The data is tha object returned from
[Store API](https://ecomstore.docs.apiary.io/),
with the same properties.

### Product sample
```html
<div class="_ecom-app-el" data-ecom-object="product" data-ecom-o-id="123a5432109876543210cdef">
  <!--
    Object reference:
    https://ecomstore.docs.apiary.io/#reference/products/product-object
  -->
  <h3>{{ name }}</h3>
  <p class="price">{{ currency_symbol }} {{ price }}</p>
  <p class="sku">Code: {{ sku }}</p>
</div>
```
