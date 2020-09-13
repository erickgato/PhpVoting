<?php

namespace App\Controllers;

use App\Model\Survey as SurveyModel;
use App\Model\ResponseOptions;
use App\Model\Imodel;
use App\Model\Generics\Database as DatabaseInstance;

class Survey
{

    private Imodel $surveyModel;
    private Imodel $options;
    private Imodel $status;
    private DatabaseInstance $instance;

    public function __construct()
    {
        $this->instance = new DatabaseInstance();

        $this->surveyModel = new SurveyModel($this->instance);
        $this->options = new ResponseOptions($this->instance);
    }
    public function index()
    {
        $this->getPage();
    }
    public function getPage()
    {
        $surveys = $this->surveyModel->select(
            'Sur.sur_id, Sur.sur_name, usr.usr_name, stat.ss_name',null,false,
            "as Sur INNER JOIN en_survey_status as stat on (Sur.fk_status_id = stat.ss_id)  INNER JOIN en_user as usr on (Sur.fk_usr_id = usr.usr_id)"
        );
        include 'src/public/pages/browse.php';
    }
    public function store($data)
    {
        $this->insert($data['sur']['name'], $data['sur']['d_init'], $data['sur']['d_end'], $data['sur']['resp_options']);
    }
    private function insert(string $name, $init_date, $end_date, array $response_options)
    {
        $last_id = $this->surveyModel->insert([$name, 02, $init_date, $end_date, $_SESSION['USER']['id']]);
        if (is_int($last_id)) {
            foreach ($response_options as $option) {
                $this->options->insert([$last_id, $option, '0']);
            }
        }
        return $this->getPage();
    }
    public function registerPage()
    {
        return require 'src/public/pages/cadastrar_enquete.php';
    }
}
