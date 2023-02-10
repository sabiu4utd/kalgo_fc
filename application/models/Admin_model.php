<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function get_saeasons()
    // get all seasons
    {
        return $this->db->get('seasons')->result();
    }
    public function activateSeason($id)
    {
        // Activate a particular season records
        $this->db->set('status', "inactive");
        $this->db->update("seasons");
        $this->db->where("id", $id);
        $this->db->set("status", "active");
        return  $this->db->update("seasons");
    }
    public function save_team_data($data)
    {
        // save team data 
        return $this->db->insert("teams", $data);
    }
    public function get_teams()
    {
        // get all the registered teams 
        return $this->db->get('teams')->result();
    }
    public function get_team($id)
    {
        //get particular team based on id
        $this->db->where("id", $id);
        return $this->db->get('teams')->row();
    }
    public function updateTeam($data)
    {
        //update a team to
        $this->db->where('id', $data['id']);
        $this->db->set('team_name', $data['team_name']);
        $this->db->set('coach_name', $data['coach_name']);
        $this->db->set('phone_number', $data['phone_number']);
        return $this->db->update("teams");
    }
    public function save_team_to_table($data)
    {
        //add team to a table 
        return $this->db->insert("standing", $data);
    }
    public function checkTeam($teamid, $seasonid, $leagueid)
    {
        //check team registration and make sure a team is not 
        //register twice or more in the same season
        $this->db->where('teamid', $teamid);
        $this->db->where('seasonid', $seasonid);
        $this->db->where('leagueid', $leagueid);
        $result =  $this->db->get("standing");
        return $result->num_rows() == 1 ? true : false;
    }
    public function save_fixture($data)
    {
        //register fixtures 
        return $this->db->insert("fixtures", $data);
    }
    
    public function get_fixtures()
    {
        //Get premier current season fixtures 
        $this->db->select("*");
        $this->db->from("leagues");
        $this->db->join("fixtures", "leagues.id = fixtures.leagueId");
        $this->db->where("fixtures.seasonId", $this->session->userdata("season"));
        $this->db->where("fixtures.status", 'fixture');
        $this->db->where("leagues.id", 1);
        $this->db->order_by("type", "asc");
        return $this->db->get()->result();
    }
    public function get_fa_fixtures()
    {
        //Get fa current season fixtures 
        $this->db->select("*");
        $this->db->from("leagues");
        $this->db->join("fixtures", "leagues.id = fixtures.leagueId");
        $this->db->where("fixtures.seasonId", $this->session->userdata("season"));
        $this->db->where("fixtures.status", 'fixture');
        $this->db->where("leagues.id", 2);
        $this->db->order_by("type", "asc");
        return $this->db->get()->result();
    }
    public function get_champion_fixtures()
    {
        //Get champions current season fixtures 
        $this->db->select("*");
        $this->db->from("leagues");
        $this->db->join("fixtures", "leagues.id = fixtures.leagueId");
        $this->db->where("fixtures.seasonId", $this->session->userdata("season"));
        $this->db->where("fixtures.status", 'fixture');
        $this->db->where("leagues.id", 3);
        $this->db->order_by("type", "asc");
        return $this->db->get()->result();
    }
    public function get_result()
    {
        //Get current season fixtures 
        $this->db->select("*");
        $this->db->from("leagues");
        $this->db->join("fixtures", "leagues.id = fixtures.leagueId");
        $this->db->where("fixtures.seasonId", $this->session->userdata("season"));
        $this->db->where("fixtures.status", 'result');
        $this->db->where("leagues.id", 1);
        $this->db->order_by("type", "asc");
        return $this->db->get()->result();
    }
    public function get_fa_result()
    {
        //Get current season fixtures 
        $this->db->select("*");
        $this->db->from("leagues");
        $this->db->join("fixtures", "leagues.id = fixtures.leagueId");
        $this->db->where("fixtures.seasonId", $this->session->userdata("season"));
        $this->db->where("fixtures.status", 'result');
        $this->db->where("leagues.id", 2);
        $this->db->order_by("type", "asc");
        return $this->db->get()->result();
    }
    public function get_champion_result()
    {
        //Get current season fixtures 
        $this->db->select("*");
        $this->db->from("leagues");
        $this->db->join("fixtures", "leagues.id = fixtures.leagueId");
        $this->db->where("fixtures.seasonId", $this->session->userdata("season"));
        $this->db->where("fixtures.status", 'result');
        $this->db->where("leagues.id", 3);
        $this->db->order_by("type", "asc");
        return $this->db->get()->result();
    }

    public function get_fix($id)
    {
        //get single fixtures based on Id 
        $this->db->where("id", $id);
        return $this->db->get("fixtures")->row();
    }
    public function single_update($data)
    {
        //update single fixture
        $this->db->where('id', $data['id']);
        $this->db->set('venue', $data['venue']);
        $this->db->set('time', $data['time']);
        $this->db->set('date', $data['date']);
        $this->db->set('leagueid', $data['leagueid']);
        $this->db->set('seasonid', $this->session->userdata('season'));
        return $this->db->update("fixtures");
    }
    public function get_team_data($id)
    {
        $this->db->where('teamid', $id);
        $this->db->where('seasonid', $this->session->userdata('season'));
        $this->db->where('leagueid', 1);
        return $this->db->get("standing")->row();
    }
    public function get_champion_team_data($id)
    {
        $this->db->where('teamid', $id);
        $this->db->where('seasonid', $this->session->userdata('season'));
        $this->db->where('leagueid', 3);
        return $this->db->get("standing")->row();
    }
    public function update_standing($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->set('status', 'result');
        $this->db->set('homeGoal', $data['homeGoal']);
        $this->db->set('awayGoal', $data['awayGoal']);
        $this->db->set('status', 'result');
        $this->db->update('fixtures');

        $this->db->where("teamid", $data['teamid']);
        $this->db->where("leagueid", 1);
        $this->db->where("seasonid", $this->session->userdata('season'));
        $this->db->set("mp", $data['mp']);
        $this->db->set("win", $data['win']);
        $this->db->set("draw", $data['draw']);
        $this->db->set("lose", $data['lose']);
        $this->db->set("gf", $data['gf']);
        $this->db->set("ga", $data['ga']);
        $this->db->set("gd", $data['gd']);
        $this->db->set("points", $data['points']);
        return $this->db->update("standing");
    }
    public function update_champion_standing($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->set('status', 'result');
        $this->db->set('homeGoal', $data['homeGoal']);
        $this->db->set('awayGoal', $data['awayGoal']);
        $this->db->set('status', 'result');
        $this->db->update('fixtures');

        $this->db->where("teamid", $data['teamid']);
        $this->db->where("leagueid", 3);
        $this->db->where("seasonid", $this->session->userdata('season'));
       
        $this->db->set("mp", $data['mp']);
        $this->db->set("win", $data['win']);
        $this->db->set("draw", $data['draw']);
        $this->db->set("lose", $data['lose']);
        $this->db->set("gf", $data['gf']);
        $this->db->set("ga", $data['ga']);
        $this->db->set("gd", $data['gd']);
        $this->db->set("points", $data['points']);
        return $this->db->update("standing");
    }
   
    public function prepareTable()
    {
        $this->db->select("*");
        $this->db->from("teams");
        $this->db->join("standing", "teams.id = standing.teamid");
        $this->db->where("leagueid", "1");
        $this->db->where("seasonid", $this->session->userdata('season'));
        $this->db->order_by("points desc, gd desc");
        return $this->db->get()->result();
        
    }
    public function prepare_group_a_table()
    {
        $this->db->select("*");
        $this->db->from("teams");
        $this->db->join("standing", "teams.id = standing.teamid");
        $this->db->where("leagueid", "3");
        $this->db->where("groop", "A");
        $this->db->where("seasonid", $this->session->userdata('season'));
        $this->db->order_by("points desc, gd desc");
        return $this->db->get()->result();
        
    }
    public function prepare_group_b_table()
    {
        $this->db->select("*");
        $this->db->from("teams");
        $this->db->join("standing", "teams.id = standing.teamid");
        $this->db->where("leagueid", "3");
        $this->db->where("groop", "B");
        $this->db->where("seasonid", $this->session->userdata('season'));
        $this->db->order_by("points desc, gd desc");
        return $this->db->get()->result();
        
    }
    public function save_player_data($data)
    {
        return $this->db->insert("players", $data);
    }
    public function view_players($id)
    {
        $this->db->select("*");
        $this->db->from("players");
        $this->db->join("teams", "players.teamid = teams.id");
        $this->db->where('teamid', $id);
        return $this->db->get()->result();
    }

    public function transfer($data)
    {
        $this->db->where("id", $data['id']);
        $this->db->set("teamid", $data['teamid']);
        return $this->db->update("players");
    }
 
    public function creat_player_goal_record($data)
    {
        return $this->db->insert('scorers', $data);
    }
    public function prepare_scorers($seasonid, $leagueid){
        $sql ="select fullname, team_name, count(*) as total from scorers join players join teams on teams.id = players.teamid and scorers.playerid = players.player_id where seasonid ='$seasonid' and leagueid =' $leagueid' GROUP BY fullname order by total desc";
       return  $this->db->query($sql)->result();
    }
    public function save_winner($data){
       return $this->db->insert('winners', $data);
    }
    public function get_winners($type){
        return $this->db
             ->select("*")
             ->from("winners")
             ->join("seasons", "winners.seasonid = seasons.id")
             ->join("teams", "teams.id = winners.teamid")
             ->join("leagues", "leagues.id = winners.leagueid")
             ->where("winners.leagueid", $type)
             ->get()
             ->result();
    }

    public function get_all_time_scorers($leagueid){
        $sql ="select fullname, team_name, count(*) as total from scorers join players join teams on teams.id = players.teamid and scorers.playerid = players.player_id where leagueid =' $leagueid' GROUP BY fullname order by total desc";
       return  $this->db->query($sql)->result();
    }
    public function get_league($id){
        return $this->db
                    ->where("id", $id)
                    ->get("leagues")
                    ->row(); 
    }
}
