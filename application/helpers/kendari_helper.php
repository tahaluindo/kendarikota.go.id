<?php

function is_logged_in()
{
    $ci = get_instance();

    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['id'];
        $userAccess = $ci->db->get_where('user_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);

        // if ($userAccess->num_rows() < 1) {
        //   redirect('auth/blocked');
        // }
    }
}
function site_name()
{
    $ci = get_instance();
    $ci->load->model('Setting_model', 'setting');
    $data = $ci->setting->option();
    echo $data['site_name'];
}

function site_description()
{
    $ci = get_instance();
    $ci->load->model('Setting_model', 'setting');
    $data = $ci->setting->option();
    echo $data['site_description'];
}

function site_copyright()
{
    $ci = get_instance();
    $ci->load->model('Setting_model', 'setting');
    $data = $ci->setting->option();
    echo $data['site_copyright'];
}

function site_logo()
{
    $ci = get_instance();
    $ci->load->model('Setting_model', 'setting');
    $data = $ci->setting->option();
    echo $data['site_logo'];
}

function site_favicon()
{
    $ci = get_instance();
    $ci->load->model('Setting_model', 'setting');
    $data = $ci->setting->option();
    echo $data['site_favicon'];
}

function site_ads()
{
    $ci = get_instance();
    $ci->load->model('Setting_model', 'setting');
    $data = $ci->setting->option();
    $banner = $data['site_ads'];
    echo "<img class='rounded' width=100% src='" . base_url('assets/img/banner/') . $banner . "'>";
}

function content_ad($isiberita)
{
    $ads = '<img class="mb-2" src="https://s.adroll.com/a/2UZ/MWM/2UZMWMGJIRGE3OLNM7EWLJ.jpg">';
    $content = $isiberita;
    $berita = explode('</p>', $content);
    if (count($berita) >= 3) {
        $berita[3] = $ads . $berita[3];
        $content = implode("</p>", $berita);
        echo ($content);
    } else echo $content;
}
