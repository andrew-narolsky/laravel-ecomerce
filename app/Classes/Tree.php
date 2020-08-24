<?php

namespace App\Classes;

class Tree
{
    public static function getTree($categories)
    {
        $tree = [];
        foreach ($categories as $id=>&$node) {
            if (!$node['parent_id'])
                $tree[$id] = &$node;
            else
                $categories[$node['parent_id']]['children'][$node['id']] = &$node;
        }
        return $tree;
    }

    public static function getIds($categories, $category_id)
    {
        $ids = [$category_id];

        foreach ($categories as $category) {

        if ($category['parent_id'] == $category_id)
            array_push($ids, $category['id']);
        }

        return $ids;
    }
}
