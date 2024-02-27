<?php

return [
    /* Documentation Menu Item Dynamic Sidebar
    
    Item Component:
    text,icon,url,header,submenu, role

    */

    'menu' => [
        [
            'text' => 'Dashboard',
            'url'  => 'dashboard',
            'icon' => 'ki-duotone ki-element-11 fs-2',
            'role' => 'All',
        ],
        [
            'header' => 'Pages',
            'role'   => 'Admin'
        ],
        [
            'text' => 'Master Data',
            'icon' => 'ki-duotone ki-abstract-28 fs-2',
            'role' => 'Admin',
            'submenu' => [
                [
                    'text' => 'Product',
                    'url'  => 'product',
                    'role' => 'Admin',
                ],
                [
                    'text' => 'Store',
                    'url'  => 'store',
                    'role' => 'Admin',
                ],
                [
                    'text' => 'Transaction',
                    'url'  => 'transaction',
                    'role' => 'Admin',
                ],
            ],
        ],
        [
            'text' => 'Users Management',
            'icon' => 'ki-duotone ki-abstract-28 fs-2',
            'role' => 'Admin',
            'submenu' => [
                [
                    'text' => 'Users',
                    'url'  => 'user',
                    'role' => 'Admin',
                ],
                [
                    'text' => 'Permissions',
                    'url'  => 'permission',
                    'role' => 'Admin',
                ],
                [
                    'text' => 'Roles',
                    'url'  => 'role',
                    'role' => 'Admin',
                ],
            ],
        ],
        [
            'text' => 'Purchesing',
            'icon' => 'ki-duotone ki-abstract-28 fs-2',
            'role' => 'All',
            'submenu' => [
                [
                    'text' => 'Menu',
                    'url'  => 'menu',
                    'role' => 'All',
                ],
                [
                    'text' => 'Orders',
                    'url'  => 'orders',
                    'role' => 'All',
                ],
            ],
        ],

        [
            'text' => 'Laporan',
            'url'  => 'laporan',
            'icon' => 'ki-duotone ki-element-11 fs-2',
            'role' => 'Admin',
        ],
    ],
];
