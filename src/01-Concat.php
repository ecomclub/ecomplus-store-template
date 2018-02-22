<?php
// concat plugins to single JS file
// package version
$version = 0;
$files = array(
  // Vue 2
  'https://cdn.jsdelivr.net/npm/vue@2/dist/vue.min.js',
  // storefront SDK and render in current version
  'https://cdn.jsdelivr.net/npm/ecomplus-sdk/dist/sdk.min.js',
  'https://cdn.jsdelivr.net/npm/ecomplus-render/dist/render.min.js'
);
$content = '';
for ($i = 0; $i < count($files); $i++) {
  $content .= "/* -->> " . $files[$i] . " */\n" . file_get_contents($files[$i]) . "\n\n";
}
$dir = __DIR__ . '/storefront@' . $version;
if (!is_dir($dir)) {
  mkdir($dir);
}
file_put_contents($dir . '/app.min.js', $content);
