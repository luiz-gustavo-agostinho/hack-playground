<?hh

function hello(string $who): string {
  return 'Hello, ' . $who . "!\n";
}

echo hello('World');

require 'index.php';