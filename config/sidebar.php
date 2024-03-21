<?php

// return [
//     /* Documentation Menu Item Dynamic Sidebar

//     Item Component:
//     text,icon,url,header,submenu, role

//     */

//     'menu' => [
//         [
//             'text' => 'Dashboard',
//             'url'  => 'dashboard',
//             'icon' => 'ki-duotone ki-chart-pie-4 text-info fs-2',
//             'role' => 'Superadmin|Admin',
//         ],
//         [
//             'header' => 'Pages',
//             'role'   => 'Superadmin|Admin'
//         ],
//         [
//             'text' => 'Master Data',
//             'icon' => 'ki-duotone ki-code text-success fs-2',
//             'role' => 'Superadmin|Admin|Product-Manegement',
//             'submenu' => [
//                 [
//                     'text' => 'Product',
//                     'url'  => 'product',
//                     'role' => 'Superadmin|Admin|Product-Manegement',
//                 ],
//                 [
//                     'text' => 'Store',
//                     'url'  => 'store',
//                     'role' => 'Superadmin|Admin|Product-Manegement',
//                 ],
//                 [
//                     'text' => 'Transaction',
//                     'url'  => 'transaction',
//                     'role' => 'Superadmin|Admin|Product-Manegement',
//                 ],
//             ],
//         ],
//         [
//             'text' => 'Users Management',
//             'icon' => 'ki-duotone ki-security-user text-danger fs-2',
//             'role' => 'Superadmin|Admin',
//             'submenu' => [
//                 [
//                     'text' => 'Users',
//                     'url'  => 'user',
//                     'role' => 'Superadmin|Admin',
//                 ],
//                 [
//                     'text' => 'Permissions',
//                     'url'  => 'permission',
//                     'role' => 'Superadmin|Admin',
//                 ],
//                 [
//                     'text' => 'Roles',
//                     'url'  => 'role',
//                     'role' => 'Superadmin|Admin',
//                 ],
//             ],
//         ],
//         [
//             'text' => 'Purchase',
//             'icon' => 'ki-duotone ki-finance-calculator text-primary fs-2',
//             'role' => 'Superadmin|Admin|User',
//             'submenu' => [
//                 [
//                     'text' => 'Menu',
//                     'url'  => 'menu',
//                     'role' => 'Superadmin|Admin|User',
//                 ],
//                 [
//                     'text' => 'Orders',
//                     'url'  => 'orders',
//                     'role' => 'Superadmin|Admin|User',
//                 ],
//             ],
//         ],
//         [
//             'text' => 'Laporan',
//             'icon' => 'ki-duotone ki-calendar text-warning fs-2',
//             'role' => 'Superadmin|Admin',
//             'submenu' => [
//                 [
//                     'text' => 'All Orders',
//                     'url'  => 'laporan',
//                     'role' => 'Superadmin|Admin',
//                 ],
//                 [
//                     'text' => 'Stok Report',
//                     'url'  => 'stok-report',
//                     'role' => 'Superadmin|Admin',
//                 ],
//             ],
//         ],

//     ],
// ];
return [
    /* Documentation Menu Item Dynamic Sidebar
    
    Item Component:
    text,icon,url,header,submenu, role

    */

    'menu' => [
        [
            'text' => 'Dashboard',
            'url'  => 'dashboard',
            'icon' => 'ki-duotone ki-chart-pie-4 text-info fs-2',
            'permission' => 'dashboard-view',
        ],
        [
            'text' => 'Master Data',
            'icon' => 'ki-duotone ki-code text-success fs-2',
            'permission' => 'master-data-view',
            'submenu' => [
                [
                    'text' => 'Product',
                    'url'  => 'product',
                    'permission' => 'product-list',

                ],
                [
                    'text' => 'Store',
                    'url'  => 'store',
                    'permission' => 'store-list',

                ],
                [
                    'text' => 'Transaction',
                    'url'  => 'transaction',
                    'permission' => 'transaction-list',

                ],
            ],
        ],
        [
            'text' => 'Users Management',
            'icon' => 'ki-duotone ki-security-user text-danger fs-2',
            'permission' => 'userManegement-list',
            'submenu' => [
                [
                    'text' => 'Users',
                    'url'  => 'user',
                    'permission' => 'user-list',

                ],
                [
                    'text' => 'Permissions',
                    'url'  => 'permission',
                    'permission' => 'permission-list',

                ],
                [
                    'text' => 'Roles',
                    'url'  => 'role',
                    'permission' => 'role-list',

                ],
            ],
        ],
        [
            'text' => 'Purchase',
            'icon' => 'ki-duotone ki-finance-calculator text-primary fs-2',
            'permission' => 'menuView-list',
            'submenu' => [
                [
                    'text' => 'Menu',
                    'url'  => 'menu',
                    'permission' => 'menuView-list',
                ],
                [
                    'text' => 'Orders',
                    'url'  => 'orders',
                    'permission' => 'menuView-list',
                ],
            ],
        ],
        [
            'text' => 'Laporan',
            'icon' => 'ki-duotone ki-calendar text-warning fs-2',
            'permission' => 'laporan-list',
            'submenu' => [
                [
                    'text' => 'All Orders',
                    'url'  => 'laporan',
                    'permission' => 'laporan-list',
                ],
                [
                    'text' => 'Stok Report',
                    'url'  => 'stok-report',
                    'permission' => 'stokReport-list',
                ],
            ],
        ],

    ],
];
