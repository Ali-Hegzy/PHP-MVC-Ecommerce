run: 
	sudo /opt/lampp/lampp start && php -S localhost:8000 -t public
test-functions:
	./vendor/bin/phpunit tests/FunctionsTest.php