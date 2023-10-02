<?php

class User {
    public $userId;
    public $userName;
    public $gamesWinned;
    public $gamesPlayed;
    public $email;
    public $password;

    /**
     * @param $userName
     * @param $gamesWinned
     * @param $gamesPlayed
     * @param $email
     * @param $password
     */
    public function __construct($userId, $userName, $email, $password, $gamesWinned, $gamesPlayed) {
        $this->userId = $userId;
        $this->userName = $userName;
        $this->gamesWinned = $gamesWinned;
        $this->gamesPlayed = $gamesPlayed;
    }

    /**
     * @param mixed $userName
     */
    public function setUserName($userName): void {
        $this->userName = $userName;
    }

    /**
     * @param mixed $gamesWinned
     */
    public function setGamesWinned($gamesWinned): void {
        $this->gamesWinned = $gamesWinned;
    }

    /**
     * @param mixed $gamesPlayed
     */
    public function setGamesPlayed($gamesPlayed): void {
        $this->gamesPlayed = $gamesPlayed;
    }

    /**
     * @param null $email
     */
    public function setEmail($email): void {
        $this->email = $email;
    }

    /**
     * @param null $password
     */
    public function setPassword($password): void {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getUserId() {
        return $this->userId;
    }

    /**
     * @return mixed
     */
    public function getUserName() {
        return $this->userName;
    }

    /**
     * @return mixed
     */
    public function getGamesWinned() {
        return $this->gamesWinned;
    }

    /**
     * @return mixed
     */
    public function getGamesPlayed() {
        return $this->gamesPlayed;
    }

    /**
     * @return null
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * @return null
     */
    public function getPassword() {
        return $this->password;
    }
}