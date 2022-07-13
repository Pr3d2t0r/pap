<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UploadFiles
{
    private $name;
    private $uploadPath;
    private $ci;
    private $options;
    private $calls;

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
        $config['upload_path'] = '../resources/images' . (!empty($this->uploadPath) ? "/" . $this->uploadPath : "");
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['max_size'] = '51120'; //Kb
        $config['encrypt_name'] = true;

        if (!is_dir($config['upload_path']))
            mkdir($config['upload_path'], 0777);

        //TODO: Máximo de 10 (configuração) ficheiro(s) em caso que sejam múltiplos
        if (!empty($_FILES[$this->name]['name']) && count(array_filter($_FILES[$this->name]['name'])) > 0) {
            $files = [];

            $filesCount = count($_FILES[$this->name]['name']);
            for ($i = 0; $i < $filesCount; $i++) {
                $_FILES['file']['name'] = $_FILES[$this->name]['name'][$i];
                $_FILES['file']['type'] = $_FILES[$this->name]['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES[$this->name]['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES[$this->name]['error'][$i];
                $_FILES['file']['size'] = $_FILES[$this->name]['size'][$i];

                $this->ci->upload->initialize($config);

                if (!$this->ci->upload->do_upload('file')) {
                    $data['error'] = true;
                    $data['info'] = $this->ci->upload->display_errors();
                } else {
                    $data['error'] = false;

                    $infoUpload = $this->ci->upload->data();

                    $files[] = $infoUpload['file_name'];

                    //realiza as opções da primeira imagem enviada
                    foreach ($this->calls as $type => $call)
                        if ($i == 0)
                            $this->options[$type]($infoUpload);
                }
            }
            $data["files"] = $files;

            return $data;
        }
        return [
            "error" => false,
            "empty" => true
        ];
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