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
$file = file_get_contents(dirname(__DIR__) . '/assets/less/custom.less');
$output = Convert::less_to_css($file);
echo $output;
```
