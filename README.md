# testone
progetto di test basico

nothig to see, just some pratice with git bash


### API
The API will be listening from this URL `http://localhost:8889/api.php`.

The API has two endpoints:

1: `/search` (Example [http://localhost:8889/api.php/search](http://localhost:8889/api.php/search))

This will return the list of all cars available.

2: `/detail/{detailID}` (Example [http://localhost:8889/api.php/detail/616](http://localhost:8889/api.php/detail/616))

### Tests
phpUnit documentation [https://phpunit.de/manual/6.5/en/writing-tests-for-phpunit.html]

To run the tests use this command:

```
$ composer run test 
$ ./vendor/bin/phpunit --bootstrap vendor/autoload.php --testdox tests
```
