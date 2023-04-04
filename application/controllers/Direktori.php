<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Direktori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('News_model', 'news');
        $this->load->model('Direktori_model', 'direktori');
        $this->load->library(array('googlemaps', 'session'));
    }

    //public function index()
    //{
    //$data['pengumuman'] = $this->pengumuman->get_pengumuman();
    //  $this->load->view('balad/v_direktori');
    //}
    public function view($id = false)
    {
        if ($id) {
            $data['direktori'] = $this->direktori->get_lokasi_by_direktori($id);
            $data['kategori'] = $this->direktori->get_direktori($id);
            $data['menu'] = $this->direktori->get_direktori();

            if ($data['kategori']['id']) {
                $data['title'] = $data['kategori']['nama'];
                $data['allnews'] = $this->news->getPosts();
                $this->load->view('anoalinux/v_direktori', $data);
            } else show_404();
        } else {
            redirect(base_url());
        }
    }

    public function peta($id = false)
    {
        $data['title'] = "GIS Kendari";
        $data['menu'] = $this->direktori->get_direktori();
        $data['allnews'] = $this->news->getPosts();
        $config['center'] = '-3.998463,122.512495';
        $config['zoom'] = 'auto';
        $config['styles'] = array(
            array(
                "name" => "No Businesses",
                "definition" => array(
                    array(
                        "featureType" => "poi",
                        "elementType" =>
                        "business",
                        "stylers" => array(
                            array(
                                "visibility" => "on"
                            )
                        )
                    )
                )
            )
        );
        $this->googlemaps->initialize($config);

        if (!$id == false) {
            $peta = $this->direktori->get_lokasi_by_direktori($id);
            foreach ($peta as $key => $value) :
                $marker = array();
                $marker['position'] = "{$value['latitude']}, {$value['longitude']}";

                $marker['animation'] = 'DROP';
                $marker['infowindow_content'] = '<div class="card bg-light mb-3" style="max-width: 18rem;">';
                //$marker['infowindow_content'] .= '<div class="media-left">';
                //$marker['infowindow_content'] .= '<img src="' . base_url("public/image/{$value->photo}") . '" class="media-object" style="width:150px">';
                //$marker['infowindow_content'] .= '</div>';
                //$marker['infowindow_content'] .= '<div class="media-body">';
                $marker['infowindow_content'] .= '<div class="card-header mb-3"><h6>' . $value['nama_lokasi'] . '</h6></div>';
                $marker['infowindow_content'] .= '<div class="card-body">';
                $marker['infowindow_content'] .= '<p class="card-text">' . $value['alamat'] . '</p>';
                $marker['infowindow_content'] .= '<p class="card-title">No. Telp : ' . $value['telp'] . '</p>';
                //$marker['infowindow_content'] .= '<h5 class="media-heading">' . $value['nama_lokasi'] . '</h5>';
                //$marker['infowindow_content'] .= '<p><strong>' . $value['alamat'] . '</strong></p>';
                // $marker['infowindow_content'] .= '<p>' . $value['telp'] . '</p>';
                $marker['infowindow_content'] .= '</div>';
                $marker['infowindow_content'] .= '</div>';
                $marker['icon'] = base_url("assets/img/icon/") . $value['icon'] . '.png';
                $this->googlemaps->add_marker($marker);
            endforeach;

            $this->googlemaps->initialize($config);

            $data['map'] = $this->googlemaps->create_map();
            $this->load->view('anoalinux/peta', $data);
        } else {
            $peta = $this->direktori->get_lokasi_direktori();
            foreach ($peta as $key => $value) :
                $marker = array();
                $marker['position'] = "{$value['latitude']}, {$value['longitude']}";

                $marker['animation'] = 'DROP';
                $marker['infowindow_content'] = '<div class="media" style="width:400px;">';
                $marker['infowindow_content'] .= '<div class="media-left">';
                //$marker['infowindow_content'] .= '<img src="' . base_url("public/image/{$value->photo}") . '" class="media-object" style="width:150px">';
                $marker['infowindow_content'] .= '</div>';
                $marker['infowindow_content'] .= '<div class="media-body">';
                $marker['infowindow_content'] .= '<h5 class="media-heading">' . $value['nama_lokasi'] . '</h5>';
                $marker['infowindow_content'] .= '<p><strong>' . $value['alamat'] . '</strong></p>';
                $marker['infowindow_content'] .= '<p>' . $value['telp'] . '</p>';
                $marker['infowindow_content'] .= '</div>';
                $marker['infowindow_content'] .= '</div>';
                $marker['icon'] = base_url("assets/img/icon/") . $value['icon'] . '.png';
                $this->googlemaps->add_marker($marker);
            endforeach;

            $this->googlemaps->initialize($config);

            $data['map'] = $this->googlemaps->create_map();
            $this->load->view('anoalinux/peta', $data);
        }
    }
}
