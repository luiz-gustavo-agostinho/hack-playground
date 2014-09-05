<?hh

if (isset($_SERVER['SERVER_SOFTWARE'])) {
    define('NL', '<br>');
} else {
    define('NL', PHP_EOL);
}

echo "With Async" . NL;

// based on https://gist.github.com/cburgdorf/9713936
async function sleepAndEchoAsync(int $seconds, string $echo) {
  // sleep asynchronously -- let other async functions do their job
  await SleepWaitHandle::create($seconds * 1000000);
  echo $echo . NL;
}
 
async function run() {
  $first  = sleepAndEchoAsync(3, 'First');
  $second = sleepAndEchoAsync(1, 'Second');

  // wait for both dependencies
  await GenArrayWaitHandle::create(array($first, $second));
}

$start = microtime(true); 
run()->join();
echo 'took: ' . number_format(microtime(true) - $start, 2) . ' seconds';

echo NL . NL;

echo "Without Async" . NL;

function sleepAndEcho(int $seconds, string $echo) {
    sleep($seconds);
    echo $echo . NL;
}

$start = microtime(true);
sleepAndEcho(3, 'First');
sleepAndEcho(1, 'Second');
echo 'took: ' . number_format(microtime(true) - $start, 2) . ' seconds';

echo NL;