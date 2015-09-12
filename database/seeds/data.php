<?php
/**
 * @author: Vitaliy Ofat <v.ofat@lucky-labs.com>
 */

return [
    'admins' => [
        [
            'id' => 1,
            'email' => 'admin@lucky-survey.com',
            'password' => 'adminpass1'
        ],
        [
            'id' => 2,
            'email' => 'admin2@lucky-survey.com',
            'password' => 'adminpass2'
        ]
    ],
    'groups' => [
        [
            'id' => 1,
            'name' => 'All'
        ],
        [
            'id' => 2,
            'name' => 'ParisOffice'
        ],
        [
            'id' => 3,
            'name' => 'KievOffice'
        ],
        [
            'id' => 4,
            'name' => 'Developers'
        ]
    ],
    'admin_permissions' => [
        [
            'group_id' => 1,
            'admin_id' => 1
        ],
        [
            'group_id' => 2,
            'admin_id' => 1
        ],
        [
            'group_id' => 3,
            'admin_id' => 1
        ],
        [
            'group_id' => 4,
            'admin_id' => 1
        ],
        [
            'group_id' => 3,
            'admin_id' => 2
        ],
        [
            'group_id' => 4,
            'admin_id' => 2
        ]
    ],
    'users' => [
        [
            'id' => 1,
            'email' => 'johndoe@lucky-survey.com',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'head' => 'Bill Gates',
            'department' => 'Development',
            'position' => 'PHP Developer'
        ],
        [
            'id' => 2,
            'email' => 'susanna@lucky-survey.com',
            'first_name' => 'Susanna',
            'last_name' => 'Green',
            'head' => 'Bill Gates',
            'department' => 'Call Center',
            'position' => 'Support Manager'
        ],
        [
            'id' => 3,
            'email' => 'b.mark@lucky-survey.com',
            'first_name' => 'Mark',
            'last_name' => 'Brown',
            'head' => 'Steven Jobs',
            'department' => 'Marketing',
            'position' => 'Designer'
        ],
        [
            'id' => 4,
            'email' => 'r.green@lucky-survey.com',
            'first_name' => 'Rachel',
            'last_name' => 'Green',
            'head' => 'Steven Jobs',
            'department' => 'Marketing',
            'position' => 'Designer'
        ],
        [
            'id' => 5,
            'email' => 'v.ofat@lucky-labs.com',
            'first_name' => 'Vitalii',
            'last_name' => 'Ofat',
            'head' => 'Steven Jobs',
            'department' => 'Marketing',
            'position' => 'PHP Developer'
        ],
        [
            'id' => 6,
            'email' => 'k.sivkova@lucky-labs.com',
            'first_name' => 'Katerina',
            'last_name' => 'Sivkova',
            'head' => 'Steven Jobs',
            'department' => 'Marketing',
            'position' => 'Affiliate Manager'
        ],
    ],
    'user_groups' => [
        [
            'user_id' => 1,
            'group_id' => 1
        ],
        [
            'user_id' => 1,
            'group_id' => 2
        ],
        [
            'user_id' => 1,
            'group_id' => 4
        ],
        [
            'user_id' => 2,
            'group_id' => 1
        ],
        [
            'user_id' => 2,
            'group_id' => 2
        ],
        [
            'user_id' => 3,
            'group_id' => 1
        ],
        [
            'user_id' => 3,
            'group_id' => 3
        ],
        [
            'user_id' => 4,
            'group_id' => 1
        ],
        [
            'user_id' => 4,
            'group_id' => 3
        ],
        [
            'user_id' =>5,
            'group_id' => 1
        ],
        [
            'user_id' => 5,
            'group_id' => 3
        ],
        [
            'user_id' => 5,
            'group_id' => 4
        ],
        [
            'user_id' => 6,
            'group_id' => 1
        ],
        [
            'user_id' => 6,
            'group_id' => 3
        ],
    ]
];