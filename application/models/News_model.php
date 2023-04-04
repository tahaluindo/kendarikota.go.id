<?php

use GuzzleHttp\Client;

class News_model extends CI_Model
{

    public function __construct()
    { }


    public function getPosts()
    {
        $client = new Client();
        $response = $client->request('GET', 'http://www.kendarikota.go.id/berita/wp-json/wp/v2/posts/', [
            'query' => ['offset' => 0]

        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function getPostBySlug($slug = false)
    {
        $client = new Client();
        if ($slug == false) {

            show_404();
        } else {

            $response = $client->request('GET', 'http://detiksultra.com/api/get_post/', [
                'query' => ['slug' => $slug]
            ]);
            return json_decode($response->getBody()->getContents(), true);
        }
    }

    public function getPostByCategory()
    {
        $client = new Client();
        $response = $client->request('GET', 'http://detiksultra.com/api/get_category_posts/', [
            'query' => ['slug' => 'headline']

        ]);
        return json_decode($response->getBody()->getContents(), true);
    }
    public function getPostByTopikPilihan()
    {
        $client = new Client();
        $response = $client->request('GET', 'http://detiksultra.com/api/get_category_posts/', [
            'query' => ['slug' => 'berita-pilihan']

        ]);
        return json_decode($response->getBody()->getContents(), true);
    }
}
