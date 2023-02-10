<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Auth_model");
        $this->load->model("Admin_model");
        $this->load->library('upload');
    }
    public function activate_season()
    {
        $id = $this->uri->segment(3);
        $result = $this->Admin_model->activateSeason($id);
        if ($result) {
            $this->session->set_flashdata('msg', "Record Updated Successfully");
            redirect('welcome/home', 'refresh');
        }
    }
    public function reg_team()
    {
        $filename = $_FILES['team_logo']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $team_logo = hash('md5', date('hismy') . $filename) . "." . $ext;
        $config = array(
            'upload_path' => './assets/uploads/', 'max_size' => 200000, 'allowed_types' => 'png|PNG|jpg|JPG', 'file_name' => $team_logo
        );

        $this->upload->initialize($config);
        $this->upload->do_upload('team_logo');
        if ($this->upload->display_errors()) {
            $this->session->set_flashdata('msg', $this->upload->display_errors());
            redirect('welcome/home', 'refresh');
        } else {
            $data = $_POST;
            $data["coach_passport"] = $team_logo;
            $result = $this->Admin_model->save_team_data($data);
            if ($result) {
                $this->session->set_flashdata('msg', "Team Register successfully");
                redirect('welcome/home', 'refresh');
            }
        }
    }
    public function get_team_info()
    {
        $id = $this->uri->segment(3);
        $data['result'] = $this->Admin_model->get_team($id);
        $this->load->view('admin/team_info', $data);
    }
    public function update_team()
    {
        $result = $this->Admin_model->updateTeam($_POST);
        if ($result) {
            $this->session->set_flashdata('msg', "Team record updated successfully");
            redirect('welcome/home', 'refresh');
        }
    }
    public function reg_to_league()
    {
        $leagueid = $this->input->post('leagueid');


        if (strlen($leagueid) == 2) {
            $group = $leagueid[1];
            $leagueid = $leagueid[0];
            $teamid = $this->input->post('teamid');
            $seasonid = $this->input->post('seasonid');
            $data = array("groop" => $group, "leagueid" => $leagueid, "teamid" => $teamid, "seasonid" => $seasonid);
            $flag = $this->Admin_model->checkTeam($teamid, $seasonid, $leagueid);
            if ($flag) {
                $this->session->set_flashdata('msg', "Record Already Exist");
                redirect('welcome/home', 'refresh');
            } else {
                $result = $this->Admin_model->save_team_to_table($data);
                if ($result) {
                    $this->session->set_flashdata('msg', "Team Added successfully");
                    redirect('welcome/home', 'refresh');
                }
            }
        } else {
            $leagueid = $this->input->post('leagueid');
            $teamid = $this->input->post('teamid');
            $seasonid = $this->input->post('seasonid');
            $group = "";
            $data = array("groop" => $group, "leagueid" => $leagueid, "teamid" => $teamid, "seasonid" => $seasonid);
            $flag = $this->Admin_model->checkTeam($teamid, $seasonid, $leagueid);
            if ($flag) {
                $this->session->set_flashdata('msg', "Record Already Exist");
                redirect('welcome/home', 'refresh');
            } else {
                $result = $this->Admin_model->save_team_to_table($data);
                if ($result) {
                    $this->session->set_flashdata('msg', "Team record updated successfully");
                    redirect('welcome/home', 'refresh');
                }
            }
        }
    }
    public function saveFixture()
    {
        $h = strpos($this->input->post('homeTeamId'), "-");
        $a = strpos($this->input->post('awayTeamId'), "-");
        $homeTeamId = substr($this->input->post('homeTeamId'), 0, $h);
        $awayTeamId = substr($this->input->post('awayTeamId'), 0, $a);
        $homeTeam = substr($this->input->post('homeTeamId'), $h + 1);
        $awayTeam = substr($this->input->post('awayTeamId'),  $a + 1);

        $data = array(
            'seasonid' => $this->input->post('seasonid'),
            'date' => $this->input->post('date'),
            'venue' => $this->input->post('venue'),
            'time' => $this->input->post('time'),
            'leagueid' => $this->input->post('leagueid'),
            'homeTeamId' => $homeTeamId,
            'awayTeamId' => $awayTeamId,
            'homeTeam' => $homeTeam,
            'awayTeam' => $awayTeam,
            'round'=> $this->input->post('round')
        );
        $result = $this->Admin_model->save_fixture($data);
        if ($result) {
            $this->session->set_flashdata('msg', "Fixture Saved Successfully");
            redirect('welcome/home', 'refresh');
        }
    }
    public function manage_fixtures()
    {
        $data['tbl'] = $this->Admin_model->prepareTable();
        $data['fix'] = $this->Admin_model->get_fixtures();
        $this->load->view("admin/manage_fixtures", $data);
    }
    public function manage_fa_fixture()
    {
        $data['tbl'] = $this->Admin_model->prepareTable();
        $data['fix'] = $this->Admin_model->get_fa_fixtures();
        $this->load->view("admin/manage_fa_fixtures", $data);
    }
    public function manage_champion_fixture()
    {
        $data['tbl'] = $this->Admin_model->prepare_group_a_table();
        $data['tbl2'] = $this->Admin_model->prepare_group_b_table();
        $data['fix'] = $this->Admin_model->get_champion_fixtures();
        $this->load->view("admin/manage_champion_fixtures", $data);
    }
    public function update_fixtures()
    {
        $id = $this->uri->segment(3);
        $data['row'] = $this->Admin_model->get_fix($id);
        $this->load->view("admin/single_fix", $data);
    }
    public function single_fix_update()
    {

        $result = $this->Admin_model->single_update($_POST);
        if ($result) {
            $this->session->set_flashdata('msg', "Fixture Update Successfully");
            redirect('welcome/home', 'refresh');
        }
    }
    public function updateResult()
    {
        $id = $this->input->post('id');
        $homeTeamGoals = $this->input->post('homeTeamGoals');
        $awayTeamGoals = $this->input->post('awayTeamGoals');
        $homeTeamId = $this->input->post('homeTeamId');
        $awayTeamId = $this->input->post('awayTeamId');
        $hteam = $this->Admin_model->get_team_data($homeTeamId);
        $ateam = $this->Admin_model->get_team_data($awayTeamId);


        if ($homeTeamGoals > $awayTeamGoals) {
            $h_mp = $hteam->mp + 1;
            $h_win = $hteam->win + 1;
            $h_lose = $hteam->lose + 0;
            $h_draw = $hteam->draw + 0;
            $h_gf = $hteam->gf + $homeTeamGoals;
            $h_ga = $hteam->ga + $awayTeamGoals;
            $h_gd = $h_gf - $h_ga;
            $h_points = $hteam->points + 3;
            $id = $this->input->post('id');
            $home = array('id' => $id, 'teamid' => $homeTeamId, 'mp' => $h_mp, 'win' => $h_win, 'lose' => $h_lose, 'draw' => $h_draw, 'gf' => $h_gf, 'ga' => $h_ga, 'points' => $h_points, "gd" => $h_gd, 'homeGoal' => $homeTeamGoals, 'awayGoal' => $awayTeamGoals);
            $this->Admin_model->update_standing($home);

            $a_mp = $ateam->mp + 1;
            $a_win = $ateam->win + 0;
            $a_lose = $ateam->lose + 1;
            $a_draw = $ateam->draw + 0;
            $a_gf = $ateam->gf + $awayTeamGoals;
            $a_ga = $ateam->ga + $homeTeamGoals;
            $a_gd = $a_gf - $a_ga;
            $a_points = $ateam->points + 0;
            $id = $this->input->post('id');
            $away = array('id' => $id, 'teamid' => $awayTeamId, 'mp' => $a_mp, 'win' => $a_win, 'lose' => $a_lose, 'draw' => $a_draw, 'gf' => $a_gf, 'ga' => $a_ga, 'points' => $a_points, "gd" => $a_gd, 'homeGoal' => $homeTeamGoals, 'awayGoal' => $awayTeamGoals);

            if ($this->Admin_model->update_standing($away)) {
                $this->session->set_flashdata('msg', "Match Result uploaded and Table updated");
                redirect('welcome/home', 'refresh');
            }
        }

        if ($homeTeamGoals == $awayTeamGoals) {
            $h_mp = $hteam->mp + 1;
            $h_win = $hteam->win + 0;
            $h_lose = $hteam->lose + 0;
            $h_draw = $hteam->draw + 1;
            $h_gf = $hteam->gf + $homeTeamGoals;
            $h_ga = $hteam->ga + $awayTeamGoals;
            $h_gd = $h_gf - $h_ga;
            $h_points = $hteam->points + 1;
            $id = $this->input->post('id');
            $home = array('id' => $id, 'teamid' => $homeTeamId, 'mp' => $h_mp, 'win' => $h_win, 'lose' => $h_lose, 'draw' => $h_draw, 'gf' => $h_gf, 'ga' => $h_ga, 'points' => $h_points, "gd" => $h_gd, 'homeGoal' => $homeTeamGoals, 'awayGoal' => $awayTeamGoals);
            $this->Admin_model->update_standing($home);


            $a_mp = $ateam->mp + 1;
            $a_win = $ateam->win + 0;
            $a_lose = $ateam->lose + 0;
            $a_draw = $ateam->draw + 1;
            $a_gf = $ateam->gf + $awayTeamGoals;
            $a_ga = $ateam->ga + $homeTeamGoals;
            $a_gd = $a_gf - $a_ga;
            $a_points = $ateam->points + 1;
            $id = $this->input->post('id');
            $away = array('id' => $id, 'teamid' => $awayTeamId, 'mp' => $a_mp, 'win' => $a_win, 'lose' => $a_lose, 'draw' => $a_draw, 'gf' => $a_gf, 'ga' => $a_ga, 'points' => $a_points, "gd" => $a_gd, 'homeGoal' => $homeTeamGoals, 'awayGoal' => $awayTeamGoals);
            if ($this->Admin_model->update_standing($away)) {
                $this->session->set_flashdata('msg', "Match Result uploaded and Table updated");
                redirect('welcome/home', 'refresh');
            }
        }

        if ($homeTeamGoals < $awayTeamGoals) {
            $h_mp = $hteam->mp + 1;
            $h_win = $hteam->win + 0;
            $h_lose = $hteam->lose + 1;
            $h_draw = $hteam->draw + 0;
            $h_gf = $hteam->gf + $homeTeamGoals;
            $h_ga = $hteam->ga + $awayTeamGoals;
            $h_gd = $h_gf - $h_ga;
            $h_points = $hteam->points + 0;
            $id = $this->input->post('id');
            $home = array('id' => $id, 'teamid' => $homeTeamId, 'mp' => $h_mp, 'win' => $h_win, 'lose' => $h_lose, 'draw' => $h_draw, 'gf' => $h_gf, 'ga' => $h_ga, 'points' => $h_points, "gd" => $h_gd, 'homeGoal' => $homeTeamGoals, 'awayGoal' => $awayTeamGoals);
            $this->Admin_model->update_standing($home);

            $a_mp = $ateam->mp + 1;
            $a_win = $ateam->win + 1;
            $a_lose = $ateam->lose + 0;
            $a_draw = $ateam->draw + 0;
            $a_gf = $ateam->gf + $awayTeamGoals;
            $a_ga = $ateam->ga + $homeTeamGoals;
            $a_gd = $a_gf - $a_ga;
            $a_points = $ateam->points + 3;
            $id = $this->input->post('id');
            $away = array('id' => $id, 'teamid' => $awayTeamId, 'mp' => $a_mp, 'win' => $a_win, 'lose' => $a_lose, 'draw' => $a_draw, 'gf' => $a_gf, 'ga' => $a_ga, 'points' => $a_points, "gd" => $a_gd, 'homeGoal' => $homeTeamGoals, 'awayGoal' => $awayTeamGoals);
            if ($this->Admin_model->update_standing($away)) {
                $this->session->set_flashdata('msg', "Match Result uploaded and Table updated");
                redirect('welcome/home', 'refresh');
            }
        }
    }

    public function update_champion_result()
    {
        $id = $this->input->post('id');
        $homeTeamGoals = $this->input->post('homeTeamGoals');
        $awayTeamGoals = $this->input->post('awayTeamGoals');
        $homeTeamId = $this->input->post('homeTeamId');
        $awayTeamId = $this->input->post('awayTeamId');
        $hteam = $this->Admin_model->get_champion_team_data($homeTeamId);
        $ateam = $this->Admin_model->get_champion_team_data($awayTeamId);


        if ($homeTeamGoals > $awayTeamGoals) {
            $h_mp = $hteam->mp + 1;
            $h_win = $hteam->win + 1;
            $h_lose = $hteam->lose + 0;
            $h_draw = $hteam->draw + 0;
            $h_gf = $hteam->gf + $homeTeamGoals;
            $h_ga = $hteam->ga + $awayTeamGoals;
            $h_gd = $h_gf - $h_ga;
            $h_points = $hteam->points + 3;
            $id = $this->input->post('id');
            $home = array('id' => $id, 'teamid' => $homeTeamId, 'mp' => $h_mp, 'win' => $h_win, 'lose' => $h_lose, 'draw' => $h_draw, 'gf' => $h_gf, 'ga' => $h_ga, 'points' => $h_points, "gd" => $h_gd, 'homeGoal' => $homeTeamGoals, 'awayGoal' => $awayTeamGoals);
            $this->Admin_model->update_champion_standing($home);

            $a_mp = $ateam->mp + 1;
            $a_win = $ateam->win + 0;
            $a_lose = $ateam->lose + 1;
            $a_draw = $ateam->draw + 0;
            $a_gf = $ateam->gf + $awayTeamGoals;
            $a_ga = $ateam->ga + $homeTeamGoals;
            $a_gd = $a_gf - $a_ga;
            $a_points = $ateam->points + 0;
            $id = $this->input->post('id');
            $away = array('id' => $id, 'teamid' => $awayTeamId, 'mp' => $a_mp, 'win' => $a_win, 'lose' => $a_lose, 'draw' => $a_draw, 'gf' => $a_gf, 'ga' => $a_ga, 'points' => $a_points, "gd" => $a_gd, 'homeGoal' => $homeTeamGoals, 'awayGoal' => $awayTeamGoals);

            if ($this->Admin_model->update_champion_standing($away)) {
                $this->session->set_flashdata('msg', "Match Result uploaded and Table updated");
                redirect('welcome/home', 'refresh');
            }
        }

        if ($homeTeamGoals == $awayTeamGoals) {
            $h_mp = $hteam->mp + 1;
            $h_win = $hteam->win + 0;
            $h_lose = $hteam->lose + 0;
            $h_draw = $hteam->draw + 1;
            $h_gf = $hteam->gf + $homeTeamGoals;
            $h_ga = $hteam->ga + $awayTeamGoals;
            $h_gd = $h_gf - $h_ga;
            $h_points = $hteam->points + 1;
            $id = $this->input->post('id');
            $home = array('id' => $id, 'teamid' => $homeTeamId, 'mp' => $h_mp, 'win' => $h_win, 'lose' => $h_lose, 'draw' => $h_draw, 'gf' => $h_gf, 'ga' => $h_ga, 'points' => $h_points, "gd" => $h_gd, 'homeGoal' => $homeTeamGoals, 'awayGoal' => $awayTeamGoals);
            $this->Admin_model->update_champion_standing($home);


            $a_mp = $ateam->mp + 1;
            $a_win = $ateam->win + 0;
            $a_lose = $ateam->lose + 0;
            $a_draw = $ateam->draw + 1;
            $a_gf = $ateam->gf + $awayTeamGoals;
            $a_ga = $ateam->ga + $homeTeamGoals;
            $a_gd = $a_gf - $a_ga;
            $a_points = $ateam->points + 1;
            $id = $this->input->post('id');
            $away = array('id' => $id, 'teamid' => $awayTeamId, 'mp' => $a_mp, 'win' => $a_win, 'lose' => $a_lose, 'draw' => $a_draw, 'gf' => $a_gf, 'ga' => $a_ga, 'points' => $a_points, "gd" => $a_gd, 'homeGoal' => $homeTeamGoals, 'awayGoal' => $awayTeamGoals);
            if ($this->Admin_model->update_champion_standing($away)) {
                $this->session->set_flashdata('msg', "Match Result uploaded and Table updated");
                redirect('welcome/home', 'refresh');
            }
        }

        if ($homeTeamGoals < $awayTeamGoals) {
            $h_mp = $hteam->mp + 1;
            $h_win = $hteam->win + 0;
            $h_lose = $hteam->lose + 1;
            $h_draw = $hteam->draw + 0;
            $h_gf = $hteam->gf + $homeTeamGoals;
            $h_ga = $hteam->ga + $awayTeamGoals;
            $h_gd = $h_gf - $h_ga;
            $h_points = $hteam->points + 0;
            $id = $this->input->post('id');
            $home = array('id' => $id, 'teamid' => $homeTeamId, 'mp' => $h_mp, 'win' => $h_win, 'lose' => $h_lose, 'draw' => $h_draw, 'gf' => $h_gf, 'ga' => $h_ga, 'points' => $h_points, "gd" => $h_gd, 'homeGoal' => $homeTeamGoals, 'awayGoal' => $awayTeamGoals);
            $this->Admin_model->update_champion_standing($home);

            $a_mp = $ateam->mp + 1;
            $a_win = $ateam->win + 1;
            $a_lose = $ateam->lose + 0;
            $a_draw = $ateam->draw + 0;
            $a_gf = $ateam->gf + $awayTeamGoals;
            $a_ga = $ateam->ga + $homeTeamGoals;
            $a_gd = $a_gf - $a_ga;
            $a_points = $ateam->points + 3;
            $id = $this->input->post('id');
            $away = array('id' => $id, 'teamid' => $awayTeamId, 'mp' => $a_mp, 'win' => $a_win, 'lose' => $a_lose, 'draw' => $a_draw, 'gf' => $a_gf, 'ga' => $a_ga, 'points' => $a_points, "gd" => $a_gd, 'homeGoal' => $homeTeamGoals, 'awayGoal' => $awayTeamGoals);
            if ($this->Admin_model->update_champion_standing($away)) {
                $this->session->set_flashdata('msg', "Match Result uploaded and Table updated");
                redirect('welcome/home', 'refresh');
            }
        }
    }
    public function ptables()
    {
        $data['tbl'] = $this->Admin_model->prepareTable();
        $this->load->view("admin/ptable", $data);
    }
    public function ctables()
    {
        $data['tbl'] = $this->Admin_model->prepare_group_a_table();
        $data['tbl2'] = $this->Admin_model->prepare_group_b_table();
        $this->load->view("admin/ctables", $data);
    }
    public function pfixtures()
    {
        $data['fix'] = $this->Admin_model->get_fixtures();
        $this->load->view("admin/pfixture", $data);
    }
    public function ffixtures()
    {
        $data['fix'] = $this->Admin_model->get_fa_fixtures();
        $this->load->view("admin/ffixture", $data);
    }
    public function cfixtures()
    {
        $data['fix'] = $this->Admin_model->get_champion_fixtures();
        $this->load->view("admin/cfixture", $data);
    }
    public function presults()
    {
        $data['fix'] = $this->Admin_model->get_result();
        $this->load->view("admin/presults", $data);
    }
    public function fresults()
    {
        $data['fix'] = $this->Admin_model->get_fa_result();
        $this->load->view("admin/presults", $data);
    }
    public function cresults()
    {
        $data['fix'] = $this->Admin_model->get_champion_result();
        $this->load->view("admin/presults", $data);
    }
    public function reg_player()
    {

        $filename = $_FILES['passport']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $team_logo = hash('md5', date('hismy') . $filename) . "." . $ext;
        $config = array(
            'upload_path' => './assets/uploads/', 'max_size' => 200000, 'allowed_types' => 'png|PNG|jpg|JPG', 'file_name' => $team_logo
        );

        $this->upload->initialize($config);
        $this->upload->do_upload('passport');
        if ($this->upload->display_errors()) {
            $this->session->set_flashdata('msg', $this->upload->display_errors());
            redirect('welcome/home', 'refresh');
        } else {
            $data = $_POST;
            $data["passport"] = $team_logo;
            $result = $this->Admin_model->save_player_data($data);
            if ($result) {
                $this->session->set_flashdata('msg', "Player Registration is successfull");
                redirect('welcome/home', 'refresh');
            }
        }
    }
    public function view_players()
    {
        $id = $this->uri->segment(3);
        $data['players'] = $this->Admin_model->view_players($id);
        $data['teams'] = $this->Admin_model->get_teams();
        $this->load->view("admin/team_players", $data);
    }
    public function transfer()
    {
        $result = $this->Admin_model->transfer($_POST);
        if ($result) {
            $this->session->set_flashdata('msg', "Transfer Successfull");
            redirect('welcome/home', 'refresh');
        }
    }
    public function goals(){
        $goals = $this->input->post('goals');
        for($i=1; $i<=$goals; $i++){
        $data = array(
            'goals' => 1,
            'leagueid' => $this->input->post('leagueid'),
            'team_scored_against' => $this->input->post('team_scored_against'),
            'playerid' => $this->input->post('playerid'),
            'seasonid' => $this->input->post('seasonid')
        );
        $result = $this->Admin_model->creat_player_goal_record($data);
     }
       
        if ($result) {
            $this->session->set_flashdata('msg', "Player Record Updated");
            redirect('welcome/home', 'refresh');
        }


    }
    public function pscorers(){
        $data['result']= $this->Admin_model->prepare_scorers($this->session->userdata('season'), 1);
        $data['league'] = "Premeir League";
        $this->load->view("admin/top_scorers", $data);
      
    }
    public function fscorers(){
        $data['result']= $this->Admin_model->prepare_scorers($this->session->userdata('season'), 2);
        $data['league'] = "FA CUP";
        $this->load->view("admin/top_scorers", $data);
      
    }
    public function cscorers(){
        $data['result']= $this->Admin_model->prepare_scorers($this->session->userdata('season'), 3);
        $data['league'] = "Champions League";
        $this->load->view("admin/top_scorers", $data);
      
    }
    public function fixture_management(){
        $this->load->view("admin/fixture_management");
    }
    public function records(){
        $this->load->view("admin/records");
    }
    public function save_winner(){
        $result = $this->Admin_model->save_winner($_POST);
            if ($result) {
                $this->session->set_flashdata('msg', "Winner saved successfull");
                redirect('welcome/home', 'refresh');
            }
    }
    public function get_winners(){
       $type = $this->uri->segment(3);
       $data['result'] = $this->Admin_model->get_winners($type);
       $data['scorers'] = $this->Admin_model->get_all_time_scorers( $type);
       $data['league'] = $this->Admin_model->get_league($type);

       $this->load->view("admin/winners", $data);


    }
}
