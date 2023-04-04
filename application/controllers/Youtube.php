<?php
class Youtube extends CI_Controller
{

    var $API = "",
        $LIST = "";

    function __construct()
    {
        parent::__construct();
        $this->API = "https://www.googleapis.com/youtube/v3/search?key=AIzaSyALdfa71Kmf-p6LgWyjPvgmtHbTLhtchq0&channelId=UCFytYxv0Xw4WnDTQUKfRQCg&maxResults=5&order=date&part=snippet";
        $this->load->library('session');
        //$this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
    }

    // menampilkan data kontak
    function index()
    {
        $data['datayoutube'] = json_decode($this->curl->simple_get($this->API), true);
        $this->load->view('youtube', $data);
    }
}
