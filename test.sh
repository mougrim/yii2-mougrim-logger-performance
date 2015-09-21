#!/usr/bin/env bash
rm /home/sites/yii2-mougrim-logger-performance/*;
for test in yii-logger mougrim-logger
do
    for config in ./${test}*
    do
        testFile="./${test}.php";
        if [ ${config} ==  ${testFile} ]
        then
            continue
        fi
        echo "Run: ${testFile} ${config}";
        for i in {1..10}
        do
            php ${testFile} ${config};
            sleep 1;
        done
    done
done
