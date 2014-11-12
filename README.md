LESS-to-SCSS
============

LESS dosyalarını SCSS dosyalarına çeviren fonksiyondur.
Tam olarak test edilmedi, dileyen istediği gibi geliştirebilir.
Kullandıkça farkedilen eksiklikler giderilecektir.

Örnek Kullanım
============

```php
<?php
require 'less_to_scss.php';
$file = dirname(__DIR__) . '/assets/less/custom.less';
$output = less_to_scss($file);
echo $output;
```
