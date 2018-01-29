# Storefront theme

## Pages
1. [Storefront theme](https://ecomclub.github.io/ecomplus-store-template/)
2. [Template structure](https://ecomclub.github.io/ecomplus-store-template/structure/)

## Summary
1. [Introduction](#introduction)
2. [Getting started](#getting-started)
3. [Guide](#guide)
    * [App main element](#app-main-element)
        * [Specifying language](#specifying-language)
        * [Specifying store](#specifying-store)
    * [Vue instances](#vue-instances)
        * [Store API objects](#store-api-objects)
            * [Object types](#object-types)
            * [Basic product sample](#basic-product-sample)
            * [List products from collection](#list-products-from-collection)
        * [Search API objects](#search-api-objects)

{% raw %}

# Introduction
This document is intended to list predefined mustache tags and
HTML attributes for layout rendering with
<a href="https://github.com/ecomclub/ecomplus-store-render" target="_blank">ecomplus-store-render</a>.

**It's possible use any HTML template for E-Com Plus storefront.**
After reading this documentation, you will be able to customize a theme
(editing some elements only) or start a new theme from scratch.

If you want to create a new theme from scratch, be sure to follow
<a href="https://ecomclub.github.io/ecomplus-store-template/structure/">this template structure</a>.

E-Com Plus storefront uses
<a href="https://vuejs.org/v2/guide/" target="_blank">Vue.js 2</a> framework, so
store template specifications follow the
<a href="https://vuejs.org/v2/guide/syntax.html" target="_blank">Vue template syntax</a>.

# Getting started
Your HTML file must include
<a href="https://vuejs.org/v2/" target="_blank">Vue</a>,
<a href="https://github.com/axios/axios" target="_blank">Axios</a>
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
Your HTML must have an element
with class `_ecom-store`, it's **required**.

All Vue template must be inside this element,
including all mustache tags and Vue HTML attributes,
so probably it will be the `<body>`, but it's not a rule, you can use
a `<div>`, `<span>` or any other:

```html
<body class="_ecom-store">
  <!-- HTML CODE -->
</body>
```

### Specifying store
By default, store will be defined in function of the site domain,
but you can also use the attributes `data-ecom-store` and `data-ecom-id`
with your _Store ID_ and _Store Object ID_ respectively:

```html
<div class="_ecom-store" data-ecom-store="100" data-ecom-id="5a674f224e0dcec2c3353d9d">
```

It's useful if the template is designed for one specific store only,
or if you want to work with multiple stores in the same storefront.

### Specifying language
If you don't want to use the store default language,
you can use the attribute `data-ecom-lang`:

```html
<div class="_ecom-store" data-ecom-lang="en_us">
```

Use lowercase letters and separate lang of country (if any) by underline,
eg.: `pt_br`, `en_us`, `it`, `es`.

## Vue instances
Each HTML element with class `_ecom-el` will be an
<a href="https://vuejs.org/v2/guide/instance.html" target="_blank">Vue instance</a>.
It represents an object declaration, preceded of a REST API GET request.

Inside `._ecom-el` elements you can use mustache tags and any
<a href="https://vuejs.org/v2/guide/syntax.html" target="_blank">Vue template</a>
attributes.

### Store API objects
<a href="https://ecomstore.docs.apiary.io/" target="_blank">Store API</a> requests
are rendered from `._ecom-el` elements
with the attributes below:

| Attribute        | Description |
| :---:            | :---: |
| `data-ecom-type` | Type of object, with one of [these values](#object-types) |
| `data-ecom-id`   | _(Optional)_ API Object ID, the `_id` of the object you are getting from the API |

In almost all cases, you will not create an HTML for each object,
for example, you will create only one HTML file for all products,
not one per product.
In these cases it's not possible to specify `data-ecom-id` (it's dynamic),
let the element without this attribute,
it will be defined in function of page URL (slug).

The
<a href="https://vuejs.org/v2/guide/instance.html#Data-and-Methods" target="_blank">instance data</a>
will be the object returned from
<a href="https://ecomstore.docs.apiary.io/" target="_blank">Store API</a>,
with the same properties.

#### Object types
Possible values for `data-ecom-type`:

| Type          | Object model |
| :---:         | :---: |
| `product`     | [Reference](https://ecomstore.docs.apiary.io/#reference/products/product-object) |
| `brand`       | [Reference](https://ecomstore.docs.apiary.io/#reference/brands/brand-object) |
| `category`    | [Reference](https://ecomstore.docs.apiary.io/#reference/categories/category-object) |
| `collection`  | [Reference](https://ecomstore.docs.apiary.io/#reference/collections/collection-object) |
| `grid`        | [Reference](https://ecomstore.docs.apiary.io/#reference/grids/grid-object) |
| `customer`    | [Reference](https://ecomstore.docs.apiary.io/#reference/customers/customer-object) |
| `cart`        | [Reference](https://ecomstore.docs.apiary.io/#reference/carts/cart-object) |
| `order`       | [Reference](https://ecomstore.docs.apiary.io/#reference/orders/order-object) |
| `application` | [Reference](https://ecomstore.docs.apiary.io/#reference/applications/application-object) |

#### Basic product sample
The example below is a simple implementation of a product page:

```html
<div class="_ecom-el" data-ecom-type="product">
  <div v-bind:class="'prod-' + sku" v-if="visible">
    <ul>
      <li v-for="picture in pictures">
        <img v-bind:src="picture.big.url" v-bind:alt="picture.big.alt" v-bind:data-zoom="picture.zoom.url" />
      </li>
    </ul>
    <a v-bind:href="slug">
      <h1> {{ name }} </h1>
    </a>
    <p class="price"> {{ currency_symbol }} {{ EcomStore.formatMoney(price) }} </p>
    <div v-if="available">
      <button v-if="quantity > min_quantity" class="buy"> Buy </button>
      <div class="no-stock" v-else> Out of stock </div>
    </div>
    <div class="description">
      {{ body_html }}
    </div>
  </div>
</div>
```

Vue data (inside mustache tags and `v-*` attributes) follows this
<a href="https://ecomstore.docs.apiary.io/#reference/products/product-object" target="_blank">object reference</a>.

Note that you can use similar code for other types of objects (API resources).

#### List products from collection
To list products of a collection you have to use
the attribute `data-ecom-list` and implement a
<a href="https://vuejs.org/v2/guide/list.html" target="_blank">Vue list</a>:

```html
<div class="_ecom-el" data-ecom-type="collection" data-ecom-list="products,0,12" data-ecom-id="c92000000000000000001111">
  <h4> {{ name }} </h3>
  <ul>
    <li v-for="product in List">
      <img v-bind:src="product.pictures[0].normal.url" v-bind:alt="product.pictures[0].normal.alt" />
      <h3> {{ product.name }} </h3>
      <p class="price"> {{ product.currency_symbol }} {{ EcomStore.formatMoney(product.price) }} </p>
      <button v-if="product.quantity > product.min_quantity" class="buy"> Buy </button>
      <div class="no-stock" v-else> Out of stock </div>
    </li>
  </ul>
</div>
```

### Search API objects
<a href="https://ecomsearch.docs.apiary.io/" target="_blank">Search API</a> requests
are rendered from `._ecom-el` elements
with the `data-ecom-type` as `items` or `terms`,
and other attributes depending of search case.

The
<a href="https://vuejs.org/v2/guide/instance.html#Data-and-Methods" target="_blank">Vue instance data</a>
will be the object returned from
<a href="https://ecomsearch.docs.apiary.io/" target="_blank">Search API</a>,
with the same properties.

#### Search items
To search for products, `data-ecom-type` must be equal to `items`.
You can get more info and example of returned object from
<a href="https://ecomsearch.docs.apiary.io/#reference/items" target="_blank">API reference</a>.

#### Find products by name and keywords
To search products (items) by name and/or keywords,
`._ecom-el` element must have the attributes below:

| Attribute          | Description |
| :---:              | :---: |
| `data-ecom-type`   | `items` |
| `data-ecom-search` | _(Optional)_ Search keyword, results offset, results limit, results order |

##### Search by keyword sample
```html
<div class="_ecom-el" data-ecom-type="items" data-ecom-search="tshirt,0,20,0">
  <h4> {{ name }} </h3>
  <ul>
    <li v-for="product in List">
      <img v-bind:src="product.pictures[0].normal.url" v-bind:alt="product.pictures[0].normal.alt" />
      <h3> {{ product.name }} </h3>
      <p class="price"> {{ product.currency_symbol }} {{ EcomStore.formatMoney(product.price) }} </p>
      <button v-if="product.quantity > product.min_quantity" class="buy"> Buy </button>
      <div class="no-stock" v-else> Out of stock </div>
    </li>
  </ul>
</div>
```

{% endraw %}
