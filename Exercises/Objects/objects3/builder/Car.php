<?php

namespace factory;
class Car
{
    private $brand;
    private $model;
    private $color;
    private $registration;
    private $engineFired;
    private $gear;
    private $speed;
    private $isFired;
    private $steeringAngle;

    private static $buildNumber = 0;

    private function generateRegistration(): string
    {
        return strtoupper(substr($this->brand, 3)) . self::$buildNumber;
    }

    private function generateModelName(): string
    {
        return strtoupper(substr($this->brand, 3)) . self::$buildNumber . substr($this->color, 3);
    }

    public function __construct($brand, $color)
    {
        self::$buildNumber = self::$buildNumber++;
        $this->registration = $this->generateRegistration();
        $this->model = $this->generateModelName();
    }

    public function getBrand()
    {
        return $this->brand;
    }

    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function setModel($model)
    {
        $this->model = $model;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }

    public function getRegistration()
    {
        return $this->registration;
    }

    public function getEngineFired()
    {
        return $this->engineFired;
    }

    public function setEngineFired($engineFired)
    {
        $this->engineFired = $engineFired;
    }

    public function getGear()
    {
        return $this->gear;
    }

    public function setGear($gear)
    {
        $this->gear = $gear;
    }

    public function getSpeed()
    {
        return $this->speed;
    }

    public function setSpeed($speed)
    {
        $this->speed = $speed;
    }

    public function getIsFired()
    {
        return $this->isFired;
    }

    public function setIsFired($isFired)
    {
        $this->isFired = $isFired;
    }

    public function getSteeringAngle()
    {
        return $this->steeringAngle;
    }

    public function setSteeringAngle($steeringAngle)
    {
        $this->steeringAngle = $steeringAngle;
    }
}