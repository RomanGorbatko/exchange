
# Exchange


Доступны следующие источники:

  - Google
  - Yahoo

# Пример

```php
use RG\Exchange;

try {
    echo Exchange::getProvider('google')->convert('USD', 'UAH', 800.00);
} catch (\Exception $exception) {
    echo 'Error: ' . $exception->getMessage();
}
```