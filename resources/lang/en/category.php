<?php
return [
    'admin' => [
        'title' => 'Category',
        'title_list' => 'Categories list',
        'table' => [
            'id' => 'ID',
            'name' => 'Name',
            'parent_id' => 'Parent ID',
            'view_children' => 'View sub Categories',
            'show' => 'Show',
            'action' => 'Action',
            'child_category' => 'Child Category',
            'edit' => 'Edit',
            'delete' => 'Delete'
        ],
        'add' => [
            'title' => 'Add category',
            'name' => 'Name Category',
            'parent_category' => 'Parent Category',
            'submit' => 'Submit',
            'reset' => 'Reset',
            'placeholder_name' => 'Category Name',
            'create' => 'Create Category'
        ],
        'edit' => [
            'title' => 'Edit Category',
        ],
        'show' => [
            'title' => 'Show Category',
        ],
        'message' => [
            'add' => 'Created New Category Successfully!',
            'add_fail' => 'Can not add New Category. Please check connect database!',
            'edit' => 'Updated Category Successfully!',
            'edit_fail' => 'Can not edit Category by this Child!',
            'del' => 'Deleted Category Successfully!',
            'del_fail' => 'Can not Delete Category. Please check connect database!',
            'del_no_permit' => 'Can not delete this Category! There are sub Categories that exist in this category',
            'del_no_permit2' => 'Can not delete this Category! There are products that exist in this category',
            'msg_del' => 'Are you sure you want to delete this Category?',
        ]
    
    ]
];
