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
            'icon' => 'ki-duotone ki-chart-pie-4 fs-2',
            'role' => 'All',
        ],
        [
            'header' => 'Pages',
            'role'   => 'Admin'
        ],
        [
            'text' => 'Master Data',
            'icon' => 'ki-duotone ki-code text-success fs-2',
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
            'icon' => 'ki-duotone ki-security-user  fs-2',
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
            'text' => 'Purchase',
            'icon' => 'ki-duotone ki-finance-calculator text-primary fs-2',
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
            'icon' => 'ki-duotone ki-calendar text-warning fs-2',
            'role' => 'Admin',
            'submenu' => [
                [
                    'text' => 'All Orders',
                    'url'  => 'laporan',
                    'role' => 'Admin',
                ],
                [
                    'text' => 'Stok Report',
                    'url'  => 'stok-report',
                    'role' => 'Admin',
                ],
            ],
        ],

    ],
];
