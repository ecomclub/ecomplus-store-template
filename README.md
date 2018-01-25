[Hosted on GitHub Pages](https://ecomclub.github.io/ecomplus-store-template/)

# Summary
1. [Introduction](#introduction)
2. [Getting started](#getting-started)
3. [Guide](#guide)
    * [App main element](#app-main-element)
    * [Store API objects](#store-api-objects)
        * [Object types](#object-types)
        * [Basic product samples](#basic-product-samples)

{% raw %}

# Introduction
E-Com Plus storefront uses
<a href="https://vuejs.org/v2/guide/" target="_blank">Vue.js 2</a> framework, so
store template specifications follow the
<a href="https://vuejs.org/v2/guide/syntax.html" target="_blank">Vue.js template syntax</a>.

This document is intended to list predefined mustache tags and
HTML attributes for layout rendering with
<a href="https://github.com/ecomclub/ecomplus-store-render" target="_blank">ecomplus-store-render</a>
Vue.js app.

# Getting started
Your HTML file must include
<a href="https://vuejs.org/v2/" target="_blank">Vue</a>,
<a href="https://github.com/axios/axios" target="_blank">Axions</a>
http client library,
<a href="https://github.com/ecomclub/ecomplus-sdk-js" target="_blank">storefront JS SDK</a>
and the
<a href="https://github.com/ecomclub/ecomplus-store-render" target="_blank">layout renderer app</a>.
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

Each `._ecom-store` element will be an
<a href="https://vuejs.org/v2/guide/instance.html" target="_blank">Vue instance</a>.

## Store API objects
Each HTML element with class `_ecom-el` will
represent an object declaration, preceded of a GET request to
<a href="https://ecomstore.docs.apiary.io/" target="_blank">Store API</a>.

The `._ecom-el` elements must also have the attributes below:

| Attribute        | Description |
| :---:            | :---: |
| `data-ecom-o`    | Variable name, can have any value, [explanation here](#naming-objects) |
| `data-ecom-type` | Type of object, with one of [these values](#object-types) |
| `data-ecom-id`   | API Object ID, the `_id` of the object you are getting from the API |

Inside `._ecom-el` elements you can use mustache tags and any
<a href="https://vuejs.org/v2/guide/syntax.html" target="_blank">Vue template</a>
attributes.

The data is the object returned from
<a href="https://ecomstore.docs.apiary.io/" target="_blank">Store API</a>,
with the same properties.

### Object types
Possible values for `data-ecom-type`:

| Type          | Object model |
| :---:         | :---: |
| `product`     | [Reference](https://ecomstore.docs.apiary.io/#reference/products/product-object) |
| `brand`       | [Reference](https://ecomstore.docs.apiary.io/#reference/products/product-object) |
| `category`    | [Reference](https://ecomstore.docs.apiary.io/#reference/products/product-object) |
| `collection`  | [Reference](https://ecomstore.docs.apiary.io/#reference/products/product-object) |
| `grid`        | [Reference](https://ecomstore.docs.apiary.io/#reference/products/product-object) |
| `customer`    | [Reference](https://ecomstore.docs.apiary.io/#reference/products/product-object) |
| `cart`        | [Reference](https://ecomstore.docs.apiary.io/#reference/products/product-object) |
| `order`       | [Reference](https://ecomstore.docs.apiary.io/#reference/products/product-object) |
| `application` | [Reference](https://ecomstore.docs.apiary.io/#reference/products/product-object) |
| `store`       | [Reference](https://ecomstore.docs.apiary.io/#reference/products/product-object) |

### Basic product samples
```html
<div class="_ecom-el" data-ecom-o="p1" data-ecom-type="product" data-ecom-id="123a5432109876543210cdef">
  <h3> {{ p1.name }} </h3>
  <p class="price"> {{ p1.currency_symbol }} {{ p1.price }} </p>
  <p class="sku"> Code: {{ p1.sku }} </p>
  <button class="buy"> Buy </button>
</div>
```

```html
<div class="_ecom-el" data-ecom-o="p2" data-ecom-type="product" data-ecom-id="123a5432109876543210cdef">
  <div v-bind:data-sku="p2.sku" v-if="p2.visible">
    <img v-bind:src="p2.pictures[0].normal.url" v-bind:alt="p2.pictures[0].normal.alt"/>
    <h3> {{ p2.name }} </h3>
    <p class="price"> {{ p2.currency_symbol }} {{ formatMoney(p2.price) }} </p>
    <button v-if="p2.quantity > p2.min_quantity" class="buy"> Buy </button>
    <div class="no-stock" v-else> Out of stock </div>
  </div>
</div>
```

<a href="https://ecomstore.docs.apiary.io/#reference/products/product-object" target="_blank">
  Object reference
</a>.

Note that you can use similar code for other types of objects (API resources).

{% endraw %}
