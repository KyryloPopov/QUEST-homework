<?php

return [
    '' => [
        'controller' => 'main',
        'action' => 'index',
    ],

    'conference/details/{id:\d+}' => [
        'controller' => 'conference',
        'action' => 'details',
    ],

    'conference/edit/{id:\d+}' => [
        'controller' => 'conference',
        'action' => 'edit',
    ],

    'conference/create' => [
        'controller' => 'conference',
        'action' => 'create',
    ],

    'conference/delete/{id:\d+}' => [
        'controller' => 'conference',
        'action' => 'delete',
    ],

];
