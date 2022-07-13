<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UploadFile
{
    private $name;
    private $uploadPath;
    private $ci;
    private $options;

    public function __construct($name, $uploadPath = "", $options=[])
    {
        $this->name = $name;
        $this->uploadPath = $uploadPath;
        $this->calls = $options;
        $this->ci = &get_instance();
        $this->ci->load->library([
            'image_lib', 'upload'
        ]);

        $this->options = [
            "dimen" => function (&$data) {
                $configResize['source_image'] = $data['full_path'];
                $configResize['maintain_ratio'] = $this->calls["dimen"]['ratio'];
                $configResize['width'] = $this->calls["dimen"]['width'];
                $configResize['height'] = $this->calls["dimen"]['height'];
                $configResize['image_library'] = 'gd2';
                $configResize['create_thumb'] = FALSE;
                $configResize['new_image'] = '../resources/images/' . (!empty($this->uploadPath) ? $this->uploadPath . "/" : "") .'resized';

                $resize = $this->act($configResize, "resize");

                if (!$resize['status']) {
                    $data['info'] .= "<br/>Não foi possível redimensionar a imagem devido ao(s) erro(s) abaixo:<br />";
                    $data['info'] .= $resize['message'];
                } else {
                    $data['resize_path'] = $data['file_path'] . "/resized/" . $data['raw_name'] . $data['file_ext'];
                }
            },
            "thumbnail" => function (&$data) {
                $configThumbnail['source_image'] = $data['full_path'];
                $configThumbnail['maintain_ratio'] = true;

                $configThumbnail['width'] = 75;
                $configThumbnail['height'] = 50;

                $configThumbnail['image_library'] = 'gd2';
                $configThumbnail['create_thumb'] = true;
                $configThumbnail['new_image'] = '../resources/images/' . (!empty($this->uploadPath) ? $this->uploadPath . "/" : "") . 'thumbs';

                $thumbnail = $this->act($configThumbnail, "resize");

                if (!$thumbnail['status']) {
                    $data['info'] = "<br />Não foi possível gerar o thumbnail devido ao(s) error(s) abaixo<br />";
                    $data['info'] .= $thumbnail['message'];
                } else {
                    $data['thumb_path'] = $data['file_path']
                        . 'thumbs/' . $data['raw_name'] . $data['file_ext'];
                }

                return $data;
            }
        ];
    }

    public function upload()
    {
        $config['upload_path'] = './resources/images' . (!empty($this->uploadPath) ? "/" . $this->uploadPath : "");
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['max_size'] = '51120'; //Kb
        $config['encrypt_name'] = true;

        if (!is_dir($config['upload_path']))
            mkdir($config['upload_path'], 0777);

        $file = "";

        $this->ci->upload->initialize($config);

        if (!$this->ci->upload->do_upload($this->name)) {
            $data['error'] = true;
            $data['info'] = $this->ci->upload->display_errors();
        } else {
            $data['error'] = false;

            $infoUpload = $this->ci->upload->data();

            $file = '/resources/images/' . (!empty($this->uploadPath) ? $this->uploadPath . "/" : "") . $infoUpload['file_name'];

            $data["file"] = $infoUpload['file_name'];
            foreach ($this->calls as $type => $call)
                $this->options[$type]($infoUpload);
        }

        return $data;

    }

    private final function act($config, $action)
    {
        $this->ci->image_lib->initialize($config);

        if (!$this->ci->image_lib->{$action}()) {
            $data['message'] = $this->ci->image_lib->display_errors();
            $data['status'] = false;
        } else {
            $data['message'] = null;
            $data['status'] = true;
        }

        $this->ci->image_lib->clear();
        return $data;
    }
}