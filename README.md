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
HTML classes used by this library will be named with the prefix `_ecom-`,
data attributes may be used together with the classes in the elements.

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
but you can also use the attributes `data-store` and `data-id`
with your _Store ID_ and _Store Object ID_ respectively:

```html
<div class="_ecom-store" data-store="100" data-id="5a674f224e0dcec2c3353d9d">
```

It's useful if the template is designed for one specific store only,
or if you want to work with multiple stores in the same storefront.

### Specifying language
If you don't want to use the store default language,
you can use the attribute `data-lang`:

```html
<div class="_ecom-store" data-lang="en_us">
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

| Attribute   | Description |
| :---:       | :---: |
| `data-type` | Type of object, with one of [these values](#object-types) |
| `data-id`   | API Object ID, the `_id` of the object you are getting from the API _(optional)_ |

In almost all cases, you will not create an HTML for each object,
for example, you will create only one HTML file for all products,
not one per product.
In these cases it's not possible to specify `data-id` (it's dynamic),
let the element without this attribute,
ID will be defined in function of page URL (slug).

The
<a href="https://vuejs.org/v2/guide/instance.html#Data-and-Methods" target="_blank">instance data</a>
will be the object returned from
<a href="https://ecomstore.docs.apiary.io/" target="_blank">Store API</a>,
with the same properties.

#### Object types
Possible values for `data-type`:

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
<div class="_ecom-el" data-type="product">
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

If you are creating the HTML file for a specific product only,
or embedding one product inside a custom page, you must set `data-id`
with the product ID:

```html
<div class="_ecom-el" data-type="product" data-id="123a5432109876543210cdef">
```

Vue data (inside mustache tags and `v-*` attributes) follows this
<a href="https://ecomstore.docs.apiary.io/#reference/products/product-object" target="_blank">object reference</a>.

Note that you can use similar code for other types of objects (API resources).

#### List products from collection
To list products of a collection you have to use
the attribute `data-list` and implement a
<a href="https://vuejs.org/v2/guide/list.html" target="_blank">Vue list</a>:

```html
<div class="_ecom-el" data-type="collection" data-list="products,0,12" data-id="c92000000000000000001111">
  <h3> {{ name }} </h3>
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
with the `data-type` equal to `items` or `terms`,
and other attributes depending of search case.

The
<a href="https://vuejs.org/v2/guide/instance.html#Data-and-Methods" target="_blank">Vue instance data</a>
will be the object returned from
<a href="https://ecomsearch.docs.apiary.io/" target="_blank">Search API</a>,
with the same properties.

#### List items
To list products, `data-type` must be equal to `items`.
You can get more info and example of returned object from
<a href="https://ecomsearch.docs.apiary.io/#reference/items" target="_blank">API reference</a>.

The `._ecom-el` element must also have the following attributes:

| Attribute         | Description |
| :---:             | :---: |
| `data-type`       | Equal to `items` |
| `data-term`       | Searched keyword _(optional)_ |
| `data-from`       | Results offset number _(optional)_ |
| `data-size`       | Maximum number of results _(optional)_ |
| `data-sort`       | Results ordering, one of [these enumered values](#sort-items-search-result) _(optional)_ |
| `data-brands`     | Filter by list of brands separated by `,` _(optional)_ |
| `data-categories` | Filter by list of categories separated by `,` _(optional)_ |
| `data-price-min`  | Filter by minimum price _(optional)_ |
| `data-price-max`  | Filter by maximum price _(optional)_ |
| `data-spec-*`     | Filter by product specification _(optional)_ |

##### Sort items search result

By default, items will be ordered by popularity (number of page views),
but you can use custom sort with `data-sort` attribute
with one of the values below:

| Enum | Description |
| :--: | :---: |
| `1`  | Sort by sales, products that sells more appear first |
| `2`  | Sort by price ascending, products with lowest price appear first |
| `3`  | Sort by price descending, products with highest price appear first |
| `4`  | Sort by creation date, new products appear first |

##### List trending items sample
```html
<div class="row _ecom-el" data-type="items" data-size="6">
  <div class="col-md-2" v-for="item in hits.hits">
    <img v-bind:src="item.pictures[0].normal.url" v-bind:alt="item.pictures[0].normal.alt" />
    <a v-bind:href="item.slug">
      <h3> {{ item.name }} </h3>
    </a>
    <p class="price"> {{ item.currency_symbol }} {{ item.price }} </p>
    <button v-if="item.quantity > item.min_quantity" class="buy"> Buy </button>
    <div class="no-stock" v-else> Out of stock </div>
  </div>
</div>
```

##### Simple items search sample
```html
<div class="_ecom-el" data-type="items" data-term="tshirt" data-size="24">
```

{% endraw %}
