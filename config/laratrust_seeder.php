<?php

return [
    'role_structure' => [
        'administrator' => [
            'users' => 'c,r,u,d',
            'acl' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'director' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'manager' => [
            'profile' => 'r,u'
        ],
        'employee' => [
            'profile' => 'r,u'
        ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
