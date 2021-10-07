<?php

declare(strict_types=1);

function catalogGetCategory(): array
{
    return [
        1 => [
            'category_id' => 1,
            'name' => 'Sport',
            'url' => 'sport',
            'posts' => [1, 2, 3]
        ],
        2 => [
            'category_id' => 2,
            'name' => 'Politics',
            'url' => 'politics',
            'posts' => [4, 5, 6]
        ],
        3 => [
            'category_id' => 3,
            'name' => 'IT',
            'url' => 'it',
            'posts' => [7, 8, 9]
        ],
    ];
}

function catalogGetPost(): array
{
    return [
        1 => [
            'product_id' => 1,
            'name' => 'Post 1',
            'author_name' => 'John Doe',
            'url' => 'post-1',
            'description' => 'Post 1 Description',
            'date' => '31.10.2011'
        ],
        2 => [
            'product_id' => 2,
            'name' => 'Post 2',
            'author_name' => 'John Doe',
            'url' => 'post-2',
            'description' => 'Post 2 Description',
            'date' => '31.10.2012'
        ],
        3 => [
            'product_id' => 3,
            'name' => 'Post 3',
            'author_name' => 'John Doe',
            'url' => 'post-3',
            'description' => 'Post 3 Description',
            'date' => '31.10.2013'
        ],
        4 => [
            'product_id' => 4,
            'name' => 'Post 4',
            'author_name' => 'John Doe',
            'url' => 'post-4',
            'description' => 'Post 4 Description',
            'date' => '31.10.2014'
        ],
        5 => [
            'product_id' => 5,
            'name' => 'Post 5',
            'author_name' => 'John Doe',
            'url' => 'post-5',
            'description' => 'Post 5 Description',
            'date' => '31.10.2015'
        ],
        6 => [
            'product_id' => 6,
            'name' => 'Post 6',
            'author_name' => 'John Doe',
            'url' => 'post-6',
            'description' => 'Post 6 Description',
            'date' => '31.10.2016'
        ],
        7 => [
            'product_id' => 7,
            'name' => 'Post 7',
            'author_name' => 'John Doe',
            'url' => 'post-7',
            'description' => 'Post 7 Description',
            'date' => '31.10.2017'
        ],
        8 => [
            'product_id' => 8,
            'name' => 'Post 8',
            'author_name' => 'John Doe',
            'url' => 'post-8',
            'description' => 'Post 8 Description',
            'date' => '31.10.2018'
        ],
        9 => [
            'product_id' => 9,
            'name' => 'Post 9',
            'author_name' => 'John Doe',
            'url' => 'post-9',
            'description' => 'Post 9 Description',
            'date' => '31.10.2019'
        ],
    ];
}

function catalogGetCategoryPost(int $categoryId): array
{
    $categories = catalogGetCategory();
    if (!isset($categories[$categoryId])) {
        throw new InvalidArgumentException("Category with ID: $categoryId does not exist");
    }

    $postsForCategory = [];
    $posts = catalogGetPost();

    foreach ($categories[$categoryId]['posts'] as $postId) {
        if (!isset($posts[$postId])) {
            throw new InvalidArgumentException("Post with ID: $postId from category: $categoryId does not exist");
        }
        $postsForCategory[] = $posts[$postId];
    }
    return $postsForCategory;
}

function catalogGetCategoryByUrl(string $url): ?array
{
    $data = array_filter(
        catalogGetCategory(),
        static function ($category) use ($url) {
            return $category['url'] === $url;
        }
    );

    return array_pop($data);
}

function catalogGetPostByUrl(string $url): ?array
{
    $data = array_filter(
        catalogGetPost(),
        static function ($post) use ($url) {
            return $post['url'] === $url;
        }
    );

    return array_pop($data);
}
