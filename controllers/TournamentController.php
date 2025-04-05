<?php
require_once "models/Tournament.php";
class TournamentController {
    private $tournamentModel;
    public function __construct() {
        $this->tournamentModel = new Tournament();
    }
    public function index() {
        $tournaments = $this->tournamentModel->getAllTournaments();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->tournamentModel->createTournament($_POST["name"], $_POST["date"]);
            header("Location: index.php?action=tournaments");
        }
        require_once "views/tournaments.php";
    }
}

