<?php
$file = new \SplFileObject($argv[1]);
$data = [];
$test = null;
while (!$file->eof()) {
    $row = trim($file->fgets());
    if (!$row) {
        continue;
    }
    if (!is_numeric($row)) {
        $test = $row;
        continue;
    } elseif ($test === null) {
        throw new \RuntimeException("Can't process result file '{$argv[1]}': test not passed");
    }
    $value = (float)$row;

    $data[$test][] = $value;
}

$averageResults = [];
foreach ($data as $test => $results) {
    sort($results);
    $previousResult = null;
    $resultsQty = count($results);
    for ($i = 0; $i < $resultsQty; $i++) {
        foreach ($results as $resultNumber => $result) {
            if ($previousResult === null) {
                $previousResult       = $result;
                $previousResultNumber = $resultNumber;
                continue;
            }
            if ($previousResult / $result < .95) {
                if ($resultNumber / count($results) < .5) {
                    unset($results[$previousResultNumber]);
                    $previousResultNumber = $resultNumber;
                    $previousResult       = $result;
                } else {
                    unset($results[$resultNumber]);
                }
            } else {
                $previousResultNumber = $resultNumber;
                $previousResult       = $result;
            }
        }
    }
    $averageResults[$test] = array_sum($results) / count($results);
    echo "Average result for {$test}:\t{$averageResults[$test]}\n";
}
