<?php
// concat plugins to single JS file
// package version
$version = 2;
$files = array(
  // Vue 2
  'https://cdn.jsdelivr.net/npm/vue@2/dist/vue.min.js',
  // storefront SDK and render in current version
  'https://cdn.jsdelivr.net/npm/ecomplus-sdk@1.13.1/dist/sdk.min.js',
  'https://cdn.jsdelivr.net/npm/ecomplus-render@2.8.4/dist/render.min.js'
);

// start with polyfill script
$content = file_get_contents(__DIR__ . '/Polyfill.min.js');
for ($i = 0; $i < count($files); $i++) {
  $js = file_get_contents($files[$i]);
  $content .= <<<EOT

/*!
 * From {$files[$i]}
 */
$js
EOT;
}
$dir = __DIR__ . '/storefront@' . $version;
if (!is_dir($dir)) {
  mkdir($dir);
}
file_put_contents($dir . '/storefront.min.js', $content);
