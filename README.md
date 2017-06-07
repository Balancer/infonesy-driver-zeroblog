## Тесты:

```php
require __DIR__.'/../vendor/autoload.php';

$zeroblog_storage = \Infonesy\Drivers\ZeroBlogStorage::factory("/home/balancer/src/ZeroNet-master/data/1AdhUSJLmpUE7Aq5nPBkUuxgcWaUfqtS84");

foreach($zeroblog_storage->load_array(\Infonesy\Drivers\ZeroBlog::class, []) as $record)
{
	dump($record->data, $record->infonesy_uuid());
}
```
