<?php

namespace Model;

class Game {
    public $id;
    public $userId;
    public $progress;
    public $hidden;
    public $finished;

    public function __construct(int $userId, string $progress, string $hidden, string $finished) {
        $this->userId = $userId;
        $this->progress = $progress;
        $this->hidden = $hidden;
        $this->finished = $finished;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getProgress(): string {
        return $this->progress;
    }

    public function getHidden(): string {
        return $this->hidden;
    }

    public function getFinished(): string {
        return $this->finished;
    }

    public function setProgress(string $progress): void {
        $this->progress = $progress;
    }

    public function setHidden(string $hidden): void {
        $this->hidden = $hidden;
    }

    public function setFinished(string $finished): void {
        $this->finished = $finished;
    }

    public function setUserId(int $userId): void {
        $this->userId = $userId;
    }

    public function getUserId(){
        return $this->userId;
    }
}