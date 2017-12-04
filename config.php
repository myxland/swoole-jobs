<?php

/*
 * This file is part of PHP CS Fixer.
 * (c) kcloze <pei.greet@qq.com>
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

return $config = [
    //log目录
    'logPath'      => __DIR__ . '/log',
    'pidPath'      => __DIR__ . '/log',
    //'workerNum'    => 5, // 工作进程数, 默认值 5
    'usleep'       => 10000, //每次topic消费完之后停留毫秒数，线上环境不能过大
    'processName'  => ':swooleTopicQueue', // 设置进程名, 方便管理, 默认值 swooleTopicQueue
    //job任务相关
    'job'         => [
        'topics'  => [
            ['name'=>'MyJob', 'workerNum'=>1],
            ['name'=> 'MyJob2', 'workerNum'=>3],
            ['name'=> 'MyJob3', 'workerNum'=>1],
        ],
        'queue'   => [
            'type' => 'redis',
            'host' => '127.0.0.1',
            'port' => 6379,
        ],
   ],
   //框架类型及装载类
   'framework' => [
       'type' => 'swoole-jobs',
       //可以自定义，但是该类必须继承\Kcloze\Jobs\Action\BaseAction
       'class'=> 'Kcloze\Jobs\Action\SwooleJobsAction',

   ],

];
